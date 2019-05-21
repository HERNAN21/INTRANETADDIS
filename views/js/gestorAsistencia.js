/*===============================================================================
=            Obtener cursos de Acuerdo a la carrera, ciclo y seccion            =
===============================================================================*/
function select_cursos(){

  var idCarrera =$("#selectCarreras").val();
  var idCiclo = $("#selectCiclos").val();
  var codUsuario = $("#idUser").val();

  $.ajax({
    type: "POST",
    url:"views/ajax/ma_gestorAsistencia.php",
    data:{idCarrera:idCarrera,idCiclo:idCiclo,codUsuario:codUsuario},
    success:function(respuesta){
      $("#msCursos select").remove();
      $("#msCursos").html('<select class="form-control show-tick" style="border:none; border-bottom: 1px solid #ddd !important;  box-shadow: none; border-radius:0;" id="cursos">'+respuesta+'</select>');
    }
  });
}

/*=====  End of Obtener cursos de Acuerdo a la carrera, ciclo y seccion  ======*/

/*==================================================
=            Obtener listado de asistencia de Alumnos            =
==================================================*/
function mostrar_AllAlumnos(flat){
  var carrera =$("#selectCarreras option:selected").text();
  var ciclo = $("#selectCiclos option:selected").text();
  var seccion =$("#selectSecciones option:selected").text();
  var curso= $("#cursos option:selected").text();
  var idCarrera=$("#selectCarreras").val();
  var idCiclo=$("#selectCiclos").val();
  var idSeccion=$("#selectSecciones").val();
  var idCursos=$("#cursos").val();
  var hoy = new Date();
  var dd = hoy.getDate();
  var mm = hoy.getMonth()+1;
  var yyyy = hoy.getFullYear();
  var fecha= (dd + "/" + mm + "/" + yyyy);
  var docentes =$("#nombreDocente").val();

  console.log(idCarrera, idCiclo, idSeccion, idCursos)

  if (idCarrera==0 || idCiclo==0 || idSeccion==0 || idCursos==0) {
      alertify.warning("campos vacios");
  }else {
    if (flat) {
      $("#muestraResultado").show();
    }
    $.ajax({
      type:"POST",
      url:"views/ajax/ma_gestorAsistencia.php",
      data:{idCarrera,idCiclo,idSeccion,idCursos},
      success:function(respuesta){
        $("#headerDocente").html('<h2>REGISTRO DE ALUMNOS - '+carrera+' - '+idCiclo+' - '+seccion+'</h2>');
        $("#informacioDocente").html('<div class="row clearfix"> <div class="col-lg-2"> <label class="col-teal font-bold">DOCENTE : </label> </div> <div class="col-lg-4"> <p>'+docentes+'</p> </div> <div class="col-lg-2"> <label class="col-teal">CURSO : </label> </div> <div class="col-lg-4"> <p>'+curso+'</p> </div> <div class="col-lg-2"> <label class="col-teal">HRA INICIO : </label> </div> <div class="col-lg-2"> <p>7:15</p> </div> <div class="col-lg-2"> <label class="col-teal">HRA TERMINO : </label> </div> <div class="col-lg-2"> <p>8:00</p> </div> <div class="col-lg-2"> <label class="col-teal">FECHA : </label> </div> <div class="col-lg-2"> <p>'+fecha+'</p> </div> </div>');
        $("#listaAlumnos").html(respuesta);
      }
    });
  }
}
/*=====  End of Obtener listado de alumnos de Alumnos  ======*/

/*======================================
=            Lista de Registrar Alumnos            =
======================================*/
$(document).on('click', '.btn-visualizarAlumnos', function () {
    var laCarrera = $("#selectCarreras").val();
    var laCiclo = $("#selectCiclos").val();
    var laSeccion = $("#selectSecciones").val();
    if (laCarrera == 0 || laCiclo == 0 || laSeccion == 0) {
        alertify.warning("complete los campos");
    } else {
        $.ajax({
            type: "POST",
            url: "views/ajax/ma_gestorAsistencia.php",
            data: {
                laCarrera, laCiclo, laSeccion
            },
            success: function (respuesta) {
                $("#modalAlumnosAll").modal('show');
                $("#listaAlumnosModal").html(respuesta);
                //alert(respuesta);
            }
        });
    }
});
/*=====  End of Lista de Registrar Alumnos  ======*/

/*======================================
=            Insertar Asistencia            =
======================================*/
function insertarAsistencia() {
    var carrera = $("#selectCarreras").val();
    var ciclo = $("#selectCiclos").val();
    var seccion = $("#selectSecciones").val();
    var curso = $("#cursos").val();
    var usuario = $("#idUser").val();
    /*var alumno= "1";*/
    var alumno = [];
    $.each($("input[name='check']:checked"), function () {
        alumno.push($(this).val());
    });

    if (carrera == 0 || ciclo == 0 || seccion == 0 || curso == 0 || usuario == 0 || alumno == 0) {
        alertify.warning("Haga de manera correcta");
    } else {
        $.ajax({
            type: "POST",
            url: "views/ajax/ma_gestorAsistencia.php",
            data: {
                alumno, carrera, ciclo, seccion, curso, usuario
            },
            success: function (respuesta) {

                if (respuesta === "Guardo") {
                    alertify.success("Guardo Correctamente");
                } else {
                    console.log("No se pudo guardar");
                }
                mostrar_AllAlumnos();
            }
        });
    }

}
/*=====  End of Insertar Asistencia  ======*/

/*======================================
=            Eliminar Asistencia            =
======================================*/
$(document).on('click', '.btn-eliminarAsist', function () {
    let element = $(this)[0].parentElement.parentElement;
    let idAsistencia = $(element).attr('idAsistencia');

    console.log(idAsistencia);
    $.ajax({
        type: "POST",
        url: "views/ajax/ma_gestorAsistencia.php",
        data: {
            idAsistencia
        },
        success: function (respuesta) {
            if (respuesta === "Eliminado") {
                alertify.success('Se elimino correctamente');
            } else {
                alertify.error("No se pudo eliminar");
            }
            mostrar_AllAlumnos();
        }
    });
});
/*=====  End of Eliminar Asistencia  ======*/


/*=====  Ventanas Asistencia  ======*/
$("#muestraResultado").css({"display":"none"});
/*=====  End of Ventanas Asistencia  ======*/