<?php
// Establecer una conexión con la BBDD
$nombreHost = "localhost";
$usuario = "root";
$contrasenia = "";
$nombreBBDD = "retosomican";
// Crear la sesión
if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE || !session_id()) session_start();
// Iniciar la conexión
if(!isset($_SESSION["SQL"])) {
    $_SESSION["SQL"] = new mysqli($nombreHost, $usuario, $contrasenia, $nombreBBDD);
}
?>