<?php 

require_once "conexion.php";

class GestorSeccionesModel
{

#OBTENER LA LISTA DE SECCIONES ACTUALES
	#----------------------------------------------------------------------------------------------------------	
	public function  getAllSeccionesModel($tabla)
	{

		$stmt = Conexion::conectaDB()->prepare("SELECT id_seccion, descripcion, estado FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

#CREAR NUEVOS PERFILES
	#-----------------------------------------------------------------------------------------------------
	public function createSeccionModel($tabla, $datosModel)
	{

		$stmt = Conexion::conectaDB()->prepare("	INSERT INTO $tabla (descripcion, estado) 
																				VALUES ( :descripcion, 'AC')");

		$stmt -> bindParam(":descripcion", $datosModel, PDO::PARAM_STR);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

# ACTUALIZAR PERFILES ACTUALES
	#--------------------------------------------------------------------------------
	public function updateSeccionModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("UPDATE $tabla SET descripcion=:descripcion, estado='AC' WHERE id_seccion=:idSeccion");

		$stmt -> bindParam(":descripcion", $datosModel["DesSeccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":idSeccion", $datosModel["idSeccion"], PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

# ELIMINAR CICLOS ACTUALES
	#--------------------------------------------------------------------------------
	public function deleteSeccionModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("UPDATE $tabla SET estado='IN' WHERE id_seccion=:idSeccion");

		$stmt -> bindParam(":idSeccion", $datosModel, PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

}