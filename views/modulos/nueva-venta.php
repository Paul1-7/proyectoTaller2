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
                                    <h3>Nueva venta</h3>
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
                                    
                                    <li class="breadcrumb-item"><a href="ventas">ventas</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">nueva venta</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row ">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header">
                                            Datos de la venta
                                        </div>
                                        <div class="card-block">
                                            <form role="form" method="post">
                                                <div class="row">
                                                    <label class="col-sm-8 col-lg-2 col-form-label">Nombres:</label>
                                                    <div class="col-sm-12 col-lg-10">
                                                        <div class="input-group input-group-inverse">
                                                            <input class="form-control input-md" type="text" name="nombresUser" value="$_SESSION[]" readonly>
                                                            <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont icofont-user-alt-4"></i></span>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row ">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-block">
                                                    <table id="simpletable" class="table table-striped table-bordered nowrap tablas enum">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Nombre</th>
                                                                <th>Apellido</th>
                                                                <th>C.I.</th>
                                                                <th>Acción</th>
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
                                                                            <td>'.$value["ci_cl"].'</td>';
        
                                                                            echo '
                                                                                <td style="width:100px">
                                                                                    
                                                                                        <button type="button" class="btn btn-primary "  >
                                                                                            agregar
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
                                    <div class="row">
                                        <div class="col">
                                            <div class="card">
                                                lista de productos
                                                <div class="card-block">
                                                    <table id="simpletable" class="table table-striped table-bordered nowrap tablas enum">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Nombre</th>
                                                                <th>Apellido</th>
                                                                <th>C.I.</th>
                                                                <th>Acción</th>
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
                                                                            <td>'.$value["ci_cl"].'</td>';
        
                                                                            echo '
                                                                                <td style="width:100px">
                                                                                    
                                                                                        <button type="button" class="btn btn-primary "  >
                                                                                            agregar
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
            </div>
            

 
        </div>
    </div>
</div>