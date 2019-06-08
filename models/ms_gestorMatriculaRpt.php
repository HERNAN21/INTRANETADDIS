<?php 
require_once "conexion.php";

class GestorMatriculaRpt{

	public function getRptMatricular($carrera=null, $ciclo=null, $semestre=null,$seccion=null){
		$query  = " select mat.id_matricula, mat.cod_unicoMatricula, mat.*, ap.*, per.*, car.*, alm.*,sec.* from matricula as mat ";
		$query .= " inner join evaluacionpostulante as ap on ap.id_evaluacionPost=mat.id_evaluacionPost ";
		$query .= " inner join persona as per on ap.id_persona=per.id_persona ";
		$query .= " inner join carreras as car on mat.id_carrera=car.id_carrera ";
		$query .= " inner join alumnos as alm on alm.id_matricula=mat.id_matricula ";
		$query .= " inner join seccion as sec on alm.id_seccion=sec.id_seccion ";
		$query .= " where 1=1  ";
		$query .= " and mat.id_carrera=? and mat.id_ciclo=? and mat.id_semestre=? and sec.id_seccion=? ";
		$stmt = Conexion::conectaDB()->prepare($query);
		$stmt->bindParam(1,$carrera, PDO::PARAM_INT);
        $stmt->bindParam(2,$ciclo, PDO::PARAM_INT);
        $stmt->bindParam(3,$semestre, PDO::PARAM_INT);
        $stmt->bindParam(4,$seccion, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->close();
	}


	public function listarSemestre(){
		$query  = " select * from semestre ";
		$stmt = Conexion::conectaDB()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->close();
	}

	public function seccion(){
		$query  = " select * from seccion ";
		$stmt = Conexion::conectaDB()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->close();
	}
	
}

?>
