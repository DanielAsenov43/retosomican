let cropper;
let aspectRatio;
// Elementos HTML
let head, uploadImageElement, popupContainer;
// Constantes
const INPUT_ID = "crop";
const POPUP_CONTAINER_ID = "crop-popup-container";

// Evento principal
window.addEventListener("load", init);



function init() {
    // Inicializar elementos
    head = document.getElementsByTagName("head")[0];
    uploadImageElement = document.getElementById("crop");
    // Crear elementos
    newElement(head, "script", { "src": "../cropperjs/cropper.js" });
    newElement(head, "link", { "rel": "stylesheet", "href": "../cropperjs/cropper.css" });
    newElement(head, "link", { "rel": "stylesheet", "href": "../Styles/uploadImage.css" });
    // Otras operaciones
    aspectRatio = (uploadImageElement.hasAttribute("aspectRatio")) ? eval(uploadImageElement.getAttribute("aspectRatio")) : 1;
    
    setupListeners();
}

function setupListeners() {
    uploadImageElement.addEventListener('change', (event) => {
        if (!event.target.files.length) return;
        const reader = new FileReader();
        reader.onload = (event) => {
            if (event.target.result) {
                createImageUploadPopup();
                let img = document.createElement('img');
                img.src = event.target.result;
                document.body.appendChild(img);

                cropper = new Cropper(img, {
                    aspectRatio: aspectRatio,
                    zoomable: false
                });
            }
        };
        reader.readAsDataURL(event.target.files[0]);
    });

    // save on click
    /*save.addEventListener('click', (event) => {
        event.preventDefault();
        let imageSource = cropper.getCroppedCanvas().toDataURL();
        sendVariableToPHP("PFP-SRC", imageSource);
    });*/
}

function createImageUploadPopup() {
    popupContainer = newElement(uploadImageElement.parentElement, "div", { "id": POPUP_CONTAINER_ID });

}


function newElement(parent, elementType, attributes={}) {
    let element = document.createElement(elementType);
    for (let [key, value] of Object.entries(attributes)) {
        element.setAttribute(key, value);
    }
    parent.appendChild(element);
    return element;
}

function sendVariableToPHP(scriptFileName, variableName, variableValue) {
    var dataToSend = variableName + "=" + encodeURIComponent(variableValue);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../PHPScripts/" + scriptFileName, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(dataToSend);
}