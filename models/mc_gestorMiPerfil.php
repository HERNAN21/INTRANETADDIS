<?php 

require_once "conexion.php";

class GestorMiPerfilModel
{

	public function guardarFotoUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB() -> prepare("UPDATE $tabla SET foto= :foto WHERE id_usuario= :id");
		

		$stmt -> bindParam(":foto", $datosModel["rutaFoto"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["idUsuario"], PDO::PARAM_STR);

		if ($stmt -> execute()){

			 return "ok";

		}else{

			return "error";

		}

		$stmt -> close();


	}

	public function updatePasswordusuarioModel($datosModel, $tabla){

		$passwordActual = $datosModel["passwordActual"];
		$passwordNueva = $datosModel["passwordNueva"];
		$usuario = $datosModel["id_usuario"];
		$tabla = $tabla;


	}
	
	
}