<?php
  require_once('../sistema.class.php');

  $app = new sistema;
  $accion = (isset($_GET['accion']))?$_GET['accion'] : NULL;

  switch ($accion) {
    case 'login': {
      $correo = $_POST['data']['correo'];
      $contrasena = $_POST['data']['contrasena'];
      if($app -> login($correo, $contrasena)) {
        $mensaje = "Bienvenido al sistema";
        $tipo = "success";
        $app -> checkRole('administrador');
        require_once('views/header/headerAdministrador.php');
        $app -> alerta($tipo, $mensaje);
        //TODO:plantillas personalizadas de Bienvenida
      } else {
        echo('acceso denegado');
      }

      break;
    }

    case 'logout': {$app -> logout(); break;}
    
    default: {
      include('views/login/index.php');
      break;
    }
  }

  require_once('views/footer.php');
?>
