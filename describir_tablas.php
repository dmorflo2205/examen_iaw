<!-- Se encarga de recoger los datos de la pagina otros.php y de mostrar como estan hechas las tablas -->
<?php
session_name('examen');
session_start();

include "conexion2.php";

try {
    $tablas = $conexion->query("SHOW TABLES");
    foreach ($tablas as $tabla) {
        $nombre_tabla = $tabla[0];
        echo "<h3>Table Description: $nombre_tabla</h3>";
        $resultados = $conexion->query("DESCRIBE $nombre_tabla");

        echo "<table border='1'>";
        echo "<tr><th>Field</th><th>Guy</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";

        foreach ($resultados as $fila) {
            echo "<tr>";
            echo "<td>" . $fila['Field'] . "</td>";
            echo "<td>" . $fila['Type'] . "</td>";
            echo "<td>" . $fila['Null'] . "</td>";
            echo "<td>" . $fila['Key'] . "</td>";
            echo "<td>" . $fila['Default'] . "</td>";
            echo "<td>" . $fila['Extra'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
} catch (PDOException $e) {
    echo "<p>Error describing tables: " . $e->getMessage() . "</p>";
}

echo "<p><a href='otros.php'> Re-manage tables </a></p>";
?>
