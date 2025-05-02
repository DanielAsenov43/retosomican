<?php
session_start();
session_destroy();
$_SESSION["userEmail"] = "";
$_SESSION["username"] = "";
header("location: ../Pages/accesoSocios.php");
?>