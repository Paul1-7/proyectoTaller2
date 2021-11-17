<?php
    require_once "conexion.php";
    
    class ModeloDosificacionFacturas{

        static public function mostrarDosificacionFacturas( $item, $valor){
            if($item != null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM dosificacion_factura WHERE $item = :$item");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt -> fetch();
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT * FROM dosificacion_factura");
                $stmt -> execute();
                return $stmt -> fetchAll();    
            }
            
        }
        
        

        static public function modificarDosificacionFacturas($datos){
        
            $stmt = Conexion::conectar()->prepare("UPDATE dosificacion_factura SET num_autorizacion = :num_autorizacion, num_fact_inicial =:num_fact_inicial, llave_dosificacion =:llave_dosificacion,fecha_lim_emision=:fecha_lim_emision 
            WHERE id_dosificacion = :id_dosificacion");

            $stmt->bindParam(":id_dosificacion", $datos["id_dosificacion"], PDO::PARAM_STR);
            $stmt->bindParam(":num_autorizacion", $datos["num_autorizacion"], PDO::PARAM_STR);
            $stmt->bindParam(":num_fact_inicial", $datos["num_fact_inicial"], PDO::PARAM_STR);
            $stmt->bindParam(":llave_dosificacion", $datos["llave_dosificacion"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_lim_emision", $datos["fecha_lim_emision"], PDO::PARAM_STR);
            
            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";	
            }
        }

    }
?>