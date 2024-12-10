<!-- Se encarga de mostrar todas las tablas y como estan hechas las tablas -->
<?php
session_name('examen');
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Managing Tables</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<?php
    include "cabezera.php";
?>
    <main>
        <h2>Other possible procedures</h2>
        <button onclick="window.location.href='mostrar_todas_tablas.php'">Show Contents of All Tables</button>
        <button onclick="window.location.href='describir_tablas.php'">Describe Tables</button>
    </main>
    <?php
    include "pie_de_pagina.php";
    ?>
</body>
</html>
