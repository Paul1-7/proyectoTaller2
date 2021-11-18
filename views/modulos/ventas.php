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
                                    <h3>ventas</h3>
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
                                    
                                    <li class="breadcrumb-item"><a href="#!">ventas</a>
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
                            <div class="card-header">
                                <a href="nueva-venta">
                                    <button type="button" class="btn btn-inverse btn-outline-default waves-effect md-trigger btnNuevoUser" data-modal="modalNuevoCliente" >
                                        <i class="icofont-cart"></i> Nueva venta
                                    </button>
                                </a>
                                
                            </div>
                            <div class="card-block">
                                
                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap tablas enum">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th style="width: 25px;">Codigo de factura</th>
                                                <th>Cliente</th>
                                                <th>Vendedor</th>
                                                <th>Fecha de venta</th>
                                                <th>total</th>
                                                <th>acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $item = null;
                                                $valor = null;
                                        
                                                $clientes = ControladorVentas::listarVentas($item, $valor);

                                                foreach ($clientes as $key => $value){
        
                                                    echo ' <tr>
                                                            <td></td>
                                                            <td>'.$value["id_venta"].'</td>
                                                            <td>'.$value["cliente"].'</td>
                                                            <td>'.$value["vendedor"].'</td>
                                                            <td>'.$value["fecha_venta"].'</td>
                                                            <td>'.$value["total_venta"].' Bs.</td>';
                                                            
                                                            
                                                            echo '
                                                                <td style="width:100px">
                                                                        <a href="index.php?ruta=detalle-venta&idventa='.$value["id_venta"].'"  >
                                                                            <button class="btn btn-primary btn-icon ">
                                                                                <i class="icofont-papers""></i>
                                                                            </button>
                                                                        </a>
                                                                        <button type="button" class="btn btn-success btn-icon " idVenta="'.$value["id_venta"].'" >
                                                                            <i class="icofont-download"></i>
                                                                        </button>
                                                                        
                                                                        <a href="detalle-venta"  idVenta="'.$value["id_venta"].'" >
                                                                            <button class="btn btn-warning btn-icon ">
                                                                                <i class="icofont icofont-pen-alt-4"></i>
                                                                            </button>
                                                                        </a>
                                                                </td>
                                                        </tr>';
                                                }
                                            ?>
                                        </tbody><a href="" ></a>
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