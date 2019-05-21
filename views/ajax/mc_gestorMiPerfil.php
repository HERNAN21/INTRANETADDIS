<?php 

require_once "../../controllers/mc_gestorMiPerfil.php";
require_once "../../models/mc_gestorMiPerfil.php";	

class GestorMiPerfilAjax{

#MOSTRAR LA IMAGEN
	#-----------------------------------------------------------------------
	public $imagenTemporal;
	public function mostrarImagenUsuarioAjax(){

		$datos = $this->imagenTemporal;

		$respuesta = GestorMiPerfilController::mostrarImagenUsuarioController($datos);

		echo $respuesta;
	}

}

if(isset($_FILES["imagen"]["tmp_name"])){
	$a = new GestorMiPerfilAjax();
	$a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
	$a -> mostrarImagenUsuarioAjax();
}