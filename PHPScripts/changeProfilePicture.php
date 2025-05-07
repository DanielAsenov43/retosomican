<?php
$html = file_get_contents("../Pages/pfptest.php");
preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $html, $images);
foreach( $images as $image ) {
    echo $image;
}
return;

$data = "";
if($data != "") {
    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);
    
    file_put_contents('../Images/test2.png', $data);
}

?>