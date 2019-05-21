<?php

    session_start();

    if (!$_SESSION["validar"]){

        header ("location: ingreso");

        exit();

    }

    /*======================================
    =            PAGE PRELOADER            =
    ======================================*/
    
    include "views/modules/cargando.php";
    
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
                            MODULO DE SEGURIDAD - <b>GESTOR DE MODULOS</b>
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
                                                    <i class="material-icons">add_box</i> Creacion de Módulos - Superior
                                                </a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#profile_with_icon_title" data-toggle="tab">
                                                    <i class="material-icons">assignment_return</i>Creacion de Sub - Módulos
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                                            	<div id="listadoModulosSuper">
                                            		<div class="header bg-blue-grey">
                                                        <h2>
                                                            LISTADO DE MODULOS SUPERIORES ACTUALES
                                                        </h2>
                                                        <button id="agregarModuloSuper" class="header-dropdown m-r--5 btn bg-green"  type="button" style="margin-top: -10px;">
                                                            <i class="material-icons">
                                                                add
                                                            </i>
                                                            <span>
                                                                Agregar Modulo-Super
                                                            </span>
                                                        </button>
                    		                        </div>
                    								<div class="body">
                    									<div class="table-responsive">
                    										<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    		                                    <thead>
                    		                                        <tr>
                    		                                            <th>Des. Corta</th>
                    		                                            <th>Descripcion</th>
                                                                        <th>Link</th>
                                                                        <th>N°</th>
                                                                        <th>Icon</th>
                    		                                            <th>Estado</th>
                    		                                            <th>Acciones</th>
                    		                                        </tr>
                    		                                    </thead>
                                                                <tbody class="text-center">
                                                                    <!-- Data Modulos -->
                                                                    <?php 
                                                                        $modulos = new ModulosController();
                                                                        $modulos -> getAllModulosController();
                                                                        $modulos -> insertModulosController();
                                                                        $modulos -> updateModulosController();
                                                                        $modulos -> deleteModulosController();
                                                                    ?>
                                                                </tbody>
                    		                                </table>
                    									</div>
                    								</div>
                                            	</div>	
                                                <div id="frmCrearModuloSuper" style="display:none;">
                                                    <div class="header js-sweetalert">
                                                        <div>
                                                            <h2>
                                                                <strong>REGISTRAR NUEVO MODULO</strong>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div class="body"><br>
                                                        <form class="form-horizontal" id="formInsertModulo" method="POST" >
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                    <label for="inertDescorM">Desc. Corta</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control" id="inertDescorM" name="inertDescorM" placeholder="Descripcion corta o Abreviatura" required>
                                                                        </div>
                                                                        <div class="help-info">Ejemplo: USU </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                    <label for="inertDeslarM">Desc. Completa</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control" id="inertDeslarM" name="inertDeslarM" placeholder="Descripcion Larga o Completa" required>
                                                                        </div>
                                                                        <div class="help-info">USUARIOS</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                    <label for="inertlinkM">link</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control" id="inertlinkM" name="inertlinkM" placeholder="link o url">
                                                                        </div>
                                                                        <div class="help-info">ms_usuarios</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                    <label for="inertIconoM">icono</label>
                                                                </div>
                                                                <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control" id="inertIconoM" name="inertIconoM" placeholder="Icono" required>
                                                                        </div>
                                                                        <div class="help-info">book</div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                    <label for="inertOrdenM">Orden</label>
                                                                </div>
                                                                <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control" id="inertOrdenM" name="inertOrdenM" placeholder="Número de orden" required>
                                                                        </div>
                                                                        <div class="help-info">1</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix"><br>
                                                                <div class="col-lg-6 col-md-3 col-sm-4 col-xs-5 col-md-offset-6">
                                                                    <button type="submit" class="btn bg-blue waves-effect btn-sm col-md-6 col-sm-6 col-xs-6">
                                                                        <i class="material-icons">save </i>
                                                                        <span>Registrar</span>
                                                                    </button>
                                                                    <button type="button" id="cancelarModulo" class="btn bg-pink waves-effect btn-sm col-md-5 col-sm-6 col-xs-6 col-md-offset-1" onclick="javascript:cancelarform(true);">
                                                                        <i class="material-icons">cancel</i>
                                                                        <span>Cancelar</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                                <div id="listadoSubModulos">
                                                    <div class="header bg-blue-grey">
                                                        <h2>
                                                            LISTADO DE SUB MODULOS ACTUALES
                                                        </h2>
                                                        <button id="agregarSubModulo" class="header-dropdown m-r--5 btn bg-green"  type="button" style="margin-top: -10px;">
                                                            <i class="material-icons">
                                                                add
                                                            </i>
                                                            <span>
                                                                Agregar Sub-Modulo
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div class="body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Des. Corta</th>
                                                                        <th>Descripcion</th>
                                                                        <th>Link</th>
                                                                        <th>N°</th>
                                                                        <th>Icon</th>
                                                                        <th>Mod-Super</th>
                                                                        <th>Est.</th>
                                                                        <th>Acciones</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="text-center">
                                                                    <!-- Data Modulos -->
                                                                    <?php 
                                                                        $sub_modulos = new ModulosController();
                                                                        $sub_modulos -> getAllSubModulosController();
                                                                        $sub_modulos -> insertSubModulosController();
                                                                        $sub_modulos -> updateSubModulosController();
                                                                        $sub_modulos -> deleteModulosController();
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div id="frmCrearSubModulos" style="display:none;">
                                                    <div class="header">
                                                        <h2>
                                                            <strong>REGISTRAR NUEVO SUB-MODULO</strong>
                                                        </h2>
                                                    </div>
                                                    <div class="body"><br>
                                                        <form class="form-horizontal" id="formInsertUser" method="POST" >
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                    <label for="inertDescorSubM">Desc. Corta</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control" id="inertDescorSubM" name="inertDescorSubM" placeholder="Descripcion corta o Abreviatura" required>
                                                                        </div>
                                                                        <div class="help-info">Ejemplo: USU </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                    <label for="inertDeslarSubM">Desc. Completa</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control" id="inertDeslarSubM" name="inertDeslarSubM" placeholder="Descripcion Larga o Completa" required>
                                                                        </div>
                                                                        <div class="help-info">USUARIOS</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                    <label for="inertlinkSubM">link</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control" id="inertlinkSubM" name="inertlinkSubM" placeholder="link o url" required>
                                                                        </div>
                                                                        <div class="help-info">ms_usuarios</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                    <label for="inertIconoSubM">icono</label>
                                                                </div>
                                                                <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control" id="inertIconoSubM" name="inertIconoSubM" placeholder="Icono" required>
                                                                        </div>
                                                                        <div class="help-info">book</div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                    <label for="inertOrdenSubM">Orden</label>
                                                                </div>
                                                                <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control" id="inertOrdenSubM" name="inertOrdenSubM" placeholder="Número de orden" required>
                                                                        </div>
                                                                        <div class="help-info">1</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                                                    <label for="inertModSuperSubM">Modulo Superior</label>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <select class="form-control show-tick" id="inertModSuperSubM" name="inertModSuperSubM">
                                                                                <option value="0">... Seleccione modulo superior...</option>
                                                                                <?php 
                                                                                    $combo = new  ModulosController();
                                                                                    $combo -> comboModulosSuper();
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix"><br>
                                                                <div class="col-lg-6 col-md-3 col-sm-4 col-xs-5 col-md-offset-6">
                                                                    <button type="submit" class="btn bg-blue waves-effect btn-sm col-md-6 col-sm-6 col-xs-6">
                                                                        <i class="material-icons">save </i>
                                                                        <span>Registrar</span>
                                                                    </button>
                                                                    <button type="button" id="cancelarSubModulo" class="btn bg-pink waves-effect btn-sm col-md-5 col-sm-6 col-xs-6 col-md-offset-1" onclick="javascript:cancelarform(true);">
                                                                        <i class="material-icons">cancel</i>
                                                                        <span>Cancelar</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- MODAL ACTUALIZAR SUB MODULOS -->
                                                    <div class="modal fade" id="updateSubModulos" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="defaultModalLabel">Editar Modulo Actual</h4>
                                                                    <button type="button" class="close" data-dismiss></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="form-horizontal" id="formupdateModulo" method="POST" >
                                                                        <div class="row clearfix">
                                                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                                <label for="updateDescorSubM">Desc. Corta</label>
                                                                            </div>
                                                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <input type="hidden" name="updateIdModuloSubM" id="updateIdModuloSubM" value="">
                                                                                        <input type="text" class="form-control" id="updateDescorSubM" name="updateDescorSubM" placeholder="Descripcion corta o Abreviatura" required value="">
                                                                                    </div>
                                                                                    <div class="help-info">Ejemplo: USU </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row clearfix">
                                                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                                <label for="updateDeslarSubM">Desc. Completa</label>
                                                                            </div>
                                                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <input type="text" class="form-control" id="updateDeslarSubM" name="updateDeslarSubM" placeholder="Descripcion Larga o Completa" required value="">
                                                                                    </div>
                                                                                    <div class="help-info">USUARIOS</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row clearfix">
                                                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                                <label for="updatelinkSubM">link</label>
                                                                            </div>
                                                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                                <div class="form-group form-float">
                                                                                    <div class="form-line">
                                                                                        <input type="text" class="form-control" id="updatelinkSubM" name="updatelinkSubM" placeholder="link o url" required value="">
                                                                                    </div>
                                                                                    <div class="help-info">ms_usuarios</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row clearfix">
                                                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                                <label for="updateIconoSubM">icono</label>
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                                                                <div class="form-group form-float">
                                                                                    <div class="form-line">
                                                                                        <input type="text" class="form-control" id="updateIconoSubM" name="updateIconoSubM" placeholder="Icono" required  value="">
                                                                                    </div>
                                                                                    <div class="help-info">book</div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                                <label for="updateOrdenSubM">Orden</label>
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                                                                <div class="form-group form-float">
                                                                                    <div class="form-line">
                                                                                        <input type="text" class="form-control" id="updateOrdenSubM" name="updateOrdenSubM" placeholder="Número de orden" required>
                                                                                    </div>
                                                                                    <div class="help-info">1</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row clearfix">
                                                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                                                                <label for="updateModSuperSubM">Modulo Superior</label>
                                                                            </div>
                                                                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <select class="form-control show-tick" id="updateModSuperSubM" name="updateModSuperM">
                                                                                            <option value="0">... Seleccione modulo superior...</option>';
                                                                                              <?php 
                                                                                                $combo1 = new  ModulosController();
                                                                                                $combo1 -> comboModulosSuper();
                                                                                            ?>
                                                                                        </select>
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
                                            <!-- END MODAL -->
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