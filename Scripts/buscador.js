const MENSAJE_SIN_RESULTADOS = 'No se ha encontrado "{SETA}"';

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
        // Obtenemos los elementos que contienen la parte que se muestra de la seta, ya que su HTML cambia.
        let nombreCientificoPreview = seta.children[1];
        let nombreComunPreview = seta.children[2];
        let fechaPreview = seta.children[3];
        // Obtenemos la información de los elementos que no se muestran de cada seta. Su HTML no cambia.
        let nombreCientifico = seta.children[4].innerHTML;
        let nombreComun = seta.children[5].innerHTML;
        let fecha = seta.children[6].innerHTML;
        
        // Si coinciden el nombre científico, común o la fecha con la búsqueda:
        if(contains(nombreCientifico, filterText) || contains(nombreComun, filterText) || contains(fecha, filterText)) {
            seta.style.display = "block"; // Mostrar la seta
            resultados++;

            // Estas funciones buscan si ha habido una coincidencia con cada parte de la seta (nombre, fecha, etc)
            // Y si lo encuentran, resaltan esa parte del texto dividiéndolo y añadiendo un <span>
            checkAndHighlight(nombreCientifico, nombreCientificoPreview, filterText);
            checkAndHighlight(nombreComun, nombreComunPreview, filterText);
            checkAndHighlight(fecha, fechaPreview, filterText);

        } else seta.style.display = "none"; // Las setas cuyos datos no coincidan serán ocultadas
    }

    // Si no se han encontrado setas, cambiar el texto del elemento "sin-resultados" por el texto de MENSAJE_SIN_RESULTADOS,
    // sustituyendo "{SETA}" por el texto en la caja de búsqueda. Si hay más de 0 resultados, el mensaje será "".
    sinResultados.innerHTML = (resultados == 0) ? MENSAJE_SIN_RESULTADOS.replace("{SETA}", filterText) : "";
}

// Función que compara dos cadenas ignorando mayúsculas
function contains(string, substring) {
    return (string.toLowerCase().includes(substring.toLowerCase()));
}

// Función que devuelve el índice del principio y el fin de una subcadena en una cadena
// Ejemplo: "Mi casa es grande" como cadena y "casa" como subcadena devuelve [3, 7], ya que
// "casa" empieza en el índice 3 y acaba en el índice 7
function compareGetIndexes(string, substring) {
    let beginIndex = string.toLowerCase().indexOf(substring.toLowerCase());
    let endIndex = beginIndex + substring.length;
    return [beginIndex, endIndex];
}

// Función que resalta parte del texto que se pasa por parámetro.
function checkAndHighlight(originalName, previewElement, filterText) {
    if(contains(originalName, filterText)) {
        let indexes = compareGetIndexes(originalName, filterText);
        let newText = highlightText(originalName, indexes[0], indexes[1], "highlight");
        previewElement.innerHTML = newText;
    } else previewElement.innerHTML = originalName;
}

// Función que recibe un texto y lo envuelve en una etiqueta <span> con la clase highlightClass
function highlightText(source, beginIndex, endIndex, highlightClass) {
    let prefix = source.substring(0, beginIndex);
    let suffix = source.substring(endIndex, source.length);
    let substring = source.substring(beginIndex, endIndex);
    let newSubstring = "<span class='" + highlightClass + "'>" + substring + "</span>";
    return prefix + newSubstring + suffix;
}

