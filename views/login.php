<!-- Se llama el Header -->
<?php require_once 'views/layout/header.php'; ?>
<title>Camilo Pendejo - Login</title>
</head>

<!-- El <body> solo se abre, el </body> esta en el FOOTER -->

<body>

  <!-- Aqui va el Contenido de la Pagina -->
  <div class="container mt-4">
    <div class="row d-flex justify-content-center">
      <form action="<?= baseUrl ?>user/logear" method="POST" class="col-md-6 col-sm-12">
        <h1 class="text-center">Login</h1>
        <?php if (isset($_SESSION['registrado'])) : ?>
        <h5 class="text-primary text-center">Registrado</h5>
        <?php else : ?>
        <hr class="border-primary">
        <?php endif ?>
        <?= Utils::deleteSession('registrado') ?>
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input id="nombre" name="nombre" class="form-control" type="text">
        </div>
        <div class="form-group">
          <label for="contraseña">Contraseña</label>
          <input id="contraseña" name="contraseña" class="form-control" type="password">
        </div>
        <div class="text-center">
          <input type="submit" class="btn btn-outline-info col-6" value="Ingresar">
          <hr>
          <a href="<?= baseUrl ?>user/registrarme" class="text-danger">Registrarme</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Se llama el footer -->
  <?php require_once 'views/layout/footer.php'; ?>