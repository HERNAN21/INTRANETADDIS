/*==========================================
=            Obtener los cursos            =
==========================================*/
	$("#selectCarreras").on('change', function() {
		var idCarrera = $(this).val();
		var idUser = $("#idUser").val();
			if(idCarrera !== null){
				$.ajax({
					url: 'views/ajax/mn_gestorNotas.php',
					type: 'POST',
					dataType: 'JSON',
					data: {idCarrera:idCarrera, idUser:idUser},
					success: function(data){
						console.log(data);
						let combo = "";
						$.each(data, function(i, val) {
							var option = "<option val='"+val.id_ciclo+"'>"+val.deslar+"</option>";
						$("#selectCiclos").html('<select class="form-control show-tick" id="" style="border:none; border-bottom: 1px solid #ddd !important;  box-shadow: none; border-radius:0;" id="selectCursos">'+option+'</select>');
						});
						$("#selectSecciones").html('<option value="">Seleccione Seccion</option>');
						$("#selectCursos").html('<option value="">Seleccione un Curso</option>');
					}
				});
			}else {
				$("#selectCiclos").html('');
				$("#selectSecciones").html('<option value="">Seleccione Seccion</option>');
				$("#selectCursos").html('<option value="">Seleccione un Curso</option>');
			}		

		/*$("#selectCiclos option:selected").$.each(function(index, val) {
			 idCiclo = $(this).val();
			 $.post("views/ajax/ma_gestorNotas.php", { idCiclo: idCiclo
			 }, function(data){
			 	$("#selectCiclos").html(data);
			 })
		});*/
	});
	


/*=====  End of Obtener los cursos  ======*/


/*===============================================================================
=            Obtener cursos de Acuerdo a la carrera, ciclo y seccion            =
===============================================================================*/
/*function select_curso(){
	var idCarrera = $("#selectCarreras").val();
	var idCiclo = $("#selectCiclos").val();
	var codUsuario = $("#idUser").val();

	$.ajax({
		type: "POST",
		url: "views/ajax/mn_gestorNotas.php",
		data: { idCarrera: idCarrera, idCiclo: idCiclo, codUsuario:codUsuario},
		success:function(respuesta){
			$("#sCursos select").remove();
			$("#sCursos").html('<select class="form-control show-tick" style="border:none; border-bottom: 1px solid #ddd !important;  box-shadow: none; border-radius:0;" id="selectCursos">'+respuesta+'</select>');
		}
	});

}*/

/*=====  End of Obtener cursos de Acuerdo a la carrera, ciclo y seccion  ======*/

/*==================================================
=            Obtener listado de Alumnos            =
==================================================*/

/*function mostrar_RegistroAlumnos(){

	var carrera = $("#selectCarreras option:selected").text();
	var ciclo = $("#selectCiclos option:selected").text();
	var seccion = $("#selectSecciones option:selected").text();
	var curso = $("#selectCursos option:selected").text();
	// var credito = $("#credito").val();
	var idCarrera = $("#selectCarreras").val();
	var idCiclo = $("#selectCiclos").val();
	var idSeccion = $("#selectSecciones").val();

	$.ajax({
		type: "POST",
		url: "views/ajax/mn_gestorNotas.php",
		data:{idCarrera, idCiclo, idSeccion},
		success:function(respuesta){
			$("#head_alumnos").html('<div class="header" style="text-align: center;"><h2> '+carrera+' &nbsp; &nbsp; - &nbsp; &nbsp; ' +ciclo+' &nbsp; &nbsp; - &nbsp; &nbsp; '+seccion+'</h2></div> <div class="body" id="body_alumnos"> <div class="row clearfix"><div class="col-lg-2"><label class="col-teal">CURSO : </label></div><div class="col-lg-6"><p>'+curso+'</p></div><div class="col-lg-2"><label class="col-teal">CREDITO : </label></div><div class="col-lg-1"><p>3 cdts</p></div></div><div class="table-responsive align-center" style="margin-bottom: -30px;"> <table class="table table-hover dashboard-task-infos"><thead><tr><th class="align-center">Cod_Alumno</th><th class="align-center">Nombre y Apellidos</th><th class="align-center">DNI</th><th class="align-center">Promedio</th><th class="align-center">Condicion</th><th class="align-center">Acciones</th></tr></thead><tbody>'+respuesta+'</tbody></table></div></div>');
			$("#Listado_alumnos").show();
		}
	});

}*/

/*=====  End of Obtener listado de Alumnos  ======*/

/*====================================================
=            Obtener las notas del alumno            =
====================================================*/

//modo 2----------------------------------------------------------------------

