/*===================================================
=            MODULO ALUMNOS - MIS CURSOS            =
===================================================*/


setTimeout(function() {
	cursosNotasAlumnos();
	cuentasPagosAlumnos();
}, 100);



$("#cicloAlumno").change(function() {
	cursosNotasAlumnos();
});

var idUser = $("#idUser").val();
function cursosNotasAlumnos(){
		let idCiclo = $("#cicloAlumno").val();
		$.ajax({
			url: 'views/ajax/mn_misCursos.php',
			type: 'POST',
			dataType: 'JSON',
			data: {idCiclo: idCiclo, idUser:idUser},
			success: function(data){
				var template = $("#listCursosNotasAlumnos");
				var cursos_array=[];


				$.each(data, function(i, val) {
					var curso={"id":val.id_curso,"curso":val.curso, "docente":val.profesor, "credito":val.credito};
					cursos_array.push(curso);
				});

				
				var set=new Set(cursos_array.map(JSON.stringify));
				var data_list = Array.from(set).map(JSON.parse);


				// var data_list=$.unique(cursos_array);
				var cursos = "";
				$.each(data_list, function(i, val) {
					cursos = "<div class='header bg-green'><h2>"+val.curso+"</h2></div>"+
								"<div class='body' style='padding-left: 4%;'>"+
									"<div class='row clearfix'>"+
										"<div class='col-lg-4 col-md-12 col-xs-12 col-sm-6'>"+
											"<div class='row'>"+
												"<span style='color: green'>Profesor</span>"+
												"<div class='col-lg-12 col-md-12 col-xs-12 col-sm-6'>"+
													val.docente.toUpperCase()+
												"</div>"+
											"</div>"+
											"<div class='row'>"+
												"<p  style='padding-bottom:10px;'><span style='color: green'>Creditos: </span>"+val.credito+"</p>"+
											"</div>"+
											"<div class='row'>"+
												"<span style='color: green'>Modalidad de Enseñanza: </span>"+
												"<div class='col-lg-12 col-md-12 col-xs-12 col-sm-6'>Presencial</div>"+
											"</div>"+
											"<div class='row'>"+
												"<span style='color: green'>Formula: </span>"+
												"<div class='col-lg-12 col-md-12 col-xs-12 col-sm-6' >"+
													"<h5 id='"+val.id+"b'>20% * (EXPR)  +  30% * (EXFN)  +  50% * (PYFN)</h5>"+
												"</div>"+
											"</div>"+
										"</div>"+
										"<div class='col-lg-4 col-md-12 col-xs-12 col-sm-6' id='evaluaciones'>"+
											"<div class='row clearfix'>"+
												"<div style='color: green'>Evaluaciones: </div>"+
												"<div class='col-lg-12 col-md-12 col-xs-12'>"+
													"<div class='row clearfix' id='"+val.id+"'>"+
													"</div>"+
												"</div>"+
											"</div>"+
											"<div class='row clearfix'>"+
												"<div style='color: green'>Promedio: </div>"+
												"<div class='col-lg-12 col-md-12 col-xs-12'>"+
														"<h2 class='text-center' id='"+val.id+"a'></h2>"
												"</div>"+
											"</div>"+
										"</div>"+
										"<div class='col-lg-4 col-md-12 col-xs-12 col-sm-6'>hola"+
											"<div class='row clearfix'>"+
												"<h1 style='color: green'>Asistencia Presencial: </h1>"+
												"<div style='width: 400px;'>hola"+
													/*"<canvas id='oilChart' width='60' height='40'>"+
													"</canvas>"+
*/												"</div>"+
	 										"</div>"+
										"</div>";
					template.append(cursos);
				});

				$("#listCursosNotasAlumnos").find('div').each(function(i) {
					var idcur=$(this).attr("id");
					$.each(data, function(index, listado) {
						if (idcur==listado.id_curso) {

						 	var test="	<h6 class='col-xs-8 col-sm-8 col-md-8 col-lg-8'>"+listado.deslar+"</h6>"+
						 			"<label class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>"+listado.nota+"</label>";
						}
						$("#"+idcur).append(test);
					});
				});

				$("#listCursosNotasAlumnos").find('h2').each(function(i) {
					var idCur = $(this).attr('id');
					var promedioFinal = 0.00;
					$.each(data, function(x, promedio) {
						if(idCur == promedio.id_curso+"a"){
							var suma = (promedio.nota*promedio.porcentaje/100);
							promedioFinal += suma;
						}
					});
						if(promedioFinal > 0){
							$("#"+idCur).append(promedioFinal);
						}

				});
				$("#listCursosNotasAlumnos").find('h5').each(function(e) {
					var idCur = $(this).attr('id');
					$.each(data, function(e, listado) {
						if (idCur == listado.id_curso+"b") {
							var formula = listado.descor;

						}
					});

					$("#"+idCur).append(formula);
				});
			}
	});
}

/*=====  End of MODULO ALUMNOS - MIS CURSOS  ======*/

/*================================================================
=            VISUALIZACION DE CUENTAS Y PAGOS ALUMNOS            =
================================================================*/

$("#idCicloAlumno").change(function() {

	cuentasPagosAlumnos();

});

function cuentasPagosAlumnos(){
	let idCicloAlumno = $("#idCicloAlumno").val();
	if(idCicloAlumno !== 0){
		$.ajax({
			url: 'views/ajax/mn_misCursos.php',
			type: 'POST',
			dataType: 'JSON',
			data: {idCicloAlumno: idCicloAlumno, idUser:idUser},
			success: function(data){
				let template = "";
				$.each(data, function(i, val) {
					 template += '<tr>'+
									'<td>'+ val.id_cuenta+ '</td>'+
									'<td>'+val.concepto+'</td>'+
									'<td>'+val.monto_deuda+'</td>'+
									'<td>'+val.vencimiento+'</td>';
									if(val.estado === "P"){
										template += '<td>CANCELADO</td>'
									}else{
										template += '<td>DEUDA</td>'
									};
									template+='<td><a><i class="material-icons">file_copy</i>Descargar</td></a>'+
								'</tr>'
				});

				$("#listCuentasALumnos table").html('<thead class="bg-orange"><tr><th>Item</th><th>Concepto</th><th>Monto</th><th>F. Vencimiento</th><th>estado</th><th>Accion</th></tr></thead><tbody>'+template+'</tbody>');
			}
		});
	};
};

/*=====  End of VISUALIZACION DE CUENTAS Y PAGOS ALUMNOS  ======*/



/*Mis record de notas*/

