<!-- Main Page de pelicula -->


<?php
include "./backend/conexionBD.php";
$db = dbConnect();
            //  Obtener informacion de la pelicula
            $query = "SELECT multimedia.titulo as Titulo, multimedia.nota as Nota, multimedia.clasificacion as Clasificacion, multimedia.sinopsis as Sinopsis, multimedia.imagenPortada as Imagen, pelicula.duracion AS Duracion
            FROM multimedia
            INNER JOIN pelicula 
            ON multimedia.id = pelicula.ID_multimedia WHERE multimedia.id=".$_GET['ID'];
            $consulta = $db->query($query);
            $datos = $consulta->fetchAll();

            // Obtener datos de genero de la pelicula
            $query = "SELECT genero.nombre as Tipo, genero.descripcion as Descripcion From genero INNER JOIN genero_multimedia ON genero_multimedia.ID_genero = genero.id WHERE genero_multimedia.ID_multimedia = ".$_GET['ID'];
            $consulta = $db->query($query);
            $generos = $consulta->fetchAll();
           
            // Obtener Trailers
            $query = "Select titulo as Titulo, url as URL FROM trailer WHERE ID_multimedia = ".$_GET['ID'];
            $consulta = $db->query($query);
            $trailers = $consulta->fetchAll();


            // Obtener Plataforma
            $query = "SELECT nombre as Nombre, url as URL FROM plataforma INNER JOIN plataforma_multimedia ON plataforma_multimedia.ID_plataforma = plataforma.id WHERE plataforma_multimedia.ID_multimedia = ".$_GET['ID'];
            $consulta = $db->query($query);
            $plataformas = $consulta->fetchAll();


            // Obtener Franquicia
            $query = "SELECT franquicia.nombre as Nombre, franquicia.abreviatura as Abreviatura FROM franquicia INNER JOIN franquicia_multimedia ON franquicia_multimedia.ID_franquicia = franquicia.id WHERE franquicia_multimedia.ID_multimedia = ".$_GET['ID'];
            $consulta = $db->query($query);
            $franquicias = $consulta->fetchAll();

            $db = null; 
    
?>
<!doctype html>
<html lang="en">

<head>
  <title>Tip 2 Do | <?php echo $datos[0]["Titulo"]?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="./CSS/estilos.css">
  <script src="./JS/main.js" type="module"></script>
</head>

<body class="d-flex">
  <nav id="nav" class="d-flex sticky-top">
    <!-- Navbar injectada -->
  </nav>
  <!-- Mostrar Contenido pelicula -->
  <main class="container-fluid">
    <section class="row portada" <?php echo 'style="background-image: url('.$datos[0]["Imagen"].')"'?>>
      <div class="col-md text-center">
        <h1><?php echo $datos[0]["Titulo"]?></h1>
        <p><?php echo $datos[0]["Sinopsis"] ?></p>
      </div>
      <div class="col-md">
        <table class="mx-auto table-condensed ">
          <tbody>
            <tr>
              <td data-title="Genero">Genero:</td>
              <td data-title="GeneroTipo">
                <?php
                    foreach ($generos as $genero){
                        echo $genero["Tipo"];
                    }
                    ?>
              </td>
            </tr>
            <tr>
              <td data-title="Clasificacion">Clasificacion</td>
              <td data-title="TipoClasificacion"><?php echo $datos[0]["Clasificacion"] ?></td>
            </tr>
            <tr>
              <td data-title="Duracion">Duracion (minutos):</td>
              <td data-title="CantidadDuracion"><?php echo $datos[0]["Duracion"] ?></td>
            </tr>
            <tr>
              <td data-title="Nota">Nota:</td>
              <td data-title="CantidadNota"><?php echo $datos[0]["Nota"] ?></td>
            </tr>
            <tr>
              <td data-title="Franquicia">Franquicia:</td>
              <td data-title="InfoFranquicia"><?php
                  foreach($franquicias as $franquicia)
                  {
                    echo $franquicia["Abreviatura"];
                  }
                  ?></td>
            </tr>
            <tr>
              <td data-title="Plataformas">Plataformas:</td>
              <td data-title="PlataformasInfo"><?php
                   foreach($plataformas as $plataforma)
                   {
                     echo '<a href='.$plataforma["URL"].'>
                     '.$plataforma["Nombre"].'
                     </a>';
                   }
                  ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <img src=<?php echo $datos[0]["Imagen"].""?> style="visibility: hidden;" class="img-fluid" />


     

    </section>
    <section>

      <!-- miembros -->

      <!-- Trailers -->
      <?php
          foreach($trailers as $trailer){
          ?>
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item"
          src="https://www.youtube.com/embed/<?php echo  explode("https://youtu.be/",$trailer['URL'])[1] ?>"
          allowfullscreen></iframe>
        <?php
  }  ?>
      </div>

    </section>
  </main>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</body>

</html>