<?php
// Ejecutar el script "connection.php" que crea una sesión y guarda la conexión en $_SESSION["SQL"]
include "./connection.php";
// Variables globales dentro de este script
$AUTO_REGISTER_MUSHROOM = false; 
$GLOBALS["FILENAME"] = "SETA_{ID}.png"; // Formato del nombre de las fotos, cambiando {ID} por la ID de la seta
$GLOBALS["ARTISTIC-GALLERY-PATH"] = "../Images/GaleriaArtistica/"; // Ruta del lugar donde se guardan las fotos

// Mensajes del resultado de enviar el formulario
$GLOBALS["RESULT-SUCCESS-MESSAGE"] = "¡La foto se ha enviado con éxito!";
$GLOBALS["RESULT-SUCCESS-COMMENT"] = "La foto ha sido enviada y será revisada por un administrador. Muchas gracias por su aportación.";
$GLOBALS["RESULT-ERROR-MESSAGE"] = "Ha surgido un error al subir la foto";
$GLOBALS["RESULT-ERROR-COMMENT"] = "La imagen no ha podido ser enviada por un error interno. Por favor, inténtelo de nuevo más tarde o contacte a un administrador.";

// Si el usuario no ha iniciado sesión por cualquier motivo, mandarle a iniciar sesión
if(!isset($_SESSION["LOGGED-IN"])) header('location: ../Pages/accesoSocios.php');

// Consulta que obtiene el número de setas de la BBDD, tanto registradas como no registradas, para calcular la ID de la seta nueva
$IDQuery = "SELECT COUNT(IDSeta) FROM retosomican.fotosSetas";
$result = mysqli_fetch_row(mysqli_query($_SESSION["SQL"], $IDQuery));
// La ID de la seta es igual al número de setas existentes + 1, ya que si hay 25 setas, esta será la seta 26.
$ID = $result[0] + 1;
$IDLegado = $_SESSION["USER-ID"]; // También obtenemos y guardamos la ID del legado para saber quién ha subido la foto.
$autoRegister = ($AUTO_REGISTER_MUSHROOM) ? "TRUE" : "FALSE";

// IMAGEN -----------------------------------------------------------------------------
// IMPORTANTE: La fuente de la imagen recortada es gestionada por "uploadMushroomImage.php"
// Ese script recibe directamente las variables desde JS y las guarda en $_SESSION 
$imageData = $_SESSION["ARTISTIC-PICTURE-SRC"]; // Enlace desencriptado de la imagen
unset($_SESSION["ARTISTIC-PICTURE-SRC"]); // Eliminamos la imagen de la sesión una vez que se haya subido la seta

// Sustituir {ID} en el nombre de la imagen por la ID de la seta y luego guardamos la imagen
$imageName = str_replace("{ID}", $ID, $GLOBALS["FILENAME"]);
uploadImage($GLOBALS["ARTISTIC-GALLERY-PATH"], $imageName, $imageData);

// Obtenemos el comentario del formulario si existe. El parámetro $isString envuelve el texto en comillas.
$comentario = getPostInfo("comentario", true);

// Consulta de inserción:
$query = "INSERT INTO retosomican.fotosSetas (IDSeta, IDSocio, registrada, comentario) VALUES ($ID, $IDLegado, $autoRegister, $comentario)";

// Ejecutar la consulta:
// Si la consulta se ha ejecutado correctamente, el resultado 
if ($_SESSION["SQL"] -> query($query)) setResult(true);
else  setResult(false);

// Una vez enviado, enviar al socio a la página del resultado
header("location: ../Pages/resultadoSubirSeta.php");

// FUNCIONES ===================================================================

// Si el campo es opcional y no se ha rellenado, devolverá "NULL"
function getPostInfo($name, $isString) {
    if(!isset($_POST[$name])) return "\"\"";
    return ($isString) ? "\"".$_POST[$name]."\"" : $_POST[$name];
}

// Función que sube una imagen a la carpeta 
function uploadImage($filePath, $fileName, $imageData) {
    file_put_contents($filePath . $fileName, $imageData);
}

// Función que cambia el resultado de la variable de sesión dependiendo del valor de $isError
function setResult($success) {
    if($success) {
        $_SESSION["RESULT"] = "<span class='success'>".$GLOBALS["RESULT-SUCCESS-MESSAGE"]."</span>";
        $_SESSION["RESULT-COMMENT"] = $GLOBALS["RESULT-SUCCESS-COMMENT"];
    } else {
        $_SESSION["RESULT"] = "<span class='error'>".$GLOBALS["RESULT-ERROR-MESSAGE"]."</span>";
        $_SESSION["RESULT-COMMENT"] = $GLOBALS["RESULT-ERROR-COMMENT"];
    }
}
?>