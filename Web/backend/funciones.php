<?php
// Hoja de funciones PHP con conexion PDO

    // Creacion de usuario
    function insertarUsuario($nombre, $correo, $claveHash)
    {
        try{
             $db = dbConnect();
        $query = "INSERT INTO usuario (nombre , correo , contraseña) VALUES (:nombre, :correo, :contrasenha)";
        $consulta = $db->prepare($query);
        $consulta->bindValue(":nombre", $nombre);
        $consulta->bindValue(":correo", $correo);
        $consulta->bindValue(":contrasenha", $claveHash);

      return $consulta->execute();
        $db = null;  
        } catch(PDOException $e) 
        { 
        print $e->getMessage(); 
        } 
    }

      // Creacion de MultimediaAuto
      function insertarMultimedia($id , $titulo, $sinopsis, $imagen, $imagenPortada, $estreno, $tipo)
      {
          try{
               $db = dbConnect();
          $query = 'INSERT IGNORE INTO  multimedia (id , titulo, sinopsis, tipo,imagen, imagenPortada, estreno) VALUES (:id , :titulo, :sinopsis, :tipo, :imagen, :imagenPortada, :estreno)';
          $consulta = $db->prepare($query);
          $consulta->bindValue(":id", $id);
          $consulta->bindValue(":titulo", $titulo);
          $consulta->bindValue(":sinopsis", $sinopsis);
          $consulta->bindValue(":imagen", $imagen);
          $consulta->bindValue(":imagenPortada", $imagenPortada);
          $consulta->bindValue(":estreno", $estreno);
          $consulta->bindValue(":tipo", $tipo);
          echo $consulta->execute();
           
          $db = null;  
          } catch(PDOException $e) 
          { 
          echo $e->getMessage(); 
          } 
      }
    //   Insertar pelicula
      function insertarPelicula($id, $duracion)
      {

          try{
               $db = dbConnect();
          $query = 'INSERT IGNORE INTO  pelicula (ID_Multimedia, duracion) VALUES (:id, :duracion)';
          $consulta = $db->prepare($query);
          $consulta->bindValue(":id", $id);
          $consulta->bindValue(":duracion", $duracion);
          echo $consulta->execute();
           
          $db = null;  
          } catch(PDOException $e) 
          { 
          echo $e->getMessage(); 
          } 
      }
  //   Insertar serie
  function insertarSerie($id, $temporada)
  {

      try{
           $db = dbConnect();
      $query = 'INSERT IGNORE INTO  pelicula (ID_Multimedia, temporada) VALUES (:id, :temporada)';
      $consulta = $db->prepare($query);
      $consulta->bindValue(":id", $id);
      $consulta->bindValue(":temporada", $temporada);
      echo $consulta->execute();
       
      $db = null;  
      } catch(PDOException $e) 
      { 
      echo $e->getMessage(); 
      } 
  }

    //   Insertar Genero

    function insertarGenero( $generos){     
        try{
            $db = dbConnect();
       $query = 'INSERT IGNORE INTO  genero (id, nombre) VALUES (:id, :nombre)';
       foreach ($generos as $genero) {

           $consulta = $db->prepare($query);
           $consulta->bindValue(":id", intval($genero['id']));
           $consulta->bindValue(":nombre", $genero['name']);
            echo $consulta->execute();
        }
       
        
       $db = null;  
       } catch(PDOException $e) 
       { 
       echo $e->getMessage(); 
       } 
    }
    function insertarGenero_multimedia($id, $generos){ 
        try{
            $db = dbConnect();
       $query = 'INSERT IGNORE INTO  genero_multimedia (ID_multimedia, ID_genero) VALUES (:ID_multimediad, :ID_genero)';
        foreach ($generos as $genero) {
             $consulta = $db->prepare($query);
             $consulta->bindValue(":ID_genero", intval($genero['id']));
             $consulta->bindValue(":ID_multimediad", $id);
             echo $consulta->execute();
        }
       $db = null;  
       } catch(PDOException $e) 
       { 
       echo $e->getMessage(); 
       } 
    }

    function insertarParticipante($miembros){
        try{
            $db = dbConnect();
       $query = 'INSERT IGNORE INTO participante (id, nombre, imagen) VALUES (:id, :nombre, :imagen)';
        foreach ($miembros as $miembro) {
             $consulta = $db->prepare($query);
             $consulta->bindValue(":id", intval($miembro['id']));
             $consulta->bindValue(":nombre", $miembro['name']);
             $consulta->bindValue(":imagen", 'https://image.tmdb.org/t/p/500w'.$miembro['profile_path']);
             echo $consulta->execute();
        }
       $db = null;  
       } catch(PDOException $e) 
       { 
       echo $e->getMessage(); 
       } 
    }

    function insertarParticipanteMultimedia($miembros, $id){
        try{
            $db = dbConnect();
       $query = 'INSERT IGNORE INTO  participante_multimedia (ID_multimedia, ID_participante, puesto) VALUES (:ID_multimediad, :ID_participante, :puesto)';
        foreach ($miembros as $miembro) {
             $consulta = $db->prepare($query);
             $consulta->bindValue(":ID_participante", intval($miembro['id']));
             $consulta->bindValue(":ID_multimediad", $id);
             $consulta->bindValue(":puesto",$miembro['character'] );
             echo $consulta->execute();
        }
       $db = null;  
       } catch(PDOException $e) 
       { 
       echo $e->getMessage(); 
       } 
    
    }

    // funcion para inicar sesion
     function inicioSesion($correo, $clave)
    {
        try
        {
            $db = dbConnect();
            $query = "SELECT * FROM usuario WHERE correo LIKE '$correo'";
            $consulta = $db->query($query);
            $datos = $consulta->fetch();        
            if(password_verify($clave, $datos["contraseña"])){ 

                 session_start();
                 $_SESSION["nombre"] = $datos["nombre"];
                 $_SESSION["foto"] = $datos["foto"];
                 $_SESSION["id"] = $datos["id"];
                 
                return true;
               
            }
            else
            {
                return false;
            }
           
            $db = null;  
        } 
        catch(PDOException $e) 
        { 
        print $e->getMessage(); 
        } 
    }

    // Peticion de datos a la base de datos
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

    // Busqueda de datos
    function buscarMultimedia($buscado)
    {
        try
        {
            $db = dbConnect();
            $query = "SELECT CONCAT('./', LOWER(multimedia.tipo),'.php?ID=', multimedia.id) as URL, multimedia.titulo as nombre, multimedia.tipo as informacion, multimedia.imagenPortada as IMG FROM multimedia WHERE UPPER(multimedia.titulo) LIKE UPPER('%$buscado%')";

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

    // Busqueda de Cast *Futura mejora de unificar la busqueda
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

// sistema de busqueda

    function buscarCorreo($mail){
        $db = dbConnect();
        $query = "SELECT correo FROM usuario WHERE correo like '$mail'";
        $consulta = $db->query($query);
        $dato = $consulta->fetch();
        $db = null;
        return $dato;
    }

    function buscarUsuario($nombre){
        $db = dbConnect();
        $query = "SELECT nombre FROM usuario WHERE nombre like '$nombre'";
        $consulta = $db->query($query);
        $dato = $consulta->fetch();
        $db = null;
        return $dato;
    }

?>