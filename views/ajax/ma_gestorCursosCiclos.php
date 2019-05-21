<?php 

require_once "../../controllers/ma_gestorCursosCiclos.php";
require_once "../../models/ma_gestorCursosCiclos.php";

class GestorCursosCiclosAjax{

#============= METODOS ===========================

#BUSCAR CARRERAS MODAL
	#-------------------------------------------------------------------------
	public $curso;
	public function searchCursosAjax(){

		$datos = $this -> curso;

		$respuesta = GestorCursosCiclosController::searchCursosController($datos);

		echo $respuesta;

	}

#MOSTRAR DATOS CURSO
	public $codcurso;
	public function getDataCursoAjax(){

		$datos = $this -> codcurso;

		$respuesta = GestorCursosCiclosController::getDataCursoController($datos);

		echo $respuesta;

	}

#MOSTRAR TABLA DE ASIGNACION DE PERFILES
	#-----------------------------------------------------------------------------
	public $codCursoAsig;
	public function viewCarrerasCursosAjax(){

		$datos = $this -> codCarreraAsig;

		$respuesta = GestorCursosCiclosController::viewCarrerasCursosController($datos);

		echo $respuesta;

	}

// #INSERTAR ASIGNACION DE CURSOS-CARRERAS
// 	#-----------------------------------------------------------------------------
// 	public $idCarreraAsigI;
// 	public $idCursoAsigI;
// 	public function insertCarrerasCursosAjax(){

// 		$datos = array( "idCarrera" => $this -> idCarreraAsigI, "idCurso" => $this -> idCursoAsigI);

// 		$respuesta = GestorCursosCiclosController::insertCarrerasCursosController($datos);

// 		echo $respuesta;

// 	}

// #INSERTAR ASIGNACION DE CURSOS-CARRERAS
// 	#-----------------------------------------------------------------------------
// 	public $idCarreraAsigD;
// 	public $idCursoAsigD;
// 	public function deleteCarrerasCursosAjax(){

// 		$datos = array( "idCarrera" => $this -> idCarreraAsigD, "idCurso" => $this -> idCursoAsigD);

// 		$respuesta = GestorCursosCiclosController::deleteCarrerasCursosController($datos);

// 		echo $respuesta;

// 	}

}

#============= OBJETOS ===========================

#BUSCAR CARRERAS MODAL
	#-------------------------------------------------------------------------
	if(isset($_POST["searchCurso"])){
		$a = new GestorCursosCiclosAjax();
		$a -> curso = $_POST["searchCurso"];
		$a -> searchCursosAjax();
	}

#DATA CARRERA ASIGNACION
	#-------------------------------------------------------------------------
	if(isset($_POST["cod"])){
		$a = new GestorCursosCiclosAjax();
		$a -> codcurso = $_POST["cod"];
		$a -> getDataCursoAjax();
	}

// #TABLA DE LISTADO ASIGNACION
// 	#-------------------------------------------------------------------------
// 	if(isset($_POST["idCarreraAsig"])){
// 		$a = new GestorCursosCiclosAjax();
// 		$a -> codCarreraAsig = $_POST["idCarreraAsig"];
// 		$a -> viewCarrerasCursosAjax();
// 	}

// #INSERTAR ASIGNACION DE CARRERAS
// 	#-----------------------------------------------------------------------------
// 	if(isset($_POST["idCarreraAsigI"])){
// 		$d = new GestorCursosCiclosAjax();
// 		$d -> idCarreraAsigI = $_POST["idCarreraAsigI"];
// 		$d -> idCursoAsigI = $_POST["idCursoAsigI"];
// 		$d -> insertCarrerasCursosAjax();
// 	}

// #ELIMINAR ASIGNACION DE CARRERAS
// 	#-----------------------------------------------------------------------------
// 	if(isset($_POST["idCarreraAsigD"])){
// 		$d = new GestorCursosCiclosAjax();
// 		$d -> idCarreraAsigD = $_POST["idCarreraAsigD"];
// 		$d -> idCursoAsigD = $_POST["idCursoAsigD"];
// 		$d -> deleteCarrerasCursosAjax();
// 	}

// 	SELECT curCic.id_ciclo, curCic.id_curso, cur.deslar, ci.descor, car.descor
// FROM cursos_ciclo curCic
// INNER JOIN ciclo ci ON curCic.id_ciclo = ci.id_ciclo
// INNER JOIN cursos cur ON curCic.id_curso = cur.id_curso
// INNER JOIN carreras_cursos carCur ON carCur.id_curso = cur.id_curso
// INNER JOIN carreras car ON carCur.id_carrera = car.id_carrera