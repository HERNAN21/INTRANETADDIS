<?php 

class UtilitiesController{

	public function selectCarrerasController(){

		$respuesta = UtilitiesModel::selectCarrerasModel("carreras");

	    foreach ($respuesta as $row => $item) {
	      echo '
	          <option value=" ' . $item["id_carrera"] . ' ">' . $item["deslar"] . '</option>
	      ';
	    }
	}

	public function selectCiclosController(){

		$respuesta = UtilitiesModel::selectCiclosModel("ciclo");

	    foreach ($respuesta as $row => $item) {
	         echo '
	            <option value=" ' . $item["id_ciclo"] . ' ">' . $item["deslar"] .' - ' . $item["descor"] . '</option>
	          ';
	    }
	}

	public function selectSeccionController(){

		$respuesta = UtilitiesModel::selectSeccionesModel("seccion");

	    foreach ($respuesta as $row => $item) {
	         echo '
	            <option value=" ' . $item["id_seccion"] . ' ">' . $item["descripcion"] .'</option>
	          ';
	    }
	}

}