<?php

// Incorporar nuestro modelo
require_once '../models/Sede.php';

// Verificar si existe una operación en curso
if(isset($_POST['operacion'])){
  
  // Instanciar la sede
  $sede = new Sede();

  // Operacion que desea realizar
  if($_POST['operacion'] == 'listar'){
    $data = $sede->listarSedes();
    
    // Enviar los datos a la vista
    // Si contiene informacón - si no esta vacío
    if($data){
      echo "<option value=''selected>Seleccione</option>";
      foreach($data as $registro){
        echo "<option value= '{$registro['idsede']}'>{$registro['sede']}</option>";
      }
    }else{
      echo "<option value= ''>No encontramos datos</option>";
    }
  }

}