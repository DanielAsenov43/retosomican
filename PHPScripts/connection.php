<?php
// Este es el script principal que crea una sesión y una conexión con la BBDD.
// No es lo más seguro pero es lo más sencillo.

// Constantes de la BBDD
$nombreHost = "localhost";
$usuario = "root";
$contrasenia = "";
$nombreBBDD = "retosomican";
// Crear la sesión si no existe
if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE || !session_id()) session_start();
// Iniciar la conexión y guardarla en la sesión para que pueda ser utilizada en todas partes.
$_SESSION["SQL"] = new mysqli($nombreHost, $usuario, $contrasenia, $nombreBBDD);
?>