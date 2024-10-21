<?php require('views/header/headerAdministrador.php'); ?>
<center>
    <h1><?php if($accion=="crear"):echo('Nuevo');else: echo ('Modificar');endif; ?> usuario</h1>
</center>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <form method="post" action="usuario.php?accion=<?php if($accion=="crear"):echo('nuevo');else:echo('modificar&id='.$id);endif;?>">
        <div class="mb-3">
            <label for="correo" class="form-label">Nombre del usuario</label>
            <input class="form-control" type="text" name="data[correo]" placeholder="Escribe aqui el correo electronico" value="<?php if(isset($usuarios["correo"])):echo($usuarios['correo']);endif;?>" id="correo"/>
        </div>

        <div class="mb-3">
            <label for="contrasena" class="form-label">Contrasena</label>
            <input class="form-control" id="contrasena" type="password" name="data[contrasena]" placeholder="Escribe aqui la contrasena" value="<?php if(isset($usuarios["contrasena"])):echo($usuarios['contrasena']);endif;?>"/>
        </div>

        <div class="mb-3">
          /<!--*TODO:add role logic here*/-->
        </div>

        <input type="submit" value="Guardar" name="data[enviar]" class="btn btn-primary w-100">
        </form>
    </div>
    <div class="col-md-1"></div>
</div>

<?php require('views/footer.php'); ?>
