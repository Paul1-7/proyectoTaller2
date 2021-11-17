<?php
    class ControladorVentas{

        static public function nuevaVenta(){ 

            if(isset($_POST["idCliente"])){

                $arraySubtotal=array();
                $total=0;
                //Verifica si existen productos
                $a=$_POST["listaProd"];
                $b=$_POST["idCliente"];
                if($_POST["listaProd"] == "" || $_POST["idCliente"]=="" ){
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
                                                "nombre_prod" => $traerProducto["nombre_prod"],
                                                "precio_compra" => $traerProducto["precio_compra"],
                                                "precio_venta"=> $traerProducto["precio_venta"],
                                                "estado_prod" => $traerProducto["estado_prod"],
                                                "categoriasid_cat" => $traerProducto["categoriasid_cat"],
                                                "marcasid_marca" => $traerProducto["marcasid_marca"],
                                                "tipo_uni_prod" => $traerProducto["tipo_uni_prod"],
                                                "imagen_prod"=> $traerProducto["imagen_prod"],
                                                "stock_prod" => $nuevoStock,
                                                );
                                $test=ModeloProductos::modificarProducto($datos);
                            }



                            //calcular subtotal
                            $subtotal = $traerProducto["precio_venta"]* $value["cantidad"];
                            array_push($arraySubtotal, $subtotal);
                            $total= $total+$subtotal;
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

                $aplicarIva="off";
                if(isset($_POST["aplicarIva"]))
                    $aplicarIva =$_POST["aplicarIva"];

                //trae datos de la dosificacion
                $item="id_dosificacion";
                $valor=1;
                $idVenta = ModeloDosificacionFacturas::mostrarDosificacionFacturas($item, $valor);
                //actualiza el num inicial
                $datos = array( "id_dosificacion" => $valor,
                                "num_autorizacion" => $idVenta["num_autorizacion"],
                                "llave_dosificacion" => $idVenta["llave_dosificacion"],
                                "fecha_lim_emision" => $idVenta["fecha_lim_emision"],
                                "num_fact_inicial" => $idVenta["num_fact_inicial"]+1
                                );
                $test=ModeloDosificacionFacturas::modificarDosificacionFacturas($datos);
                
                if(preg_match('/^[0-9]+$/', $idVendedor) &&
                    preg_match('/^[0-9]+$/',$idCliente) &&
                    preg_match('/^[a-zA-Z]+$/',$aplicarIva)
                ){

                    //aplicar iva
                    if($aplicarIva=="on"){
                        $total=$total+($total*0.13);
                    }

                    $datos = array( "id_venta" => $idVenta["num_fact_inicial"],
                                    "fecha_venta" => $fechaVenta,
                                    "total_venta"=> round($total,2),
                                    "usuariosid_user"=> $idVendedor,
                                    "clientesid_cliente"=> $idCliente,
                                    );

                                     
                    $respuesta = ModeloVentas::nuevaVenta($datos);
                    if($respuesta == "ok"){
                        //detalle venta
                        $i=0;
                        foreach ($listaIdProd as $key => $value) {

                            $datos= array(  "ventasid_venta" => $idVenta["num_fact_inicial"],
                                            "productosid_prod" => $value["id"],
                                            "cantidad_det_venta"=> $value["cantidad"],
                                            "subtotal_det_venta"=> round(floatval($arraySubtotal[$i]),2)
                                            );

                            $respuesta=ModeloVentas::nuevoDetVenta($datos);
                            $i=$i+1;
                        }


                        echo '<script>
                            mensaje ="¡La venta ha sido guardado correctamente!"
                            modulo = "ventas"
                            guardadoExitoso(mensaje,modulo);  
                        </script>'; 
                        return;
                    }    
                }else{
                    echo '<script>
                        mensaje = "No se logró registrar la venta"
                        datosNoValidos(mensaje);
                    </script>';              
                }
            }
        }

        
        static public function listarVentas($item, $valor){
            $respuesta = ModeloVentas::mostrarVentas($item, $valor);
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