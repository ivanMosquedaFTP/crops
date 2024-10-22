<?php
 require_once ('../sistema.class.php');

 class usuario extends sistema {
    function create ($data){
        $result = [];
        $insertar = [];
        $this -> conexion();
        $this -> con -> beginTransaction();
        $sql="insert into usuario(correo, contrasena) values(:correo, md5(:contrasena));";
        $insertar = $this->con->prepare($sql);
        $insertar -> bindParam(':correo', $data['correo'], PDO::PARAM_STR);
        $insertar -> bindParam(':contrasena', $data['contrasena'], PDO::PARAM_STR);
        $insertar -> execute();
        $this -> con -> commit();
        $result = $insertar -> rowCount();
        return $result;
    }

    function update ($id, $data){
        $this->conexion();
        $result = [];
        $sql = 'update usuario set correo=:correo, contrasena=:contrasena where id_usuario=:id_usuario;';
        $modificar=$this->con->prepare($sql);
        $modificar->bindParam(':correo',$data['correo'], PDO::PARAM_STR);
        $modificar->bindParam(':contrasena',$data['contrasena'], PDO::PARAM_INT);
        $modificar->bindParam(':id_usuario',$id, PDO::PARAM_INT);
        $modificar->execute();
        $result= $modificar->rowCount();
        return $result;
    }

    function delete ($id){
        $this -> conexion();
        $result = [];
        if (is_numeric($id)) {
            $sql = "delete from usuario where id_usuario=:id_usuario;";
            $eliminar = $this->con->prepare($sql);
            $eliminar -> bindParam(':id_usuario', $id, PDO::PARAM_INT);
            $eliminar -> execute();
            $result = $eliminar -> rowCount();
        }
        return $result;
    }

    function readOne ($id){
        $this->conexion();
        $result = [];
        $consulta = 'SELECT * FROM usuario where id_usuario=:id_usuario;';
        $sql = $this->con->prepare($consulta);
        $sql->bindParam(":id_usuario",$id,PDO::PARAM_INT);
        $sql -> execute();

        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function readAll (){
        $this -> conexion();
        $result = [];
        $consulta ='select * from usuario;';
        $sql = $this->con->prepare ($consulta); 
        $sql -> execute();
        $result = $sql -> fetchALL(PDO::FETCH_ASSOC);    
        return $result;
    }
 }
?>
