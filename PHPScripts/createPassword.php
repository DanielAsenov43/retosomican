<?php
include "./connection.php";
$ERROR_PASSWORDS_DO_NOT_MATCH = "¡Las contraseñas no coinciden!";
$ERROR_QUERY = "¡Se ha producido un error interno!";
$CHANGE_SUCCESS = "Se ha cambiado la contraseña. Por favor inicie sesión de nuevo.";

$connection = $_SESSION["SQL"];

// POST INFO
$password = $_POST["password"];
$passwordConfirm = $_POST["password-confirm"];

if ($password != $passwordConfirm) {
    showError($ERROR_PASSWORDS_DO_NOT_MATCH);
    return;
}

if(str_contains($password, " ")) {
    showError("¡La contraseña no debe contener espacios!");
    return;
}

if($password == strtolower($password)) {
    showError("¡La contraseña debe contener al menos una letra mayúscula!");
    return;
}

// Encriptación
$password = password_hash($password, PASSWORD_DEFAULT);

$createPasswordQuery = "UPDATE retosomican.socios SET contrasenia = '$password', clave = NULL WHERE ID = " . $_SESSION["USER-ID"];
if($connection -> query($createPasswordQuery)) {
    $_SESSION["USER-PASSWORD"] = $password;
    $_SESSION["ERROR-LOGIN"] = $CHANGE_SUCCESS;
    copy("../Images/user-default.png", "../Images/FotosDePerfil/SOCIO_".$_SESSION["USER-ID"].".png");
} else {
    $_SESSION["ERROR-LOGIN"] = $ERROR_QUERY;
}
header("location: ../Pages/accesoSocios.php");

function showError($errorMessage) {
    $_SESSION["ERROR-LOGIN"] = $errorMessage;
    header("location: ../Pages/crearContrasenia.php");
}
?>