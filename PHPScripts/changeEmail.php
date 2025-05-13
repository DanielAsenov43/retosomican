<?php
// Ejecutar el script "connection.php" que crea una sesión y guarda la conexión en $_SESSION["SQL"]
include "./connection.php";
$connection = $_SESSION["SQL"];

// Constantes con los distintos mensajes de error o éxito, se pueden cambiar
$ERROR_SAME_EMAIL = "¡El correo nuevo debe ser distinto!";
$ERROR_OLD_EMAIL_DOES_NOT_MATCH = "¡El correo actual no coincide!";
$ERROR_NEW_EMAIL_IN_USE = "¡El correo nuevo no es válido!";
$ERROR_PASSWORD_DOES_NOT_MATCH = "¡La contraseña no es correcta!";
$ERROR_DDBB_CONNECTION = "¡Se ha producido un error interno!";
$CHANGE_SUCCESS = "¡El correo se ha actualizado!";

// Información del formulario de cambio de correo
$oldEmail = $_POST["email-old"];
$newEmail = $_POST["email-new"];
$password = $_POST["email-password"];

// COMPROBACIONES =================================================================

// Si el correo antiguo no coincide con el correo de confirmación del formulario, mostrar un error
if(!compare($oldEmail, $_SESSION["USER-EMAIL"])) {
    setResult($ERROR_OLD_EMAIL_DOES_NOT_MATCH, true);
    return;
}
// Si el correo antiguo y el correo nuevo son iguales, mostrar un error ya que el correo nuevo debe ser distinto
if(compare($oldEmail, $newEmail)) {
    setResult($ERROR_SAME_EMAIL, true);
    return;
}
// Si la contraseña del formulario no coincide con la contraseña de socio, mostrar un error
if(!password_verify($password, $_SESSION["USER-PASSWORD"])) {
    setResult($ERROR_PASSWORD_DOES_NOT_MATCH, true);
    return;
}
// Crear una consulta que obtiene todos los socios con el correo nuevo. Si hay más de 0 socios con ese correo, mostrar un error.
$userEmailsQuery = "SELECT * FROM retosomican.socios WHERE email LIKE '$newEmail'";
$result = mysqli_query($connection, $userEmailsQuery);
if(mysqli_num_rows($result) > 0) { // Comprobar si hay algún socio con el correo nuevo. En caso positivo, mostrar un error
    setResult($ERROR_NEW_EMAIL_IN_USE, true);
    return;
}

// FIN DE COMPROBACIONES ===========================================================

// Creamos la consulta para cambiar el correo del socio
$changeEmailQuery = "UPDATE retosomican.socios SET email = '$newEmail' WHERE ID = " . $_SESSION["USER-ID"];
// Ejecutamos la consulta comprobando si surgen errores
if($connection -> query($changeEmailQuery)) {
    // Si no hay errores, mostramos un mensaje de éxito y actualizamos el correo de la sesión
    setResult($CHANGE_SUCCESS, false);
    $_SESSION["USER-EMAIL"] = $newEmail;
}
// En caso contrario, mostrar un error de conexión con la BBDD
else setResult($ERROR_DDBB_CONNECTION, true);

// FUNCIONES =====================================================

// Función que compara dos cadenas ignorando mayúsculas, utilizado mayoritariamente para correos
function compare($string1, $string2) {
    return strtolower($string1) == strtolower($string2);
}

// Función que le establece un valor a $_SESSION["CHANGE-RESULT"] dependiendo de si $isError es verdadero o falso, y te lleva a la página del perfil.
function setResult($message, $isError) { 
    if($isError) $_SESSION["CHANGE-RESULT"] = "<span class='error'>$message</span>";
    else $_SESSION["CHANGE-RESULT"] = "<span class='success'>$message</span>";
    header("location: ../Pages/perfil.php");
}
?>