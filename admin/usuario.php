<?php
require_once ('usuario.class.php');
/*TODO:create rol crud*/

/*require_once ('rol.class.php');*/

$approl = new rol();
/*$appRole = new rol();*/
$app = new usuario();
$app -> checkRole('administrador');

$accion = (isset($_GET['accion']))?$_GET['accion'] : NULL;
$id=(isset($_GET['id']))?$_GET['id']:null;
switch ($accion) {
    case 'crear': {
        $roles = $approl -> readAll();
        include 'views/usuario/crear.php';
        break;
    }

    case 'nuevo': {
        $data=$_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "Sección dada de alta correctamente";
            $tipo = "success";
        } else {
            $mensaje = "La sección no ha sido dado de alta";
            $tipo = "danger";
        }

        $usuarioes = $app->readAll();
        include('views/usuario/index.php');
        break;
    }

    case 'actualizar': {
        $usuarioes = $app -> readOne($id); 
        $roles = $approl -> readAll();
        include('views/usuario/crear.php');
        break;
    }
    
    case 'modificar': {
        $data= $_POST['data'];
        $result=$app->update($id,$data);
        if($result){
            $mensaje="La sección se ha actualizado";
            $tipo="success";
        }else{
            $mensaje="No se ha actualizado";
            $tipo="danger";
        }
        $usuarioes = $app->readAll();
        include('views/usuario/index.php');
        break;
    }

    case 'eliminar': {
        if (!is_null($id)) {
            if (is_numeric($id)) {
                $resultado = $app -> delete($id);
                if ($resultado) {
                    $mensaje = "La sección se eliminó correctamente";
                    $tipo = "success";
                } else {
                    $mensaje = "La sección no se eliminó correctamente";
                    $tipo = "danger";
                }
            }
        }
        $usuarioes = $app->readAll();
        include('views/usuario/index.php');
        break;
    }

    default: {
        $usuarioes = $app->readAll();
        include 'views/usuario/index.php';
        break;
    }
}
require_once('views/footer.php');
?>
