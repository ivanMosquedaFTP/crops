<?php
 include ('../sistema.class.php');

 class Invernadero extends sistema {
    function create ($data){
        $result = [];
        $insertar = [];
        $this -> conexion();
        $sql="insert into invernadero(area, fecha_creacion, invernadero, latitud, longitud) values(:area, :fecha_creacion, :invernadero, :latitud, :longitud);";
        $insertar = $this->con->prepare($sql);
        $insertar -> bindParam(':area', $data['area'], PDO::PARAM_INT);
        $insertar -> bindParam(':fecha_creacion', $data['fecha_creacion'], PDO::PARAM_STR);
        $insertar -> bindParam(':invernadero', $data['invernadero'], PDO::PARAM_STR);
        $insertar -> bindParam(':latitud', $data['latitud'], PDO::PARAM_STR);
        $insertar -> bindParam(':longitud', $data['longitud'], PDO::PARAM_STR);
        $insertar -> execute();
        $result = $insertar -> rowCount();
        print_r($result);
        return $result;
    }

    function update ($idl, $data){
        $result = [];
        return $result;
    }

    function delete ($id){
        $result = [];
        $this -> conexion();
        $sql = "delete from invernadero where id_invernadero=:id_invernadero;";
        $eliminar = $this->con->prepare($sql);
        $eliminar -> bindParam(':id_invernadero', $id, PDO::PARAM_INT);
        $eliminar -> execute();
        $result = $eliminar -> rowCount();
        return $result;
    }

    function readOne ($id){
        $result = [];
        return $result;
    }

    function readAll (){
        $this -> conexion();
        $result = [];
        $consulta ='select * from invernadero';
        $sql = $this->con->prepare ($consulta); 
        $sql -> execute();
        $result = $sql -> fetchALL(PDO::FETCH_ASSOC);    
        return $result;
    }
 }
?>