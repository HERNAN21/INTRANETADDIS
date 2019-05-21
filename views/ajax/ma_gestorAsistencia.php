<?php 

require_once "../../controllers/ma_gestorAsistencia.php";
require_once "../../models/ma_gestorAsistencia.php";

class gestorAsistenciaAjax{

	public $carrera;
 	public $ciclo;
 	public $idUsuario;
	public function getSelectCursoAjax(){

		$datos = array("carrera"=> $this -> carrera, "ciclo"=>$this -> ciclo, "idUsuario"=> $this -> idUsuario);

		$respuesta = gestorAsistenciaController::getSelectCursosMostrarController($datos);

		echo $respuesta;

	}

	public $lsIdCarrera;
	public $lsIdCiclo;
	public $lsIdSeccion;
	public $lsIdCurso;
	public function getAllAsistenciaAjax(){

		$datos = array("lsCarrera"=>$this -> lsIdCarrera,"lsCiclo"=>$this -> lsIdCiclo,"lsSeccion"=>$this -> lsIdSeccion,
								"lsCurso"=>$this -> lsIdCurso);

		$respuesta = gestorAsistenciaController::getAllAsistenciaController($datos);

		echo $respuesta;

	}

	public $lacarrera;
	public $laciclo;
	public $laseccion;
	public $lacurso;
	public function getAllAlumnoAjax(){

		$datos = array("carreras"=>$this -> lacarrera,"ciclos"=>$this -> laciclo,"secciones"=>$this -> laseccion);

		$respuesta = gestorAsistenciaController::getAllAlumnos($datos);

		echo $respuesta;

	}

	public $alumnos;
	public $incarrera;
	public $inciclo;
	public $inseccion;
	public $incurso;
	public $inusuario;
	public function asistenciaAlumnosAjax(){

	$datos = array("inCarrera"=>$this -> incarrera,"inCiclo"=>$this -> inciclo,"inSeccion"=>$this -> inseccion,
							"inCurso"=>$this -> incurso,"inUsuario"=>$this -> inusuario,"alumnos"=>$this -> alumnos);

	$respuesta = gestorAsistenciaController::insertarAsistenciaController($datos);

	echo $respuesta;

	}

	public $idAsistencia;
	public function deleteAsistenciaAjax(){

		$datos = array("idAsistencia"=> $this -> idAsistencia);

		$respuesta=gestorAsistenciaController::deleteAsistenciaController($datos);

		echo $respuesta;

	}

}

if(isset($_POST["idCarrera"]) && isset($_POST["codUsuario"])){
  $getCurso = new gestorAsistenciaAjax();
  $getCurso -> carrera = $_POST["idCarrera"];
  $getCurso -> ciclo = $_POST["idCiclo"];
  $getCurso -> idUsuario = $_POST["codUsuario"];
  $getCurso -> getSelectCursoAjax();
}

if(isset($_POST["idSeccion"])){
  $lista = new gestorAsistenciaAjax();
  $lista -> lsIdCarrera = $_POST["idCarrera"];
  $lista -> lsIdCiclo = $_POST["idCiclo"];
  $lista -> lsIdSeccion = $_POST["idSeccion"];
  $lista -> lsIdCurso = $_POST["idCursos"];
  $lista -> getAllAsistenciaAjax();
}

if (isset($_POST["laCarrera"])) {
  $alumno = new gestorAsistenciaAjax();
  $alumno -> lacarrera = $_POST["laCarrera"];
  $alumno -> laciclo = $_POST["laCiclo"];
  $alumno -> laseccion = $_POST["laSeccion"];
  $alumno -> getAllAlumnoAjax();
}

if (isset($_POST["alumno"])) {
  $asis = new gestorAsistenciaAjax();
  $asis -> incarrera = $_POST["carrera"];
  $asis -> inciclo = $_POST["ciclo"];
  $asis -> inseccion = $_POST["seccion"];
  $asis -> incurso = $_POST["curso"];
  $asis -> inusuario = $_POST["usuario"];
  $asis -> alumnos = $_POST["alumno"];
  $asis -> asistenciaAlumnosAjax();
}

if (isset($_POST["idAsistencia"])) {
  $del = new gestorAsistenciaAjax();
  $del -> idAsistencia = $_POST["idAsistencia"];
  $del -> deleteAsistenciaAjax();
}