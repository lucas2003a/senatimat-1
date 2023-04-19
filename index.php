<?php
session_start();

if (isset($_SESSION['login']) && $_SESSIOM['login']){
  header('Location: views/index.php');
}
?>

<!doctype html>
<html lang="es">

<head>
  <title>Bienvenido al Sistema</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- ÍCONOS FONTAWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <!-- INICIO DE CARD -->
        <div class="card">
          <div class="card-header bg-info text-light">
           <strong>Inicio de sesión</strong>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-center">
              <img src="views/img/fotografias/programador.png" alt="Imagen Usuario" width="100" height="100">
            </div>
            <form action="" autocomplete="off">
              <div class="mb-3">
                <label for="usuario" class="form-label">Usuario:</label>
                <input type="text" id="usuario" class="form-control form-control-sm" autofocus>
              </div>
              <div class="mb-3">
                <label for="clave" class="form-label">Contraseña:</label>
                <input type="password" id="clave" class="form-control form-control-sm">
              </div>
            </form>
          </div>
          <div class="card-footer text-center">
            <button type="button" class="btn btn-sm btn-success">Iniciar sesión</button>
          </div>
        </div>
        <!-- FIN DE CARD-->
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</body>

<!-- jQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</html>