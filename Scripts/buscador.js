const MENSAJE_SIN_RESULTADOS = "No se ha encontrado {SETA}";

let buscador, setas, sinResultados; // Elementos
let oldFilterText, newFilterText; // Texto para comparar lo que se ha buscado

window.addEventListener("load", () => {
    // Inicializar elementos
    buscador = document.getElementById("caja-de-busqueda");
    setas = document.getElementById("galeria").children;
    sinResultados = document.getElementById("sin-resultados");

    // Inicializar bucle principal que comprueba cada 0.01s lo que hay en la barra de búsqueda.
    // Si el texto cambia, se ejecuta la función "mostrarSetas".
    setInterval(() => {
        newFilterText = buscador.value;
        if(newFilterText != oldFilterText) {
            oldFilterText = newFilterText;
            mostrarSetas(newFilterText);
        }
    }, 10);
});

// Función que filtra las setas dependiendo del texto que se le pase (filterText)
function mostrarSetas(filterText) {
    let resultados = 0; // Se utiliza para saber si hay resultados o no.

    for(let seta of setas) { // Iterar por todas las setas, obtener sus datos y comprobar si contienen el filtro.
        let nombreCientificoPreview = seta.children[1];
        let nombreComunPreview = seta.children[2];
        let fechaPreview = seta.children[3];

        let nombreCientifico = seta.children[4].innerHTML;
        let nombreComun = seta.children[5].innerHTML;
        let fecha = seta.children[6].innerHTML;
        
        if(contains(nombreCientifico, filterText) || contains(nombreComun, filterText) || contains(fecha, filterText)) {
            // Si la seta contiene la información que se busca:
            seta.style.display = "block";
            resultados++;

            checkAndHighlight(nombreCientifico, nombreCientificoPreview, filterText);
            checkAndHighlight(nombreComun, nombreComunPreview, filterText);
            checkAndHighlight(fecha, fechaPreview, filterText);

        } else {
            seta.style.display = "none";
        }

        
    }

    // Si no se han encontrado setas, cambiar el texto del elemento "sin-resultados" por el texto de MENSAJE_SIN_RESULTADOS,
    // sustituyendo "{SETA}" por el texto en la caja de búsqueda. Si hay más de 0 resultados, el mensaje será "".
    sinResultados.innerHTML = (resultados == 0) ? MENSAJE_SIN_RESULTADOS.replace("{SETA}", "\"" + filterText + "\"") : "";
}

function contains(string, substring) {
    return (string.toLowerCase().includes(substring.toLowerCase()));
}

function compareGetIndexes(string, substring) {
    let beginIndex = string.toLowerCase().indexOf(substring.toLowerCase());
    let endIndex = beginIndex + substring.length;
    return [beginIndex, endIndex];
}

function checkAndHighlight(originalName, previewElement, filterText) {
    if(contains(originalName, filterText)) {
        let indexes = compareGetIndexes(originalName, filterText);
        let newText = highlightText(originalName, indexes[0], indexes[1], "highlight");
        previewElement.innerHTML = newText;
    } else previewElement.innerHTML = originalName;
}

function highlightText(source, beginIndex, endIndex, highlightClass) {
    let prefix = source.substring(0, beginIndex);
    let suffix = source.substring(endIndex, source.length);
    let substring = source.substring(beginIndex, endIndex);
    let newSubstring = "<span class='" + highlightClass + "'>" + substring + "</span>";
    return prefix + newSubstring + suffix;
}

