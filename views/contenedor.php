<!DOCTYPE html>
<html lang="es">

<head>
    <title>Adminty - Premium Admin Template by Colorlib </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
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
        //barra lateral izquierda
        

            // contenido de pagina
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
            $_GET["ruta"]== "ventas" 
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
        include "modulos/dashboard.php";
           
    ?>
    

    
    <script data-cfasync="false" src="..\..\..\cdn-cgi\scripts\5c5dd728\cloudflare-static\email-decode.min.js"></script><script type="text/javascript" src="views\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="views\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="views\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="views\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="views\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="views\bower_components\modernizr\js\modernizr.js"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="views\bower_components\chart.js\js\Chart.js"></script>
    <!-- amchart js -->
    <script src="views\assets\pages\widget\amchart\amcharts.js"></script>
    <script src="views\assets\pages\widget\amchart\serial.js"></script>
    <script src="views\assets\pages\widget\amchart\light.js"></script>
    <script src="views\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="views\assets\js\SmoothScroll.js"></script>
    <script src="views\assets\js\pcoded.min.js"></script>
    <!-- custom js -->
    <script src="views\assets\js\vartical-layout.min.js"></script>
    <script type="text/javascript" src="views\assets\pages\dashboard\custom-dashboard.js"></script>
    <script type="text/javascript" src="views\assets\js\script.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');

  
</script>
</body>

</html>
