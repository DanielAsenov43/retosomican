<?php
/* !!!
    LA MAYORÍA DEL SCRIPT ES IGUAL QUE "changePassword.php", CONSULTAR ANTES DE LEER.
 !!! */
include "./connection.php";

$DEFAULT_PROFILE_PICTURE = "user-default.png";

$ERROR_PASSWORDS_DO_NOT_MATCH = "¡Las contraseñas no coinciden!";
$ERROR_QUERY = "¡Se ha producido un error interno!";
$CHANGE_SUCCESS = "Se ha cambiado la contraseña. Por favor inicie sesión de nuevo.";

// Obtener la información del formulario
$password = $_POST["password"];
$passwordConfirm = $_POST["password-confirm"];

// COMPROBACIONES =================================================================

// Si las contraseñas nuevas no coinciden
if ($password != $passwordConfirm) {
    showError($ERROR_PASSWORDS_DO_NOT_MATCH);
    return;
}
// Si la contraseña contiene un espacio
if(str_contains($password, " ")) {
    showError("¡La contraseña no debe contener espacios!");
    return;
}
// Si la contraseña no contiene una letra mayúscula
if($password == strtolower($password)) {
    showError("¡La contraseña debe contener al menos una letra mayúscula!");
    return;
}

// FIN DE COMPROBACIONES ==========================================================

// Encriptación de la contraseña con el algoritmo por defecto
$password = password_hash($password, PASSWORD_DEFAULT);
// Creamos la consulta de actualización de contraseña
$createPasswordQuery = "UPDATE retosomican.socios SET contrasenia = '$password', clave = NULL WHERE ID = " . $_SESSION["USER-ID"];
// Mandamos la actualización y comprobamos si han surgido errores
if($_SESSION["SQL"] -> query($createPasswordQuery)) {
    // Si todo ha salido bien, actualizamos los datos
    $_SESSION["USER-PASSWORD"] = $password;
    $_SESSION["ERROR-LOGIN"] = $CHANGE_SUCCESS;
    $_SESSION["LOGGED-IN"] = true;
    // Al registrar a un socio nuevo, creamos una copia de la imagen por defecto y le cambiamos el nombre a SOCIO_{ID}.png
    copy("../Images/".$DEFAULT_PROFILE_PICTURE, "../Images/FotosDePerfil/SOCIO_".$_SESSION["USER-ID"].".png");
    // Mandamos al socio a la galería científica
    header("location: ../Pages/galeriaCientifica.php");
// En caso de error, mostramos el error
} else showError($ERROR_QUERY);

// Función que muestra un mensaje personalizado de error y volver a la página de crear contraseña
function showError($errorMessage) {
    $_SESSION["ERROR-LOGIN"] = $errorMessage;
    header("location: ../Pages/crearContrasenia.php");
}
?>