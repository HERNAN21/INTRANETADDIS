/* ====================================
Mostrar formulario registro Perfiles
=================================== */
$("#agregarPerfil").click(function(){
	$("#frmCrearPerfiles").toggle("500");
	$("#listado-Perfiles").toggle("500");
});

$("#cancelarPerfil").click(function(){
	$("#frmCrearPerfiles").toggle("500");
	$("#listado-Perfiles").toggle("500");
});

// ASIGNACION MODULOS A PERFILES

/*================================================================
=            Busqueda de perfiles en la ventana modal            =
================================================================*/

	$("#search").keyup(function(){

		let search = $("#search").val();

		// console.log(search);

		$.ajax({
			type: "POST",
			url: "views/ajax/ms_gestorModulosPerfiles.php",
			data: {search},
			success: function(response){
				let datos = JSON.parse(response);
				let template = ""; 
				datos.forEach(datos => {
					template += `<tr>
												<td>
													<div>
														<input type="radio" id="${datos.idPerf}" class="radio-col-blue" name="codPerfilAsig" value="${datos.idPerf}" class="form-check-input">
														<label for="${datos.idPerf}"></label>
													</div>
												</td>
												<td>${datos.idPerf}</td>
												<td>${datos.descor}</td>
												<td>${datos.deslar}</td>
											</tr>`
				});

				$("#dataPerfil").html('<thead><tr><th>#</th><th>Codigo</th><th>Des. Corta</th><th>Des. Completa</th></tr></thead><tbody>'+template+'</tbody>');
			}
		});

	});

/*=====  End of Busqueda de perfiles en la ventana modal  ======*/

/*========================================
=            Mostrar busqueda            =
========================================*/

function mostrarBusquedaPerfAsig(){

	var elementos = document.getElementsByName("codPerfilAsig");
	var cod = null;

	for ( var i=0; i<elementos.length; i++ ){
		if(elementos[i].checked){
			cod = elementos[i].value;
			break;
		}
	}

	// console.log(cod);

	if(cod!==null){
		$.ajax({
			type: "POST",
			url: "views/ajax/ms_gestorModulosPerfiles.php",
			data: {cod},
			success:function(response){
				var datos = JSON.parse(response);
				// console.log(datos);
				$("#codPerfilAsig").val(datos.idPerf);
				$("#descPerfilAsig").val(datos.deslar);
				showTableModulosPerfiles(cod);
			}
		});
	}
}

/*=====  End of Mostrar busqueda  ======*/

/*=================================================================
=            TABLA DE ASIGNACION DE MODULOS A PERFILES            =
=================================================================*/

function showTableModulosPerfiles(idPerfil){

	var idPerfilAsig = idPerfil;

	$.ajax({
		type: "POST",
		url: "views/ajax/ms_gestorModulosPerfiles.php",
		data: {idPerfilAsig},
		success:function(response){
			let datos = JSON.parse(response);
			let template = ""; 
			datos.forEach(datos => {
				template += `<tr>
											<td>${datos.perfil}</td>
											<td>${datos.modulo}</td>
											<td><button type="button" class="btn btn-danger btn-xs" onclick="deleteModulosPerfiles('${datos.idPerf}','${datos.idMod}')"><i class="material-icons">delete</i></button></td>
										</tr>`
			});

			$("#asignacionModulosPerfil").html('<table class="table table-striped"><thead><tr><th>PERFIL</th><th>MODULO</th></tr></thead><tbody>'+template+'</tbody></table>');
		}
	});

}

/*=====  End of TABLA DE ASIGNACION DE MODULOS A PERFILES  ======*/

/*==============================================================
=            INSERTAR ASIGNACION MODULOS - PERFILES            =
==============================================================*/

function insertModulosPerfiles(){

	var idPerfilAsigI = $("#codPerfilAsig").val();
	var idModuloAsigI = $("#tipoModuloAsig").val();

	 // console.log(idModuloAsigI, idPerfilAsigI);

	$.ajax({
		type: "POST",
		url: "views/ajax/ms_gestorModulosPerfiles.php",
		data: {idPerfilAsigI, idModuloAsigI },
		success:function(response){

			// console.log(response);
			if(response === "Exito"){

				swal({
								title: "¡OK!",
								text: "¡Registro insertado exitosamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false,
									
						});

				showTableModulosPerfiles(idPerfilAsigI);

			}
		}
	});

}

/*=====  End of INSERTAR ASIGNACION MODULOS - PERFILES  ======*/

/*==================================================================
=            ELIMINAR ASIGNACION DE MODULOS A PERFILES            =
==================================================================*/

function deleteModulosPerfiles(idPerfil, idModulo){

	var idPerfilAsigD = idPerfil;
	var idModuloAsigD = idModulo;

	// console.log(idPerfilAsigD, idModuloAsigD);

	$.ajax({
		type: "POST",
		url: "views/ajax/ms_gestorModulosPerfiles.php",
		data: {idPerfilAsigD, idModuloAsigD },
		success:function(response){
			if(response === "Exito"){

				swal({
								title: "¡OK!",
								text: "¡Registro eliminado exitosamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false,
									
						});

				showTableModulosPerfiles(idPerfilAsigD);

			}
		}
	});

}

/*=====  End of ELIMINAR ASIGNACION DE MODULOS A PERFILES  ======*/




