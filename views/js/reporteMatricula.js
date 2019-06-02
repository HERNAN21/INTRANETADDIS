


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

// carrera();
function carrera() {
	$.ajax({
		url: 'controllers/mn_matricula.php?action=carrera',
		type: 'POST',
		dataType: 'JSON',
		data: {carrera: '1'},
		success: function (data) {
			// console.log(data)
			var car=$("#carrera");
			car.find('option').remove();
			$.each(data, function(i, list) {
				// alert(list.deslar);
				/*$("#carrera").append($('<option>', { 
			        value: list.id_carrera,
			        text : list.deslar
			    }));*/
				var option="<option value='"+list.id_carrera+"'>"+list.deslar+"</option>";
				$("#carrera").html(option);
				// alert(option);
				// $("#carrera").html("<option>1</option>");
			});
		}
	});
}

for (i = 0; i < 10; i++){ 
 $('#carrera').append($('<option>',
 {
    value: i,
    text : "Option "+i 
}));
}