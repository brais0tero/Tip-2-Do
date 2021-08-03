<?php
    include "./funciones.php";
    include './conexionBD.php';
    if (isset($_POST['login']))
    {      
       verificarClave($_POST["correo"],$_POST['clave']);
    }
    if (isset($_POST['registro']))
    {    
        var_dump(password_hash($_POST["clave"], PASSWORD_DEFAULT));


        // insertarUsuario($_POST["nombre"],$_POST["correo"],password_hash($_POST["clave"], PASSWORD_DEFAULT) );

    }
    if(isset($_POST['contenido']))
    {
        echo pedirMultimedia();
    }
    if(isset($_POST['busqueda']))
    {
       $buscado = $_POST['busqueda'];
        $datos = array();
        $datos = array_merge(buscarMiembro($buscado), buscarMultimedia($buscado));

        echo json_encode($datos);
    }
  //  echo json_encode( $_GET);



?>