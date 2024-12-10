<!-- Pagina que se encargar de eliminar alguna tabla de la base de datos -->
<?php
session_name('examen');
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tables</title>
    <link rel="stylesheet" href="style2.css">
 <?php include "script.php";?>
</head>
<body>
<?php
    include "cabezera.php";
?>
    <main>
        <h2>Managing table deletion</h2>
        <button onclick="mostrarFormularioBorrar()">Delete Table</button>
        <div id="formularioBorrar" style="display:none;">
            <h3>Delete Table</h3>
            <form action="borrar_tabla.php" method="post">
                <label>Table Name:</label>
                <input type="text" name="nombre_tabla" required>
                <button type="submit">Send</button>
                <button type="button" onclick="borrarCamposBorrar()">Delete Fields</button>
                <button type="button" onclick="ocultarFormularioBorrar()">Hide Form</button>
            </form>
        </div>
    </main>
    <?php
    include "pie_de_pagina.php";
    ?>
</body>
</html>
