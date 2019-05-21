<?php 

require_once "../../controllers/mc_gestorInicio.php";
require_once "../../models/mc_gestorInicio.php";	
// require_once "../../models/ms_gestorPerfiles.php";	

#CLASES Y METODOS
	#--------------------------------------------------------
class gestorInicioAjax{

	#Subir la imagen
	public $imagenTemporal;
	public function getorImagenesInicioAjax(){

		$datos = $this -> imagenTemporal;

		$respuesta = gestorInicioController::mostrarImagenController($datos);
		
		echo $respuesta;

	}

	public $tabla;
	public function selectEditarInicioAjax(){

		$datos = $this -> tabla;

		$respuesta = gestorInicioController::selectEditarInicioController($datos);

		echo $respuesta;

	}

	public $nuevaImagen;
	public function nuevaImagenInicioAjax(){

		$datos = $this -> nuevaImagen;

		$respuesta = gestorInicioController::nuevaImagenInicioController($datos);

		echo $respuesta;
	}

}

#OBJETOS 
	#-------------------------------------------------------
if(isset($_FILES["imagen"]["tmp_name"])){
	$a = new gestorInicioAjax();
	$a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
	$a -> getorImagenesInicioAjax();
}

if(isset($_POST["tabla"])){
	$b = new gestorInicioAjax();
	$b -> tabla = $_POST["tabla"];
	$b -> selectEditarInicioAjax();
}
