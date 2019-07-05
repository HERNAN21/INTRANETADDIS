$("#btnModalPersona").on('click', function() {
	$("#ModalPersona").modal('show');
	$("#ModalPersona").slideDown('1000');
	// $("#ModalAlumno").draggable();
	event.preventDefault();
});

/*btnSaveParty
btnUpdateParty*/

// frmParty

$('#btnSaveParty').on('click', function() {
	var frmParty=$("#frmParty").serialize();
	$.ajax({
		url: 'controllers/mp_gestorPersona.php?action=insert',
		type: 'POST',
		dataType: 'JSON',
		data: frmParty,
		success: function (data) {
			alert(data);
		}
	});
	
});