<!-- Pagina de inicio -->
<?php
session_name("examen");
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<?php
    include "cabezera.php";
    ?>
    <main>
        <h2>Welcome</h2>
        <p>Here you can manage your database in an easier and more intuitive way.</p>
        <?php
        include "conexion.php";
        ?>
    </main>
    <?php
    include "pie_de_pagina.php";
    ?>
</body>
</html>
