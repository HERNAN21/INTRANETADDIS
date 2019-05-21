<?php 

require_once "conexion.php";

class gestorInicioModel extends Conexion{

#GUARDAR ARCHIVO INICIO
	#-----------------------------------------------------------------
	public function insertInicioModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("
			INSERT INTO $tabla(titulo, descripcion, imagen, id_perfil) 
			VALUES (:titulo, :descripcion, :imagen, :id_perfil)
		");

		$stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":imagen", $datosModel["imagen"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_perfil", $datosModel["perfil"], PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

#MOSTRAR ARCHIVOS INICIO
	#-------------------------------------------------------------------
	public function viewImagenesInicioModel($tabla){

		$stmt = Conexion::conectaDB()->prepare("
				SELECT ini.id_imgInicio, ini.titulo, ini.descripcion, ini.id_perfil, ini.imagen, perf.deslar 
				FROM $tabla ini
				INNER JOIN perfiles perf ON ini.id_perfil = perf.id_perfil
			");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

#ELIMINAR REGISTRO

	public function deleteArchivoModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("DELETE FROM $tabla WHERE id_imgInicio = :id");

		$stmt -> bindParam(":id", $datosModel, PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
			
	}

#SELECT EDITAR INICIO
	#----------------------------------------------------------------------
	public function selectEditarInicioModel($tabla)
	{

		$stmt = Conexion::conectaDB()->prepare("SELECT id_perfil, descor, deslar, estado FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

#EDITAR ARCHIVO INICIO
	#-----------------------------------------------------------------
	public function editarArchivoInicioModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("
			UPDATE $tabla SET titulo = :titulo, descripcion = :descripcion, imagen = :imagen, id_perfil = :idPerfil WHERE id_imgInicio = :id	
			");

		$stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":imagen", $datosModel["imagen"], PDO::PARAM_STR);
		$stmt -> bindParam(":idPerfil", $datosModel["perfil"], PDO::PARAM_INT);
		$stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

#MOSTRAR LA IMAGEN EN LA PAGINA DE INICIO
	#-----------------------------------------------------------------

	public function mostrarImagenInicioModel($tabla, $datosModel){

		$stmt = Conexion::conectaDB()->prepare("SELECT ini.id_imgInicio, ini.titulo, ini.descripcion, ini.imagen, ini.id_perfil
				FROM $tabla ini
				INNER JOIN perfiles perf ON ini.id_perfil = perf.id_perfil
				WHERE ini.id_perfil = :cod
		");

		$stmt -> bindParam(":cod", $datosModel, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	}

}