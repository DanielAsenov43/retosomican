<?php
$GLOBALS["FILENAME"] = "SETA_{ID}.png";
$GLOBALS["ARTISTIC-GALLERY-PATH"] = "../Images/GaleriaArtistica/";

$RESULT_SUCCESS_MESSAGE = "¡La foto se ha subido con éxito!";
$RESULT_ERROR_MESSAGE = "Ha surgido un error al intentar subir la seta.";

$servername = "localhost";
$username = "root";
$password = "";
$database = "retosomican";
// Crear la conexión
$connection = new mysqli($servername, $username, $password, $database);

if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) session_start();

if(!isset($_SESSION["LOGGED-IN"])){
    // Si el usuario no está registrado
    header('location: ../Pages/accesoSocios.php');
}

$IDQuery = "SELECT COUNT(IDSeta) FROM retosomican.fotosSetas";
$result = mysqli_fetch_row(mysqli_query($connection, $IDQuery));
$ID = $result[0] + 1;

$IDLegado = $_SESSION["USER-ID"];

// Campos obligatorios
uploadImage("uploadedImage", $GLOBALS["ARTISTIC-GALLERY-PATH"], $ID);

// Campos opcionales
$comentario = getPostInfo("comentario", true);

// Consulta:
$query = "
INSERT INTO retosomican.fotosSetas (IDSeta, IDSocio, registrada, comentario) VALUES
($ID, $IDLegado, TRUE, $comentario)
";

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
    if(!isset($_POST[$name])) header("location: ../Pages/subirFotoArtistica.php");
    return ($isString) ? "\"".$_POST[$name]."\"" : $_POST[$name];
}

// Si el campo es opcional y no se ha rellenado, devolverá "NULL"
function getPostInfo($name, $isString) {
    if(!isset($_POST[$name])) return "\"\"";
    return ($isString) ? "\"".$_POST[$name]."\"" : $_POST[$name];
}

// Función que sube una imagen a la carpeta 
function uploadImage($formPathName, $filePath, $imageID) {
    $image = $_FILES[$formPathName];
    $imageName = str_replace("{ID}", $imageID, $GLOBALS["FILENAME"]);
    move_uploaded_file($image["tmp_name"], $filePath . $imageName);
}
?>