<?php 

require_once "../../controllers/ms_gestorPerfiles.php";
require_once "../../models/ms_gestorPerfiles.php";

class PerfilesAjax 
{
	
	public function getPerfilesAjax()
	{

			$respuesta = PerfilesController::getPerfilesController();

			echo $respuesta;	

	}

}

$a = new PerfilesAjax();
$a -> getPerfilesAjax();

