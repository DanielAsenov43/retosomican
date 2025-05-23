let viewingDetail = false; // Este valor será "true" si se está mostrando el panel informativo
let background, infoPanel, image; // El elemento de fondo y el panel en sí
let zoomedIn = false;

window.addEventListener("load", () => {
    // Al cargar la página, inicializar los elementos
    background = document.getElementById("background-black-fade");
    infoPanel = document.getElementById("mushroom-details");
    image = document.getElementById("detail-image");
});

// Función que es llamada al darle click a una seta
function showInfoPanel(IDSeta, nombreLegado, nombreDeterminado, nombreCientifico, nombreComun, fechaRecogida, lugarRecogida, habitat, alturaMar, olor, sabor, tipoSuelo, climatologia, observaciones) {
    // Cambiar la variable "viewingDetail" para bloquear el movimiento por la página, entre otras cosas
    viewingDetail = true;
    // Cambiar algunos estilos
    background.style.display = "block";
    infoPanel.style.opacity = "100%";
    infoPanel.style.transform = "translate(-50%, -50%) scale(100%)";
    image.src = "../Images/GaleriaCientifica/SETA_" + IDSeta + ".png";
    // Actualizar la información de los elementos del panel informativo.
    // Esta función obtiene el elemento con ID "detail-nombre-científico", por ejemplo, y le pone el siguiente HTML:
    // <span class="detail-name">Nombre científico: </span><span class="detail-content">nombreLegado</span>
    // Es necesario separarlos para poder darles estilos distintos.
    showInfo("detail-nombre-legado", "Legado: ", titleCase(nombreLegado));
    showInfo("detail-nombre-determinado", "Determinado: ", titleCase(nombreDeterminado));
    showInfo("detail-nombre-cientifico", "Nombre científico: ", nombreCientifico);
    showInfo("detail-nombre-comun", "Nombre común: ", nombreComun);
    showInfo("detail-fecha-recogida", "Fecha de recogida: ", fechaRecogida);
    showInfo("detail-lugar-recogida", "Lugar de recogida: ", lugarRecogida);
    showInfo("detail-habitat", "Hábitat: ", habitat);
    let textoMetros = (alturaMar == "1") ? " metro" : " metros";
    showInfo("detail-altura-mar", "Altura sobre el nivel del mar: ", alturaMar + textoMetros);
    showInfo("detail-olor", "Olor: ", olor);
    showInfo("detail-sabor", "Sabor: ", sabor);
    showInfo("detail-tipo-suelo", "Tipo de suelo: ", tipoSuelo);
    showInfo("detail-climatologia", "Climatología: ", climatologia);
    showInfo("detail-observaciones", "Observaciones: ", observaciones);
}

// Función que cambia la información de cada elemento del panel, diferenciando entre el título (detail-name) y el contenido (detail-content)
function showInfo(elementID, infoName, content) {
    if(content.length == 0) document.getElementById(elementID).innerHTML = "";
    else document.getElementById(elementID).innerHTML = "<span class='detail-name'>" + infoName + "</span><span class='detail-content'>" + content + "</span>";
}

// Función que oculta el panel informativo
function hideInfoPanel() {
    viewingDetail = false;
    background.style.display = "none";
    infoPanel.style.opacity = "0%";
    infoPanel.style.transform = "translate(-50%, -50%) scale(0%)";
}

// Función que convierte una cadena a "title case", es decir, la primera letra de
// cada palabra en mayúscula y el resto en minúsculas. Utilizado sobre todo para nombres y apellidos.
function titleCase(string) {
    let titleCase = "";
    for(let word of string.split(" ")) {
        titleCase += word.substring(0, 1).toUpperCase();
        titleCase += word.substring(1).toLowerCase() + " ";
    }
    return titleCase.substring(0, titleCase.length - 1);
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