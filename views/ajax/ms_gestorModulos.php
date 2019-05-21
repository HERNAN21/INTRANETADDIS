<?php 

require_once "../../controllers/ms_gestorModulos.php";
require_once "../../models/ms_gestorModulos.php";

class ModulosAjax 
{
#============= METODOS ===========================

#MOSTRAR DATOS MODULO
	#---------------------------------------------------------------------------
	public $idModulo;
	public function showDataEditarAjax(){

		$datos = $this -> idModulo;

		$respuesta = ModulosController::showDataEditarController($datos);

		echo $respuesta;

	}

}

#DATA DE MODAL DE EDICION DE SUB-MODULOS
	#-----------------------------------------------------------------------------
	if(isset($_POST["idModulo"])){
		$a = new ModulosAjax();
		$a -> idModulo = $_POST["idModulo"];
		$a -> showDataEditarAjax();
	}