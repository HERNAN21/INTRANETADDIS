<?php 

require_once "conexion.php";

class gestorCursosModel extends Conexion
{

#OBTENER LA LISTA DE CURSOS ACTUALES
	#----------------------------------------------------------------------------------------------------------	
	public function  getAllCursosModel($tabla)
	{

		$stmt = Conexion::conectaDB()->prepare("
			SELECT id_curso, descor, deslar, credito, estado FROM $tabla ORDER BY id_curso DESC ");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

#CREAR NUEVOS PERFILES
	#-----------------------------------------------------------------------------------------------------
	public function createCursosModel($tabla, $datosModel)
	{

		$stmt = Conexion::conectaDB()->prepare("
			INSERT INTO $tabla (descor, deslar, credito, estado) VALUES ( :descor, :deslar, :credito, 'AC')");

		$stmt -> bindParam(":descor", $datosModel["DescorCurso"], PDO::PARAM_STR);
		$stmt -> bindParam(":deslar", $datosModel["DeslarCurso"], PDO::PARAM_STR);
		$stmt -> bindParam(":credito", $datosModel["CreditoCurso"], PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

# ACTUALIZAR CURSOS ACTUALES
	#--------------------------------------------------------------------------------
	public function updateCursosModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("
			UPDATE $tabla SET descor=:descor, deslar=:deslar, credito=:credito, estado='AC' WHERE id_curso=:idCurso");

		$stmt -> bindParam(":descor", $datosModel["DescorCurso"], PDO::PARAM_STR);
		$stmt -> bindParam(":deslar", $datosModel["DeslarCurso"], PDO::PARAM_STR);
		$stmt -> bindParam(":credito", $datosModel["CreditoCurso"], PDO::PARAM_INT);
		$stmt -> bindParam(":idCurso", $datosModel["IdCurso"], PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

# ELIMINAR CURSOS ACTUALES
	#--------------------------------------------------------------------------------
	public function deleteCursosModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("UPDATE $tabla SET estado='IN' WHERE id_curso=:idCurso");

		$stmt -> bindParam(":idCurso", $datosModel, PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

	
}