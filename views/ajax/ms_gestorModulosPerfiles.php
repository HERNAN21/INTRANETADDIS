<?php 

require_once "../../controllers/ms_gestorModulosPerfiles.php";
require_once "../../models/ms_gestorModulosPerfiles.php";

class GestorModulosPerfilesAjax
{
#============= METODOS ===========================

#BUSCAR PERFILES MODAL
	#-------------------------------------------------------------------------
	public $perfil;
	public function searchPerfilesAjax()
	{
		$datos = $this -> perfil;

		$respuesta = GestorModulosPerfilesController::searchPerfilesController($datos);

		echo $respuesta;
	}

#MOSTRAR DATOS PERFIL
	#---------------------------------------------------------------------------
	public $codPerfil;
	public function showDataPerfilesAjax(){

		$datos = $this -> codPerfil;

		$respuesta = GestorModulosPerfilesController::showDataPerfilesController($datos);

		echo $respuesta;

	}

#MOSTRAR TABLA DE ASIGNACION DE PERFILES
	#-----------------------------------------------------------------------------
	public $idPerfilAsig;
	public function viewModulosperfilesAjax(){

		$datos = $this -> idPerfilAsig;

		$respuesta = GestorModulosPerfilesController::viewModulosperfilesController($datos);

		echo $respuesta;

	}

#INSERTAR ASIGNACION DE MODULOS-PERFILES
	#-----------------------------------------------------------------------------
	public $idPerfilAsigI;
	public $idModuloAsigI;
	public function insertModulosperfilesAjax(){

		$datos = array( "idPerfil" => $this -> idPerfilAsigI, "idModulo" => $this -> idModuloAsigI);

		$respuesta = GestorModulosPerfilesController::insertModulosperfilesController($datos);

		echo $respuesta;

	}

#INSERTAR ASIGNACION DE MODULOS-PERFILES
	#-----------------------------------------------------------------------------
	public $idPerfilAsigD;
	public $idModuloAsigD;
	public function deleteModulosperfilesAjax(){

		$datos = array( "idPerfil" => $this -> idPerfilAsigD, "idModulo" => $this -> idModuloAsigD);

		$respuesta = GestorModulosPerfilesController::deleteModulosperfilesController($datos);

		echo $respuesta;

	}

}


#============= OBJETOS ===========================

#BUSCAR PERFILES MODAL
	#-------------------------------------------------------------------------
	if(isset($_POST["search"])){
		$a = new gestorModulosPerfilesAjax();
		$a -> perfil = $_POST["search"];
		$a -> searchPerfilesAjax();
	}

#MOSTRAR DATA ASIGNACION
	#-------------------------------------------------------------------------
	if(isset($_POST["cod"])){
		$b = new gestorModulosPerfilesAjax();
		$b -> codPerfil = $_POST["cod"];
		$b -> showDataPerfilesAjax();
	}

#MOSTRAR TABLA DE ASIGNACION DE PERFILES
	#-----------------------------------------------------------------------------
	if(isset($_POST["idPerfilAsig"])){
		$c = new gestorModulosPerfilesAjax();
		$c -> idPerfilAsig = $_POST["idPerfilAsig"];
		$c -> viewModulosperfilesAjax();
	}

#INSERTAR ASIGNACION DE PERFILES
	#-----------------------------------------------------------------------------
	if(isset($_POST["idPerfilAsigI"])){
		$d = new gestorModulosPerfilesAjax();
		$d -> idPerfilAsigI = $_POST["idPerfilAsigI"];
		$d -> idModuloAsigI = $_POST["idModuloAsigI"];
		$d -> insertModulosperfilesAjax();
	}

#ELIMINAR ASIGNACION DE PERFILES
	#-----------------------------------------------------------------------------
	if(isset($_POST["idPerfilAsigD"])){
		$d = new gestorModulosPerfilesAjax();
		$d -> idPerfilAsigD = $_POST["idPerfilAsigD"];
		$d -> idModuloAsigD = $_POST["idModuloAsigD"];
		$d -> deleteModulosperfilesAjax();
	}