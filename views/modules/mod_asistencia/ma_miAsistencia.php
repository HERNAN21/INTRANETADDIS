<div class="col-md-12 col-lg-9">
	<div class="row clearfix">
      	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      		<div class="card">
      			<div class="header">
      				<div class="col-md-7">
      					<h2>MYS ASISTENCIA</h2>
      				</div>
      				<div class="col-md-5">
      					<div class="col-lg-3 col-md-2 col-sm-4 col-xs-5">
                            <label for="nomApell">PERIODO</label>
                        </div>
                        <div class="col-lg-9 col-md-2 col-sm-4 col-xs-5 " style="margin-top: -5px;">
                        	<select class="form-control show-tick" id="ciclo" onchange="select_ciclo();">
	                            <option>... Seleccione ...</option>
	                            <?php
									$ciclo = new NotasAlumnoController();
									$ciclo->getAllCiclosController();
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
						<div class="col-lg-4 font-15">
							<div>
								<p>CAMPUS : </p>
								<h4 class="p-l-35 p-t-10 p-b-15">Addis - Manchay</h4>
							</div>
							<div>
								<p>CICLO RELATIVO : </p>
								<h4 class="p-l-35 p-t-10 p-b-15">V</h4>
							</div>
						</div>
						<div class="col-lg-4">
							<div>
								<p>ASISTENCIA : </p>
								<h4 class="p-l-35 p-t-10 p-b-15">24</h4>
							</div>
							<div>
								<p>FALTAS: </p>
								<h4 class="p-l-35 p-t-10 p-b-15">4</h4>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>PIE CHART</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="pie_chart" class="flot-chart"></div>
                        </div>
                    </div>
                </div>
						</div>
					</div>
				</div>
      		</div>
      		<div class="card" id="listaNotas">
      			<!-- <div class="body">
      				<div class="header bg-green">
      					TALLER DE PROGRAMACIÓN CONCURRENTE
      				</div>
      				<div class="row clearfix" style="padding: 20px 20px 0px 20px;">
      					<div class="col-lg-4">
      						<div>
								<p style="color: green">Docente</p>
								<h6 style="padding-left: 30px; margin-bottom: 15px;">Fidel Cartolin Rojas</h6>
							</div>
							<div>
								<p style="color: green">Creditos</p>
								<h6 style="padding-left: 30px; margin-bottom: 15px;">4.5</h6>
							</div>
							<div>
								<p style="color: green">Modalidad de enseñanaza</p>
								<h6 style="padding-left: 30px; margin-bottom: 15px;">Presencial</h6>
							</div>
      					</div>
      					<div class="col-lg-4">
      						<div>
								<p style="color: green">Evaluaciones del curso</p>
								<h6 style="padding-left: 30px; margin-bottom: 15px;">Pratica Calificada <b>18</b></h6>
								<h6 style="padding-left: 30px; margin-bottom: 15px;">Pratica Calificada <b>18</b></h6>
								<h6 style="padding-left: 30px; margin-bottom: 15px;">Pratica Calificada <b>18</b></h6>
								<h6 style="padding-left: 30px; margin-bottom: 15px;">Pratica Calificada <b>18</b></h6>
							</div>
      					</div>
      					<div class="col-lg-4">
      						<div>
								<p style="color: green">Fórmula</p>
								<h6 style="padding-left: 30px; margin-bottom: 15px;">30%*[PC] + 30%*[PC] + 30%*[PC] + 30%*[PC] </h6>
							</div>
							<div>
								<p style="color: green">Promedio</p>
								<h3 style="padding-left: 30px; margin-bottom: 15px;">18</h3>
							</div>
      					</div>
      				</div>
      			</div> -->
      		</div>
      	</div>
  	</div>
</div>