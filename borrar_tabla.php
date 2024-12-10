<!-- Se encarga de recoger los datos de la  pagina eliminar_tablas-php y de eliminar la tabla de la base de datos -->
<?php
session_name('examen');
session_start();

include "recoge.php";
include "conexion2.php";

// Obtener el nombre de la tabla desde el formulario
$nombre_tabla = recoge('nombre_tabla');

if (!empty($nombre_tabla)) {
    // Preparar la consulta para borrar la tabla
    $consulta = "DROP TABLE IF EXISTS $nombre_tabla";

    try {
        // Ejecutar la consulta
        $conexion->exec($consulta);
        echo "<p>Board '$nombre_tabla' successfully deleted.</p>\n";
    } catch (PDOException $e) {
        echo "<p>Error deleting table: " . $e->getMessage() . "</p>\n";
    }
} else {
    echo "<p>Please enter the name of the table.</p>\n";
}

echo "<p><a href='otros.php'> Re-manage tables </a></p>\n";
?>
