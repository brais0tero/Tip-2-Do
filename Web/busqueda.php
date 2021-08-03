<?php 
require_once "./backend/funciones.php"
?>

<!doctype html>
<html lang="en">

<head>
  <title>Tip 2 Do | Busqueda
  </title>
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

  <main class="container-fluid">
      <section class="row sticky-top">
      <input type="text" class="form-control input-lg" placeholder="Buscar..." aria-label="Search" id="busqueda">
      </section>
    <section class="row resultados max-height: 100%" id="resultados">
    </section>
    
  </main>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js,  Bootstrap JS -->
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