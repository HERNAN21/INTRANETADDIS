<?php 

class GestorCursosCiclosController{

	public function searchCursosController($datosContoller){

		$respuesta = GestorCursosCiclosModel::searchCursosModel($datosContoller, "cursos");

		$json = array();

		foreach ($respuesta as $row => $item) {
			$json[] = array(	
				'id' => $item{"id_curso"},
				'descor' => $item{"descor"},
				'deslar' => $item{"deslar"}
			);
		}

		$jsonString = json_encode($json);

		 echo $jsonString;

	}

	public function getDataCursoController($datosContoller){

		$respuesta = GestorCursosCiclosModel::getDataCursoModel($datosContoller, "cursos");

		$json = array();

		foreach ($respuesta as $row => $item) {
			$json[] = array(	
				'id' => $item{"id_curso"},
				'descor' => $item{"descor"},
				'deslar' => $item{"deslar"}
			);
		}

		$jsonString = json_encode($json[0]);

		 echo $jsonString;

	}

// 	public function getCarrerasCursosComboController(){

// 		$respuesta = gestorCursosModel::getAllCursosModel("cursos");

// 		foreach ($respuesta as $row => $item) {
// 			if($item["estado"] = "AC"){
// 				echo '
// 					<option value=" '.$item["id_curso"].' ">'.$item["deslar"].'</option>
// 				';
// 			}
// 		}
		
// 	}

// 	public function viewCarrerasCursosController($datosController){

// 		$respuesta = GestorCursosCiclosModel::viewCarrerasCursosModel($datosController, "carreras_cursos");

// 		$json = array();

// 		foreach ($respuesta as $row => $item) {
// 			$json[] = array(	
// 				'idCarrera' => $item{"id_carrera"},
// 				'idCurso' => $item{"id_curso"},
// 				'carrera' => $item{"carrera"},
// 				'curso' => $item{"curso"}
// 			);
// 		}

// 		$jsonString = json_encode($json);

// 		 echo $jsonString;

// 	}

// 	public function insertCarrerasCursosController($datosController){

// 		$respuesta = GestorCursosCiclosModel::insertCarrerasCursosModel($datosController, "carreras_cursos");

// 		if ($respuesta == "ok"){

// 			echo "success";

// 		}else{

// 			echo "error";

// 		}
// 	}

// 	public function deleteCarrerasCursosController($datosController){

// 		$respuesta = GestorCursosCiclosModel::deleteCarrerasCursosModel($datosController, "carreras_cursos");

// 		if ($respuesta == "ok"){

// 			echo "success";

// 		}else{

// 			echo "error";

// 		}
// 	}

}