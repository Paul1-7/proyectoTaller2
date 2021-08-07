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
                                    <h3>Administrar productos</h3>
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
                                    
                                    <li class="breadcrumb-item"><a href="#!">Productos</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Administrar productos</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- cuerpo de la pagina -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="animation-model">
                                    <button type="button" class="btn btn-inverse btn-outline-default waves-effect md-trigger btnNuevoUser" data-modal="modalRegistrarProducto" >
                                        <i class="icofont icofont-price"></i> Nuevo producto
                                    </button>
                                    <!-- modal -->
                                    <div class="md-modal md-effect-1" id="modalRegistrarProducto">
                                        <form role="form" method="POST" enctype="multipart/form-data">
                                            <div class="md-content" >

                                                <h3 style="background-color:#404e67 !important;">Nuevo producto</h3>
                                                <div >
                                                    <div class="row">
                                                        <label class="col-sm-8 col-lg-2 col-form-label">Nombre:</label>
                                                        <div class="col-sm-12 col-lg-10" style="padding-left: 0%;">
                                                            <div class="input-group input-group-inverse">
                                                                <input class="form-control input-md valNombreProd" type="text" name="nombreProd" placeholder="Ingresar nombre del producto" required>
                                                                <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-files-stack"></i></span>
                                                            </div>
                                                        </div>      
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-8 col-lg-2 col-form-label">Stock:</label>
                                                        <div class="col-sm-1 col-lg-4" style="padding-left: 0%;">
                                                                <div class="input-group input-group-inverse">
                                                                    <input class="form-control input-md " type="number" name="stockProd"  placeholder="Ingresar stock" require>
                                                                    <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-ui-calculator"></i></span>
                                                                    
                                                                </div>
                                                        </div>

                                                        <label class="col-sm-8 col-lg-2 col-form-label" style="padding-left:0%; padding-right:0px; padding-top:0; ">presentación <br> del producto:</label>
                                                        <div class="col-sm-1 col-lg-4" style="padding-left:0%;">
                                                                <select name="tipoUniProd" class="form-control form-control-inverse">
                                                                        <option value="-1">Selecciona una unidad </option>
                                                                        <option value="1">Unidad </option>
                                                                        <option value="2">kilo </option>
                                                                        <option value="3">Caja </option>
                                                                        <option value="4">Paquete</option>
                                                                </select>
                                                        </div>
                                                            
                                                    </div> 
                                                    <div class="row">
                                                        <label class="col-sm-8 col-lg-2 col-form-label">Categoria:</label>
                                                        <div class="col-sm-1 col-lg-4" style="padding-left: 0%;">
                                                                <div class="input-group input-group-inverse">
                                                                    <select id="catProd" name="catProd" class="form-control form-control-inverse">
                                                                        <option value="-1">Seleciona una categoria </option>
                                                                            <?php
                                                                                $item = null;
                                                                                $valor = null;
                                                                        
                                                                                $Categorias = ControladorCategorias::listarCategorias($item, $valor);

                                                                                foreach ($Categorias as $key => $value){
                                                                                    echo '<option value="'.$value["id_cat"].'">'.$value["nombre_cat"].'</option>';
                                                                                }
                                                                            ?>
                                                                    </select>
                                                                </div>
                                                        </div>

                                                        <label class="col-sm-8 col-lg-2 col-form-label" style="padding-left:0%; padding-right:0px">Marca:</label>
                                                        <div class="col-sm-1 col-lg-4" style="padding-left:0%;">
                                                                <div class="input-group input-group-inverse">
                                                                    <select id="marcaProd" name="marcaProd" class="form-control form-control-inverse">
                                                                        <option value="-1">Seleciona una marca </option>
                                                                            <?php
                                                                                $item = null;
                                                                                $valor = null;
                                                                                $Marcas = ControladorMarcas::listarMarcas($item, $valor);

                                                                                foreach ($Marcas as $key => $value){
                                                                                    echo '<option value="'.$value["id_marca"].'">'.$value["nombre_marca"].'</option>';
                                                                                }
                                                                            ?>
                                                                    </select>
                                                                </div>
                                                        </div>        
                                                    </div> 
                                                    <div class="row">
                                                        <label class="col-sm-8 col-lg-2 col-form-label" style="padding-top: 0px;">precio de venta:</label>
                                                        <div class="col-sm-1 col-lg-4" style="padding-left: 0%;">
                                                                <div class="input-group input-group-inverse">
                                                                    <input class="form-control input-md valUser" type="text" name="precioVentaProd" id="precioVentaProd" placeholder="0.00" require>
                                                                    <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-money-bag"></i></span>
                                                                    
                                                                </div>
                                                        </div>

                                                        <label class="col-sm-8 col-lg-2 col-form-label" style="padding-left:0%; padding-right:0px; padding-top:0px">precio de compra:</label>
                                                        <div class="col-sm-1 col-lg-4" style="padding-left:0%;">
                                                                <div class="input-group input-group-inverse">
                                                                    <input class="form-control input-md" type="text" name="precioCompraProd" id="precioCompraProd" placeholder="0.00" require>
                                                                    <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-money-bag"></i></span>
                                                                    
                                                                </div>
                                                        </div>
                                                            
                                                    </div> 
                                                   
                                                    <div class="row">
                                                        <label class="col-sm-8 col-lg-2 col-form-label  ml-md-auto" style="padding-left:0%; padding-right:0px">Estado:</label>
                                                        <div class="col-sm-1 col-lg-4" style="padding-left:0%;">
                                                                <div class="input-group input-group-inverse">
                                                                    <select name="estadoProd" id="estadoProd" class="form-control form-control-inverse">
                                                                        <option value="-1">Selecciona un estado</option>
                                                                        <option value="1">Habilitado</option>
                                                                        <option value="0">Deshabilitado</option>
                                                                    </select>
                                                                </div>
                                                        </div>
                                                            
                                                    </div> 
                                                    <label class="col-auto col-form-label" style="margin-left: 0px; padding-left: 0px;">Subir foto de producto:</label>
                                                    <div class="row">
                                                        
                                                        <div class="col-auto">
                                                                <div class="input-group input-group-inverse">
                                                                    <input type="file"  name="fotoProd" class="form-control fotoProd" >
                                                                </div>
                                                        </div>  
                                                            
                                                    </div>
                                                    <div class="col-sm-1 col-lg-6">
                                                                <div class="input-group input-group-inverse ">
                                                                    <img class="imag-thumbnail rounded-circle  previsualizarProd" style="border: 2px solid #404e67;" width="100px" height="100px" src="views\img\productos\producto_default.jpg" alt="foto de producto">
                                                                </div>
                                                        </div>
                                                    <div class="modal-footer">
                                                        <button type="button" style="margin-left: 191.875px;" class="btn btn-danger btn-lg waves-effect md-close">Cancelar</button>
                                                        <button type="submit" style="margin-right: 191.875px;" class="btn btn-primary btn-lg waves-effect md-close">Guardar</button>
                                                    <?php
                                                       $nuevoProducto = new ControladorProductos();
                                                       $nuevoProducto -> nuevoProducto();
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
                                                <th>Imagen</th>
                                                <th>Nombre</th>
                                                <th>Marca</th>
                                                <th>Categoria</th>
                                                <th>Precio de <br> compra</th>
                                                <th>Precio de <br>venta</th>
                                                <th>Stock</th>
                                                <th>Tipo de <br>unidad</th>
                                                <th>Fecha</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div class="animation-model">
                                                <?php
                                                    $item = null;
                                                    $valor = null;
                                            
                                                    $Productos = ControladorProductos::listarProductos($item, $valor);

                                                    foreach ($Productos as $key => $value){
            
                                                        echo ' <tr>
                                                                <td></td>
                                                                <td><img src="'.$value["imagen_prod"].'" class="img-thumbnail" width="45px"></td>
                                                                <td>'.$value["nombre_prod"].'</td>
                                                                <td>'.$value["nombre_marca"].'</td>
                                                                <td>'.$value["nombre_cat"].'</td>
                                                                <td>'.$value["precio_compra"].'</td>
                                                                <td>'.$value["precio_venta"].'</td>
                                                                <td>'.$value["stock_prod"].'</td>';

                                                                if($value["tipo_uni_prod"]== 1)
                                                                    echo '<td>Unidades</td>';
                                                                else if($value["tipo_uni_prod"]== 2)
                                                                    echo '<td>Kilos</td>';
                                                                else if($value["tipo_uni_prod"]== 3)
                                                                    echo '<td>Cajas</td>';
                                                                else if($value["tipo_uni_prod"]== 4)
                                                                    echo '<td>Paquetes</td>';    
                                                                
                                                                echo '<td>'.$value["fecha_prod"].'</td>';
                                                                if($value["estado_prod"] != 0)
                                                                    echo '<td><label class="badge badge-md badge-success" >Activo</label></td>';
                                                                else
                                                                    echo '<td><label class="badge badge-md badge-warning" >Inactivo</label></td>';
                                                                
                                                                echo '
                                                                    <td>
                                                                        
                                                                            <button type="button" class="btn btn-primary btn-icon  btn-outline-default waves-effect md-trigger btnEditarProd" idProd="'.$value["id_prod"].'" data-modal="modalModificarProducto"  >
                                                                                <i class="icofont icofont-pen-alt-4"></i>
                                                                            </button>
                                                                            <button type="button" class="btn btn-danger btn-icon   btnEliminarProd" idProd="'.$value["id_prod"].'"  imagen_prod="'.$value["imagen_prod"].'" >
                                                                                <i class="icofont-ui-delete"></i>
                                                                            </button>
                                                                    </td>
                                                            </tr>';
                                                    }
                                                ?>
                                                <!-- formulario para editar -->
                                                <!-- modal -->
                                                <div class="md-modal md-effect-1" id="modalModificarProducto">
                                                    <form role="form" method="POST" enctype="multipart/form-data">
                                                        <div class="md-content" >

                                                            <h3 style="background-color:#404e67 !important;">Modificar producto</h3>
                                                            <div >
                                                                <div class="row">
                                                                    <label class="col-sm-8 col-lg-2 col-form-label">Nombre:</label>
                                                                    <div class="col-sm-12 col-lg-10" style="padding-left: 0%;">
                                                                        <div class="input-group input-group-inverse">
                                                                            <input type="hidden" name="nombreActual" id="nombreActual" value="">
                                                                            <input class="form-control input-md valNombreProd" type="text" name="nombreProdEdit" id="nombreProdEdit"  value=""  placeholder="Ingresar nombre del producto" required>
                                                                            <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-files-stack"></i></span>
                                                                        </div>
                                                                    </div>      
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-8 col-lg-2 col-form-label">Stock:</label>
                                                                    <div class="col-sm-1 col-lg-4" style="padding-left: 0%;">
                                                                            <div class="input-group input-group-inverse">
                                                                                <input class="form-control input-md " type="number" name="stockProdEdit" id="stockProdEdit"  value="" placeholder="Ingresar stock" require>
                                                                                <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-ui-calculator"></i></span>
                                                                            </div>
                                                                    </div>

                                                                    <label class="col-sm-8 col-lg-2 col-form-label" style="padding-left:0%; padding-right:0px; padding-top:0; ">presentación <br> del producto:</label>
                                                                    <div class="col-sm-1 col-lg-4" style="padding-left:0%;">
                                                                            <select name="tipoUniProdEdit" id="tipoUniProdEdit" class="form-control form-control-inverse">
                                                                                    <option value="-1">Selecciona una unidad </option>
                                                                                    <option value="1">Unidad </option>
                                                                                    <option value="2">kilo </option>
                                                                                    <option value="3">Caja </option>
                                                                                    <option value="4">Paquete</option>
                                                                            </select>
                                                                    </div>
                                                                        
                                                                </div> 
                                                                <div class="row">
                                                                    <label class="col-sm-8 col-lg-2 col-form-label">Categoria:</label>
                                                                    <div class="col-sm-1 col-lg-4" style="padding-left: 0%;">
                                                                            <div class="input-group input-group-inverse">
                                                                                <select id="catProdEdit" name="catProdEdit"  class="form-control form-control-inverse">
                                                                                    <option value="-1">Seleciona una categoria </option>
                                                                                        <?php
                                                                                            $item = null;
                                                                                            $valor = null;
                                                                                    
                                                                                            $Categorias = ControladorCategorias::listarCategorias($item, $valor);

                                                                                            foreach ($Categorias as $key => $value){
                                                                                                echo '<option value="'.$value["id_cat"].'">'.$value["nombre_cat"].'</option>';
                                                                                            }
                                                                                        ?>
                                                                                </select>
                                                                            </div>
                                                                    </div>

                                                                    <label class="col-sm-8 col-lg-2 col-form-label" style="padding-left:0%; padding-right:0px">Marca:</label>
                                                                    <div class="col-sm-1 col-lg-4" style="padding-left:0%;">
                                                                            <div class="input-group input-group-inverse">
                                                                                <select id="marcaProdEdit" name="marcaProdEdit" class="form-control form-control-inverse">
                                                                                    <option value="-1">Seleciona una marca </option>
                                                                                        <?php
                                                                                            $item = null;
                                                                                            $valor = null;
                                                                                            $Marcas = ControladorMarcas::listarMarcas($item, $valor);

                                                                                            foreach ($Marcas as $key => $value){
                                                                                                echo '<option value="'.$value["id_marca"].'">'.$value["nombre_marca"].'</option>';
                                                                                            }
                                                                                        ?>
                                                                                </select>
                                                                            </div>
                                                                    </div>        
                                                                </div> 
                                                                <div class="row">
                                                                    <label class="col-sm-8 col-lg-2 col-form-label" style="padding-top: 0px;">precio de venta:</label>
                                                                    <div class="col-sm-1 col-lg-4" style="padding-left: 0%;">
                                                                            <div class="input-group input-group-inverse">
                                                                                <input class="form-control input-md valUser" type="text" name="precioVentaProdEdit" id="precioVentaProdEdit" value="" placeholder="0.00" require>
                                                                                <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-money-bag"></i></span>
                                                                                
                                                                            </div>
                                                                    </div>

                                                                    <label class="col-sm-8 col-lg-2 col-form-label" style="padding-left:0%; padding-right:0px; padding-top:0px">precio de compra:</label>
                                                                    <div class="col-sm-1 col-lg-4" style="padding-left:0%;">
                                                                            <div class="input-group input-group-inverse">
                                                                                <input class="form-control input-md" type="text" name="precioCompraProdEdit" id="precioCompraProdEdit" value="" placeholder="0.00" require>
                                                                                <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-money-bag"></i></span>
                                                                                
                                                                            </div>
                                                                    </div>
                                                                        
                                                                </div> 
                                                            
                                                                <div class="row">
                                                                    <label class="col-sm-8 col-lg-2 col-form-label  ml-md-auto" style="padding-left:0%; padding-right:0px">Estado:</label>
                                                                    <div class="col-sm-1 col-lg-4" style="padding-left:0%;">
                                                                            <div class="input-group input-group-inverse">
                                                                                <select name="estadoProdEdit" id="estadoProdEdit" class="form-control form-control-inverse">
                                                                                    <option value="-1">Selecciona un estado</option>
                                                                                    <option value="1">Habilitado</option>
                                                                                    <option value="0">Deshabilitado</option>
                                                                                </select>
                                                                            </div>
                                                                    </div>
                                                                        
                                                                </div> 
                                                                <label class="col-auto col-form-label" style="margin-left: 0px; padding-left: 0px;">Subir foto de producto:</label>
                                                                <div class="row">
                                                                    
                                                                    <div class="col-auto">
                                                                            <div class="input-group input-group-inverse">
                                                                                <input type="file"  name="fotoProdEdit" id="fotoProdEdit" class="form-control fotoProd" >
                                                                                <input type="hidden"  name="fotoProdActual" id="fotoProdActual" value="" class="form-control fotoUser" >
                                                                            </div>
                                                                    </div>  
                                                                        
                                                                </div>
                                                                <div class="col-sm-1 col-lg-6">
                                                                            <div class="input-group input-group-inverse ">
                                                                                <img class="imag-thumbnail rounded-circle  previsualizarProd" style="border: 2px solid #404e67;" width="100px" height="100px" src="views\img\productos\producto_default.jpg" alt="foto de producto">
                                                                            </div>
                                                                    </div>
                                                                <div class="modal-footer">
                                                                    <input type="hidden"  name="idProdActual" id="idProdActual" value="" class="form-control fotoUser" >
                                                                    <button type="button" style="margin-left: 191.875px;" class="btn btn-danger btn-lg waves-effect md-close">Cancelar</button>
                                                                    <button type="submit" style="margin-right: 191.875px;" class="btn btn-primary btn-lg waves-effect md-close">Guardar</button>
                                                                <?php
                                                                $modificarProducto = new ControladorProductos();
                                                                $modificarProducto -> modificarProducto();
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
$borrarProducto = new ControladorProductos();
$borrarProducto -> borrarProducto();
?>