/*=========================================
=            OCULTAR Y MOSTRAR            =
=========================================*/

function init(){
	$(".cancelar-academico").hide();
	$(".form-insert-academico").hide();
}

$(".agregar-academico").click(function(){

	$(".form-insert-academico").show();
	$(".agregar-academico").hide();
	$(".cancelar-academico").show();
	$(".form-insert").trigger("reset");

});

$(".cancelar-academico").click(function(){

	$(".form-insert-academico").hide();
	$(".agregar-academico").show();
	$(".cancelar-academico").hide();
	$(".form-insert").trigger("reset");

});

init();

//=====  End of OCULTAR Y MOSTRAR  ======


/*=======================================================
=            ASIGNACION DE CURSOS A CARRERAS            =
=======================================================*/

// Buscar Carrera
$("#searchCarrera").keyup(function(){

	let searchCarrera = $("#searchCarrera").val();
	// console.log(searchCarrera);
	$.ajax({
		type: "POST",
		url: "views/ajax/mn_gestorCarreras.php",
		data:{searchCarrera},
		success:function(response){
			let datos = JSON.parse(response);
			let template = "";
			datos.forEach(datos => {
				template += `<tr>
											<td>
												<div>
													<input type="radio" id="${datos.id}" class="radio-col-blue" name="codCarreraAsig" value="${datos.id}" class="form-check-input">
													<label for="${datos.id}"></label>
												</div>
											</td>
											<td>${datos.id}</td>
											<td>${datos.descor}</td>
											<td>${datos.deslar}</td>
										</tr>`
			});
			$("#dataCarreras").html(template);
		}
	});

});

// MOSTRAR DATOS CARRERA

function mostrarBusquedaCarreraAsig(){

	var elementos = document.getElementsByName("codCarreraAsig");
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
			url: "views/ajax/mn_gestorCarreras.php",
			data: {cod},
			success: function(response){
				let data = JSON.parse(response);
				// console.log(data);
				$("#idCarreraAsig").val(data.id);
				$("#descCarrera").val(data.deslar);
				showTableCArrerasCursos(cod);
			}
		});
	}

}

/*=====  End of ASIGNACION DE CURSOS A CARRERAS  ======*/

/*=================================================================
=            TABLA DE ASIGNACION DE CARREAS A CURSOS            =
=================================================================*/

function showTableCArrerasCursos(idCarrera){

	var idCarreraAsig = idCarrera;

	$.ajax({
		type: "POST",
		url: "views/ajax/mn_gestorCarreras.php",
		data: {idCarreraAsig},
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

/*=====  End of TABLA DE ASIGNACION DE MODULOS A PERFILES  ======*/

/*==============================================================
=            INSERTAR ASIGNACION MODULOS - PERFILES            =
==============================================================*/

function insertCarrerasCursosAsig(){

	var idCarreraAsigI = $("#idCarreraAsig").val();
	var idCursoAsigI = $("#idCursoAsig").val();

	 // console.log(idCarreraAsigI, idCursoAsigI);

	$.ajax({
		type: "POST",
		url: "views/ajax/mn_gestorCarreras.php",
		data: {idCarreraAsigI, idCursoAsigI},
		success:function(response){
			// console.log(response);
			if(response === "success"){

				swal({
								title: "¡OK!",
								text: "¡Registro insertado exitosamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false,
									
						});

				showTableCArrerasCursos(idCarreraAsigI);

			}
		}
	});

}

/*=====  End of INSERTAR ASIGNACION MODULOS - PERFILES  ======*/

/*==================================================================
=            ELIMINAR ASIGNACION DE MODULOS A PERFILES            =
==================================================================*/

function deleteCarrerasCursos(idCarrera, idCurso){

	var idCarreraAsigD = idCarrera;
	var idCursoAsigD = idCurso;

	// console.log(idCarreraAsigD, idCursoAsigD);

	$.ajax({
		type: "POST",
		url: "views/ajax/mn_gestorCarreras.php",
		data: {idCarreraAsigD, idCursoAsigD},
		success:function(response){
			console.log(response);
			if(response === "success"){
				swal({
								title: "¡OK!",
								text: "¡Registro eliminado exitosamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false,
						});

				showTableCArrerasCursos(idCarreraAsigD);

			}
		}
	});

}

/*=====  End of ELIMINAR ASIGNACION DE MODULOS A PERFILES  ======*/
