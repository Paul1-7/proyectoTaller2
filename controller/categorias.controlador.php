<?php
    class ControladorCategorias{

        static public function nuevaCategoria(){ 

            if(isset($_POST["nombreCat"])){

                $nombre =$_POST["nombreCat"];
                $desc = $_POST["descCat"];

                if(isset($_POST["estadoCat"]))
                    $estado = $_POST["estadoCat"];
                else
                    $estado = 0;

                if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $nombre) &&
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$desc) &&
                    preg_match('/^[0-1]+$/',$estado)){

                        $datos = array("nombre_cat" => $nombre,
                                        "desc_cat"=> $desc,
                                        "estado_cat" => $estado,
                                        );

                        $valNombre = ModeloCategorias::mostrarCategorias("nombre_cat",$nombre);
                        if($valNombre!=false){
                            echo'<script>
                                var mensaje = "¡El nombre de la categoria ya se encuentra registrado!";
                                datosNoValidos(mensaje);
                            </script>';
                        }else{                  
                            $respuesta = ModeloCategorias::nuevaCategoria($datos);
                            if($respuesta == "ok"){
                                echo '<script>
                                    var mensaje = "¡La categoria ha sido guardada correctamente!"
                                    var modulo =   "categorias"
                                    guardadoExitoso(mensaje,modulo);  
                                </script>'; 
                            }
                        }
                }else{
                    echo '<script>
                        var mensaje = "No se logró registrar la categoria"
                        datosNoValidos(mensaje);
					</script>';              
                }
            }
        }

        
        static public function listarCategorias($item, $valor){
            $respuesta = ModeloCategorias::mostrarCategorias($item, $valor);
            return $respuesta;
        }
        
        
        static public function modificarCategoria(){
            if(isset($_POST["nombreCatEdit"])){

                $nombre =$_POST["nombreCatEdit"];
                $desc = $_POST["descCatEdit"];
                $id = $_POST["idCatActual"];
                $nombreActual = $_POST["nombreCatActual"];

                if(isset($_POST["estadoCatEdit"]) && $_POST["estadoCatEdit"]==1)
                    $estado = $_POST["estadoCatEdit"];
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

                    

                    $valNombre = ModeloCategorias::mostrarCategorias("nombre_cat",$nombre);
                    $respuesta = "error";
                    if($valNombre!=false){
                        if($nombreActual == $valNombre["nombre_cat"]){
                            $respuesta = ModeloCategorias::modificarCategoria($datos);
                        }
                        echo'<script>
                            var mensaje = "¡El nombre de la categoria ya se encuentra registrado!";
                            datosNoValidos(mensaje);
                        </script>';
                    }else{
                        $respuesta = ModeloCategorias::modificarCategoria($datos);
                    }

                    if($respuesta == "ok"){
    
                        echo '<script>
                            var mensaje = "¡La categoria ha sido guardada correctamente!"
                            var modulo = "categorias"
                            guardadoExitoso(mensaje,modulo);
                            
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
    
                
                $id = $_GET["idCat"];
                
                //verifica su integridad referencial
                $valBorrado = ModeloProductos::mostrarProductos("categoriasid_cat",$id);
                if($valBorrado!=false){
                    echo'<script>
                                var mensaje = "¡La categoria no se puede borrar porque otros registros la utilizan!"
                                borradoErrorIntegridad(mensaje)
                            </script>';
                }
                else{
                    $respuesta = ModeloCategorias::borrarCategoria($id);
        
                    if($respuesta == "ok"){
        
                        echo'<script>
                                var mensaje = "¡La categoria se borro correctamente!"
                                var modulo = "categorias"
                                borradoExitoso(mensaje,modulo)
                            </script>';
                    }else{
                        echo'<script>
                                var mensaje = "¡No se logro borrar la categoria seleccionada!"
                                borradoSinExito(mensaje)
                            </script>';
                    }
                }
            }
            
        }
        
    }