<?php 

require_once "../../models/mn_misCursos.php";
require_once "../../controllers/mn_misCursos.php";

class MisCursosAjax{

	public $idAlumno;
	public $idCiclo;
	public function getCursosAlumnosAjax(){

		$datos = array('idAlumno' => $this -> idAlumno, 'idCiclo' => $this -> idCiclo );;

		$respuesta = MisCursosController::getCursosAlumnosController($datos);

		echo $respuesta;

	}

	public $idCicloAlumno;
	public $idAlumno1;
	public function getCuentasAlumnosAjax(){

		$datos = array('idAlumno' => $this -> idAlumno1, 'idCiclo' => $this -> idCicloAlumno );;

		$respuesta = MisCursosController::getCuentasAlumnosController($datos);

		$respuesta;

	}

}

if(isset($_POST["idCiclo"])){
	$a = new MisCursosAjax();
	$a -> idCiclo = $_POST["idCiclo"];
	$a -> idAlumno = $_POST["idUser"];
	$a -> getCursosAlumnosAjax();
}

if(isset($_POST["idCicloAlumno"])){
	$b = new  MisCursosAjax();
	$b -> idCicloAlumno = $_POST["idCicloAlumno"];
	$b -> idAlumno1 = $_POST["idUser"];
	$b -> getCuentasAlumnosAjax();
}
