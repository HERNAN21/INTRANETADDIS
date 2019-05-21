<?php 

require_once "../../models/mn_gestorNotas.php";
require_once "../../controllers/mn_gestorNotas.php";

class gestorNotasAjax{

# ======  METODOS  =======

#OBTENER LOS CICLOS
	#------------------------------------------------------------------------------------
	public $idCarrera;
	public $idUser;
	public function getCiclosAjax(){

		$datos = array('idCarrera' => $this -> idCarrera, 'idUser' => $this -> idUser);

		$respuesta = gestorNotasController::getCiclosController($datos);

		echo $respuesta;
	}

#OBTENER LAS SECCIONES
	#------------------------------------------------------------------------------------
	public $idCiclo;
	public $idUsuario;
	public function getCursosAjax(){

		$datos = array("idCarrera" => $this -> idCarrera, "idCiclo" => $this -> idCiclo, "idUsuario" => $this -> idUsuario);

		$respuesta = gestorNotasController::getCursosController($datos);

		echo $respuesta;
	}



#OBTENER EL LISTADO DE ALUMNOS
	#----------------------------------------------------------------------------------------
	public $idSeccion;
	public $idCarrera2;
	public $idCiclo2;
	public function getAlumnosNotasAjax(){

		$datos = array("idCarrera" => $this-> idCarrera2, "idCiclo" => $this-> idCiclo2, "idSeccion" => $this-> idSeccion );

		$respuesta = gestorNotasController::getAlumnosController($datos);

		echo $respuesta;
	}


#OBTENER LAS NOTAS DE LOS ALUMNOS
	#----------------------------------------------------------------------------------------
	public $idAlumno;
	public $idCiclo3;

	public function getNotasAlumnosAjax(){

		$datos = array("idAlumno" => $this-> idAlumno, "idCiclo" => $this-> idCiclo3);

		$respuesta = gestorNotasController::getNotasAlumnosController($datos);

		echo $respuesta;
	}

#INSERTAR LAS NOTAS DE LOS ALUMNOS
	#----------------------------------------------------------------------------------------
	public $idAlumnoI;
	public $idCursoI;
	public $idCicloI;
	public $tNotaI;
	public $notaI;
	public $porcentajeI;

	public function insertNotasAjax(){

		$datos = array("idAlumnoI" => $this-> idAlumnoI, "idCursoI" => $this-> idCursoI, "idCicloI" => $this-> idCicloI, 
								"tNotaI" => $this-> tNotaI, "notaI" => $this-> notaI, "porcentajeI" => $this-> porcentajeI );

		$respuesta = gestorNotasController::insertNotasController($datos);

		$respuesta;
		
	}

#ACTUALIZAR LAS NOTAS DE LOS ALUMNOS
	#----------------------------------------------------------------------------------------
	public $idNotaE;
	public $upIdNota;
	public $upTnota;
	public $upNota;
	public $upPorcentaje;

	public function dataUpdateNotasAjax(){

		$datos = $this-> idNotaE;

		$respuesta = gestorNotasController::dataUpdateNotasController($datos);

		echo $respuesta;

	}

	public function updateNotasAjax(){

		$datos = array("upIdNota" => $this-> upIdNota, "upTnota" => $this-> upTnota, "upNota" => $this-> upNota,
						"upPorcentaje" => $this-> upPorcentaje );

		$respuesta = gestorNotasController::updateNotasController($datos);

		echo $respuesta;
		
	}


#ElIMINAR LAS NOTAS DE LOS ALUMNOS
	#----------------------------------------------------------------------------------------
	public $idNota;

	public function deleteNotasAjax(){

		$datos =  $this-> idNota;

		$respuesta = gestorNotasController::deleteNotasController($datos);

		echo $respuesta;
		
	}

}

# ====== OBJETOS  =======

#OBTENER LOS CICLOS
	#------------------------------------------------------------------------------------
	if (isset($_POST["idCarrera"]) && isset($_POST["idUser"])) {
		$a = new gestorNotasAjax();
		$a -> idCarrera = $_POST["idCarrera"];
		$a -> idUser = $_POST["idUser"];
		$a  -> getCiclosAjax();
	}

#OBTENER LAS SECCIONES
	#------------------------------------------------------------------------------------
	if (isset($_POST["idCarrera"]) && isset($_POST["codUsuario"])) {
		$a = new gestorNotasAjax();
		$a -> idCarrera = $_POST["idCarrera"];
		$a -> idCiclo = $_POST["idCiclo"];
		$a -> idUsuario = $_POST["codUsuario"];
		$a  -> getCursosAjax();
	}


#OBTENER EL LISTADO DE ALUMNOS
	#----------------------------------------------------------------------------------------
	if(isset($_POST["idSeccion"])){
		$b = new gestorNotasAjax();
		$b -> idCarrera2 = $_POST["idCarrera"];
		$b -> idCiclo2 = $_POST["idCiclo"];
		$b -> idSeccion = $_POST["idSeccion"];
		$b -> getAlumnosNotasAjax();
	}

#OBTENER LAS NOTAS DE LOS ALUMNOS
	#----------------------------------------------------------------------------------------
if(isset($_POST["idCicloR"])){
	$c = new gestorNotasAjax();
	$c -> idAlumno = $_POST["idAlumno"];
	$c -> idCiclo3 = $_POST["idCicloR"];
	$c -> getNotasAlumnosAjax();
}

#INSERTAR LAS NOTAS DE LOS ALUMNOS
	#----------------------------------------------------------------------------------------
if(isset($_POST["nota"])){
	$d = new gestorNotasAjax();
	$d -> idAlumnoI = $_POST["idAlumno"];
	$d -> idCursoI = $_POST["idCurso"];
	$d -> idCicloI = $_POST["idCiclo"];
	$d -> tNotaI = $_POST["tNota"];
	$d -> notaI = $_POST["nota"];
	$d -> porcentajeI = $_POST["porcentaje"];
	$d -> insertNotasAjax();
}

#ACTUALIZAR LAS NOTAS DE LOS ALUMNOS
	#----------------------------------------------------------------------------------------
if(isset($_POST["idNotaE"])){
	$f = new gestorNotasAjax();
	$f -> idNotaE = $_POST["idNotaE"];
	$f -> dataUpdateNotasAjax();
}

if(isset($_POST["tNotaUp"])){
	$d = new gestorNotasAjax();
	$d -> upIdNota = $_POST["idNotaUp"];
	$d -> upTnota = $_POST["tNotaUp"];
	$d -> upNota = $_POST["notaUp"];
	$d -> upPorcentaje = $_POST["porcentajeUp"];
	$d -> updateNotasAjax();
}

#ElIMINAR LAS NOTAS DE LOS ALUMNOS
	#----------------------------------------------------------------------------------------
	if(isset($_POST["idNota"])){
	$e = new gestorNotasAjax();
	$e -> idNota = $_POST["idNota"];
	$e -> deleteNotasAjax();
}
