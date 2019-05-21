<?php

require_once "conexion.php";

class GestorCursosCiclosModel{

	public function searchCursosModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("
			SELECT id_curso, descor, deslar FROM $tabla WHERE estado = 'AC' AND descor LIKE '%".$datosModel."%' OR deslar LIKE '%".$datosModel."%'
			");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	public function getDataCursoModel($datosModel, $tabla){

		$stmt = Conexion::conectaDB()->prepare("
				SELECT id_curso, descor, deslar FROM $tabla WHERE id_curso = :id_curso
			");

		$stmt -> bindParam(":id_curso", $datosModel, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

// 	public function viewCarrerasCursosModel($datosModel, $tabla){

// 		$stmt = Conexion::conectaDB()->prepare("
// 				SELECT caCur.id_carrera, car.deslar as carrera, caCur.id_curso, cur.deslar as curso FROM $tabla caCur
// 				INNER JOIN carreras car ON caCur.id_carrera = car.id_carrera
// 				INNER JOIN cursos cur ON caCur.id_curso = cur.id_curso
// 				WHERE caCur.id_carrera = :idCarrera
// 			");

// 		$stmt -> bindParam(":idCarrera", $datosModel, PDO::PARAM_INT);

// 		$stmt -> execute();

// 		return $stmt -> fetchAll();

// 		$stmt -> close();

// 	}

// 	#INSERTAR ASIGNACION DE MODULOS-PERFILES
// 	#-----------------------------------------------------------------------------
// 		public function insertCarrerasCursosModel($datosModel, $tabla){

// 		$stmt = Conexion::conectaDB()-> prepare(" INSERT INTO $tabla (id_carrera, id_curso) VALUES (:idcarrera, :idcurso)" );

// 		$stmt -> bindParam(":idcarrera", $datosModel["idCarrera"], PDO::PARAM_INT);
// 		$stmt -> bindParam(":idcurso", $datosModel["idCurso"], PDO::PARAM_INT);

// 		if ($stmt -> execute()){

// 			return "ok";

// 		}else{

// 			return "error";

// 		}

// 		$stmt -> close();

// 	}

// 	#INSERTAR ASIGNACION DE MODULOS-PERFILES
// 	#-----------------------------------------------------------------------------
// 		public function deleteCarrerasCursosModel($datosModel, $tabla){

// 		$stmt = Conexion::conectaDB()-> prepare("
// 			DELETE FROM $tabla WHERE id_carrera = :idCarrera and id_curso = :idCurso
// 		");

// 		$stmt -> bindParam(":idCarrera", $datosModel["idCarrera"], PDO::PARAM_INT);
// 		$stmt -> bindParam(":idCurso", $datosModel["idCurso"], PDO::PARAM_INT);

// 		if ($stmt -> execute()){

// 			return "ok";

// 		}else{

// 			return "error";

// 		}

// 		$stmt -> close();

// 	}

}