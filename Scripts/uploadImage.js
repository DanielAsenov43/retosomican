let cropper;
let aspectRatio, PHPScript, sourceTag;
let popupActive = false, hideLabel = true;
// Elementos HTML
let head, uploadImageElement, label;
let popupBackground, popupContainer, cropContainer;
let previewImage, cropButton;
// Constantes
const INPUT_ID = "crop";
const LABEL_ID = "crop-label";
const POPUP_BACKGROUND_ID = "crop-popup-background";
const POPUP_CONTAINER_ID = "crop-popup-container";
const POPUP_CROP_CONTAINER_ID = "crop-popup-cropper-container";
const POPUP_CROP_BUTTON_ID = "crop-popup-button";

// Evento principal
window.addEventListener("load", init);

function init() {
    // Inicializar elementos
    head = document.getElementsByTagName("head")[0];
    uploadImageElement = document.getElementById("crop");
    // Crear elementos
    newElement(head, "script", { "src": "../cropperjs/cropper.js" });
    newElement(head, "link", { "rel": "stylesheet", "href": "../cropperjs/cropper.css" });
    newElement(head, "link", { "rel": "stylesheet", "href": "../Styles/uploadImage.css" }, true);
    label = newElement(uploadImageElement.parentElement, "label", { for: INPUT_ID, id: LABEL_ID });
    label.innerHTML = "Subir Imagen";
    // Otras operaciones
    aspectRatio = (uploadImageElement.hasAttribute("aspectRatio")) ? eval(uploadImageElement.getAttribute("aspectRatio")) : 1;
    
    PHPScript = getUploadAttribute("phpScript", "El elemento <input> necesita tener un atributo \"phpScript\" con su ruta!");
    sourceTag = getUploadAttribute("sourceTag", "El elemento <input> necesita tener un atributo \"sourceTag\" con su nombre!");
    previewImage = document.getElementById(getUploadAttribute("preview"));
    hideLabel = !uploadImageElement.hasAttribute("dontHideLabel");
    setupListeners();
}

function getUploadAttribute(attributeName, errorMessage=null) {
    if(uploadImageElement.hasAttribute(attributeName)) return uploadImageElement.getAttribute(attributeName);
    if(errorMessage != null) throw new Error(errorMessage);
    return null;
}

function setupListeners() {
    uploadImageElement.addEventListener('change', (event) => {
        if (!event.target.files.length) return;
        const reader = new FileReader();
        reader.onload = (event) => { if (event.target.result) createImageUploadPopup(event); };
        reader.readAsDataURL(event.target.files[0]);
    });
}

function createImageUploadPopup(event) {
    popupActive = true;
    popupBackground = newElement(document.body, "div", { id: POPUP_BACKGROUND_ID });
    popupContainer = newElement(popupBackground, "div", { id: POPUP_CONTAINER_ID });
    cropContainer = newElement(popupContainer, "img", { id: POPUP_CROP_CONTAINER_ID, src: event.target.result });
    cropper = new Cropper(cropContainer, {
        aspectRatio: aspectRatio,
        zoomable: false,
        responsive: false,
        viewMode: 1,
        autoCropArea: 1
    });
    cropButton = newElement(popupContainer, "button", { class: POPUP_CROP_BUTTON_ID, id: POPUP_CROP_BUTTON_ID });
    cropButton.addEventListener("click", crop);
    cropButton.innerHTML = "Subir imagen";
}

function crop() {
    let imageSource = cropper.getCroppedCanvas().toDataURL();
    sendVariableToPHP(PHPScript, sourceTag, imageSource);
    if(previewImage) {
        previewImage.src = imageSource;
        previewImage.style.display = "block";
        if(hideLabel) label.style.display = "none";
    }
    hidePopup();
}

function hidePopup() {
    popupActive = false;
    popupBackground.parentElement.removeChild(popupBackground);
}

// Eventos
window.addEventListener("wheel", () => {
    document.body.style.overflow = (popupActive) ? "hidden" : "visible";
});

// Evento que quita el panel al darle a la tecla de escape
window.addEventListener("keydown", (event) => {
    if(popupActive && (event.key.toUpperCase() == "ESCAPE" || event.key.toUpperCase() == "ESC")) hidePopup();
});

// Evento que quita el panel informativo al hacer click fuera de éste
/*window.addEventListener("click", (event) => {
    if(popupActive && event.target.id == popupBackground.id) hidePopup();
});*/
// Otras funciones
function newElement(parent, elementType, attributes={}, firstChild=false) {
    let element = document.createElement(elementType);
    for (let [key, value] of Object.entries(attributes)) {
        element.setAttribute(key, value);
    }
    if(firstChild) parent.prepend(element); else parent.appendChild(element);
    return element;
}

function sendVariableToPHP(scriptPath, variableName, variableValue) {
    // https://www.geeksforgeeks.org/how-to-pass-javascript-variables-to-php/
    var dataToSend = variableName + "=" + encodeURIComponent(variableValue);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", scriptPath, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(dataToSend);
}