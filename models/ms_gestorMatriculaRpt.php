<?php 
require_once "conexion.php";

class GestorMatriculaRpt{

	public function getRptMatricular($carrera=null, $ciclo=null, $semestre=null){
		$query  = " select mat.id_matricula, mat.cod_unicoMatricula, mat.*, ap.*, per.*, car.* from matricula as mat ";
		$query .= " inner join evaluacionpostulante as ap on ap.id_evaluacionPost=mat.id_evaluacionPost ";
		$query .= " inner join persona as per on ap.id_persona=per.id_persona ";
		$query .= " inner join carreras as car on mat.id_carrera=car.id_carrera ";
		$query .= " where 1=1  ";
		$query .= " and mat.id_carrera=? and mat.id_ciclo=? and mat.id_semestre=? ";
		$stmt = Conexion::conectaDB()->prepare($query);
		$stmt->bindParam(1,$carrera, PDO::PARAM_INT);
        $stmt->bindParam(2,$ciclo, PDO::PARAM_INT);
        $stmt->bindParam(3,$semestre, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->close();
	}
	
}

?>
