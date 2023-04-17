<?php

require_once 'Conexion.php';

class Estudiante extends Conexion{

  private $accesoBD;

  public function __CONSTRUCT(){
    $this->accesoBD = parent::getConexion();
  }

  // Datos es un array asociativo que contiene la información a guardart proveniente del controlador
  public function registrarEstudiante($datos = []){
    try {
      $consulta = $this->accesoBD->prepare("CALL spu_estudiantes_registrar(?,?,?,?,?,?,?,?)");
      $consulta->execute(
        array(
          $datos['apellidos'],
          $datos['nombres'],
          $datos['tipodocumento'],
          $datos['nrodocumento'],
          $datos['fechanacimiento'],
          $datos['idcarrera'],
          $datos['idsede'],
          $datos['fotografia']
        )
      );
    } 
    catch (Exception $e) {
      die($e->getMessage());
    }
  }

}