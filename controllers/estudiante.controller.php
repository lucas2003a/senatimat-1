<?php

require_once '../models/Estudiante.php';

if (isset($_POST['operacion'])){
  
  $estudiante = new Estudiante();

  if ($_POST['operacion'] == 'registrar'){

    // PASO1: Recolectar todos los valores enviados por la vista y almacenarlo en un array asociativo
    $datosGuardar = [
      "apellidos"         => $_POST['apellidos'],
      "nombres"           => $_POST['nombres'],
      "tipodocumento"     => $_POST['tipodocumento'],
      "nrodocumento"      => $_POST['nrodocumento'],
      "fechanacimiento"   => $_POST['fechanacimiento'],
      "idcarrera"         => $_POST['idcarrera'],
      "idsede"            => $_POST['idsede'],
      "fotografia"        => ''
    ];

    // PASO 2: Enviar el array al método registrar
    $estudiante->registrarEstudiante($datosGuardar);
  }


}