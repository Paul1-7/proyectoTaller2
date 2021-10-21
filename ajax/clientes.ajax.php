<?php
require_once "..\controller\clientes.controlador.php";
require_once "..\models\clientes.modelo.php";



class AjaxClientes{

    //editar usuario
    public $idCl;

	public function ajaxModificarCliente(){
		$item = "id_cliente";
		$valor = $this->idCl;	
		$respuesta = ControladorClientes::listarClientes($item, $valor);   
		echo json_encode($respuesta);

	}

	//validar usuario
	public $validarNombre;
	public function ajaxValidarNombre(){

		$item = "nombre_cat";
		$valor = $this->validarNombre;
		$respuesta = ControladorCategorias::listarCategorias($item, $valor);

		echo json_encode($respuesta);

	}
}

//editar usuario
if(isset($_POST["idCl"])){
	$editar = new AjaxClientes();
	$editar -> idCl = $_POST["idCl"];
	$editar -> ajaxModificarCliente();
	
}

//validar usuarios
if(isset( $_POST["validarNombre"])){
	$valNombre = new AjaxClientes();
	$valNombre -> validarNombre = $_POST["validarNombre"];
	$valNombre -> ajaxValidarNombre();
}