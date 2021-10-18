<?php
    class ControladorProductos{

 
        static public function nuevoProducto(){
            
            if(isset($_POST["nombreProd"])){

                $nombre = $_POST["nombreProd"];
                //$imagen = $_POST["fotoProd"];
                $stock = $_POST["stockProd"];
                $precioVenta = $_POST["precioVentaProd"];
                $precioCompra = $_POST["precioCompraProd"];
                $tipoUnidad = $_POST["tipoUniProd"];
                $estado = $_POST["estadoProd"];
                $categoria = $_POST["catProd"];
                $marca = $_POST["marcaProd"];

                if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $nombre) &&
                    preg_match('/^[0-9]+$/', $stock) &&
                    preg_match('/^[0-9.]+$/', $precioCompra) &&
                    preg_match('/^[0-9.]+$/', $precioVenta) &&
                    preg_match('/^[0-9]+$/', $tipoUnidad) &&
                    preg_match('/^[0-1]+$/', $estado) &&
                    preg_match('/^[0-9]+$/', $categoria) &&
                    preg_match('/^[0-9]+$/', $marca)
                    ){

                        //validar imagen
                        $ruta = "views\img\productos\producto_default.jpg";
                        if(strlen($_FILES["fotoProd"]["tmp_name"])!=0){
                            list($ancho, $alto) = getimagesize($_FILES["fotoProd"]["tmp_name"]);
        
                            $nuevoAncho = 500;
                            $nuevoAlto = 500;

                            //directorio para la foto segun la categorias seleccionada
                            $nombreCat = ModeloCategorias::mostrarCategorias("id_cat",$categoria);
                            $directorio = "views/img/productos/".$nombreCat["nombre_cat"];
                            
                            if(!is_dir($directorio)){
                                mkdir($directorio, 0777, true);
                            }
                           
                            //metodo para jpg
                            $aleatorio = mt_rand(100,999);
                            if($_FILES["fotoProd"]["type"] == "image/jpeg"){                      
                                $ruta = $directorio."/".$_POST["nombreProd"]."".$aleatorio.".jpg";
                                $origen = imagecreatefromjpeg($_FILES["fotoProd"]["tmp_name"]);
                            }
                            
                            //metodo para png
                            if($_FILES["fotoProd"]["type"] == "image/png"){
                                $ruta = $directorio."/".$_POST["nombreProd"]."".$aleatorio.".png";
                                $origen = imagecreatefrompng($_FILES["fotoProd"]["tmp_name"]);
                            }
                            						
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagepng($destino, $ruta);
                        }

                        
                        $datos = array("nombre_prod" => $nombre,
                                        "stock_prod"=> $stock,
                                        "precio_compra" => $precioCompra,
                                        "precio_venta"=> $precioVenta,
                                        "estado_prod" => $estado,
                                        "categoriasid_cat" => $categoria,
                                        "marcasid_marca" => $marca,
                                        "tipo_uni_prod" => $tipoUnidad,
                                        "imagen_prod"=> $ruta);
                      $respuesta = ModeloProductos::nuevoProducto($datos);

                        if($respuesta == "ok"){
                            echo '<script>
                                guardadoExitoso("¡El producto ha sido guardado correctamente!","administrar-productos");  
                            </script>'; 
                        }
                }else{
                    echo '<script>
                        datosNoValidos("No se logró registrar el producto");
					</script>';              
                }
            }
        }

        static public function listarProductos($item, $valor){
            $respuesta = ModeloProductos::mostrarProductos($item, $valor);
            return $respuesta;
        }
     
       
       static public function modificarUsuario(){

            if(isset($_POST["nombresProd"])){

                $nombres = $_POST["nombresProd"];
                $apellidos = $_POST["apellidosProd"];
                $usuario = $_POST["usuarioProd"];
                $password = $_POST["passwordProd"];
                $ci = $_POST["ciProd"];
                $estado = $_POST["estadoProd"];
                $rol = $_POST["rolProd"];
                $id = $_POST["idProd"];
                
                if( preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $nombres) &&
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$apellidos ) &&
                    preg_match('/^[a-zA-Z0-9]+$/', $usuario) &&
                    preg_match('/^[a-zA-Z0-9]+$/', $ci)){
    
                    /*=============================================
                    VALIDAR IMAGEN
                    =============================================*/
                    
                    $ruta = $_POST["fotoProd"];
                    
                    if(strlen($_FILES["fotoProd"]["tmp_name"])!=0){
                        list($ancho, $alto) = getimagesize($_FILES["fotoProd"]["tmp_name"]);
                            
                            $nuevoAncho = 500;
                            $nuevoAlto = 500;

                            //borra foto
                            if(!empty($_POST["fotoProd"] && $_POST["fotoProd"]!="views\img\usuarios\Prod.png"))
                                $tes =unlink($_POST["fotoProd"]);

                            //directorio para la foto
                            $directorio = "views/img/usuarios/";
                    
                            if(!is_dir($directorio)){
                                mkdir($directorio, 0777, true);
                            }
                           
                            //metodo para jpg
                            $aleatorio = mt_rand(100,999);
                            if($_FILES["fotoProd"]["type"] == "image/jpeg"){                      
                                $ruta = "views/img/usuarios/".$_POST["usuarioProd"]."".$aleatorio.".jpg";
                                $origen = imagecreatefromjpeg($_FILES["fotoProd"]["tmp_name"]);
                            }
                            
                            //metodo para png
                            if($_FILES["fotoProd"]["type"] == "image/png"){
                                $ruta = "views/img/usuarios/".$_POST["usuarioProd"]."".$aleatorio.".png";
                                $origen = imagecreatefrompng($_FILES["fotoProd"]["tmp_name"]);
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
                                    datosNoValidos("No se logró modificar el usuario");
                                </script>';
                        }
    
                    }else{
    
                        $encriptar = $_POST["passwordProd"];
    
                    }
         
                    $datos = array("id_Prod"=>$id,
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
                            
                        guardadoExitoso("¡El usuario ha sido guardado correctamente!","usuarios");
                        </script>';
                    }
                }else{
    
                    echo'<script>
                        datosNoValidos("No se logró moficar el usuario");
                      </script>';
                }
            }
            
        }

        
    }
