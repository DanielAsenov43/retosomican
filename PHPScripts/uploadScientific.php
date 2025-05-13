<?php
/*
                                !!! IMPORTANTE !!!
           La mayoría de este código ya ha sido explicado en "uploadArtistic.php".
    Los comentarios que hay son por cuestiones de organización o para comentar algo nuevo,
                  pero no son tan detallados como los del otro script.
*/
include "./connection.php"; // Ejecutar el código en connection.php para crear una sesión
$connection = $_SESSION["SQL"]; // Guardar la sesión en una variable

$AUTO_REGISTER_MUSHROOM = true; // Variable que controla si las setas se aprueban automáticamente
$GLOBALS["FILENAME"] = "SETA_{ID}.png"; // Formato del nombre de la foto de la seta
$GLOBALS["SCIENTIFIC-GALLERY-PATH"] = "../Images/GaleriaCientifica/"; // Ruta de la galería donde se guardarán las imágenes

$RESULT_SUCCESS_MESSAGE = "¡La seta ha sido enviada con éxito!";
$RESULT_SUCCESS_COMMENT = "Gracias por tu colaboración. La información ha sido enviada correctamente y será revisada por nuestro equipo.";
$RESULT_ERROR_MESSAGE = "Ha surgido un error al intentar subir la seta";
$RESULT_ERROR_COMMENT = "Se ha producido un error interno a la hora de subir la seta. Por favor, inténtelo más tarde o contacte con un administrador.";

if(!isset($_SESSION["LOGGED-IN"])) header('location: ../Pages/accesoSocios.php');

// Obtenemos la nueva ID de la seta
$IDQuery = "SELECT COUNT(ID) FROM retosomican.setas";
$result = mysqli_fetch_row(mysqli_query($connection, $IDQuery));
$ID = $result[0] + 1;

// DATOS DEL FORMULARIO =========================================================

$IDLegado = $_SESSION["USER-ID"];
// Campos obligatorios
$nombreCientifico = getRequiredPostInfo("nombre-cientifico", true);
$fechaRecogida = getRequiredPostInfo("fecha", true);
$lugarRecogida = getRequiredPostInfo("lugar", true);
$habitat = getRequiredPostInfo("habitat", true);
$alturaMar = getRequiredPostInfo("altura", false);

// Gestión de la imagen subida, procedente de uploadMushroomImage.php
$imageData = $_SESSION["SCIENTIFIC-PICTURE-SRC"];
unset($_SESSION["SCIENTIFIC-PICTURE-SRC"]);
$imageName = str_replace("{ID}", $ID, $GLOBALS["FILENAME"]);
uploadImage($GLOBALS["SCIENTIFIC-GALLERY-PATH"], $imageName, $imageData);

// Campos opcionales
$nombreComun = getPostInfo("nombre-comun", true);
$olor = getPostInfo("olor", true);
$sabor = getPostInfo("sabor", true);
$suelo = getPostInfo("suelo", true);
$clima = getPostInfo("clima", true);
$observaciones = getPostInfo("observaciones", true);
$autoRegister = ($AUTO_REGISTER_MUSHROOM) ? "TRUE" : "FALSE";

// ================================================================================

// Consulta principal:
$query = "INSERT INTO retosomican.setas
(IDLegado, registrada, nombreCientifico, nombreComun, fechaRecogida, lugarRecogida, habitat, alturaMar, 
olor, sabor, tipoSuelo, climatologia, observaciones) VALUES
($IDLegado, $autoRegister, $nombreCientifico, $nombreComun, $fechaRecogida, $lugarRecogida, $habitat, $alturaMar, 
$olor, $sabor, $suelo, $clima, $observaciones)";

// Ejecutar la consulta y cambiar el resultado si surge algún error
if ($connection -> query($query)) showResult($RESULT_SUCCESS_MESSAGE, $RESULT_SUCCESS_COMMENT, false);
else showResult($RESULT_ERROR_MESSAGE, $RESULT_ERROR_COMMENT, true);

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
function uploadImage($filePath, $fileName, $imageData) {
    file_put_contents($filePath . $fileName, $imageData);
}

function showResult($message, $comment, $isError) {
    if(!$isError) $_SESSION["RESULT"] = "<span class='success'>$message</span>";
    else $_SESSION["RESULT"] = "<span class='error'>$message</span>";
    $_SESSION["RESULT-COMMENT"] = $comment;
}
?>