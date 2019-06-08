
$("#btnModalAlumno").on('click', function() {
	$("#ModalAlumno").modal('show');
	$("#ModalAlumno").slideDown('1000');
	// $("#ModalAlumno").draggable();
	event.preventDefault();
});
	
function listado() {
	
}

$("#dniBus").keypress(function() {
	listadoAlumnos();
});

$("#nombreBus").keypress(function() {
	listadoAlumnos();
});

listadoAlumnos();

function listadoAlumnos() {
	var dni=$("#dniBus").val();
	var nombres=$("#nombreBus").val();
	$.ajax({
		url: 'controllers/mn_matricula.php?action=listarAlumnos',
		type: 'POST',
		dataType: 'JSON',
		data: {dni: dni, nombres: nombres},
		success: function (data) {
			// console.log(data);
			var tbody=$("#listadoAlumnos tbody");
			tbody.find('tr').remove();
			$.each(data, function(i, listado) {
				var tr="<tr onclick='setDataAlum(this);'>"+
						"<input type='hidden' value='"+listado.id_evaluacionPost+"'>"+
						"<input type='hidden' value='"+listado.id_persona+"'>"+
						"<td>"+listado.dni+"</td>"+
						"<td>"+listado.nombres+', '+listado.ape_paterno+' '+listado.ape_materno+"</td>"+
					"</tr>";
				tbody.append(tr);
			});
		}
	});
	
}


function setDataAlum(obj) {
	var idEva= $(obj).find('input:hidden').eq(0).val();
	var id_persona=$(obj).find('input:hidden').eq(1).val();
	$('#id_persona').val(id_persona);
	var dni= $(obj).find('td').eq(0).text();
	var nombres= $(obj).find('td').eq(1).text();
	$("#ModalAlumno").modal('hide');
	$("#ModalAlumno").slideUp('500');
	$("#nombres").val(dni+' - '+nombres);
	$("#idEvaluacion").val(idEva);
	getMatPer(id_persona);
	$("#btnSave").removeAttr('disabled');
}

// $("#carrera").html("<option>1</option>");


var data_car=[
			{'id':1,'carrera':'ADM ADMINISTRACION DE EMPRESAS'},
			{'id':2,'carrera':'DG DISEÑO GRAFICO'},
			{'id':3,'carrera':'ENFERMERIA'},
		];


$.ajax({
	url: 'controllers/mn_matricula.php?action=carrera',
	type: 'POST',
	dataType: 'JSON',
	data: {carrera: '1'},
	success: function (data) {
		$.each(data, function(i, list) {
			$('#carreraBus').append('<option value='+list.id_carrera+'>'+list.deslar+'</option>');
		});
	}
});





$.each(data_car, function(i, list) {
	 $("#carrera").append('<option value='+list.id+'>'+list.carrera+'</option>');
});


var data_ciclo=[
	{'id':1,'ciclo':'I'},
	{'id':2,'ciclo':'II'},
	{'id':3,'ciclo':'III'},
	{'id':4,'ciclo':'IV'},
	{'id':5,'ciclo':'V'},
	{'id':6,'ciclo':'VI'},
];

$.each(data_ciclo, function(i, lisciclo) {
	$('#ciclo').append('<option value='+lisciclo.id+'>'+lisciclo.ciclo+'</option>');
});

var data_semestre=[
	{'id':1, 'semestre':'2018 - I'},
	{'id':2, 'semestre':'2018 - II'},
	{'id':3, 'semestre':'2019 - I'},
	{'id':4, 'semestre':'2019 - II'},
	{'id':5, 'semestre':'2020 - I'},
	{'id':6, 'semestre':'2020 - II'},
	{'id':7, 'semestre':'2021 - I'},
	{'id':8, 'semestre':'2021 - II'},
];

$.each(data_semestre, function(i, li) {
	$('#semestre').append('<option value='+li.id+'>'+li.semestre+'</option>');
});

var tipomat=[{'id':0, 'tipomat':'Matricula Inicial'},{'id':1, 'tipomat':'Renovacion Matricula'}];

$.each(tipomat, function(i, lis) {
	$('#tipomats').append('<option value='+lis.id+'>'+lis.tipomat+'</option>');
});

function carreraCarrera(data) {
	$.each(data, function(i, list) {
		$("#carrera").append($('<option>', { 
	        value: list.id_carrera,
	        text : list.deslar
	    }));
	});
}

function cargarInstituciones(cboInstitucion,cboTipoCarrera){    
    var empresa = null;    
    var descripcion = null;
    var estado = null;

    $("error").text("");
    $("errorIns").text("");
    $("errorUpd").text("");
    
    $.ajax({
        url: path + "Institucion/listar",
        type: "POST",
        data: {
            empresa: empresa,
            descripcion: descripcion,
            estado: estado
        },
        success: function(data){
            llenarComboInstitucion(data,cboInstitucion,cboTipoCarrera);            
        }
    });
}

