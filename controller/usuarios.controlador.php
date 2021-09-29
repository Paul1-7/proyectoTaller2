<?php

    require_once("models/conexion.php");
    require_once("models/usuarios.modelo.php");


    class ControladorUsuarios{

        public function ctrIngresoUsuario(){
            
            $usuarios = new ModeloUsuarios();
            if(isset($_POST["user"])){
                if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["user"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])){
                    
                    $encriptar = crypt($_POST["password"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    $valor = $_POST["user"];
                    $parametro = "usuario";
                    $datos=$usuarios->mostrarUsuarios($parametro,$valor);

                    if($datos["usuario"] == $_POST["user"] && $datos["password"] == $encriptar ){
                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["nombre"] = $datos["nombre"];
                        $_SESSION["apellido"] = $datos["apellido"];
                        $_SESSION["foto"] = $datos["foto"];
                        $_SESSION["rol"] = $datos["rolesid_rol"];

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

                        //validar imagen
                        $ruta = "views\assets\images\user-profile\user.png";
                        if(strlen($_FILES["fotoUser"]["tmp_name"])!=0){
                            list($ancho, $alto) = getimagesize($_FILES["fotoUser"]["tmp_name"]);
        
                            $nuevoAncho = 500;
                            $nuevoAlto = 500;

                            //directorio para la foto
                            $directorio = "views/img/usuarios/".$_POST["usuarioUser"];
                            if(!is_dir($directorio)){
                                mkdir($directorio, 0777, true);
                            }
                           
                            //metodo para jpg
                            if($_FILES["fotoUser"]["type"] == "image/jpeg"){
        
                                $aleatorio = mt_rand(100,999);
                                $ruta = "views/img/usuarios/".$_POST["usuarioUser"]."/".$aleatorio.".jpg";
                                $origen = imagecreatefromjpeg($_FILES["fotoUser"]["tmp_name"]);						
                                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                                imagejpeg($destino, $ruta);
                            }
                            
                            //metodo para png
                            if($_FILES["fotoUser"]["type"] == "image/png"){
                                $aleatorio = mt_rand(100,999);
                                $ruta = "views/img/usuarios/".$_POST["usuarioUser"]."/".$aleatorio.".png";
                                $origen = imagecreatefrompng($_FILES["fotoUser"]["tmp_name"]);						
                                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                                imagepng($destino, $ruta);
        
                            }
                            
                        }

                        $encriptar = crypt($password,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                        $datos = array("nombre" => $nombres,
                                        "apellido"=> $apellidos,
                                        "usuario" => $usuario,
                                        "password"=> $encriptar,
                                        "estado" => $estado,
                                        "rolesid_rol" => $rol,
                                        "ci" => $ci,
                                        "foto"=> $ruta);
                      $respuesta = ModeloUsuarios::nuevoUsuario($datos);

                        if($respuesta == "ok"){
                            echo '<script>
                                guardadoExitoso("el usuario");  
                            </script>'; 
                        }else{
                            echo "error";
                        }
                }else{
                    echo '<script>
                        datosNoValidos("el usuario");
					</script>';              
                }
            }
        }

        static public function listarUsuarios($item, $valor){
            $respuesta = ModeloUsuarios::mostrarUsuarios($item, $valor);
            return $respuesta;
        }
        
        
    }
