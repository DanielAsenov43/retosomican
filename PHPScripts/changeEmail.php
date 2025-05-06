<?php
include "./connection.php";
$ERROR_SAME_EMAIL = "¡El correo nuevo debe ser distinto!";
$ERROR_OLD_EMAIL_DOES_NOT_MATCH = "¡El correo actual no coincide!";
$ERROR_NEW_EMAIL_IN_USE = "¡El correo nuevo no es válido!";
$ERROR_DDBB_CONNECTION = "¡Se ha producido un error interno!";
$CHANGE_SUCCESS = "¡El correo se ha actualizado!";

$connection = $_SESSION["SQL"];

// POST INFO
$oldEmail = $_POST["email-old"];
$newEmail = $_POST["email-new"];
$password = $_POST["email-password"];

if(compare($oldEmail, $newEmail)) setResult($ERROR_SAME_EMAIL, true);

$userEmailsQuery = "SELECT * FROM retosomican.socios WHERE email LIKE '$newEmail'";
$result = mysqli_query($connection, $userEmailsQuery);
if(mysqli_num_rows($result) > 0) setResult($ERROR_NEW_EMAIL_IN_USE, true);

$changeEmailQuery = "UPDATE retosomican.socios SET email = '$newEmail' WHERE ID = " . $_SESSION["USER-ID"];
if($connection -> query( $changeEmailQuery )) setResult($CHANGE_SUCCESS, false);
else setResult($ERROR_DDBB_CONNECTION, true);

function compare($string1, $string2) {
    return strtolower($string1) == strtolower($string2);
}

function setResult($message, $isError) { 
    if($isError) $_SESSION["CHANGE-RESULT"] = "<span class='error'>$message</span>";
    else $_SESSION["CHANGE-RESULT"] = "<span class='success'>$message</span>";
    header("location: ../Pages/profile.php");
}
?>