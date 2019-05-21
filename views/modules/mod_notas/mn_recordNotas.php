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

                <!--========================================
                =            CONTENIDO DINAMICO            =
                =========================================-->
				<div class="card col-md-12 col-lg-9">
					<div class="row clearfix">
				      	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="">
				      			<div class="header">
				      				<h2>RECORD DE NOTAS</h2>
				      			</div>
								<div class="body" id="cabecera">

 								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					  		<div class="" id="listaNotas">
					  			<div class="body table-responsive" >
					  				<table class="table table-sm table-condensed text-center" id="listadoNotas">
					  					<thead>
					  						<tr class="bg-blue-grey font-14">
					  							<th class="text-center">N°</th>
					  							<th class="text-center">CICLO</th>
					  							<th class="text-center">CREDITO</th>
					  							<th class="text-center">PROMEDIO</th>
					  							<th class="text-center">ESTADO</th>
					  							<th class="text-center">ACCION</th>
					  						</tr>
					  					</thead>
					  					<tbody>
					  					</tbody>
					  				</table>
					  			</div>
					  		</div>
					  	</div>
				    </div>
				</div>

				<!--====  End of CONTENIDO DINAMICO  ====-->
                
            </div>
        </div>
    </section>



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalDetalles">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="height: 50px;">
        <span class="modal-title" style="margin-top:-20px;">Detalles Notas</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-10px;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    	<div class="row">
    		<table class="table table-hover table-sm" id="listaDetalles">
			  <thead>
			    <tr>
			      <th scope="col">N°</th>
			      <th scope="col">Cursos</th>
			      <th scope="col">Credito</th>
			      <th scope="col">Promedio</th>
			    </tr>
			  </thead>
			  <tbody>
			  </tbody>
			</table>
    	</div>
      </div>
      <div class="modal-footer bg-primary">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Send message</button> -->
      </div>
    </div>
  </div>
</div>