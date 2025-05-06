<?php
include "./connection.php";
$ERROR_SAME_EMAIL = "¡El correo nuevo debe ser distinto!";
$ERROR_OLD_EMAIL_DOES_NOT_MATCH = "¡El correo actual no coincide!";
$ERROR_NEW_EMAIL_IN_USE = "¡El correo nuevo no es válido!";

$connection = $_SESSION["SQL"];

// POST INFO
$oldEmail = $_POST["email-old"];
$newEmail = $_POST["email-new"];
$password = $_POST["email-password"];

if(compare($oldEmail, $newEmail)) throwError($ERROR_SAME_EMAIL);

$userEmailsQuery = "SELECT email FROM retosomican.socios";
$match = false;
while ($row = mysqli_fetch_array(mysqli_query($connection, $userEmailsQuery))) {
    if(strtolower($row["0"]) == strtolower($newEmail)) {
        header("location: ../Pages/");
    }
}

function compare($string1, $string2) {
    return strtolower($string1) == strtolower($string2);
}

function throwError($errormMessage) {
    $_SESSION["CHANGE-ERROR-MESSAGE"] = $errormMessage;
    echo $_SESSION["CHANGE-ERROR-MESSAGE"];
    //header("location: ../Pages/profile.php");
}
?>