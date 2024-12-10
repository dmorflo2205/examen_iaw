<?php
// Parametros de conexion
$servidor = "172.16.4.171";
$usuario = "diego";
$contraseña = "123456789";
$base_datos = "iaw";

// Conexion
try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$base_datos", $usuario, $contraseña);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    print "<p> You have connected to the Silent Hunter database </p>\n";
} catch(PDOException $e) {
    print "<p>Connection failed: " . $e->getMessage() . "</p>\n";
}

?>
