<?php
include "./backend/conexionBD.php";
$db = dbConnect();
            //  Obtener Miembro
            $query = "SELECT nombre as Nombre, nacimiento as Nacimiento, biografia as Biografia, imagen as Imagen From participante where id =".$_GET['ID'];
            $consulta = $db->query($query);
            $datos = $consulta->fetchAll();

          //Obtener Trabajos

          $query = "SELECT CONCAT('./', LOWER(multimedia.tipo),'.php?ID=', multimedia.id) as URL, multimedia.titulo as nombre, participante_multimedia.puesto as informacion, multimedia.imagen as IMG, participante_multimedia.ID_participante FROM multimedia
          INNER JOIN participante_multimedia
          ON participante_multimedia.ID_multimedia = multimedia.id where participante_multimedia.ID_participante=".$_GET['ID'];
          $consulta = $db->query($query);
          $trabajos = $consulta->fetchAll();

            $db = null; 
    
?>
<!doctype html>
<html lang="en">

<head>
    <title>Tip 2 Do | <?php echo $datos[0]["Nombre"]?></title>
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
        <section class="row text-light portada">
            <div class="col-lg ">
                <img src=<?php echo $datos[0]["Imagen"]?> alt=<?php echo $datos[0]["Nombre"] ?> class="img-fluid">
            </div>
            <div class="col-md portadaTexto">
                <h1><?php echo $datos[0]["Nombre"]?></h1>
                <p>Nacimiento: <?php
                  echo $datos[0]["Nacimiento"]
                  ?> </p>
                <p><?php echo $datos[0]["Biografia"] ?></p>
            </div>

        </section>
        <section>
            <!-- Trabajos -->
            <h3>Trabajos realizados</h3>

            <div class="resultados">
                <?php
          foreach($trabajos as $trabajo){
          ?>
                <a href="<?php echo $trabajo['URL']?>" class="box">

                    <div class="imgbox">

                        <img src=<?php echo $trabajo['IMG']."" ?> class="img-responsive">
                    </div>
                    <div class="content">
                        <h3><?php echo $trabajo['nombre']?></h3>
                        <p><?php echo $trabajo['informacion']?></p>
                    </div>

                </a>
                <?php
  }  ?>
            </div>

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