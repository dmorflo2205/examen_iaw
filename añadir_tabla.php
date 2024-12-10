<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Management</title>
    <link rel="stylesheet" href="style2.css">
<?php include "script.php"; ?>
</head>
<body>
<?php include "cabezera.php"; ?>
<main>
    <h2>Management for creating tables</h2>
    <button onclick="mostrarFormularioCrear()">Create New Table</button>
    <div id="formularioCrear" style="display:none;">
        <h3>Create New Table</h3>
        <form action="crear_tabla.php" method="post">
            <label for="nombre_tabla">Table Name:</label>
            <input type="text" name="nombre_tabla" id="nombre_tabla" required>
            <label>Table Fields:</label>
            <div>
                <label for="campo1">Field 1 (Primary Key):</label>
                <input type="text" id="campo1" name="campos[0][nombre]" placeholder="Nombre" required>
                <input type="text" id="tipo1" name="campos[0][tipo]" placeholder="Tipo (ej: INT AUTO_INCREMENT PRIMARY KEY)" required>
            </div>
            <div>
                <label for="campo2">Field 2:</label>
                <input type="text" id="campo2" name="campos[1][nombre]" placeholder="Nombre">
                <input type="text" id="tipo2" name="campos[1][tipo]" placeholder="Tipo (ej: VARCHAR(50))">
            </div>
            <div>
                <label for="campo3">Field 3:</label>
                <input type="text" id="campo3" name="campos[2][nombre]" placeholder="Nombre">
                <input type="text" id="tipo3" name="campos[2][tipo]" placeholder="Tipo (ej: DATE)">
            </div>
            <div>
                <label for="campo4">Field 4:</label>
                <input type="text" id="campo4" name="campos[3][nombre]" placeholder="Nombre">
                <input type="text" id="tipo4" name="campos[3][tipo]" placeholder="Tipo (ej: FLOAT)">
            </div>
            <div>
                <label for="campo5">Field 5:</label>
                <input type="text" id="campo5" name="campos[4][nombre]" placeholder="Nombre">
                <input type="text" id="tipo5" name="campos[4][tipo]" placeholder="Tipo (ej: BOOLEAN)">
            </div>
            <button type="submit">Create</button>
            <button type="button" onclick="borrarCamposCrear()">Delete Fields</button>
            <button type="button" onclick="ocultarFormularioCrear()">Hide Form</button>
            <button type="button" onclick="mostrarAyuda()">Help</button>
        </form>
        <div id="ayuda" style="display:none;">
            <h4>Common Data Types and Primary Key:</h4>
                <p>INT: Integers</p>
                <p>VARCHAR(n): Text strings of up to n characters</p>
                <p>DATE: Date</p>
                <p>FLOAT: Decimal numbers</p>
                <p>BOOLEAN: True/false values</p>
                <p><strong>Primary Key</strong>: To set a primary key, use `INT AUTO_INCREMENT PRIMARY KEY` for the first field</p>
        </div>
    </div>
</main>
<?php include "pie_de_pagina.php"; ?>
</body>
</html>
