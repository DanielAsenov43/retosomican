<?php
include "./connection.php";

$GLOBALS["FILENAME"] = "SETA_{ID}.png";
$GLOBALS["ARTISTIC-GALLERY-PATH"] = "../Images/GaleriaArtistica/";

$RESULT_SUCCESS_MESSAGE = "¡La foto se ha subido con éxito!";
$RESULT_ERROR_MESSAGE = "Ha surgido un error al intentar subir la seta.";



if(!isset($_SESSION["LOGGED-IN"])){
    // Si el usuario no está registrado
    header('location: ../Pages/accesoSocios.php');
}

$IDQuery = "SELECT COUNT(IDSeta) FROM retosomican.fotosSetas";
$result = mysqli_fetch_row(mysqli_query($_SESSION["SQL"], $IDQuery));
$ID = $result[0] + 1;
$IDLegado = $_SESSION["USER-ID"];

// Campos obligatorios
$imageData = $_SESSION["ARTISTIC-PICTURE-SRC"];
unset($_SESSION["ARTISTIC-PICTURE-SRC"]);
uploadImage($GLOBALS["ARTISTIC-GALLERY-PATH"], str_replace("{ID}", $ID, $GLOBALS["FILENAME"]), $imageData);


// Campos opcionales
$comentario = getPostInfo("comentario", true);

// Consulta:
$query = "
INSERT INTO retosomican.fotosSetas (IDSeta, IDSocio, registrada, comentario) VALUES
($ID, $IDLegado, TRUE, $comentario)
";

// Ejecutar la consulta
if ($_SESSION["SQL"] -> query($query)) $_SESSION["RESULT"] = "<span class='success'>".$RESULT_SUCCESS_MESSAGE."</span>";
else $_SESSION["RESULT"] = "<span class='error'>".$RESULT_ERROR_MESSAGE."</span>";
header("location: ../Pages/resultadoSubirSeta.php");

// Funciones que facilitan obtener la información de los campos.
// Si el campo es obligatorio y no se ha rellenado, volverá al formulario
function getRequiredPostInfo($name, $isString) {
    if(!isset($_POST[$name])) header("location: ../Pages/subirFotoArtistica.php");
    return ($isString) ? "\"".$_POST[$name]."\"" : $_POST[$name];
}

// Si el campo es opcional y no se ha rellenado, devolverá "NULL"
function getPostInfo($name, $isString) {
    if(!isset($_POST[$name])) return "\"\"";
    return ($isString) ? "\"".$_POST[$name]."\"" : $_POST[$name];
}

// Función que sube una imagen a la carpeta 
function uploadImage($filePath, $fileName, $imageData) {
    file_put_contents($filePath . $fileName, $imageData);
}
?>