<?php
  require_once('../sistema.class.php');

  $app = new sistema;
  $accion = (isset($_GET['accion']))?$_GET['accion'] : NULL;

  switch ($accion) {
    case 'login': {
      print_r($_POST);
      break;
    }
    
    default: {
      include('views/login/index.php');
      break;
    }
  }
?>
