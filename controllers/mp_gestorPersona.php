<?php 

// require_once "../../models/mn_misCursos.php";
class PersonaController{
	
	public function insert(){
		echo json_encode('hello world');
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