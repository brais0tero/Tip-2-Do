<?php 
include "./backend/conexionBD.php";

$db = dbConnect();
$query = "SELECT CONCAT('./', LOWER(multimedia.tipo),'.php?ID=', multimedia.id) as URL, multimedia.titulo as nombre, multimedia.tipo as informacion, multimedia.imagenPortada as IMG FROM multimedia WHERE multimedia.estreno = (SELECT MAX(multimedia.estreno)
FROM multimedia WHERE UPPER(multimedia.tipo) LIKE UPPER('%".$_GET["contenido"]."%'))";

$consulta = $db->query($query);
$datos = $consulta->fetchall();


$db = dbConnect();
$query = "  SELECT CONCAT('./', LOWER(multimedia.tipo),'.php?ID=', multimedia.id) as URL, multimedia.titulo as nombre, multimedia.tipo as informacion, multimedia.imagenPortada as IMG FROM multimedia 
WHERE UPPER(multimedia.tipo) LIKE UPPER('%".$_GET["contenido"]."%') ORDER BY multimedia.nota DESC";

$consulta = $db->query($query);

$valorados = $consulta->fetchall();


?>

<!doctype html>
<html lang="en">

<head>
  <title>Tip 2 Do</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" type="image/svg" href="./imagenes/Tip2Do.svg">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="./CSS/estilos.css">

  <!-- Custom JS -->
  <script src="./JS/main.js" type="module"></script>

</head>

<body class="d-flex">
  <nav id="nav" class="d-flex sticky-top">
    <!-- Navbar injectada -->
  </nav>

  <!-- Portada -->
  <main class="container-fluid">
    <section class="row portada" <?php echo 'style="background-image: url('.$datos[0]["IMG"].')"'?>>
      <div class="text-center">
        <h1><?php echo $datos[0]["nombre"]?></h1>
        <p><?php echo $datos[0]["informacion"] ?></p>
      </div>
      <img src=<?php echo $datos[0]["IMG"].""?> style="visibility: hidden;" class="img-fluid" />
      </div>
      </div>

    </section>


    <!-- Contenido -->
    <section class="row">
      <h2 style="display: inline-flex;">Mejor Valoradas</h2>
      <div class="scroller">
        <div class="row__inner">
          <?php
          foreach($valorados as $valorado){
    
          ?>
          <div class="tile">
            <a href="<?php echo $valorado['URL']?>" class="">
              <div class="tile__media">
                <img class="tile__img" src=<?php echo $valorado['IMG']."" ?> alt="" />
              </div>
              <div class="tile__details">

                <div class="tile__title">
                  <h3><?php echo $valorado['nombre']?></h3>
                  <p><?php echo $valorado['informacion']?></p>
                </div>
              </div>
            </a>
          </div>

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