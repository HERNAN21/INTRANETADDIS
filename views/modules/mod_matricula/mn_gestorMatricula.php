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
	                            <li role="presentation">
	                                <a href="#profile_with_icon_title" data-toggle="tab">
	                                    <i class="material-icons">assignment_return</i> Asignación perfiles a usuarios
	                                </a>
	                            </li>
                            </ul>
							<div class="row">
								<div class="col-md-12">
									<form  id="">
										<div class="row">
											<div class="col-md-3">
												<label>Codigo Matricula:</label>
												<input type="text" class="form-control form-control-sm disabled" name="cod_alumno" id="cod_alumno">
											</div>
											<div class="col-md-8">
												<label>Nombres y Apellidos:</label>
												<input type="hidden" name="idEvaluacion" id="idEvaluacion">
											    <input type="text" id="nombres" name="nombre" class="form-control form-control-sm" disabled>
											</div>
											<div class="col-md-1" style="margin-left: -20px;">
												<label style="height: 12px;"></label>
											    <button class="btn btn-sm btn-success" id="btnModalAlumno"><i class="material-icons">add_box</i></button>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label>Cod Pago:</label>
												<input type="text" class="form-control-sm form-control">
											</div>
											<div class="col-md-6">
												<label>Carrerra:</label>
												<!-- <input type="text" class="form-control-sm form-control"> -->
												<select name="carrera" id="carrera" class="form-control">
												</select>
											</div>
											<div class="col-md-3">
												<label>Ciclo:</label>
												<input type="text" class="form-control-sm form-control">
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label>Semestre:</label>
												<select name="semestre" id="semestre">
												</select>
											</div>
											<div class="col-md-5">
												<label>Tipo Matricula:</label>
												<select name="tipomat" id="tipomat">
													<option value="0">Matricula Inicial</option>
													<option value="0">Renovacion Matricula</option>
												</select>
											</div>
										</div>
									</form>
										<div class="row">
											<div class="col-md-12">
												<button class="btn btn-success">Guardar</button>
												<button class="btn btn-info">Actualizar</button>
												<button class="btn btn-danger">Eliminar</button>
											</div>
										</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<span class="text-info">HISTORIAL MATRICULA</span>
								</div>
								<div class="col-md-12">
									<table class="table table-hover">
									  <thead>
									    <tr>
									      <th scope="col">#</th>
									      <th scope="col">First</th>
									      <th scope="col">Last</th>
									      <th scope="col">Handle</th>
									    </tr>
									  </thead>
									  <tbody>
									    <tr>
									      <th scope="row">1</th>
									      <td>Mark</td>
									      <td>Otto</td>
									      <td>@mdo</td>
									    </tr>
									    <tr>
									      <th scope="row">2</th>
									      <td>Jacob</td>
									      <td>Thornton</td>
									      <td>@fat</td>
									    </tr>
									    <tr>
									      <th scope="row">3</th>
									      <td colspan="2">Larry the Bird</td>
									      <td>@twitter</td>
									    </tr>
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
      		<div class="col-md-6">
      			<input type="text" id="dniBus">
      		</div>
      		<div class="col-md-6">
      			<input type="text" id="nombreBus">
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