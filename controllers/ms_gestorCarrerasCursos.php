<?php 

class GestorCarrerasCursosController{

	public function searchCarrerasController($datosContoller){

		$respuesta = GestorCarrerasCursosModel::searchCarrerasModel($datosContoller);

		$json = array();

		foreach ($respuesta as $row => $item) {
			$json[] = array(	
				'id' => $item{"id_carrera"},
				'descor' => $item{"descor"},
				'deslar' => $item{"deslar"}
			);
		}

		$jsonString = json_encode($json);

		 echo $jsonString;

	}

	public function getDataCarreraController($datosContoller){

		$respuesta = GestorCarrerasCursosModel::getDataCarreraModel($datosContoller, "carreras");

		$json = array();

		foreach ($respuesta as $row => $item) {
			$json[] = array(	
				'id' => $item{"id_carrera"},
				'descor' => $item{"descor"},
				'deslar' => $item{"deslar"}
			);
		}

		$jsonString = json_encode($json[0]);

		 echo $jsonString;

	}

	public function getCarrerasCursosComboController(){

		$respuesta = gestorCursosModel::getAllCursosModel("cursos");

		foreach ($respuesta as $row => $item) {
			if($item["estado"] = "AC"){
				echo '
					<option value=" '.$item["id_curso"].' ">'.$item["deslar"].'</option>
				';
			}
		}
		
	}

	public function viewCarrerasCursosController($datosController){

		$respuesta = GestorCarrerasCursosModel::viewCarrerasCursosModel($datosController, "carreras_cursos");

		$json = array();

		foreach ($respuesta as $row => $item) {
			$json[] = array(	
				'idCarrera' => $item{"id_carrera"},
				'idCurso' => $item{"id_curso"},
				'carrera' => $item{"carrera"},
				'curso' => $item{"curso"}
			);
		}

		$jsonString = json_encode($json);

		 echo $jsonString;

	}

	public function insertCarrerasCursosController($datosController){

		$respuesta = GestorCarrerasCursosModel::insertCarrerasCursosModel($datosController, "carreras_cursos");

		if ($respuesta == "ok"){

			echo "success";

		}else{

			echo "error";

		}
	}

	public function deleteCarrerasCursosController($datosController){

		$respuesta = GestorCarrerasCursosModel::deleteCarrerasCursosModel($datosController, "carreras_cursos");

		if ($respuesta == "ok"){

			echo "success";

		}else{

			echo "error";

		}
	}

}