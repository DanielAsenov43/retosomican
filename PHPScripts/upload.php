<?php

include "./connection.php";
$connection = $_SESSION["SQL"];

$GLOBALS["FILENAME"] = "SETA_{ID}.png";
$GLOBALS["SCIENTIFIC-GALLERY-PATH"] = "../Images/GaleriaCientifica/";

$RESULT_SUCCESS_MESSAGE = "¡La seta se ha subido con éxito!";
$RESULT_ERROR_MESSAGE = "Ha surgido un error al intentar subir la seta.";

if(!isset($_SESSION["LOGGED-IN"])){
    // Si el usuario no está registrado
    header('location: ../Pages/accesoSocios.php');
}

$IDQuery = "SELECT COUNT(ID) FROM retosomican.setas";
$result = mysqli_fetch_row(mysqli_query($connection, $IDQuery));
$ID = $result[0] + 1;

$IDLegado = $_SESSION["USER-ID"];
// Campos obligatorios
$nombreCientifico = getRequiredPostInfo("nombre-cientifico", true);
$fechaRecogida = getRequiredPostInfo("fecha", true);
$lugarRecogida = getRequiredPostInfo("lugar", true);
$habitat = getRequiredPostInfo("habitat", true);
$alturaMar = getRequiredPostInfo("altura", false);
uploadImage("uploadedImage", $GLOBALS["SCIENTIFIC-GALLERY-PATH"], $ID);

// Campos opcionales
$nombreComun = getPostInfo("nombre-comun", true);
$olor = getPostInfo("olor", true);
$sabor = getPostInfo("sabor", true);
$suelo = getPostInfo("suelo", true);
$clima = getPostInfo("clima", true);
$observaciones = getPostInfo("observaciones", true);

// Consulta:
$query = "
INSERT INTO retosomican.setas
(IDLegado, registrada, nombreCientifico, nombreComun, fechaRecogida, lugarRecogida, habitat, alturaMar, 
olor, sabor, tipoSuelo, climatologia, observaciones) VALUES
(".$IDLegado.", TRUE, ".$nombreCientifico.", ".$nombreComun.", ".$fechaRecogida.", ".$lugarRecogida.", ".$habitat.", ".$alturaMar.", 
".$olor.", ".$sabor.", ".$suelo.", ".$clima.", ".$observaciones.")";

// Ejecutar la consulta
if ($connection -> query($query)) {
    $_SESSION["RESULT"] = "<span class='success'>".$RESULT_SUCCESS_MESSAGE."</span>";
} else {
    $_SESSION["RESULT"] = "<span class='error'>".$RESULT_ERROR_MESSAGE."</span>";
}
$connection -> close();
header("location: ../Pages/resultadoSubirSeta.php");

// Funciones que facilitan obtener la información de los campos.
// Si el campo es obligatorio y no se ha rellenado, volverá al formulario
function getRequiredPostInfo($name, $isString) {
    if(!isset($_POST[$name])) header("location: ../Pages/subirSeta.php");
    return ($isString) ? "\"".$_POST[$name]."\"" : $_POST[$name];
}

// Si el campo es opcional y no se ha rellenado, devolverá "NULL"
function getPostInfo($name, $isString) {
    if(!isset($_POST[$name])) return "NULL";
    return ($isString) ? "\"".$_POST[$name]."\"" : $_POST[$name];
}

// Función que sube una imagen a la carpeta 
function uploadImage($formPathName, $filePath, $imageID) {
    $image = $_FILES[$formPathName];
    $imageName = str_replace("{ID}", $imageID, $GLOBALS["FILENAME"]);
    move_uploaded_file($image["tmp_name"], $filePath . $imageName);
}
?>