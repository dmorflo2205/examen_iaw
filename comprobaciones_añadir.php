<!-- Se encarga de comprobar los datos de las tablas cliente, empleados y productos y enviarlos a la pagina añadir.php -->
<?php
session_name('examen');
session_start();

include "recoge.php";

// Variables de campos
$nombre = recoge('nombre');
$puesto = recoge('puesto');
$salario = recoge('salario');
$direccion = recoge('direccion');
$telefono = recoge('telefono');
$precio = recoge('precio');


// Validaciones
$nombreok = false;
$puestook = false;
$salariook = false;
$direccionok = false;
$telefonook = false;
$preciook = false;


// Comprobación del campo nombre
if (empty($nombre)) {
    print "<p>The name field cannot be empty</p>\n";
} elseif (!preg_match('/^[a-zA-Z\s]+$/', $nombre)) {
    print "<p>The name you entered is incorrect</p>\n";
} else {
    $nombreok = true;
}

// Comprobación del campo puesto
if (!empty($puesto)) {
    if (!preg_match('/^[a-zA-Z\s]+$/', $puesto)) {
        print "<p>The position you have entered is incorrect</p>\n";
    } else {
        $puestook = true;
    }
}

// Comprobación del salario
if (!empty($salario)) {
    if (!ctype_digit($salario) || $salario <= 0) {
        print "<p>Salary must be a positive number</p>\n";
    } else {
        $salariook = true;
    }
}

// Comprobación del campo dirección
if (empty($direccion)) {
    print "<p>The address field cannot be empty</p>\n";
} else {
    $direccionok = true;
}

// Comprobación del teléfono
if (empty($telefono)) {
    print "<p>The phone field cannot be empty</p>\n";
} elseif (!ctype_digit($telefono) || $telefono <= 0) {
    print "<p>The phone number must be a positive number</p>\n";
} else {
    $telefonook = true;
}

// Comprobación del precio
if (!empty($precio)) {
    if (!ctype_digit($precio) || $precio <= 0) {
        print "<p>The price must be a positive number</p>\n";
    } else {
        $preciook = true;
    }
}


// Enviar campos para la tabla cliente
if ($nombreok && $direccionok && $telefonook) {
    header("Location: añadir.php?tipo=cliente&nombre=$nombre&direccion=$direccion&telefono=$telefono");
    exit;
}

// Enviar campos para la tabla empleados
if ($nombreok && $puestook && $salariook) {
    header("Location: añadir.php?tipo=empleado&nombre=$nombre&puesto=$puesto&salario=$salario");
    exit;
}

// Enviar campos para la tabla productos
if ($nombreok && $preciook) {
    header("Location: añadir.php?tipo=producto&nombre=$nombre&precio=$precio");
    exit;
}

?>
