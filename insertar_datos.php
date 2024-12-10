<!-- Se encarga de recoger la tabla a la cual se le va a añadir algun campo -->
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
    <title>Insert Data</title>
    <link rel="stylesheet" href="style2.css">
<?php include "script.php"; ?>
</head>
<body>
<?php include "cabezera.php"; ?>
    <main>
        <h2>Insert Data into the Database</h2>
        <?php if (!empty($mensaje)): ?>
            <p><?php print $mensaje; ?></p>
        <?php endif; ?>

        <?php if (!$tabla_existe): ?>
            <form method="post" action="insertar_datos.php">
                <label for="nombre_tabla">Table Name:</label>
                <input type="text" id="nombre_tabla" name="nombre_tabla" required>
                <button type="submit">Find out</button>
            </form>
        <?php endif; ?>

        <?php if ($tabla_existe): ?>
            <form method="post" action="insertar_datos.php">
                <input type="hidden" name="nombre_tabla" value="<?php print $nombre_tabla; ?>">
                <h3>Data to Insert into the Table: <?php print $nombre_tabla; ?></h3>
                <?php foreach ($campos as $campo): ?>
                    <?php if (strpos($campo['Extra'], 'auto_increment') === false && strpos($campo['Key'], 'MUL') === false): ?>
                        <div>
                            <label for="campo_<?php print $campo['Field']; ?>"><?php print $campo['Field']; ?>:</label>
                            <input type="text" id="campo_<?php print $campo['Field']; ?>" name="datos[<?php print $campo['Field']; ?>]">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <button type="submit">Send</button>
                <button type="button" onclick="borrarCamposFormulario()">Delete Fields</button>
            </form>
        <?php endif; ?>

        <p><a href="insertar_datos.php">Back to Home</a></p>
    </main>
    <?php include "pie_de_pagina.php"; ?>
</body>
</html>
