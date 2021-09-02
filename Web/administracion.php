<?php
include "./backend/conexionBD.php";

    if (! isset($_COOKIE['PHPSESSID'])) {
        header("Location: ./Index.php");
    } else {
        session_start();
        $db = dbConnect();
        try {
            $query = "SELECT administrador FROM usuario WHERE id LIKE ".$_SESSION['id'];
            $consulta = $db->query($query);
            $datos = $consulta->fetch();
            if ($datos['administrador']<>1) {
                header("Location: ./Index.php");
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

 ?>
<!doctype html>
<html lang="es">

<head>
  <title>Administracion</title>
  <!-- logo -->

  <link rel="icon" type="image/svg" href="./imagenes/Tip2Do.svg">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css"
    href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />
</head>

<body class="container-fluid">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="./Index.php">Tip 2 Do</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" id="Pelicula">Pelicula</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" id="Serie">Serie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" id="Participante">Participante</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page">Usuario</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <h1>Pagina Administracion Tip 2 Do</h1>
  <section class="row" id="#automatico">

    <div class="col-md">
      <h2>Agregar datos automaticamente</h2> <button type="button" class="btn btn-primary" id="PelisBTN">Agregar
        Peliculas/Actores automaticamente</button>

      <button id="SeriesBTN" class="btn btn-primary">Agregar Series/Actores automaticamente</button>

      <button id="ActoresBTN" class="btn btn-primary">Actualizar Miembros</button>
    </div>

  </section>
  <section class="row" id="#pelicula">
    <div class="col-md">
      <table id="tablpelicula"></table>
    </div>
    <div>
      <form action="">

      </form>
    </div>
  </section>
  <section class="row" id="#serie">
    <div class="col-md">
      <table id="tablpelicula"></table>
    </div>
    <div>
      <form action="">

      </form>
    </div>
  </section>
  </section>
  <section class="row" id="#usuario">
    <div class="col-md table-responsive table-wrapper-scroll-y my-custom-scrollbar">
      <table class="table-responsive" id="tablPelicula"></table>
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Titulo</th>
          <th scope="col">Clasificacion</th>
          <th scope="col">Tipo</th>
          <th scope="col">Sinopsis</th>
          <th scope="col">Imagen</th>
          <th scope="col">Imagen Portada</th>
          <th scope="col">Estreno</th>
          <th scope="col">Duracion</th>
          <th scope="col">Nota</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </div>
    <div class="col-md">
    <form>
  <div class="form-group">
    <label for="Titulo">Titulo</label> 
    <input id="Titulo" name="Titulo" placeholder="Titulo" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label></label> 
    <input id="IDPeli" name="IDPeli" placeholder="Id Pelicula" type="text" class="form-control">
  </div>
 
  <div class="form-group">
    <label for="Sinopsis">Sinopsis</label> 
    <textarea id="Sinopsis" name="Sinopsis" cols="40" rows="5" class="form-control"></textarea>
  </div> 
  <div class="form-group">
    <button name="submit" type="submit" class="btn btn-primary">Agregar</button>
    <button type="button" class="btn btn-primary">Modificar</button>
        <button type="button" class="btn btn-primary">Eliminar</button>
  </div>
  
     
</form>
    </div>
  </section>
  </section>
  <section class="row" id="#miembro">
    <div class="col-md">
      <table id="tablpelicula"></table>
    </div>
    <div>
      <form action="">

      </form>
    </div>
  </section>
  </section>
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

  <!-- Custom JS -->
  <script type="module" src="./JS/contenido.js"></script>
</body>

</html>

