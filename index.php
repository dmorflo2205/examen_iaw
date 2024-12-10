<!-- Pagina de inicio de sesion -->
<?php
session_name("examen");
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Welcome to the Silent Hunter company database </h1>
        <p> Please log in to access the database<p>
    <?php
    // Error nombre
    if (isset($_SESSION["error_nombre"])) {
        echo "<p style='color:red;'>{$_SESSION['error_nombre']}</p>";
        unset($_SESSION["error_nombre"]);
    }
    //Error contraseña
    if (isset($_SESSION["error_pass"])) {
        echo "<p style='color:red;'>{$_SESSION['error_pass']}</p>";
        unset($_SESSION["error_pass"]);
    }

    ?>

    <div class="formulario">
        <h2>Login</h2>
        <form action="comprobacion_inicio.php" method="post">
            <div class="datos">
                <label>User:</label>
                <input type="text" name="nombre">
            </div>
            <div class="datos">
                <label>Password:</label>
                <input type="password"  name="pass">
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
    <?php
    include "pie_de_pagina.php";
    ?>
</body>
</html>
