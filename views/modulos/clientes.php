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
                                    <h3>Clientes</h3>
                                    <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard"> <i class="feather icon-home"></i> </a>
                                    
                                    <li class="breadcrumb-item"><a href="#!">Clientes</a>
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
                                <div class="animation-model">
                                    <button type="button" class="btn btn-inverse btn-outline-default waves-effect md-trigger btnNuevoUser" data-modal="modalNuevoCliente" >
                                        <i class="icofont-users-alt-4"></i> Nuevo cliente
                                    </button>
                                    <!-- modal -->
                                    <div class="md-modal md-effect-1" id="modalNuevoCliente">
                                        <form role="form" method="POST">
                                            <div class="md-content" >

                                                <h3 style="background-color:#404e67 !important;">Nuevo cliente</h3>
                                                <div >
                                                    <div class="row">
                                                        <label class="col-sm-8 col-lg-2 col-form-label">Nombre:</label>
                                                        <div class="col-sm-12 col-lg-10">
                                                            <div class="input-group input-group-inverse">
                                                                <input class="form-control input-md " type="text" name="nombreCl"  placeholder="Ingresar nombre del cliente" required>
                                                                <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-user-alt-3"></i></span>
                                                            </div>
                                                        </div>      
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-8 col-lg-2 col-form-label">Apellido:</label>
                                                        <div class="col-sm-12 col-lg-10">
                                                            <div class="input-group input-group-inverse">
                                                                <input class="form-control input-md " type="text" name="apellidoCl"  placeholder="Ingresar apellido del cliente" required>
                                                                <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-user-alt-3"></i></span>
                                                            </div>
                                                        </div>      
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-8 col-lg-2 col-form-label">Carnet de identidad:</label>
                                                        <div class="col-sm-12 col-lg-10">
                                                            <div class="input-group input-group-inverse">
                                                                <input class="form-control input-md valCiCl" type="text" name="ciCl"  placeholder="Ingresar  C.I. del cliente" required>
                                                                <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-id-card"></i></span>
                                                            </div>
                                                        </div>      
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-8 col-lg-2 col-form-label">Telefono:</label>
                                                        <div class="col-sm-12 col-lg-10">
                                                            <div class="input-group input-group-inverse">
                                                                <input class="form-control input-md " type="text" name="telCl"  placeholder="Ingresar telefono del cliente">
                                                                <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-phone"></i></span>
                                                            </div>
                                                        </div>      
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-8 col-lg-2 col-form-label">Direccion:</label>
                                                        <div class="col-sm-12 col-lg-10">
                                                            <div class="input-group input-group-inverse">
                                                                <input class="form-control input-md " type="text" name="direccionCl"  placeholder="Ingresar direccion cliente" required>
                                                                <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-map"></i></span>
                                                            </div>
                                                        </div>      
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-8 col-lg-2 col-form-label">estado:</label>
                                                        <div class="col-md-auto">
                                                            
                                                            <select name="estadoCl" class="form-control form-control-inverse">
                                                                <option value="-1">Seleciona un estado </option>
                                                                <option value="1">Habilitado </option>
                                                                <option value="0">Deshabilitado </option>
                                                            </select>
                                                        </div>      
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" style="margin-left: 191.875px;" class="btn btn-danger btn-lg waves-effect md-close">Cancelar</button>
                                                        <button type="submit" style="margin-right: 191.875px;" class="btn btn-primary btn-lg waves-effect md-close">Guardar</button>
                                                    <?php
                                                        $nuevoCliente = new ControladorClientes();
                                                        $nuevoCliente -> nuevoCliente();
                                                    ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                    <div class="md-overlay"></div>
                                </div>
                            </div>
                            <div class="card-block">
                                
                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap tablas enum">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>C.I.</th>
                                                <th>Telefono</th>
                                                <th>Direccion</th>
                                                <th>Fecha</th>
                                                <th>Estado</th>
                                                <th>acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div class="animation-model">
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
                                                <!-- formulario para modificar -->
                                                <!-- modal -->
                                                <div class="md-modal md-effect-1" id="modalModificarCliente">
                                                    <form role="form" method="POST">
                                                        <div class="md-content" >

                                                            <h3 style="background-color:#404e67 !important;">Modificar cliente</h3>
                                                            <div >
                                                                <div class="row">
                                                                    <label class="col-sm-8 col-lg-2 col-form-label">Nombre:</label>
                                                                    <div class="col-sm-12 col-lg-10">
                                                                        <div class="input-group input-group-inverse">
                                                                            <input class="form-control input-md " type="text" name="nombreEditCl" id="nombreEditCl"  placeholder="Ingresar nombre del cliente" required>
                                                                            <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-user-alt-3"></i></span>
                                                                        </div>
                                                                    </div>      
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-8 col-lg-2 col-form-label">Apellido:</label>
                                                                    <div class="col-sm-12 col-lg-10">
                                                                        <div class="input-group input-group-inverse">
                                                                            <input class="form-control input-md " type="text" name="apellidoCl" id="apellidoCl"  placeholder="Ingresar apellido del cliente" required>
                                                                            <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-user-alt-3"></i></span>
                                                                        </div>
                                                                    </div>      
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-8 col-lg-2 col-form-label">Carnet de identidad:</label>
                                                                    <div class="col-sm-12 col-lg-10">
                                                                        <div class="input-group input-group-inverse">
                                                                            <input type="hidden" name="ClActual" id="ClActual" value="">
                                                                            <input class="form-control input-md valCiCl" type="text" name="ciCl" id="ciCl" placeholder="Ingresar  C.I. del cliente" required>
                                                                            <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-id-card"></i></span>
                                                                        </div>
                                                                    </div>      
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-8 col-lg-2 col-form-label">Telefono:</label>
                                                                    <div class="col-sm-12 col-lg-10">
                                                                        <div class="input-group input-group-inverse">
                                                                            <input class="form-control input-md " type="text" name="telCl" id="telCl" placeholder="Ingresar telefono del cliente">
                                                                            <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-phone"></i></span>
                                                                        </div>
                                                                    </div>      
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-8 col-lg-2 col-form-label">Direccion:</label>
                                                                    <div class="col-sm-12 col-lg-10">
                                                                        <div class="input-group input-group-inverse">
                                                                            <input class="form-control input-md " type="text" name="direccionCl"  id="direccionCl" placeholder="Ingresar direccion cliente" required>
                                                                            <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-map"></i></span>
                                                                        </div>
                                                                    </div>      
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-8 col-lg-2 col-form-label">estado:</label>
                                                                    <div class="col-md-auto">
                                                                        
                                                                        <select  name="estadoCl" id="estadoCl" class="form-control form-control-inverse">
                                                                            <option value="-1">Seleciona un estado </option>
                                                                            <option value="1">Habilitado </option>
                                                                            <option value="0">Deshabilitado </option>
                                                                        </select>
                                                                    </div>      
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="hidden" name="idClActual" id="idClActual" value="">
                                                                    <button type="button" style="margin-left: 191.875px;" class="btn btn-danger btn-lg waves-effect md-close">Cancelar</button>
                                                                    <button type="submit" style="margin-right: 191.875px;" class="btn btn-primary btn-lg waves-effect md-close">Guardar</button>
                                                                <?php
                                                                    $modificarCliente = new ControladorClientes();
                                                                    $modificarCliente -> modificarCliente();
                                                                ?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="md-overlay"></div>
                                            </div>
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
<?php

$borrarCliente = new ControladorClientes();
$borrarCliente -> borrarCliente();
?>