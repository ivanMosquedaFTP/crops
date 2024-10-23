<?php require('views/header/headerAdministrador.php'); ?>
<center>
    <h1><?php if($accion=="crear"):echo('Nuevo');else: echo ('Modificar');endif; ?> rol-permiso</h1>
</center>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <form method="post" action="rolPermiso.php?accion=<?php if($accion=="crear"):echo('nuevo');else:echo('modificar&id='.$id);endif;?>">
        <div class="mb-3">
            <label for="id_rol" class="form-label">Id rol</label>
            <input class="form-control" type="text" name="data[id_rol]" placeholder="Escribe aqui el id del rol" value="<?php if(isset($rolesPermisos["id_rol"])):echo($rolesPermisos['id_rol']);endif;?>" id="id_rol"/>
        </div>

        <div class="mb-3">
            <label for="id_permiso" class="form-label">Id rol</label>
            <input class="form-control" type="text" name="data[id_permiso]" placeholder="Escribe aqui el id del permiso" value="<?php if(isset($rolesPermisos["id_permiso"])):echo($rolesPermisos['id_permiso']);endif;?>" id="id_permiso"/>
        </div>

        <input type="submit" value="Guardar" name="data[enviar]" class="btn btn-primary w-100">
        </form>
    </div>
    <div class="col-md-1"></div>
</div>

<?php require('views/footer.php'); ?>
