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
            
            if(isset($_POST["nombresUser"])){

                $nombres = $_POST["nombresUser"];
                $apellidos = $_POST["apellidosUser"];
                $usuario = $_POST["usuarioUser"];
                $password = $_POST["passwordUser"];
                $ci = $_POST["ciUser"];
                $estado = $_POST["estadoUser"];
                $rol = $_POST["rolUser"];

                if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $nombres) &&
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$apellidos ) &&
                    preg_match('/^[a-zA-Z0-9]+$/', $usuario) &&
                    preg_match('/^[a-zA-Z0-9]+$/', $password) &&
                    preg_match('/^[a-zA-Z0-9]+$/', $ci) ){

                        
                        $datos = array("nombre" => $nombres,
                                        "apellido"=> $apellidos,
                                        "usuario" => $usuario,
                                        "password"=> $password,
                                        "estado" => $estado,
                                        "rol" => $rol,
                                        "ci" => $ci);

                       /* $respuesta = ModeloUsuarios::nuevoUsuario($datos);

                        if($respuesta == "ok"){
                            echo '<script>
                                guardadoExitoso("el usuario");
                            </script>'; 
                        }*/
                }else{
                    echo '<script>
                        datosNoValidos("el usuario");
					</script>';              
                }
            }
        }
    }
