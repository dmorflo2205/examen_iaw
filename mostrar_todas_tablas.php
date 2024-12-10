<!-- Se encarga de la conexion a la base de datos y de mostrar todas las tablas-->

<?php
session_name('examen');
session_start();

include "conexion2.php";

try {
    $tablas = $conexion->query("SHOW TABLES");
    foreach ($tablas as $tabla) {
        $nombre_tabla = $tabla[0];
        echo "<h3>Table contents: $nombre_tabla</h3>";
        $resultados = $conexion->query("SELECT * FROM $nombre_tabla");

        if ($resultados->rowCount() > 0) {
            echo "<table border='1'>";
            echo "<tr>";
            for ($i = 0; $i < $resultados->columnCount(); $i++) {
                $meta = $resultados->getColumnMeta($i);
                echo "<th>" . htmlspecialchars($meta['name']) . "</th>";
            }
            echo "</tr>";

            foreach ($resultados as $fila) {
                echo "<tr>";
                // Iteramos solo sobre los valores de las columnas
                foreach ($fila as $key => $valor) {
                    // Nos aseguramos de no repetir las claves
                    if (is_int($key)) {
                        echo "<td>" . htmlspecialchars($valor) . "</td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>The table $nombre_tabla is empty.</p>";
        }
    }
} catch (PDOException $e) {
    echo "<p>Error displaying tables: " . $e->getMessage() . "</p>";
}

echo "<p><a href='otros.php'> Re-manage tables </a></p>";
?>
