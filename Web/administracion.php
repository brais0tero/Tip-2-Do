<?php 
include "./backend/conexionBD.php";

    if (! isset($_COOKIE['PHPSESSID']))
    {
        header("Location: ./Index.php");
    }
    else
    {
    session_start();
    $db = dbConnect();

            $query = "SELECT administrador as 'admin' FROM usuario WHERE id LIKE ".$_SESSION["id"];
            $consulta = $db->query($query);
            $datos = $consulta->fetch();
           if($datos['admin']<>1)
           {
            header("Location: ./Index.php");
           } 
    }

?>
<!-- AGREGAR SISTEMA DE DESTACOS -->

<!-- BOTONES DE SELECCION DE DATOS EN FUNCION DEL QUE SE QUIERA MOSTRAR EN PORTADA -->

<!-- Usar esta linea SQL para obtener informacion de tablas y auto generar el formulario

SSELECT table_name as Tabla, COLUMN_NAME as Datos, DATA_TYPE as Tipo FROM information_schema.COLUMNS WHERE table_schema = "tip2do" -->

<!-- Auto generar botones  para interactuar
    SELECT table_name AS `Tabla`
  FROM information_schema.TABLES 
  WHERE table_schema = "tip2do"

-->

<!-- Podria crear una manera de generar proceduralmente los botones para gestionar (No harcode) -->



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
        <h2>Gestion Pagina Principal</h2>
        <div id="gesstion">

        </div>
    </section>
    <section>
        <!-- Agregar Api -->     
        <!-- Funciones de Api con INSET INTO (Nombre de table seleccionado) -->
        <h2>Agregar datos</h2>
        <div id="crear">

        </div>

    </section>
    
    <section>
        <!-- Funciones de la Api donde se haga un Alter table -->

        <!-- Agregar un sistema de busqueda -->
        <h2>Modificar</h2>
        <div id="Modificar">

        </div>
    </section>

    <section>
        <!-- Funcion Api Delete From -->
        <h2>Eliminar</h2>
        <div id="Eliminar"> 

        </div>
    </section>


    <section>
        <!--  Agregar boton con ajax donde marque cantidad de quejas en rojo para poder revisar -->
        <h2>Avisos</h2>
        <div id="Avisos" >

        </div>
    </section>

</body>
</html>

<!-- Crear un sistema de decteccion de tipo de datos de SQL y transformar en tipos de entradas de texto -->