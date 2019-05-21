<?php 

require_once "../../controllers/ms_gestorUsuarios.php";
require_once "../../models/ms_gestorUsuarios.php";

class UsuariosAjax 
{
#============= METODOS ===========================

#BUSCAR PERSONAS MODAL
	#-------------------------------------------------------------------------
	public $persona;
	public function searchPersonasAjax()
	{
		$datos = $this -> persona;

		$respuesta = UsuariosController::searchPersonasController($datos);

		echo $respuesta;
	}

#MOSTRAR DATOS PERFIL
	#---------------------------------------------------------------------------
	public $codPersona;
	public function showDataUsuariosAjax(){

		$datos = $this -> codPersona;

		$respuesta = UsuariosController::showDataController($datos);

		echo $respuesta;

	}

#DATA DE MOADAL DE EDICION DE USUARIOS
	#-----------------------------------------------------------------------------
	public $idUser;
	public function dataUsuariosAjax(){

		$datos = $this -> idUser;

		$respuesta = UsuariosController::dataUsuariosController($datos);

		echo $respuesta;

	}

}


#============= OBJETOS ===========================

#BUSCAR PERFILES MODAL
	#-------------------------------------------------------------------------
	if(isset($_POST["searchPersona"])){
		$a = new UsuariosAjax();
		$a -> persona = $_POST["searchPersona"];
		$a -> searchPersonasAjax();
	}

#BUSCAR PERFILES MODAL
	#-------------------------------------------------------------------------
	if(isset($_POST["cod"])){
		$a = new UsuariosAjax();
		$a -> codPersona = $_POST["cod"];
		$a -> showDataUsuariosAjax();
	}

#DATA DE MODAL DE EDICION DE USUARIOS
	#-----------------------------------------------------------------------------
	if(isset($_POST["idUser"])){
		$a = new UsuariosAjax();
		$a -> idUser = $_POST["idUser"];
		$a -> dataUsuariosAjax();
	}