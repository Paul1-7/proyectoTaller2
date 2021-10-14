<?php
    require_once "conexion.php";
    
    class ModeloCategorias{

        static public function mostrarCategorias( $item, $valor){
            if($item != null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM categorias WHERE $item = :$item");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt -> fetch();
            }else{

                $stmt = Conexion::conectar()->prepare("SELECT * FROM categorias");
                $stmt -> execute();
                //print_r($stmt->errorInfo());
                return $stmt -> fetchAll();
                
            }
            
        }
        
        static public function nuevaCategoria($datos){
    
            $stmt = Conexion::conectar()->prepare("INSERT INTO categorias(nombre_cat, desc_cat,estado_cat) VALUES (:nombre_cat, :desc_cat,:estado_cat)");

            $stmt->bindParam(":nombre_cat", $datos["nombre_cat"], PDO::PARAM_STR);
            $stmt->bindParam(":desc_cat", $datos["desc_cat"], PDO::PARAM_STR);
            $stmt->bindParam(":estado_cat", $datos["estado_cat"], PDO::PARAM_STR);
            if($stmt->execute()){ 
                
                return "ok";	
            }else{
                //print_r($stmt->errorInfo());
                return "error";
            }
        }

        static public function modificarCategoria($datos){
        
            $stmt = Conexion::conectar()->prepare("UPDATE categorias SET nombre_cat = :nombre_cat, desc_cat =:desc_cat, estado_cat =:estado_cat WHERE id_cat = :id_cat");

            $stmt->bindParam(":id_cat", $datos["id_cat"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre_cat", $datos["nombre_cat"], PDO::PARAM_STR);
            $stmt->bindParam(":desc_cat", $datos["desc_cat"], PDO::PARAM_STR);
            $stmt->bindParam(":estado_cat", $datos["estado_cat"], PDO::PARAM_STR);
            
            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";	
            }
        }

    
        static public function borrarCategoria( $datos){

            $stmt = Conexion::conectar()->prepare("DELETE FROM categorias WHERE id_cat = :id_cat");

            $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

            if($stmt -> execute()){

                return "ok";
            
            }else{

                return "error";	

            }

        }

    }
?>