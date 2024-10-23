<?php require('views/header/headerAdministrador.php');?>
  <h1>Roles-permisos</h1>
  <?php if (isset($mensaje)): $app -> alerta($tipo, $mensaje); endif;?>
  <a href="rolPermiso.php?accion=crear" class="btn btn-success">Nuevo</a>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Id rol</th>
      <th scope="col">Id permiso</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($rolesPermisos as $rolPermiso): ?>
    <tr>
      <th scope="row"><?php echo $rolPermiso ['id_rol']; ?></th>
      <td><?php echo $rolPermiso ['id_permiso']; ?></td>
      <td>
        /*TODO:fix the primary key*/
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
          <a href="rolPermiso.php?accion=actualizar&id=<?php echo $rolPermiso ['id_rolPermiso']; ?>" class="btn btn-warning">Actualizar</a>
          <a href="rolPermiso.php?accion=eliminar&id=<?php echo $rolPermiso ['id_rolPermiso']; ?>" class="btn btn-danger">Eliminar</a>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php require('views/footer.php')?>
