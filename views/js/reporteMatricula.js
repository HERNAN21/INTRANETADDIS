
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
			var option={'id':list.id_carrera, 'carrera':list.deslar};
			data_car.push(option);
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


function carreraCarrera(data) {
	$.each(data, function(i, list) {
		console.log(data);
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

$("#btnSave").on('click', function() {
	var id_persona=$('#id_persona').val();
	var cod_matricula=$('#cod_matricula').val();
	var frmMatricula=$('#idFormMatricula').serialize();
	alert(frmMatricula+'&cod_matricula='+cod_matricula);
	$.ajax({
		url: 'controllers/mn_matricula.php?action=save',
		type: 'POST',
		dataType: 'JSON',
		data: frmMatricula+'&cod_matricula='+cod_matricula,
		success:function (data) {
			// console.log(data);
			getMatPer(id_persona);
		}
	});
	
});
function getMatPer(id_persona) {
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
			    	'<td>'+listado.cod_unicoMatricula+'</td>'+
			    	'<td>'+listado.dni+'</td>'+
			    	'<td>'+listado.carrera_des+'</td>'+
			    	'<td>'+listado.ciclo_descor+'</td>'+
			    	'<td>'+listado.sem_descor+'</td>'+
			    	'<td>'+
			    		'<button class="btn btn-sm btn-info"><i class="material-icons">edit</i></button>'+
			    		'<button class="btn btn-sm btn-danger"><i class="material-icons">delete</i></button>'+
			    	'</td>'+
			    '</tr>';
			    listaMatPer.append(tr);
			});

		}
	});
}