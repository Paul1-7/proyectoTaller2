<?php
    require_once "conexion.php";
    
    class ModeloClientes{

        static public function mostrarClientes( $item, $valor){
            if($item != null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM clientes WHERE $item = :$item");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt -> fetch();
            }else{

                $stmt = Conexion::conectar()->prepare("SELECT * FROM clientes");
                $stmt -> execute();
                //print_r($stmt->errorInfo());
                return $stmt -> fetchAll();
                
            }
            
        }
        
        static public function nuevoCliente($datos){
    
            $stmt = Conexion::conectar()->prepare("INSERT INTO clientes(nombres_cl, apellidos_cl,ci_cl,tel_cl,direccion_cl,estado_cl) 
            VALUES (:nombres_cl, :apellidos_cl,:ci_cl,:tel_cl,:direccion_cl,:estado_cl)");

            $stmt->bindParam(":nombres_cl", $datos["nombres_cl"], PDO::PARAM_STR);
            $stmt->bindParam(":apellidos_cl", $datos["apellidos_cl"], PDO::PARAM_STR);
            $stmt->bindParam(":ci_cl", $datos["ci_cl"], PDO::PARAM_STR);
            $stmt->bindParam(":tel_cl", $datos["tel_cl"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion_cl", $datos["direccion_cl"], PDO::PARAM_STR);
            $stmt->bindParam(":estado_cl", $datos["estado_cl"], PDO::PARAM_STR);
            if($stmt->execute()){ 
                return "ok";	
            }else{
                return "error";
            }
        }

        static public function modificarCliente($datos){
        
            $stmt = Conexion::conectar()->prepare("UPDATE clientes SET nombres_cl = :nombres_cl, apellidos_cl =:apellidos_cl,ci_cl =:ci_cl,
            tel_cl=:tel_cl,direccion_cl=:direccion_cl,estado_cl=:estado_cl WHERE id_cliente = :id_cliente");

            $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":nombres_cl", $datos["nombres_cl"], PDO::PARAM_STR);
            $stmt->bindParam(":apellidos_cl", $datos["apellidos_cl"], PDO::PARAM_STR);
            $stmt->bindParam(":ci_cl", $datos["ci_cl"], PDO::PARAM_STR);
            $stmt->bindParam(":tel_cl", $datos["tel_cl"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion_cl", $datos["direccion_cl"], PDO::PARAM_STR);
            $stmt->bindParam(":estado_cl", $datos["estado_cl"], PDO::PARAM_STR);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";	
            }
        }

    
        static public function borrarCliente( $id){

            $stmt = Conexion::conectar()->prepare("DELETE FROM clientes WHERE id_cliente = :id_cliente");

            $stmt -> bindParam(":id_cliente", $id, PDO::PARAM_INT);

            if($stmt -> execute()){

                return "ok";
            
            }else{

                return "error";	

            }

        }

    }
?>