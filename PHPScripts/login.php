<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "retosomican";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

session_start();
$userEmail = $_POST['email'];
$userPassword = $_POST['password'];

$query = "SELECT * FROM retosomican.socios WHERE email LIKE \"".$userEmail."\" AND contrasenia LIKE \"".$userPassword."\"";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0) {
    $_SESSION['userEmail'] = $userEmail;
    header("location: ../Pages/galeriaCientifica.php");
} else {
    echo "error";
}
?>