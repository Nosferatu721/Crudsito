<!-- Se llama el Header -->
<?php require_once 'views/layout/header.php'; ?>
<title>Ciudad - Registro</title>
<link rel="stylesheet" type="text/css" href="<?= baseUrl; ?>assets/Datatables/datatables.min.css">
</head>

<!-- El <body> solo se abre, el </body> esta en el FOOTER -->

<body>

  <!-- Aqui va el Contenido de la Pagina -->
  <div class="container mt-4">
    <?php require_once 'views/layout/banner.php'; ?>

    <?php if (isset($_SESSION['registrado'])) : ?>
      <h5 class="text-success text-center pt-3">Registrado</h5>
    <?php elseif (isset($_SESSION['actualizado'])) : ?>
      <h5 class="text-info text-center pt-3">Actualizado</h5>
    <?php elseif (isset($_SESSION['eliminado'])) : ?>
      <h5 class="text-warning text-center pt-3">Eliminado</h5>
    <?php else : ?>
      <hr class="border-dark">
    <?php endif ?>
    <?= Utils::deleteSession('registrado') ?>
    <?= Utils::deleteSession('actualizado') ?>
    <?= Utils::deleteSession('eliminado') ?>

    <div class="row">
      <div class="col-3">
        <!-- Formulario De Registro -->
        <?php if (!isset($_GET['id'])) : ?>
          <form action="<?= baseUrl ?>ciudad/registrar" method="POST">
            <h2>Registro</h2>
            <hr>
            <div class="row">
              <div class="form-group col-12">
                <label for="nombre">Nombre</label>
                <input id="nombre" name="nombre" class="form-control" type="text">
              </div>
              <div class="col-12">
                <span>Clima</span><br>
                <select class="custom-select mr-sm-2 mt-1" name="clima" id="clima">
                  <option>Elija...</option>
                  <?php $climas = CiudadController::GetClimas(); ?>
                  <?php while ($cl = $climas->fetch_object()) : ?>
                    <option value="<?= $cl->idClima; ?>"><?= $cl->nombreClima; ?></option>
                  <?php endwhile; ?>
                </select>
              </div>
              <div class="col-12">
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
            <h3>Editar</h3>
            <hr>
            <div class="row">
              <div class="form-group col-12">
                <label for="nombre">Nombre</label>
                <input id="nombre" name="nombre" class="form-control" type="text" value="<?= $data->nombreCiudad ?>">
              </div>
              <div class="col-12">
                <span>Clima</span><br>
                <select class="custom-select mr-sm-2 mt-1" name="clima" id="clima">
                  <option>Elija...</option>
                  <?php $climas = CiudadController::GetClimas(); ?>
                  <?php while ($cl = $climas->fetch_object()) : ?>
                    <option value="<?= $cl->idClima; ?>" <?= $data->climaID == $cl->idClima ? 'selected' : '' ?>><?= $cl->nombreClima; ?></option>
                  <?php endwhile; ?>
                </select>
              </div>
              <div class="col-12">
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

      </div>
    <?php endif; ?>
    <div class="col-9">
      <!-- Tabla -->
      <table id="papitas" class="table table-responsive-lg table-bordered table-hover">
        <thead class="bg-dark">
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
                <a href="<?= baseUrl ?>ciudad/eliminar&id=<?= $c->idCiudad ?>" class="btn btn-danger btn-sm">Eliminar</a>
                <a href="<?= baseUrl ?>ciudad/gestion&id=<?= $c->idCiudad ?>" class="btn btn-info btn-sm">Editar</a>
              </td>
            </tr>
          <?php endwhile ?>
        </tbody>
      </table>
    </div>
    </div>




  </div>
  <!-- Se llama el footer -->
  <?php require_once 'views/layout/footer.php'; ?>