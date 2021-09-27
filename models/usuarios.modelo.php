<?php
    //require_once "conexion.php";

    class ModeloUsuarios extends Conectar{
        public function mostrarUsuarios($usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM usuarios WHERE usuario = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usuario);
            $sql->execute();
            return $resultado=$sql->fetch();
        }

        

       /* static public function nuevoUsuario($datos){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO usuarios (nombre,apellido,usuario,password,estado,rol,ci) VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$datos);
            if($sql->execute()){
                return "ok";
            }else
                return "error";
            

        }*/

    }
?>