<?php 

require_once "../../controllers/ms_gestorCarrerasCursos.php";
require_once "../../models/ms_gestorCarrerasCursos.php";

class GestorCarrerasAjax{

#============= METODOS ===========================

#BUSCAR CARRERAS MODAL
	#-------------------------------------------------------------------------
	public $carrera;
	public function searchCarrerasAjax(){
		$datos = $this -> carrera;

		$respuesta = GestorCarrerasCursosController::searchCarrerasController($datos);

		echo $respuesta;
	}

#MOSTRAR DATOS CARRERA
	public $codcarrera;
	public function getDataCarreraAjax(){
		$datos = $this -> codcarrera;

		$respuesta = GestorCarrerasCursosController::getDataCarreraController($datos);

		echo $respuesta;

	}

#MOSTRAR TABLA DE ASIGNACION DE PERFILES
	#-----------------------------------------------------------------------------
	public $codCarreraAsig;
	public function viewCarrerasCursosAjax(){

		$datos = $this -> codCarreraAsig;

		$respuesta = GestorCarrerasCursosController::viewCarrerasCursosController($datos);

		echo $respuesta;

	}

#INSERTAR ASIGNACION DE CURSOS-CARRERAS
	#-----------------------------------------------------------------------------
	public $idCarreraAsigI;
	public $idCursoAsigI;
	public function insertCarrerasCursosAjax(){

		$datos = array( "idCarrera" => $this -> idCarreraAsigI, "idCurso" => $this -> idCursoAsigI);

		$respuesta = GestorCarrerasCursosController::insertCarrerasCursosController($datos);

		echo $respuesta;

	}

#INSERTAR ASIGNACION DE CURSOS-CARRERAS
	#-----------------------------------------------------------------------------
	public $idCarreraAsigD;
	public $idCursoAsigD;
	public function deleteCarrerasCursosAjax(){

		$datos = array( "idCarrera" => $this -> idCarreraAsigD, "idCurso" => $this -> idCursoAsigD);

		$respuesta = GestorCarrerasCursosController::deleteCarrerasCursosController($datos);

		echo $respuesta;

	}

}

#============= OBJETOS ===========================

#BUSCAR CARRERAS MODAL
	#-------------------------------------------------------------------------
	if(isset($_POST["searchCarrera"])){
		$a = new GestorCarrerasAjax();
		$a -> carrera = $_POST["searchCarrera"];
		$a -> searchCarrerasAjax();
	}

#DATA CARRERA ASIGNACION
	#-------------------------------------------------------------------------
	if(isset($_POST["cod"])){
		$a = new GestorCarrerasAjax();
		$a -> codcarrera = $_POST["cod"];
		$a -> getDataCarreraAjax();
	}

#TABLA DE LISTADO ASIGNACION
	#-------------------------------------------------------------------------
	if(isset($_POST["idCarreraAsig"])){
		$a = new GestorCarrerasAjax();
		$a -> codCarreraAsig = $_POST["idCarreraAsig"];
		$a -> viewCarrerasCursosAjax();
	}

#INSERTAR ASIGNACION DE CARRERAS
	#-----------------------------------------------------------------------------
	if(isset($_POST["idCarreraAsigI"])){
		$d = new GestorCarrerasAjax();
		$d -> idCarreraAsigI = $_POST["idCarreraAsigI"];
		$d -> idCursoAsigI = $_POST["idCursoAsigI"];
		$d -> insertCarrerasCursosAjax();
	}

#ELIMINAR ASIGNACION DE CARRERAS
	#-----------------------------------------------------------------------------
	if(isset($_POST["idCarreraAsigD"])){
		$d = new GestorCarrerasAjax();
		$d -> idCarreraAsigD = $_POST["idCarreraAsigD"];
		$d -> idCursoAsigD = $_POST["idCursoAsigD"];
		$d -> deleteCarrerasCursosAjax();
	}