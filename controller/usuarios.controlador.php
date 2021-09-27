<?php

    require_once("models/conexion.php");
    require_once("models/usuarios.modelo.php");


    class ControladorUsuarios{
        public function ctrIngresoUsuario(){
            
            $usuarios = new ModeloUsuarios();
            if(isset($_POST["user"])){
                if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["user"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])){

                    $valor = $_POST["user"];

                    $datos=$usuarios->mostrarUsuarios($valor);

                    if($datos["usuario"] == $_POST["user"] && $datos["password"] == $_POST["password"] ){
                        $_SESSION["iniciarSesion"] = "ok";
                        echo '<script>
                                window.location = "dashboard";
                            </script>';
                    }
                    else{
                        echo '<div class="alert alert-danger ">  
                                <p> Usuario y/o contraseña incorrecta </p>
                            </div>';
                            
                    }
                    
                }
            }
        }

        public function nuevoUsuario(){
            
        }
    }
