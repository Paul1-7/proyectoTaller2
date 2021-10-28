<?php
require_once "..\controller\categorias.controlador.php";
require_once "..\models\categorias.modelo.php";



class AjaxCategorias{

    //editar usuario
    public $idCat;

	public function ajaxModificarCategoria(){
		$item = "id_cat";
		$valor = $this->idCat;
		
		$respuesta = ControladorCategorias::listarCategorias($item, $valor);
        
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
if(isset($_POST["idCat"])){
	$editar = new AjaxCategorias();
	$editar -> idCat = $_POST["idCat"];
	$editar -> ajaxModificarCategoria();
	
}

//validar usuarios
if(isset( $_POST["validarNombre"])){
	$valNombre = new AjaxCategorias();
	$valNombre -> validarNombre = $_POST["validarNombre"];
	$valNombre -> ajaxValidarNombre();
}