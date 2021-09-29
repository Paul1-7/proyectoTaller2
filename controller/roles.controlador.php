<?php

    require_once("models/conexion.php");
    require_once("models/usuarios.modelo.php");


    class ControladorRoles{


        static public function listarRoles($item, $valor){
            
            $respuesta = ModeloRoles::mostrarRoles($item, $valor);
            return $respuesta;
        }
        
    }