<?php
    if(!session_id()) session_start();

    $loggedIn = isset($_SESSION["LOGGED-IN"]);
    $imageSource = ($loggedIn) ? "../Images/FotosDePerfil/SOCIO_" . $_SESSION["USER-ID"] . ".png" : "../Images/user-default.png";
    $username = ($loggedIn) ? $_SESSION["USER-NAME"] : "Iniciar Sesión";

    echo "<div class='profile-image-container'>";
    echo "<img src='$imageSource'></img>";
    echo "</div>";
    echo "<span class='username'>$username</span>";
?>