<?php
    require_once "conexion.php";
    
    class ModeloUsuarios{

    static public function mostrarUsuarios( $item, $valor){
        if($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios");
            $stmt -> execute();
            //print_r($stmt->errorInfo());
            return $stmt -> fetchAll();
            
        }
        
    }
       
    static public function nuevoUsuario($datos){
   
		$stmt = Conexion::conectar()->prepare("INSERT INTO usuarios(nombre, apellido,ci, usuario, password,estado,rolesid_rol,foto) VALUES (:nombre, :apellido,:ci, :usuario, :password,:estado,:rolesid_rol,:foto)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":rolesid_rol", $datos["rolesid_rol"], PDO::PARAM_STR);
        $stmt->bindParam(":ci", $datos["ci"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

		if($stmt->execute()){ 
            
			return "ok";	
		}else{
            //print_r($stmt->errorInfo());
			return "error";
		}
        $stmt->close();
        $stmt = null;


	}

    static public function modificarUsuario($datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE usuarios SET nombre = :nombre, apellido =:apellido, ci =:ci,  password = :password, estado = :estado, rolesid_rol = :rolesid_rol, foto = :foto, usuario = :usuario WHERE id_user = :id_user");

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

		$stmt -> close();

		$stmt = null;

	}

    }
?>