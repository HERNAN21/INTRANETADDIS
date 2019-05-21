/*=======================================================
=            ASIGNACION DE CURSOS A CARRERAS            =
=======================================================*/

// Buscar Carrera
$("#searchCurso").keyup(function(){

	let searchCurso = $("#searchCurso").val();
	// console.log(searchCurso);
	$.ajax({
		type: "POST",
		url: "views/ajax/ma_gestorCursosCiclos.php",
		data:{searchCurso},
		success:function(response){
			// console.log(response);
			let datos = JSON.parse(response);
			let template = "";
			datos.forEach(datos => {
				template += `<tr>
											<td>
												<div>
													<input type="radio" id="${datos.id}" class="radio-col-blue" name="codCursoAsig" value="${datos.id}" class="form-check-input">
													<label for="${datos.id}"></label>
												</div>
											</td>
											<td>${datos.id}</td>
											<td>${datos.descor}</td>
											<td>${datos.deslar}</td>
										</tr>`
			});
			$("#dataCursos").html('<table class ="table table-bordered table-striped table-hover js-basic-example dataTable text-center"><thead><tr><th class="text-center">#</th><th class="text-center">CODIGO</th><th class="text-center">ABREVIATURA</th><th class="text-center">CURSO</th></tr></thead><tbody class="text-center">'+template+'</tbody></table>');
		}
	});

});

// MOSTRAR DATOS CARRERA

function mostrarBusquedaCursoAsig(){

	var elementos = document.getElementsByName("codCursoAsig");
	var cod = null;

	for ( var i=0; i<elementos.length; i++){
		if(elementos[i].checked){
			cod = elementos[i].value;
			break;
		}
	}

	if(cod !== null){
		$.ajax({
			type: "POST",
			url: "views/ajax/ma_gestorCursosCiclos.php",
			data: {cod},
			success: function(response){
				let data = JSON.parse(response);
				// console.log(data);
				$("#codCursoAsig").val(data.id);
				$("#descCurso").val(data.deslar);
				showTableCursosCiclos(cod);
			}
		});
	}

}

/*=====  End of ASIGNACION DE CURSOS A CARRERAS  ======*/

/*=================================================================
=            TABLA DE ASIGNACION DE CARREAS A CURSOS            =
=================================================================*/

function showTableCursosCiclos(idCurso){

	var idCursoAsig = idCurso;

	$.ajax({
		type: "POST",
		url: "views/ajax/ma_gestorCursosCiclos.php",
		data: {idCursoAsig},
		success:function(response){
			// console.log(response);
			let datos = JSON.parse(response);
			let template = ""; 
			datos.forEach(datos => {
				template += `<tr>
											<td>${datos.carrera}</td>
											<td>${datos.curso}</td>
											<td><button type="button" class="btn btn-danger btn-xs" onclick="deleteCarrerasCursos('${datos.idCarrera}','${datos.idCurso}')"><i class="material-icons">delete</i></button></td>
										</tr>`
			});

			$("#asignacionProgramAcadeCursos").html('<table class="table table-striped"><thead><tr><th>PROGRAMA ACADEMICO</th><th>CURSO</th></tr></thead><tbody>'+template+'</tbody></table>');
		}
	});

}

// /*=====  End of TABLA DE ASIGNACION DE MODULOS A PERFILES  ======*/

// ==============================================================
// =            INSERTAR ASIGNACION MODULOS - PERFILES            =
// ==============================================================

// function insertCarrerasCursosAsig(){

// 	var idCarreraAsigI = $("#idCarreraAsig").val();
// 	var idCursoAsigI = $("#idCursoAsig").val();

// 	 // console.log(idCarreraAsigI, idCursoAsigI);

// 	$.ajax({
// 		type: "POST",
// 		url: "views/ajax/mn_gestorCarreras.php",
// 		data: {idCarreraAsigI, idCursoAsigI},
// 		success:function(response){
// 			// console.log(response);
// 			if(response === "success"){

// 				swal({
// 								title: "¡OK!",
// 								text: "¡Registro insertado exitosamente!",
// 								type: "success",
// 								confirmButtonText: "Cerrar",
// 								closeOnConfirm: false,
									
// 						});

// 				showTableCArrerasCursos(idCarreraAsigI);

// 			}
// 		}
// 	});

// }

// /*=====  End of INSERTAR ASIGNACION MODULOS - PERFILES  ======*/

// /*==================================================================
// =            ELIMINAR ASIGNACION DE MODULOS A PERFILES            =
// ==================================================================*/

// function deleteCarrerasCursos(idCarrera, idCurso){

// 	var idCarreraAsigD = idCarrera;
// 	var idCursoAsigD = idCurso;

// 	// console.log(idCarreraAsigD, idCursoAsigD);

// 	$.ajax({
// 		type: "POST",
// 		url: "views/ajax/mn_gestorCarreras.php",
// 		data: {idCarreraAsigD, idCursoAsigD},
// 		success:function(response){
// 			console.log(response);
// 			if(response === "success"){
// 				swal({
// 								title: "¡OK!",
// 								text: "¡Registro eliminado exitosamente!",
// 								type: "success",
// 								confirmButtonText: "Cerrar",
// 								closeOnConfirm: false,
// 						});

// 				showTableCArrerasCursos(idCarreraAsigD);

// 			}
// 		}
// 	});

// }

// /*=====  End of ELIMINAR ASIGNACION DE MODULOS A PERFILES  ======*/