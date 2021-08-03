<?php

    function insertarUsuario($nombre, $correo, $claveHash)
    {
        try{
             $db = dbConnect();
        $query = "INSERT INTO usuario (nombre , correo , contraseña) VALUES (:nombre, :correo, :contrasenha)";
        $consulta = $db->prepare($query);
        $consulta->bindValue(":nombre", $nombre);
        $consulta->bindValue(":correo", $correo);
        $consulta->bindValue(":contrasenha", $claveHash);

       $consulta->execute();
        $db = null;  
        } catch(PDOException $e) 
        { 
        print $e->getMessage(); 
        } 
    }

     function verificarClave($correo, $clave)
    {
        try
        {
            $db = dbConnect();
            $query = "SELECT * FROM usuario WHERE '". $correo ."' = correo";
            $consulta = $db->query($query);
            $datos = $consulta->fetch();
            // var_dump($datos);
            

            if(password_verify($clave, $datos["contraseña"])){ 

                session_start();  
                $_SESSION['usuario']=$_POST['nombre'];
                $_SESSION['clave']= $datos["contraseña"];
                header("Location: ../Index.php");

            }
            // var_dump();
            // echo $datos["contraseña"];
            $db = null;  
        } 
        catch(PDOException $e) 
        { 
        print $e->getMessage(); 
        } 
    }

    function pedirMultimedia()
    {
        try
        {
            $db = dbConnect();
            $query = "SELECT CONCAT('./', LOWER(multimedia.tipo),'.php?ID=', multimedia.id) as URL, multimedia.titulo as nombre, multimedia.tipo as informacion, multimedia.imagen as IMG FROM multimedia";
            $consulta = $db->query($query);
            $datos = $consulta->fetchall();
            $db = null; 
            return json_encode($datos);
           
        } 
        catch(PDOException $e) 
        { 
        print $e->getMessage(); 
        } 
    }

    function buscarMultimedia($buscado)
    {
        try
        {
            $db = dbConnect();
            $query = "SELECT CONCAT('./', LOWER(multimedia.tipo),'.php?ID=', multimedia.id) as URL, multimedia.titulo as nombre, multimedia.tipo as informacion, multimedia.imagen as IMG FROM multimedia WHERE UPPER(multimedia.titulo) LIKE UPPER('%$buscado%')";

            $consulta = $db->query($query);
            $datos = $consulta->fetchall();
            $db = null; 
            return $datos;
           
        } 
        catch(PDOException $e) 
        { 
        print $e->getMessage(); 
        } 
    }

    function buscarMiembro($buscado){
        $db = dbConnect();
            $query = "SELECT CONCAT('./miembro','.php?ID=', participante.id) as URL, participante.id as particip4nte, participante.nombre as nombre, participante.imagen as IMG, (SELECT puesto
            FROM participante_multimedia
            WHERE ID_participante = particip4nte
            GROUP BY `puesto`
            ORDER BY COUNT(puesto)DESC LIMIT 1 )  as informacion 
            FROM participante 
            INNER JOIN participante_multimedia 
            ON participante.id = participante_multimedia.ID_participante 
            WHERE UPPER(nombre) LIKE UPPER('%$buscado%')
            Group By participante.id";
            $consulta = $db->query($query);
            $datos = $consulta->fetchall();
            $db = null; 
            return $datos;
    }


?>