<?php 
require_once '../models/mn_matricula.php';

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
		$cod_matricula=$_POST['cod_matricula'];
		$idEvaluacion=$_POST['idEvaluacion'];
		$carrera=$_POST['carrera'];
		$ciclo=$_POST['ciclo'];
		$semestre=$_POST['semestre'];
		$cod_pago=$_POST['cod_pago'];
		$tipomat=$_POST['tipomat'];
		$cod_user=5;
		$id_talalumno=3;
		$result=Model_Matricula::insert($cod_matricula,$idEvaluacion,$carrera,$ciclo,$semestre,$cod_pago,$tipomat,$cod_user,$id_talalumno);
		echo json_encode($result);
	}

	public function update(){
		
	}

	public function delete(){
		
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
	}else if ($action=='test') {
		$controllers->test();
	}
}
?>

