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

	//validar ci
	public $validarCi;
	public function ajaxValidarCi(){

		$item = "ci_cl";
		$valor = $this->validarCi;
		$respuesta = ControladorClientes::listarClientes($item, $valor);

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
if(isset( $_POST["validarCi"])){
	$valNombre = new AjaxClientes();
	$valNombre -> validarCi = $_POST["validarCi"];
	$valNombre -> ajaxValidarCi();
}