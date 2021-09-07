<?php
    //require_once "conexion.php";

    class ModeloUsuarios extends Conectar{
        /*static public function mostrarUsuarios($table,$item,$valor){
            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $table WHERE $item = :$item");

            $stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
            $stmt -> execute();

            //retorna en una sola linea
            return $stmt -> fetch();
        }*/


        public function mostrarUsuarios(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM usuarios";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>