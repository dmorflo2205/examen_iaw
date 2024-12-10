<?php
session_name("examen");
session_start();
include "conexion2.php";

include "funcion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="stylesheet" href="style2.css">
<?php include "script.php";?>
</head>
<body>
<?php
    include "cabezera.php";
?>
<main>
    <h2>Customer Management</h2>

    <!-- Formulario para mostrar clientes -->
    <form method="post" action="mostrar_tablas.php">
        <button type="submit" name="mostrar" value="clientes">Show Clients</button>
    </form>
    <br>
    <button onclick="mostrarFormulario()">Add Client</button>
    <br>
    <button onclick="mostrarEliminar()">Delete Client</button>

    <div id="formularioAnadir" style="display:none;">
        <h3>Add New Client</h3>
        <form action="comprobaciones_añadir.php" method="post">
            <label> Name:</label>
            <input type="text" name="nombre" required>
            <label for="direccion">Address:</label>
            <input type="text" name="direccion" required>
            <label for="telefono">Phone:</label>
            <input type="text" name="telefono" required>
            <button type="submit">Send</button>
            <button type="button" onclick="borrarCamposAnadir()">Delete Fields</button>
            <button type="button" onclick="ocultarFormulario()">Hide Form</button>
        </form>
    </div>

    <div id="formularioEliminar" style="display:none;">
        <h3>Delete Client</h3>
        <form action="eliminar.php" method="post">
            <label for="id">Client ID:</label>
            <input type="text" name="id" id="id" required>
            <input type="hidden" name="tipo" value ="cliente">
            <button type="submit">Delete</button>
            <button type="button" onclick="borrarCamposEliminar()">Delete Fields</button>
            <button type="button" onclick="ocultarEliminar()">Hide Form</button>
        </form>
        <button onclick="toggleAyuda()">Help: Show/Hide Client IDs</button>
        <div id="ayuda" style="display:none;">
            <?php mostrarIDsClientes($conexion); ?>
        </div>
    </div>
</main>
<?php
    include "pie_de_pagina.php";
?>
</body>
</html>
