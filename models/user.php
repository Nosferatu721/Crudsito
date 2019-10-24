<?php

class User
{
  private $db;
  private $id;
  private $nombre;
  private $contraseña;

  public function __construct()
  {
    $this->db = DataBase::conectar();
  }
  //
  function getId()
  {
    return $this->id;
  }

  function setId($id)
  {
    $this->id = $id;
  }
  //
  function getNombre()
  {
    return $this->nombre;
  }

  function setNombre($nombre)
  {
    $this->nombre = $this->db->real_escape_string($nombre);
  }
  
  //
  function getContraseña()
  {
    return $this->contraseña;
  }

  function setContraseña($contraseña)
  {
    $this->contraseña = $this->db->real_escape_string($contraseña);
  }

  public function findId()
  {
    $sql = "SELECT * FROM userr WHERE name='{$this->getNombre()}'";
    $user = $this->db->query($sql);
    return $user->fetch_object();
  }

  public function save()
  {
    $sql = "INSERT INTO usuarios VALUES (NULL, '{$this->getNombre()}', '{$this->getApellido()}', '{$this->getCorreo()}', '{$this->getContraseña()}', 1, NULL)";
    $saved = $this->db->query($sql);
    $result = false;
    if ($saved) {
      $result = true;
    }
    return $result;
  }
}
