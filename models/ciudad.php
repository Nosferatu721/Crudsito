<?php

class Ciudad
{
  private $db;
  private $idCiudad;
  private $nombreCiudad;
  private $paisID;
  private $climaID;
  private $fecha;

  public function __construct()
  {
    $this->db = DataBase::conectar();
  }

  //
  public function getIdCiudad()
  {
    return $this->idCiudad;
  }

  public function setIdCiudad($idCiudad)
  {
    $this->idCiudad = $idCiudad;
  }

  //
  public function getNombreCiudad()
  {
    return $this->nombreCiudad;
  }

  public function setNombreCiudad($nombreCiudad)
  {
    $this->nombreCiudad = $nombreCiudad;
  }

  //
  public function getPaisID()
  {
    return $this->paisID;
  }

  public function setPaisID($paisID)
  {
    $this->paisID = $paisID;
  }

  //
  public function getClimaID()
  {
    return $this->climaID;
  }

  public function setClimaID($climaID)
  {
    $this->climaID = $climaID;
  }

  //
  public function getFecha()
  {
    return $this->fecha;
  }

  public function setFecha($fecha)
  {
    $this->fecha = $fecha;
  }

  public function findAll()
  {
    $sql = "SELECT * FROM ciudad INNER JOIN clima ON ciudad.climaID = clima.idClima INNER JOIN pais ON ciudad.paisID = pais.idPais";
    $finded = $this->db->query($sql);
    return $finded;
  }

  public function findID()
  {
    $sql = "SELECT * FROM ciudad WHERE idCiudad={$this->getIdCiudad()}";
    $finded = $this->db->query($sql);
    return $finded->fetch_object();
    // El fetch_object() es para pasar los datos a un Objeto 'SOLO SE USA CUANDO ES UN REGISTRO'
  }
  
  public function findNombreCiudad()
  {
    $sql = "SELECT * FROM ciudad WHERE nombreCiudad = '{$this->getNombreCiudad()}'";
    $finded = $this->db->query($sql);
    return $finded;
    // El fetch_object() es para pasar los datos a un Objeto 'SOLO SE USA CUANDO ES UN REGISTRO'
  }

  public function save()
  {
    $sql = "INSERT INTO ciudad VALUES (NULL, '{$this->getNombreCiudad()}', '{$this->getPaisID()}', '{$this->getClimaID()}', CURDATE())";
    $saved = $this->db->query($sql);
    return $saved;
  }

  public function update()
  {
    $sql = "UPDATE ciudad SET nombreCiudad='{$this->getNombreCiudad()}', paisID='{$this->getPaisID()}', climaID='{$this->getClimaID()}' WHERE idCiudad={$this->getIdCiudad()}";
    $updated = $this->db->query($sql);
    return $updated;
  }

  public function delete()
  {
    $sql = "DELETE FROM ciudad WHERE idCiudad={$this->getIdCiudad()}";
    $deleted = $this->db->query($sql);
    return $deleted;
  }


  // Foraneas
  public function findClimaALL(){
    $sql = "SELECT * FROM clima";
    $finded = $this->db->query($sql);
    return $finded;
  }
  public function findPaisALL(){
    $sql = "SELECT * FROM pais";
    $finded = $this->db->query($sql);
    return $finded;
  }
}
