<?php
// Este script se ejecuta al darle al botón de cerrar sesión.
// Si no existe una sesión, por cualquier motivo, la crea y luego la elimina
if(!session_id()) session_start();
session_destroy();
// Luego te manda a la página de acceso
header("location: ../Pages/accesoSocios.php");
?>