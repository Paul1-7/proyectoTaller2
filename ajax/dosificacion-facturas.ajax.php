<?php
require_once "..\controller\dosificacion-facturas.controlador.php";
require_once "..\models\dosificacion-facturas.modelo.php";



class AjaxDosificacionFacturas{

    //editar usuario
    public $idDosificacionFactura;

	public function ajaxModificarCategoria(){
		$item = "id_dosificacion";
		$valor = $this->idDosificacionFactura;
		
		$respuesta = ControladorDosificacionFacturas::mostrarDosificacionFacturas($item, $valor);     
		echo json_encode($respuesta);

	}

}

//editar usuario
if(isset($_POST["id_dosificacion"])){
	$editar = new AjaxDosificacionFacturas();
	$editar -> idDosificacionFactura = $_POST["id_dosificacion"];
	$editar -> ajaxModificarCategoria();
	
}
