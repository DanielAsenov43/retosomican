<?php
// Ejecutar el script "connection.php" que crea una sesión y guarda la conexión en $_SESSION["SQL"]
include "./connection.php";

// Constantes con los distintos mensajes de error o éxito, se pueden cambiar
$ERROR_SAME_PASSWORD = "¡La contraseña nueva debe ser distinta de la actual!";
$ERROR_OLD_PASSWORD_DOES_NOT_MATCH = "¡La contraseña actual no coincide!";
$ERROR_PASSWORD_DOES_NOT_MATCH = "¡Las contraseñas nuevas no coinciden!";
$ERROR_PASSWORD_CONTAINS_SPACES = "¡La contraseña no debe contener espacios!";
$ERROR_PASSWORD_MUST_CONTAIN_UPPERCASE = "¡La contraseña debe contener al menos una letra mayúscula!";
$ERROR_DDBB_CONNECTION = "¡Se ha producido un error interno!";
$CHANGE_SUCCESS = "¡La contraseña se ha actualizado!";

// Información del formulario de cambio de contraseña
$oldPassword = $_POST["password-old"];
$newPassword = $_POST["password-new"];
$newPasswordConfirm = $_POST["password-new-confirm"];

// COMPROBACIONES =================================================================

// Si la contraseña del socio no coincide con la contraseña introducida en el formulario, mostrar un error
if(!password_verify($oldPassword, $_SESSION["USER-PASSWORD"])) {
    setResult($ERROR_OLD_PASSWORD_DOES_NOT_MATCH, true);
    return;
}
// Si la contraseña nueva es igual que la antigua, mostrar un error.
if($oldPassword == $newPassword) {
    setResult($ERROR_SAME_PASSWORD, true);
    return;
}
// Si la contraseña contiene un espacio, mostrar un error
if(str_contains($newPassword, " ")) {
    setResult($ERROR_PASSWORD_CONTAINS_SPACES, true);
    return;
}
// Si la contraseña es igual que la contraseña en minúscula, mostrar un mensaje de error porque debe contener al menos una mayúscula.
// Este filtro también comprueba si la contraseña son solo números, ya que "123" es igual que "123" en minúsculas y mostrará un error.
if($newPassword == strtolower($newPassword)) {
    setResult($ERROR_PASSWORD_MUST_CONTAIN_UPPERCASE, true);
    return;
}
// Si las contraseñas nuevas no coinciden, mostrar un error.
if($newPassword != $newPasswordConfirm) {
    setResult($ERROR_PASSWORD_DOES_NOT_MATCH, true);
    return;
}

// FIN DE COMPROBACIONES ===========================================================

// Encriptamos la contraseña nueva antes de enviarla a la base de datos
$newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

// Creamos la línea de actualización de SQL que le cambia la contraseña al socio
$changePasswordQuery = "UPDATE retosomican.socios SET contrasenia = '$newPassword' WHERE ID = " . $_SESSION["USER-ID"];
// Ejecutamos la actualización y comprobamos si da error.
if($_SESSION["SQL"] -> query($changePasswordQuery)) {
    // Si no da error, mostramos un mensaje de cambio exitoso y apuntamos la nueva contraseña en la sesión.
    setResult($CHANGE_SUCCESS, false);
    $_SESSION["USER-PASSWORD"] = $newPassword;
}
// Si da error, enviamos un mensaje de error y volvemos al perfil
else setResult($ERROR_DDBB_CONNECTION, true);
// Después del cambio de contraseña, volvemos al perfil del socio
header("location: ../Pages/perfil.php");

// FUNCIONES =======================================================================

// Función que cambia la variable de sesión "CHANGE-RESULT", y añade un span cuya clase cambia dependiendo de $isError
function setResult($message, $isError) {
    if($isError) $_SESSION["CHANGE-RESULT"] = "<span class='error'>$message</span>";
    else $_SESSION["CHANGE-RESULT"] = "<span class='success'>$message</span>";
}
?>