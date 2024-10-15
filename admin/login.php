<?php
  require_once('../sistema.class.php');

  $app = new sistema;
  $accion = (isset($_GET['accion']))?$_GET['accion'] : NULL;

  switch ($accion) {
    case 'login': {
      $correo = $_POST['data']['correo'];
      $contrasena = $_POST['data']['contrasena'];
      echo($app -> login($correo, $contrasena));

      break;
    }
    
    default: {
      include('views/login/index.php');
      break;
    }
  }
?>
