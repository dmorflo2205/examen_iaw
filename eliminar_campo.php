<!-- Se encarga de eliminar un campo de una tabla seleccionada -->
<?php
session_name('examen');
session_start();

include "conexion2.php";

include "funcion.php";


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Campo</title>
    <link rel="stylesheet" href="style2.css">
   <?php include "script.php" ?>
</head>
<body>
<?php include "cabezera.php"; ?>
    <main>
        <h2>Delete Field from a Table</h2>
        <?php if (!empty($mensaje)): ?>
            <p><?php print $mensaje; ?></p>
        <?php endif; ?>

        <?php if (!$tabla_existe): ?>
            <form method="post" action="eliminar_campo.php">
                <label for="nombre_tabla">Table Name:</label>
                <input type="text" id="nombre_tabla" name="nombre_tabla" required>
                <button type="submit">Find out</button>
            </form>
        <?php endif; ?>

        <?php if ($tabla_existe && !$campo_existe): ?>
            <form method="post" action="eliminar_campo.php">
                <input type="hidden" name="nombre_tabla" value="<?php print $nombre_tabla; ?>">
                <label>Name of Field to Delete:</label>
                <input type="text" id="nombre_campo" name="nombre_campo" required>
                <button type="submit">Send</button>
                <button type="button" onclick="borrarCamposFormulario()">Delete Fields</button>
            </form>
        <?php endif; ?>
        
        <p><a href="eliminar_campo.php">Back to Home</a></p>
    </main>
    <?php include "pie_de_pagina.php"; ?>
</body>
</html>
