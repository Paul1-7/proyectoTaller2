<?php
require_once "..\controller\administrar-producto.controlador.php";
require_once "..\models\administrar-producto.modelo.php";



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
	public $validarUsuario;
	public function ajaxValidarUsuario(){

		$item = "nombre_prod";
		$valor = $this->validarUsuario;
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
if(isset( $_POST["validarUsuario"])){
	$valUsuario = new AjaxProductos();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario();

}