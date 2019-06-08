<?php 
require_once '../models/mn_matricula.php';
require_once "../models/ms_gestorMatriculaRpt.php";

class ControllerMatricula{

	public function getAlumns(){
		$dni=$_POST['dni'];
		$nombres=$_POST['nombres'];
		$result=Model_Matricula::getAlumns($dni,$nombres);
		echo json_encode($result);
	}

	public function getCarrera(){
		// if ($_POST['carrera']==1) {
			$result=Model_Matricula::getAllCarrera();
			echo json_encode($result);
		// }
	}

	public function test(){
		echo json_encode("test");
	}

	public function getMatriculaPersona(){
		$id_persona=$_POST['id_persona'];
		$result=Model_Matricula::getMatriculaPersona($id_persona);
		echo json_encode($result);
	}


	public function save(){
		$data = new stdClass();
		$cod_matricula=$_POST['cod_matricula'];
		$idEvaluacion=$_POST['idEvaluacion'];
		$carrera=$_POST['carrera'];
		$ciclo=$_POST['ciclo'];
		$semestre=$_POST['semestre'];
		$cod_pago=$_POST['cod_pago'];
		$tipomat=$_POST['tipomats'];
		$cod_user=5;
		$id_talalumno=3;
		$id_persona=$_POST['id_persona'];
		$existe=Model_Matricula::validar($carrera,$ciclo, $semestre,$id_persona);
		$contar=count($existe);
		if ($contar==0) {
			$result=Model_Matricula::insert($cod_matricula,$idEvaluacion,$carrera,$ciclo,$semestre,$cod_pago,$tipomat,$cod_user,$id_talalumno);
			if ($result=='success') {
				$data->respuesta='success';
			}else{
				$data->respuesta='error';
			}
		}else{
			$data->respuesta='existe';
		}
		echo json_encode($data);
	}

	public function update(){
		$cod_unicoMatricula=$_POST['cod_matricula'];
		$id_carrera=$_POST['carrera'];
		$id_ciclo=$_POST['ciclo'];
		$id_semestre=$_POST['semestre'];
		$cod_pago=$_POST['cod_pago'];
		$id_mat=$_POST['id_mat'];
		$tipomat=$_POST['tipomats'];
		$result=Model_Matricula::update($cod_unicoMatricula, $id_carrera, $id_ciclo, $id_semestre, $cod_pago,$tipomat, $id_mat);
		echo json_encode($result);
	}

	public function delete(){
		$id_mat=$_POST['id_mat'];
		$result=Model_Matricula::delete($id_mat);
		echo json_encode($result);
	}



	/*RptMatriculas*/

	public function listadoConsolidadoMatricula(){
		$carrera=$_POST['carreraBus'];
		$ciclo=$_POST['cicloBus'];
		$semestre=$_POST['semestreBus'];
		$seccion=$_POST['seccion'];
		$result =GestorMatriculaRpt::getRptMatricular($carrera, $ciclo, $semestre,$seccion);
		echo json_encode($result);
	}

	public function semestre(){
		$result =GestorMatriculaRpt::listarSemestre();
		echo json_encode($result);
	}

	public function listseccion(){
		$result =GestorMatriculaRpt::seccion();
		echo json_encode($result);
	}




}

$controllers= new ControllerMatricula();
if (isset($_GET['action'])) {
	$action=$_GET['action'];
	if ($action=='listarAlumnos') {
	 	$controllers->getAlumns();
	}else if($action=='listMatPer'){
		$controllers->getMatriculaPersona();
	}else if($action=='carrera'){
		$controllers->getCarrera();
	}else if($action=='save'){
		$controllers->save();
	}else if($action=='update'){
		$controllers->update();
	}else if($action=='delete'){
		$controllers->delete();
	}else if($action=='listMatCon'){
		$controllers->listadoConsolidadoMatricula();
	}else if($action=='semestre'){
		$controllers->semestre();
	}else if($action=='seccion'){
		$controllers->listseccion();
	}else if ($action=='test') {
		$controllers->test();
	}
}

?>

