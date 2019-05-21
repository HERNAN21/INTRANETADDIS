/*==========================================
=            MOSTRAR / OCULTAR             =
==========================================*/

$("#showformInsertarImagen").click(function(){

	$("#formInsertarImagen").toggle(400);
	$("#formInicio").trigger("reset");
	
});

/*=====  End of MOSTRAR / OCULTAR   ======*/

/*======================================================
=            SUBIR IMAGEN A TRAVES DE INPUT            =
======================================================*/
$("#subirImagenInicio").change(function(){
	
	imagen = this.files[0];

	console.log(imagen);

	// validar tamaño de la imagen
	imagenSize = imagen.size;

	if(Number(imagenSize) > 2000000){

		$("#mostrarImagenInicio").before('<div class="alert alert-warning alerta text-center alert-dismissible" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>El archivo excede el peso permitido, 2MB</div>')

	}else{

		$(".alerta").remove();

	}

	//  Validar tipo de la imagen
	imagenType = imagen.type;

	if(imagenType === "image/jpeg" || imagenType === "image/png"){

		$(".alerta").remove();

	}else{

		$("#mostrarImagenInicio").before('<div class="alert alert-warning alerta text-center alert-dismissible" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>El archivo debe ser formato JPG o PNG</div>');

	}

/*=====  End of SUBIR IMAGEN A TRAVES DE INPUT  ======*/

/*===============================================
=            MOSTRAR IMAGEN CON AJAX            =
===============================================*/
		if(Number(imagenSize) < 2000000 && imagenType === "image/jpeg" || imagenType === "image/png"){

		var datos = new FormData();

		datos.append("imagen", imagen);

		$.ajax({
			url:"views/ajax/mc_gestorInicio.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function(){

				$("#mostrarImagenInicio").before('<div class="text-center"><img src="views/images/cargando.gif" id="status"</div>');

			},
			success: function(response){

				// console.log('respuesta' , response);
				$("#status").remove();

				if(response == 0){

					$("#mostrarImagenInicio").before('<div class="alert alert-warning alerta text-center alert-dismissible" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>La imagen es inferior a 1600 * 750px</div>');

				}else{

					$("#mostrarImagenInicio").html('<img src=" '+response.slice(6)+' " style="width: 200px; height: 100px; border: solid #fff 1px; display: inline-block;" >');

				}

			}
		});

	}

});

/*=====  End of MOSTRAR IMAGEN CON AJAX  ======*/

/*=========================================
=            EDITAR IMG INICIO            =
=========================================*/

$(".editarImgInicio").click(function(){

	idEditar = $(this).parent().parent().parent().attr("id");
	rutaImagen = $("#"+idEditar).children(".body").children(".media").children(".media-left").children("a").children("#editarImagen").attr("src");
	titulo = $("#"+idEditar).children(".body").children(".media").children(".media-body").children("h4").children("#editarTitulo").html();
	perfil = $("#"+idEditar).children(".body").children(".media").children(".media-body").children("#editarDescPerfil").val();
	idPerfil = $("#"+idEditar).children(".body").children(".media").children(".media-body").children("#idPerfilEditar").val();
	descripcion = $("#"+idEditar).children(".body").children(".media").children(".media-body").children("#editarDescripcion").html();
	$("#"+idEditar).html('<form method="post" enctype="multipart/form-data"><div class="row clearfix"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="header"><ul><button class="btn bg-blue header-dropdown m-r--15" type="submit"><i class="material-icons">save</i><span>Guardar Cambios</span></button></ul></div><div class="body"><div class="row clearfix"><div class="col-lg-4 col-md-4 col-sm-12 text-center"><div style="display: inline-block;"><input type="file" style="display:none" id="subirNuevaFoto"><div id="nuevaFoto"><img class="media-object" src="'+rutaImagen+'" width="250" height="130"></div><button type="button" class="bg-red btn-sm btn cambiarImagen" style="margin-top: -10%; margin-right: -95%;"><i class="material-icons">delete</i></button></div></div><div class="col-lg-8 col-md-8 col-sm-12"><div class="row clearfix"><div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 form-control-label"><label for="editarTituloIni">Título</label></div><div class="col-lg-10 col-md-10 col-sm-10 col-xs-7"><div class="form-group"><div class="form-line"><input type="text" class="form-control" id="editarTituloIni" name="editarTituloIni" required value="'+titulo+'"></div></div></div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 form-control-label"><label for="inertDescorM">Perfil</label></div><div class="col-lg-10 col-md-10 col-sm-10 col-xs-7"><div class="form-group selectEditar" id=""></div></div></div></div><div class="col-xs-12"><div class="row clearfix"><div class="col-xs-2 form-control-label"><label for="editarDescripcionIni">Descripción</label></div><div class="col-xs-10"><div class="form-group"><div class="form-line"><textarea class="form-control" id="editarDescripcionIni" name="editarDescripcionIni" required rows="2">'+descripcion+'</textarea><input type="hidden" value="'+idEditar+'" name="id"><input type="hidden" value="'+rutaImagen+'" name="imagenAntigua" ></div></div></div></div></div></div></div></div></div></form>')

	datos = "";
	template = "";
	tabla = "perfiles";
	$.ajax({
		type: 'POST',
		url: 'views/ajax/mc_gestorInicio.php',
		data:{tabla},
		success: function(response){
			datos = JSON.parse(response);
			datos.forEach(datos => {
				template += `<option value="${datos.idPerf}">${datos.deslar}</option>`
			});

			$(".selectEditar").html('<select class="form-control show-tick" id="editarPerfilInicio" name="editarPerfilIni" required><option value="0">... Seleccione perfil ...</option>'+template+'</select>')

		}
	});

	$(".cambiarImagen").click(function(){

		$(this).hide();
		$("#subirNuevaFoto").show();
		$("#subirNuevaFoto").css({"width":"90%", "margin":"5%"});
		$("#nuevaFoto").html("");
		$("#subirNuevaFoto").attr("name","editarImagenIni");
		$("#subirNuevaFoto").attr("required", true);

		$("#subirNuevaFoto").change(function(){

			imagen = this.files[0];
			imagenSize = imagen.size;

			if(Number(imagenSize) > 2000000){

				$("#mostrarImagenInicio").before('<div class="alert alert-warning alerta text-center alert-dismissible" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>El archivo excede el peso permitido, 200kb</div>')

			}else{

				$(".alerta").remove();

			}

			//  Validar tipo de la imagen
			imagenType = imagen.type;

			if(imagenType == "image/jpeg" || imagenType == "image/png"){

				$(".alerta").remove();

			}else{

				$("#mostrarImagenInicio").before('<div class="alert alert-warning alerta text-center alert-dismissible" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>El archivo debe ser formato JPG o PNG</div>');

			}

			if(Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png"){

				var datos = new FormData();

				datos.append("imagen", imagen);

				$.ajax({
					url:"views/ajax/mc_gestorInicio.php",
					method: "POST",
					data: datos,
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function(){

						$("#nuevaFoto").before('<div class="text-center"><img src="views/images/cargando.gif" id="status"</div>');

					},
					success: function(response){

						$("#status").remove();

						if(response == 0){

							$("#nuevaFoto").before('<div class="alert alert-warning alerta text-center alert-dismissible" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>La imagen es inferior a 1600 * 750px</div>');

						}else{

							$("#nuevaFoto").html('<img class="media-object" src="'+response.slice(6)+'" width="250" height="130">');

						}

					}
				});

			}

		});
	});

})

/*=====  End of EDITAR IMG INICIO  ======*/