/*function verRegistroNotas(idAlumn){

	var idAlumno = idAlumn;
	var idAlumno = idAlumn;
	var idCicloR = $("#selectCiclos").val();
		$.ajax({
 		type: "POST", 
 		url: "views/ajax/mn_gestorNotas.php",
 		data: {idAlumno, idCicloR},
 		success:function(respuesta){
 			$("#listadoNotasAlum").html('<input type="hidden" value="'+idAlumno+'" id="idAlumnoNota"><table class="table table-hover dashboard-task-infos"><thead><tr><th class="align-center">Capacidad Evaluada</th><th class="align-center">Fecha de registro</th><th class="align-center">Porcentaje</th><th class="align-center">Nota</th><th class="align-center">Acciones</th></tr><tbody>'+respuesta+'</tbody></thead></table>');
 			$("#registroNotasAlumnos").show();
 		 	$("#Listado_alumnos").hide();
 		  	$("#card_combos").hide();
 		}
 	});

}*/

/*=====  End of Obtener las notas del alumno  ======*/

 /*======================================
 =            Agregar notas             =
 ======================================*/
 
 /* Mostrar y Ocultar */
 
// function btnAgregarNotas(flat){

// 	var idAlumno = $("#idAlumnoNota").val();
// 	var idCurso = $("#selectCursos").val();
// 	var idCiclo = $("#selectCiclos").val();

// 	if(flat)
// 	{
// 		$("#frm_registrarNotas").toggle("fast");
// 		$("#inAlumno").val(idAlumno);
// 		$("#inCurso").val(idCurso);
// 		$("#inCiclo").val(idCiclo);
// 		$("#btnAgregarNotas").hide();
// 		$("#volverNotas").hide();
// 	}

// }

// $("#btnCancelarNotas").click(function(){
// 	$("#frm_registrarNotas").toggle("fast");
// 	$("#formInsertNotas").trigger("reset");
// 	$("#btnAgregarNotas").show();
// 	$("#volverNotas").show();
// });

// $("#volverNotas").click(function(){
// 	$("#registroNotasAlumnos").hide();
//  	$("#Listado_alumnos").show();
//  	$("#card_combos").show();
// });

// /* Insertar Notas */

// function insertNotas(){
// // $('#formInsertNotas').submit(function (e){
	
// 		var idAlumno = $('#inAlumno').val();
// 		var idCurso = $("#inCurso").val();
// 		var idCiclo = $("#inCiclo").val();
// 		var tNota = $("#tNota").val();
// 		var nota = $("#inNota").val();
// 		var porcentaje = $("#inPorcentNota").val();
// 		var idAlumnoN = $("#idAlumnoNota").val();
	
//  	// console.log(postData);
// 	$.ajax({
// 		type:"POST", 
// 		url:"views/ajax/mn_gestorNotas.php",
// 		data:{idAlumno, idCurso, idCiclo, tNota, nota, porcentaje},
// 		success:function(respuesta){
// 			// console.log(respuesta);
// 			// swal({
// 			// 	title: "¡OK!",
// 			// 	text: "¡Registro guardado Correctamente!",
// 			// 	type: "succes",
// 			// 	confirmButtonText: "cerrar",
// 			// 	closeOnConfirm:false,
// 			// });

// 			if( respuesta === "Guardado"){
// 				//Mostramos mensaje 
// 				alert("¡Registro guardado Correctamente!");
// 				$("#frm_registrarNotas").toggle("400");
// 				$("#formInsertNotas").trigger("reset");
// 				$("#btnAgregarNotas").show();
// 				$("#volverNotas").show();
//                 //wal("SIPLAE", "¡Registro guardado Correctamente!", "success");
// 			}else{
// 				alert("¡Error al guardad registro!");
// 				//swal("SIPLAE", "Error al guardad registro!", "error");
// 			}

// 			verRegistroNotas(idAlumnoN);
// 		}
// 	});
	

// }


//  /*=====  End of Agregar notas   ======*/


// // /*====================================
// // =            Editar Notas            =
// // ====================================*/

// $(document).on('click', '.btn-editar-Notas', function(){
// 	let element = $(this)[0].parentElement.parentElement;
// 	let idNotaE = $(element).attr('idNota');

// 	// console.log(idNotaE);

// 	$.post('views/ajax/mn_gestorNotas.php',{idNotaE}, function(respuesta){
// 		const data = JSON.parse(respuesta);

// 		 // console.log(respuesta);
		 
// 		 $("#modalEditar").modal('toggle');
// 		 $("#modalEditar").modal('show');
// 		 $("#upIdNota").val(data.id_nota);
// 		 $("#upAlumno").val(data.id_alumno);
// 		 $("#upCurso").val(data.id_ciclo);
// 		 $("#upCiclo").val(data.id_curso);
// 		 $("#upDescripcionNota").val(data.deslar);
// 		 $("#upNota").val(data.nota);
// 		 $("#upPorcentNota").val(data.porcentaje);
		 
// 	});

// });

// function updateNotas(){

