<?php
include "./connection.php";

$ERROR_SAME_PASSWORD = "¡La contraseña nueva debe ser distinta de la actual!";
$ERROR_OLD_PASSWORD_DOES_NOT_MATCH = "¡La contraseña actual no coincide!";
$ERROR_PASSWORD_DOES_NOT_MATCH = "¡Las contraseñas nuevas no coinciden!";
$ERROR_DDBB_CONNECTION = "¡Se ha producido un error interno!";
$CHANGE_SUCCESS = "¡La contraseña se ha actualizado!";

$connection = $_SESSION["SQL"];

// POST INFO
$oldPassword = $_POST["password-old"];
$newPassword = $_POST["password-new"];
$newPasswordConfirm = $_POST["password-new-confirm"];

if(!password_verify($oldPassword, $_SESSION["USER-PASSWORD"])) {
    setResult($ERROR_OLD_PASSWORD_DOES_NOT_MATCH, true);
    return;
}
if($oldPassword == $newPassword) {
    setResult($ERROR_SAME_PASSWORD, true);
    return;
}

if(str_contains($newPassword, " ")) {
    setResult("¡La contraseña no debe contener espacios!", true);
    return;
}
if($newPassword == strtolower($newPassword)) {
    setResult("¡La contraseña debe contener al menos una letra mayúscula!", true);
    return;
}

if($newPassword != $newPasswordConfirm) {
    setResult($ERROR_PASSWORD_DOES_NOT_MATCH, true);
    return;
}

$newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
$changePasswordQuery = "UPDATE retosomican.socios SET contrasenia = '$newPassword' WHERE ID = " . $_SESSION["USER-ID"];
if($connection -> query($changePasswordQuery)) {
    setResult($CHANGE_SUCCESS, false);
    $_SESSION["USER-PASSWORD"] = $newPassword;
}
else setResult($ERROR_DDBB_CONNECTION, true);

function setResult($message, $isError) { 
    if($isError) $_SESSION["CHANGE-RESULT"] = "<span class='error'>$message</span>";
    else $_SESSION["CHANGE-RESULT"] = "<span class='success'>$message</span>";
    header("location: ../Pages/profile.php");
}
?>