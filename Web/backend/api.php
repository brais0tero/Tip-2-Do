<?php
    include "./funciones.php";
    include './conexionBD.php';

    // Inicio de sesion de usuario
    if (isset($_POST['login']))
    {
      if(inicioSesion($_POST["correo"],$_POST['clave']))
        {
           
            echo json_encode(true);
        }
        else
        {
            echo json_encode(false);
        }
    }

    // Registrar usuario
    if (isset($_POST['registro']))
    {    
        $passHas = password_hash($_POST["clave"], PASSWORD_DEFAULT);


       insertarUsuario($_POST["nombre"],$_POST["correo"],  $passHas );

    }

    // Al cargar la pagina web
    if(isset($_POST['contenido']))
    {
        echo pedirMultimedia();
    }

    // Genereado del fomulario de busqueda
    if(isset($_POST['busqueda']))
    {
    
       $buscado = $_POST['busqueda'];
        $datos = array();
        $datos = array_merge(buscarMiembro($buscado), buscarMultimedia($buscado));
        shuffle($datos);
        echo(json_encode($datos));
    }

    // Obtener informacion del mail
    if(isset($_POST["CKcorreo"]))
    {
       echo json_encode((buscarCorreo($_POST["CKcorreo"])["correo"] == "")?TRUE:FALSE);
    }

    // Obtener informacion del Nombre
    if(isset($_POST["CheckNombre"]))
    {
        echo json_encode((buscarUsuario($_POST["CheckNombre"])["nombre"] == "")?TRUE:FALSE);
    }

    if(isset($_POST["agregarPelicula"])){
        
        echo insertarMultimedia($_POST["agregarPelicula"]["id"],$_POST["agregarPelicula"]['title'],$_POST["agregarPelicula"]['overview'],'https://image.tmdb.org/t/p/original'.$_POST["agregarPelicula"]['backdrop_path'],'https://image.tmdb.org/t/p/original'.$_POST["agregarPelicula"]['poster_path'],date($_POST["agregarPelicula"]['release_date']),'Pelicula');

        echo insertarPelicula($_POST["agregarPelicula"]["id"], intval($_POST["agregarPelicula"]["runtime"]));
    
        echo insertarGenero($_POST["agregarPelicula"]["genres"]);

        echo insertarGenero_multimedia($_POST['agregarPelicula']['id'],$_POST["agregarPelicula"]["genres"]);

        echo insertarParticipante($_POST['miembro']);
         echo insertarParticipanteMultimedia($_POST['miembro'],$_POST['agregarPelicula']['id']);
    }


    if(isset($_POST["agregarSerie"])){  
        var_dump($_POST['miembro']); 
        // echo insertarMultimedia($_POST["agregarSerie"]["id"],$_POST["agregarSerie"]['title'],$_POST["agregarSerie"]['overview'],'https://image.tmdb.org/t/p/500w'.$_POST["agregarSerie"]['backdrop_path'],'https://image.tmdb.org/t/p/500w'.$_POST["agregarSerie"]['poster_path'],date($_POST["agregarSerie"]['release_date']),'Pelicula');

        // echo insertarSerie($_POST["agregarSerie"]["id"], intval($_POST["agregarSerie"]["seasons"]));
    
        // echo insertarGenero($_POST["agregarSerie"]["genres"]);

        // echo insertarGenero_multimedia($_POST['agregarSerie']['id'],$_POST["agregarSerie"]["genres"]);

        // echo insertarParticipante($_POST['miembro']);
        //  echo insertarParticipanteMultimedia($_POST['miembro'],$_POST['agregarSerie']['id']);
    }
   
?>