<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper" style="margin-left:50px; margin-right:50px;">
                <!-- Page-header start -->
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h3>Categorias</h3>
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
                                    <li class="breadcrumb-item"><a href="#!">Categorias</a>
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
                                    <button type="button" class="btn btn-inverse btn-outline-default waves-effect md-trigger btnNuevoUser" data-modal="modalRegistrarCategoria" >
                                        <i class="icofont-1x icofont-archive"></i> Nueva categoria
                                    </button>
                                    <!-- modal -->
                                    <div class="md-modal md-effect-1" id="modalRegistrarCategoria">
                                        <form role="form" method="POST">
                                            <div class="md-content" >

                                                <h3 style="background-color:#404e67 !important;">Nueva categoria</h3>
                                                <div >
                                                    <div class="row">
                                                        <label class="col-sm-8 col-lg-2 col-form-label">Nombre:</label>
                                                        <div class="col-sm-12 col-lg-10">
                                                            <div class="input-group input-group-inverse">
                                                                <input class="form-control input-md valNombreCat" type="text" name="nombreCat"  placeholder="Ingresar nombre de la categoria" required>
                                                                <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-archive"></i></span>
                                                            </div>
                                                        </div>      
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-8 col-lg-2 col-form-label" style="padding-right: 10px;">descripción:</label>
                                                        <div class="col-sm-12 col-lg-10">
                                                            <div class="input-group input-group-inverse">
                                                                <textarea rows="5" cols="5" class="form-control" name="descCat" placeholder="Descripción de la categoria"></textarea>
                                                            </div>
                                                        </div>      
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-8 col-lg-2 col-form-label">estado:</label>
                                                        <div class="col-md-auto">
                                                            
                                                            <select id="estadoCat" name="estadoCat" class="form-control form-control-inverse">
                                                                <option value="-1">Seleciona un estado </option>
                                                                <option value="1">Activo </option>
                                                                <option value="0">Inactivo </option>
                                                            </select>
                                                        </div>      
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" style="margin-left: 191.875px;" class="btn btn-danger btn-lg waves-effect md-close">Cancelar</button>
                                                        <button type="submit" style="margin-right: 191.875px;" class="btn btn-primary btn-lg waves-effect md-close">Guardar</button>
                                                    <?php
                                                        $nuevaCategoria = new ControladorCategorias();
                                                        $nuevaCategoria -> nuevaCategoria();
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
                                                <th>Descripcion</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div class="animation-model">
                                                <?php
                                                    $item = null;
                                                    $valor = null;
                                            
                                                    $categorias = ControladorCategorias::listarCategorias($item, $valor);

                                                    foreach ($categorias as $key => $value){
            
                                                        echo ' <tr>
                                                                <td></td>
                                                                <td>'.$value["nombre_cat"].'</td>
                                                                <td>'.$value["desc_cat"].'</td>';
                                                                
                                                                $item = null;
                                                                $valor = null;

                                                                if($value["estado_cat"] != 0)
                                                                    echo '<td style="width:120px"><label class="badge badge-md badge-success" >Activo</label></td>';
                                                                else
                                                                    echo '<td style="width:120px"><label class="badge badge-md badge-warning" >Inactivo</label></td>';
                                                                
                                                                echo '
                                                                    <td style="width:100px">
                                                                        
                                                                            <button type="button" class="btn btn-primary btn-icon  btn-outline-default waves-effect md-trigger btnEditarCat" idCat="'.$value["id_cat"].'" data-modal="modalModificarCategoria"  >
                                                                                <i class="icofont icofont-pen-alt-4"></i>
                                                                            </button>
                                                                            <button type="button" class="btn btn-danger btn-icon   btnEliminarCat" idCat="'.$value["id_cat"].'" >
                                                                                <i class="icofont-ui-delete"></i>
                                                                            </button>
                                                                    </td>
                                                            </tr>';
                                                    }
                                                ?>
                                                <!-- formulario para editar -->
                                                <!-- modal -->
                                                <div class="md-modal md-effect-1" id="modalModificarCategoria">
                                                    <form role="form" method="POST">
                                                        <div class="md-content" >
                                                            <h3 style="background-color:#404e67 !important;">Modificar categoria</h3>
                                                            <div >
                                                                <div class="row">
                                                                    <label class="col-sm-8 col-lg-2 col-form-label">Nombre:</label>
                                                                    <div class="col-sm-12 col-lg-10">
                                                                        <div class="input-group input-group-inverse">
                                                                            <input type="hidden" name="nombreCatActual" id="nombreCatActual" value="">
                                                                            <input class="form-control input-md valNombreCat" type="text" name="nombreCatEdit" id="nombreCatEdit" value="" placeholder="Ingresar nombre de la categoria" required>
                                                                            <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont-2x icofont-archive"></i></span>
                                                                        </div>
                                                                    </div>      
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-8 col-lg-2 col-form-label" style="padding-right: 10px;">descripción:</label>
                                                                    <div class="col-sm-12 col-lg-10">
                                                                        <div class="input-group input-group-inverse">
                                                                            <textarea rows="5" cols="5" class="form-control" name="descCatEdit" id="descCatEdit" value="" placeholder="Descripción de la categoria"></textarea>
                                                                        </div>
                                                                    </div>      
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-8 col-lg-2 col-form-label">estado:</label>
                                                                    <div class="col-md-auto">
                                                                        <select id="estadoCatEdit" name="estadoCatEdit" class="form-control form-control-inverse">
                                                                            <option value="-1">Seleciona un estado </option>
                                                                            <option value="1">Activo </option>
                                                                            <option value="0">Inactivo </option>
                                                                        </select>
                                                                    </div>      
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="hidden" value="" id="idCatActual" name="idCatActual">
                                                                    <button type="button" style="margin-left: 191.875px;" class="btn btn-danger btn-lg waves-effect md-close">Cancelar</button>
                                                                    <button type="submit" style="margin-right: 191.875px;" class="btn btn-primary btn-lg waves-effect md-close">Guardar</button>
                                                                <?php
                                                                    $modificarCategoria = new ControladorCategorias();
                                                                    $modificarCategoria -> modificarCategoria();
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

$borrarCategoria = new ControladorCategorias();
$borrarCategoria -> borrarCategoria();
?>