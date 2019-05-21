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

                <div class="col-md-9 col-lg-9">
                	<div class="row clearfix">
                      	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <!--========================================
                          =            Bolque de selects             =
                          =========================================-->
                          <div class="card" id="card_combos">
                            <div class="header">
                                <h2>MODULO DE NOTAS -<b> GESTIONAR NOTAS DEL ALUMNO</b></h2>
                            </div>
                            <div class="body">
                              <div class="row clearfix">
                                <div class="col-lg-8">
                                    <!--<input type="hidden" value="<?php #echo $_SESSION["cod_usuario"]?>" id="idUser">-->
                                  <select class="form-control show-tick" id="selectCarreras">
                                    <option>... Seleccione Carrera...</option>
                                    <?php 
                                       $carrera = new gestorNotasController();
                                       $carrera -> getCarrerasController();
                                     ?>
                                  </select>
                                  <input type="hidden" value="<?php echo $_SESSION["cod_usuario"] ?>" id="idUser"> 
                                </div>
                                <div class="col-lg-4" id="selectCiclos">
                                  <!--<select class="form-control show-tick" id="selectCiclos">
                                    <option>... Seleccione Ciclo...</option>
                                    <?php 
                                       /*$ciclo = new NotasAlumnoController();
                                       $ciclo -> getAllCiclosController();*/
                                     ?>
                                  </select>-->
                                </div>
                                <div class="col-lg-4">
                                  <select class="form-control show-tick" id="selectSecciones" onchange="select_curso();">
                                    <option value="0"> ... Seleccione Seccion...</option>
                                    <?php 
                                      /*$seccion = new gestorNotasController();
                                      $seccion -> getSeccionController();*/
                                     ?>
                                  </select>
                                </div>
                                <div class="col-lg-6" id="sCursos">
                                  <select class="form-control show-tick" id="selectCursos">
                                    <option value="1">... Seleccione Curso...</option>
                                  </select>
                                </div>
                                <div class="col-lg-2">
                                  <button class="btn btn-danger btn-sm" onclick="mostrar_RegistroAlumnos();"><i class="material-icons">search</i>VISUALIZAR</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--====  End of Bolque de selects   ====-->
                          
                      		<!--=====================================
                          =            Bloque de registro de notas           =
                          ======================================-->
                          <div id="Listado_alumnos"   style="display: none;">
                            <div class="card" id="head_alumnos">
                                <!-- CONTENIDO DE SECCION-->
                            </div>
                          </div>  

                          <!--=====================================
                          =            Formulario de insercion de notas          =
                          ======================================-->
                          <div class="card" id="frm_registrarNotas" style="display: none;">
                            <div id="frmCrearUsuarios">
                                <div class="header">
                                        <h2> REGISTRAR NUEVA NOTA </h2>
                                </div>
                                <div class="body">
                                    <form class="form-horizontal" id="formInsertNotas">
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="nomApell">Nombre y Ape.</label>
                                                </div>
                                                <div class="col-lg-6 col-md-5 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="inAlumno" class="form-control" name="nombre" disabled="" placeholder="Nombres y Apellidos del Alumno">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="nroCip">DNI</label>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="nroDni" class="form-control" name="nroDni" disabled="" placeholder="Numero de DNI">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="nombUsuario">Curso</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="inCurso" class="form-control" placeholder="Nombre del Curso" required disabled="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="nombUsuario">Ciclo</label>
                                                </div>
                                                <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="inCiclo" class="form-control" name="" placeholder="Ciclo que cursa" required disabled="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="contraseña">Descripcion Nota</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                     <div class="form-group">
                                                            <select class="form-control show-tick" id="tNota" name="tNota">
                                                                <option value="0">... Seleccione Capacidad...</option>
                                                                <?php 
                                                                   $tNota = new gestorNotasController();
                                                                   $tNota -> getTnotasController();
                                                                 ?>
                                                            </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="correoinst">Nota</label>
                                                </div>
                                                <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="" id="inNota" placeholder="Nota en numeros" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="correoinst">Porcentaje</label>
                                                </div>
                                                <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="" id="inPorcentNota" placeholder="Porcentaje al cual equivale la nota" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix"><br>
                                                <div class="col-lg-6 col-md-3 col-sm-4 col-xs-5 col-md-offset-7">
                                                    <button type="button" class="btn bg-blue waves-effect btn-sm col-md-4 col-sm-6 col-xs-6" onclick="insertNotas();">
                                                        <i class="material-icons">save </i>
                                                        <span>Registrar</span>
                                                    </button>
                                                    <button type="button" id="btnCancelarNotas" class="btn bg-pink waves-effect btn-sm col-md-4 col-sm-6 col-xs-6 col-md-offset-1">
                                                        <i class="material-icons">cancel</i>
                                                        <span>Cancelar</span>
                                                    </button>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                          </div>

                          <!--=====================================
                          =            Registro de notas de los Alumnos        =
                          ======================================-->    
                          <div class="card" id="registroNotasAlumnos" style="display: none">
                              <div class="header">
                                  <div class="col-lg-9">
                                   <h2>COMPUTACION E INFORMATICA</h2>
                                  </div>
                                  <div class="col-lg-3 " style="margin-top: -8px;">
                                    <button class="btn btn-success" id="btnAgregarNotas" onclick="btnAgregarNotas(true);"><i class="material-icons">add</i> Agregar Nota</button>
                                    <button class="btn btn-primary" id="volverNotas"><i class="material-icons">reply</i></button>
                                  </div><br>
                              </div>
                              <div class="body">
                                <div class="row clearfix">
                                  <div class="table-responsive align-center" style="margin-bottom: -30px;" id="listadoNotasAlum">
                                    
                                            <!-- Get Notas Alumnos -->
                                    
                                  </div>
                                </div>
                              </div>        
                          </div>
                           
                          <!--====  End Bloque de registro de notas  ====-->

                          <!--=============================================
                          =            Modal para editar notas            =
                          ==============================================-->
                          
                          <div id="modalEditar" class="modal fade" tabindex="-1" role="dialog" style="text-align:left;">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">   
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title" id="defaultModalLabel">Editar Notas</h4>                
                                </div>
                                <div class="modal-body">
                                  <form class="form-horizontal" id="formUpdateNotas">
                                      <div class="row clearfix">
                                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                              <label for="nomApell">Nombre y Ape.</label>
                                          </div>
                                          <div class="col-lg-6 col-md-5 col-sm-8 col-xs-7">
                                              <div class="form-group">
                                                  <div class="form-line">                                    
                                                      <input type="text" id="upAlumno" class="form-control" name="" disabled placeholder="Nombres y Apellidos del Alumno">
                                                      <input type="text" id="upIdNota" class="form-control" name="" disabled placeholder="Nombres y Apellidos del Alumno">
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                              <label for="nroCip">DNI</label>
                                          </div>
                                          <div class="col-lg-3 col-md-3 col-sm-8 col-xs-7">
                                              <div class="form-group">
                                                  <div class="form-line">
                                                      <input type="text" id="nroDni" class="form-control" name="nroDni" disabled="" placeholder="Numero de DNI">
                                                  </div>
                                              </div>
                                          </div>
                                      </div><br>
                                      <div class="row clearfix">
                                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                              <label for="">Curso</label>
                                          </div>
                                          <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                              <div class="form-group">
                                                  <div class="form-line">
                                                      <input type="text" id="upCurso" class="form-control" placeholder="Nombre del Curso" required disabled>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                              <label for="">Ciclo</label>
                                          </div>
                                          <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                              <div class="form-group">
                                                  <div class="form-line">
                                                      <input type="text" id="upCiclo" class="form-control" name="" placeholder="Ciclo" required disabled>
                                                  </div>
                                              </div>
                                          </div>
                                      </div><br>
                                      <div class="row clearfix">
                                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                              <label for="">Descripcion Nota</label>
                                          </div>
                                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                              <select class="form-control show-tick" id="tNotaUp" name="tNotaUp">
                                                  <option value="0">... Seleccione Capacidad...</option>
                                                  <?php 
                                                     $tNota = new gestorNotasController();
                                                     $tNota -> getTnotasController();
                                                   ?>
                                              </select>
                                            </div>
                                          </div>
                                      </div><br>
                                      <div class="row clearfix">
                                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                              <label for="">Nota</label>
                                          </div>
                                          <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                              <div class="form-group form-float">
                                                  <div class="form-line">
                                                      <input type="text" class="form-control" name="" id="upNota" placeholder="Nota" required>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                              <label for="">Porcentaje</label>
                                          </div>
                                          <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                              <div class="form-group form-float">
                                                  <div class="form-line">
                                                      <input type="text" class="form-control" name="" id="upPorcentNota" placeholder="Porcentaje de nota" required>
                                                  </div>
                                              </div>
                                          </div>
                                      </div><br>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-primary waves-effect" onclick="updateNotas();"><i class="material-icons">save</i><span>GUARDAR CAMBIOS</span></button>
                                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><i class="material-icons">cancel</i><span>CERRAR</span></button>
                                      </div>
                                  </form>
                                </div>            
                              </div>
                            </div>
                          </div>
                          
                          <!--====  End of Modal para editar notas  ====-->
                          

                      	</div>
                  	</div>
                </div>

              <!--====  End of CONTENIDO DINAMICO  ====-->
                
            </div>
        </div>
    </section>