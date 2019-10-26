<?php
require_once 'models/ciudad.php';

class CiudadController
{
  public function gestion()
  {
    // Instanciar un Objeto Medicamento
    $c = new Ciudad();
    // Ejecutar el Metodo findAll
    $ciudades = $c->findAll();
    // 
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $c2 = new Ciudad();
      $c2->setIdCiudad($id);
      $data = $c2->findID();
      if ($id == '') {
        header('Location: ' . baseUrl . 'error/index');
      }
    }
    require_once 'views/ciudad/crud.php';
  }

  public static function GetClimas()
  {
    $ciu = new Ciudad();
    $climitas = $ciu->findClimaALL();
    return $climitas;
  }
  public static function GetPais()
  {
    $ciu = new Ciudad();
    $paises = $ciu->findPaisALL();
    return $paises;
  }

  public function registrar()
  {
    if (isset($_POST) && $_POST['nombre'] && $_POST['pais'] && $_POST['clima']) {
      // Guardar los datos en variables
      $nombre = $_POST['nombre'];

      // Verificar si ya existe la CIUDAD
      $abc = new Ciudad();
      $abc->setNombreCiudad($nombre);
      $data = $abc->findNombreCiudad();
      if ($data->num_rows >= 1) {
        $_SESSION['exist'] = true;
        header('Location: ' . baseUrl . 'ciudad/gestion');
        //
      } else {
        $pais = $_POST['pais'];
        $clima = $_POST['clima'];
        // Instanciar un Objecto Medicamento
        $c = new Ciudad();
        // Guardar los datos en el Objeto User
        $c->setNombreCiudad($nombre);
        $c->setPaisID($pais);
        $c->setClimaID($clima);
        // Ejecutar el metodo para registrar
        $r = $c->save();
        if ($r) {
          $_SESSION['registrado'] = true;
          header('Location: ' . baseUrl . 'ciudad/gestion');
        }
      }
    } else {
      header('Location: ' . baseUrl . 'ciudad/gestion');
    }
  }

  public function actualizar()
  {
    if (isset($_POST) && $_GET['id'] && $_POST['nombre'] && $_POST['pais'] && $_POST['clima']) {
      // Guardar los datos en variables
      $id = $_GET['id'];
      $nombre = $_POST['nombre'];
      $pais = $_POST['pais'];
      $clima = $_POST['clima'];
      // Instanciar un Objecto Medicamento
      $c = new Ciudad();
      // Guardar los datos en el Objeto User
      $c->setIdCiudad($id);
      $c->setNombreCiudad($nombre);
      $c->setPaisID($pais);
      $c->setClimaID($clima);
      // Ejecutar el metodo para registrar
      $r = $c->update();
      if ($r) {
        $_SESSION['actualizado'] = true;
        header('Location: ' . baseUrl . 'ciudad/gestion');
      }
    } else {
      header('Location: ' . baseUrl . 'ciudad/gestion');
    }
  }

  public function eliminar()
  {
    if (isset($_GET['id']) && !$_GET['id'] == '') {
      $idCiudad = $_GET['id'];
      $c = new Ciudad();
      $c->setIdCiudad($idCiudad);
      $r = $c->delete();
      if ($r) {
        $_SESSION['eliminado'] = true;
        header('Location: ' . baseUrl . 'ciudad/gestion');
      }
    } else {
      header('Location: ' . baseUrl . 'ciudad/gestion');
    }
  }
}
