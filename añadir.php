<!-- Se encarga de recoges los datos de las tablas cliente, empleados y productos y añadir datos a la BD -->
<?php
session_name('examen');
session_start();

include "conexion2.php";
include "recoge.php";

$tipo = recoge('tipo');

if ($tipo == 'cliente') {
    $nombre = recoge('nombre');
    $direccion = recoge('direccion');
    $telefono = recoge('telefono');

    $consulta = $conexion->prepare("INSERT INTO clientes (nombre, direccion, telefono) VALUES (?, ?, ?)");
    $consulta->execute([$nombre, $direccion, $telefono]);

    print "<p>Customer added successfully</p>\n";
} elseif ($tipo == 'empleado') {
    $nombre = recoge('nombre');
    $puesto = recoge('puesto');
    $salario = recoge('salario');

    $consulta = $conexion->prepare("INSERT INTO empleados (nombre, puesto, salario) VALUES (?, ?, ?)");
    $consulta->execute([$nombre, $puesto, $salario]);

    print "<p>Employee added successfully</p>\n";
} elseif ($tipo == 'producto') {
    $nombre = recoge('nombre');
    $precio = recoge('precio');

    $consulta = $conexion->prepare("INSERT INTO productos (nombre, precio) VALUES (?, ?)");
    $consulta->execute([$nombre, $precio]);

    print "<p>Product added successfully</p>\n";
} else {
    print "<p>Type of operation not specified</p>\n";
}

print "<p><a href='index2.php'> Click here to return to the beginning </a></p>\n";
?>
