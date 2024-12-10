<?php
include "conexion2.php"; // Incluir el archivo de conexión a la base de datos
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Table</title>
    <link rel="stylesheet" href="style3.css"> 
</head>
<body>
    <?php
    if (isset($_POST['mostrar'])) {
        $tabla = $_POST['mostrar'];
        $consulta = $conexion->query("SELECT * FROM $tabla");

        echo "<h3>Board: " . ucfirst($tabla) . "</h3>";
        echo "<table>";
        echo "<tr>";

        // Obtener los nombres de las columnas
        for ($i = 0; $i < $consulta->columnCount(); $i++) {
            $columna = $consulta->getColumnMeta($i);
            echo "<th>" . $columna['name'] . "</th>";
        }
        echo "</tr>";

        // Mostrar los datos de la tabla
        while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            foreach ($fila as $dato) {
                echo "<td>" . $dato . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No table has been selected to display.</p>";
    }
    ?>
    <p><a href='index2.php'> Click here to return to the beginning </a></p>
</body>
</html>
