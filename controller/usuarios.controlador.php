<?php

  

    class ControladorUsuarios{

        static public function ctrIngresoUsuario(){
            
            $usuarios = new ModeloUsuarios();
            if(isset($_POST["user"])){
                if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["user"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])){
                    
                    $encriptar = crypt($_POST["password"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    
                    $valor = $_POST["user"];
                    $parametro = "usuario";
                    $datos=$usuarios->mostrarUsuarios($parametro,$valor);

                    if($datos["usuario"] == $_POST["user"] && $datos["password"] == $encriptar ){
                        if($datos["estado"]!=0){
                            $_SESSION["iniciarSesion"] = "ok";
                            $_SESSION["nombre"] = $datos["nombre"];
                            $_SESSION["apellido"] = $datos["apellido"];
                            $_SESSION["foto"] = $datos["foto"];
                            $_SESSION["rol"] = $datos["rolesid_rol"];

                            //fecha del ultimo login
                            date_default_timezone_set('America/La_Paz');

                            $fecha = date('Y-m-d');
                            $hora = date('H:i:s');

                            $fechaActual = $fecha.' '.$hora;

                            $item1 = "ultimo_login";
                            $valor1 = $fechaActual;

                            $item2 = "id_user";
                            $valor2 = $datos["id_user"];

                            $ultimoLogin = ModeloUsuarios::actualizarUltimoLogin($item1, $valor1, $item2, $valor2);

                            if($ultimoLogin == "ok"){
                                echo '<script>
                                    window.location = "dashboard";
                                </script>';
                            }
                            
                        }else{
                            echo '<div class="alert alert-danger ">  
                                <p> El usuario no se encuentra habilitado para acceder al sistema </p>
                            </div>';
                        }
                        
                    }
                    else{
                        echo '<div class="alert alert-danger ">  
                                <p> Usuario y/o contraseña incorrecta </p>
                            </div>';
                            
                    }
                    
                }
            }
        }

        static public function nuevoUsuario(){
            
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
                        $ruta = "views\img\usuarios\user.png";
                        if(strlen($_FILES["fotoUser"]["tmp_name"])!=0){
                            list($ancho, $alto) = getimagesize($_FILES["fotoUser"]["tmp_name"]);
        
                            $nuevoAncho = 500;
                            $nuevoAlto = 500;

                            //directorio para la foto
                            $directorio = "views/img/usuarios/";
                            if(!is_dir($directorio)){
                                mkdir($directorio, 0777, true);
                            }
                           
                            //metodo para jpg
                            $aleatorio = mt_rand(100,999);
                            if($_FILES["fotoUser"]["type"] == "image/jpeg"){                      
                                $ruta = "views/img/usuarios/".$_POST["usuarioUser"]."".$aleatorio.".jpg";
                                $origen = imagecreatefromjpeg($_FILES["fotoUser"]["tmp_name"]);
                            }
                            
                            //metodo para png
                            if($_FILES["fotoUser"]["type"] == "image/png"){
                                $ruta = "views/img/usuarios/".$_POST["usuarioUser"]."".$aleatorio.".png";
                                $origen = imagecreatefrompng($_FILES["fotoUser"]["tmp_name"]);
                            }
                            						
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagepng($destino, $ruta);
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
                        }
                }else{
                    echo '<script>
                        datosNoValidos("el usuario","registrar");
					</script>';              
                }
            }
        }

        static public function listarUsuarios($item, $valor){
            $respuesta = ModeloUsuarios::mostrarUsuarios($item, $valor);
            return $respuesta;
        }
        
        static public function modificarUsuario(){

            if(isset($_POST["nombresUserEdit"])){

                $nombres = $_POST["nombresUserEdit"];
                $apellidos = $_POST["apellidosUserEdit"];
                $usuario = $_POST["usuarioUserEdit"];
                $password = $_POST["passwordUserEdit"];
                $ci = $_POST["ciUserEdit"];
                $estado = $_POST["estadoUserEdit"];
                $rol = $_POST["rolUserEdit"];
                $id = $_POST["idUserActual"];
                
                if( preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $nombres) &&
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$apellidos ) &&
                    preg_match('/^[a-zA-Z0-9]+$/', $usuario) &&
                    preg_match('/^[a-zA-Z0-9]+$/', $ci)){
    
                    /*=============================================
                    VALIDAR IMAGEN
                    =============================================*/
                    
                    $ruta = $_POST["fotoUserActual"];
                    
                    if(strlen($_FILES["fotoUserEdit"]["tmp_name"])!=0){
                        list($ancho, $alto) = getimagesize($_FILES["fotoUserEdit"]["tmp_name"]);
                            
                            $nuevoAncho = 500;
                            $nuevoAlto = 500;

                            //borra foto
                            if(!empty($_POST["fotoUserActual"] && $_POST["fotoUserActual"]!="views\img\usuarios\user.png"))
                                $tes =unlink($_POST["fotoUserActual"]);

                            //directorio para la foto
                            $directorio = "views/img/usuarios/";
                    
                            if(!is_dir($directorio)){
                                mkdir($directorio, 0777, true);
                            }
                           
                            //metodo para jpg
                            $aleatorio = mt_rand(100,999);
                            if($_FILES["fotoUserEdit"]["type"] == "image/jpeg"){                      
                                $ruta = "views/img/usuarios/".$_POST["usuarioUserEdit"]."".$aleatorio.".jpg";
                                $origen = imagecreatefromjpeg($_FILES["fotoUserEdit"]["tmp_name"]);
                            }
                            
                            //metodo para png
                            if($_FILES["fotoUserEdit"]["type"] == "image/png"){
                                $ruta = "views/img/usuarios/".$_POST["usuarioUser"]."".$aleatorio.".png";
                                $origen = imagecreatefrompng($_FILES["fotoUserEdit"]["tmp_name"]);
                            }
                            						
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagepng($destino, $ruta);
                        
    
                    }
    
                   
                    if($password != ""){
    
                        if(preg_match('/^[a-zA-Z0-9]+$/', $password)){
                            $encriptar = crypt($password, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                        }else{
    
                            echo'<script>
                                    datosNoValidos("el usuario","modificar");
                                  </script>';
    
                        }
    
                    }else{
    
                        $encriptar = $_POST["passwordUserEditActual"];
    
                    }
         
                    $datos = array("id_user"=>$id,
                                   "nombre" => $nombres,
                                   "apellido"=> $apellidos,
                                   "usuario" => $usuario,
                                   "password"=> $encriptar,
                                   "estado" => $estado,
                                   "rolesid_rol" => $rol,
                                   "ci" => $ci,
                                   "foto"=> $ruta);
                                   
                    $respuesta = ModeloUsuarios::modificarUsuario($datos);
                   
                    if($respuesta == "ok"){
                        
                        
                        echo '<script>
                        window.location = "usuarios";
                        window.setTimeout(guardadoExitoso("el usuario"), 2000);
                        </script>';
                    }
                }else{
    
                    echo'<script>
                         datosNoValidos("el usuario","modificar");
                      </script>';
                }
            }
            
        }

        
    }
