<?php
if(!session_id()) session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ARTISTIC-PICTURE-SRC"]) && !isset($_SESSION["ARTISTIC-PICTURE-SRC"])) {
    $imageData = $_POST["ARTISTIC-PICTURE-SRC"];
    list($type, $imageData) = explode(';', $imageData);
    list(, $imageData)      = explode(',', $imageData);
    $_SESSION["ARTISTIC-PICTURE-SRC"] = base64_decode($imageData);
}
?>