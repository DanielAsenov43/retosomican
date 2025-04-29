const MENSAJE_SIN_RESULTADOS = "No se ha encontrado {SETA}";

let buscador, setas, sinResultados; // Elementos
let oldFilterText, newFilterText; // Texto para comparar lo que se ha buscado

window.onload = () => {
    // Inicializar elementos
    buscador = document.getElementById("caja-de-busqueda");
    setas = document.getElementById("setas").children;
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
}

// Función que filtra las setas dependiendo del texto que se le pase (filterText)
function mostrarSetas(filterText) {
    let filtroNormalizado = filterText.toLowerCase(); // Todo tiene que estar en minúsculas para comparar correctamente.
    let resultados = 0; // Se utiliza para saber si hay resultados o no.

    for(let seta of setas) { // Iterar por todas las setas, obtener sus datos y comprobar si contienen el filtro.
        let nombreCientifico = seta.children[1].innerHTML.toLowerCase();
        let nombreComun = seta.children[2].innerHTML.toLowerCase();
        let fecha = seta.children[3].innerHTML.toLowerCase();
        
        if(nombreCientifico.includes(filtroNormalizado) || nombreComun.includes(filtroNormalizado) || fecha.includes(filtroNormalizado)) {
            // Si la seta contiene la información que se busca:
            seta.style.display = "block";
            resultados++;
        } else {
            // Si no la contiene:
            seta.style.display = "none";
        }
    }

    // Si no se han encontrado setas, cambiar el texto del elemento "sin-resultados" por el texto de MENSAJE_SIN_RESULTADOS,
    // sustituyendo "{SETA}" por el texto en la caja de búsqueda. Si hay más de 0 resultados, el mensaje será "".
    sinResultados.innerHTML = (resultados == 0) ? MENSAJE_SIN_RESULTADOS.replace("{SETA}", "\"" + filterText + "\"") : "";
}

