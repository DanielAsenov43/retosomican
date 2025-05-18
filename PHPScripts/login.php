<?php
// Ejecutar el script "connection.php" que crea una sesión y guarda la conexión en $_SESSION["SQL"]
include "./connection.php";

// Si el correo o la contraseña faltan en el formulario por cualquier motivo, volver al formulario
if(!isset($_POST["email"]) || !isset( $_POST["password"])) {
    header('location: ../Pages/accesoSocios.php');
}

// Obtenemos el email y la contraseña del formulario y los guardamos en las variables $userEmail y $userPassword
$userEmail = $_POST["email"];
$userPassword = $_POST["password"];

// Creamos una consulta que obtiene todos los socios cuyo email coincide con el que se ha puesto en el formulario
$emailQuery = "SELECT * FROM retosomican.socios WHERE email LIKE \"$userEmail\"";
// Ejecutamos la consulta y guardamos los resultados
$result = mysqli_query($_SESSION["SQL"], $emailQuery);

// Si el número de filas devueltas es 0, significa que no existe ningún socio con ese correo electrónico.
if(mysqli_num_rows($result) <= 0) {
    wrongEmail(); // Error: correo no registrado
    return; // Dejar de ejecutar el script
}

// Si existe un usuario con ese correo, obtenemos sus datos.
// La variable $row cotiene un array con todos los datos (ID, Nombre, Apellidos, email, ...)
// Ejemplo: $row = [1, "SERGIO", "GONZÁLEZ FERNÁNDEZ", "socio001@gmail.com", ...]
$row = mysqli_fetch_array($result);
$claveBBDD = $row[6]; // La clave es el 6to campo de la BBDD
$alta = $row[7];

// Si la clave es nula, significa que el socio ya se ha registrado por primera vez, y hay que comprobar la contraseña
if($claveBBDD == null || $claveBBDD == "" || $claveBBDD == "NULL") {
    // Como la contraseña está encriptada, utilizamos la función password_hash(texto, textoEncriptado)
    // Esta función compara ambos textos y devuelve true o false dependiendo de si coinciden o no.
    if(password_verify($userPassword, $row[5])) { // Comparamos la contraseña del formulario con la de la BBDD

        if(!$alta) { // Si el socio no está dado de alta, volver
            socioDeBaja();
            return;
        }
        // Si la contraseña coincide, incializamos todas las variables de la sesión:
        setSessionInfo(true, $row[0], $row[1], $row[2], $row[3]);
        
        $_SESSION["USER-PASSWORD"] = $row[5]; // Establecemos la contraseña
        if($row[4] != null && $row[4] != "" && $row[4] != "NULL") { // Si el número de teléfono no es nulo, se lo establecemos
            $_SESSION["USER-PHONE-NUMBER"] = $row[4];
        }
        login(); // Ejecutamos la función login(), que le lleva a otra página una vez registrado
    } else wrongPassword(); // Si la contraseña no coincide, ejecutamos la función wrongPassword();
// Si la clave no es nula, significa que el socio todavía no se ha registrado, así que hay que comparar con la clave de la BBDD
} else {
    if($userPassword == $row[6]) { // Si la contraseña escrita coincide con la clave de la BBDD
        // Inicializamos las variables de la sesión con la información del socio
        setSessionInfo(false, $row[0], $row[1], $row[2], $row[3]);
        // Mandamos al socio a crear una contraseña
        header("location: ../Pages/crearContrasenia.php");
    } else wrongPassword(); // Si las claves no coinciden, ejecutar la función wrongPassword();
}

// FUNCIONES ===============================================================================

// Función que inicializa todas las variables de la sesión
function setSessionInfo($loggedIn, $userID, $userName, $userSurname, $userEmail) {
    if($loggedIn) $_SESSION["LOGGED-IN"] = true;
    $_SESSION["USER-ID"] = $userID;
    $_SESSION["USER-NAME"] = $userName;
    $_SESSION["USER-SURNAME"] = $userSurname;
    $_SESSION["USER-EMAIL"] = $userEmail;
}
// Función que muestra un mensaje de "correo incorrecto" y te manda a la misma página para volver a iniciar sesión
function wrongEmail() {
    $_SESSION["ERROR-LOGIN"] = "¡El correo o la contraseña no son correctos!";
    header("location: ../Pages/accesoSocios.php");
}
// Función que muestra el mensaje de "contraseña incorrecta" o cualquier otro mensaje si queremos ser ambiguos
function wrongPassword() {
    $_SESSION["ERROR-LOGIN"] = "¡El correo o la contraseña no son correctos!";
    header("location: ../Pages/accesoSocios.php");
}
function socioDeBaja() {
    $_SESSION["ERROR-LOGIN"] = "Su cuenta no está dada de alta. Por favor, contacte con un administrador.";
    header("location: ../Pages/accesoSocios.php");
}
// Función que te lleva a la página que contenga $_SESSION["NEXT"], o si no contiene ninguna, a la galería científica.
function login() {
    if(isset($_SESSION["NEXT"])) {
        header("location: ../Pages/".$_SESSION["NEXT"]);
        unset($_SESSION["NEXT"]);
    } else header("location: ../Pages/galeriaCientifica.php");
}
?>