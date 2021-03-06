<?php

    session_start();

    if (!$_SESSION["validar"]){

        header ("location: ingreso");

        exit();

    }

    /*======================================
    =            PAGE PRELOADER            =
    ======================================*/
    
    // include "views/modules/cargando.php";
    
    /*=====  End of PAGE PRELOADER  ======*/

    /*=============================================
    =            CABEZERA DEL PORTAL            =
    =============================================*/

    include "views/modules/cabezera.php";
    
    /*=====  End of CABEZERA DEL PORTAL  ======*/
    
?>

<style type="text/css">
	.inputstl { 
    padding: 9px; 
    border: solid 1px #0077B0; 
    outline: 0; 
    background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #C6ECFF), to(#FFFFFF)); 
    background: -moz-linear-gradient(top, #FFFFFF, #C6ECFF 1px, #FFFFFF 25px); 
    box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
    -moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
    -webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 

    } 
</style>

<!-- START CUERPO  -->
<section class="content">
	<div class="container">
        <div class="row">
        	<div class="col-12 espacio"></div>
        </div> 
        <div class="row clearfix">
            <?php  include   "views/modules/panel-Izquierdo.php";    ?>
            <div class="col-md-12 col-lg-9">
            	<div class="block-header">
                    <h2>MODULO DE MATRICULA </h2>
                </div>
                <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
                    <div class="card">
                        <div class="body">
                        	<!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist" style="margin-top: -15px;">
                            	<li role="presentation" class="active">
                                	<a href="#home_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">add_box</i> Registra Matricula
                                    </a>
                                </li>
	                            <!-- <li role="presentation">
	                                <a href="#profile_with_icon_title" data-toggle="tab">
	                                    <i class="material-icons">assignment_return</i> Asignación perfiles a usuarios
	                                </a>
	                            </li> -->
                            </ul>
							<div class="row">
								<div class="col-md-12">
									
										<div class="row">
											<div class="col-md-3">
												<label>Codigo Matricula:</label>
												<input type="text" class="form-control form-control-sm" name="cod_matricula" id="cod_matricula">
											</div>
											<div class="col-md-8">
												<label>Nombres y Apellidos:</label>
												
											    <input type="text" id="nombres" name="nombre" class="form-control form-control-sm" disabled>
											</div>
											<div class="col-md-1" style="margin-left: -20px;">
												<label style="height: 12px;"></label>
											    <button class="btn btn-sm btn-success" id="btnModalAlumno"><i class="material-icons">add_box</i></button>
											</div>
										</div>
										<form  id="idFormMatricula">

										<div class="row">
											<div class="col-md-3">
												<input type="hidden" name="idEvaluacion" id="idEvaluacion">
												<input type="hidden" name="id_persona" id="id_persona">
												<input type="hidden" name="id_mat" id="id_mat">
												<label>Cod Pago:</label>
												<input type="text" class="form-control-sm form-control" id="cod_pago" name="cod_pago">
											</div>
											<div class="col-md-6">
												<label>Carrerra:</label>
												<!-- <input type="text" class="form-control-sm form-control"> -->
												<select name="carrera" id="carrera" class="form-control inputstl">
												</select>
											</div>
											<div class="col-md-3">
												<label>Ciclo:</label>
												<select name="ciclo" id="ciclo" class="form-control form-control-sm">
												</select>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label>Semestre:</label>
												<select name="semestre" id="semestre" class="form-control form-control-sm">
												</select>
											</div>
											<div class="col-md-5">
												<label>Tipo Matricula:</label>
												<select name="tipomats" id="tipomats" class="form-control form-control-sm">
												</select>
											</div>
										</div>
									</form>
										<div class="row">
											<div class="col-md-12">
												<button class="btn btn-success" id="btnSave">Guardar</button>
												<button class="btn btn-info" id="btnUpdate">Actualizar</button>
												
											</div>
										</div>
										<div class="row">
											<div class="col-md-12" id="msgerror">
												
											</div>
										</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<span class="text-info">HISTORIAL MATRICULA</span>
								</div>
								<div class="col-md-12">
									<table class="table table-hover" id="listMatPer">
									  <thead>
									    <tr>
									      <th style="width: 5%;" scope="col">#</th>
									      <th style="width: 5%;" scope="col">Codig Mat</th>
									      <th style="width: 5%;" scope="col">Dni</th>
									      <th style="width: 10%;" scope="col">Carrera</th>
									      <th style="width: 2%;" scope="col">Ciclo</th>
									      <th style="width: 3%;" scope="col">Semestre</th>
									      <th style="width: 10%;" scope="col">Accion</th>
									    </tr>
									  </thead>
									  <tbody>
									    <!-- <i class="material-icons">list_alt</i> -->
									    
									  </tbody>
									</table>
								</div>
							</div>
                        </div>
                    </div>
                                            
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>




<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="ModalAlumno">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="height: 50px;">
        <span class="modal-title" style="margin-top:-20px;">Listado Alumnos</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-10px;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-md-3">
      			<label>Dni</label>
      			<input type="text" id="dniBus" class="form-control form-control-sm" placeholder="Ingrese DNI" >
      		</div>
      		<div class="col-md-9">
      			<label>Nombres Y Apellidos</label>
      			<input type="text" id="nombreBus" class="form-control form-control-sm" placeholder="Ingrese Nombres o Apellidos para buscar">
      		</div>
      	</div>
    	<div class="row">
    		<table class="table table-hover table-sm" id="listadoAlumnos">
			  <thead>
			    <tr>
			      <th scope="col">Dni</th>
			      <th scope="col">Nombres Apellidos</th>
			    </tr>
			  </thead>
			  <tbody>

			  </tbody>
			</table>
    	</div>
      </div>
      <div class="modal-footer bg-primary">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>