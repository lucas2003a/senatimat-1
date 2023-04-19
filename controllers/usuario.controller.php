<?php

require_once '../models/Usuario.php';

if (isset($_POST['operacion'])){
  $usuario = new Usuario();

  if($_POST['operacion'] == 'login'){
    $registro = $usuario->iniciarSesion($_POST['nombreusuario']);

    $_SESSION["login"] = false;
    
    // Objeto para tener el resulrado
    $resultado = [
      "status"  => false,
      "mensaje" => ""
    ];

    if($registro){
      $claveEncriptada = $registro["claveacceso"];

      // Validación de contraseña
      if(password_verify($_POST['claveIngresa'], $claveEncriptada)){
        $resultado["status"] = true;
        $resultado["mensaje"] = "Bienvenido al Sistema";
        $_SESSION["login"] = true;
      }else{
        $resulta["mensaje"] = "Error en la contraseña";
      }

    }else{
      // Si el ussuario no existe
      $resulta["mensaje"] = "No encontramos al usuario";
    }
    echo json_encode($resultado);
  }

  // OPERACION LISTAR
  if($_POST['operacion'] == 'listar'){
    $datosAccedidos = $usuario->listarUsuarios();
  }
}