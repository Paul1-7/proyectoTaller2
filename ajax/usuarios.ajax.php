<?php
require_once "..\controller\usuarios.controlador.php";
require_once "..\models\usuarios.modelo.php";



class AjaxUsuarios{

    //editar usuario
    public $idUsuario;

	public function ajaxEditarUsuario(){

		$item = "id_user";
		$valor = $this->idUsuario;
		
		$respuesta = ControladorUsuarios::listarUsuarios($item, $valor);
        
		echo json_encode($respuesta);

	}

	//validar ci y usuario
	public $validarUsuario;
	public function ajaxValidarUsuario(){

		$item = "usuario";
		$valor = $this->validarUsuario;
		$respuesta = ControladorUsuarios::listarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}
}

//editar usuario
if(isset($_POST["idUsuario"])){
	$editar = new AjaxUsuarios();
	$editar -> idUsuario = $_POST["idUsuario"];
	$editar -> ajaxEditarUsuario();
	
}

//validar usuarios
if(isset( $_POST["validarUsuario"])){
	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario();

}