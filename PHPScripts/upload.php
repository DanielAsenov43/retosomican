<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "retosomican";
// Create connection
$connection = new mysqli($servername, $username, $password, $database);

if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) session_start();

if(!isset($_SESSION["USER-EMAIL"])){
    // Si el usuario no está registrado
    header('location: ../Pages/accesoSocios.php');
}

$IDLegado = $_SESSION["USER-ID"];
// Campos obligatorios
$nombreCientifico = getRequiredPostInfo("nombre-cientifico", true);
$fechaRecogida = getRequiredPostInfo("fecha", true);
$lugarRecogida = getRequiredPostInfo("lugar", true);
$habitat = getRequiredPostInfo("habitat", true);
$alturaMar = getRequiredPostInfo("altura", false);

// Campos opcionales
$nombreComun = getPostInfo("nombre-comun", true);
$olor = getPostInfo("olor", true);
$sabor = getPostInfo("sabor", true);
$suelo = getPostInfo("suelo", true);
$clima = getPostInfo("clima", true);
$observaciones = getPostInfo("observaciones", true);

$query = "
INSERT INTO retosomican.setas
(IDLegado, registrada, nombreCientifico, nombreComun, fechaRecogida, lugarRecogida, habitat, alturaMar, 
olor, sabor, tipoSuelo, climatologia, observaciones) VALUES
(".$IDLegado.", TRUE, ".$nombreCientifico.", ".$nombreComun.", ".$fechaRecogida.", ".$lugarRecogida.", ".$habitat.", ".$alturaMar.", 
".$olor.", ".$sabor.", ".$suelo.", ".$clima.", ".$observaciones.")";

$connection -> query($query);
$connection -> close();
header("location: ../Pages/galeriaCientifica.php");

function getRequiredPostInfo($name, $isString) {
    if(!isset($_POST[$name])) header("location: ../Pages/subirSeta.php");
    return ($isString) ? "\"".$_POST[$name]."\"" : $_POST[$name];
}

function getPostInfo($name, $isString) {
    if(!isset($_POST[$name])) return "NULL";
    return ($isString) ? "\"".$_POST[$name]."\"" : $_POST[$name];
}
?>