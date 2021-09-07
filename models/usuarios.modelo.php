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
    }
?>