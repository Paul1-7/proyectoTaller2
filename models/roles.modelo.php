<?php 
    require_once "conexion.php";

    class ModeloRoles{

        static public function mostrarRoles( $item, $valor){
            if($item != null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM roles WHERE $item = :$item");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt -> fetch();
            }else{
    
                $stmt = Conexion::conectar()->prepare("SELECT *  FROM roles");
                $stmt -> execute();
                //print_r($stmt->errorInfo());
                return $stmt -> fetchAll(); 
            }      
        }

    }
?>