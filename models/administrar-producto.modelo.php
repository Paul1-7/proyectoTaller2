<?php
    require_once "conexion.php";
    
    class ModeloProductos{

    static public function mostrarProductos( $item, $valor,$item2, $valor2){
        if($valor != "" || $valor2 !=""){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM productos WHERE $item = :$item AND $item2 =:$item2");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM productos");
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

    static public function modificarUsuario($datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE productos SET nombre = :nombre, apellido =:apellido, ci =:ci,  password = :password, estado = :estado, rolesid_rol = :rolesid_rol, foto = :foto, usuario = :usuario WHERE id_user = :id_user");

        $stmt->bindParam(":id_user", $datos["id_user"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":rolesid_rol", $datos["rolesid_rol"], PDO::PARAM_STR);
        $stmt->bindParam(":ci", $datos["ci"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}
	}

    static public function actualizarUltimoLogin($item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE productos SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";	
		}else{
			return "error";	
		}
	}
    }
?>