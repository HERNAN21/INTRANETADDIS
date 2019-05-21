<?php 

require_once "conexion.php";

class gestorNotasModel {

#  Obtener las carreras 
  #------------------------------------------------------------------------------------
    public function getCarrerasModel($cod_usuario, $tabla){

        $stmt = Conexion::conectaDB()-> prepare("
            SELECT DISTINCT car.id_carrera, car.descor, car.deslar
            FROM $tabla car
            INNER JOIN carreras_cursos carCur ON car.id_carrera = carCur.id_carrera
            INNER JOIN cursos cur ON carCur.id_curso = cur.id_curso
            INNER JOIN docente_cursos dcteCur ON cur.id_curso = dcteCur.id_curso
            INNER JOIN docente dcte ON dcteCur.id_docente = dcte.id_docente
            INNER JOIN persona per ON dcte.id_persona = per.id_persona
            INNER JOIN usuarios usu ON per.id_persona = usu.id_persona
            WHERE usu.id_usuario = $cod_usuario
            ");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

    }

#Obtener los ciclos
    #-------------------------------------------------------------------
    public function getCiclosModel($tabla, $datos){

        $stmt = Conexion::conectaDB()-> prepare("
            SELECT ciclo.id_ciclo, ciclo.descor, ciclo.deslar FROM $tabla
            INNER JOIN cursos_ciclo ON ciclo.id_ciclo = cursos_ciclo.id_ciclo
            INNER JOIN cursos ON cursos.id_curso = cursos_ciclo.id_curso
            INNER JOIN docente_cursos ON cursos.id_curso = docente_cursos.id_curso
            INNER JOIN docente ON docente.id_docente = docente_cursos.id_docente
            INNER JOIN carreras_cursos ON carreras_cursos.id_curso = cursos.id_curso
            INNER JOIN persona ON persona.id_persona = docente.id_persona
            INNER JOIN usuarios ON usuarios.id_persona = persona.id_persona
            WHERE usuarios.id_usuario = :id_usuario
            AND carreras_cursos.id_carrera = :id_carrera
            ");

        $stmt -> bindParam(":id_usuario", $datos["idUser"], PDO::PARAM_INT);
        $stmt -> bindParam(":id_carrera", $datos["idCarrera"], PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

    }
#Obtener las secciones
    #--------------------------------------------------------------------
    public function getSeccionModel( $tabla){

        $stmt = Conexion::conectaDB()-> prepare(" SELECT id_seccion, descripcion FROM $tabla ");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();
    }

#Obtener los cursos
    #----------------------------------------------------------------------
    public function getCursosModel($datos, $tabla){

       /* $stmt = Conexion::conectaDB()-> prepare("
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

        $stmt -> bindParam(":carrera", $datos["idCarrera"], PDO::PARAM_INT);
        $stmt -> bindParam(":ciclo", $datos["idCiclo"], PDO::PARAM_INT);
        $stmt -> bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();*/

    }

#Listar los registros de la tabla tipo_nota
    #--------------------------------------------------------------------------------------------------------
    public function getTnotasModel($tabla){

        $stmt = Conexion::conectaDB()-> prepare(" SELECT id_tNota, descor, deslar FROM  $tabla ");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

    }
  
#Listar los Alumnos
    #--------------------------------------------------------------------------
    public function getAllAlumnosModel($datosModel, $tabla){

        $stmt = Conexion::conectaDB()-> prepare(
        "   SELECT alm.id_alumno, alm.id_matricula, alm.id_seccion, per.id_persona, per.nombres, per.ape_paterno, per.ape_materno, per.dni, per.genero
            FROM $tabla alm
            INNER JOIN matricula mat ON alm.id_matricula = mat.id_matricula
            INNER JOIN evaluacionPostulante evaPost ON mat.id_evaluacionPost = evaPost.id_evaluacionPost
            INNER JOIN persona per ON evaPost.id_persona = per.id_persona
            INNER JOIN renovacion_matricula renMat
            WHERE mat.id_carrera = :idCarrera
            AND alm.id_seccion = :idSeccion
            AND mat.id_ciclo = :idCiclo
            OR renMat.id_ciclo = :idCiclo
        ");

        $stmt -> bindParam(":idCarrera",$datosModel["idCarrera"], PDO::PARAM_INT);
        $stmt -> bindParam(":idSeccion",$datosModel["idSeccion"], PDO::PARAM_INT);
        $stmt -> bindParam(":idCiclo",$datosModel["idCiclo"], PDO::PARAM_INT);
        $stmt -> bindParam(":idCiclo",$datosModel["idCiclo"], PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

    }  

# OBTENER NOTAS
    #-------------------------------------------------------------------------------------
    public function getNotasAlumnosModel($datosModel, $tabla){

        $stmt = Conexion::conectaDB()-> prepare(
        "   SELECT nts.id_nota, nts.id_alumno, nts.id_ciclo, nts.id_curso, tnta.deslar, nts.nota, nts.porcentaje, nts.fecha
            FROM $tabla nts
            INNER JOIN alumnos alm ON nts.id_alumno = alm.id_alumno
            INNER JOIN matricula mat ON alm.id_matricula = mat.id_matricula
            INNER JOIN tipo_nota tnta ON nts.id_tnota = tnta.id_tnota 
            INNER JOIN renovacion_matricula reMat
            WHERE nts.id_alumno = :idAlumno
            AND nts.id_ciclo = :idCiclo
            OR reMat.id_ciclo = :idCiclo
        ");

        $stmt -> bindParam(":idAlumno",$datosModel["idAlumno"], PDO::PARAM_INT);
        $stmt -> bindParam(":idCiclo",$datosModel["idCiclo"], PDO::PARAM_INT);
        $stmt -> bindParam(":idCiclo",$datosModel["idCiclo"], PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

    }  

#INSERTAR NOTAS 
    #----------------------------------------------------------------------------------------------
    public function insertNotasModel($datosModel, $tabla){

         $stmt = Conexion::conectaDB()-> prepare(
        "   INSERT INTO $tabla ( id_nota, id_alumno, id_ciclo, id_curso, id_tNota, nota, porcentaje, fecha)
            VALUES (null, :idAlumno, :idCiclo, :idCurso, :id_tNota, :nota, :porcentaje, NOW())
        ");

        $stmt -> bindParam(":idAlumno",$datosModel["idAlumnoI"], PDO::PARAM_INT);
        $stmt -> bindParam(":idCiclo",$datosModel["idCursoI"], PDO::PARAM_INT);
        $stmt -> bindParam(":idCurso",$datosModel["idCicloI"], PDO::PARAM_INT);
        $stmt -> bindParam(":id_tNota",$datosModel["tNotaI"], PDO::PARAM_STR);
        $stmt -> bindParam(":nota",$datosModel["notaI"], PDO::PARAM_INT);
        $stmt -> bindParam(":porcentaje",$datosModel["porcentajeI"], PDO::PARAM_STR);

         if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

    }

#UPDATE NOTAS 
    #----------------------------------------------------------------------------------------------
    public function dataUpdateNotasModel($datosModel, $tabla){

        $stmt = Conexion::conectaDB()->prepare(
            "SELECT nta.id_nota, nta.id_alumno, nta.id_ciclo, nta.id_curso, tnta.deslar, nta.nota, nta.porcentaje, nta.fecha 
            FROM $tabla nta
            INNER JOIN  tipo_nota tnta ON nta.id_tNota = tnta.id_tNota
            WHERE id_nota = :idnota"
        );

        $stmt -> bindParam(":idnota", $datosModel, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

    }

    public function updateNotasModel($datosModel, $tabla){

         $stmt = Conexion::conectaDB()-> prepare(" 
            UPDATE $tabla SET id_tNota=:idtNota, nota=:nota, porcentaje=:porcentaje, fecha=NOW() WHERE id_nota=:idNota
        ");

        $stmt -> bindParam(":idtNota",$datosModel["upTnota"], PDO::PARAM_INT);
        $stmt -> bindParam(":nota",$datosModel["upNota"], PDO::PARAM_INT);
        $stmt -> bindParam(":porcentaje",$datosModel["upPorcentaje"], PDO::PARAM_STR);
        $stmt -> bindParam(":idNota",$datosModel["upIdNota"], PDO::PARAM_INT);

         if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

    }

#ELIMINAR NOTAS
    #-----------------------------------------------------------------------------------------------------------
    public function deleteNotasModel($datosModel, $tabla){

        $stmt = Conexion::conectaDB()-> prepare("DELETE FROM $tabla WHERE id_nota=:idNota ");

        $stmt -> bindParam(":idNota", $datosModel, PDO::PARAM_INT);

         if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

    }

}