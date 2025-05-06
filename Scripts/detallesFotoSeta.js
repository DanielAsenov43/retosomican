let viewingDetail = false; // Este valor será "true" si se está mostrando el panel informativo
let background, infoPanel, image; // El elemento de fondo y el panel en sí
let profilePicture, commentContainer;

window.addEventListener("load", () => {
    // Al cargar la página, inicializar los elementos
    background = document.getElementById("background-black-fade");
    infoPanel = document.getElementById("detalles-seta");
    image = document.getElementById("detail-image");
    profilePicture = document.getElementById("detail-profile-picture");
    commentContainer = document.getElementById("detail-comment-container");
});

// Función que es llamada al darle click a una seta
function showInfoPanel(IDSeta, IDSocio, comentario) {
    // Cambiar la variable "viewingDetail"
    viewingDetail = true;
    // Cambiar algunos estilos
    background.style.display = "block";
    infoPanel.style.opacity = "100%";
    infoPanel.style.transform = "translate(-50%, -50%) scale(100%)";
    image.src = "./Images/GaleriaArtistica/SETA_" + IDSeta + ".png";
    image.style.maxWidth = "50vw";
    if(comentario.length > 0) {
        profilePicture.src = "./Images/FotosDePerfil/SOCIO_" + IDSocio + ".png";
        profilePicture.style.display = "block";
    }
    else profilePicture.style.display = "none";
    // Actualizar la información de los elementos del panel informativo
    showInfo("detail-comment", "Comentario: ", "\"" + comentario + "\"");
}

// Función que cambia la información de cada elemento del panel, diferenciando entre el título (detail-name) y el contenido (detail-content)
function showInfo(elementID, infoName, content) {
    if(content == "\"\"") document.getElementById(elementID).innerHTML = "";
    else document.getElementById(elementID).innerHTML = "<span class='detail-comment-title'>" + infoName + "</span><span class='detail-content'>" + content + "</span>";
}

// Función que oculta el panel informativo
function hideInfoPanel() {
    viewingDetail = false;
    background.style.display = "none";
    infoPanel.style.opacity = "0%";
    infoPanel.style.transform = "translate(-50%, -50%) scale(0%)";
}

function titleCase(str) {
    var splitString = str.toLowerCase().split(' ');
    for (var i = 0; i < splitString.length; i++) {
        splitString[i] = splitString[i].charAt(0).toUpperCase() + splitString[i].substring(1);     
    }
    return splitString.join(' '); 
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
    if(event.target.id == background.id) hideInfoPanel();
});