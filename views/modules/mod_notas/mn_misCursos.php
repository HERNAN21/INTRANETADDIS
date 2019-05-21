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

                <!--=====================================
                =            PANEL IZQUIERDO            =
                ======================================-->
                
                <?php  include   "views/modules/panel-Izquierdo.php";    ?>
                
                <!--====  End of PANEL IZQUIERDO  ====-->       

				<div class="col-md-12 col-lg-9">
					<div class="row clearfix">
				      	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				      		<div class="card">
				      			<div class="header">
				      				<div class="col-md-7 col-sm-6">
				      					<h2>MIS CURSOS</h2>
				      				</div>
				      				<div class="col-md-5 col-sm-6">
				      					<div class="col-lg-3 col-md-2 col-sm-4 col-xs-5">
				                            <label for="nomApell">PERIODO</label>
				                        </div>
				                        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8 " style="margin-top: -5px;">
				                        	<select class="form-control show-tick" id="cicloAlumno" >
					                            <?php
													$ciclo = new MisCursosController();
													$ciclo->getCiclosAlumnoController();
												?>
				                        	</select>
				                        </div>
				      				</div>
				      				<br>
				      			</div>
								<div class="body">
									<div class="header bg-deep-purple">
										<h2>RESUMEN GENERAL</h2>
									</div>
									<div class="row clearfix" style="padding: 20px 20px 0px 20px;">
										<div class="col-lg-4">
											<div>
												<p>Campus</p>
												<h6 style="padding-left: 30px; margin-bottom: 15px;">Istp. Addis - Manchay</h6>
											</div>
											<div>
												<p>Ciclo relativo</p>
												<h6 style="padding-left: 30px; margin-bottom: 15px;">V</h6>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="item">
												<p>Cursos Matriculados</p>
												<h6 style="padding-left: 30px; margin-bottom: 15px;">12</h6>
											</div>
											<div class="item">
												<p>Cantidad de créditos</p>
												<h6 style="padding-left: 30px; margin-bottom: 15px;">22.5</h6>
											</div>
											<div>
												<p>Horas semanales</p>
												<h6 style="padding-left: 30px; margin-bottom: 15px;">5</h6>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="item">
												<p>Proedio ponderado</p>
												<h6 style="padding-left: 30px; margin-bottom: 15px;">18</h6>
											</div>
											<div class="item">
												<p>Mérito - Orden</p>
												<h6 style="padding-left: 30px; margin-bottom: 15px;">1 de 28</h6>
											</div>
											<div>
												<p>Mérito - Pertenece</p>
												<h6 style="padding-left: 30px; margin-bottom: 15px;">Tercio Superior</h6>
											</div>
										</div>
									</div>
								</div> 
				      	
				      			<div class="body" id="listCursosNotasAlumnos">

				      			</div>
				      	</div>
				      	</div>
				  	</div>
				</div>

              <!--====  End of CONTENIDO DINAMICO  ====-->
                
            </div>
        </div>
    </section>