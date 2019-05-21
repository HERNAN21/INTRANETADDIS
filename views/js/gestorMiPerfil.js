/*============================================
=            MOSTRAR  INPUT: FILE            =
============================================*/

$("#btn-editarImagen").click(function(){

	$("#btn-editarImagen").hide();
	$("#actNuevaFotoUsuario").show();
	$("#actNuevaFotoUsuario").attr("name", "editarImagenUsuario");
	$("#actNuevaFotoUsuario").attr("required", true);

});

/*=====  End of MOSTRAR  INPUT: FILE  ======*/


/*======================================================
=            SUBIR IMAGEN A TRAVES DE INPUT            =
======================================================*/
$("#actNuevaFotoUsuario").change(function(){

	imagen = this.files[0];

	imagenSize = imagen.size;

	if(Number(imagenSize) > 204800){

		$("#formCambiarImagen").before('<div class="alert alert-warning alerta text-center alert-dismissible" role="alert">El archivo excede el peso permitido, 200kb</div>');

	}else{

		$(".alerta").remove();

	}

	imagenType = imagen.type;

	if(imagenType == "image/jpeg" || imagenType == "image/png"){

		$(".alerta").remove();

	}else{

		$("#formCambiarImagen").before('<div class="alert alert-warning alerta text-center alert-dismissible" role="alert">El archivo debe ser formato JPG o PNG</div>');

	}

/*=====  End of SUBIR IMAGEN A TRAVES DE INPUT  ======*/

/*===============================================
=            MOSTRAR IMAGEN CON AJAX            =
===============================================*/

	if(Number(imagenSize)<204800 && imagenType == "image/jpeg" || imagenType == "image/png"){

		var datos = new FormData();

		datos.append("imagen", imagen);

		$.ajax({
			url:"views/ajax/mc_gestorMiPerfil.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function(){

				$("#imagenUsuario").before('<img src="views/images/cargando.gif" style="display: inline-block;" class="cargando"></img>');

			},
			success: function(response){

				$(".cargando").remove();
				$("#imagenUsuario").html('<img src="'+response.slice(6)+'"></img>');

			}
		})
	}

})