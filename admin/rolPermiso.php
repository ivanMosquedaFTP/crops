<?php
require_once ('rolPermiso.class.php');
$app = new rolPermiso();
$app -> checkRole('administrador');

$accion = (isset($_GET['accion']))?$_GET['accion'] : NULL;
$id=(isset($_GET['id']))?$_GET['id']:null;
switch ($accion) {
    case 'crear': {
        include 'views/rolPermiso/crear.php';
        break;
    }

    case 'nuevo': {
        $data=$_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "Rol-permiso dado de alta correctamente";
            $tipo = "success";
        } else {
            $mensaje = "El rol-permiso no ha sido dado de alta";
            $tipo = "danger";
        }

        $rolesPermisos = $app->readAll();
        include('views/rolPermiso/index.php');
        break;
    }

    case 'actualizar': {
        $rolesPermisos = $app -> readOne($id); 
        include('views/rolPermiso/crear.php');
        break;
    }
    
    case 'modificar': {
        $data= $_POST['data'];
        $result=$app->update($id,$data);
        if($result){
            $mensaje="El rol-permiso se ha actualizado";
            $tipo="success";
        }else{
            $mensaje="No se ha actualizado";
            $tipo="danger";
        }
        $rolesPermisos = $app->readAll();
        include('views/rolPermiso/index.php');
        break;
    }

    case 'eliminar': {
        if (!is_null($id)) {
            if (is_numeric($id)) {
                $resultado = $app -> delete($id);
                if ($resultado) {
                    $mensaje = "El rol-permiso se elimino correctamente";
                    $tipo = "success";
                } else {
                    $mensaje = "El rol-permiso no se elimino correctamente";
                    $tipo = "danger";
                }
            }
        }
        $rolesPermisos = $app->readAll();
        include('views/rolPermiso/index.php');
        break;
    }

    default: {
        $rolesPermisos = $app->readAll();
        include 'views/rolPermiso/index.php';
        break;
    }
}

require_once('views/footer.php');
?>
