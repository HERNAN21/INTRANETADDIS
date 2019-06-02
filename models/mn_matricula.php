<?php 

require_once "conexion.php";

class Model_Matricula{
	
	
	public function getMatricula(){
		
	}


	public function insert(){
			
	}	

	public function update(){
		
	}

	public function delete(){
		
	}

	public function getOneData(){
		
	}

	public function getAlumns($dni,$nombres){
		$query  = " select pe.id_persona, pe.nombres, pe.ape_paterno,  ";
		$query .= " pe.ape_materno, pe.dni, pe.genero, pe.fech_nacimiento,  ";
		$query .= " pe.id_tpersona, pe.direccion, pe.distrito, pe.provincia,   ";
		$query .= " pe.departamento, pe.nCelular, pe.email, pe.estado, ";
		$query .= " ev.id_evaluacionPost,ev.id_persona,ev.estado ";
		$query .= " from persona as pe  ";
		$query .= " inner join evaluacionpostulante as ev on pe.id_persona=ev.id_persona ";
		$query .= " where  pe.id_tpersona=1 ";
		$query .= " and pe.dni  like concat('%',?,'%')  ";
		$query .= " and concat(pe.nombres, pe.ape_paterno,pe.ape_materno) like concat('%',?,'%') limit 10 ";

		$result = Conexion::conectaDB()->prepare($query);
		$result->bindParam(1,$dni, PDO::PARAM_INT);
        $result->bindParam(2,$nombres, PDO::PARAM_INT);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
        $result->close();
	}

	public function getAllCarrera(){
		$query  = " select * from carreras ";
		$result = Conexion::conectaDB()->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
        $result->close();
	}

}

?>