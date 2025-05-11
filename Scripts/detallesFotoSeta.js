let viewingDetail = false; // Este valor será "true" si se está mostrando el panel informativo y "false" al cerrarlo
let backgroundElement, infoPanelElement, imageElement; // El elemento de fondo, el panel y la imagen dentro del mismo.
let profilePictureElement, commentContainer; // Elementos de la parte de abajo del panel

window.addEventListener("load", () => {
    // Al cargar la página, inicializar los elementos
    backgroundElement = document.getElementById("background-black-fade");
    infoPanelElement = document.getElementById("mushroom-details");
    imageElement = document.getElementById("detail-image");
    profilePictureElement = document.getElementById("detail-profile-picture");
    commentContainer = document.getElementById("detail-comment-container");
    // Añadir el evento de cerrar el panel al icono de la X (SVG)
    document.getElementById("detail-close").addEventListener("click", hideInfoPanel);
});

// Función que es llamada al darle click a una seta
function showInfoPanel(IDSeta, IDSocio, comentario) {
    // Cambiar la variable "viewingDetail"
    viewingDetail = true;
    // Cambiar algunos estilos
    backgroundElement.style.display = "block";
    infoPanelElement.style.opacity = "100%";
    infoPanelElement.style.transform = "translate(-50%, -50%) scale(100%)";
    imageElement.src = "./Images/GaleriaArtistica/SETA_" + IDSeta + ".png";
    imageElement.style.maxWidth = "50vw";

    // Si hay un comentario, mostrarlo, si no, ocultarlo.
    if(comentario.length > 0) {
        profilePictureElement.src = "./Images/FotosDePerfil/SOCIO_" + IDSocio + ".png";
        profilePictureElement.style.display = "block";
    } else profilePictureElement.style.display = "none";

    // Actualizar la información de los elementos del panel informativo
    showInfo("detail-comment", "Comentario: ", comentario);
}

// Función que cambia la información de cada elemento del panel, diferenciando entre el título (detail-name) y el contenido (detail-content)
function showInfo(elementID, infoName, content) {
    if(content == "") document.getElementById(elementID).innerHTML = ""; // Si el comentario == "", eliminar el contenido del elemento. Si no, crearlo.
    else document.getElementById(elementID).innerHTML = "<span class='detail-comment-title'>" + infoName + "</span><span class='detail-content'>\"" + content + "\"</span>";
}

// Función que oculta el panel informativo
function hideInfoPanel() {
    viewingDetail = false;
    backgroundElement.style.display = "none";
    infoPanelElement.style.opacity = "0%";
    infoPanelElement.style.transform = "translate(-50%, -50%) scale(0%)";
}

// Evento que evita moverse por la página con la rueda del ratón si has abierto el panel informativo
window.addEventListener("wheel", () => {
    document.body.style.overflow = (viewingDetail) ? "hidden" : "visible";
});

// Evento que quita el panel al darle a la tecla de escape
window.addEventListener("keydown", (event) => {
    if(!viewingDetail) return;
    if(event.key.toUpperCase() == "ESCAPE" || event.key.toUpperCase() == "ESC") hideInfoPanel();
});

// Evento que quita el panel informativo al hacer click fuera de éste
window.addEventListener("click", (event) => {
    if(!viewingDetail) return;
    if(event.target.id == backgroundElement.id) hideInfoPanel();
});