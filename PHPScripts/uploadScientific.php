<?php
include "./connection.php"; // Ejecutar el código en connection.php para crear una sesión
$connection = $_SESSION["SQL"]; // Guardar la sesión en una variable

$GLOBALS["FILENAME"] = "SETA_{ID}.png"; // Formato del nombre de la foto de la seta
$GLOBALS["SCIENTIFIC-GALLERY-PATH"] = "../Images/GaleriaCientifica/"; // Ruta de la galería donde se guardarán las imágenes

$RESULT_SUCCESS_MESSAGE = "¡La seta ha sido enviada con éxito!";
$RESULT_SUCCESS_COMMENT = "Gracias por tu colaboración. La información ha sido enviada correctamente y será revisada por nuestro equipo.";
$RESULT_ERROR_MESSAGE = "Ha surgido un error al intentar subir la seta";
$RESULT_ERROR_COMMENT = "Se ha producido un error interno a la hora de subir la seta. Por favor, inténtelo más tarde o contacte con un administrador.";

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

$imageData = $_SESSION["SCIENTIFIC-PICTURE-SRC"];
unset($_SESSION["SCIENTIFIC-PICTURE-SRC"]);
uploadImage($GLOBALS["SCIENTIFIC-GALLERY-PATH"], str_replace("{ID}", $ID, $GLOBALS["FILENAME"]), $imageData);

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
    $_SESSION["RESULT-COMMENT"] = $RESULT_SUCCESS_COMMENT;
}
else {
    $_SESSION["RESULT"] = "<span class='error'>".$RESULT_ERROR_MESSAGE."</span>";
    $_SESSION["RESULT-COMMENT"] = $RESULT_ERROR_COMMENT;
}

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
?>