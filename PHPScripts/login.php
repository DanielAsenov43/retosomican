<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "retosomican";
// Create connection
$connection = new mysqli($servername, $username, $password, $database);

if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) session_start();

if(!isset($_POST["email"]) || !isset( $_POST["password"])){
    // Si falta algún dato, volver a la página de acceso
    header('location: ../Pages/accesoSocios.php');
}

$userEmail = $_POST["email"];
$userPassword = $_POST["password"];

$emailQuery = "SELECT * FROM retosomican.socios WHERE email LIKE \"" . $userEmail . "\"";
$result = mysqli_query($connection, $emailQuery);

if(mysqli_num_rows($result) > 0) { // Existe un usuario registrado con ese correo
    $row = mysqli_fetch_array($result);
    if($userPassword == $row[4]) {
        $_SESSION["USER-ID"] = $row[0];
        $_SESSION["USER-NAME"] = $row[1];
        $_SESSION["USER-EMAIL"] = $userEmail;
        echo "<script>console.log('a');</script>";
        header("location: ../Pages/galeriaCientifica.php");
    } else {
        // Error: contraseña incorrecta
        $_SESSION["ERROR-LOGIN"] = "¡Contraseña incorrecta!";
        header("location: ../Pages/accesoSocios.php");
    }
} else {
    // Error: correo no registrado
    $_SESSION["ERROR-LOGIN"] = "¡Correo incorrecto!";
    header("location: ../Pages/accesoSocios.php");
}
?>