function llenarComboInstitucion(data,cboInstitucion,cboTipoCarrera){
    $("#" + cboInstitucion).html("");    
        
    var datos = JSON.parse(data);                
    if(datos.respuesta=="success"){
        if(datos.instituciones != "vacio"){            
            var instituciones = datos.instituciones;            
            for(i=0;i<instituciones.length;i++){                
                var institucion = instituciones[i];
                $("#" + cboInstitucion).append("<option value='" + institucion.INSTITUCION + "'>" + institucion.DESCRIPCION + "</option>")                
            }
            cargarTipoCarreras(cboInstitucion,cboTipoCarrera);            
        }
    }else{        
        $("#error").text(datos.error);
        $("#error").css("color","red");
        $("#error").css("display","block");
    }
}

function limpiar() {
	$('#id_mat').val('');
	$('#cod_matricula').val('');
	$("#cod_pago").val('');
	$('#idFormMatricula')[0].reset();
}
$("#msgerror").html('');
$("#btnSave").attr('disabled', true);
$("#btnUpdate").attr('disabled', true);

$("#btnSave").on('click', function() {
	var id_persona=$('#id_persona').val();
	var cod_matricula=$('#cod_matricula').val();
	var frmMatricula=$('#idFormMatricula').serialize();
	var cod_pago=$("#cod_pago").val();
	// alert(frmMatricula+'&cod_matricula='+cod_matricula);
	if (cod_matricula=='') {
		alert('ingrese codigo matricula');
	}else if (cod_pago==''){
		alert('ingrese codigo pago');
	}else {
		$("#msgerror").show();
		$.ajax({
			url: 'controllers/mn_matricula.php?action=save',
			type: 'POST',
			dataType: 'JSON',
			data: frmMatricula+'&cod_matricula='+cod_matricula,
			success:function (data) {
				// alert(data.respuesta);
				console.log(data.respuesta);
				if (data.respuesta!='existe') {
					if (data.respuesta!='error') {
						limpiar();
						getMatPer(id_persona);
						$("#msgerror").html('Matricula Registrados Correctamente.');
						setTimeout(function() {
							$("#msgerror").slideUp(500);
						}, 1000);
					}else{
						$("#msgerror").html('ocurrio un error en el sistema');
						setTimeout(function() {
							$("#msgerror").slideUp(500);
						}, 5000);
					}
				}else {
					// alert('El alumno Ya esta matriculado en la carrera, ciclo y semestre seleccionado.');
					$("#msgerror").html('El alumno Ya esta matriculado en la carrera, ciclo y semestre seleccionado.');
					setTimeout(function() {
						$("#msgerror").slideUp(500);
					}, 5000);
				}
			}
		});
	}
});

function getMatPer(id_persona) {
	$("#msgerror").html('');
	// controllers/mn_matricula.php?action=listMatPer
	$.ajax({
		url: 'controllers/mn_matricula.php?action=listMatPer',
		type: 'POST',
		dataType: 'JSON',
		data: {id_persona: id_persona},
		success: function (data) {
			var listaMatPer=$('#listMatPer tbody');
			listaMatPer.find('tr').remove();
			$.each(data, function(i, listado) {
				var tr= '<tr style="font-size:11px;">'+
			      	'<th scope="row">'+(i+1)+'</th>'+
			      	'<input type="hidden" value='+listado.id_matricula+' />'+
			      	'<input type="hidden" value='+listado.cod_pago+' />'+
			      	'<input type="hidden" value='+listado.id_carrera+' />'+
			      	'<input type="hidden" value='+listado.id_ciclo+' />'+
			      	'<input type="hidden" value='+listado.id_semestre+' />'+
			      	'<input type="hidden" value='+listado.tipo_matricula+' />'+
			    	'<td>'+listado.cod_unicoMatricula+'</td>'+
			    	'<td>'+listado.dni+'</td>'+
			    	'<td>'+listado.carrera_des+'</td>'+
			    	'<td>'+listado.ciclo_descor+'</td>'+
			    	'<td>'+listado.sem_descor+'</td>'+
			    	'<td>'+
			    		'<button class="btn btn-sm btn-info" onclick="getUpdate(this);"><i class="material-icons">edit</i></button>'+
			    		'<button class="btn btn-sm btn-danger" onclick="deletemat(this);"><i class="material-icons">delete</i></button>'+
			    	'</td>'+
			    '</tr>';
			    listaMatPer.append(tr);
			});

		}
	});
}

