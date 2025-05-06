const logoutURL = "./PHPScripts/logout.php";
const LOGOUT_BUTTON_TEXT = "Cerrar Sesión";

window.addEventListener("load", () => {
    // Inicializar elementos
    let loginButton = document.getElementById("access-button");

    // Obtener datos de los elementos <meta>
    // Este comprueba si estamos en el archivo "index.php", para cambiar el enlace de "./" a "../" más adelante
    let indexMeta = document.getElementsByName("index")[0];
    let isIndex = (indexMeta != undefined && indexMeta.content == "true");
    
    // Cambiar los datos de los elementos
    loginButton.innerHTML = LOGOUT_BUTTON_TEXT;
    loginButton.href = (isIndex) ? logoutURL : "." + logoutURL;
});

