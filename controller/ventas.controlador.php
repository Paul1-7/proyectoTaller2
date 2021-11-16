<?php
    class ControladorVentas{

        static public function nuevaVenta(){ 

            if(isset($_POST["idCliente"])){

                $arraySubtotal=array();
                //Verifica si existen productos
                if($_POST["listaProd"] == ""){
                    echo '<script>
                        msg = "Faltan los datos del cliente o del producto";
                        msgDatosIncompletos(msg)
                    </script>';
                    return;
                }else{

                    $listaIdProd = json_decode($_POST["listaProd"], true);

                    foreach ($listaIdProd as $key => $value) {

                        //array_push($totalProductosComprados, $value["cantidad"]);
                        
                        if(preg_match('/^[0-9]+$/', $value["id"]) &&
                        preg_match('/^[0-9]+$/',$value["cantidad"])
                        ){
                            $item = "id_prod";
                            $idProd = $value["id"];
                            $traerProducto = ModeloProductos::mostrarProductos($item,$idProd);

                            //verifica si no excede stock
                            $nuevoStock = $traerProducto["stock_prod"]- $value["cantidad"];
                            if($nuevoStock<0){
                                echo '<script>
                                    let stock = '.$traerProducto["stock_prod"].'
                                    msgCantidadSuperaStock(stock)    
                                </script>';
                                return; 
                            }else{
                                $datos = array( "id_prod" =>$idProd,
                                                "stock_prod" => $nuevoStock,
                                                );
                                ModeloProductos::modificarProducto($datos);
                            }

                            //calcular subtotal
                            $subtotal = $traerProducto["precio_venta"]* $value["cantidad"];
                            array_push($arraySubtotal, $subtotal);
                            $total=+$subtotal;
                        }else{
                            echo '<script>
                                    let msg="No se logró registrar la venta"
                                    datosNoValidos(mensaje)   
                                </script>';
                                return; 
                        }
                    }
                }

                //ventas

                $idVendedor =$_POST["idVendedor"];
                $idCliente =$_POST["idCliente"];
                $fechaVenta =$_POST["fechaVenta"];
                $aplicarIva =$_POST["aplicarIva"];
                /*
                if(preg_match('/^[0-9]+$/', $idVendedor) &&
                    preg_match('/^[0-9]+$/',$idCliente) &&
                    preg_match('/^[0-9:- ]+$/',$fechaVenta) &&
                    preg_match('/^[a-z]+$/',$aplicarIva)
                ){

                    //aplicar iva
                    if($aplicarIva=="on"){
                        $total=$total+($total*0.13);
                    }

                    $datos = array("fecha_venta" => $fechaVenta,
                                    "total_venta"=> $total,
                                    "usuariosid_user"=> $idVendedor,
                                    "clientesid_cliente"=> $idCliente,
                                    );

                                     
                    $respuesta = ModeloVentas::nuevaVenta($datos);
                    if($respuesta == "ok"){
                        //detalle venta
                        datos= array("fecha_venta" => $fechaVenta,
                        "total_venta"=> $total,
                        "usuariosid_user"=> $idVendedor,
                        "clientesid_cliente"=> $idCliente,
                        );


                        echo '<script>
                            mensaje ="¡El cliente ha sido guardado correctamente!"
                            modulo = "clientes"
                            guardadoExitoso(mensaje,modulo);  
                        </script>'; 
                    }    
                   
                }else{
                    echo '<script>
                        mensaje = "No se logró registrar la venta"
                        datosNoValidos(mensaje);
                    </script>';              
                }


                 
                if($respuesta == "ok"){
                    //detalle venta


                    echo '<script>
                        mensaje ="¡El cliente ha sido guardado correctamente!"
                        modulo = "clientes"
                        guardadoExitoso(mensaje,modulo);  
                    </script>'; 
                }

                

                

                    */
            }
        }

        
        static public function listarClientes($item, $valor){
            $respuesta = ModeloClientes::mostrarClientes($item, $valor);
            return $respuesta;
        }
        
        
        static public function modificarCliente(){
            if(isset($_POST["nombreEditCl"])){

                $nombre =$_POST["nombreEditCl"];
                $apellido =$_POST["apellidoCl"];
                $ci =$_POST["ciCl"];
                $tel =$_POST["telCl"];
                $direccion =$_POST["direccionCl"];
                $id = $_POST["idClActual"];
                $ciActual = $_POST["ClActual"];

                if(isset($_POST["estadoCl"]))
                    $estado = $_POST["estadoCl"];
                else
                    $estado = 0;

                if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $nombre) &&
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$apellido) &&
                    preg_match('/^[a-zA-Z0-9]+$/',$ci) &&
                    preg_match('/^[0-9+ ]+$/',$tel) &&
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/',$direccion) &&
                    preg_match('/^[0-1]+$/',$estado)){

                        $datos = array( "id_cliente" =>$id,
                                        "nombres_cl" => $nombre,
                                        "apellidos_cl"=> $apellido,
                                        "ci_cl"=> $ci,
                                        "tel_cl"=> $tel,
                                        "direccion_cl"=> $direccion,
                                        "estado_cl" => $estado);

                        $valCi = ModeloClientes::mostrarClientes("nombre_cl",$ci);
                        $respuesta = "error";
                        if($valCi!=false){
                            if($ciActual == $valCi["ci_cl"]){
                                $respuesta = ModeloClientes::modificarCliente($datos);
                            }else{
                                echo'<script>
                                        var mensaje = "¡El carnet de identidad del cliente ya se encuentra registrado!";
                                        datosNoValidos(mensaje);
                                     </script>';
                            }
                        }else{
                            $respuesta = ModeloClientes::modificarCliente($datos);
                        }

                        if($respuesta == "ok"){
                            echo '<script>
                                var mensaje = "¡El cliente ha sido guardado correctamente!";
                                var modulo = "clientes";
                                guardadoExitoso(mensaje,modulo);
                                
                            </script>';
                        }
                }else{
                    echo'<script>
                        var mensaje = "No se logró modificar el cliente"
                         datosNoValidos(mensaje);
                      </script>';
                }
            }
            
        }
    
        static public function borrarCliente(){

            if(isset($_GET["idCl"])){
    
                
                $id = $_GET["idCl"];
    
                $respuesta = ModeloClientes::borrarCliente($id);
    
                if($respuesta == "ok"){
    
                    echo'<script>
                            var mensaje = "¡El cliente se borro correctamente!"
                            var modulo = "clientes"
                            borradoExitoso(mensaje,modulo)
                        </script>';
                }else{
                    echo'<script>
                            borradoSinExito("¡No se logro borrar la categoria seleccionada!","categorias")
                        </script>';
                }
            }
            
        }
        
    }