<?php 

require_once "conexion.php";

class Model_Matricula{
	
	
	public function getMatricula(){
		
	}

	public function getMatriculaPersona($id_persona){
		$query  = ' select mat.*, per.* , ';
		$query .= ' car.id_carrera,car.deslar as carrera_des,car.descor as carrera_descor, ';
		$query .= ' ci.id_ciclo,ci.deslar as des_ciclo,ci.descor as ciclo_descor, ';
		$query .= ' sem.id_semestre,sem.descor sem_descor,sem.deslar as sem_deslar ';
		$query .= ' from matricula as mat  ';
		$query .= ' inner join evaluacionpostulante as eva on eva.id_evaluacionPost=mat.id_evaluacionPost ';
		$query .= ' inner join persona as per on eva.id_persona=per.id_persona ';
		$query .= ' inner join carreras as car on mat.id_carrera=car.id_carrera ';
		$query .= ' inner join ciclo as ci on ci.id_ciclo=mat.id_ciclo ';
		$query .= ' inner join semestre as sem on mat.id_semestre=sem.id_semestre ';
		$query .= ' where per.id_persona=? ';
		$result = Conexion::conectaDB()->prepare($query);
		$result->bindParam(1, $id_persona, PDO::PARAM_INT);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
        $result->close();
	}

	public function validar($id_carrera,$id_ciclo, $id_semestre,$id_persona){
		$query  = " select * from matricula as mat ";
		$query .= " inner join evaluacionpostulante as eva on mat.id_evaluacionpost=eva.id_evaluacionpost ";
		$query .= " inner join persona as per on eva.id_persona=per.id_persona ";
		$query .= " where mat.id_carrera=? and mat.id_ciclo=? and mat.id_semestre=? and per.id_persona=? ";
		$result = Conexion::conectaDB()->prepare($query);
		$result->bindParam(1, $id_carrera, PDO::PARAM_INT);
		$result->bindParam(2, $id_ciclo, PDO::PARAM_INT);
		$result->bindParam(3, $id_semestre, PDO::PARAM_INT);
		$result->bindParam(4, $id_persona, PDO::PARAM_INT);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
        $result->close();
	}

	public function insert($cod_matricula,$idEvaluacion,$carrera,$ciclo,$semestre,$cod_pago,$tipomat,$cod_user,$id_talalumno){
		$query  = ' insert into matricula (cod_unicoMatricula, id_evaluacionPost, id_carrera, id_ciclo, id_semestre, ';
		$query .= ' cod_pago, fecha_registro, cod_usuario, id_talumno,tipo_matricula) ';
		$query .= ' values(?, ?, ?, ?, ?, ?, now(), ?, ?,?) ';
		$result = Conexion::conectaDB()->prepare($query);
		$result->bindParam(1, $cod_matricula, PDO::PARAM_STR);
		$result->bindParam(2, $idEvaluacion, PDO::PARAM_INT);
		$result->bindParam(3, $carrera, PDO::PARAM_INT);
		$result->bindParam(4, $ciclo, PDO::PARAM_INT);
		$result->bindParam(5, $semestre, PDO::PARAM_INT);
		$result->bindParam(6, $cod_pago, PDO::PARAM_STR);
		$result->bindParam(7, $cod_user, PDO::PARAM_INT);
		$result->bindParam(8, $id_talalumno, PDO::PARAM_INT);
		$result->bindParam(9, $tipomat, PDO::PARAM_INT);
		if ($result->execute()){
			return "success";
		}else{
			// return "error";
			return $result->errorInfo();
		}
		$result->close();
	}	

	public function update($cod_unicoMatricula, $id_carrera, $id_ciclo, $id_semestre, $cod_pago,$tipomat, $id_mat){
		$query  = " update matricula set cod_unicoMatricula=?, id_carrera=?, id_ciclo=?, id_semestre=?, cod_pago=?,fecha_registro=now(),tipo_matricula=?  ";
		$query .= " where id_matricula=? ";
		$result = Conexion::conectaDB()->prepare($query);
		$result->bindParam(1, $cod_unicoMatricula, PDO::PARAM_INT);
		$result->bindParam(2, $id_carrera, PDO::PARAM_INT);
		$result->bindParam(3, $id_ciclo, PDO::PARAM_INT);
		$result->bindParam(4, $id_semestre, PDO::PARAM_INT);
		$result->bindParam(5, $cod_pago, PDO::PARAM_INT);
		$result->bindParam(6, $tipomat, PDO::PARAM_INT);
		$result->bindParam(7, $id_mat, PDO::PARAM_INT);
		if ($result->execute()){
			return "success";
		}else{
			return $result->errorInfo();
		}
		$result->close();
	}

	public function delete($id_mat){
		$query=" delete from matricula where id_matricula=? ";
		$result = Conexion::conectaDB()->prepare($query);
		$result->bindParam(1, $id_mat, PDO::PARAM_INT);
		if ($result->execute()){
			return "success";
		}else{
			return $result->errorInfo();
		}
		$result->close();
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