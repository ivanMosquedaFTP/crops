<?php
    require_once('config.class.php');
    class sistema {
        var $con;
        function conexion(){
            $this -> con = new PDO(SGBD.':host='.DBHOST.';dbname='.DBNAME.';port='.DBPORT, DBUSER, DBPASS);
        }
        
        function alerta($tipo, $mensaje) {
            include('views/alert.php');
        }

        function getRole($correo) {
            $this -> conexion();
            $data = [];
            if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $sql = "select r.rol from usuario u inner join usuario_rol ur on u.id_usuario = ur.id_usuario
                    inner JOIN rol r on r.id_rol = ur.id_rol
                    where u.correo = :correo ";

                $roles = $this->con->prepare($sql);
                $roles->bindParam(":correo",$correo,PDO::PARAM_STR);
                $roles->execute();
                $data = $roles->fetchAll(PDO::FETCH_ASSOC);
            }
            
            return $data;
        }

        function getPrivilegios($correo) {
            $this -> conexion();
            $data = [];
            if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $sql = "select p.permiso from usuario u inner join usuario_rol ur on u.id_usuario = ur.id_usuario
                        inner JOIN rol r on r.id_rol = ur.id_rol
                        INNER JOIN rol_permiso rp on rp.id_rol = r.id_rol
                        inner JOIN permiso p on p.id_permiso = rp.id_permiso
                            where u.correo = :correo;";

                $privilegio = $this->con->prepare($sql);
                $privilegio->bindParam(":correo",$correo,PDO::PARAM_STR);
                $privilegio->execute();
                $data = $privilegio->fetchAll(PDO::FETCH_ASSOC);
            }
            
            return $data;
        }

        function login($correo, $contrasena) {
          $contrasena = md5($contrasena);
          if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $this -> conexion();
            $sql = "select * from usuario where correo = :correo and contrasena = :contrasena;";
            $sql = $this->con->prepare($sql);
            $sql->bindParam(":correo",$correo,PDO::PARAM_STR);
            $sql->bindParam(":contrasena",$contrasena,PDO::PARAM_STR);
            $sql->execute();
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
          }
        }
    }
?>
