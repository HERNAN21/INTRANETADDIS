<?php 

// require_once "../../models/mn_misCursos.php";
class PersonaController{
	
	public function insert(){
		$dni=$_POST['dniPer'];
		/*$nombre=$_POST['nombre'];
		$apellido_m=$_POST['apellido_m'];
		$apellido_p=$_POST['apellido_p'];
		$genero=$_POST['genero'];
		$fecha_nac=$_POST['fecha_nac'];
		$direccion=$_POST['direccion'];
		$departamento=$_POST['departamento'];
		$provincia=$_POST['provincia'];
		$distrito=$_POST['distrito'];
		$email=$_POST['email'];
		$celular=$_POST['celular'];
		$tipoparty=$_POST['tipoparty'];
		$estado=$_POST['estado'];*/

		echo json_encode($dni);
	}

	public function update(){
		
	}

	public function delete(){
		
	}

	public function list(){
		
	}

	public function listOne(){
		
	}

}


$controller =new PersonaController();

if (isset($_GET['action'])) {
	$action=$_GET['action'];
	if ($action=='insert') {
		$controller->insert();
	}else{
		
	}
}

?>