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
                                                <th>Nombre</th>
                                                <th>apellido</th>
                                                <th>C.I.</th>
                                                <th>telefono</th>
                                                <th>direccion</th>
                                                <th>estado</th>
                                                <th>fecha</th>
                                                <th>acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $item = null;
                                                $valor = null;
                                        
                                                $clientes = ControladorClientes::listarClientes($item, $valor);

                                                foreach ($clientes as $key => $value){
        
                                                    echo ' <tr>
                                                            <td></td>
                                                            <td>'.$value["nombres_cl"].'</td>
                                                            <td>'.$value["apellidos_cl"].'</td>
                                                            <td>'.$value["ci_cl"].'</td>
                                                            <td>'.$value["tel_cl"].'</td>
                                                            <td>'.$value["direccion_cl"].'</td>
                                                            <td>'.$value["fecha_cl"].'</td>';
                                                            
                                                            
                                                            if($value["estado_cl"] != 0)
                                                                echo '<td style="width:120px"><label class="badge badge-md badge-success" >Habilitado</label></td>';
                                                            else
                                                                echo '<td style="width:120px"><label class="badge badge-md badge-warning" >Deshabilitado</label></td>';
                                                            
                                                            echo '
                                                                <td style="width:100px">
                                                                    
                                                                        <button type="button" class="btn btn-primary btn-icon  btn-outline-default waves-effect md-trigger btnModificarCl" idCl="'.$value["id_cliente"].'" data-modal="modalModificarCliente"  >
                                                                            <i class="icofont icofont-pen-alt-4"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger btn-icon   btnEliminarCl" idCl="'.$value["id_cliente"].'" >
                                                                            <i class="icofont-ui-delete"></i>
                                                                        </button>
                                                                </td>
                                                        </tr>';
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