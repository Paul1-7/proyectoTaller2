<?php
    class ControladorDosificacionFacturas{

        
        
        static public function mostrarDosificacionFacturas($item, $valor){
            $respuesta = ModeloDosificacionFacturas::mostrarDosificacionFacturas($item, $valor);
            return $respuesta;
        }
        
        
        static public function modificarDosificacionFacturas(){
            if(isset($_POST["numAutorizacion"])){

                $numAutorizacion =$_POST["numAutorizacion"];
                $numFacturaInicial = $_POST["numFactInicial"];
                $llaveDosificacion = $_POST["llaveDosificacion"];
                $fechaEmision = $_POST["FechaLimiteEmision"];
                $id = 1;
                
            
                if(preg_match('/^[0-9]+$/', $numAutorizacion) &&
                    preg_match('/^[0-9]+$/',$numFacturaInicial) &&
                    preg_match('/^[a-zA-Z0-9]+$/',$llaveDosificacion)){

                        $datos = array( "id_dosificacion" =>$id,
                                        "num_autorizacion" => $numAutorizacion,
                                        "num_fact_inicial"=> $numFacturaInicial,
                                        "llave_dosificacion" => $llaveDosificacion,
                                        "fecha_lim_emision" => $fechaEmision,
                                        ); 

                    $respuesta = "error";
                    
                    $respuesta = ModeloDosificacionFacturas::modificarDosificacionFacturas($datos);
                    
                    if($respuesta == "ok"){
    
                        echo '<script>
                            var mensaje = "¡Los parametros han sido guardado correctamente!"
                            var modulo = "dosificacion-facturas"
                            guardadoExitoso(mensaje,modulo);
                            
                        </script>';
                    }

                }else{
    
                    echo'<script>
                         datosNoValidos("No se logró modificar los parametros de control");
                      </script>';
                }
            }
            
        }
    
        
    }