<?php
// Hoja de funciones PHP con conexion PDO
// Creacion de Usuario
    function insertarUsuario($nombre, $correo, $claveHash, $foto=null, $administrador=null, $id=null)
    {
        try {
            $db = dbConnect();

            $query = 'INSERT INTO usuario (id, nombre , correo , contraseña, foto ,administrador) VALUES (:id, :nombre, :correo, :contrasenha, IFNULL(:foto, DEFAULT(foto)), IFNULL(:administrador, DEFAULT(administrador)))';
       
            $consulta = $db->prepare($query);
            $consulta->bindValue(":id", $id);
            $consulta->bindValue(":nombre", $nombre);
            $consulta->bindValue(":correo", $correo);
            $consulta->bindValue(":contrasenha", $claveHash);
            $consulta->bindValue(":foto", $foto, PDO::ATTR_DEFAULT_STR_PARAM);
            $consulta->bindValue(":administrador", $administrador, PDO::PARAM_BOOL);
            return $consulta->execute();
            $db = null;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

// Creacion de Multimedia
      function insertarMultimedia($tipo, $titulo, $sinopsis, $imagen=null, $imagenPortada=null, $estreno=null, $id=null)
      {
          try {
              $db = dbConnect();
              $query = 'INSERT IGNORE INTO  multimedia (id , titulo, sinopsis, tipo,imagen, imagenPortada, estreno) VALUES (:id , :titulo, :sinopsis, :tipo, IFNULL(:imagen, DEFAULT(imagen)), IFNULL(:imagenPortada, DEFAULT(imagenPortada)), :estreno)';
              $consulta = $db->prepare($query);
              $consulta->bindValue(":id", $id);
              $consulta->bindValue(":titulo", $titulo);
              $consulta->bindValue(":sinopsis", $sinopsis);
              $consulta->bindValue(":imagen", $imagen);
              $consulta->bindValue(":imagenPortada", $imagenPortada);
              $consulta->bindValue(":estreno", $estreno);
              $consulta->bindValue(":tipo", $tipo);
              echo $consulta->execute();
              echo ' M ';
              $db = null;
          } catch (PDOException $e) {
              echo $e->getMessage();
          }
      }
// Insertar Pelicula
      function insertarPelicula($id, $duracion)
      {
          try {
              $db = dbConnect();
              $query = 'INSERT IGNORE INTO  pelicula (ID_Multimedia, duracion) VALUES (:id, :duracion)';
              $consulta = $db->prepare($query);
              $consulta->bindValue(":id", $id);
              $consulta->bindValue(":duracion", $duracion);
              $consulta->execute();
              $db = null;
          } catch (PDOException $e) {
              echo $e->getMessage();
          }
      }
// Insertar Serie
  function insertarSerie($id, $temporada)
  {
      try {
          $db = dbConnect();
          $query = 'INSERT IGNORE INTO  serie (ID_Multimedia, temporada) VALUES (:id, :temporada)';
          $consulta = $db->prepare($query);
          $consulta->bindValue(":id", $id);
          $consulta->bindValue(":temporada", $temporada);
          $consulta->execute();
          echo ' Serie ';
          $db = null;
      } catch (PDOException $e) {
          echo $e->getMessage();
      }
  }

// Insertar Genero

    function insertarGeneros($generos)
    {
        if ($generos == null) {
            return false;
        } else {
            try {
                $db = dbConnect();
                $query = 'INSERT IGNORE INTO  genero (id, nombre) VALUES (:id, :nombre)';
                foreach ($generos as $genero) {
                    $consulta = $db->prepare($query);
                    $consulta->bindValue(":id", intval($genero['id']));
                    $consulta->bindValue(":nombre", $genero['name']);
                    $consulta->execute();
                    echo ' genero ';
                }
           
            
                $db = null;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
      function insertarGenero($nombre, $id=null)
      {
          try {
              $db = dbConnect();
              $query = 'INSERT IGNORE INTO  genero (id, nombre) VALUES (:id, :nombre)';
              $consulta = $db->prepare($query);
              $consulta->bindValue(":id", $id);
              $consulta->bindValue(":nombre", $nombre);
              echo $consulta->execute();
              $db = null;
          } catch (PDOException $e) {
              echo $e->getMessage();
          }
      }
    function insertarGenero_multimedia($id, $generos)
    {
        if ($generos!=null) {
            try {
                $db = dbConnect();
                $query = 'INSERT IGNORE INTO  genero_multimedia (ID_multimedia, ID_genero) VALUES (:ID_multimediad, :ID_genero)';

                foreach ($generos as $genero) {
                    $consulta = $db->prepare($query);
                    $consulta->bindValue(":ID_genero", intval($genero['id']));
                    $consulta->bindValue(":ID_multimediad", $id);
                    $consulta->execute();
                    echo ' generoM ';
                }
                $db = null;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
// Insertar Participantes
    function insertarParticipantes($miembros)
    {
        try {
            $db = dbConnect();
            $query = 'INSERT IGNORE INTO participante (id, nombre, imagen) VALUES (:id, :nombre, IFNULL(:imagen,DEFAULT(imagen)))';
            foreach ($miembros as $miembro) {
                $consulta = $db->prepare($query);
                $consulta->bindValue(":id", intval($miembro['id']));
                $consulta->bindValue(":nombre", $miembro['name']);
                if ($miembro['profile_path']!=null) {
                    $miembro['profile_path']=  'https://image.tmdb.org/t/p/original'.$miembro['profile_path'];
                }
                $consulta->bindValue(":imagen", $miembro['profile_path']);
                $consulta->execute();
                echo ' participante ';
            }
            $db = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function insertarParticipante($nombre, $nacimiento=null, $biografia=null, $imagen=null, $id=null)
    {
        try {
            $db = dbConnect();
            $query = 'INSERT IGNORE INTO participante (id, nombre, imagen, nacimiento, biografia) VALUES (:id, :nombre, IFNULL(:imagen,DEFAULT(imagen), :biografia, :nacimiento))';
        
            $consulta = $db->prepare($query);
            $consulta->bindValue(":id", $id);
            $consulta->bindValue(":nombre", $nombre);
            $consulta->bindValue(":imagen", $imagen);
            $consulta->bindValue(":nacimiento", $nacimiento);
            $consulta->bindValue(":biografia", $biografia);
            $consulta->execute();
        
            $db = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
// Agregar Participacion
    function insertarParticipanteMultimedia($miembros, $id)
    {
        try {
            $db = dbConnect();
            $query = 'INSERT IGNORE INTO  participante_multimedia (ID_multimedia, ID_participante, puesto) VALUES (:ID_multimediad, :ID_participante, :puesto)';
            foreach ($miembros as $miembro) {
                $consulta = $db->prepare($query);
                $consulta->bindValue(":ID_participante", intval($miembro['id']));
                $consulta->bindValue(":ID_multimediad", $id);
                $consulta->bindValue(":puesto", $miembro['character']);
                $consulta->execute();
                echo ' PM ';
            }
            $db = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
// Eliminar Usuario
    function eliminiarUsuario($id)
    {
        try {
            $db = dbConnect();
            $query ='DELETE FROM usuario WHERE id = :id';
            $consulta = $db->prepare($query);
            $consulta->bindValue(":ID_participante", intval($id));
            $consulta->execute();
            echo ' PM ';
            $db = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
// Eliminar Multimedia
    function eliminarMultimedia($id)
    {
        try {
            $db = dbConnect();
            $query ='DELETE FROM multimedia WHERE id = :id';
            $consulta = $db->prepare($query);
            $consulta->bindValue(":ID_participante", intval($id));
            $consulta->execute();
            echo ' PM ';
            $db = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
// Eliminar Participante
    function eliminarParticipante($id)
    {
        try {
            $db = dbConnect();
            $query ='DELETE FROM participante WHERE id = :id';
            $consulta = $db->prepare($query);
            $consulta->bindValue(":ID_participante", intval($id));
            $consulta->execute();
            echo ' PM ';
            $db = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
// Eliminar Seguir
    function insertarSeguir($multimedia, $usuario)
    {
        try {
            $db = dbConnect();
            $query = 'INSERT IGNORE INTO  seguir (ID_Multimedia, ID_usuario) VALUES (:id, :usuario)';
       
            $consulta = $db->prepare($query);
            $consulta->bindValue(":id", $multimedia);
            $consulta->bindValue(":usuario", $usuario);
            echo $consulta->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
// Eliminar Seguir
    function eliminarSeguir($multimedia, $usuario)
    {
        try {
            $db = dbConnect();
            $query = 'DELETE FROM  seguir WHERE ID_Multimedia =  $multimedia AND ID_usuario = $usuario)';
            $consulta = $db->prepare($query);
            echo $consulta->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

// Actualizar Usuario
    function actualizarUsuario($id, $nombre, $correo, $claveHash, $foto=null, $administrador=null)
    {
        try {
            $db = dbConnect();

            $query = 'UPDATE usuario set id = :id, nombre = :nombre , correo = :correo, contraseña=:contrasenha, foto =:foto ,administrador =:administrador WHERE id = :id';
      
            $consulta = $db->prepare($query);
            $consulta->bindValue(":id", $id);
            $consulta->bindValue(":nombre", $nombre);
            $consulta->bindValue(":correo", $correo);
            $consulta->bindValue(":contrasenha", $claveHash);
            $consulta->bindValue(":foto", $foto, PDO::ATTR_DEFAULT_STR_PARAM);
            $consulta->bindValue(":administrador", $administrador, PDO::PARAM_BOOL);
            return $consulta->execute();
            $db = null;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
    function actualizarUsuarioNombre($id, $nombre)
    {
        try {
            $db = dbConnect();

            $query = 'UPDATE usuario set id = :id, nombre = :nombre  WHERE id = :id';
      
            $consulta = $db->prepare($query);
            $consulta->bindValue(":id", $id);
            $consulta->bindValue(":nombre", $nombre);
            return $consulta->execute();
            $db = null;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
    function actualizarUsuarioContrasenha($id, $clave)
    {
        try {
            $db = dbConnect();

            $query = 'UPDATE usuario set id = :id, contraseña = :clave  WHERE id = :id';
      
            $consulta = $db->prepare($query);
            $consulta->bindValue(":id", $id);
            $consulta->bindValue(":clave", $clave);
            return $consulta->execute();
            $db = null;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
// Actualizar Multimedia
function actualizarMultimedia($tipo, $titulo, $sinopsis, $imagen=null, $imagenPortada=null, $estreno=null, $id=null)
{
    try {
        $db = dbConnect();

        $query = 'UPDATE multimedia set titulo = :titulo, sinopsis = :sinopsis, imagen = :imagen, "imagenPortada"= :imagenPortada, estreno = :estreno ,tipo= :tipo , id = :id WHERE id = :id';
  
        $consulta = $db->prepare($query);
        $consulta->bindValue(":id", $id);
        $consulta->bindValue(":titulo", $titulo);
        $consulta->bindValue(":sinopsis", $sinopsis);
        $consulta->bindValue(":imagen", $imagen);
        $consulta->bindValue(":imagenPortada", $imagenPortada);
        $consulta->bindValue(":estreno", $estreno);
        $consulta->bindValue(":tipo", $tipo);
        return $consulta->execute();
        $db = null;
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}
// Actualizar Miembro
function actualizarMiembro($id, $nombre, $nacimiento=null, $biografia=null, $imagen=null)
{
    try {
        $db = dbConnect();
        $query = 'UPDATE participante set id = :id, nombre=:nombre, imagen = :imagen, nacimiento=:nacimiento, biografia=:biografia WHERE id = :id';
  
        $consulta = $db->prepare($query);
        $consulta = $db->prepare($query);
        $consulta->bindValue(":id", $id);
        $consulta->bindValue(":nombre", $nombre);
        $consulta->bindValue(":imagen", $imagen);
        $consulta->bindValue(":nacimiento", $nacimiento);
        $consulta->bindValue(":biografia", $biografia);
        return $consulta->execute();
   
        $db = null;
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}

// funcion para inicar sesion
     function inicioSesion($correo, $clave)
     {
         try {
             $db = dbConnect();
             $query = "SELECT * FROM usuario WHERE correo LIKE '$correo'";
             $consulta = $db->query($query);
             $datos = $consulta->fetch();
             if (password_verify($clave, $datos["contraseña"])) {
                 session_start();
                 $_SESSION["nombre"] = $datos["nombre"];
                 $_SESSION["foto"] = $datos["foto"];
                 $_SESSION["id"] = $datos["id"];
                 
                 return true;
             } else {
                 return false;
             }
           
             $db = null;
         } catch (PDOException $e) {
             print $e->getMessage();
         }
     }

// Peticion de datos a la base de datos
    function pedirMultimedia()
    {
        try {
            $db = dbConnect();
            $query = "SELECT CONCAT('./', LOWER(multimedia.tipo),'.php?ID=', multimedia.id) as URL, multimedia.titulo as nombre, multimedia.tipo as informacion, multimedia.imagen as IMG FROM multimedia";
            $consulta = $db->query($query);
            $datos = $consulta->fetchall();
            $db = null;
            return json_encode($datos);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

// Busqueda de datos
    function buscarMultimedia($buscado)
    {
        try {
            $db = dbConnect();
            $query = "SELECT CONCAT('./', LOWER(multimedia.tipo),'.php?ID=', multimedia.id) as URL, multimedia.titulo as nombre, multimedia.tipo as informacion, multimedia.imagenPortada as IMG FROM multimedia WHERE UPPER(multimedia.titulo) LIKE UPPER('%$buscado%')";

            $consulta = $db->query($query);
            $datos = $consulta->fetchall();
            $db = null;
            return $datos;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

// Busqueda de Cast *Futura mejora de unificar la busqueda
    function buscarMiembro($buscado)
    {
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
// Obtener Multimedia
function obtenerMultimediaSerie()
{
    try {
        $db = dbConnect();
        $query = "SELECT *
        FROM multimedia
        INNER JOIN serie 
        ON multimedia.id = serie.ID_multimedia ";
        $consulta = $db->query($query);
        return $consulta->fetchAll();
        $db = null;
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}

function obtenerMultimediaPelicula(){
    try {
        $db = dbConnect();
        $query = "SELECT *
        FROM multimedia
        INNER JOIN pelicula 
        ON multimedia.id = pelicula.ID_multimedia ";
        $consulta = $db->query($query);
        return $consulta->fetchAll();
        $db = null;
    } catch (PDOException $e) {
        print $e->getMessage();
    }

}

// Obtener Miembro
function obtenerMiembros()
{
    try {
        $db = dbConnect();
        $query = "SELECT * FROM participante";
        $consulta = $db->query($query);
        return $consulta->fetchAll();
        $db = null;
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}


// sistema de busqueda para login

    function buscarCorreo($mail)
    {
        $db = dbConnect();
        $query = "SELECT correo FROM usuario WHERE correo like '$mail'";
        $consulta = $db->query($query);
        $dato = $consulta->fetch();
        $db = null;
        return $dato;
    }

    function buscarUsuario($nombre)
    {
        $db = dbConnect();
        $query = "SELECT nombre FROM usuario WHERE nombre like '$nombre'";
        $consulta = $db->query($query);
        $dato = $consulta->fetch();
        $db = null;
        return $dato;
    }
