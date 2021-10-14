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
                      $respuesta = ModeloMarcas::nuevaMarca($datos);

                        if($respuesta == "ok"){
                            echo '<script>
                                guardadoExitoso("¡La marca ha sido guardada correctamente!","marcas");  
                            </script>'; 
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

                    $respuesta = ModeloMarcas::modificarMarca($datos);
                   
                    if($respuesta == "ok"){
                        echo '<script>
                            guardadoExitoso("¡La marca ha sido guardada correctamente!","marcas");
                            
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
    
                
                $datos = $_GET["idMarca"];
    
                $respuesta = ModeloMarcas::borrarMarca($datos);
    
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