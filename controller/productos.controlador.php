<?php
    class ControladorProductos{

 
        static public function nuevoProducto(){
            
            if(isset($_POST["nombreProd"])){

                $nombre = $_POST["nombreProd"];
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

                        $valNombre = ModeloClientes::mostrarClientes("nombre_prod",$nombre);
                        if($valNombre!=false){
                            echo'<script>
                                var mensaje = "¡El nombre del producto ya se encuentra registrado!";
                                datosNoValidos(mensaje);
                            </script>';
                        }else{
                            $respuesta = ModeloProductos::nuevoProducto($datos);

                            if($respuesta == "ok"){
                                echo '<script>
                                    mensaje = "¡El producto ha sido guardado correctamente!"
                                    modulo = "productos"
                                    guardadoExitoso(mensaje,modulo);  
                                </script>'; 
                            }
                        }
                }else{
                    echo '<script>
                        mensaje = "No se logró registrar el producto"
                        datosNoValidos(mensaje);
					</script>';              
                }
            }
        }

        static public function listarProductos($item, $valor){
            $respuesta = ModeloProductos::mostrarProductos($item, $valor);
            return $respuesta;
        }
     
       
       static public function modificarProducto(){

            if(isset($_POST["nombreProdEdit"])){

                $idProd = $_POST["idProdActual"];
                $nombre = $_POST["nombreProdEdit"];
                $stock = $_POST["stockProdEdit"];
                $precioVenta = $_POST["precioVentaProdEdit"];
                $precioCompra = $_POST["precioCompraProdEdit"];
                $tipoUnidad = $_POST["tipoUniProdEdit"];
                $estado = $_POST["estadoProdEdit"];
                $categoria = $_POST["catProdEdit"];
                $marca = $_POST["marcaProdEdit"];
                $nombreActual = $_POST["nombreActual"];

                if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $nombre) &&
                preg_match('/^[0-9]+$/', $stock) &&
                preg_match('/^[0-9.]+$/', $precioCompra) &&
                preg_match('/^[0-9.]+$/', $precioVenta) &&
                preg_match('/^[0-9]+$/', $tipoUnidad) &&
                preg_match('/^[0-1]+$/', $estado) &&
                preg_match('/^[0-9]+$/', $categoria) &&
                preg_match('/^[0-9]+$/', $marca)){
    
                    /*=============================================
                    VALIDAR IMAGEN
                    =============================================*/
                    
                    $ruta = $_POST["fotoProdActual"];
                    
                    if(strlen($_FILES["fotoProdEdit"]["tmp_name"])!=0){
                        list($ancho, $alto) = getimagesize($_FILES["fotoProdEdit"]["tmp_name"]);
                            
                            $nuevoAncho = 500;
                            $nuevoAlto = 500;

                            

                            //borra foto
                            if(!empty($_POST["fotoProdActual"] ) && $_POST["fotoProdActual"]!="views\img\productos\producto_default.jpg")
                               unlink($_POST["fotoProdActual"]);


                            //directorio para la foto segun la categorias seleccionada
                            $nombreCat = ModeloCategorias::mostrarCategorias("id_cat",$categoria);
                            $directorio = "views/img/productos/".$nombreCat["nombre_cat"];
                            
                            
                            if(!is_dir($directorio)){
                                mkdir($directorio, 0777, true);
                            }
                           
                             //metodo para jpg
                             $aleatorio = mt_rand(100,999);
                             if($_FILES["fotoProdEdit"]["type"] == "image/jpeg"){                      
                                 $ruta = $directorio."/".$_POST["nombreProdEdit"]."".$aleatorio.".jpg";
                                 $origen = imagecreatefromjpeg($_FILES["fotoProdEdit"]["tmp_name"]);
                             }
                             
                             //metodo para png
                             if($_FILES["fotoProdEdit"]["type"] == "image/png"){
                                 $ruta = $directorio."/".$_POST["nombreProdEdit"]."".$aleatorio.".png";
                                 $origen = imagecreatefrompng($_FILES["fotoProdEdit"]["tmp_name"]);
                             }
                                                     
                             $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                             imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                             imagepng($destino, $ruta);
                            						
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagepng($destino, $ruta);
                        
    
                    }
    

                    $datos = array("id_prod"=>$idProd,
                                    "nombre_prod" => $nombre,
                                    "stock_prod"=> $stock,
                                    "precio_compra" => $precioCompra,
                                    "precio_venta"=> $precioVenta,
                                    "estado_prod" => $estado,
                                    "categoriasid_cat" => $categoria,
                                    "marcasid_marca" => $marca,
                                    "tipo_uni_prod" => $tipoUnidad,
                                    "imagen_prod"=> $ruta);
                        
                    $valNombre = ModeloClientes::mostrarClientes("nombre_prod",$nombre);
                    $respuesta = "error";
                    if($valNombre!=false){
                        if($nombreActual == $valNombre["nombre_prod"]){
                            $respuesta = ModeloProductos::modificarProducto($datos);
                        }
                        else{
                            echo'<script>
                                var mensaje = "¡El nombre del producto ya se encuentra registrado!";
                                datosNoValidos(mensaje);
                            </script>';
                        }
                    }else{
                        $respuesta = ModeloProductos::modificarProducto($datos);
                    }
                    
                    if($respuesta == "ok"){
                        echo '<script>
                        var mensaje = "¡El producto ha sido guardado correctamente!"
                        var modulo = "productos"    
                        guardadoExitoso(mensaje,modulo);
                        </script>';
                    }
                }else{
    
                    echo'<script>
                        mensaje = "No se logró modificar el producto"
                        datosNoValidos(mensaje);
                      </script>';
                }
            }
            
        }

        static public function borrarProducto(){

            if(isset($_GET["idProd"])){
    
                
                $id = $_GET["idProd"];
                $imagen = $_GET["imagen_prod"];

                $respuesta = ModeloProductos::borrarProducto($id);
    
                if($respuesta == "ok"){

                    if(!empty($imagen ) && $imagen!="views\img\productos\producto_default.jpg")
                               unlink($imagen);

                    echo'<script>
                            mensaje = "¡El producto se borro correctamente!"
                            modulo = "productos"
                            borradoExitoso(mensaje,modulo)
                        </script>';
                }else{
                    echo'<script>
                            mensaje = "¡No se logro borrar el producto seleccionado"
                            modulo = "productos"
                            borradoSinExito(mensaje,modulo)
                        </script>';
                }
            }
            
        }
        
    }
