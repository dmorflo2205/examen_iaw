<?php
session_name('examen');
session_start();

include "conexion2.php";
include "recoge.php";

// Obtener los datos del formulario
$nombre_tabla = recoge('nombre_tabla');
$campos = $_POST['campos'];

if (!empty($nombre_tabla) && !empty($campos) && is_array($campos)) {
    $campos_sql = [];
    foreach ($campos as $campo) {
        if (!empty($campo['nombre']) && !empty($campo['tipo'])) {
            $campos_sql[] = $campo['nombre'] . ' ' . $campo['tipo'];
        }
    }

    if (!empty($campos_sql)) {
        $campos_sql_str = implode(', ', $campos_sql);
        $consulta = "CREATE TABLE $nombre_tabla ($campos_sql_str)";

        try {
            $conexion->exec($consulta);
            echo "<p>Table'$nombre_tabla' created successfully.</p>\n";
        } catch (PDOException $e) {
            echo "<p>Error creating table: " . $e->getMessage() . "</p>\n";
        }
    } else {
        echo "<p>The table could not be created because no valid fields were defined.</p>\n";
    }
} else {
    echo "<p>Please enter the table name and fields.</p>\n";
}

echo "<p><a href='otros.php'> Re-manage tables </a></p>\n";
?>
