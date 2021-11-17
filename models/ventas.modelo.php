<?php
    require_once "conexion.php";
    
    class ModeloVentas{

        static public function mostrarVentas( $item, $valor){
            if($item != null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM ventas WHERE $item = :$item");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt -> fetch();
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT * FROM view_ventas");
                $stmt -> execute();
                //print_r($stmt->errorInfo());
                return $stmt -> fetchAll();    
            }
            
        }
        
        static public function nuevaVenta($datos){
    
            $stmt = Conexion::conectar()->prepare("INSERT INTO ventas VALUES (:id_venta, :fecha_venta,:total_venta,:usuariosid_user,:clientesid_cliente)");

            $stmt->bindParam(":id_venta", $datos["id_venta"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_venta", $datos["fecha_venta"], PDO::PARAM_STR);
            $stmt->bindParam(":total_venta", $datos["total_venta"], PDO::PARAM_STR);
            $stmt->bindParam(":usuariosid_user", $datos["usuariosid_user"], PDO::PARAM_STR);
            $stmt->bindParam(":clientesid_cliente", $datos["clientesid_cliente"], PDO::PARAM_STR);
            if($stmt->execute()){             
                return "ok";	
            }else{
                //print_r($stmt->errorInfo());
                return "error";
            }
        }

        static public function nuevoDetVenta($datos){
    
            $stmt = Conexion::conectar()->prepare("INSERT INTO detalle_ventas VALUES (:ventasid_venta, :productosid_prod,:cantidad_det_venta,:subtotal_det_venta)");

            $stmt->bindParam(":ventasid_venta", $datos["ventasid_venta"], PDO::PARAM_STR);
            $stmt->bindParam(":productosid_prod", $datos["productosid_prod"], PDO::PARAM_STR);
            $stmt->bindParam(":cantidad_det_venta", $datos["cantidad_det_venta"], PDO::PARAM_STR);
            $stmt->bindParam(":subtotal_det_venta", $datos["subtotal_det_venta"], PDO::PARAM_STR);
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

            $stmt -> bindParam(":id_cat", $datos, PDO::PARAM_INT);

            if($stmt -> execute()){

                return "ok";
            
            }else{

                return "error";	

            }

        }

    }
?>