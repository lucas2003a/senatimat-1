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

  if($_POST['operacion'] == 'listar'){
    
    $data = $estudiante->listarEstudiante();

    if ($data){
      $numeroFila = 1;
      $datosEstudiante = '';
      // $botonFoto hace que si el usuario no tiene foto aparezca en el ícono no tiene foto
      $botonNulo = "<a href='#' class='btn btn-sm btn-warning' title='No tiene fotografía'><i class='fa-solid fa-eye-slash'></i></a>";
      
      foreach ($data as $registro){
        // $datosEstudiante: Hace que se viualice el nombre del usuario dentro del lightblox
        $datosEstudiante = $registro['apellidos'] . ' ' . $registro['nombres'];

        
        // La primera parte a RENDERIZAR, es lo standar (Siempre se mostrará)
        echo "
          <tr>
            <td>{$numeroFila}</td>
            <td>{$registro['apellidos']}</td>
            <td>{$registro['nombres']}</td>
            <td>{$registro['tipodocumento']}</td>
            <td>{$registro['nrodocumento']}</td>
            <td>{$registro['fechanacimiento']}</td>
            <td>{$registro['carrera']}</td>
            <td>
              <a href='#' data-idestudiante='{$registro['idestudiante']}' class='btn btn-danger btn-sm eliminar'><i class='fa-solid fa-trash-can'></i></a>
              <a href='#' data-idestudiante='{$registro['idestudiante']}' class='btn btn-info btn-sm editar'><i class='fa-solid fa-pencil'></i></a>";
        
        // La segunda parte a RENDERIZAR, es el botón VER FOTOGRAFÍA
        if ($registro['fotografia'] == ''){
          echo $botonNulo;
        }else{
          // De lo contrario se va a RENDERIZAR
          echo "<a href='../views/img/fotografias/{$registro['fotografia']}' data-lightbox='{$registro['idestudiante']}' data-title='{$datosEstudiante}'' class='btn btn-sm btn-warning' target='_blank'><i class='fa-solid fa-eye'></i></a>";
        }

        // La tercera parte a RENDERIZAR, cierre de la fila
        echo "
          </td>
        </tr>
        "; 

        $numeroFila++;
      }
    }
  }

  if ($_POST['operacion'] == 'obtener_fotografia') {
    // Obtener el id del estudiante
    $idestudiante = $_POST['idestudiante'];

    // Obtener la foto del estudiante
    $archivoFoto = $estudiante->obtenerEstudiante($idestudiante);

    echo $archivoFoto;
  }

  if ($_POST['operacion'] == 'eliminar') {
    // Obtener el id del estudiante
    $idestudiante = $_POST['idestudiante'];

    
    $registro = $estudiante->obtenerEstudiante($idestudiante);

    
    $estudiante->eliminarEstudiante($idestudiante);

    // Verificar que el colaborador tiene un archivo de CV
    if ($registro['fotografia']) {
        $rutaArchivo = '../views/img/fotografias/' . $registro['fotografia'];
        if (file_exists($rutaArchivo)) {
            // Eliminar el archivo de CV físicamente del servidor
            unlink($rutaArchivo);
        }
    }
  }


}