function getUpdate(obj) {
	var id_mat=$(obj).parent().parent().find('input:hidden').eq(0).val();
	var cod_pago=$(obj).parent().parent().find('input:hidden').eq(1).val();
	var cod_matricula=$(obj).parent().parent().find('td').eq(0).text();
	var id_carrera=$(obj).parent().parent().find('input:hidden').eq(2).val();
	var id_ciclo=$(obj).parent().parent().find('input:hidden').eq(3).val();
	var id_semestre=$(obj).parent().parent().find('input:hidden').eq(4).val();
	var id_tipomatricula=$(obj).parent().parent().find('input:hidden').eq(5).val();
	$('#id_mat').val(id_mat);
	$('#cod_pago').val(cod_pago);
	$('#cod_matricula').val(cod_matricula);
	$('#carrera').val(id_carrera);
	// $('#carrera')[carrera].selectedIndex;
	// var indiceDatos = $('#myidddl')[0].selectedIndex;
	$('#ciclo').val(id_ciclo);
	$('#semestre').val(id_semestre);
	$('#tipomats').val(id_tipomatricula);
	$("#btnSave").attr('disabled', true);
	$("#btnUpdate").removeAttr('disabled');
	// ciclo = 3;
	/*$("#ciclo option:selected").removeAttr("selected");
	$("#ciclo option[value='"+ciclo+"']").attr('selected', 'selected');*/
	// $("#ciclo").find('option[value="'+ciclo+'"]').prop('selected', 'selected');
}


$("#btnUpdate").on('click', function() {
	var id_persona=$('#id_persona').val();
	var cod_matricula=$('#cod_matricula').val();
	var frmMatricula=$('#idFormMatricula').serialize();
	// alert(frmMatricula+'&cod_matricula='+cod_matricula);
	$.ajax({
		url: 'controllers/mn_matricula.php?action=update',
		type: 'POST',
		dataType: 'JSON',
		data: frmMatricula+'&cod_matricula='+cod_matricula,
		success:function (data) {
			alert(data);
			limpiar();
			getMatPer(id_persona);
			$("#btnUpdate").attr('disabled', true);
			$("#btnSave").removeAttr('disabled');
		}
	});
}); 

function deletemat(obj) {
	var id_persona=$('#id_persona').val();
	var id_mat=$(obj).parent().parent().find('input:hidden').eq(0).val();
	if (confirm('Esta Seguro Eliminar Matricula del Alumno? :(')) {
		$.ajax({
			url: 'controllers/mn_matricula.php?action=delete',
			type: 'POST',
			dataType: 'JSON',
			data: {id_mat:id_mat },
			success: function (data) {
				alert(data);
				getMatPer(id_persona);
			}
		});
	}
	
}


/*Listado rpt*/


setTimeout(function() {
	listadoMatriculaConsolidado();
}, 2000);

$.each(data_ciclo, function(i, lisciclo) {
	$('#cicloBus').append('<option value='+lisciclo.id+'>'+lisciclo.ciclo+'</option>');
});

$.ajax({
	url: 'controllers/mn_matricula.php?action=semestre',
	type: 'POST',
	dataType: 'JSON',
	data: {param1: 'value1'},
	success: function (data) {
		$.each(data, function(i, semestre) {
			$('#semestreBus').append('<option value='+semestre.id_semestre+'>'+semestre.descor+'</option>');
		});
	}
});

$.ajax({
	url: 'controllers/mn_matricula.php?action=seccion',
	type: 'POST',
	dataType: 'JSON',
	data: {param1: 'value1'},
	success: function (data) {
		$.each(data, function(i, seccion) {
			$('#seccion').append('<option value='+seccion.id_seccion+'>'+seccion.descripcion+'</option>');
		});
	}
});



function listadoMatriculaConsolidado() {
	var carreraBus=$("#carreraBus").val();
	var cicloBus=$("#cicloBus").val();
	var semestreBus=$("#semestreBus").val();
	var seccion = $("#seccion").val();
	$.ajax({
		url: 'controllers/mn_matricula.php?action=listMatCon',
		type: 'POST',
		dataType: 'JSON',
		data: {carreraBus:carreraBus,cicloBus:cicloBus,semestreBus:semestreBus,seccion:seccion},
		success: function (data) {
			var tbody=$("#listConsolidado tbody");
			tbody.find('tr').remove();
			$.each(data, function(i, listado) {
				var tr="<tr>"+
						"<td>"+(i+1)+"</td>"+
						"<td>"+listado.cod_unicoMatricula+"</td>"+
						"<td>"+listado.dni+"</td>"+
						"<td>"+listado.nombres+','+listado.ape_paterno+' '+listado.ape_materno +"</td>"+
					"</tr>";
				tbody.append(tr);
			});
		}
	});	
}


$("#carreraBus").change(function() {
	listadoMatriculaConsolidado();
});
$("#cicloBus").change(function() {
	listadoMatriculaConsolidado();
});
$("#semestreBus").change(function() {
	listadoMatriculaConsolidado();
});
$('#seccion').change(function() {
	listadoMatriculaConsolidado();
});


$("#btnBuscar").on('click', function() {
	listadoMatriculaConsolidado();
});

$("#printMat").on('click', function() {
	var carrera=$("#carreraBus").val();
	var ciclo=$("#cicloBus").val();
	var semestre=$("#semestreBus").val();
	var seccion = $("#seccion").val();
	var url="controllers/reportes/ReporteMatricula.php?action=verPdfMatricula&ciclo="+ciclo+"&carrera="+carrera+"&semestre="+semestre+"&seccion="+seccion;
	window.open(url);

});