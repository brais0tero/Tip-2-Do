<!-- Usar esta linea SQL para obtener informacion de tablas y auto generar el formulario
SELECT table_name, COLUMN_NAME, DATA_TYPE FROM information_schema.COLUMNS WHERE table_schema = "tip2do" -->

<!-- Podria crear una manera de generar proceduralmente los botones para gestionar (No harcode) -->

<?php 
    if (! isset($_SESSION))
    {

    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
</head>
<body>
    <section>
        <!-- Agregar Api -->

        <!-- Funciones de Api con INSET INTO (Nombre de table seleccionado) -->
        <h2>Crear</h2>

    </section>
    
    <section>
        <!-- Funciones de la Api donde se haga un Alter table -->

        <!-- Agregar un sistema de busqueda -->
        <h2>Modificar</h2>
    </section>

    <section>
        <!-- Funcion Api Delete From -->
        <h2>Borrar</h2>
    </section>


    <section>
        <!--  Agregar boton con ajax donde marque cantidad de quejas en rojo para poder revisar -->
        <h2>Avisos</h2>
    </section>

</body>
</html>