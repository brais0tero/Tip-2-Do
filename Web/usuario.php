<?php

if (! isset($_COOKIE['PHPSESSID']))
{
    header("Location: ./Index.php");
}
else
{
    session_start();
}

include "./backend/conexionBD.php";
$db = dbConnect();
            //  Obtener Miembro
            $query = "SELECT nombre as Nombre,  foto as Imagen From usuario where id =".$_SESSION["id"];
            $consulta = $db->query($query);
            $datos = $consulta->fetchAll();

        //   Obtener Seguidas

          $query = "SELECT CONCAT('./', LOWER(multimedia.tipo),'.php?ID=', multimedia.id) as URL, multimedia.titulo as nombre, multimedia.tipo as informacion, multimedia.imagenPortada as IMG FROM multimedia
          INNER JOIN seguir
          ON seguir.ID_multimedia = multimedia.id where seguir.ID_usuario=".$_SESSION["id"];
          $consulta = $db->query($query);
          $seguidas = $consulta->fetchAll();

            $db = null; 
    
?>
<!doctype html>
<html lang="es">

<head>
    <title>Tip 2 Do | <?php echo $datos[0]["Nombre"]?></title>
    <link rel="icon" type="image/svg" href="./imagenes/Tip2Do.svg">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="./CSS/estilos.css">
</head>

<body class="d-flex">
    <nav id="nav" class="d-flex sticky-top">
        <!-- Navbar injectada -->
    </nav>
    <!-- Mostrar Contenido persona -->
    <main class="container-fluid">
        <section class="row text-light portada">
            <div class="col-lg ">
                <img src=<?php echo $datos[0]["Imagen"]?> alt=<?php echo $datos[0]["Nombre"] ?> class="img-fluid">
            </div>
            <div class="col-md portadaTexto">
                <h1><?php echo $datos[0]["Nombre"]?> <button type="button" name="" id="ajustes"
                        class="btn btn-primary btn-dark"><i class="fa fa-cog"></i></button></h1>

                <div id="modificar" class="row invisible">

                    <div class="col-md">
                        <div class="form-group ">
                            <p>Cambiar Nombre</p>
                            <input type="text" class="form-control" name="" id="Regnombre" aria-describedby="helpId"
                                placeholder="Nuevo nombre">
                            <button type="button" name="" id="cambiarNombre" class="btn btn-primary btn-dark">Cambiar nombre</button>
                        </div>
                    </div>
                    <div class="col-md">
                        <p>Cambiar contraseña</p>
                        <div class="form-group">
                            <input type="password" class="form-control" name="claveNueva" id="claveNueva"
                                placeholder="Clave nueva">
                            <input type="password" class="form-control" name="claveNuevaRep" id="claveNuevaRep"
                                placeholder="Repita la nueva clave">
                            <input name="" id="cambiarClave" class="btn btn-primary btn-dark" type="button"
                                value="Cambiar Contraseña">
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section>

            <h3>Seguido</h3>

            <div class="resultados">
                <?php
          foreach($seguidas as $seguido){
          ?>
                <a href="<?php echo $seguido['URL']?>" class="box">

                    <div class="imgbox">

                        <img src=<?php echo $seguido['IMG']."" ?> class="img-responsive">
                    </div>
                    <div class="content">
                        <h3><?php echo $seguido['nombre']?></h3>
                        <p><?php echo $seguido['informacion']?></p>
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
    <script src="./JS/main.js" type="module"></script>
    <script src="./JS/validar.js" type="module"></script>
</body>

</html>