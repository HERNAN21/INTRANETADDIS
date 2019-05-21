/* ====================================
Mostrar formulario registro Perfil
=================================== */
$("#agregarUsuario").click(function(){
	$("#frmCrearUsuarios").toggle("fast");
	$("#listado-usuarios").toggle("fast");
});

$("#cancelar").click(function(){
	$("#frmCrearUsuarios").toggle("fast");
	$("#listado-usuarios").toggle("fast");
});

$("#subirFotoUsuario").change(function(){
	$("#subirFotoUsuario").attr("name", "nuevaImagen");
});

/*================================================================
=            Busqueda de personal en la ventana modal            =
================================================================*/

	$("#searchPersona").keyup(function(){

		let searchPersona = $("#searchPersona").val();

		$.ajax({
			type: "POST",
			url: "views/ajax/ms_gestorUsuarios.php",
			data: {searchPersona},
			success: function(response){
				let datos = JSON.parse(response);
				let template = ""; 
				datos.forEach(datos => {
					template += `<tr>
												<td>
													<div>
														<input type="radio" id="${datos.idPersona}" class="radio-col-blue" name="codPersona" value="${datos.idPersona}" class="form-check-input">
														<label for="${datos.idPersona}"></label>
													</div>
												</td>
												<td>${datos.nombres}</td>
												<td>${datos.ape_paterno} ${datos.ape_materno}</td>
												<td>${datos.dni}</td>
												<td>${datos.persona}</td>
											</tr>`
				});

				$("#dataPersona").html('<thead><tr><th>#</th><th>Nombres</th><th>Apellidos</th><th>Dni</th><th>Ocupación</th></tr></thead><tbody>'+template+'</tbody>');
			}
		});

	});

/*=====  End of Busqueda de personal en la ventana modal  ======*/

/*========================================
=            Mostrar busqueda            =
========================================*/

function mostrarBusquedaPersona(){

	var elementos = document.getElementsByName("codPersona");
	var cod = null;


	for ( var i=0; i<elementos.length; i++ ){
		if(elementos[i].checked){
			cod = elementos[i].value;
			break;
		}
	}

	if(cod!==null){
		$.ajax({
			type: "POST",
			url: "views/ajax/ms_gestorUsuarios.php",
			data: {cod},
			success:function(response){
				var datos = JSON.parse(response);
				$("#idPer").val(datos.idPersona);
				$("#nombrePersona").val(datos.nombres+ ' ' + datos.ape_paterno + ' ' + datos.ape_materno);
				$("#nroDni").val(datos.dni);
			}
		});
	}

}

/*=====  End of Mostrar busqueda  ======*/

/*============================================
=            Cambiar Foto usuario            =
============================================*/

$(document).on('click','.btn-editar-usuario', function(){
	let element = $(this)[0].parentElement.parentElement;
	let idUser = $(element).attr('idUsuario');

	// console.log(idUser);
	$.post('views/ajax/ms_gestorUsuarios.php',{idUser}, function(response){

		const data = JSON.parse(response);

		 $("#editarUsuarios").modal('toggle');
		 $("#editarUsuarios").modal('show');
		 $("#editarNombre").val(data.nombres + ' ' + data.ape_paterno +' ' + data.ape_materno);
		 $("#IdUser").val(data.id_usuario);
		 $("#editarDni").val(data.dni);
		 $("#editarUsuario").val(data.usuario);
		 $("#editarPassword").val(data.password);
		 $("#editarEmail").val(data.email);
		 imagen = document.getElementById("imgEditarFoto");
		 imagen.src = data.foto;
		 $("#editarFotoU").val(data.foto);

	});

});


$("#changeFotoUsuario").change(function(){
	$("#changeFotoUsuario").attr("name", "editarImagen");
});

/*=====  End of Cambiar Foto usuario  ======*/


/*==========================ASIGNACION DE PERFILES A USUARIOS=========================*/

