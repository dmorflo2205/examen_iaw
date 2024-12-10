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
    <title>Employees</title>
    <link rel="stylesheet" href="style2.css">
  <?php include "script.php"; ?>
</head>
<body>
    <?php include "cabezera.php"; ?>
    <main>
        <h2>Employee Management</h2>
        <!-- Formulario para mostrar empleados -->
        <form method="post" action="mostrar_tablas.php">
            <button type="submit" name="mostrar" value="empleados">Show Employees</button>
        </form>
        <br>
        <button onclick="mostrarFormulario()">Add Employee</button>
        <br>
        <button onclick="mostrarEliminar()">Delete Employee</button>
        <br>
        <div id="formularioAnadir" style="display:none;">
            <h3>Add New Employee</h3>
            <form action="comprobaciones_añadir.php" method="post">
                <label for="nombre">Name:</label>
                <input type="text" name="nombre" required>
                <label for="puesto">Position:</label>
                <input type="text" name="puesto" required>
                <label for="salario">Salary:</label>
                <input type="text" name="salario" required>
                <button type="submit">Send</button>
                <button type="button" onclick="borrarCamposAnadir()">Delete Fields</button>
                <button type="button" onclick="ocultarFormulario()">Hide Form</button>
            </form>
        </div>

        <div id="formularioEliminar" style="display:none;">
            <h3>Delete Employee</h3>
            <form action="eliminar.php" method="post">
                <label for="id">Employee ID:</label>
                <input type="text" name="id" id="id" required>
                <input type="hidden" name="tipo" value ="empleado">
                <button type="submit">Eliminate</button>
                <button type="button" onclick="borrarCamposEliminar()">Delete Fields</button>
                <button type="button" onclick="ocultarEliminar()">Hide Form</button>
            </form>
            <button onclick="toggleAyuda()">Help</button>
            <div id="ayuda" style="display:none;">
                <?php mostrarIDsEmpleados($conexion); ?>
            </div>
        </div>
    </main>
    <?php include "pie_de_pagina.php"; ?>
</body>
</html>
