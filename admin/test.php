<?php
    require_once('../sistema.class.php');
    $app = new sistema;
    $roles = $app->getRole('luislao@itcelaya.edu.mx');
    print_r($roles);
    $privilegio=$app->getPrivilegios('l21031178@celaya.tecnm.mx');
    print_r($privilegio);
?>
