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
    <title>Products</title>
    <link rel="stylesheet" href="style2.css">
<?php include "script.php"; ?>
</head>
<body>
<?php
    include "cabezera.php";
?>
<main>
    <h2>Product Management</h2>
    <!-- Formulario para mostrar productos -->
    <form method="post" action="mostrar_tablas.php">
        <button type="submit" name="mostrar" value="productos">Show Products</button>
    </form>
    <br>
    <button onclick="mostrarFormulario()">Add Product</button>
    <br>
    <button onclick="mostrarEliminar()">Delete Product</button>

    <div id="formularioAnadir" style="display:none;">
        <h3>Add New Product</h3>
        <form action="comprobaciones_añadir.php" method="post">
            <label>Name:</label>
            <input type="text" name="nombre" required>
            <label>Price:</label>
            <input type="text" name="precio" required>
            <button type="submit">Send</button>
            <button type="button" onclick="borrarCamposAnadir()">Delete Fields</button>
            <button type="button" onclick="ocultarFormulario()">Hide Form</button>
        </form>
    </div>

    <div id="formularioEliminar" style="display:none;">
        <h3>Delete Product</h3>
        <form action="eliminar.php" method="post">
            <label for="id">Product ID:</label>
            <input type="text" name="id" id="id" required>
            <input type="hidden" name="tipo" value="producto">
            <button type="submit">Delete</button>
            <button type="button" onclick="borrarCamposEliminar()">Delete Fields</button>
            <button type="button" onclick="ocultarEliminar()">Hide Form</button>
        </form>
        <button onclick="toggleAyuda()">Help: Show/Hide Product IDs</button>
        <div id="ayuda" style="display:none;">
            <?php mostrarIDsProductos($conexion); ?>
        </div>
    </div>
</main>
<?php
    include "pie_de_pagina.php";
?>
</body>
</html>
