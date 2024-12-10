<!-- script de la pagina clientes.php-->
<script>
        function mostrarFormulario() {
            document.getElementById('formularioAnadir').style.display = 'block';
        }

        function ocultarFormulario() {
            document.getElementById('formularioAnadir').style.display = 'none';
        }

        function mostrarEliminar() {
            document.getElementById('formularioEliminar').style.display = 'block';
        }

        function ocultarEliminar() {
            document.getElementById('formularioEliminar').style.display = 'none';
        }

        function borrarCamposAnadir() {
            document.getElementById('nombre').value = '';
            document.getElementById('direccion').value = '';
            document.getElementById('telefono').value = '';
        }

        function borrarCamposEliminar() {
            document.getElementById('id').value = '';
        }

        function toggleAyuda() {
            var ayuda = document.getElementById('ayuda');
            if (ayuda.style.display === 'none') {
                ayuda.style.display = 'block';
            } else {
                ayuda.style.display = 'none';
            }
        }
    </script>

    <!-- script de la pagina añadir_tabla.php-->
    <script>
        function mostrarFormularioCrear() {
            document.getElementById('formularioCrear').style.display = 'block';
        }

        function ocultarFormularioCrear() {
            document.getElementById('formularioCrear').style.display = 'none';
        }

        function borrarCamposCrear() {
            document.getElementById('nombre_tabla').value = '';
            for (let i = 1; i <= 5; i++) {
                document.getElementById('campo' + i).value = '';
                document.getElementById('tipo' + i).value = '';
            }
        }

        function mostrarAyuda() {
            var ayuda = document.getElementById('ayuda');
            if (ayuda.style.display === 'none') {
                ayuda.style.display = 'block';
            } else {
                ayuda.style.display = 'none';
            }
        }
    </script>

    <!-- script de la pagina eliminar_campo.php-->
    <script>
        function borrarCamposFormulario() {
            document.getElementById('nombre_campo').value = '';
        }
    </script>

<!-- script de la pagina eliminar_tabla.php-->

<script>
        function mostrarFormularioBorrar() {
            document.getElementById('formularioBorrar').style.display = 'block';
        }

        function ocultarFormularioBorrar() {
            document.getElementById('formularioBorrar').style.display = 'none';
        }

        function borrarCamposBorrar() {
            document.getElementById('nombre_tabla_borrar').value = '';
        }
    </script>

    <!-- script de la pagina empleados.php-->
    <script>
        function mostrarFormulario() {
            document.getElementById('formularioAnadir').style.display = 'block';
        }

        function ocultarFormulario() {
            document.getElementById('formularioAnadir').style.display = 'none';
        }

        function mostrarEliminar() {
            document.getElementById('formularioEliminar').style.display = 'block';
        }

        function ocultarEliminar() {
            document.getElementById('formularioEliminar').style.display = 'none';
        }

        function borrarCamposAnadir() {
            document.getElementById('nombre').value = '';
            document.getElementById('puesto').value = '';
            document.getElementById('salario').value = '';
        }

        function borrarCamposEliminar() {
            document.getElementById('id').value = '';
        }

        function toggleAyuda() {
            var ayuda = document.getElementById('ayuda');
            if (ayuda.style.display === 'none') {
                ayuda.style.display = 'block';
            } else {
                ayuda.style.display = 'none';
            }
        }
    </script>
    <!-- script de la pagina insertar_datos.php-->
    <script>
        function mostrarFormularioDatos() {
            document.getElementById('formularioDatos').style.display = 'block';
        }

        function borrarCamposFormulario() {
            const inputs = document.querySelectorAll('#formularioDatos input[type="text"]');
            inputs.forEach(input => input.value = '');
        }
    </script>
     <!-- script de la pagina productos.php-->
     <script>
        function mostrarFormulario() {
            document.getElementById('formularioAnadir').style.display = 'block';
        }

        function ocultarFormulario() {
            document.getElementById('formularioAnadir').style.display = 'none';
        }

        function mostrarEliminar() {
            document.getElementById('formularioEliminar').style.display = 'block';
        }

        function ocultarEliminar() {
            document.getElementById('formularioEliminar').style.display = 'none';
        }

        function borrarCamposAnadir() {
            document.getElementById('nombre').value = '';
            document.getElementById('precio').value = '';
        }

        function borrarCamposEliminar() {
            document.getElementById('id').value = '';
        }

        function toggleAyuda() {
            var ayuda = document.getElementById('ayuda');
            if (ayuda.style.display === 'none') {
                ayuda.style.display = 'block';
            } else {
                ayuda.style.display = 'none';
            }
        }
    </script>