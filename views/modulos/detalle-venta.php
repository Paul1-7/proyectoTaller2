<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h3>Detalle de la venta</h3>
                                    <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="ventas">ventas</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#!">detalle venta</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="card" >
                            <?php
                                $idVenta= $_GET["idventa"];
                                $item="id_venta";
                                //$datosVenta = ControladorVentas::listarVentas($item,$idVenta);
                                $detalleVenta = ControladorVentas::listarDetalleVentas($idVenta);
                            ?>
                            <div class="card-block">
                                <div class="row " style="margin: 1em 1.5em 0.5em 1.5em">
                                    <div class="col-lg-4 "><strong>número de factura:</strong><span><?php echo ' '.$idVenta?></span></div>
                                    <div class="col-lg-4"><strong>venta registrada por:</strong><span><?php echo ' '.$detalleVenta[0]["nombre"].' '.$detalleVenta[0]["apellido"]?></span></div>
                                    <div class="col-lg-4"><strong>cliente:</strong><span><?php echo ' '.$detalleVenta[0]["nombres_cl"].' '.$detalleVenta[0]["apellidos_cl"]?></span></div>
                                </div>
                                <div class="row" style="margin:0em 1.5em 1em 1.5em">
                                    <div class="col-lg-4 "><strong>fecha:</strong><span><?php echo ' '.$detalleVenta[0]["fecha_venta"]?></span></div>
                                    <div class="col-lg-4"><strong>teléfono:</strong><span><?php echo ' '.$detalleVenta[0]["tel_cl"]?></span></div>
                                    <div class="col-lg-4"><strong>dirección:</strong><span><?php echo ' '.$detalleVenta[0]["direccion_cl"]?></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-3 ml-md-auto">
                                        <button type="button" class="btn btn-inverse btn-outline-default waves-effect md-trigger btnNuevoUser" data-modal="modalNuevoCliente" >
                                            <i class="icofont-download"></i> Descargar factura
                                        </button>
                                        <a href="">
                                            <button type="button" class="btn btn-inverse btn-outline-default waves-effect md-trigger btnNuevoUser" data-modal="modalNuevoCliente" >
                                                <i class="icofont icofont-pen-alt-4"></i> Modificar
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 2em;">
                                    <div class="col-lg-11  col-md-4 m-auto">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap tabla-seleccion-productos enum">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th width="45px">Imagen</th>
                                                        <th>Producto</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio unitario</th>
                                                        <th>subtotal</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        
                                                        
                                                        $total=0;
                                                        foreach ($detalleVenta as $key => $value){
                                                            
                                                            echo ' <tr>
                                                                    <td></td>
                                                                    <td><img src="'.$value["imagen_prod"].'" class="img-thumbnail" width="30px"></td>
                                                                    <td>'.$value["nombre_prod"].'</td>
                                                                    <td>'.$value["cantidad_det_venta"].'</td>
                                                                    <td>'.$value["precio_venta"].' Bs.</td>
                                                                    <td>'.$value["subtotal_det_venta"].' Bs.</td>
                                                                </tr>';

                                                            $total = $total + $value["subtotal_det_venta"];
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>  
                             
                        </div>
                        
                    </div>
                        
                
                </div>
            </div>
            

 
        </div>
    </div>
</div>