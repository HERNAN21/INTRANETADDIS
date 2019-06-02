<?php

require_once "conexion.php";

class MisCursosModel
{

#  Obtener los ciclos 
  #------------------------------------------------------------------------------------
    public function getCiclosAlumnoModel($tabla, $idUsuario){

        $stmt = Conexion::conectaDB()->prepare("
            SELECT MAX(ciclo.id_ciclo) as idCiclo, ciclo.descor, ciclo.deslar FROM $tabla
            INNER JOIN matricula ON matricula.id_ciclo = ciclo.id_ciclo
            INNER JOIN evaluacionPostulante ON evaluacionPostulante.id_evaluacionPost = matricula.id_evaluacionPost
            INNER JOIN persona ON persona.id_persona = evaluacionPostulante.id_persona
            INNER JOIN usuarios ON usuarios.id_persona = persona.id_persona
            WHERE usuarios.id_usuario = $idUsuario
            GROUP BY ciclo.id_ciclo");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

    }

#  Obtener las notas 
  #------------------------------------------------------------------------------------
    public function getCursosAlumnosModel($datos, $tabla){

         $stmt = Conexion::conectaDB()->prepare("
            SELECT 
            notas.id_nota, notas.promedio,
            detalle_nota.nota,
            tipo_nota.deslar,tipo_nota.descor, tipo_nota.porcentaje,
            cursos.id_curso, cursos.descor, cursos.deslar AS curso, cursos.credito, 
            CONCAT(pers.nombres, ' ', pers.ape_paterno, ' ', pers.ape_materno)AS profesor
            FROM $tabla
            INNER JOIN cursos_ciclo ON cursos_ciclo.id_curso = cursos.id_curso
            INNER JOIN docente_cursos ON  docente_cursos.id_curso = cursos.id_curso
            INNER JOIN docente ON docente.id_docente = docente_cursos.id_docente
            INNER JOIN persona pers ON pers.id_persona = docente.id_persona
            INNER JOIN ciclo ON ciclo.id_ciclo = cursos_ciclo.id_ciclo
            INNER JOIN matricula ON matricula.id_ciclo = ciclo.id_ciclo
            INNER JOIN evaluacionPostulante ON matricula.id_evaluacionPost = evaluacionPostulante.id_evaluacionPost
            INNER JOIN persona ON persona.id_persona = evaluacionPostulante.id_persona
            INNER JOIN usuarios ON usuarios.id_persona = persona.id_persona
            INNER JOIN notas ON notas.id_curso = cursos.id_curso
            LEFT OUTER JOIN detalle_nota ON detalle_nota.id_nota = notas.id_nota
            LEFT OUTER JOIN tipo_nota ON tipo_nota.id_tNota = detalle_nota.id_tNota
            WHERE cursos_ciclo.id_ciclo = :idCiclo
            AND usuarios.id_usuario = :iUsuario

            ");

         $stmt -> bindParam(":idCiclo", $datos["idCiclo"], PDO::PARAM_INT);
         $stmt -> bindParam(":iUsuario", $datos["idAlumno"], PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

    }

#  Obtener las notas 
  #------------------------------------------------------------------------------------
    public function getNotasAlumnosModel($datos, $tabla){

    	 $stmt = Conexion::conectaDB()->prepare("
    	 	SELECT notas.id_nota, notas.nota, notas.porcentaje,
            tipo_nota.id_tNota, tipo_nota.deslar as capacidad,
            cursos.id_curso
            FROM notas
            INNER JOIN tipo_nota ON tipo_nota.id_tNota = notas.id_tNota
            INNER JOIN cursos ON cursos.id_curso = notas.id_curso
            INNER JOIN cursos_ciclo ON cursos_ciclo.id_curso = cursos.id_curso
            INNER JOIN alumnos ON alumnos.id_alumno = notas.id_alumno
            INNER JOIN matricula ON matricula.id_matricula = alumnos.id_matricula
            INNER JOIN evaluacionPostulante ON matricula.id_evaluacionPost = evaluacionPostulante.id_evaluacionPost
            INNER JOIN persona ON persona.id_persona = evaluacionPostulante.id_persona
            INNER JOIN usuarios ON usuarios.id_persona = persona.id_persona
            WHERE cursos_ciclo.id_ciclo = :idCiclo
            AND usuarios.id_usuario = :idUsuario
            ");

         $stmt -> bindParam(":idCiclo", $datos["idCiclo"], PDO::PARAM_INT);
         $stmt -> bindParam(":idUsuario", $datos["idAlumno"], PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

    }

    public function getCuentasAlumnosController($datos, $tabla){

        $stmt = Conexion::conectaDB()->prepare("
            SELECT
            cuenta.id_cuenta, cuenta.vencimiento, cuenta.estado,
            concepto_pago.concepto, concepto_pago.monto,
            pagos.id_pago, pagos.monto_pagado, pagos.monto_deuda
            FROM $tabla
            INNER JOIN concepto_pago ON concepto_pago.id_conceptoPago = cuenta.id_conceptoPago
            INNER JOIN pagos ON pagos.id_cuenta = cuenta.id_cuenta
            INNER JOIN alumnos ON alumnos.id_alumno = cuenta.id_alumno
            INNER JOIN matricula ON matricula.id_matricula = alumnos.id_matricula
            INNER JOIN ciclo ON ciclo.id_ciclo = matricula.id_ciclo
            INNER JOIN evaluacionPostulante ON matricula.id_evaluacionPost = evaluacionPostulante.id_evaluacionPost
            INNER JOIN persona ON persona.id_persona = evaluacionPostulante.id_persona
            INNER JOIN usuarios ON usuarios.id_persona = persona.id_persona
            WHERE ciclo.id_ciclo = :idCiclo
            AND usuarios.id_usuario = :idUsuario
            ");

         $stmt -> bindParam(":idCiclo", $datos["idCiclo"], PDO::PARAM_INT);
         $stmt -> bindParam(":idUsuario", $datos["idAlumno"], PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

    }

#Obtener el record de notas
    #--------------------------------------------------------------------------------------
    public function dataEncabezadoRecorNotasModel($idAlumno, $tabla){

        $stmt = Conexion::conectaDB()->prepare("
            SELECT
            mat.cod_unicoMatricula,
            UPPER (CONCAT(per.nombres, ' ',per.ape_paterno, ' ',per.ape_materno)) AS nombre, car.deslar,
            alum.id_alumno as alumno
            FROM $tabla as mat
            INNER JOIN alumnos alum ON alum.id_matricula = mat.id_matricula
            INNER JOIN evaluacionPostulante evalPus ON mat.id_evaluacionPost=evalPus.id_evaluacionPost
            INNER JOIN persona per ON evalPus.id_persona=per.id_persona
            INNER JOIN carreras car ON mat.id_carrera=car.id_carrera
            INNER JOIN usuarios usur ON per.id_persona=usur.id_persona
            WHERE usur.id_usuario=:idAlumno
            ");

         $stmt -> bindParam(":idAlumno", $idAlumno, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt->close();

    }

    public function listSummaryNotas($tabla,$idUser){
        $query  = " select id_alumno,id_ciclo, ciclo, ciclo_des , sum(credito) as credito, ROUND(sum(promedio)/count(credito),2) as promedio  ";
        $query .= " from (select distinct CONCAT(per.ape_paterno,' ', per.ape_materno,', ',per.nombres ) as nombres, ";
        $query .= " alum.id_alumno, ci.id_ciclo, ci.deslar as ciclo_des,ci.descor as ciclo, cur.deslar as curso, cur.credito,";
        $query .= " ROUND(sum(desnot.nota*tn.porcentaje/100),2) as promedio ";
        $query .= " from $tabla as n ";
        $query .= " inner join detalle_nota as desnot on n.id_nota=desnot.id_nota ";
        $query .= " inner join cursos as cur on n.id_curso=cur.id_curso ";
        $query .= " inner join ciclo as ci on n.id_ciclo=ci.id_ciclo ";
        $query .= " inner join tipo_nota as tn on desnot.id_tNota=tn.id_tNota ";
        $query .= " inner join alumnos as alum on alum.id_alumno=n.id_alumno ";
        $query .= " inner join matricula as mat on ci.id_ciclo=mat.id_ciclo ";
        $query .= " inner join evaluacionpostulante as ev on mat.id_evaluacionPost=ev.id_evaluacionPost ";
        $query .= " inner join persona as per on ev.id_persona=per.id_persona ";
        $query .= " inner join usuarios as us on per.id_persona=us.id_persona ";
        $query .= " where us.id_usuario=".$idUser;
        $query .= " group by ci.descor,cur.credito,cur.id_curso ";
        $query .= " ) as notas_final group by ciclo " ;
        $stmt = Conexion::conectaDB()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->close();
    }


    public function listDetallNotas($table,$ciclo,$codUser){
        $query  = " select distinct CONCAT(per.ape_paterno,' ', per.ape_materno,', ',per.nombres ) as nombres, ";
        $query .= " alum.id_alumno, ci.id_ciclo, ci.deslar as ciclo_des,ci.descor as ciclo, cur.deslar as curso, cur.credito,";
        $query .= " ROUND(sum(desnot.nota*tn.porcentaje/100),2) as promedio ";
        $query .= " from $table as n ";
        $query .= " inner join detalle_nota as desnot on n.id_nota=desnot.id_nota ";
        $query .= " inner join cursos as cur on n.id_curso=cur.id_curso ";
        $query .= " inner join ciclo as ci on n.id_ciclo=ci.id_ciclo ";
        $query .= " inner join tipo_nota as tn on desnot.id_tNota=tn.id_tNota ";
        $query .= " inner join alumnos as alum on alum.id_alumno=n.id_alumno ";
        $query .= " inner join matricula as mat on ci.id_ciclo=mat.id_ciclo ";
        $query .= " inner join evaluacionpostulante as ev on mat.id_evaluacionPost=ev.id_evaluacionPost ";
        $query .= " inner join persona as per on ev.id_persona=per.id_persona ";
        $query .= " inner join usuarios as us on per.id_persona=us.id_persona ";
        $query .= " where us.id_usuario=".$codUser;
        $query .= " and ci.id_ciclo = ".$ciclo;
        $query .= " group by ci.descor,cur.credito,cur.id_curso ";
        $stmt = Conexion::conectaDB()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->close();
    }

    



   


}
