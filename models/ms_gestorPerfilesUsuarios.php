<?php 

require_once "conexion.php";

class GestorPerfilesUsuariosModel 	
{

#BUSCAR PERFILES MODAL
	#-------------------------------------------------------------------------	
	public function searchUsuariosModel($datosModel, $tabla){
		
		$stmt = Conexion::conectaDB()-> prepare(" 
			SELECT usu.id_usuario, usu.usuario, per.nombres, per.ape_paterno, per.ape_materno, per.dni FROM $tabla usu
			INNER JOIN persona per ON usu.id_persona = per.id_persona
			WHERE usu.estado = 'AC' AND usu.usuario LIKE '%".$datosModel."%' OR per.nombres LIKE '%".$datosModel."%' OR 
			per.ape_paterno LIKE '%".$datosModel."%' OR per.ape_materno LIKE '%".$datosModel."%' OR dni LIKE '%".$datosModel."%' 
		" );

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

#MOSTRAR DATOS PERFIL
	#---------------------------------------------------------------------------
	public function showDataUsuariosModel($datosModel, $tabla){
		
		$stmt = Conexion::conectaDB()-> prepare(" 
			SELECT usu.id_usuario, usu.usuario, per.nombres, per.ape_paterno, per.ape_materno, per.dni FROM $tabla usu
			INNER JOIN persona per ON usu.id_persona = per.id_persona WHERE id_usuario=:idUsuario" );

		$stmt -> bindParam(":idUsuario", $datosModel, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

#MOSTRAR TABLA DE ASIGNACION DE PERFILES
	#-----------------------------------------------------------------------------
		public function viewPerfilesUsuariosModel($datosModel, $tabla){
		
		$stmt = Conexion::conectaDB()-> prepare(" 
				SELECT usuPerf.id_usuario, usu.usuario, usuPerf.id_perfil, perf.deslar FROM $tabla usuPerf 
				INNER JOIN usuarios usu ON usuPerf.id_usuario = usu.id_usuario
				INNER JOIN perfiles perf ON usuPerf.id_perfil = perf.id_perfil
				WHERE usuPerf.id_Usuario = :idUsuario
			" );

		$stmt -> bindParam(":idUsuario", $datosModel, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

#INSERTAR ASIGNACION DE MODULOS-PERFILES
	#-----------------------------------------------------------------------------
		public function insertPerfilesUsuariosModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()-> prepare("INSERT INTO $tabla (id_usuario, id_perfil) VALUES (:idUsuario, :idPerfil)" );

		$stmt -> bindParam(":idUsuario", $datosModel["idUsuario"], PDO::PARAM_INT);
		$stmt -> bindParam(":idPerfil", $datosModel["idPerfil"], PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

#INSERTAR ASIGNACION DE MODULOS-PERFILES
	#-----------------------------------------------------------------------------
		public function deletePerfilesUsuariosModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()-> prepare(" DELETE FROM $tabla WHERE id_usuario = :idUsuario and id_perfil = :idPerfil" );

		$stmt -> bindParam(":idUsuario", $datosModel["idUsuario"], PDO::PARAM_INT);
		$stmt -> bindParam(":idPerfil", $datosModel["idPerfil"], PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

}