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
                    <h2>MODULO DE PERSONA </h2>
                </div>
                <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
                    <div class="card">
                        <div class="body">
                        	<!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist" style="margin-top: -15px;">
                            	<li role="presentation" class="active">
                                	<a href="#home_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">add_box</i> Registra Persona
                                    </a>
                                </li>
	                            <!-- <li role="presentation">
	                                <a href="#profile_with_icon_title" data-toggle="tab">
	                                    <i class="material-icons">assignment_return</i> Asignación perfiles a usuarios
	                                </a>
	                            </li> -->
                            </ul>
                            <br>
							<div class="row">
								<div class="col-md-12">
									
										<div class="row">
											<div class="col-md-3">
												<label>Dni:</label>
												<input type="text" class="form-control form-control-sm" name="cod_matricula" id="cod_matricula">
											</div>
											<div class="col-md-6">
												<label>Nombres y Apellidos:</label>
											    <input type="text" id="nombres" name="nombre" class="form-control form-control-sm" disabled>
											</div>
											<div class="col-md-3" style="margin-left: -20px;">
												<label style="height: 37px;"></label>
											    <button class="btn btn-sm btn-success" id="btnBuscar">Buscar</button>
											    <button class="btn btn-sm btn-success" id="btnModalPersona">Nuevo</button>
											</div>
										</div>
										
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<span class="text-info">Listado de personas</span>
								</div>
								<div class="col-md-12">
									<table class="table table-hover" id="listMatPer">
									  <thead>
									    <tr>
									      <th style="width: 5%;" scope="col">#</th>
									      <th style="width: 5%;" scope="col">Dni</th>
									      <th style="width: 5%;" scope="col">Nombre</th>
									      <th style="width: 10%;" scope="col">Apellidos</th>
									      <th style="width: 2%;" scope="col">Direccion</th>
									      <th style="width: 3%;" scope="col">Sexo</th>
									      <th style="width: 3%;" scope="col">Fecha Nac</th>
									      <th style="width: 3%;" scope="col">Celular</th>
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




<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="ModalPersona">
  <div class="modal-dialog modal-lg" style="width: 55%">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="height: 50px;">
        <span class="modal-title" style="margin-top:-20px;">Registrar Persona</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-10px;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="frmParty">
      		
      	<div class="row">
      		<div class="col-md-2">
      			<label>Dni:</label>
      			<input type="text" id="dniPer" id="dniPer" class="form-control form-control-sm" >
      		</div>
      		<div class="col-md-4">
      			<label>Nombres:</label>
      			<input type="text" id="nombre" name="nombre" class="form-control form-control-sm" >
      		</div>
      		<div class="col-md-3">
      			<label>Apellido Paterno:</label>
      			<input type="text" id="apellido_m" name="apellido_m" class="form-control form-control-sm" >
      		</div>
      		<div class="col-md-3">
      			<label>Apellido Materno:</label>
      			<input type="text" id="apellido_p" name="apellido_p" class="form-control form-control-sm">
      		</div>
      	</div>
      	<br>
      	<div class="row">
      		<div class="col-md-3">
      			<label>Genero:</label>
      			<select name="genero" id="genero" class="form-control">
      				<option value="M">Mascolino</option>
      				<option value="F">Femenino</option>
      			</select>
      		</div>
      		<div class="col-md-3">
      			<label>Fecha Nac:</label>
      			<input type="date" id="fecha_nac" name="fecha_nac" class="form-control form-control-sm" >
      		</div>
      		<div class="col-md-6">
      			<label>Direccion:</label>
      			<input type="text" id="direccion" name="direccion" class="form-control form-control-sm">
      		</div>
      	</div>
      	<br>
      	<div class="row">
      		<div class="col-md-4">
      			<label>Departamnento:</label>
      			<input type="text" id="departamento" name="departamento" class="form-control form-control-sm" >
      		</div>
      		<div class="col-md-4">
      			<label>Provincia:</label>
      			<input type="text" id="provincia" name="provincia" class="form-control form-control-sm" >
      		</div>
      		<div class="col-md-4">
      			<label>Distrito:</label>
      			<input type="text" id="distrito" name="distrito" class="form-control form-control-sm" >
      		</div>
      	</div>
      	<br>
      	<div class="row">
      		<div class="col-md-3">
      			<label>Email:</label>
      			<input type="text" id="email" name="email" class="form-control form-control-sm">
      		</div>
      		<div class="col-md-3">
      			<label>Celular:</label>
      			<input type="text" id="celular" name="celular" class="form-control form-control-sm">
      		</div>
      		<div class="col-md-3">
      			<label>Tipo Persona:</label>
      			<select name="tipoparty" id="tipoparty" class="form-control form-control-sm">
      				<option value="1">postulante</option>
					<option value="2">docente</option>
					<option value="3">administrativo</option>
					<option value="4">apoderado</option>
      			</select>
      		</div>
      		<div class="col-md-3">
      			<label>Estado:</label>
      			<select name="estado" id="estado" class="form-control form-control-sm">
      				<option value="0">Activo</option>
      				<option value="1">Inactivo</option>
      			</select>
      		</div>
      	</div>
      	<br>
      	</form>
      </div>
      <div class="modal-footer bg-primary">
      	<button type="button" class="btn btn-primary" id="btnSaveParty">Guardar</button>
      	<button type="button" class="btn btn-success" id="btnUpdateParty">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>