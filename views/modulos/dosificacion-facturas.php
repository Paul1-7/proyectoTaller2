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
                                    <h3>Dosificación de las facturas</h3>
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
                                    <li class="breadcrumb-item"><a href="#!">Administracion general</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Dosificación de las facturas</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="page-body">
                <div class="row">
                    <div class="col-lg-11 col-md-6  m-auto">
                        <div class="card">
                            <div class="card-header">
                            <h4 class="text-center">Parametros de control</h4>
                            </div>
                            <div class="card-block">
                                <form role="form" method="post">
                                    <div class="row">
                                        <label class="col-sm-8 col-lg-2 col-form-label">Número de autorización:</label>
                                        <div class="col-lg-5 input-group input-group-inverse">
                                            <input class="form-control input-md" type="text" name="numAutorizacion" id="numAutorizacion" value="" >
                                            <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont icofont-user-alt-4"></i></span>
                                        </div>
                                        <label class="col-sm-8 col-lg-2 col-form-label">Número de factura inicial:</label>
                                        <div class="col-lg-3 input-group input-group-inverse">
                                            <input class="form-control input-md" type="text" name="numFactInicial" id="numFactInicial" value="" >
                                                <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont icofont-user-alt-4"></i></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-8 col-lg-2 col-form-label">Llave de dosificación:</label>
                                        <div class="col-lg-10 input-group input-group-inverse">
                                            <input class="form-control input-md" type="text" name="llaveDosificacion" id="llaveDosificacion" value="" >
                                            <span class="input-group-addon" style="height:40px; margin-top:0; color:white; background-color:#404e67 !important;"><i class="icofont icofont-user-alt-4"></i></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-8 col-lg-2 col-form-label">Fecha límite de emisión:</label>
                                        <div class="col-lg-5 input-group input-group-inverse">
                                            <input class="form-control" name="FechaLimiteEmision" id="FechaLimiteEmision" type="date">
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-lg-auto col-md-4 m-auto">
                                            <a class="btn btn-danger btn-md" style="margin-right: 1em;"  href="dashboard">Cancelar</a>
                                            <button type="submit" class="btn btn-primary btn-md guardar">Guardar</button>
                                        </div>
                                        
                                    </div>
                                    <?php
                                        $modificarDosificacion = new ControladorDosificacionFacturas();
                                        $modificarDosificacion -> modificarDosificacionFacturas();
                                    ?>
                                </form>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>

 
        </div>
    </div>
</div>