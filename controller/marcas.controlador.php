<?php
    class ControladorMarcas{

        static public function nuevaMarca(){ 

            if(isset($_POST["nombreMarca"])){

                $nombre =$_POST["nombreMarca"];
               
                if(isset($_POST["estadoMarca"]))
                    $estado = $_POST["estadoMarca"];
                else
                    $estado = 0;

                if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $nombre) &&
                    preg_match('/^[0-1]+$/',$estado)){

                        $datos = array("nombre_marca" => $nombre,
                                        "estado_marca" => $estado,
                                        );

                    $valNombre = ModeloMarcas::mostrarMarcas("nombre_marca",$nombre);
                    if($valNombre!=false){
                        echo'<script>
                            var mensaje = "¡El nombre de la marca ya se encuentra registrado!";
                            datosNoValidos(mensaje);
                        </script>';
                    }else{
                      $respuesta = ModeloMarcas::nuevaMarca($datos);

                        if($respuesta == "ok"){
                            echo '<script>
                                guardadoExitoso("¡La marca ha sido guardada correctamente!","marcas");  
                            </script>'; 
                        }
                    }
                }else{
                    echo '<script>
                        datosNoValidos("No se logró registrar la marca");
					</script>';              
                }
            }
        }

        
        static public function listarMarcas($item, $valor){
            $respuesta = ModeloMarcas::mostrarMarcas($item, $valor);
            return $respuesta;
        }
        
        
        static public function modificarMarca(){
            if(isset($_POST["nombreMarcaEdit"])){

                $nombre =$_POST["nombreMarcaEdit"];
                $id = $_POST["idMarcaActual"];
                $nombreActual  = $_POST["nombreActual"];

                if(isset($_POST["estadoMarcaEdit"]) && $_POST["estadoMarcaEdit"]==1)
                    $estado = $_POST["estadoMarcaEdit"];
                else
                    $estado = 0;

                if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $nombre) &&
                    preg_match('/^[0-1]+$/',$estado)){

                        $datos = array( "id_marca" =>$id,
                                        "nombre_marca" => $nombre,
                                        "estado_marca" => $estado,
                                        ); 

                        $valNombre = ModeloMarcas::mostrarMarcas("nombre_marca",$nombre);
                        $respuesta = "error";
                        if($valNombre!=false){
                            if($nombreActual == $valNombre["nombre_marca"]){
                                $respuesta = ModeloMarcas::modificarMarca($datos);
                            }
                            else{
                                echo'<script>
                                    var mensaje = "¡El nombre de la marca ya se encuentra registrado!";
                                    datosNoValidos(mensaje);
                                </script>';
                            }
                        }else{
                            $respuesta = ModeloMarcas::modificarMarca($datos);   
                        }

                        if($respuesta == "ok"){
                            echo '<script>
                                var mensaje ="¡La marca ha sido guardada correctamente!"
                                var modulos = "marcas"
                                guardadoExitoso(mensaje,modulos);    
                            </script>';
                        }
                }else{
    
                    echo'<script>
                         datosNoValidos("No se logró modificar la marca");
                      </script>';
                }
            }
            
        }
    
        static public function borrarMarca(){

            if(isset($_GET["idMarca"])){
    
                
                $id = $_GET["idMarca"];
    

                //verifica su integridad referencial
                $valBorrado = ModeloProductos::mostrarProductos("marcasid_marca",$id);
                if($valBorrado!=false){
                    echo'<script>
                                var mensaje = "¡La marca no se puede borrar porque otros registros la utilizan!"
                                borradoErrorIntegridad(mensaje)
                            </script>';
                }
                else{
                    $respuesta = ModeloMarcas::borrarMarca($id);
        
                    if($respuesta == "ok"){
        
                        echo'<script>
                                borradoExitoso("¡La marca se borro correctamente!","marcas")
                            </script>';
                    }else{
                        echo'<script>
                                borradoSinExito("¡No se logro borrar la marca seleccionada!","marcas")
                            </script>';
                    }
                }
            }
            
        }
        
    }