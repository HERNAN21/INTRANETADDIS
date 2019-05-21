<?php 

require_once "conexion.php";

class ModulosModel extends Conexion
{

#OBTENER LA LISTA DE MODULOS PARA PERFILES ACTUALES
	#----------------------------------------------------------------------------------------------------------	
	public function getModulosModel($tabla)
	{

		$stmt = Conexion::conectaDB()->prepare("
			SELECT id_modulo, descor, deslar, estado FROM $tabla WHERE id_modulo = mod_super AND estado = 'AC'
			");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

#OBTENER LA LISTA DE LOS MODULOS ACTUALES
	#----------------------------------------------------------------------------------------------------------	
	public function getAllModulosModel($tabla)
	{

		$stmt = Conexion::conectaDB()->prepare("
			SELECT id_modulo, descor, deslar, mod_super, link, icono, orden, estado FROM $tabla ORDER BY mod_super
			");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

# INSERTAR MODULOS ACTUALES
	#--------------------------------------------------------------------------------
	public function insertModulosModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("CALL sp_insertModulos(NULL, :descor, :deslar, :link, :icono, :orden)");

		$stmt -> bindParam(":descor", $datosModel["inertDescorM"], PDO::PARAM_STR);
		$stmt -> bindParam(":deslar", $datosModel["inertDeslarM"], PDO::PARAM_STR);
		$stmt -> bindParam(":link", $datosModel["inertlinkM"], PDO::PARAM_STR);
		$stmt -> bindParam(":icono", $datosModel["inertIconoM"], PDO::PARAM_STR);
		$stmt -> bindParam(":orden", $datosModel["inertOrdenM"], PDO::PARAM_STR);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

# ACTUALIZAR MODULOS ACTUALES
	#--------------------------------------------------------------------------------
	public function updateModulosModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("
		UPDATE $tabla SET descor=:descor, deslar=:deslar, link=:link, icono=:icono, orden=:orden, estado='AC' 
		WHERE id_modulo=:id_modulo");

		$stmt -> bindParam(":descor", $datosModel["Descor"], PDO::PARAM_STR);
		$stmt -> bindParam(":deslar", $datosModel["Deslar"], PDO::PARAM_STR);
		$stmt -> bindParam(":link", $datosModel["Link"], PDO::PARAM_STR);
		$stmt -> bindParam(":icono", $datosModel["Icono"], PDO::PARAM_STR);
		$stmt -> bindParam(":orden", $datosModel["Orden"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_modulo", $datosModel["idModu"], PDO::PARAM_STR);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

# ELIMINAR MODULOS ACTUALES
	#--------------------------------------------------------------------------------
	public function deleteModulosModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("UPDATE $tabla SET estado='IN' WHERE id_modulo=:idModulo");

		$stmt -> bindParam(":idModulo", $datosModel, PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}


#OBTENER LA LISTA DE MODULO - SUPER ACTUALES
	#----------------------------------------------------------------------------------------------------------	
	public function getModulosSuperModel($tabla)
	{

		$stmt = Conexion::conectaDB()->prepare("
			SELECT id_modulo, descor, deslar, link, mod_super, estado FROM $tabla WHERE id_modulo = mod_super AND estado = 'AC' ORDER BY mod_super
			");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

# INSERTAR SUB-MODULOS ACTUALES
	#--------------------------------------------------------------------------------
	public function insertSubModulosModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("
			INSERT INTO modulos(descor, deslar, mod_super, link, icono, orden, estado) 
			VALUES (:descor, :deslar, :mod_super, :link, :icono, :orden, 'AC')");

		$stmt -> bindParam(":descor", $datosModel["inertDescorSubM"], PDO::PARAM_STR);
		$stmt -> bindParam(":deslar", $datosModel["inertDeslarSubM"], PDO::PARAM_STR);
		$stmt -> bindParam(":mod_super", $datosModel["inertModSuperSubM"], PDO::PARAM_STR);
		$stmt -> bindParam(":link", $datosModel["inertlinkSubM"], PDO::PARAM_STR);
		$stmt -> bindParam(":icono", $datosModel["inertIconoSubM"], PDO::PARAM_STR);
		$stmt -> bindParam(":orden", $datosModel["inertOrdenSubM"], PDO::PARAM_STR);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

# ACTUALIZAR SUB-MODULOS ACTUALES
	#--------------------------------------------------------------------------------

	public function showDataEditarModel($datosModel, $tabla)
	{

		$stmt = Conexion::conectaDB()->prepare("
			SELECT id_modulo, descor, deslar, mod_super, link, icono, orden, estado FROM $tabla WHERE id_modulo = :idMod
			");

		$stmt -> bindParam(":idMod", $datosModel, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}


	public function updateSubModulosModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("
		UPDATE $tabla SET descor=:descor, deslar=:deslar, mod_super=:mod_super, link=:link, icono=:icono, orden=:orden, estado='AC' 
		WHERE id_modulo=:id_modulo");

		$stmt -> bindParam(":descor", $datosModel["updateDescorSubM"], PDO::PARAM_STR);
		$stmt -> bindParam(":deslar", $datosModel["updateDeslarSubM"], PDO::PARAM_STR);
		$stmt -> bindParam(":mod_super", $datosModel["updateModSuperSubM"], PDO::PARAM_INT);
		$stmt -> bindParam(":link", $datosModel["updatelinkSubM"], PDO::PARAM_STR);
		$stmt -> bindParam(":icono", $datosModel["updateIconoSubM"], PDO::PARAM_STR);
		$stmt -> bindParam(":orden", $datosModel["updateOrdenSubM"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_modulo", $datosModel["updateIdModuloSubM"], PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

}