<!-- Se llama el Header -->
<?php require_once 'views/layout/header.php'; ?>
<title>Ciudad - Registro</title>
</head>

<!-- El <body> solo se abre, el </body> esta en el FOOTER -->

<body>

  <!-- Aqui va el Contenido de la Pagina -->
  <div class="container mt-4">
    <?php require_once 'views/layout/banner.php'; ?>

    <?php if (isset($_SESSION['registrado'])) : ?>
      <h5 class="text-success text-center">Registrado</h5>
    <?php elseif (isset($_SESSION['actualizado'])) : ?>
      <h5 class="text-info text-center">Actualizado</h5>
    <?php elseif (isset($_SESSION['eliminado'])) : ?>
      <h5 class="text-warning text-center">Eliminado</h5>
    <?php else : ?>
      <hr class="border-dark">
    <?php endif ?>
    <?= Utils::deleteSession('registrado') ?>
    <?= Utils::deleteSession('actualizado') ?>
    <?= Utils::deleteSession('eliminado') ?>

    <!-- Formulario De Registro -->
    <?php if (!isset($_GET['id'])) : ?>
      <form action="<?= baseUrl ?>ciudad/registrar" method="POST">
        <div class="row">
          <div class="form-group col-6">
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" class="form-control" type="text">
          </div>
          <div class="col-6">
            <span>Clima</span><br>
            <select class="custom-select mr-sm-2 mt-1" name="clima" id="clima">
              <option>Elija...</option>
              <?php $climas = CiudadController::GetClimas(); ?>
              <?php while ($cl = $climas->fetch_object()) : ?>
                <option value="<?= $cl->idClima; ?>"><?= $cl->nombreClima; ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="col-6">
            <span>País</span><br>
            <select class="custom-select mr-sm-2 mt-1" name="pais" id="pais">
              <option>Elija...</option>
              <?php $paises = CiudadController::GetPais(); ?>
              <?php while ($p = $paises->fetch_object()) : ?>
                <option value="<?= $p->idPais; ?>"><?= $p->nombrePais; ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <input type="submit" class="btn btn-primary btn-sm btn-block col-6 offset-3 my-3" value="Registrar">
        </div>
      </form>

    <?php else : ?>
      <!-- Formulario para Editar -->
      <form action="<?= baseUrl ?>ciudad/actualizar&id=<?= $_GET['id'] ?>" method="POST">
        <div class="row">
          <div class="form-group col-6">
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" class="form-control" type="text" value="<?= $data->nombreCiudad ?>">
          </div>
          <div class="col-6">
            <span>Clima</span><br>
            <select class="custom-select mr-sm-2 mt-1" name="clima" id="clima">
              <option>Elija...</option>
              <?php $climas = CiudadController::GetClimas(); ?>
              <?php while ($cl = $climas->fetch_object()) : ?>
                <option value="<?= $cl->idClima; ?>" <?= $data->climaID == $cl->idClima ? 'selected' : '' ?>><?= $cl->nombreClima; ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="col-6">
            <span>País</span><br>
            <select class="custom-select mr-sm-2 mt-1" name="pais" id="pais">
              <option>Elija...</option>
              <?php $paises = CiudadController::GetPais(); ?>
              <?php while ($p = $paises->fetch_object()) : ?>
                <option value="<?= $p->idPais; ?>" <?= $data->paisID == $p->idPais ? 'selected' : '' ?>><?= $p->nombrePais; ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <input type="submit" class="btn btn-primary btn-sm btn-block col-6 offset-3 my-3" value="Actualizar">
        </div>
      </form>
    <?php endif; ?>

    <!-- Tabla -->

    <table class="table table-responsive-lg">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Clima</th>
          <th scope="col">Pais</th>
          <th scope="col">Fecha</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($c = $ciudades->fetch_object()) : ?>
          <tr>
            <td><?= $c->nombreCiudad ?></td>
            <td><?= $c->nombreClima ?></td>
            <td><?= $c->nombrePais ?></td>
            <td><?= $c->fecha ?></td>
            <td class="d-flex justify-content-around">
              <a href="<?= baseUrl ?>ciudad/eliminar&id=<?= $c->idCiudad ?>" class="btn btn-danger">Eliminar</a>
              <a href="<?= baseUrl ?>ciudad/gestion&id=<?= $c->idCiudad ?>" class="btn btn-info">Editar</a>
            </td>
          </tr>
        <?php endwhile ?>
      </tbody>
    </table>

  </div>

  <!-- Se llama el footer -->
  <?php require_once 'views/layout/footer.php'; ?>