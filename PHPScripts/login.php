<?php
include "./connection.php";

if(!isset($_POST["email"]) || !isset( $_POST["password"])){
    // Si falta algún dato, volver a la página de acceso
    header('location: ../Pages/accesoSocios.php');
}

$userEmail = $_POST["email"];
$userPassword = $_POST["password"];

$emailQuery = "SELECT * FROM retosomican.socios WHERE email LIKE \"" . $userEmail . "\"";
$result = mysqli_query($_SESSION["SQL"], $emailQuery);

if(mysqli_num_rows($result) <= 0) { // No existe un usuario registrado con ese correo
    // Error: correo no registrado
    $_SESSION["ERROR-LOGIN"] = "¡Correo incorrecto!";
    header("location: ../Pages/accesoSocios.php");
    return;
}

$row = mysqli_fetch_array($result);

if($row[6] == null || $row[6] == "") { // El usuario ya tiene contraseña (se ha registrado)
    if(password_verify($userPassword, $row[5])) {
        // Si la contraseña coincide:
        setSessionInfo($row[0], $row[1], $row[2], $row[3], true);
        $_SESSION["USER-PASSWORD"] = $row[5];
        header("location: ../Pages/galeriaCientifica.php");

    } else wrongPassword();
} else {
    if(intval($userPassword) == $row[6]) {
        setSessionInfo($row[0], $row[1], $row[2], $row[3], false);
        header("location: ../Pages/crearContrasenia.php");

    } else wrongPassword();
}

function setSessionInfo($userID, $userName, $userSurname, $userEmail, $loggedIn) {
    if($loggedIn) $_SESSION["LOGGED-IN"] = true;
    $_SESSION["USER-ID"] = $userID;
    $_SESSION["USER-NAME"] = $userName;
    $_SESSION["USER-SURNAME"] = $userSurname;
    $_SESSION["USER-EMAIL"] = $userEmail;
}
function wrongPassword() {
    $_SESSION["ERROR-LOGIN"] = "¡Contraseña incorrecta!";
    header("location: ../Pages/accesoSocios.php");
}
?>