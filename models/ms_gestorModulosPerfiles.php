<?php 

require_once "conexion.php";

class GestorModulosPerfilesModel 
{

#BUSCAR PERFILES MODAL
	#-------------------------------------------------------------------------	
	public function searchPerfilesModel($datosModel, $tabla){
		
		$stmt = Conexion::conectaDB()-> prepare(" SELECT id_perfil, descor, deslar  FROM perfiles WHERE estado = 'AC' AND descor LIKE '%".$datosModel."%' OR deslar LIKE '%".$datosModel."%'" );

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

#MOSTRAR DATOS PERFIL
	#---------------------------------------------------------------------------
	public function showDataPerfilModel($datosModel, $tabla){
		
		$stmt = Conexion::conectaDB()-> prepare(" SELECT id_perfil, descor, deslar  FROM perfiles WHERE id_perfil=:idPerfil" );

		$stmt -> bindParam(":idPerfil", $datosModel, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

#MOSTRAR TABLA DE ASIGNACION DE PERFILES
	#-----------------------------------------------------------------------------
		public function showDataPerfilesModel($datosModel, $tabla){
		
		$stmt = Conexion::conectaDB()-> prepare(" 
			SELECT DISTINCT perfModu.id_modulo, perfModu.id_perfil, perf.deslar as perfil , modu.deslar as modulo FROM $tabla perfModu
			INNER JOIN perfiles perf ON perfModu.id_perfil = perf.id_perfil
			INNER JOIN modulos modu ON perfModu.id_modulo = modu.id_modulo
			WHERE perfModu.id_perfil = :idPerfil
			" );

		$stmt -> bindParam(":idPerfil", $datosModel, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

#INSERTAR ASIGNACION DE MODULOS-PERFILES
	#-----------------------------------------------------------------------------
		public function insertModulosperfilesModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()-> prepare(" INSERT INTO $tabla (id_perfil, id_modulo) VALUES (:idperfil, :idmodulo)" );

		$stmt -> bindParam(":idperfil", $datosModel["idPerfil"], PDO::PARAM_INT);
		$stmt -> bindParam(":idmodulo", $datosModel["idModulo"], PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

#INSERTAR ASIGNACION DE MODULOS-PERFILES
	#-----------------------------------------------------------------------------
		public function deleteModulosperfilesModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()-> prepare(" DELETE FROM $tabla WHERE id_perfil = :idPerfil and id_modulo = :idModulo" );

		$stmt -> bindParam(":idPerfil", $datosModel["idPerfil"], PDO::PARAM_INT);
		$stmt -> bindParam(":idModulo", $datosModel["idModulo"], PDO::PARAM_INT);

		if ($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

	}

}