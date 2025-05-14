<?php
/* !!!
    LA MAYORÍA DEL SCRIPT ES IGUAL QUE "changePassword.php", CONSULTAR ANTES DE LEER.
 !!! */
include "./connection.php"; // Crear la sesión

// Constantes de mensajes de error o éxito
$ERROR_SAME_NUMBER = "¡El número de teléfono nuevo debe ser distinto!";
$ERROR_NUMBER_IN_USE = "¡Número de teléfono inválido!";
$ERROR_DDBB_CONNECTION = "¡Se ha producido un error interno!";
$CHANGE_SUCCESS = "¡El número de teléfono se ha actualizado!";

// Guardamos la conexión
$connection = $_SESSION["SQL"];

// Información del formulario
$phoneNumber = strval($_POST["phone-number"]);

// Si el usuario tiene un número de teléfono y coincide, mostrar un error ya que el nuevo debe ser distinto.
if(isset($_SESSION["USER-PHONE-NUMBER"])) {
    if($phoneNumber == $_SESSION["USER-PHONE-NUMBER"]) {
        setResult($ERROR_SAME_NUMBER, true);
        return;
    }
}

// Consulta que comprueba si existe un usuario con el mismo número de teléfono.
$usersWithPhoneQuery = "SELECT * FROM retosomican.socios WHERE telefono LIKE '$phoneNumber'";
$result = mysqli_query($connection, $usersWithPhoneQuery);
// Si hay algún usuario, mostrar un error.
if(mysqli_num_rows($result) > 0) {
    setResult($ERROR_NUMBER_IN_USE, true);
    return;
}

// Si ha pasado todas las pruebas, cambiar el número de teléfono
$changePhoneQuery = "UPDATE retosomican.socios SET telefono = '$phoneNumber' WHERE ID = " . $_SESSION["USER-ID"];
if($connection -> query($changePhoneQuery)) {
    // Si la actualización se realiza correctamente:
    setResult($CHANGE_SUCCESS, false);
    $_SESSION["USER-PHONE-NUMBER"] = $phoneNumber;
}
// En caso contrario
else setResult($ERROR_DDBB_CONNECTION, true);

// FUNCIONES ==============================================================

// Función que cambia el resultado dependiendo del parámetro $isError
function setResult($message, $isError) { 
    if($isError) $_SESSION["CHANGE-RESULT"] = "<span class='error'>$message</span>";
    else $_SESSION["CHANGE-RESULT"] = "<span class='success'>$message</span>";
    header("location: ../Pages/perfil.php");
}
?>