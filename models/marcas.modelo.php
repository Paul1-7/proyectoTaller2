<?php
    require_once "conexion.php";
    
    class ModeloMarcas{

        static public function mostrarMarcas( $item, $valor){
            if($item != null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM marcas WHERE $item = :$item");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt -> fetch();
            }else{

                $stmt = Conexion::conectar()->prepare("SELECT * FROM marcas");
                $stmt -> execute();
                //print_r($stmt->errorInfo());
                return $stmt -> fetchAll();
                
            }
            
        }
        
        static public function nuevaMarca($datos){
    
            $stmt = Conexion::conectar()->prepare("INSERT INTO marcas(nombre_marca,estado_marca) VALUES (:nombre_marca,:estado_marca)");

            $stmt->bindParam(":nombre_marca", $datos["nombre_marca"], PDO::PARAM_STR);
            $stmt->bindParam(":estado_marca", $datos["estado_marca"], PDO::PARAM_STR);
            if($stmt->execute()){ 
                
                return "ok";	
            }else{
                return "error";
            }
        }

        static public function modificarMarca($datos){
        
            $stmt = Conexion::conectar()->prepare("UPDATE marcas SET nombre_marca = :nombre_marca, estado_marca =:estado_marca WHERE id_marca = :id_marca");

            $stmt->bindParam(":id_marca", $datos["id_marca"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre_marca", $datos["nombre_marca"], PDO::PARAM_STR);
            $stmt->bindParam(":estado_marca", $datos["estado_marca"], PDO::PARAM_STR);
            
            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";	
            }
        }

    
        static public function borrarMarca( $datos){

            $stmt = Conexion::conectar()->prepare("DELETE FROM marcas WHERE id_marca = :id_marca");

            $stmt -> bindParam(":id_marca", $datos, PDO::PARAM_INT);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";	
            }

        }

    }
?>