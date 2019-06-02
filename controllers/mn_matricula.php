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

}

$controllers= new ControllerMatricula();
if (isset($_GET['action'])) {
	$action=$_GET['action'];
	if ($action=='listarAlumnos') {
	 	$controllers->getAlumns();
	}else if($action=='carrera'){
		$controllers->getCarrera();
	}else if ($action=='test') {
		$controllers->test();
	}
}
?>

