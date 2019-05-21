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
                            MODULO DE TABLAS ACADEMICAS - <b>GESTOR DE SECCIONES</b>
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
                                                    <i class="material-icons">add_box</i> Creación de Secciones
                                                </a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#profile_with_icon_title" data-toggle="tab">
                                                    <i class="material-icons">assignment_return</i> Asignación de cursos a carreras
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                                                <!-- FORMULARIO DE REGISTRO -->
                                                <div class="card form-insert-academico" style="background: #f3f2f2; box-shadow: none; border: 1px solid #E5E4E4">
                                                    <div class="body">
                                                        <form class="form-horizontal form-insert" method="POST" style="margin-bottom: -20px;">
                                                            <div class="row clearfix">
                                                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                    <div class="form-group">
                                                                        <input type="text" name="createDesSeccion" class="form-control" placeholder=" Descripcion " style="border-radius: 5px; height: 36px;">
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
                                                            $insert = new GestorSeccionesController();
                                                            $insert -> createSeccionController();
                                                        ?>
                                                    </div>
                                                </div>
                                                <!-- TABLA DE LISTADO -->
                                            	<div id="listado-usuarios">
                                            		<div class="header bg-blue-grey">
                                                        <h2>
                                                            LISTADO DE SECCIONES ACTUALES
                                                        </h2>
                                                        <button id="" class="header-dropdown m-r--5 btn bg-green agregar-academico"  style="margin-top: -10px;">
                                                            <i class="material-icons"> add </i>
                                                            <span> Agregar Seccion </span>
                                                        </button>
                                                        <button id="" class="header-dropdown m-r--5 btn bg-red cancelar-academico"  style="margin-top: -10px;" style="display: none;">
                                                            <i class="material-icons"> close </i>
                                                            <span> Cancelar Seccion </span>
                                                        </button>
                                                        <br>
                    		                        </div>
                    								<div class="body">
                    									<div class="table-responsive">
                    										<table class="table table-bordered table-striped table-hover js-basic-example dataTable text-center">
                    		                                    <thead>
                    		                                        <tr>
                    		                                            <th style="text-align: center">Codigo</th>
                    		                                            <th style="text-align: center">Seccion</th>
                    		                                            <th style="text-align: center">Estado</th>
                    		                                            <th style="text-align: center">Acciones</th>
                    		                                        </tr>
                    		                                    </thead>
                                                                <tbody style="font-size: 14px;">
                                                                    <?php 
                                                                            $secciones = new GestorSeccionesController();
                                                                            $secciones -> getAllSeccionesController();
                                                                            $secciones -> updateSeccionController();
                                                                            $secciones -> deleteSeccionController();
                                                                     ?>
                                                                </tbody>
                    		                                </table>
                    									</div>
                    								</div>
                                            	</div>	
                                            </div>
                                            <!-- Modal de Busqueda de personas -->
                                               <div class="modal fade" id="buscarPersona" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="defaultModalLabel">Buscar Perfiles</h4>
                                                                <div class="modal-body">
                                                                    <form id="formBuscarPerfil">
                                                                        <div class="form-group">
                                                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                                                <div class="form-line ">
                                                                                    <input type="text" class="form-control" id="searchPersona" placeholder="Nombre del perfil">
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
                                                                                    <table class="table table-hover dashboard-task-infos" id="dataPersona">
                                                                                            <!-- DATA DE BUSQUEDA DE PERFIL -->
                                                                                    </table>
                                                                                </div>                                                                    
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn bg-indigo" data-dismiss="modal" onclick="mostrarBusquedaPersona();">Aceptar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- End modal -->
                                            <!-- Modal de edicion de usuarios -->
                                            <div class="modal fade" id="editarUsuarios" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="defaultModalLabel">Editar Usuario Actual</h4>
                                                            <button type="button" class="close" data-dismiss></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                        <label for="nombUsuario">Nombre y Apellidos</label>
                                                                    </div>
                                                                    <div class="col-lg-5 col-md-10 col-sm-8 col-xs-7">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" class="form-control" placeholder="Nombre de Usuario" id="editarNombre" readonly required>
                                                                                <input type="hidden" name="IdUser" id="IdUser">
                                                                            </div>                                            
                                                                        </div>
                                                                    </div>
                                                                     <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                        <label for="">Dni</label>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" class="form-control" placeholder="Dni" id="editarDni" readonly>
                                                                            </div>                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                        <label for="editarUsuario">Usuario</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" class="form-control" name="editarUsuario" placeholder="Usuario o Login" required id="editarUsuario">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                        <label for="editarPassword">Contraseña</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" class="form-control" name="editarPassword" placeholder="Contraseña" required id="editarPassword">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                        <label for="editarEmail">Email</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" class="form-control" name="editarEmail" placeholder="Direccion de correo electronico" required id="editarEmail">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-12 col-md-10 col-sm-8 col-xs-7">
                                                                        <div class="text-center">
                                                                            <img src="" alt="Foto de perfil" class="img-circle" style="display:inline-block; width: 20%;" id="imgEditarFoto">
                                                                            <div class="caption text-center">
                                                                                <input type="hidden" name="editarFoto" id="editarFoto">
                                                                                <input type="file" class="btn btn-default" id="changeFotoUsuario" style="display:inline-block; margin:10px 0;" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-link waves-effect bg-blue">GUARDAR</button>
                                                                    <button type="button" class="btn btn-link waves-effect bg-red" data-dismiss="modal">CERRAR</button>
                                                                </div>
                                                            </form>
                                                        </div>                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ENd Modal edicion -->
                                            <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                                <div class="header">
                                                    <h2>
                                                        <strong>ASIGNAR PERFILES A USUARIO</strong>
                                                    </h2>
                                                    <button type="button" class="header-dropdown m-r--5 btn bg-blue" data-toggle="modal" data-target="#buscarUsuario" style="margin-top: -10px;">
                                                        <i class="material-icons">search</i>
                                                        <span>Buscar Usuario</span>
                                                    </button>
                                                </div>
                                                <div class="body">
                                                    <form class="form-horizontal" id="formInsertAsignacion" method="POST">
                                                        <div class="row clearfix">
                                                            <div class="col-lg-1 col-md-1 col-sm-4 col-xs-5 form-control-label">
                                                                <label for="nroCip">DNI</label>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-8 col-xs-7">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="text" id="showDni" class="form-control" placeholder="Numero de DNI" >
                                                                        <input type="hidden" id="showIduser">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                <label for="nomApell">Nombre y Ape.</label>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-8 col-xs-7">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="text" id="showNomApell" class="form-control" placeholder="Nombre y Apellidos del usuario" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 col-sm-4 col-xs-5 form-control-label">
                                                                <label for="nomApell">Usuario</label>
                                                            </div>
                                                            <div class="col-lg-2 col-md-10 col-sm-8 col-xs-7">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="text" id="showUsuario" class="form-control" placeholder="Usuario" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h6 class="text-muted text-center">DATOS DE PERFIL</h6>
                                                        <hr>
                                                        <div class="row clearfix">
                                                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 form-control-label col-lg-offset-1">
                                                                <label>Tipo de Perfil</label>
                                                            </div>
                                                            <div class="col-lg-5 col-md-4 col-sm-4 col-xs-5">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <select class="form-control show-tick" id="tipoIdPerfil" name="tipoIdPerfil">
                                                                            <option value="0">... Seleccione ...</option>
                                                                            <?php 
                                                                                $perfilA = new GestorPerfilesUsuariosController();
                                                                                $perfilA -> comboPerfilesController();
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-4">
                                                                <button type="button" class="btn btn-success waves-effect btn-sm col-md-6 col-sm-8 col-xs-12" onclick="insertPerfilesUsuarios();">
                                                                    <i class="material-icons">save </i>
                                                                    <span>Agregar Perfil</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="header">
                                                                    <h2>
                                                                        <strong>LISTA DE USUARIOS -  PERFILES ACTUALES</strong>
                                                                    </h2>
                                                                </div>
                                                                <div class="body table-responsive" id="asignacionPerfilesUsuarios">
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
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- Modal de Busqueda de Usuarios -->
                                               <div class="modal fade" id="buscarUsuario" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="defaultModalLabel">Buscar Perfiles</h4>
                                                                <div class="modal-body">
                                                                    <form id="formBuscarPerfil">
                                                                        <div class="form-group">
                                                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                                                <div class="form-line ">
                                                                                    <input type="text" class="form-control" id="searchUsuario" placeholder="Nombre del perfil">
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
                                                                                    <table class="table table-hover dashboard-task-infos" id="datasuarios">
                                                                                            <!-- DATA DE BUSQUEDA DE PERFIL -->
                                                                                    </table>
                                                                                </div>                                                                    
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn bg-indigo" data-dismiss="modal" onclick="mostrarBusquedaUsuAsig();">Aceptar</button>
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