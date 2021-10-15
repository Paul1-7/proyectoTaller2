<?php
require_once "..\controller\marcas.controlador.php";
require_once "..\models\marcas.modelo.php";

class AjaxMarcas{

    //editar usuario
    public $idMarca;

	public function ajaxEditarMarca(){
		$item = "id_marca";
		$valor = $this->idMarca;
		
		$respuesta = ControladorMarcas::listarMarcas($item, $valor);
        
		echo json_encode($respuesta);

	}

	//validar usuario
	public $validarNombre;
	public function ajaxValidarNombre(){

		$item = "nombre_marca";
		$valor = $this->validarNombre;
		$respuesta = ControladorMarcas::listarMarcas($item, $valor);

		echo json_encode($respuesta);

	}
}

//editar usuario
if(isset($_POST["idMarca"])){
	$editar = new AjaxMarcas();
	$editar -> idMarca = $_POST["idMarca"];
	$editar -> ajaxEditarMarca();
	
}

//validar usuarios
if(isset( $_POST["validarNombre"])){
	$valNombre = new AjaxMarcas();
	$valNombre -> validarNombre = $_POST["validarNombre"];
	$valNombre -> ajaxValidarNombre();
}