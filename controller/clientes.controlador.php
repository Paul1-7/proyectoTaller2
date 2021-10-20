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
        
        
        static public function modificarCategoria(){
            if(isset($_POST["nombreCatEdit"])){

                $nombre =$_POST["nombreCatEdit"];
                $desc = $_POST["descCatEdit"];
                $id = $_POST["idCatActual"];

                if(isset($_POST["estadoClEdit"]) && $_POST["estadoClEdit"]==1)
                    $estado = $_POST["estadoClEdit"];
                else
                    $estado = 0;

                if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $nombre) &&
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$desc) &&
                    preg_match('/^[0-1]+$/',$estado)){

                        $datos = array( "id_cat" =>$id,
                                        "nombre_cat" => $nombre,
                                        "desc_cat"=> $desc,
                                        "estado_cat" => $estado,
                                        ); 

                    $respuesta = ModeloCategorias::modificarCategoria($datos);
                   
                    if($respuesta == "ok"){

                        echo '<script>
                            guardadoExitoso("¡La categoria ha sido guardada correctamente!","categorias");
                            
                        </script>';
                    }
                }else{
    
                    echo'<script>
                         datosNoValidos("No se logró modificar la categoria");
                      </script>';
                }
            }
            
        }
    
        static public function borrarCategoria(){

            if(isset($_GET["idCat"])){
    
                
                $datos = $_GET["idCat"];
    
                $respuesta = ModeloCategorias::borrarCategoria($datos);
    
                if($respuesta == "ok"){
    
                    echo'<script>
                            borradoExitoso("¡La categoria se borro correctamente!","categorias")
                        </script>';
                }else{
                    echo'<script>
                            borradoSinExito("¡No se logro borrar la categoria seleccionada!","categorias")
                        </script>';
                }
            }
            
        }
        
    }