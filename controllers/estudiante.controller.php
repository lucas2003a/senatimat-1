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

    // Vamos a verificar si la vista nos envío una FOTOGRAFÍA
    if (isset($_FILES['fotografia'])){

      $rutaDestino = '../views/img/fotografias/';
      $fechaActual = date('c'); // C = Complete, devuelve el AÑO/MES/DIA/HORA/MINUTO/SEGUNDO
      $nombreArchivo = sha1($fechaActual) . ".jpg";
      $rutaDestino .= $nombreArchivo;

      // GUARDAMOS LA FOTOGRAfÍA EN EL SERVIDOR
      // move_uploaded_file: Mover un archivo subido, permite copiar el archivo que viene desde la vista hacia un lugar para el servidor
      if (move_uploaded_file($_FILES['fotografia']['tmp_name'], $rutaDestino)){
        $datosGuardar['fotografia'] = $nombreArchivo; 
      }

    }

    // PASO 2: Enviar el array al método registrar
    $estudiante->registrarEstudiante($datosGuardar);
  }

  $datosObtenidos = $estudiante->listarEstudiante();

  if ($datosObtenidos){
    $numeroFila = 1;

    foreach ($datosObtenidos as $estudiante){
      echo "
        <tr>
          <td>{$numeroFila}</td>
          <td>{$estudiante['apellidos']}</td>
          <td>{$estudiante['nombres']}</td>
          <td>{$estudiante['tipodocumento']}</td>
          <td>{$estudiante['nrodocumento']}</td>
          <td>{$estudiante['fechanacimiento']}</td>
          <td>{$estudiante['idcarrera']}</td>
          <td>
            <a href='#' data-idcurso='{$estudiante['idestudiante']}' class='btn btn-danger btn-sm eliminar'><i class='bi bi-trash3-fill'></i></a>
            <a href='#' data-idcurso='{$estudiante['idestudiante']}' class='btn btn-info btn-sm editar'><i class='bi bi-pencil-fill'></i></a>
            </td>
        </tr>
      ";
        $numeroFila++;
    }
  }


}