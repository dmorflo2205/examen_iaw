<!-- Comprobacion de los datos al inicio de sesion -->
<?php
session_name("examen");
session_start();
include "recoge.php";

// Variables de recogida
$nombre = recoge('nombre');
$pass = recoge('pass');

// Variables de comprobación
$nombreok = false;
$passok = false;

// Comprobamos que el nombre de usuario está bien
if (empty($nombre)) {
    $_SESSION["error_nombre"] = "Name is required.";
    header("Location: index.php");
    exit();
} elseif ($nombre != 'diego') {
    $_SESSION["error_nombre"] = "The username is not in the system.";
    header("Location: index.php");
    exit();
} else {
    $nombreok = true;
}

// Comprobamos que la contraseña está bien
if (empty($pass)) {
    $_SESSION["error_pass"] = "Password is required.";
    header("Location: index.php");
    exit();
} elseif ($pass != '123456789') {
    $_SESSION["error_pass"] = "The password is not in the system.";
    header("Location: index.php");
    exit();
} else {
    $passok = true;
}

// Acceso a la base de datos
if ($nombreok && $passok) {
    // Limpiar todos los errores de sesión previos
    session_unset();
    // Redirigir a la página principal de la base de datos
    header("Location: index2.php");
    exit();
}

// Si hay errores, cerrar la sesión después de mostrar los mensajes
session_destroy();
header("Location: index.php");
exit();
?>
