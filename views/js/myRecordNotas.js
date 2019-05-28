var path="http://localhost/INTRANETADDIS/controllers/";

var alumno=$('#idUser').val();
$.ajax({
	url: 'controllers/mn_misCursos.php?action=cabecera',
	// url: path+'mn_misCursos.php?action=cabecera',
	type: 'POST',
	dataType: 'JSON',
	data: {validar: true,alumno:alumno},
	success: function (data) {
		var cabecera=$('#cabecera');
		cabecera.find('#de').remove();
		if (data.respuesta=='success') {
			
			$.each(data.listado, function(i, lis) {
				
				var a='<div class="row clearfix" id="de" style="margin-bottom: -30px;">'+
						' <div class="col-lg-1">'+
				               '<label>Alumno(a): </label>'+
					  	'</div>'+
					  	'<div class="col-lg-5">'+
					      '<p> &nbsp; &nbsp;'+lis.nombre+'</p>'+
					 	 '</div>'+
					  '<div class="col-lg-3">'+
					               '<label>codigo:</label>'+
					  '</div>'+
					  '<div class="col-lg-3">'+
					      '<p id="codigo"> '+lis.cod_unicoMatricula+'</p>'+
					  '</div>'+
					'</div>'+
					'<div class="row clearfix" style="margin-bottom: -30px;">'+
					  '<div class="col-lg-1">'+
					          '<label>Programa:</label>'+
					  '</div>'+
					  '<div class="col-lg-5 ">'+
					          '<p id="carrera"> &nbsp; &nbsp;'+lis.deslar+'</p>'+
					  '</div>'+
					  '<div class="col-lg-3">'+
					               '<label for="nomApell">Resumen de Créditos:</label>'+
					  '</div>'+
					  '<div class="col-lg-3">'+
					      '<p>Aprobado 120</p>'+
					  '</div>'+
					  '<div class="col-lg-7 col-lg-offset-5">'+
					      /*'<p class="col-lg-8" style="font-size: 16px; color: green; margin-right: -30px;">Descarga tu record de notas</p>'+
					      '<button class="btn btn-success col-lg-4"><i class="material-icons">get_app</i> &nbsp; &nbsp;Descargar</button>'+*/
					  '</div>'+
					'</div>';
				cabecera.append(a);
			});

		}
	}
});


$.ajax({
	url: 'controllers/mn_misCursos.php?action=listSummaryNotas',
	type: 'POST',
	dataType: 'JSON',
	data: {validar: true,alumno:alumno},
	success: function (data) {
		var listar=$('#listadoNotas tbody');
		listar.find('tr').remove();
		if (data.respuesta=='success') {
			$.each(data.listado, function(i, listado) {
				var estado ='';
				if (listado.promedio>=13) {
					estado='Aprobado';
				}else{
					estado='Desaprobado';
				}
				var tr ="<tr style='font-size: 12px'>"+
						"<td>"+(i+1)+"</td>"+
						"<input type='hidden' value='"+listado.id_ciclo+"'>"+
						"<td class='align-left'>"+listado.ciclo_des+"</td>"+
						"<td class='align-center'>"+listado.credito+"</td>"+
	                    "<td>"+listado.promedio+"</td>"+
	                    "<td>"+estado+"</td>"+
	                    "<td class=''>"+
	                    	"<button class='btn btn-sm btn-danger' onclick='verdetalle(this);'><i class='material-icons'>view_module</i></button>"+
	                    	"<button class='btn btn-sm btn-success' onclick='descargarPdf(this);'><i class='material-icons'>cloud_download</i></button>"+
	                    	"<button class='btn btn-sm btn-primary' onclick='verPdf(this);'><i class='material-icons'>visibility</i></button>"+
	                    "</td>"+
	                    
                "</tr>";

                listar.append(tr);
			});
		}
	}
});



function verdetalle(obj) {
	var ciclo=$(obj).parent().parent().find('input:hidden').eq(0).val();
	$("#modalDetalles").modal({
	  fadeDuration: 200
	});
	$.ajax({
		url: 'controllers/mn_misCursos.php?action=detallesNota',
		type: 'POST',
		dataType: 'JSON',
		data: {validar: true, ciclo:ciclo,alumno:alumno},
		success: function (data) {
			var tbody=$("#listaDetalles tbody");
			tbody.find('tr').remove();
			if (data.respuesta=='success') {
				$.each(data.listado, function(i, listado) {
					var tr="<tr>"+
				      "<th scope='row'>"+(i+1)+"</th>"+
				      "<td class='text-center'>"+listado.curso+"</td>"+
				      "<td class='text-center'>"+listado.credito+"</td>"+
				      "<td class='text-center'>"+listado.promedio+"</td>"+
				    "</tr>"
				    ;
				    tbody.append(tr);
				});

			}
		}
	});
	
	
}


function verPdf(obj) {
	var ciclo=$(obj).parent().parent().find('input:hidden').eq(0).val();
	var carrera=$('#carrera').text();
	var codigo=$('#codigo').text();
	var url="controllers/reportes/boletanotas.php?action=verPdf&ciclo="+ciclo+"&usuario="+alumno+"&carrera="+carrera+"&codigo="+codigo+"&actionpdf=ver";
	window.open(url);

}

function descargarPdf(obj) {
	var ciclo=$(obj).parent().parent().find('input:hidden').eq(0).val();
	var carrera=$('#carrera').text();
	var codigo=$('#codigo').text();
	var url="controllers/reportes/boletanotas.php?action=verPdf&ciclo="+ciclo+"&usuario="+alumno+"&carrera="+carrera+"&codigo="+codigo+"&actionpdf=des";
	window.open(url);
}

