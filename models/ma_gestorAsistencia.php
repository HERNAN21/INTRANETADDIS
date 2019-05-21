<?php 

require_once "conexion.php";

class gestorAsistenciaModel extends Conexion{

  #---------OBTENER CURSO-----------------------------------------------------
public function getSelectCursosMostrarModel($datosModel, $tabla){

	$stmt = conexion::conectaDB()->prepare("
      SELECT DISTINCT cur.id_curso, cur.descor, cur.deslar, cur.credito as credito
      FROM $tabla cur
      INNER JOIN cursos_ciclo curCi ON cur.id_curso = curCi.id_curso
      INNER JOIN ciclo ci ON curCi.id_ciclo = ci.id_ciclo
      INNER JOIN carreras_cursos caCur ON cur.id_curso = caCur.id_curso
      INNER JOIN carreras car ON cacur.id_carrera = car.id_carrera
      INNER JOIN docente_cursos dcteCur ON cur.id_curso = dcteCur.id_curso
      INNER JOIN docente dcte ON dcteCur.id_docente = dcte.id_docente
      INNER JOIN persona per ON dcte.id_persona = per.id_persona
      INNER JOIN usuarios usu ON per.id_persona = usu.id_persona
      WHERE car.id_carrera = :carrera
      AND ci.id_ciclo = :ciclo
      AND usu.id_usuario = :idUsuario
    ");
    $stmt ->bindParam(":carrera",$datosModel["carrera"],PDO::PARAM_INT);
    $stmt ->bindParam(":ciclo",$datosModel["ciclo"],PDO::PARAM_INT);
    $stmt ->bindParam(":idUsuario",$datosModel["idUsuario"],PDO::PARAM_INT);

    $stmt -> execute();
    return $stmt -> fetchAll();
    $stmt -> close();

}

#---------OBTENER ALL ASISTENCIA ALUMNO---------------------------------------
  public function getAllAsistenciaModel($datos,$tabla){
    $stmt=conexion::conectaDB()->prepare("
      SELECT DISTINCT a.id_asistencia,ma.cod_unicomatricula, per.nombres AS alumno,
      per.dni, DATE(a.hra_marcado) fecha,TIME(a.hra_marcado) hora
      FROM $tabla a
      INNER JOIN carreras ca ON ca.id_carrera=a.id_carrera
      INNER JOIN alumnos al ON al.id_alumno=a.id_alumno
      INNER JOIN matricula ma ON ma.id_matricula=al.id_matricula
      INNER JOIN evaluacionpostulante eva ON eva.id_evaluacionpost= ma.id_evaluacionpost
      INNER JOIN persona per ON per.id_persona= eva.id_persona
      WHERE a.id_carrera=:carrera
      AND a.id_ciclo=:ciclo
      AND a.id_seccion=:seccion
      AND a.id_curso=:curso
    ");
    $stmt -> bindParam(":carrera",$datos["lsCarrera"],PDO::PARAM_INT);
    $stmt -> bindParam(":ciclo",$datos["lsCiclo"],PDO::PARAM_INT);
    $stmt -> bindParam(":seccion",$datos["lsSeccion"],PDO::PARAM_INT);
    $stmt -> bindParam(":curso",$datos["lsCurso"],PDO::PARAM_INT);

    $stmt -> execute();
    return $stmt -> fetchAll();
    $stmt -> close();
  }

   #-------------------------LISTA DE ALUMNO-------------------------------------
  public function getAllAlumnosModel($datos,$tabla){
    $stmt = conexion::conectaDB()-> prepare("
    SELECT DISTINCT a.id_alumno AS id,CONCAT(per.nombres,' ',per.ape_paterno,' ',per.ape_materno) AS nombres,
    per.dni AS dni
    FROM $tabla a
    INNER JOIN matricula ma ON ma.id_matricula=a.id_matricula
    INNER JOIN evaluacionpostulante ev ON ev.id_evaluacionPost=ma.id_evaluacionPost
    INNER JOIN persona per ON per.id_persona=ev.id_persona
    INNER JOIN seccion se ON se.id_seccion=a.id_seccion
    WHERE se.id_seccion=:secciones
    AND ma.id_ciclo=:ciclos
    AND ma.id_carrera=:carreras
    AND a.estado='AC'
    ");
    $stmt -> bindParam(":secciones",$datos["secciones"],PDO::PARAM_INT);
    $stmt -> bindParam(":ciclos",$datos["ciclos"],PDO::PARAM_INT);
    $stmt -> bindParam(":carreras",$datos["carreras"],PDO::PARAM_INT);
    $stmt -> execute();
    return $stmt -> fetchAll();
    $stmt -> close();
  }

#---------INSERTAR ASISTENCIA DE ALUMNOS-------------------------------------
  public function insertarAsistenciaModel($datosIn,$tabla){
    //$fecha_actual=date("Y-m-d \ H:i:s");
    $alert="";
    $idAlumnos=count($datosIn["alumnos"]);
    $asAlumnos=$datosIn["alumnos"];
    foreach ($asAlumnos as $valores) {
      if ($idAlumnos=1) {
          $stmt = Conexion::conectaDB()-> prepare("
            INSERT INTO $tabla (id_asistencia,hra_marcado, id_carrera, id_ciclo,id_seccion, id_curso, cod_usuario, id_alumno)
            VALUES (0, NOW(), :id_carrera, :id_ciclo, :id_seccion, :id_curso, :cod_usuario, $valores)
          ");
          $stmt -> bindParam(":id_carrera",$datosIn["inCarrera"], PDO::PARAM_INT);
          $stmt -> bindParam(":id_ciclo",$datosIn["inCiclo"], PDO::PARAM_INT);
          $stmt -> bindParam(":id_seccion",$datosIn["inSeccion"], PDO::PARAM_INT);
          $stmt -> bindParam(":id_curso",$datosIn["inCurso"], PDO::PARAM_INT);
          $stmt -> bindParam(":cod_usuario",$datosIn["inUsuario"], PDO::PARAM_INT);
          $alert=$stmt->execute();
      }else {
        for ($valor=1;$valor<$idAlumnos; ++$valor) {
          $stmt = Conexion::conectaDB()-> prepare("
            INSERT INTO $tabla (id_asistencia,hra_marcado, id_carrera, id_ciclo,id_seccion, id_curso, cod_usuario, id_alumno)
            VALUES (0, NOW(), :id_carrera, :id_ciclo, :id_seccion, :id_curso, :cod_usuario, $valores)
          ");
          $stmt -> bindParam(":id_carrera",$datosIn["inCarrera"], PDO::PARAM_INT);
          $stmt -> bindParam(":id_ciclo",$datosIn["inCiclo"], PDO::PARAM_INT);
          $stmt -> bindParam(":id_seccion",$datosIn["inSeccion"], PDO::PARAM_INT);
          $stmt -> bindParam(":id_curso",$datosIn["inCurso"], PDO::PARAM_INT);
          $stmt -> bindParam(":cod_usuario",$datosIn["inUsuario"], PDO::PARAM_INT);
          $alert=$stmt->execute();
      }

      }

    }
    if ($alert=true) {
      return "ok";
    } else {
      return "error";
    }

  }

    #---------ELIMINAR DE ASISTENCIA ALUMNO-------------------------------------
  public function deleteAsistenciaModel($datosDel,$tabla){
    $stmt = conexion::conectaDB()-> prepare("
    DELETE FROM $tabla WHERE id_asistencia=:idAsistencia
    ");
    $stmt -> bindParam(":idAsistencia",$datosDel["idAsistencia"],PDO::PARAM_INT);
    if ($stmt -> execute()){
      return "ok";
    }else {
      return "errror";
    }
    $stmt->close();
  }

}