<?php 

require_once "../../controllers/ms_gestorPerfilesUsuarios.php";
require_once "../../models/ms_gestorPerfilesUsuarios.php";

class GestorPerfilesUsuarioAjax
{
#============= METODOS ===========================

#BUSCAR USUARIOS MODAL
	#-------------------------------------------------------------------------
	public $usuario;
	public function searchUsuariosAjax()
	{
		$datos = $this -> usuario;

		$respuesta = GestorPerfilesUsuariosController::searchUsuariosController($datos);

		echo $respuesta;
	}

#MOSTRAR DATOS USUARIO
	#---------------------------------------------------------------------------
	public $codUsuario;
	public function showDataUsuariosAjax(){

		$datos = $this -> codUsuario;

		$respuesta = GestorPerfilesUsuariosController::showDataUsuariosController($datos);

		echo $respuesta;

	}

#MOSTRAR TABLA DE ASIGNACION DE USUARIOS - PERFILES
	#-----------------------------------------------------------------------------
	public $idUsuarioAsig;
	public function viewPerfilesUsuariosAjax(){

		$datos = $this -> idUsuarioAsig;

		$respuesta = GestorPerfilesUsuariosController::viewPerfilesUsuariosController($datos);

		echo $respuesta;

	}

#INSERTAR ASIGNACION DE PERFILES-USUARIOS
	#-----------------------------------------------------------------------------
	public $idUsuarioAsigI;
	public $idPerfilAsigI;
	public function insertPerfilesUsuariosAjax(){

		$datos = array( "idUsuario" => $this -> idUsuarioAsigI, "idPerfil" => $this -> idPerfilAsigI);

		$respuesta = GestorPerfilesUsuariosController::insertPerfilesUsuariosController($datos);

		echo $respuesta;

	}

#INSERTAR ASIGNACION DE MODULOS-PERFILES
	#-----------------------------------------------------------------------------
	public $idUsuarioAsigD;
	public $idPerfilAsigD;
	public function deletePerfilesUsuariosAjax(){

		$datos = array( "idUsuario" => $this -> idUsuarioAsigD, "idPerfil" => $this -> idPerfilAsigD);

		$respuesta = GestorPerfilesUsuariosController::deletePerfilesUsuariosController($datos);

		echo $respuesta;

	}

}


#============= OBJETOS ===========================

#BUSCAR PERFILES MODAL
	#-------------------------------------------------------------------------
	if(isset($_POST["searchU"])){
		$a = new GestorPerfilesUsuarioAjax();
		$a -> usuario = $_POST["searchU"];
		$a -> searchUsuariosAjax();
	}

#MOSTRAR DATA ASIGNACION
	#-------------------------------------------------------------------------
	if(isset($_POST["cod"])){
		$b = new GestorPerfilesUsuarioAjax();
		$b -> codUsuario = $_POST["cod"];
		$b -> showDataUsuariosAjax();
	}

#MOSTRAR TABLA DE ASIGNACION DE USUARIOS
	#-----------------------------------------------------------------------------
	if(isset($_POST["idUsuarioAsig"])){
		$c = new GestorPerfilesUsuarioAjax();
		$c -> idUsuarioAsig = $_POST["idUsuarioAsig"];
		$c -> viewPerfilesUsuariosAjax();
	}

#INSERTAR ASIGNACION DE PERFILES-USUARIOS
	#-----------------------------------------------------------------------------
	if(isset($_POST["idUsuarioAsigI"])){
		$d = new GestorPerfilesUsuarioAjax();
		$d -> idUsuarioAsigI = $_POST["idUsuarioAsigI"];
		$d -> idPerfilAsigI = $_POST["idPerfilAsigI"];
		$d -> insertPerfilesUsuariosAjax();
	}

#ELIMINAR ASIGNACION DE PERFILES-USUARIOS
	#-----------------------------------------------------------------------------
	if(isset($_POST["idUsuarioAsigD"])){
		$d = new GestorPerfilesUsuarioAjax();
		$d -> idUsuarioAsigD = $_POST["idUsuarioAsigD"];
		$d -> idPerfilAsigD = $_POST["idPerfilAsigD"];
		$d -> deletePerfilesUsuariosAjax();
	}