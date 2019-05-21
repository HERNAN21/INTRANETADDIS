<?php 

require_once "conexion.php";

class PerfilesModel extends Conexion
{

#OBTENER LA LISTA DE PERFILES ACTUALES
	#----------------------------------------------------------------------------------------------------------	
	public function getPerfilesModel($tabla)
	{

		$stmt = Conexion::conectaDB()->prepare("SELECT id_perfil, descor, deslar, estado FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

#CREAR NUEVOS PERFILES
	#-----------------------------------------------------------------------------------------------------
	public function createPerfilesModel($tabla, $datosModel)
	{

		$stmt = Conexion::conectaDB()->prepare("INSERT INTO $tabla (descor,deslar,estado) VALUES ( :descor, :deslar, 'AC')");

		$stmt -> bindParam(":descor", $datosModel["desCorta"], PDO::PARAM_STR);
		$stmt -> bindParam(":deslar", $datosModel["desLarga"], PDO::PARAM_STR);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

# ACTUALIZAR PERFILES ACTUALES
	#--------------------------------------------------------------------------------
	public function updatePerfilesModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("UPDATE $tabla SET descor=:descor, deslar=:deslar, estado='AC' WHERE id_perfil=:idPerfil");

		$stmt -> bindParam(":descor", $datosModel["descorUp"], PDO::PARAM_STR);
		$stmt -> bindParam(":deslar", $datosModel["deslarUp"], PDO::PARAM_STR);
		$stmt -> bindParam(":idPerfil", $datosModel["idPerfil"], PDO::PARAM_STR);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

# ELIMINAR PERFILES ACTUALES
	#--------------------------------------------------------------------------------
	public function deletePerfilesModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("UPDATE $tabla SET estado='IN' WHERE id_perfil=:idPerfil");

		$stmt -> bindParam(":idPerfil", $datosModel, PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

}