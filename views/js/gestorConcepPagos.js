function init(){
	mostrarForm(false);
}

function mostrarForm(flat){
 	if(flat)
 	{
 		$("#formularioConcepto").show();
 		$("#formularioPagos").show();
 		$("#tablaPagos").hide();
 	}else
 	{
 		$("#formularioConcepto").hide();
 		$("#formularioPagos").hide();
 		$("#tablaPagos").show();
 	}
 }

 function cancelarForm(){
 	mostrarForm(false);
 }

 init();