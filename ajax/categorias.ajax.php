<?php
require_once "..\controller\categorias.controlador.php";
require_once "..\models\categorias.modelo.php";



class AjaxCategorias{

    //editar usuario
    public $idCat;

	public function ajaxEditarCategoria(){
		$item = "id_cat";
		$valor = $this->idCat;
		
		$respuesta = ControladorCategorias::listarCategorias($item, $valor);
        
		echo json_encode($respuesta);

	}

	//validar usuario
	/*public $validarUsuario;
	public function ajaxValidarUsuario(){

		$item = "usuario";
		$valor = $this->validarUsuario;
		$respuesta = ControladorUsuarios::listarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}*/
}

//editar usuario
if(isset($_POST["idCat"])){
	$editar = new AjaxCategorias();
	$editar -> idCat = $_POST["idCat"];
	$editar -> ajaxEditarCategoria();
	
}

//validar usuarios
if(isset( $_POST["validarUsuario"])){
	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario();

}