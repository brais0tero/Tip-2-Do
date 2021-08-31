<?php 
// include "./backend/conexionBD.php";

//     if (! isset($_COOKIE['PHPSESSID']))
//     {
//         header("Location: ./Index.php");
//     }
//     else
//     {
//     session_start();
//     $db = dbConnect();

//             $query = "SELECT administrador as 'admin' FROM usuario WHERE id LIKE ".$_SESSION["id"];
//             $consulta = $db->query($query);
//             $datos = $consulta->fetch();
//            if($datos['admin']<>1)
//            {
//             header("Location: ./Index.php");
//            } 
//     }

// ?> 

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


<!-- Crear un sistema de decteccion de tipo de datos de SQL y transformar en tipos de entradas de texto -->

<!doctype html>
<html lang="en">
  <head>
  <title>Administracion</title>
  <!-- logo -->

  <link rel="icon" type="image/svg" href="./imagenes/Tip2Do.svg">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>
      <h1>Pagina Administracion Tip 2 Do</h1>
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
          <button type="button" class="btn btn-primary" id="Pelis">Agregar Peliculas/Actores automaticamente</button>
          
          <button id="Series" class="btn btn-primary" id="Pelis">Agregar Series/Actores automaticamente</button>
          <button id="Series" class="btn btn-primary" id="Pelis">Actualizar Miembros</button>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script type="module" src="./JS/contenido.js"></script>
  </body>
</html>