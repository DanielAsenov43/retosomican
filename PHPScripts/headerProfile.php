<?php
    // Constantes, se pueden cambiar si es necesario.
    $LOGIN_TEXT = "Iniciar Sesión";
    $DEFAULT_IMAGE_NAME = "user-default.png";
    // ----------------------------------------------

    if(!session_id()) session_start();

    // Esta línea añade un punto a la ruta. Es necesario porque el index.php está en una ruta distinta al resto de las páginas
    $folderExtra = (is_dir("./Images")) ? "" : ".";
    // Esta variable booleana comprueba si se ha iniciado sesión o no.
    $loggedIn = isset($_SESSION["LOGGED-IN"]);
    // Establecemos la ruta de la imagen que se va a mostrar, dependiendo de si se ha iniciado sesión o no:
    if($loggedIn) $imageSource = "$folderExtra./Images/FotosDePerfil/SOCIO_" . $_SESSION["USER-ID"] . ".png"; // Si se ha iniciado sesión, mostramos la foto de perfil del socio
    else $imageSource = "$folderExtra./Images/$DEFAULT_IMAGE_NAME"; // En caso contrario, mostramos la imagen por defecto
    // Establecemos el texto dependiendo de si se ha iniciado sesión o no, cambiando entre el nombre de usuario o el texto por defecto definido al principio del script
    $username = ($loggedIn) ? $_SESSION["USER-NAME"] : $LOGIN_TEXT;

    // Creamos los elementos del perfil (imagen y texto)
    echo "<div class='profile-image-container'>";
    echo "<img src='$imageSource' />";
    echo "</div>";
    echo "<span class='username'>$username</span>";
?>