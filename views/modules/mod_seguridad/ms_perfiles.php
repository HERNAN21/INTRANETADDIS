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
                            MODULO DE SEGURIDAD - GESTOR DE PERFILES
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
                                                <i class="material-icons">add_box</i> Creación de perfiles
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#profile_with_icon_title" data-toggle="tab">
                                                <i class="material-icons">assignment_return</i> Asignación modulos a perfiles 
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                                        	<div id="listado-Perfiles">
                                        		<div class="header bg-blue-grey">
                                                    <h2>
                                                        LISTA DE PERFILES ACTUALES
                                                    </h2>
                                                    <button id="agregarPerfil" class="header-dropdown m-r--5 btn bg-green" style="margin-top: -10px;">
                                                        <i class="material-icons">add</i>
                                                        <span>Agregar Perfil</span>
                                                    </button>
                		                        </div>
                								<div class="body">
                									<div class="table-responsive">
                										<table class="table table-bordered table-striped table-hover js-basic-example dataTable" style="text-align: center">
                		                                    <thead>
                		                                        <tr>
                		                                            <th style="text-align: center">idPerfil</th>
                		                                            <th style="text-align: center">Desc. Corta</th>
                		                                            <th style="text-align: center">Descripcion</th>
                		                                            <th style="text-align: center">Estado</th>
                                                                    <th style="text-align: center">Acciones</th>
                		                                        </tr>
                		                                    </thead>
                                                            <tbody>

                                                                <?php 
                                                                #Obtenemos los Perfiles actuales

                                                                $perfil = new PerfilesController();
                                                                $perfil -> getPerfilesController();
                                                                $perfil -> updatePerfilesController();
                                                                $perfil -> deletePerfilesController();

                                                                 ?>

                                                            </tbody>
                		                                </table>
                									</div>
                								</div>
                                        	</div>	
                                            <div id="frmCrearPerfiles" style="display:none;">
                                                <div class="header">
                                                    <h2>
                                                        <strong>REGISTRAR NUEVO PERFIL</strong>
                                                    </h2>
                                                </div>
                                                <div class="body">
                                                    <form class="form-horizontal" id="formInsertUser" method="POST" >
                                                        <div class="row clearfix">
                                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                <label for="nombUsuario">Desc. Corta</label>
                                                            </div>
                                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="text" id="desCorta" class="form-control" name="desCorta" placeholder="Descripcion corta o abreviatura del perfil" required>
                                                                    </div>
                                                                    <div class="help-info">Ejemplo: SEG</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                <label for="contraseña">Desc. completa</label>
                                                            </div>
                                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="text" id="desLarga" class="form-control" name="desLarga" placeholder="Descripcion del perfil a crear" required>
                                                                    </div>
                                                                    <div class="help-info">Ejemplo: SEGURIDAD</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row clearfix"><br>
                                                            <div class="col-lg-5 col-md-3 col-sm-4 col-xs-5 col-md-offset-8">
                                                                <button type="submit" class="btn bg-blue waves-effect btn-sm col-md-4 col-sm-6 col-xs-6">
                                                                    <i class="material-icons">save </i>
                                                                    <span>Registrar</span>
                                                                </button>
                                                                <button type="button" id="cancelarPerfil" class="btn bg-red waves-effect btn-sm col-md-4 col-sm-6 col-xs-6 col-md-offset-1">
                                                                    <i class="material-icons">cancel</i>
                                                                    <span>Cancelar</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                    <?php 
                                                    #Crear perfiles
                                                    $create = new PerfilesController();
                                                    $create -> createPerfilesController();
                                                     ?> 

                                                </div>
                                            </div>
                                        </div>
                                        <!-- START ASIGNAR MODULOS A PERFILES -->
                                        <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                            <div class="header ">
                                                <h2>
                                                    <strong>ASIGNAR MODULOS A PERFILES</strong>
                                                </h2>
                                                <button type="button" class="btn bg-cyan waves-effect btn-sm" data-toggle="modal" data-target="#busPerfil">
                                                    <i class="material-icons">search</i>
                                                    <span>Buscar perfil</span>
                                                </button>
                                            </div>
                                            <div class="body"><br>
                                                <form class="form-horizontal" id="formInsertAsignacion" method="POST">
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                            <label for="nroCip">CODIGO:</label>
                                                        </div>
                                                        <div class="col-lg-2 col-md-4 col-sm-8 col-xs-7">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="codPerfilAsig" class="form-control" placeholder="Codigo del perfil" style="text-align: center;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                            <label for="nomApell">DESCRIPCION PERFIL:</label>
                                                        </div>
                                                        <div class="col-lg-5 col-md-10 col-sm-8 col-xs-7">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="descPerfilAsig" class="form-control" placeholder="Descripcion del perfil" style="text-align: center;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h6 class="text-muted text-center">DATOS DEL MODULO</h6>
                                                    <hr>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 form-control-label col-lg-offset-1">
                                                            <label>Tipo de Perfil</label>
                                                        </div>
                                                        <div class="col-lg-5 col-md-4 col-sm-4 col-xs-5">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <select class="form-control show-tick" id="tipoModuloAsig" name="tipoPerfil">
                                                                        <option value="0">... Seleccione ...</option>
                                                                        <?php 
                                                                            $modulo = new ModulosController();
                                                                            $modulo -> getModulosController();
                                                                         ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-4">
                                                            <button type="button" class="btn btn-success waves-effect btn-sm col-md-6 col-sm-8 col-xs-12" onclick="insertModulosPerfiles();">
                                                                <i class="material-icons">save </i>
                                                                <span>Agregar Perfil</span>
                                                            </button>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="header">
                                                                    <h2>
                                                                        <strong>LISTA DE PERFILES -  MODULOS ACTUALES</strong>
                                                                    </h2>
                                                                </div>
                                                                <div class="body table-responsive" id="asignacionModulosPerfil">
                                                                    <!-- <table class="table table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>Perfil</th>
                                                                                <th>Módulo</th>
                                                                                <th>Acción</th>
                                                                            </tr>
                                                                        </thead>
                                                                    </table> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="busPerfil" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="defaultModalLabel">Buscar Perfiles</h4>
                                                        <!-- <button type="button" class="close" data-dismiss="modal">x</button> -->
                                                        <div class="modal-body">
                                                            <form id="formBuscarPerfil">
                                                                <div class="form-group">
                                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                                        <div class="form-line ">
                                                                            <input type="text" class="form-control" id="search" placeholder="Nombre del perfil">
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
                                                                            <table class="table table-hover dashboard-task-infos" id="dataPerfil">
                                                                                    <!-- DATA DE BUSQUEDA DE PERFIL -->
                                                                            </table>
                                                                        </div>                                                                    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn bg-indigo" data-dismiss="modal" onclick="mostrarBusquedaPerfAsig();">Aceptar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- END ASIGNACION -->
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