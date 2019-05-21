/*=====================================================
=            Mostrar / Ocultar formularios            =
=====================================================*/

// MODULO - SUPER
$("#agregarModuloSuper").click(function(){
	$("#frmCrearModuloSuper").toggle("500");
	$("#listadoModulosSuper").toggle("500");
});

$("#cancelarModulo").click(function(){
	$("#frmCrearModuloSuper").toggle("500");
	$("#listadoModulosSuper").toggle("500");
});

// SUB - MODULO
$("#agregarSubModulo").click(function(){
	$("#frmCrearSubModulos").toggle("500");
	$("#listadoSubModulos").toggle("500");
});

$("#cancelarSubModulo").click(function(){
	$("#frmCrearSubModulos").toggle("500");
	$("#listadoSubModulos").toggle("500");
});

/*=====  End of Mostrar / Ocultar formularios  ======*/
/*============================================
=           Editar Sub Modulo         =
============================================*/

$(document).on('click','.btn-editar-SubModulo', function(){
	let element = $(this)[0].parentElement.parentElement;
	let idModulo= $(element).attr('idSubModulo');

	 // console.log(idModulo);
	$.post('views/ajax/ms_gestorModulos.php',{idModulo}, function(response){

		const data = JSON.parse(response);

		 $("#updateSubModulos").modal('toggle');
		 $("#updateSubModulos").modal('show');
		 $("#updateIdModuloSubM").val(data.id_modulo);
		 $("#updateDescorSubM").val(data.descor);
		 $("#updateDeslarSubM").val(data.deslar);
		 $("#updatelinkSubM").val(data.linkM);
		 $("#updateIconoSubM").val(data.icono);
		 $("#updateOrdenSubM").val(data.orden);

	});

});

/*=====  End Editar Sub Modulo    ======*/