/*================================================================
=            Busqueda de perfiles en la ventana modal            =
================================================================*/

	$("#searchUsuario").keyup(function(){

		let searchU = $("#searchUsuario").val();

		$.ajax({
			type: "POST",
			url: "views/ajax/ms_gestorPerfilesUsuarios.php",
			data: {searchU},
			success: function(response){
				let datos = JSON.parse(response);
				let template = ""; 
				datos.forEach(datos => {
					template += `<tr>
												<td>
													<div>
														<input type="radio" id="${datos.idUsuario}" class="radio-col-blue" name="codUsuAsig" value="${datos.idUsuario}" class="form-check-input">
														<label for="${datos.idUsuario}"></label>
													</div>
												</td>
												<td>${datos.nombres} ${datos.ape_paterno} ${datos.ape_materno}</td>
												<td>${datos.usuario}</td>
												<td>${datos.dni}</td>
											</tr>`
				});

				$("#datasuarios").html('<thead><tr><th>#</th><th>Nombre y Apellidos</th><th>Usuario</th><th>Dni</th></tr></thead><tbody>'+template+'</tbody>');
			}
		});

	});

/*=====  End of Busqueda de perfiles en la ventana modal  ======*/

/*========================================
=            Mostrar busqueda            =
========================================*/

function mostrarBusquedaUsuAsig(){

	var elementos = document.getElementsByName("codUsuAsig");
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
			url: "views/ajax/ms_gestorPerfilesUsuarios.php",
			data: {cod},
			success:function(response){
				// console.log(response);
				var datos = JSON.parse(response);
				$("#showDni").val(datos.dni);
				$("#showIduser").val(datos.idUsuario);
				$("#showNomApell").val(datos.nombres + ' ' + datos.apePaterno + ' ' + datos.apeMaterno);
				$("#showUsuario").val(datos.usuario);
				showTablePerfilesUsuarios(cod);
			}
		});
	}
}

/*=====  End of Mostrar busqueda  ======*/

/*=================================================================
=            TABLA DE ASIGNACION DE MODULOS A PERFILES            =
=================================================================*/

function showTablePerfilesUsuarios(idUsuario){

	var idUsuarioAsig = idUsuario;

	$.ajax({
		type: "POST",
		url: "views/ajax/ms_gestorPerfilesUsuarios.php",
		data: {idUsuarioAsig},
		success:function(response){
			// console.log(response);
			let datos = JSON.parse(response);
			let template = ""; 
			datos.forEach(datos => {
				template += `<tr>
											<td>${datos.usuario}</td>
											<td>${datos.perfil}</td>
											<td><button type="button" class="btn btn-danger btn-xs" onclick="deletePerfilesUsuarios('${datos.idUsuario}','${datos.idPerfil}')"><i class="material-icons">delete</i></button></td>
										</tr>`
			});

			$("#asignacionPerfilesUsuarios").html('<table class="table table-striped"><thead><tr><th>USUARIO</th><th>PERFIL</th></tr></thead><tbody>'+template+'</tbody></table>');
		}
	});

}

/*=====  End of TABLA DE ASIGNACION DE MODULOS A PERFILES  ======*/

/*==============================================================
=            INSERTAR ASIGNACION MODULOS - PERFILES            =
==============================================================*/

function insertPerfilesUsuarios(){

	var idUsuarioAsigI = $("#showIduser").val();
	var idPerfilAsigI = $("#tipoIdPerfil").val();

	 // console.log(idUsuarioAsigI, idPerfilAsigI);

	$.ajax({
		type: "POST",
		url: "views/ajax/ms_gestorPerfilesUsuarios.php",
		data: {idUsuarioAsigI, idPerfilAsigI },
		success:function(response){

			console.log(response);
			if(response === "Exito"){

				swal({
								title: "¡OK!",
								text: "¡Registro insertado exitosamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false,
									
						});

				showTablePerfilesUsuarios(idUsuarioAsigI);

			}
		}
	});

}

/*=====  End of INSERTAR ASIGNACION MODULOS - PERFILES  ======*/

/*==================================================================
=            ELIMINAR ASIGNACION DE MODULOS A PERFILES            =
==================================================================*/

function deletePerfilesUsuarios(idUsuario, idPerfil){

	var idUsuarioAsigD = idUsuario;
	var idPerfilAsigD = idPerfil;

	$.ajax({
		type: "POST",
		url: "views/ajax/ms_gestorPerfilesUsuarios.php",
		data: {idUsuarioAsigD, idPerfilAsigD },
		success:function(response){
			if(response === "Exito"){

				swal({
								title: "¡OK!",
								text: "¡Registro eliminado exitosamente!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false,
									
						});

				showTablePerfilesUsuarios(idUsuarioAsigD);

			}
		}
	});

}

/*=====  End of ELIMINAR ASIGNACION DE MODULOS A PERFILES  ======*/

/*========================================
=            CAMBIAR PASSWORD            =
========================================*/


/*=====  End of CAMBIAR PASSWORD  ======*/


