<!-- Se encarga de eliminar las filas de las tablas empleados, clientes y productos -->
<?php
session_name('examen');
session_start();

include "conexion2.php";
include "recoge.php";

// Obtener los parámetros pasados por el formulario
$tipo = recoge('tipo');
$id = recoge('id');

// Verificar que se haya recibido un ID válido
if (!empty($id) && ctype_digit($id)) {
    // Realizamos la eliminación de acuerdo al tipo
    if ($tipo == 'cliente') {
        $consulta = $conexion->prepare("DELETE FROM clientes WHERE cliente_id = ?");
        $consulta->execute([$id]);
        if ($consulta->rowCount() > 0) {
            echo "<p>Client deleted successfully</p>\n";
        } else {
            echo "<p>Customer with ID: not found $id</p>\n";
        }
    } elseif ($tipo == 'empleado') {
        $consulta = $conexion->prepare("DELETE FROM empleados WHERE empleado_id = ?");
        $consulta->execute([$id]);
        if ($consulta->rowCount() > 0) {
            echo "<p>Employee deleted successfully</p>\n";
        } else {
            echo "<p>Employee with ID: not found $id</p>\n";
        }
    } elseif ($tipo == 'producto') {
        $consulta = $conexion->prepare("DELETE FROM productos WHERE producto_id = ?");
        $consulta->execute([$id]);
        if ($consulta->rowCount() > 0) {
            echo "<p>Product removed successfully</p>\n";
        } else {
            echo "<p>Product with ID: not found $id</p>\n";
        }
    } else {
        echo "<p>Operation type not specified or invalid ID</p>\n";
    }
} else {
    echo "<p>Missing type parameters or invalid ID</p>\n";
}

echo "<p><a href='index2.php'> Click here to return to the beginning </a></p>\n";
?>
