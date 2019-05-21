SELECT
mat.cod_unicoMatricula,
UPPER (CONCAT(per.nombres, ' ',per.ape_paterno, ' ',per.ape_materno)) AS nombre, car.deslar,
alum.id_alumno as alumno
FROM matricula as mat
INNER JOIN alumnos alum ON alum.id_matricula = mat.id_matricula
INNER JOIN evaluacionPostulante evalPus ON mat.id_evaluacionPost=evalPus.id_evaluacionPost
INNER JOIN persona per ON evalPus.id_persona=per.id_persona
INNER JOIN carreras car ON mat.id_carrera=car.id_carrera
INNER JOIN usuarios usur ON per.id_persona=usur.id_persona
WHERE usur.id_usuario=2;


select distinct alum.id_alumno,ci.deslar,ci.descor,
	sum(credito) as total_credito,ROUND(sum(desnot.nota*tn.porcentaje/100),2) as promedio
 from alumnos as alum
inner join notas as n on alum.id_alumno=n.id_alumno
inner join ciclo as ci on n.id_ciclo=ci.id_ciclo
inner join detalle_nota as desnot on n.id_nota=desnot.id_nota
inner join cursos as cur on n.id_curso=cur.id_curso
inner join tipo_nota as tn on desnot.id_detalleNota=tn.id_tNota
inner join matricula as mat on ci.id_ciclo=mat.id_ciclo
inner join evaluacionpostulante as ev on mat.id_evaluacionPost=ev.id_evaluacionPost
inner join persona as per on ev.id_persona=per.id_persona
inner join usuarios as us on per.id_persona=us.id_persona
where us.id_usuario=2
;



select id_alumno,id_ciclo, ciclo, ciclo_des , sum(credito) as credito, ROUND(sum(promedio)/count(credito),2) as promedio  from (select distinct
	CONCAT(per.ape_paterno,' ', per.ape_materno,', ',per.nombres ) as nombres,
	alum.id_alumno,
    ci.id_ciclo, ci.deslar as ciclo_des,ci.descor as ciclo,
    cur.deslar as curso, cur.credito,
    ROUND(sum(desnot.nota*tn.porcentaje/100),2) as promedio
from notas as n
inner join detalle_nota as desnot on n.id_nota=desnot.id_nota
inner join cursos as cur on n.id_curso=cur.id_curso
inner join ciclo as ci on n.id_ciclo=ci.id_ciclo
inner join tipo_nota as tn on desnot.id_tNota=tn.id_tNota
inner join alumnos as alum on alum.id_alumno=n.id_alumno
inner join matricula as mat on ci.id_ciclo=mat.id_ciclo
inner join evaluacionpostulante as ev on mat.id_evaluacionPost=ev.id_evaluacionPost
inner join persona as per on ev.id_persona=per.id_persona
inner join usuarios as us on per.id_persona=us.id_persona
where us.id_usuario=2
group by ci.descor,cur.credito
) as notas_final group by ciclo ;

-- Detalles Notas

select distinct
	CONCAT(per.ape_paterno,' ', per.ape_materno,', ',per.nombres ) as nombres,
	alum.id_alumno,
    ci.id_ciclo, ci.deslar as ciclo_des,ci.descor as ciclo,
    cur.deslar as curso, cur.credito,
    ROUND(sum(desnot.nota*tn.porcentaje/100),2) as promedio
from notas as n
inner join detalle_nota as desnot on n.id_nota=desnot.id_nota
inner join cursos as cur on n.id_curso=cur.id_curso
inner join ciclo as ci on n.id_ciclo=ci.id_ciclo
inner join tipo_nota as tn on desnot.id_tNota=tn.id_tNota
inner join alumnos as alum on alum.id_alumno=n.id_alumno
inner join matricula as mat on ci.id_ciclo=mat.id_ciclo
inner join evaluacionpostulante as ev on mat.id_evaluacionPost=ev.id_evaluacionPost
inner join persona as per on ev.id_persona=per.id_persona
inner join usuarios as us on per.id_persona=us.id_persona
where us.id_usuario=2
and ci.id_ciclo=1
group by ci.descor,cur.credito;




select * from cursos;

update cursos set credito=3 where id_curso>='0';


select * from usuarios;

select * from usuarios;
select * from persona;

select * from notas;
select * from detalle_nota;







SELECT DISTINCT alum.id_alumno, ci.descor, ci.deslar,ci.id_ciclo
FROM alumnos as alum
INNER JOIN matricula mat
INNER JOIN renovacion_matricula rMat
INNER JOIN ciclo ci
INNER JOIN evaluacionPostulante ePost
INNER JOIN persona per
INNER JOIN usuarios usu
WHERE mat.id_matricula = alum.id_matricula
AND mat.id_ciclo = ci.id_ciclo
AND ePost.id_evaluacionPost = mat.id_evaluacionPost
AND per.id_persona = ePost.id_persona
AND usu.id_persona = per.id_persona
AND usu.id_usuario = $codUsuario
AND alum.id_alumno = 2
OR rMat.id_alumno = alum.id_alumno
AND rMat.id_ciclo = ci.id_ciclo
AND rMat.id_matricula = mat.id_matricula
AND rMat.id_alumno = 2

