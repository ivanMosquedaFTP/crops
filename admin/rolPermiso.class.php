<?php
 require_once ('../sistema.class.php');

 class rolPermiso extends sistema {
    function create ($data){
        $result = [];
        $insertar = [];
        $this -> conexion();
        $sql="insert into rol_permiso(id_rol, id_permiso) values(:id_rol, :id_permiso);";
        $insertar = $this->con->prepare($sql);
        $insertar -> bindParam(':id_rol', $data['id_rol'], PDO::PARAM_INT);
        $insertar -> bindParam(':id_permiso', $data['id_permiso'], PDO::PARAM_INT);
        $insertar -> execute();
        $result = $insertar -> rowCount();
        return $result;
    }

    /*TODO:fix the query for this method*/
    function update ($id, $data){
        $this->conexion();
        $result = [];
        $sql = 'update rol_permiso set id_rol=:id_rol, id_permiso=:id_permiso where id_rolPermiso=:id_rolPermiso;';
        $modificar=$this->con->prepare($sql);
        $modificar->bindParam(':id_rolPermiso',$id, PDO::PARAM_INT);
        $modificar->bindParam(':rolPermiso',$data['rolPermiso'], PDO::PARAM_STR);
        $modificar->bindParam(':longitud',$data['longitud'], PDO::PARAM_STR);
        $modificar->bindParam(':latitud',$data['latitud'], PDO::PARAM_STR);
        $modificar->bindParam(':area',$data['area'], PDO::PARAM_INT);
        $modificar->bindParam(':fecha_creacion',$data['fecha_creacion'], PDO::PARAM_STR);
        $modificar->execute();
        $result= $modificar->rowCount();
        return $result;
    }

    /*TODO:fix the query for this method*/
    function delete ($id){
        $this -> conexion();
        $result = [];
        $sql = "delete from rol_permiso where id_rolPermiso=:id_rolPermiso;";
        $eliminar = $this->con->prepare($sql);
        $eliminar -> bindParam(':id_rolPermiso', $id, PDO::PARAM_INT);
        $eliminar -> execute();
        $result = $eliminar -> rowCount();
        return $result;
    }

    /*TODO:fix the query for this method*/
    function readOne ($id){
        $this->conexion();
        $result = [];
        $consulta = 'SELECT * FROM rolPermiso where id_rolPermiso=:id_rolPermiso;';
        $sql = $this->con->prepare($consulta);
        $sql->bindParam(":id_rolPermiso",$id,PDO::PARAM_INT);
        $sql -> execute();

        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function readAll (){
        $this -> conexion();
        $result = [];
        $consulta ='select * from rol_permiso';
        $sql = $this->con->prepare ($consulta); 
        $sql -> execute();
        $result = $sql -> fetchALL(PDO::FETCH_ASSOC);    
        return $result;
    }
 }
?>
