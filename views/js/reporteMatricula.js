


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
	var dni= $(obj).find('td').eq(0).text();
	var nombres= $(obj).find('td').eq(1).text();
	$("#ModalAlumno").modal('hide');
	$("#ModalAlumno").slideUp('500');
	$("#nombres").val(dni+' - '+nombres);
	$("#idEvaluacion").val(idEva);
}

// $("#carrera").html("<option>1</option>");


var data_car=[
			{'id':1,'carrera':'ADM ADMINISTRACION DE EMPRESAS'},
			{'id':2,'carrera':'DG DISEÑO GRAFICO'}
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


/*var car=$("#carrera");
car.find('option').remove();*/
/*for (i = 0; i < 10; i++){ 
 	$('#carrera').append($('<option>',{
	    value: i,
	    text : "Option "+i 
	}));
}*/

function carreraCarrera(data) {
	$.each(data, function(i, list) {
		console.log(data);
		$("#carrera").append($('<option>', { 
	        value: list.id_carrera,
	        text : list.deslar
	    }));
		/*var option="<option value='"+list.id_carrera+"'>"+list.deslar+"</option>";
		$("#carrera").html(option);*/
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