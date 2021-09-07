<?php

    require_once("models/conexion.php");
    require_once("models/usuarios.modelo.php");


    class ControladorUsuarios{
        public function ctrIngresoUsuario(){
            
            $usuarios = new ModeloUsuarios();
            if(isset($_POST["user"])){
                var_dump("pasl");
                if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["user"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])){
                    $tabla = "usuarios";
                    $item = "usuario";
                    $valor = $_POST["user"];
                    var_dump($datos=$usuarios->mostrarUsuarios());
                    //$respuesta = ModeloUsuarios::mostrarUsuarios($tabla,$item,$valor);
                    //var_dump($respuesta);
                    //var_dump($respuesta);
                    /*if($respuesta["usuario"] == $_POST["user"] && $respuesta["password"] == $_POST["password"] ){
                        $_SESSION["iniciarSesion"] == "ok";
                        echo '<script>
                                window.location = "dashboard";
                            </script>';
                    }
                    else{
                        echo "incorrecto";
                    }*/
                    
                }
            }
        }
    }