// 	var idNotaUp = $("#upIdNota").val();
// 	var tNotaUp = $("#tNotaUp").val();
// 	var notaUp = $("#upNota").val();
// 	var porcentajeUp = $("#upPorcentNota").val();
// 	var idAlumnoN = $("#idAlumnoNota").val();

// 	// console.log(idNotaUp, tNotaUp, notaUp, porcentajeUp);

// 	$.ajax({
// 		type: "POST",
// 		url: "views/ajax/mn_gestorNotas.php",
// 		data: { idNotaUp, tNotaUp, notaUp, porcentajeUp},
// 		success:function(respuesta){

// 		// console.log(respuesta);
// 			if( respuesta === "Actualizado"){
// 				//Mostramos mensaje 
// 				alert("¡Registro actualizado Correctamente!");
// 				$("#modalEditar").modal('hide');
// 			}else{
// 				alert("¡Error al actualizar registro!");
// 			}

// 			verRegistroNotas(idAlumnoN);
// 		}

// 	});
// }

// // /*=====  End of Editar Notas  ======*/


// /*======================================
// =            Eliminar Notas            =
// ======================================*/

// $(document).on('click', '.btn-eliminar', function(){
// 	let element = $(this)[0].parentElement.parentElement;
// 	let idNota = $(element).attr('idNota');
// 	var idAlumno = $("#idAlumnoNota").val();
// 	//console.log(idNota);

// 	$.ajax({
// 		type: "POST",
// 		url: "views/ajax/mn_gestorNotas.php",
// 		data: {idNota},
// 		success:function(respuesta){
// 			if(respuesta === "Eliminado"){
// 				alert("¡Se elimino correctamente el registro!");
// 			}else{
// 				alert("¡Error al realizar operación!");
// 			}
// 			verRegistroNotas(idAlumno);
// 			//console.log(respuesta);
// 		}
// 	});

// });

// /*=====  End of Eliminar Notas  ======*/







































// /*===========================================================
// =            Start Obtener las secciones de aula            =
// ===========================================================*/

// // function select_seccion(){

// // 	var idCarrera = $("#carreras").val();
// // 	var idCiclo = $("#ciclos").val();

// // 	//alert ("Hola select " + idCarrera + " " + idCiclo);

// // 	$.ajax({
// // 		type: "POST",
// // 		url: "views/ajax/mn_gestorNotas.php",
// // 		data: {idCarrera: idCarrera, idCiclo: idCiclo},
// // 		beforeSend: function(objeto)
// // 		{

// // 		},
// // 		success: function(data){
// // 			$("#seccion option").remove();
// // 		 	$("#seccion").html(data);
// // 		} 
// // 	});
// // }


// /*=====  End of  Obtener las secciones de aula  ======*/

// /*===========================================================
// =            Start Obtener las secciones de aula            =
// ===========================================================*/
// /*
// function select_ciclo(){

// 	var idCarrera = $("#carreras").val();
// 	var idCiclo = $("#ciclos").val();
// 	var idSeccion = $("#secciones").val();

// 	alert ("Hola select " + idCarrera + " " + idCiclo);

// 	// $.ajax({
// 	// 	type: "POST",
// 	// 	url: "views/ajax/mn_gestorNotas.php",
// 	// 	data: {idCarrera: idCarrera, idCiclo: idCiclo},
// 	// 	beforeSend: function(objeto)
// 	// 	{

// 	// 	},
// 	// 	success: function(data){
// 	// 		$("#seccion option").remove();
// 	// 	 	$("#seccion").html(data);
// 	// 	} 
// 	// });


// }


// /*=====  End of  Obtener las secciones de aula  ======*/

// /*

// function select_ciclo(){
// 	var idCiclo = $("#ciclo").val();
// 	//alert("hola select = " + idCiclo);

// 	var ob = {idCiclo : idCiclo};

// 	$.ajax({
// 			type: "POST",
// 			url: "views/ajax/gestorNotas.php",
// 			data: ob,
// 			beforeSend: function(objeto)
// 			{

// 			},
// 			success: function(data)
// 			{
// 				$("#listaNotas").html(data);
// 			}
// 	});

// }*/


// /*===================================================================
// =      start Ocultar y Mostrar formulario registar notas            =
// ===================================================================*/
// // function init(){
// // 	mostrarForm(false);
// // }

// // function mostrarForm(flat){
// //  	if(flat)
// //  	{
// //  		$("#frm_registrarNotas").show();
// //  		$("#card_datosCurso").hide();
// //  		$("#card_combos").hide()
// //  		$("#listaNotas").hide();
// //  	}else
// //  	{
// //  		$("#frm_registrarNotas").hide();
// //  		$("#card_datosCurso").show();
// //  		$("#card_combos").show()
// //  		$("#listaNotas").show();
// //  	}
// //  }

// //  function cancelarForm(){
// //  	mostrarForm(false);
// //  }

// //  init();
// /*=====  End of Ocultar y Mostrar formulario registar notas  ======


