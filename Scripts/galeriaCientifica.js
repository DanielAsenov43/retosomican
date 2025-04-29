const MENSAJE_SIN_RESULTADOS = "No se ha encontrado {SETA}";

let buscador, setas, sinResultados; // Elementos
let filtroAntiguo, filtroNuevo; // Texto para comparar lo que se ha buscado

window.onload = () => {
    // Inicializar elementos
    buscador = document.getElementById("caja-de-busqueda");
    setas = document.getElementById("setas").children;
    sinResultados = document.getElementById("sin-resultados");

    // Inicializar bucle principal que comprueba cada 0.01s lo que hay en la barra de búsqueda.
    // Si el texto cambia, se ejecuta la función "mostrarSetas".
    setInterval(() => {
        filtroNuevo = buscador.value;
        if(filtroNuevo != filtroAntiguo) {
            filtroAntiguo = filtroNuevo;
            mostrarSetas(filtroNuevo);
        }
    }, 10);
}

function mostrarSetas(filtro) {
    let filtroNormalizado = filtro.toLowerCase(); // Todo tiene que estar en minúsculas para comparar correctamente.
    let numeroSetasMostradas = 0; // Se utiliza para saber si hay resultados o no.

    for(let seta of setas) { // Iterar por todas las setas, obtener sus datos y comprobar si contienen el filtro.
        let elementoNombreCientifico = seta.children[1];
        let elementoNombreComun = seta.children[2];
        let elementoFecha = seta.children[3];

        let nombreCientifico = elementoNombreCientifico.innerHTML.toLowerCase();
        let nombreComun = elementoNombreComun.innerHTML.toLowerCase();
        let fecha = elementoFecha.innerHTML;
        
        if(nombreCientifico.includes(filtroNormalizado) || nombreComun.includes(filtroNormalizado) || fecha.includes(filtroNormalizado)) {
            // Si la seta contiene la información que se busca:
            seta.style.display = "block";
            numeroSetasMostradas++;
        } else {
            // Si no la contiene:
            seta.style.display = "none";
        }
    }

    // Si no se han encontrado setas, cambiar el texto del elemento "sin-resultados" por el texto de MENSAJE_SIN_RESULTADOS,
    // sustituyendo "{SETA}" por el texto en la caja de búsqueda. Si hay más de 0 resultados, el mensaje será "".
    sinResultados.innerHTML = (numeroSetasMostradas == 0) ? MENSAJE_SIN_RESULTADOS.replace("{SETA}", "\"" + filtro + "\"") : "";
}