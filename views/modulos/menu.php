<nav class="pcoded-navbar">
<div class="pcoded-inner-navbar main-menu">
    
    <div class="pcoded-navigatio-lavel">Menu</div>
    <ul class="pcoded-item pcoded-left-item" item-border="false" subitem-border="true" item-border-style="none">
        
        <li class="" id="dashboard">
            <a href="dashboard">
                <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                <span class="pcoded-mtext">Dashboard</span>
            </a>
        </li>
        
        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                <span class="pcoded-mtext">Administracion General</span>
            </a>
            <ul class="pcoded-submenu">
                
                <li class=" " id="datos-negocio">
                    <a href="datos-negocio">
                        <span class="pcoded-mtext">Datos del negocio</span>
                    </a>
                </li>
                <li class=" " id="dosificacion-facturas">
                    <a href="dosificacion-facturas">
                        <span class="pcoded-mtext">Datos de dosificación de facturas</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="" id="categorias">
            <a href="categorias">
                <span class="pcoded-micon"><i class="feather icon-package"></i></span>
                <span class="pcoded-mtext">Categorias</span>
            </a>
        </li>
        <li class="" id="clientes">
            <a href="clientes">
                <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                <span class="pcoded-mtext">Clientes</span>
            </a>
        </li>
        <li class="" id="compras">
            <a href="compras">
                <span class="pcoded-micon"><i class="feather icofont-grocery"></i></span>
                <span class="pcoded-mtext">Compras</span>
            </a>
        </li>
        <li class="" id="marcas">
            <a href="marcas">
                <span class="pcoded-micon"><i class="feather icofont-label"></i></span>
                <span class="pcoded-mtext">Marcas</span>
            </a>
        </li>
        <li class="" id="pedidos">
            <a href="pedidos">
                <span class="pcoded-micon"><i class="feather icofont-paperclip"></i></span>
                <span class="pcoded-mtext">Pedidos</span>
            </a>
        </li>
        <li class="" id="productos">
            <a href="productos">
                <span class="pcoded-micon"><i class="feather icofont-price"></i></span>
                <span class="pcoded-mtext">Productos</span>
            </a>
        </li>
        <li class="" id="proveedores">
            <a href="proveedores">
                <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                <span class="pcoded-mtext">Proveedores</span>
            </a>
        </li>
        <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                <span class="pcoded-mtext">Reportes</span>
            </a>
            <ul class="pcoded-submenu">
                <li class=" " id="reportes-venta">
                    <a href="reportes-venta">
                        <span class="pcoded-mtext">Reportes de venta</span>
                    </a>
                </li>
                <li class=" " id="reportes-compra">
                    <a href="reportes-compra">
                        <span class="pcoded-mtext">Reportes de compra</span>
                    </a>
                </li>
                <li class=" " id="reportes-inventario">
                    <a href="reportes-inventario">
                        <span class="pcoded-mtext">Reportes de inventario</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="" id="reservas">
            <a href="reservas">
                <span class="pcoded-micon"><i class="feather icofont-prescription"></i></span>
                <span class="pcoded-mtext">Reservas</span>
            </a>
        </li>
        <li class="" id="roles">
            <a href="roles">
                <span class="pcoded-micon"><i class="feather icon-star"></i></span>
                <span class="pcoded-mtext">Roles</span>
            </a>
        </li>
        <li class="" id="usuarios">
            <a href="usuarios">
                <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                <span class="pcoded-mtext">Usuarios</span>
            </a>
        </li>
        <li class="" id="ventas" >
            <a href="ventas">
                <span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
                <span class="pcoded-mtext">Ventas</span>
            </a>
        </li>
        <script>
            //señala en el menu donde se ubica
            var opcionMenu = window.location.pathname.split("/")
           document.getElementById(opcionMenu[opcionMenu.length-1]).className = " active";
        </script>
    </ul>

</div>
</nav>