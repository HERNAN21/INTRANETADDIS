<?php 

require_once "conexion.php";

class UtilitiesModel{

	public function selectCarrerasModel($tabla){

		$stmt = Conexion::conectaDB()-> prepare(" SELECT DISTINCT id_carrera, descor, deslar FROM $tabla ");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();
	}

	public function selectCiclosModel($tabla){

		$stmt = Conexion::conectaDB()->prepare("SELECT id_ciclo, descor, deslar, estado FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	public function selectSeccionesModel($tabla){

		$stmt = Conexion::conectaDB()->prepare("SELECT id_seccion, descripcion FROM $tabla WHERE estado = 'AC' ");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

}