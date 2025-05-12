<?php
include "./connection.php";
$data = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["PROFILE-PICTURE-SRC"])) {
    $data = $_POST["PROFILE-PICTURE-SRC"];
}

if($data != "") {
    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);

    file_put_contents('../Images/FotosDePerfil/SOCIO_'.$_SESSION["USER-ID"].".png", $data);
}
?>