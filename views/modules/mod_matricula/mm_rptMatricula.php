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
                    <h2>REPORTE MATRICULA </h2>
                </div>
                <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
                    <div class="card">
                        <div class="body">
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										
										<div class="col-md-6">
											<label>Carrerra:</label>
											<!-- <input type="text" class="form-control-sm form-control"> -->
											<select name="carreraBus" id="carreraBus" class="form-control inputstl">

											</select>
										</div>
										<div class="col-md-2">
											<label>Ciclo:</label>
											<select name="cicloBus" id="cicloBus" class="form-control form-control-sm inputstl">
												
											</select>
										</div>
										<div class="col-md-2">
											<label>Semestre:</label>
											<select name="semestreBus" id="semestreBus" class="form-control inputstl">
												
											</select>
										</div>
										<div class="col-md-2">
											<label>Seccion:</label>
											<select name="seccion" id="seccion" class="form-control inputstl">
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-md-8">
											<button class="btn-info btn btn-sm" id="btnBuscar">Buscar</button>
											<button class="btn btn-sm btn-success" id="printMat">imprimir</button>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<span class="text-info">HISTORIAL MATRICULA</span>
								</div>
								<div class="col-md-12">
									<table class="table table-hover" id="listConsolidado">
									  <thead>
									    <tr>
									      <th style="width: 5%;" scope="col">#</th>
									      <th style="width: 5%;" scope="col">Codigo</th>
									      <th style="width: 5%;" scope="col">Dni</th>
									      <th style="width: 10%;" scope="col">Nombres y Apellidos</th>
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