<?php
/*
    Este script es llamado por uploadImage.js, pasando por parámetro
*/

// Confirmar que la sesión se ha iniciado
if(!session_id()) session_start();

// Si no se ha recibido información por el método POST, no seguir ejecutando el script.
if(!$_SERVER["REQUEST_METHOD"] == "POST") return;

// Cargamos en la sesión todas las posibles imágenes recortadas con sus etiquetas personalizadas.
loadSessionImage("ARTISTIC-PICTURE-SRC");
loadSessionImage("SCIENTIFIC-PICTURE-SRC");

// Función original: https://www.blazingcoders.com/blog/convert-base64-data-to-image-file-and-write-to-folder-in-php.html
// Obtiene la información de $_POST[$sourceTag], dependiendo de lo que se haya pasado por parámetro.
// La información es una cadena en base64 pasada por JS, resultante de recortar una imagen con cropper.js, que
// es limpiada y decodificada antes de ser guardada en la sesión. Además de eso, se guarda la cadena original
// con la etiqueta $sourceTag . "-RAW" para poder cambiar algunos elementos de forma provisional mientras se actualizan los archivos.
function loadSessionImage($sourceTag) {
    if(!isset($_POST[$sourceTag])) return;
    $imageData = $_POST[$sourceTag];
    $_SESSION[$sourceTag . "-RAW"] = $imageData;
    list($type, $imageData) = explode(';', $imageData);
    list(, $imageData)= explode(',', $imageData);
    $_SESSION[$sourceTag] = base64_decode($imageData);
}
?>