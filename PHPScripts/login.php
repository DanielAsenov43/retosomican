<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "retosomican";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

session_start();
if(!isset($_SESSION['email']) || !isset( $_SESSION['password'])){
    header('location: ../Pages/accesoSocios.html');
}
$userEmail = $_POST['email'];
$userPassword = $_POST['password'];

$query = "SELECT * FROM retosomican.socios WHERE clave IS NULL AND email LIKE \"" . $userEmail . "\" AND contrasenia LIKE \"" . $userPassword . "\"";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $_SESSION['username'] = $row[1];
    $_SESSION['userEmail'] = $userEmail;
    header("location: ../Pages/galeriaCientifica.php");
} else {
    echo "error";
}
?>