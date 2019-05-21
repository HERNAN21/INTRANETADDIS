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
   
                <div class="col-md-12 col-lg-9">
                	<div class="block-header">
                        <h2>
                            MODULO DE TABLAS ACADEMICAS - <b>GESTOR DE PROGRAMAS ACDEMICOS</b>
                        </h2>
                    </div>
                    <div class="row clearfix">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
                            <div class="card">
                                    <div class="body">
                                    	 <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist" style="margin-top: -15px;">
                                            <li role="presentation" class="active">
                                                <a href="#home_with_icon_title" data-toggle="tab">
                                                    <i class="material-icons">add_box</i> Creación de Programas Académicos
                                                </a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#profile_with_icon_title" data-toggle="tab">
                                                    <i class="material-icons">assignment_return</i> Asignación de cursos a Programas Académicos
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                                                <!-- FORMULARIO DE REGISTRO -->
                                                <div id="" class="card form-insert-academico" style="background: #f3f2f2; box-shadow: none; border: 1px solid #E5E4E4">
                                                    <div class="body">
                                                        <form class="form-horizontal form-insert" method="POST" style="margin-bottom: -20px;">
                                                            <div class="row clearfix">
                                                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <input type="text" name="descorCarrera" class="form-control" placeholder="  Abreviatura" style="border-radius: 5px; height: 40px; margin-left: 10px;">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <input type="text" name="deslarCarrera" class="form-control" placeholder="  Nombre completo" style="border-radius: 5px; height: 40px;">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn bg-blue waves-effect">
                                                                            <i class="material-icons">save </i>
                                                                            <span>Guardar</span>
                                                                        </button>
                                                                     </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <?php 
                                                            $insert = new gestorProgramasAcademicosControler();
                                                            $insert -> createCarrerasController();
                                                        ?>
                                                    </div>
                                                </div>
                                                <!-- TABLA DE LISTADO -->
                                            	<div id="listado-usuarios">
                                            		<div class="header bg-blue-grey">
                                                        <h2>
                                                            LISTADO DE CARRERAS ACTUALES
                                                        </h2>
                                                        <button id="" class="header-dropdown m-r--5 btn bg-green agregar-academico"  style="margin-top: -10px;">
                                                            <i class="material-icons"> add </i>
                                                            <span> Agregar Carrera </span>
                                                        </button>
                                                        <button id="" class="header-dropdown m-r--5 btn bg-red cancelar-academico"  style="margin-top: -10px;" style="display: none;">
                                                            <i class="material-icons"> close </i>
                                                            <span> Cancelar Carrera </span>
                                                        </button>
                                                        <br>
                    		                        </div>
                    								<div class="body">
                    									<div class="table-responsive">
                    										<table class="table table-bordered table-striped table-hover js-basic-example dataTable text-center">
                    		                                    <thead>
                    		                                        <tr>
                    		                                            <th style="text-align: center">Codigo</th>
                                                                        <th style="text-align: center">Siglas</th>
                    		                                            <th style="text-align: center">Nombre</th>
                    		                                            <th style="text-align: center">Estado</th>
                    		                                            <th style="text-align: center">Acciones</th>
                    		                                        </tr>
                    		                                    </thead>
                                                                <tbody style="font-size: 14px;">
                                                                    <?php 
                                                                            $carreras = new gestorProgramasAcademicosControler();
                                                                            $carreras -> getProgramAcademicosController();
                                                                            $carreras -> updateCarrerasController();
                                                                            $carreras -> deleteCarrerasController();
                                                                     ?>
                                                                </tbody>
                    		                                </table>
                    									</div>
                    								</div>
                                            	</div>	
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                                <div class="header">
                                                    <h2>
                                                        <strong>ASIGNAR CURSOS A PROGRAMAS ACADEMICOS</strong>
                                                    </h2>
                                                    <button type="button" class="header-dropdown m-r--5 btn bg-blue" data-toggle="modal" data-target="#buscarCarrera" style="margin-top: -10px;">
                                                        <i class="material-icons">search</i>
                                                        <span>Buscar carrera</span>
                                                    </button>
                                                </div>
                                                <div class="body">
                                                    <form class="form-horizontal" id="formInsertAsignacion" method="POST">
                                                        <div class="row clearfix">
                                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                <label for="codigoCarrera">Codigo</label>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-8 col-xs-7">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="text" id="idCarreraAsig" class="form-control" placeholder="Codigo" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                <label for="descCarrera">Carrera</label>
                                                            </div>
                                                            <div class="col-lg-5 col-md-5 col-sm-8 col-xs-7">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="text" id="descCarrera" class="form-control" placeholder="Nombre de carrera" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h6 class="text-muted text-center">DATOS DEL CURSO</h6>
                                                        <hr>
                                                        <div class="row clearfix">
                                                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 form-control-label col-lg-offset-1">
                                                                <label>Curso</label>
                                                            </div>
                                                            <div class="col-lg-5 col-md-4 col-sm-4 col-xs-5">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <select class="form-control show-tick" id="idCursoAsig">
                                                                            <option value="0">... Seleccione ...</option>
                                                                            <?php 
                                                                                $cursos = new GestorCarrerasCursosController();
                                                                                $cursos -> getCarrerasCursosComboController();
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-4">
                                                                <button type="button" class="btn btn-success waves-effect btn-sm col-md-6 col-sm-8 col-xs-12" onclick="insertCarrerasCursosAsig();">
                                                                    <i class="material-icons">save </i>
                                                                    <span>Agregar curso</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="header">
                                                                    <h2>
                                                                        <strong>LISTA DE PROGRAMAS ACADEMICOS - CURSOS</strong>
                                                                    </h2>
                                                                </div>
                                                                <div class="body table-responsive" id="asignacionProgramAcadeCursos">
                                                                    <!-- <table class="table table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>Programa Académico</th>
                                                                                <th>Curso</th>
                                                                                <th>Acción</th>
                                                                            </tr>
                                                                        </thead>
                                                                    </table> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- Modal de Busqueda de Usuarios -->
                                               <div class="modal fade" id="buscarCarrera" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="defaultModalLabel">Buscar Carreras</h4>
                                                                <div class="modal-body">
                                                                    <form id="formBuscarPerfil">
                                                                        <div class="form-group">
                                                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                                                <div class="form-line ">
                                                                                    <input type="text" class="form-control" id="searchCarrera" placeholder="Nombre de la carrera">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                                                <button type="submit" class="btn bg-deep-orange btn-sm waves-effect col-md-12 col-sm-12 col-xs-12" >
                                                                                    <i class="material-icons">search</i>
                                                                                    <span>Buscar</span>
                                                                                </button>
                                                                            </div>
                                                                        </div>   
                                                                    </form>
                                                                    <div class="row clearfix">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="body">
                                                                                <div class="table-responsive">
                                                                                    <table class="table table-hover dashboard-task-infos text-center" id="">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th class="text-center">#</th>
                                                                                                    <th class="text-center">CODIGO</th>
                                                                                                    <th class="text-center">ABREVIATURA</th>
                                                                                                    <th class="text-center">CARRERA</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody id="dataCarreras">
                                                                                                
                                                                                            <!-- DATA DE BUSQUEDA DE CURSOS -->
                                                                                            
                                                                                            </tbody>
                                                                                    </table>
                                                                                </div>                                                                    
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn bg-indigo" data-dismiss="modal" onclick="mostrarBusquedaCarreraAsig();">Aceptar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- End modal -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

              <!--====  End of CONTENIDO DINAMICO  ====-->
                
            </div>
        </div>
    </section>