<?php
  require_once('../sistema.class.php');

  $app = new sistema;
  $accion = (isset($_GET['accion']))?$_GET['accion'] : NULL;

  switch ($accion) {
    case 'login': {
      $correo = $_POST['data']['correo'];
      $contrasena = $_POST['data']['contrasena'];
      if($app -> login($correo, $contrasena)) {
        echo('Bienvenido al sistema');
        print_r($_session);
        die();
      } else {
        echo('acceso denegado');
        die();
      }

      break;
    }
    
    default: {
      include('views/login/index.php');
      break;
    }
  }
?>
