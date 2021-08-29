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

        echo(json_encode($datos));
    }

    // Obtener ingformacion del mail
    if(isset($_POST["CKcorreo"]))
    {
       echo json_encode((buscarCorreo($_POST["CKcorreo"])["correo"] == "")?TRUE:FALSE);
    }

    // Obtener ingformacion del mail
    if(isset($_POST["CheckNombre"]))
    {
        echo json_encode((buscarUsuario($_POST["CheckNombre"])["nombre"] == "")?TRUE:FALSE);
    }

    if(isset($_POST["agregarPeli"])){
        echo 1;
    }
?>