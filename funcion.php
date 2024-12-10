<!-- Se encarga de recoger funciones dentro de las paginas pricipales -->
<!-- Tabla productos-->
 <!-- Funcion para mostrar la tabla producto-->
 <?php 
 function mostrarIDsProductos($conexion) {
    try {
        $consulta = $conexion->query("SELECT producto_id FROM productos");
        $productos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        if ($productos) {
            foreach ($productos as $producto) {
                echo "<p>Product ID: " . $producto['producto_id'] . "</p>\n";
            }
        } else {
            echo "<p>There are no registered products.</p>\n";
        }
    } catch (PDOException $e) {
        echo "<p>Error getting product IDs:" . $e->getMessage() . "</p>\n";
    }
} 
?>
<!-- Tabla Empleados-->
 <!-- Funcion para mostrar la tabla empleados-->
  <?php 
  function mostrarIDsEmpleados($conexion) {
    try {
        $consulta = $conexion->query("SELECT empleado_id FROM empleados");
        $empleados = $consulta->fetchAll(PDO::FETCH_ASSOC);
        if ($empleados) {
            foreach ($empleados as $empleado) {
                echo "<p>Employee ID: " . $empleado['empleado_id'] . "</p>\n";
            }
        } else {
            echo "<p>There are no registered employees.</p>\n";
        }
    } catch (PDOException $e) {
        echo "<p>Error getting employee IDs: " . $e->getMessage() . "</p>\n";
    }
}
?>
<!-- Tabla Clientes-->
 <!-- Funcion para mostrar la tabla clientes -->
  <?php
  function mostrarIDsClientes($conexion) {
    try {
        $consulta = $conexion->query("SELECT cliente_id FROM clientes");
        $clientes = $consulta->fetchAll(PDO::FETCH_ASSOC);
        if ($clientes) {
            foreach ($clientes as $cliente) {
                echo "<p>Client ID: " . $cliente['cliente_id'] . "</p>\n";
            }
        } else {
            echo "<p>There are no registered customers.</p>\n";
        }
    } catch (PDOException $e) {
        echo "<p>Error getting client IDs: " . $e->getMessage() . "</p>\n";
    }
}
  ?>
<!-- Pagina eliminar_campo.php-->
 <!-- Funcion para eliminar un campo a la tablas -->
  <?php
  // Variables
  $nombre_tabla = $_POST['nombre_tabla'] ?? '';
  $nombre_campo = $_POST['nombre_campo'] ?? '';
  $tabla_existe = false;
  $campo_existe = false;
  $mensaje = '';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se ha enviado el formulario con el nombre de la tabla
    if (!empty($nombre_tabla) && empty($nombre_campo)) {
        // Comprobar si la tabla existe en la base de datos
        $consulta = $conexion->prepare("SHOW TABLES LIKE ?");
        $consulta->execute([$nombre_tabla]);
        if ($consulta->rowCount() > 0) {
            $tabla_existe = true;
        } else {
            $mensaje = "The table '$nombre_tabla' does not exist in the database.";
        }
    }

    // Verificar si se ha enviado el formulario con el nombre del campo
    if (!empty($nombre_tabla) && !empty($nombre_campo)) {
        // Comprobar si el campo existe en la tabla
        $consulta = $conexion->prepare("DESCRIBE $nombre_tabla");
        $consulta->execute();
        $campos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $campo_info = null;
        foreach ($campos as $campo) {
            if ($campo['Field'] == $nombre_campo) {
                $campo_info = $campo;
                break;
            }
        }

        if ($campo_info) {
            $campo_existe = true;

            // Comprobar si el campo es una clave primaria
            if ($campo_info['Key'] == 'PRI') {
                $mensaje = "Cannot delete field '$nombre_campo' because it is a primary key.";
            } else {
                // Eliminar el campo de la tabla
                $consulta = $conexion->prepare("ALTER TABLE $nombre_tabla DROP COLUMN $nombre_campo");

                if ($consulta->execute()) {
                    $mensaje = "The field '$nombre_campo' has been successfully removed from the table '$nombre_tabla'.";
                } else {
                    $mensaje = "Error deleting field '$nombre_campo' de la tabla '$nombre_tabla'.";
                }
            }
        } else {
            $mensaje = "The field '$nombre_campo' does not exist in the table '$nombre_tabla'.";
        }
    }
}
  ?>
  <!-- Pagina insertar_datos.php-->
 <!-- Funcion para añadir un campo a la tablas -->
  <?php
  $nombre_tabla = $_POST['nombre_tabla'] ?? '';
  $tabla_existe = false;
  $campos = [];
  $mensaje = '';
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (!empty($nombre_tabla)) {
          $consulta = $conexion->prepare("SHOW TABLES LIKE ?");
          $consulta->execute([$nombre_tabla]);
          if ($consulta->rowCount() > 0) {
              $tabla_existe = true;
              $consulta = $conexion->prepare("DESCRIBE $nombre_tabla");
              $consulta->execute();
              $campos = $consulta->fetchAll(PDO::FETCH_ASSOC);
          } else {
              $mensaje = "The table '$nombre_tabla' does not exist in the database.";
          }
      }
  
      if ($tabla_existe && isset($_POST['datos'])) {
          $datos = $_POST['datos'];
          $columnas = array_keys($datos);
          $valores = array_values($datos);
  
          $placeholders = implode(', ', array_fill(0, count($columnas), '?'));
          $columnas_str = implode(', ', $columnas);
  
          $consulta = $conexion->prepare("INSERT INTO $nombre_tabla ($columnas_str) VALUES ($placeholders)");
  
          if ($consulta->execute($valores)) {
              $mensaje = "Data successfully inserted into the table '$nombre_tabla'.";
          } else {
              $mensaje = "Error inserting data into table '$nombre_tabla'.";
          }
      }
  }
  ?>