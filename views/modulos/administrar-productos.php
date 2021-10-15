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
                                                        <div class="col-sm-12 col-lg-10">
                                                            <div class="input-group input-group-inverse">
                                                                <input class="form-control input-md valNombreProd" type="text" name="nombreProd" placeholder="Ingresar nombre del producto" required>
                                                                <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont icofont-user-alt-4"></i></span>
                                                            </div>
                                                        </div>      
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-8 col-lg-2 col-form-label">Stock:</label>
                                                        <div class="col-sm-1 col-lg-4">
                                                                <div class="input-group input-group-inverse">
                                                                    <input class="form-control input-md " type="number" name="stockProd"  placeholder="Ingresar stock" require>
                                                                    <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont icofont-user-alt-4"></i></span>
                                                                    
                                                                </div>
                                                        </div>

                                                        <label class="col-sm-8 col-lg-2 col-form-label" style="padding-left:0%; padding-right:0px; padding-top:0; ">presentación <br> del producto:</label>
                                                        <div class="col-sm-1 col-lg-4" style="padding-left:0%;">
                                                                <select name="rolUser" class="form-control form-control-inverse">
                                                                        <option value="-1">Seleccina una unidad </option>
                                                                        <option value="1">Unidad </option>
                                                                        <option value="2">Libra </option>
                                                                        <option value="3">Caja </option>
                                                                        <option value="4">Paquete</option>
                                                                </select>
                                                        </div>
                                                            
                                                    </div> 
                                                    <div class="row">
                                                        <label class="col-sm-8 col-lg-2 col-form-label">Categoria:</label>
                                                        <div class="col-sm-1 col-lg-4">
                                                                <div class="input-group input-group-inverse">
                                                                    <select id="rolUserEdit" name="rolUserEdit" class="form-control form-control-inverse">
                                                                        <option value="-1">Seleciona una categoria </option>
                                                                            <?php
                                                                                $item = null;
                                                                                $valor = null;
                                                                        
                                                                                $roles = ControladorRoles::listarRoles($item, $valor);

                                                                                foreach ($roles as $key => $value){
                                                                                    echo '<option value="'.$value["id_rol"].'">'.$value["nombre_rol"].'</option>';
                                                                                }
                                                                            ?>
                                                                    </select>
                                                                </div>
                                                        </div>

                                                        <label class="col-sm-8 col-lg-2 col-form-label" style="padding-left:0%; padding-right:0px">Marca:</label>
                                                        <div class="col-sm-1 col-lg-4" style="padding-left:0%;">
                                                                <div class="input-group input-group-inverse">
                                                                    <select id="estadoUserEdit" name="estadoUserEdit" class="form-control form-control-inverse">
                                                                        <option value="-1">Seleciona una marca </option>
                                                                            <?php
                                                                                $item = null;
                                                                                $valor = null;
                                                                        
                                                                                $roles = ControladorRoles::listarRoles($item, $valor);

                                                                                foreach ($roles as $key => $value){
                                                                                    echo '<option value="'.$value["id_rol"].'">'.$value["nombre_rol"].'</option>';
                                                                                }
                                                                            ?>
                                                                    </select>
                                                                </div>
                                                        </div>        
                                                    </div> 
                                                    <div class="row">
                                                        <label class="col-sm-8 col-lg-2 col-form-label" style="padding-top: 0px;">precio de venta:</label>
                                                        <div class="col-sm-1 col-lg-4">
                                                                <div class="input-group input-group-inverse">
                                                                    <input class="form-control input-md valUser" type="text" name="precioVentaProd" id="precioVentaProd" placeholder="0.00" require>
                                                                    <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont icofont-user-alt-4"></i></span>
                                                                    
                                                                </div>
                                                        </div>

                                                        <label class="col-sm-8 col-lg-2 col-form-label" style="padding-left:0%; padding-right:0px; padding-top:0px">precio de compra:</label>
                                                        <div class="col-sm-1 col-lg-4" style="padding-left:0%;">
                                                                <div class="input-group input-group-inverse">
                                                                    <input class="form-control input-md" type="text" name="precioCompraProd" placeholder="0.00" require>
                                                                    <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont icofont-ui-password"></i></span>
                                                                    
                                                                </div>
                                                        </div>
                                                            
                                                    </div> 
                                                   
                                                    <div class="row">
                                                        
                                                        <div class="col-sm-1 col-lg-4" style="margin-left:100px">
                                                                <div class="border-checkbox-group  input-group input-group-inverse " >
                                                                        <input class="border-checkbox col-sm-1 ml-md-auto" type="checkbox" id="checkbox1" style="margin-top: 12.5px;">
                                                                        <label class="col-form-label col-auto" for="checkbox1">aplicar iva %</label>
                                                                        <input class="form-control " style="width: 35px;" type="text" name="ciUser" placeholder="0%" >
                                                                </div>
                                                                
                                                        </div>

                                                        <label class="col-sm-8 col-lg-2 col-form-label  ml-md-auto" style="padding-left:0%; padding-right:0px">Estado:</label>
                                                        <div class="col-sm-1 col-lg-4" style="padding-left:0%;">
                                                                <div class="input-group input-group-inverse">
                                                                    <select name="estadoUser" class="form-control form-control-inverse">
                                                                        <option value="-1">Selecciona un estado</option>
                                                                        <option value="1">Habilitado</option>
                                                                        <option value="0">Deshabilitado</option>
                                                                    </select>
                                                                </div>
                                                        </div>
                                                            
                                                    </div> 
                                                    <label class="col-sm-8 col-lg-2 col-form-label" style="margin-left: 0px; padding-left: 0px;">Subir foto:</label>
                                                    <div class="row">
                                                        
                                                        <div class="col-auto">
                                                                <div class="input-group input-group-inverse">
                                                                    <input type="file"  name="fotoUser" class="form-control fotoUser" >
                                                                </div>
                                                        </div>  
                                                            
                                                    </div>
                                                    <div class="col-sm-1 col-lg-6">
                                                                <div class="input-group input-group-inverse ">
                                                                    <img class="imag-thumbnail rounded-circle previsualizar " style="border: 2px solid #404e67;" width="100px" height="100px" src="views\img\usuarios\user.png" alt="foto de perfil">
                                                                </div>
                                                        </div>
                                                    <div class="modal-footer">
                                                        <button type="button" style="margin-left: 191.875px;" class="btn btn-danger btn-lg waves-effect md-close">Cancelar</button>
                                                        <button type="submit" style="margin-right: 191.875px;" class="btn btn-primary btn-lg waves-effect md-close">Guardar</button>
                                                    <?php
                                                        $nuevoUser = new ControladorUsuarios();
                                                        $nuevoUser -> nuevoUsuario();
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
                                                <th>Foto</th>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Carnet de <br> identidad</th>
                                                <th>Usuario</th>
                                                <th>Rol</th>
                                                <th>Estado</th>
                                                <th>Ultimo login</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div class="animation-model">
                                                <?php
                                                    $item = null;
                                                    $valor = null;
                                            
                                                    $usuarios = ControladorUsuarios::listarUsuarios($item, $valor);

                                                    foreach ($usuarios as $key => $value){
            
                                                        echo ' <tr>
                                                                <td></td>
                                                                <td><img src="'.$value["foto"].'" class="img-thumbnail" width="45px"></td>
                                                                <td>'.$value["nombre"].'</td>
                                                                <td>'.$value["apellido"].'</td>
                                                                <td>'.$value["ci"].'</td>
                                                                <td>'.$value["usuario"].'</td>';
                                                                
                                                                $item = null;
                                                                $valor = null;
                                                        
                                                                $roles = ControladorRoles::listarRoles($item, $valor);

                                                                foreach ($roles as $key => $valueRol){
                                                                    if($valueRol["id_rol"] == $value["rolesid_rol"])
                                                                        echo '<td>'.$valueRol["nombre_rol"].'</td>';
                                                                }
                                                                                       
                                                                
                                                                if($value["estado"] != 0)
                                                                    echo '<td><label class="badge badge-md badge-success" >Habilitado</label></td>';
                                                                else
                                                                    echo '<td><label class="badge badge-md badge-warning" >Deshabilitado</label></td>';
                                                                
                                                                echo '<td>'.$value["ultimo_login"].'</td>
                                                                    <td>
                                                                        
                                                                            <button type="button" class="btn btn-primary btn-icon  btn-outline-default waves-effect md-trigger btnEditarUser" idUsuario="'.$value["id_user"].'" data-modal="modalModificarUsuario"  >
                                                                                <i class="icofont icofont-pen-alt-4"></i>
                                                                            </button>
                                                                    </td>
                                                            </tr>';
                                                    }
                                                ?>
                                                <!-- formulario para editar -->
                                                <!-- modal -->
                                                <div class="md-modal md-effect-1" id="modalModificarUsuario">
                                                    <form role="form" method="POST" enctype="multipart/form-data">
                                                        <div class="md-content" >

                                                            <h3 style="background-color:#404e67 !important;">Modificar usuario</h3>
                                                            <div >
                                                                <div class="row">
                                                                    <label class="col-sm-8 col-lg-2 col-form-label">Nombres:</label>
                                                                    <div class="col-sm-12 col-lg-10">
                                                                        <div class="input-group input-group-inverse">
                                                                            <input class="form-control input-md" type="text" id="nombresUserEdit" name="nombresUserEdit" value="" placeholder="Ingresar nombres" require>
                                                                            <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont icofont-user-alt-4"></i></span>
                                                                            
                                                                        </div>
                                                                    </div>      
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-8 col-lg-2 col-form-label">Apellidos:</label>
                                                                    <div class="col-sm-12 col-lg-10">
                                                                        <div class="input-group input-group-inverse">
                                                                            <input class="form-control input-md" type="text" id="apellidosUserEdit" name="apellidosUserEdit" placeholder="Ingresar apellidos" require>
                                                                            <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont icofont-user-alt-4"></i></span>
                                                                            
                                                                        </div>
                                                                    </div>      
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-8 col-lg-2 col-form-label">Usuario:</label>
                                                                    <div class="col-sm-1 col-lg-4">
                                                                            <div class="input-group input-group-inverse">
                                                                                <input class="form-control input-md valUser" type="text" id="usuarioUserEdit" name="usuarioUserEdit" placeholder="Ingresar usuario" require >
                                                                                <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont icofont-user-alt-4"></i></span>
                                                                                
                                                                            </div>
                                                                    </div>

                                                                    <label class="col-sm-8 col-lg-2 col-form-label" style="padding-left:0%; padding-right:0px">Contraseña:</label>
                                                                    <div class="col-sm-1 col-lg-4" style="padding-left:0%;">
                                                                            <div class="input-group input-group-inverse">
                                                                                <input class="form-control input-md" type="text" name="passwordUserEdit" placeholder="nueva contraseña" require>
                                                                                <input class="form-control input-md" type="hidden" value="" id="passwordUserEditActual" name="passwordUserEditActual">
                                                                                <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont icofont-ui-password"></i></span>
                                                                                
                                                                            </div>
                                                                    </div>
                                                                        
                                                                </div> 
                                                                <div class="row">
                                                                    <label class="col-sm-8 col-lg-2 col-form-label">Carnet de identidad:</label>
                                                                    <div class="col-sm-1 col-lg-4">
                                                                            <div class="input-group input-group-inverse">
                                                                                <input class="form-control input-md" type="text" id="ciUserEdit" name="ciUserEdit" value="" placeholder="Ingresar C.I." require>
                                                                                <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont icofont-ui-v-card"></i></span>
                                                                                
                                                                            </div>
                                                                    </div>       
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-8 col-lg-2 col-form-label">Rol:</label>
                                                                    <div class="col-sm-1 col-lg-4">
                                                                            <div class="input-group input-group-inverse">
                                                                                <select id="rolUserEdit" name="rolUserEdit" class="form-control form-control-inverse">
                                                                                    <option value="-1">Seleciona un rol </option>
                                                                                        <?php
                                                                                            $item = null;
                                                                                            $valor = null;
                                                                                    
                                                                                            $roles = ControladorRoles::listarRoles($item, $valor);

                                                                                            foreach ($roles as $key => $value){
                                                                                                echo '<option value="'.$value["id_rol"].'">'.$value["nombre_rol"].'</option>';
                                                                                            }
                                                                                        ?>
                                                                                    
                                                                                </select>
                                                                            </div>
                                                                    </div>

                                                                    <label class="col-sm-8 col-lg-2 col-form-label" style="padding-left:0%; padding-right:0px">Estado:</label>
                                                                    <div class="col-sm-1 col-lg-4" style="padding-left:0%;">
                                                                            <div class="input-group input-group-inverse">
                                                                                <select id="estadoUserEdit" name="estadoUserEdit" class="form-control form-control-inverse">
                                                                                    <option value="-1">Selecciona un estado</option>
                                                                                    <option value="1">Habilitado</option>
                                                                                    <option value="0">Deshabilitado</option>
                                                                                </select>
                                                                            </div>
                                                                    </div>
                                                                        
                                                                </div> 
                                                                <label class="col-sm-8 col-lg-2 col-form-label" style="margin-left: 0px; padding-left: 0px;">Subir foto:</label>
                                                                <div class="row">
                                                                    
                                                                    <div class="col-sm-1 col-lg-6">
                                                                            <div class="input-group input-group-inverse">
                                                                                <input type="file"  name="fotoUserEdit" class="form-control fotoUser" >
                                                                                <input type="hidden"  name="fotoUserActual" id="fotoUserActual" value="" class="form-control fotoUser" >
                                                                            </div>
                                                                    </div>  
                                                                        
                                                                </div>
                                                                <div class="col-sm-1 col-lg-6">
                                                                            <div class="input-group input-group-inverse ">
                                                                                <img class="imag-thumbnail rounded-circle previsualizar " style="border: 2px solid #404e67;" width="100px" height="100px" src="views\img\usuarios\user.png" alt="foto de perfil">
                                                                            </div>
                                                                    </div>
                                                                <div class="modal-footer">
                                                                    <input type="hidden"  name="idUserActual" id="idUserActual" value="" class="form-control fotoUser" >
                                                                    <button type="button" style="margin-left: 191.875px;" class="btn btn-danger btn-lg waves-effect md-close ">Cancelar</button>
                                                                    <button type="submit" style="margin-right: 191.875px;" class="btn btn-primary btn-lg waves-effect md-close">Guardar</button>
                                                                <?php
                                                                    $modificarUser = new ControladorUsuarios();
                                                                    $modificarUser -> modificarUsuario();
                                                                ?> 
                                                                <!-- <script>window.location = "usuarios";</script> -->
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