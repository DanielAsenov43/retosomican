<?php
if(!session_id()) session_start();

if(!$_SERVER["REQUEST_METHOD"] == "POST") return;

loadSessionImage("ARTISTIC-PICTURE-SRC");
loadSessionImage("SCIENTIFIC-PICTURE-SRC");

function loadSessionImage($sourceTag) {
    // https://www.blazingcoders.com/blog/convert-base64-data-to-image-file-and-write-to-folder-in-php.html
    if(!isset($_POST[$sourceTag])) return;
    $imageData = $_POST[$sourceTag];
    $_SESSION[$sourceTag . "-RAW"] = $imageData;
    list($type, $imageData) = explode(';', $imageData);
    list(, $imageData)= explode(',', $imageData);
    $_SESSION[$sourceTag] = base64_decode($imageData);
}
?>