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
                      $respuesta = ModeloCategorias::nuevaCategoria($datos);

                        if($respuesta == "ok"){
                            echo '<script>
                                guardadoExitoso("¡La categoria ha sido guardada correctamente!","categorias");  
                            </script>'; 
                        }
                }else{
                    echo '<script>
                        datosNoValidos("No se logró registrar la categoria");
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