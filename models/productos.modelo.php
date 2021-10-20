<?php
    require_once "conexion.php";
    
    class ModeloProductos{

        static public function mostrarProductos( $item, $valor){
            if($valor != ""){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM productos WHERE $item = :$item");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt -> fetch();
            }else{

                $stmt = Conexion::conectar()->prepare("SELECT * FROM view_productos");
                $stmt -> execute();
                //print_r($stmt->errorInfo());
                return $stmt -> fetchAll();
                
            }
            
        }
        
        static public function nuevoProducto($datos){
    
            $stmt = Conexion::conectar()->prepare("INSERT INTO productos(nombre_prod,stock_prod,precio_compra,precio_venta,estado_prod,categoriasid_cat,marcasid_marca,tipo_uni_prod,imagen_prod) 
            VALUES (:nombre_prod,:stock_prod,:precio_compra,:precio_venta,:estado_prod,:categoriasid_cat,:marcasid_marca,:tipo_uni_prod,:imagen_prod)");

            $stmt->bindParam(":nombre_prod", $datos["nombre_prod"], PDO::PARAM_STR);
            $stmt->bindParam(":stock_prod", $datos["stock_prod"], PDO::PARAM_STR);
            $stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
            $stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);
            $stmt->bindParam(":estado_prod", $datos["estado_prod"], PDO::PARAM_STR);
            $stmt->bindParam(":categoriasid_cat", $datos["categoriasid_cat"], PDO::PARAM_STR);
            $stmt->bindParam(":marcasid_marca", $datos["marcasid_marca"], PDO::PARAM_STR);
            $stmt->bindParam(":tipo_uni_prod", $datos["tipo_uni_prod"], PDO::PARAM_STR);
            $stmt->bindParam(":imagen_prod", $datos["imagen_prod"], PDO::PARAM_STR);
            if($stmt->execute()){ 
                
                return "ok";	
            }else{
                print_r($stmt->errorInfo());
                return "error";
            }
        }

        static public function modificarProducto($datos){
        
            $stmt = Conexion::conectar()->prepare("UPDATE productos SET nombre_prod =:nombre_prod,stock_prod = :stock_prod,precio_compra =:precio_compra,precio_venta = :precio_venta,
            estado_prod =:estado_prod,categoriasid_cat=:categoriasid_cat,marcasid_marca=:marcasid_marca,tipo_uni_prod=:tipo_uni_prod,imagen_prod=:imagen_prod WHERE id_prod = :id_prod");

            $stmt->bindParam(":id_prod", $datos["id_prod"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre_prod", $datos["nombre_prod"], PDO::PARAM_STR);
            $stmt->bindParam(":stock_prod", $datos["stock_prod"], PDO::PARAM_STR);
            $stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
            $stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);
            $stmt->bindParam(":estado_prod", $datos["estado_prod"], PDO::PARAM_STR);
            $stmt->bindParam(":categoriasid_cat", $datos["categoriasid_cat"], PDO::PARAM_STR);
            $stmt->bindParam(":marcasid_marca", $datos["marcasid_marca"], PDO::PARAM_STR);
            $stmt->bindParam(":tipo_uni_prod", $datos["tipo_uni_prod"], PDO::PARAM_STR);
            $stmt->bindParam(":imagen_prod", $datos["imagen_prod"], PDO::PARAM_STR);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";	
            }
        }

        static public function borrarProducto( $id){

            $stmt = Conexion::conectar()->prepare("DELETE FROM productos WHERE id_prod = :id_prod");
            $stmt -> bindParam(":id_prod", $id, PDO::PARAM_INT);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";	
            }
        }
    }
?>