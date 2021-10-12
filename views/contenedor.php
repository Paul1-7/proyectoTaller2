<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Llanta sur </title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="views\assets\images\favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="views\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="views\assets\icon\feather\css\feather.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="views\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="views\assets\css\jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="views\assets\icon\icofont\css\icofont.css">
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="views\assets\css\component.css">
    <!-- sweet alert framework -->
    <script type="text/javascript" src="views/bower_components/sweetalert/js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="views/bower_components/sweetalert/css/sweetalert.css">
    <script type="text/javascript" src="views\assets\js\personalizado\mensajesModal.js"></script>
    <!-- <script src="views/bower_components/sweetalert/js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="views/bower_components/sweetalert/css/sweetalert2.css"> -->
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="views\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="views\assets\pages\data-table\css\buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="views\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="views\assets\icon\themify-icons\themify-icons.css">
    <!-- jquery file upload Frame work -->
    <link href="views/assets/pages/jquery.filer/css/jquery.filer.css" type="text/css" rel="stylesheet">
    <link href="views/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet">
    <!-- Required Jquery -->
    <script type="text/javascript" src="views\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="views\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="views\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="views\bower_components\bootstrap\js\bootstrap.min.js"></script>
    
</head>

<body >
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <?php
        
        if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"]=="ok"){
            if(isset($_GET["ruta"])){
                if($_GET["ruta"]== "dashboard" ||
                $_GET["ruta"]== "datos-negocio" ||
                $_GET["ruta"]== "dosificacion-facturas" ||
                $_GET["ruta"]== "categorias" ||
                $_GET["ruta"]== "clientes" ||
                $_GET["ruta"]== "compras" ||
                $_GET["ruta"]== "marcas" ||
                $_GET["ruta"]== "pedidos" ||
                $_GET["ruta"]== "administrar-productos" ||
                $_GET["ruta"]== "stock-minimo" ||
                $_GET["ruta"]== "proveedores" ||
                $_GET["ruta"]== "reportes-venta" ||
                $_GET["ruta"]== "reportes-compra" ||
                $_GET["ruta"]== "reportes-inventario" ||
                $_GET["ruta"]== "reservas" ||
                $_GET["ruta"]== "roles" ||
                $_GET["ruta"]== "usuarios" ||
                $_GET["ruta"]== "ventas" ||
                $_GET["ruta"]== "salir"
                ){
                    echo '<div id="pcoded" class="pcoded">
                    <div class="pcoded-overlay-box"></div>
                    <div class="pcoded-container navbar-wrapper">';
                          include "modulos/navbar.php";
        
                    echo '<div class="pcoded-main-container">
                            <div class="pcoded-wrapper">';
                                //menu
                                include "modulos/menu.php";
                               // <!-- contenido -->
                                include "modulos/".$_GET["ruta"].".php";
                    echo    '</div>
                            </div>
                        </div>
                    </div>';
                
                }   
                else
                    include "modulos/404/404.php";
            }else
                include "modulos/login.php";

        }
        else
            include "modulos/login.php";      
    ?>
    

    
    <!-- <script data-cfasync="false" src="..\..\..\cdn-cgi\scripts\5c5dd728\cloudflare-static\email-decode.min.js"></script><script type="text/javascript" src="views\bower_components\jquery\js\jquery.min.js"></script> -->
    
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="views\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="views\bower_components\modernizr\js\modernizr.js"></script>
    <script type="text/javascript" src="views\bower_components\modernizr\js\css-scrollbars.js"></script>
    

    <!-- Chart js -->
    <script type="text/javascript" src="views\bower_components\chart.js\js\Chart.js"></script>
    <!-- amchart js -->
    <script src="views/assets/pages/widget/amchart/amcharts.js"></script>
    <script src="views/assets/pages/widget/amchart/serial.js"></script>
    <script src="views/assets/pages/widget/amchart/light.js"></script>
    <script src="views\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- <script type="text/javascript" src="views/assets/js/SmoothScroll.js"></script> -->
    <script src="views/assets/js/pcoded.min.js"></script>
    
    <!-- modalEffects js nifty modal window effects -->
    <script type="text/javascript" src="views\assets\js\modalEffects.js"></script>
    <script type="text/javascript" src="views\assets\js\classie.js"></script>
    <!-- sweet alert js -->
    <!-- <script type="text/javascript" src="views/bower_components/sweetalert/js/sweetalert.min.js"></script> -->
    <!-- <script type="text/javascript" src="views/assets/js/modal.js"></script> -->
 <!-- i18next.min.js -->
    <script type="text/javascript" src="views\bower_components\i18next\js\i18next.min.js"></script>
    <script type="text/javascript" src="views\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="views\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="views\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
    <!-- data-table js -->
    <script src="views\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
    <script src="views\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js"></script>
    <script src="views\assets\pages\data-table\js\jszip.min.js"></script>
    <script src="views\assets\pages\data-table\js\pdfmake.min.js"></script>
    <script src="views\assets\pages\data-table\js\vfs_fonts.js"></script>
    <script src="views\bower_components\datatables.net-buttons\js\buttons.print.min.js"></script>
    <script src="views\bower_components\datatables.net-buttons\js\buttons.html5.min.js"></script>
    <script src="views\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
    <script src="views\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js"></script>
    <script src="views\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"></script>
    <!-- custom js -->
    <script type="text/javascript" src="views\assets\js\vartical-layout.min.js"></script>
    <script type="text/javascript" src="views\assets\pages\dashboard\custom-dashboard.js"></script>
    <script type="text/javascript" src="views\assets\js\script.min.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="views\assets\js\script.js"></script>
    <script type="text/javascript" src="views\assets\js\personalizado\usuarios.js"></script>
    <script type="text/javascript" src="views\assets\js\personalizado\plantilla.js"></script>
    
    <!-- jquery file upload js -->
    <!-- <script src="views\assets\pages\jquery.filer\js\jquery.filer.min.js"></script>
    <script src="views\assets\pages\filer\custom-filer.js" type="text/javascript"></script>
    <script src="views\assets\pages\filer\jquery.fileuploads.init.js" type="text/javascript"></script> -->
    
<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script> -->
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');

  
</script>
</body>

</html>
