<?php
    class ControladorClientes{

        static public function nuevoCliente(){ 

            if(isset($_POST["nombreCl"])){

                $nombre =$_POST["nombreCl"];
                $apellido =$_POST["apellidoCl"];
                $ci =$_POST["ciCl"];
                $tel =$_POST["telCl"];
                $direccion =$_POST["direccionCl"];

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

                        $datos = array("nombres_cl" => $nombre,
                                        "apellidos_cl"=> $apellido,
                                        "ci_cl"=> $ci,
                                        "tel_cl"=> $tel,
                                        "direccion_cl"=> $direccion,
                                        "estado_cl" => $estado);
                      $respuesta = ModeloClientes::nuevoCliente($datos);

                        if($respuesta == "ok"){
                            echo '<script>
                                mensaje ="¡El cliente ha sido guardado correctamente!"
                                modulo = "clientes"
                                guardadoExitoso(mensaje,modulo);  
                            </script>'; 
                        }
                }else{
                    echo '<script>
                        mensaje = "No se logró registrar la categoria"
                        datosNoValidos(mensaje);
					</script>';              
                }
            }
        }

        
        static public function listarClientes($item, $valor){
            $respuesta = ModeloClientes::mostrarClientes($item, $valor);
            return $respuesta;
        }
        
        
        static public function modificarCliente(){
            if(isset($_POST["nombreCl"])){

                $nombre =$_POST["nombreCl"];
                $apellido =$_POST["apellidoCl"];
                $ci =$_POST["ciCl"];
                $tel =$_POST["telCl"];
                $direccion =$_POST["direccionCl"];
                $id = $_POST["idClActual"];

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

                    $respuesta = ModeloClientes::modificarCliente($datos);
                   
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