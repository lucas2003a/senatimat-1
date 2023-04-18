<?php 

require_once '../models/Colaborador.php';

if (isset($_POST['operacion'])){

  $colaborador = new Colaborador();

  if($_POST['operacion'] == 'registrar'){

    $datosGuardar = [
      "apellidos"       => $_POST['apellidos'],
      "nombres"         => $_POST['nombres'],
      "idcargo"         => $_POST['idcargo'],
      "idsede"          => $_POST['idsede'],
      "telefono"        => $_POST['telefono'],
      "direccion"       => $_POST['direccion'],
      "tipocontrato"    => $_POST['tipocontrato'],
      "cv"              => ''
    ];

    // Verificación  del documento CV
    if (isset($_FILES['cv'])){

      $rutaDestino = '../views/pdf/documents/';
      $fechaActual = date('c'); // C = Complete, devuelve el AÑO/MES/DIA/HORA/MINUTO/SEGUNDO
      $nombreArchivo = sha1($fechaActual) . ".pdf";
      $rutaDestino .= $nombreArchivo;

      // GUARDAMOS LA FOTOGRAfÍA EN EL SERVIDOR
      // move_uploaded_file: Mover un archivo subido, permite copiar el archivo que viene desde la vista hacia un lugar para el servidor
      if (move_uploaded_file($_FILES['cv']['tmp_name'], $rutaDestino)){
        $datosGuardar['cv'] = $nombreArchivo; 
      }

    }

    $colaborador->registrarColaborador($datosGuardar);
  }

  
  if($_POST['operacion'] == 'listar'){
    
    $data = $colaborador->listarColaborador();

    if ($data){
      $numeroFila = 1;
      $datosColaborador = '';
      // $botonFoto hace que si el usuario no tiene foto aparezca en el ícono no tiene foto
      $botonNulo = "<a href='#' class='btn btn-sm btn-warning' title='No tiene CV'><i class='fa-solid fa-file-excel'></i></a>";
      
      foreach ($data as $registro){
        // $datosEstudiante: Hace que se viualice el nombre del usuario dentro del lightblox
        $datosColaborador = $registro['apellidos'] . ' ' . $registro['nombres'];

        
        // La primera parte a RENDERIZAR, es lo standar (Siempre se mostrará)
        echo "
          <tr>
            <td>{$numeroFila}</td>
            <td>{$registro['apellidos']}</td>
            <td>{$registro['nombres']}</td>
            <td>{$registro['cargo']}</td>
            <td>{$registro['sede']}</td>
            <td>{$registro['telefono']}</td>
            <td>{$registro['direccion']}</td>
            <td>{$registro['tipocontrato']}</td>
            <td>
              <a href='#' data-idcolaborador='{$registro['idcolaborador']}' class='btn btn-danger btn-sm eliminar'><i class='fa-solid fa-trash-can'></i></a>
              <a href='#' data-idcolaborador='{$registro['idcolaborador']}' class='btn btn-info btn-sm editar'><i class='fa-solid fa-pencil'></i></a>";
        
        // La segunda parte a RENDERIZAR, es el botón VER FOTOGRAFÍA
        if ($registro['cv'] == ''){
          echo $botonNulo;
        }else{
          // De lo contrario se va a RENDERIZAR
          echo "<a href='../views/pdf/documents/{$registro['cv']}' data-lightbox='{$registro['idcolaborador']}' data-title='{$datosColaborador}'' class='btn btn-sm btn-warning' target='_blank'><i class='fa-solid fa-file'></i></a>";
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

  if ($_POST['operacion'] == 'obtener_cv') {
    // Obtener el id del colaborador
    $idcolaborador = $_POST['idcolaborador'];

    // Obtener el archivo de CV del colaborador
    $archivoCv = $colaborador->obtenerColaborador($idcolaborador);

    echo $archivoCv;
  }

  if ($_POST['operacion'] == 'eliminar') {
    // Obtener el id del colaborador
    $idcolaborador = $_POST['idcolaborador'];

    // Obtener el registro del colaborador de la base de datos
    $registro = $colaborador->obtenerColaborador($idcolaborador);

    // Eliminar el registro del colaborador de la base de datos
    $colaborador->eliminarColaborador($idcolaborador);

    // Verificar que el colaborador tiene un archivo de CV
    if ($registro['cv']) {
        $rutaArchivo = '../views/pdf/documents/' . $registro['cv'];
        if (file_exists($rutaArchivo)) {
            // Eliminar el archivo de CV físicamente del servidor
            unlink($rutaArchivo);
        }
    }
  }



  /*if ($_POST['operacion'] == 'eliminar') {
    // Obtener el id del colaborador
    $idcolaborador = $_POST['idcolaborador'];

    // Eliminar el colaborador de la base de datos
    $archivoCv = $colaborador->eliminarColaborador($idcolaborador);

    if ($archivoCv) {
        // Verificar que el colaborador tiene un archivo de CV
        $rutaArchivo = '../views/pdf/documents/' . $archivoCv;
        if (file_exists($rutaArchivo)) {
            // Eliminar el archivo de CV físicamente del servidor
            unlink($rutaArchivo);
          }
        }
    }*/


}