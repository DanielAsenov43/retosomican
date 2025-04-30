const logoutURL = "./PHPScripts/logout.php";
const WELCOME_MESSAGE = "Hola, {USERNAME}";
const LOGOUT_BUTTON_TEXT = "Cerrar Sesión";

window.onload = () => {
    // Inicializar elementos
    let loginButton = document.getElementById("access-button");
    let headerTitle = document.getElementById("header-title");

    // Obtener datos de los elementos <meta>
    // Este comprueba si estamos en el archivo "index.php", para cambiar el enlace de "./" a "../" más adelante
    let indexMeta = document.getElementsByName("index")[0];
    let isIndex = (indexMeta != undefined && indexMeta.content == "true");
    // Obtener el nombre de usuario
    let username = document.getElementsByName("username")[0].content;

    // Cambiar los datos de los elementos
    headerTitle.innerHTML = WELCOME_MESSAGE.replace("{USERNAME}", username)
    loginButton.innerHTML = LOGOUT_BUTTON_TEXT;
    loginButton.href = (isIndex) ? logoutURL : "." + logoutURL;
}

