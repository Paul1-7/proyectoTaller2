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
                                            <h4 class="text-center">Datos de la venta</h4>
                                        </div>
                                        <div class="card-block">
                                            <form role="form" method="post">
                                                <div class="row">
                                                    <label class="col-sm-8 col-lg-3 col-form-label">Vendedor:</label>
                                                    <div class="col-sm-12 col-lg-9">
                                                        <div class=" row">
                                                            <div class="col-lg-1"></div>
                                                            <div class="input-group input-group-inverse col-lg-11">
                                                                <input class="form-control input-md" type="text" name="nombresUser" value="<?php echo  $_SESSION["nombre"].' '. $_SESSION["apellido"]; ?>" readonly>
                                                                <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont icofont-user-alt-4"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-8 col-lg-3 col-form-label">Fecha:</label>
                                                    <div class="col-sm-12 col-lg-9">
                                                        <div class=" row">
                                                            <div class="col-lg-1"></div>
                                                            <div class="input-group input-group-inverse col-lg-11">
                                                                <input class="form-control input-md" type="text" name="nombresUser" value="fecha actual" readonly>
                                                                <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-clock-time"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-8 col-lg-3 col-form-label">Cliente:</label>
                                                    <div class="col-sm-12 col-lg-9">
                                                        <div class="input-group input-group-inverse">
                                                            <button type="button" class="btn btn-danger " style="height:40px; width: 40px; padding: 0px;" >
                                                                <i class="icofont-close icofont-2x" style="margin-left: auto; margin-right: auto;"></i>
                                                            </button>
                                                            <input class="form-control input-md" type="text" name="nombresUser" value="seleccione un cliente" readonly>
                                                            <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont icofont-user-alt-4"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- entrada de productos -->
                                                <div class="row">
                                                    <div class="col-1 input-group input-group-inverse">
                                                        <button type="button" class="btn btn-danger " style="height:40px; width: 45px; padding: 0px;" >
                                                            <i class="icofont-close icofont-2x" style="margin-left: auto; margin-right: auto;"></i>
                                                        </button>
                                                        <!-- <input class="form-control input-md" style="margin-left: 0.5em;" type="text" name="nombresUser" value="producto" readonly>
                                                        <input class="form-control input-sm" style="margin-left: 0.5em; width: 0.5em;" type="number" min="1" name="nombresUser" value="">
                                                        <input class="form-control input-md" style="margin-left: 0.5em;" type="text" name="nombresUser" value="subtotal" readonly> -->
                                                    </div>
                                                    <div class="col-lg-6 input-group input-group-inverse" style="padding: 0px 0px 0px 5px;">
                                                        <input class="form-control input-lg" type="text" name="nombresUser" value="producto" readonly>
                                                    </div>
                                                    <div class="col-lg-2 input-group input-group-inverse" style="padding: 0px 0px 0px 5px;">
                                                        <input class="form-control input-md" type="number" name="nombresUser" value="" min="1" >
                                                    </div>
                                                    <div class="col-lg-2 input-group input-group-inverse" style="padding: 0px 0px 0px 5px;">
                                                        <input class="form-control input-md" type="text" name="nombresUser" value="precio" readonly>                                                      
                                                    </div>              
                                                   
                                                </div>
                                                <!-- entrada para impuestos y total -->
                                                <div class="row ">
                                                    <div class="col-lg-4"></div>
                                                    <div class="col-lg-8 "> 
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Total</th>      
                                                                </tr>
                                                            </thead>
                                                            <tbody>                                                 
                                                                <tr>  
                                                                    <td >
                                                                        <div class="input-group input-group-inverse">
                                                                            <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" readonly required>
                                                                            <span class="input-group-addon">Bs.</span>
                                                                            <input type="hidden" name="totalVenta" id="totalVenta">
                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <button type="button" style="margin-left: 191.875px;" class="btn btn-danger btn-md">Cancelar</button>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <button type="submit" style="margin-right: 191.875px;" class="btn btn-primary btn-md ">Guardar</button>
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
                                                    <h4 class="text-center">Seleccione el cliente</h4>
                                                    <table id="simpletable" class="table table-striped table-bordered nowrap tabla-seleccion-cliente  enum">
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
                                                                                            Agregar
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
                                                <div class="card-block">
                                                    <h4 class="text-center">Seleccione los productos</h4>
                                                    <table id="simpletable" class="table table-striped table-bordered nowrap tabla-seleccion-productos enum">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Imagen</th>
                                                                <th>Producto</th>
                                                                <th>Stock</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $item = null;
                                                                $valor = null;
                                                                
                                                                $productos = ControladorProductos::listarProductos($item, $valor);
        
                                                                foreach ($productos as $key => $value){
                        
                                                                    echo ' <tr>
                                                                            <td></td>
                                                                            <td><img src="'.$value["imagen_prod"].'" alt="img del producto" class="img-thumbnail" width="35px"></td>
                                                                            <td>'.$value["nombre_prod"].'</td>
                                                                            <td>'.$value["stock_prod"].'</td>';
        
                                                                            echo '
                                                                                <td style="width:100px">
                                                                                    
                                                                                        <button type="button" class="btn btn-primary "  >
                                                                                            Agregar
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