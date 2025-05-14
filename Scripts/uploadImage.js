// Objetos
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
    // Inicializar elementos necesarios
    head = document.getElementsByTagName("head")[0]; // Lo necesitamos para añadir los estilos y scripts a la página
    uploadImageElement = document.getElementById("crop"); // Elemento principal con todos los atributos necesarios
    if(!uploadImageElement) return;

    // Creamos los elementos necesarios para que funcione el recorte
    newElement(head, "script", { "src": "../cropperjs/cropper.js" }); // Crear el script con la librería
    newElement(head, "link", { "rel": "stylesheet", "href": "../cropperjs/cropper.css" }); // Estilo de la librería
    newElement(head, "link", { "rel": "stylesheet", "href": "../Styles/uploadImage.css" }, true); // Estilo personalizado
    
    // Creamos el botón principal (label) que te permite subir una imagen
    label = newElement(uploadImageElement.parentElement, "label", { for: INPUT_ID, id: LABEL_ID });
    label.innerHTML = getUploadAttribute("text") || "Subir Imagen"; // Si <input> tiene un atributo texto, lo pone como innerHTML; si no, pone "Subir Imagen".
    // Calculamos la relación de aspecto del atributo si existe. Si no, es 1 por defecto (cuadrado)
    aspectRatio = (uploadImageElement.hasAttribute("aspectRatio")) ? eval(uploadImageElement.getAttribute("aspectRatio")) : 1;
    
    // Obtenemos otros valores de los atributos. Si el segundo parámetro no es nulo significa que el atributo es obligatorio.
    // Ruta del script que se va a ejecutar
    PHPScript = getUploadAttribute("phpScript", "El elemento <input> necesita tener un atributo \"phpScript\" con su ruta!");
    // Etiqueta de la cadena de texto que se va a pasar a PHP
    sourceTag = getUploadAttribute("sourceTag", "El elemento <input> necesita tener un atributo \"sourceTag\" con su nombre!");
    // Si hay un elemento con ID "preview" lo obtenemos para ocultarlo al subir la foto.
    previewImage = document.getElementById(getUploadAttribute("preview"));
    hideLabel = !uploadImageElement.hasAttribute("dontHideLabel");
    sourceTag = getUploadAttribute("sourceTag", "El elemento <input> necesita tener un atributo \"sourceTag\" con su nombre!");

    // Creamos los escuchadores de eventos
    setupListeners();
}

// Función que crea los escuchadores necesarios
function setupListeners() {
    uploadImageElement.addEventListener('change', (event) => {
        // Al subir una foto:
        if (!event.target.files.length) return;
        const reader = new FileReader();
        // Si la imagen se ha subido con éxito, crear el panel
        reader.onload = (event) => {
            if (event.target.result) createImageUploadPopup();
        };
        // Obtenemos la URL de la imagen en base64. Esta línea es necesaria, a pesar de estar al final.
        reader.readAsDataURL(event.target.files[0]);
    });
}

// Función que crea el panel principal
function createImageUploadPopup() {
    popupActive = true;
    document.body.style.overflow = "hidden"; // Bloqueamos la navegación con la rueda del ratón
    // Creamos algunos elementos necesarios para el panel
    popupBackground = newElement(document.body, "div", { id: POPUP_BACKGROUND_ID });
    popupContainer = newElement(popupBackground, "div", { id: POPUP_CONTAINER_ID });
    cropContainer = newElement(popupContainer, "img", { id: POPUP_CROP_CONTAINER_ID, src: event.target.result });
    // Creamos el cropper principal, utilizando la librería "cropper.js"
    cropper = new Cropper(cropContainer, {
        // Lista y explicación de los parámetros: https://www.npmjs.com/package/cropperjs/v/1.6.2
        aspectRatio: aspectRatio,
        zoomable: false,
        responsive: false,
        viewMode: 1,
        autoCropArea: 1
    });
    // Creamos un botón para confirmar el recorte de la imagen
    cropButton = newElement(popupContainer, "button", { class: POPUP_CROP_BUTTON_ID, id: POPUP_CROP_BUTTON_ID });
    cropButton.addEventListener("click", crop);
    cropButton.innerHTML = "Subir Imagen";
}

// Función que se llama al darle al botón de confirmación de recorte en el panel
function crop() {
    let imageSource = cropper.getCroppedCanvas().toDataURL(); // Obtenemos la URL de la imagen en base64
    sendVariableToPHP(PHPScript, sourceTag, imageSource); // La enviamos al script de PHP
    if(previewImage) { // Si hay una imagen de previsualización, mostrar la imagen
        previewImage.src = imageSource;
        previewImage.style.display = "block";
    }
    // Si no existe el parámetro "dontHideLabel", ocultar la etiqueta/botón de subir foto.
    if(hideLabel) label.style.display = "none";
    // Ocultar el panel informativo
    hidePopup();
}

// Función que oculta el panel principal
function hidePopup() {
    popupActive = false;
    document.body.style.overflow = "visible";
    popupBackground.parentElement.removeChild(popupBackground);
}

// EVENTOS ==============================================================

// Evento que quita el panel al darle a la tecla de escape
window.addEventListener("keydown", (event) => {
    if(popupActive && (event.key.toUpperCase() == "ESCAPE" || event.key.toUpperCase() == "ESC")) hidePopup();
});

// Evento que quita el panel informativo al hacer click fuera de éste
window.addEventListener("click", (event) => {
    if(popupActive && event.target.id == popupBackground.id) hidePopup();
});

// FUNCIONES SECUNDARIAS ========================================================

// Función que crea un elemento a partir de los parámetros que le pases
// Por ejemplo, para crear: <img src="imagen.png" alt="test"/> dentro de divElement,
// necesitaríamos:  newElement(divElement, "img", { src: "imagen.png", alt: "test" });
function newElement(parent, elementType, attributes={}, firstChild=false) {
    let element = document.createElement(elementType); // Creamos el elemento
    for (let [key, value] of Object.entries(attributes)) { // Añadimos los atributos con un bucle
        element.setAttribute(key, value);
    }
    // Si firstChild = true, añadir como primer hijo, si no, añadir como último hijo (por defecto)
    if(firstChild) parent.prepend(element); else parent.appendChild(element);
    return element; // Devolvemos el elemento
}

// Fuente: https://www.geeksforgeeks.org/how-to-pass-javascript-variables-to-php/
// Función que envia una variable "variableName" al script PHP "scriptPath" con el valor "variableValue" utilizando ajax.
function sendVariableToPHP(scriptPath, variableName, variableValue) {
    var dataToSend = variableName + "=" + encodeURIComponent(variableValue);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", scriptPath, true); // Manda la información como POST, y se accede mediante $_POST["variableName"] en PHP
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(dataToSend);
}

// Función que obtiene un atributo de "uploadImageElement", y si el mensaje de error no es nulo, lanzar un error.
function getUploadAttribute(attributeName, errorMessage=null) {
    if(uploadImageElement.hasAttribute(attributeName)) return uploadImageElement.getAttribute(attributeName);
    if(errorMessage != null) throw new Error(errorMessage);
    return null;
}