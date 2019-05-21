<?php 

require_once "conexion.php";

class gestorProgramasAcademicosModel extends Conexion
{

#OBTENER LA LISTA DE PERFILES ACTUALES
	#----------------------------------------------------------------------------------------------------------	
	public function  getProgramAcademicosModel($tabla)
	{

		$stmt = Conexion::conectaDB()->prepare("SELECT id_carrera, descor, deslar, estado FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

#CREAR NUEVOS PERFILES
	#-----------------------------------------------------------------------------------------------------
	public function createCarrerasModel($tabla, $datosModel)
	{

		$stmt = Conexion::conectaDB()->prepare("INSERT INTO $tabla (descor,deslar,estado) VALUES ( :descor, :deslar, 'AC')");

		$stmt -> bindParam(":descor", $datosModel["descorCarrera"], PDO::PARAM_STR);
		$stmt -> bindParam(":deslar", $datosModel["deslarCarrera"], PDO::PARAM_STR);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

# ACTUALIZAR PERFILES ACTUALES
	#--------------------------------------------------------------------------------
	public function updateCarrerasModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("UPDATE $tabla SET descor=:descor, deslar=:deslar, estado='AC' WHERE id_carrera=:idCarrera");

		$stmt -> bindParam(":descor", $datosModel["editarDescorCarr"], PDO::PARAM_STR);
		$stmt -> bindParam(":deslar", $datosModel["editarDeslarCarr"], PDO::PARAM_STR);
		$stmt -> bindParam(":idCarrera", $datosModel["idCarreraEditar"], PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

# ELIMINAR CARREAS ACTUALES
	#--------------------------------------------------------------------------------
	public function deleteCarrerasModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("UPDATE $tabla SET estado='IN' WHERE id_carrera=:idCarrera");

		$stmt -> bindParam(":idCarrera", $datosModel, PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

	
}