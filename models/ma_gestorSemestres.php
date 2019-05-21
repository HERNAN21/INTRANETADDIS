<?php 

require_once "conexion.php";

class gestorSemestresModel extends Conexion
{

#OBTENER LA LISTA DE PERFILES ACTUALES
	#----------------------------------------------------------------------------------------------------------	
	public function  getAllSemestresModel($tabla)
	{

		$stmt = Conexion::conectaDB()->prepare("SELECT id_semestre, descor, deslar, estado FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

#CREAR NUEVOS PERFILES
	#-----------------------------------------------------------------------------------------------------
	public function createSemestreModel($tabla, $datosModel)
	{

		$stmt = Conexion::conectaDB()->prepare("INSERT INTO $tabla (descor,deslar,estado) VALUES ( :descor, :deslar, 'AC')");

		$stmt -> bindParam(":descor", $datosModel["DescorSemestre"], PDO::PARAM_STR);
		$stmt -> bindParam(":deslar", $datosModel["DeslarSemestre"], PDO::PARAM_STR);

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

		$stmt = Conexion::conectaDB()->prepare("UPDATE $tabla SET descor=:descor, deslar=:deslar, estado='AC' WHERE id_semestre=:idSemestre");

		$stmt -> bindParam(":descor", $datosModel["DescorSemestre"], PDO::PARAM_STR);
		$stmt -> bindParam(":deslar", $datosModel["DeslarSemestre"], PDO::PARAM_STR);
		$stmt -> bindParam(":idSemestre", $datosModel["idSemestre"], PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

# ELIMINAR CICLOS ACTUALES
	#--------------------------------------------------------------------------------
	public function deleteSemestreModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("UPDATE $tabla SET estado='IN' WHERE id_semestre=:idSemestre");

		$stmt -> bindParam(":idSemestre", $datosModel, PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}


	
}