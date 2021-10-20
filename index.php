<?php

//controladores
require_once "controller/contenedor.controlador.php";
require_once "controller/productos.controlador.php";
require_once "controller/categorias.controlador.php";
require_once "controller/clientes.controlador.php";
require_once "controller/compras.controlador.php";
require_once "controller/datos-negocio.controlador.php";
require_once "controller/dosificacion-facturas.controlador.php";
require_once "controller/marcas.controlador.php";
require_once "controller/pedidos.controlador.php";
require_once "controller/proveedores.controlador.php";
require_once "controller/reportes-compra.controlador.php";
require_once "controller/reportes-inventario.controlador.php";
require_once "controller/reportes-venta.controlador.php";
require_once "controller/reservas.controlador.php";
require_once "controller/roles.controlador.php";
require_once "controller/stock-minimo.controlador.php";
require_once "controller/usuarios.controlador.php";
require_once "controller/ventas.controlador.php";

//modelos
require_once "models/categorias.modelo.php";
require_once "models/productos.modelo.php";
require_once "models/clientes.modelo.php";
require_once "models/compras.modelo.php";
require_once "models/datos-negocio.modelo.php";
require_once "models/dosificacion-facturas.modelo.php";
require_once "models/marcas.modelo.php";
require_once "models/pedidos.modelo.php";
require_once "models/proveedores.modelo.php";
require_once "models/reportes-compra.modelo.php";
require_once "models/reportes-inventario.modelo.php";
require_once "models/reportes-venta.modelo.php";
require_once "models/reservas.modelo.php";
require_once "models/roles.modelo.php";
require_once "models/stock-minimo.modelo.php";
require_once "models/usuarios.modelo.php";
require_once "models/ventas.modelo.php";

$plantilla =  new ControladorContenedor();
$plantilla -> ctrContenedor();