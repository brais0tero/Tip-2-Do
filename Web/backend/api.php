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


       echo insertarUsuario($_POST["nombre"],$_POST["correo"],  $passHas );

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
        $datos = buscarMultimedia($buscado);
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

    // Obtener informacio Miembro
if(isset($_POST["obtenerMiembros"]))
    {
        echo json_encode(obtenerMiembros());
    }
    // Obtener Informacion Multimedia
        if(isset($_POST["obtenerPeliculas"])){
            echo json_encode(obtenerMultimediaPelicula());
        }
        if(isset($_POST["obtenerSeries"])){
            echo json_encode( obtenerMultimediaSerie());
        }
    // Obtener Informacion Usuario

// Agregar Pelicula Automaticamente
    if(isset($_POST["agregarPeliculaA"])){
        
        echo insertarMultimedia('Pelicula',$_POST["agregarPelicula"]['title'],$_POST["agregarPelicula"]['overview'],'https://image.tmdb.org/t/p/original'.$_POST["agregarPelicula"]['backdrop_path'],'https://image.tmdb.org/t/p/original'.$_POST["agregarPelicula"]['poster_path'],date($_POST["agregarPelicula"]['release_date']),$_POST["agregarPelicula"]["id"]);

        echo insertarPelicula($_POST["agregarPelicula"]["id"], intval($_POST["agregarPelicula"]["runtime"]));
    
        echo insertarGeneros($_POST["agregarPelicula"]["genres"]);

        echo insertarGenero_multimedia($_POST['agregarPelicula']['id'],$_POST["agregarPelicula"]["genres"]);

        echo insertarParticipantes($_POST['miembro']);
         echo insertarParticipanteMultimedia($_POST['miembro'],$_POST['agregarPelicula']['id']);
    }

// Agregar serie Automaticamente
    if(isset($_POST["agregarSerieA"])){   
        echo insertarMultimedia('Serie',$_POST["agregarSerie"]['name'],$_POST["agregarSerie"]['overview'],'https://image.tmdb.org/t/p/500w'.$_POST["agregarSerie"]['backdrop_path'],'https://image.tmdb.org/t/p/original'.$_POST["agregarSerie"]['poster_path'],date($_POST["agregarSerie"]['release_date']),$_POST["agregarSerie"]["id"]);

        echo insertarSerie($_POST["agregarSerie"]["id"], intval($_POST["agregarSerie"]["number_of_seasons"]));
    
        echo insertarGeneros($_POST["agregarSerie"]["genres"]);

        echo insertarGenero_multimedia($_POST['agregarSerie']['id'],$_POST["agregarSerie"]["genres"]);

        echo insertarParticipantes($_POST['miembro']);
         echo insertarParticipanteMultimedia($_POST['miembro'],$_POST['agregarSerie']['id']);
    }
//    Seguir multimedia
    if(isset($_POST["seguir"]))
    {
        session_start();
      echo insertarSeguir($_POST["seguir"], $_SESSION['id']);
    }

// agregar Miembro
    if(isset($_POST['agregarActor'])){echo 'ª';}


// Agregar Genero
if (isset($_POST['agregargenero'])) {
    echo insertarGenero($_POST["agregargenero"]['nombre']);
}
// Agregar Serie

// Agregar Pelicula

// Agregar Trailer

// Agregar Usuario

// Agregar Plataforma

// Unir Franquicia

// Unir Genero

// Unir miembro

// Unir plataforma

// Eliminar Genero

// Eliminar Serie

// Eliminar Pelicula

// Eliminar Trailer

// Eliminar Usuario

// Eliminar Plataforma

// Eliminar Miembro

// Modificar Miembro
if (isset($_POST["actualizarMiembroA"])) {
    if($_POST["actualizarMiembroA"]['birthday'] == ""){
        $fecha = NULL;  
    }else{
        $fecha = date($_POST["actualizarMiembroA"]['birthday']);
    }

  echo actualizarMiembro(intval($_POST["actualizarMiembroA"]['id']),$_POST["actualizarMiembroA"]['name'],$fecha,$_POST["actualizarMiembroA"]['biography'],"https://image.tmdb.org/t/p/original".$_POST["actualizarMiembroA"]['profile_path']);
}
// Modificar Genero
// Modificar Serie

// Modificar Pelicula

// Modificar Trailer

// Modficar Usuario

// Modificar Plataforma

// Modificar Franquicia

// Modificar Genero

// Modificar Nombre Usurio
if(isset($_POST['cambioNombre'])){
    session_start();
    $id = $_SESSION['id'];
    $_SESSION['nombre'] = $_POST['cambioNombre'];
    echo actualizarUsuarioNombre($id,$_POST['cambioNombre']);
}

?>