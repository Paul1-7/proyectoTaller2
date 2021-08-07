<?php
require_once "..\controller\productos.controlador.php";
require_once "..\models\productos.modelo.php";



class AjaxProductos{

    //editar producto
    public $idProducto;

	public function ajaxEditarProducto(){
		$item = "id_prod";
		$valor = $this->idProducto;
		
		$respuesta = ControladorProductos::listarProductos($item, $valor);
        
		echo json_encode($respuesta);

	}

	//validar nombre prod
	public $validarNombreProd;
	public function ajaxValidarNombreProd(){

		$item = "nombre_prod";
		$valor = $this->validarNombreProd;
		$respuesta = ControladorProductos::listarProductos($item, $valor);

		echo json_encode($respuesta);

	}
}

//editar usuario
if(isset($_POST["idProd"])){
	$editar = new AjaxProductos();
	$editar -> idProducto = $_POST["idProd"];
	$editar -> ajaxEditarProducto();
	
}

//validar usuarios
if(isset( $_POST["valNombreProd"])){
	$valUsuario = new AjaxProductos();
	$valUsuario -> validarNombreProd = $_POST["valNombreProd"];
	$valUsuario -> ajaxValidarNombreProd();

}