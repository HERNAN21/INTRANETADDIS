<?php 

require_once "conexion.php";

class gestorCiclosModel extends Conexion
{

#OBTENER LA LISTA DE PERFILES ACTUALES
	#----------------------------------------------------------------------------------------------------------	
	public function  getAllCiclosModel($tabla)
	{

		$stmt = Conexion::conectaDB()->prepare("SELECT id_ciclo, descor, deslar, estado FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

#CREAR NUEVOS PERFILES
	#-----------------------------------------------------------------------------------------------------
	public function createCiclosModel($tabla, $datosModel)
	{

		$stmt = Conexion::conectaDB()->prepare("INSERT INTO $tabla (descor,deslar,estado) VALUES ( :descor, :deslar, 'AC')");

		$stmt -> bindParam(":descor", $datosModel["DescorCiclo"], PDO::PARAM_STR);
		$stmt -> bindParam(":deslar", $datosModel["DeslarCiclo"], PDO::PARAM_STR);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

# ACTUALIZAR PERFILES ACTUALES
	#--------------------------------------------------------------------------------
	public function updateCiclosModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("UPDATE $tabla SET descor=:descor, deslar=:deslar, estado='AC' WHERE id_ciclo=:idCiclo");

		$stmt -> bindParam(":descor", $datosModel["DescorCiclo"], PDO::PARAM_STR);
		$stmt -> bindParam(":deslar", $datosModel["DeslarCiclo"], PDO::PARAM_STR);
		$stmt -> bindParam(":idCiclo", $datosModel["idCiclo"], PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

# ELIMINAR CICLOS ACTUALES
	#--------------------------------------------------------------------------------
	public function deleteCiclosModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("UPDATE $tabla SET estado='IN' WHERE id_ciclo=:idCiclo");

		$stmt -> bindParam(":idCiclo", $datosModel, PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}


	
}