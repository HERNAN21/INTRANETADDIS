<?php 

require_once "../../models/mn_notas.php";
require_once "../../controllers/mn_notas.php";

class NotasAlumnoAjax
{

	public $idCiclo;

	public function getNotasAjax(){

		$datos = $this->idCiclo;

		$respuesta = NotasAlumnoController::getNotasController($datos);

		echo $respuesta;
	}


}

$a = new NotasAlumnoAjax();
$a -> idCiclo = $_POST["idCiclo"];
$a -> getNotasAjax();