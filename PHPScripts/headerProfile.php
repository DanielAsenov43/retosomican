<?php
    if(!session_id()) session_start();

    if (isset($_SESSION["LOGGED-IN"])) {
        echo "<img src='../Images/FotosDePerfil/SOCIO_" . $_SESSION["USER-ID"] . ".png'></img>";
        echo "<span class='username'>" . $_SESSION["USER-NAME"] . "</span>";
    } else {
        echo "<img src='../Images/user-default.png'></img>";
        echo "<span class='username'>Iniciar Sesión</span>";
    }
?>