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
                          <div class="card" id="card_combos">
                            <div class="header">
                                <h2>MODULO DE ASISTRNCIA -<b> GESTIONAR ASISTENCIA DEL ALUMNOS</b></h2>
                            </div>
                            <div class="body">
                              <div class="row clearfix">
                                <div class="col-lg-8">
                                  <select class="form-control show-tick" id="selectCarreras">
                                    <option value="0">... Seleccione Carrera...</option>
                                      <?php
                                          $carrera = new UtilitiesController();
                                          $carrera -> selectCarrerasController();
                                      ?>
                                  </select>
                                  <input type="hidden" value="<?php echo $_SESSION["cod_usuario"] ?>" id="idUser">
                                </div>
                                <div class="col-lg-4">
                                  <select class="form-control show-tick" id="selectCiclos">
                                    <option value="0">... Seleccione Ciclo...</option>
                                    <?php
                                      $ciclo = new UtilitiesController();
                                       $ciclo -> selectCiclosController();
                                     ?>
                                  </select>
                                </div>
                                <div class="col-lg-4">
                                  <select class="form-control show-tick" id="selectSecciones" onchange="select_cursos();">
                                    <option value="0">... Seleccione Seccion...</option>
                                    <?php
                                      $seccion = new UtilitiesController();
                                      $seccion -> selectSeccionController();
                                     ?>
                                  </select>
                                </div>
                                <div class="col-lg-6" id="msCursos">
                                  <select class="form-control show-tick" id="cursos">
                                    <option value="0">... Seleccione Curso...</option>
                                  </select>
                                </div>
                                <div class="col-lg-2">
                                  <button class="btn btn-danger btn-sm" onclick="mostrar_AllAlumnos(true);"><i class="material-icons">search</i>VISUALIZAR</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card" id="muestraResultado">
                            <div class="header" >
                              <div class="col-lg-9" id="headerDocente">
                              </div>
                              <div class="col-lg-3 " style="margin-top: -8px;">
                                <button class="btn btn-success btn-visualizarAlumnos" type="button" data-toggle="modal"><i class="material-icons">add</i> Registrar Asistencia</button>
                              </div><br>
                            </div><br>
                            <div class="body" id="informacioDocente">
                            </div>
                            <hr>
                            <div class="body">
                              <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable text-center">
                                    <thead>
                                        <tr>
                                            <th>Cod. Alumno</th>
                                            <th>Nombre</th>
                                            <th>DNI</th>
                                            <th>Fecha</th>
                                            <th>Hra. Marcado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listaAlumnos">
                                    </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                          <!-- Modal Buscar Persona -->
                          <div class="modal fade" id="modalAlumnosAll" tabindex="-1" role="dialog">
                              <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                      <div class="modal-body">
                                          <div class="row clearfix">
                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <div class="body">
                                                      <div class="table-responsive" id="resultBuscarPersona">
                                                          <table class="table table-striped table-hover dataTablet">
                                                              <thead>
                                                                  <tr>
                                                                      <th>#</th>
                                                                      <th>Cod Alumno</th>
                                                                      <th>Nombre</th>
                                                                      <th>Dni</th>
                                                                      <th>Fecha</th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody id="listaAlumnosModal">
                                                                <tr>
                                                                  <td>
                                                                      <input type="checkbox" name="check" id="chk1" class="filled-in" value="1"/>
                                                                      <label for="chk1"></label>
                                                                  </td>
                                                                  <td>00154</td>
                                                                  <td>Altamirano Hoyos Kevin Ivan</td>
                                                                  <td>75821744</td>
                                                                  <td>25-10-20s19</td>
                                                                </tr>
                                                              </tbody>
                                                          </table>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn bg-pink" data-dismiss="modal">Cancelar</button>
                                              <button type="button" class="btn btn-success" data-dismiss="modal" onclick="insertarAsistencia();">Aceptar</button>
                                          </div>

                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- Modal Buscar Persona -->
                        </div>
                    </div>
                </div>
                <!--====  End of CONTENIDO DINAMICO  ====-->
        </div>
    </div>
</section>
