<?php 

require_once "conexion.php";

class UsuariosModel extends Conexion
{

#OBTENER LA LISTA DE PERFILES ACTUALES
	#----------------------------------------------------------------------------------------------------------	
	public function getUsuariosModel($tabla)
	{

		$stmt = Conexion::conectaDB()->prepare("
				SELECT usu.id_usuario, usu.id_persona, per.nombres, per.ape_paterno, per.ape_materno,
				per.dni, usu.usuario, usu.password, usu.foto, usu.email, usu.estado, usu.intentos 
				FROM $tabla usu
				INNER JOIN persona per ON usu.id_persona=per.id_persona
			");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

#CREAR NUEVOS PERFILES
	#-----------------------------------------------------------------------------------------------------
	public function createUsuariosModel($tabla, $datosModel)
	{

		$stmt = Conexion::conectaDB()->prepare("INSERT INTO usuarios 
				(id_usuario, id_persona, usuario, password, foto, email, estado, intentos)
				VALUES (NULL, :id_persona, :usuario, :password, :foto, :email, 'AC', NULL);
			");

		$stmt -> bindParam(":id_persona", $datosModel["idPersona"], PDO::PARAM_INT);
		$stmt -> bindParam(":usuario", $datosModel["Usuario"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datosModel["Password"], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $datosModel["foto"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datosModel["Correo"], PDO::PARAM_STR);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

#BUSCAR PERSONAS
	#---------------------------------------------------------------------------------
	public function searchPersonasModel($tabla, $datosModel){

		$stmt = Conexion::conectaDB()->prepare("
				SELECT per.id_persona, per.nombres, per.ape_paterno, per.ape_materno, per.dni, tPer.descripcion FROM $tabla per
				INNER JOIN tipo_persona tPer ON per.id_tpersona = tPer.id_tpersona
				WHERE estado = 'AC' AND per.nombres LIKE '%".$datosModel."%' OR per.ape_paterno LIKE '%".$datosModel."%' 
				OR per.ape_materno LIKE '%".$datosModel."%' OR per.dni LIKE '%".$datosModel."%' OR tPer.descripcion LIKE '%".$datosModel."%'
			");

		$stmt ->execute();

		return $stmt->fetchAll();

		$stmt -> close();

	}

#MOSTAR DATA DE BUSQUEDA DE PERSONAS

	public function showdataModel($tabla, $datosModel){

		$stmt = Conexion::conectaDB()->prepare("
				SELECT id_persona, nombres, ape_paterno, ape_materno, dni FROM $tabla
				WHERE id_persona = :id_persona
			");

		$stmt -> bindParam(":id_persona", $datosModel, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}
# ACTUALIZAR USUARIOS ACTUALES
	#--------------------------------------------------------------------------------

	#================DATA DE MODAL================== 
	public function dataUsuariosModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("	
			SELECT usu.id_usuario, per.nombres, per.ape_paterno, per.ape_materno, per.dni, usu.usuario, usu.password, 
			usu.foto, usu.email, usu.estado 
			FROM $tabla usu
			INNER JOIN persona per ON usu.id_persona = per.id_persona
			WHERE id_usuario = :idUser ");

		$stmt -> bindParam(":idUser", $datosModel, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();


	}

	public function updateUsuariosModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("	UPDATE usuarios SET usuario=:usuario, password=:password,
																				 foto=:foto, email=:email WHERE id_usuario=:idUsuario");

		$stmt -> bindParam(":usuario", $datosModel["Usuario"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datosModel["Password"], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $datosModel["Foto"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datosModel["Email"], PDO::PARAM_STR);
		$stmt -> bindParam(":idUsuario", $datosModel["id"], PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

# ELIMINAR USUARIOS ACTUALES
	#--------------------------------------------------------------------------------
	public function deleteUsuariosModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("UPDATE $tabla SET estado='IN' WHERE id_usuario=:idUsuario");

		$stmt -> bindParam(":idUsuario", $datosModel, PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

}