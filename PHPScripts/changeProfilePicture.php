<?php
// Ejecutar el script "connection.php" que crea una sesión y guarda la conexión en $_SESSION["SQL"]
include "./connection.php";

// Si se ha recibido información mediante el método POST y el post contiene "PROFILE-PICTURE-SRC",
// obtener los datos del post y decodificar la imagen a partir de esos datos.
// El post "PROFILE-PICTURE-SRC" siempre va a contener el enlace de la imagen en base64
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["PROFILE-PICTURE-SRC"])) {
    $data = $_POST["PROFILE-PICTURE-SRC"];
    decodeImage($data, "SOCIO_".$_SESSION["USER-ID"].".png");
}

// Función inspirada de: https://stackoverflow.com/questions/11511511/how-to-save-a-png-image-server-side-from-a-base64-data-uri
// Obtiene el enlace de la imagen en base64, lo decodifica y crea una imagen a partir de esa información
function decodeImage($base64, $imageName) {
    list($type, $base64) = explode(';', $base64);
    list(, $base64) = explode(',', $base64);
    $data = base64_decode($base64);
    // Crear la imagen en la ruta especificada a partir de la información
    file_put_contents('../Images/FotosDePerfil/'.$imageName, $data);
}
?>