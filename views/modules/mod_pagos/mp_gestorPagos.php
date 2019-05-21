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

                <div class="col-lg-9">
                    <div class="row ">
                        <!-- #END# IMAGEN DE BIENVENIDA -->

                        <!-- START TABLA CURSOS -->
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12" id="tablaPagos">
                            <div class="card">
                                <div class="header">
                                    <h2>ADMINISTRACIÓN DE PAGOS  2019 (Matricula, Pensión, Inscripción)</h2>
                                    <button type="button" class="header-dropdown m-r--5 btn waves-effect bg-green" onclick="mostrarForm(true);">AGREGAR CUENTA</button>
                                </div>
                            <div class="body">
                               <div class="row clearfix">
                                    <div class="col-lg-5 col-md-4 col-sm-8 col-xs-4">
                                        <div class="form-group">
                                                <select class="form-control show-tick" id="tipoModuloAsig" name="tipoPerfil">
                                                    <option value="0">Carreras...</option>
                                                    <?php 
                                                        $carreras = new UtilitiesController();
                                                        $carreras -> selectCarrerasController();
                                                     ?>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-4">
                                        <div class="form-group">
                                                <select class="form-control show-tick" id="tipoModuloAsig" name="tipoPerfil">
                                                    <option value="0">Ciclos...</option>
                                                    <?php 
                                                        $ciclos = new UtilitiesController();
                                                        $ciclos -> selectCiclosController();
                                                     ?>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-8 col-xs-4">
                                        <div class="form-group">
                                                <select class="form-control show-tick" id="tipoModuloAsig" name="tipoPerfil">
                                                    <option value="0">Secciones...</option>
                                                    <?php 
                                                        $ciclos = new UtilitiesController();
                                                        $ciclos -> selectSeccionController();
                                                     ?>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label>Filtrar por datos del alumno:</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                             <div class="form-line">
                                                <input type="text" id="buscarDatosAlumno" class="form-control" placeholder="Digite nombre, apellidos, dni del alumno a buscar">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead style="height: 70px;" class="bg-indigo">
                                            <tr >
                                                <th style="padding-bottom: 20px;">Nombres y Apellidos</th>
                                                <th style="padding-bottom: 20px;">Carrera</th>
                                                <th style="padding-bottom: 20px;">Ciclo</th>
                                                <th style="padding-bottom: 20px;">Seccion</th>
                                                <th style="padding-bottom: 20px; text-align: center;">Concepto</th>
                                                <th style="padding-bottom: 20px;">Monto Deuda</th>
                                                <th style="padding-bottom: 20px;">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $r = new GestorPagosController();
                                            $r -> listarPagosController();
                                            $r -> deletePagosController();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END TABLA CURSOS -->

                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12" id="formularioPagos">
                    <div class="card">
                        <div class="header">
                            <h2>
                                REGISTRAR PAGOS
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post" enctype="multipart/form-data">
                                <label for="password">id Cuenta</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="regitroCuenta" class="form-control show-tick">
                                            <option>-- Seleccionar --</option>
                                            <option value="1">Activo</option>
                                        </select>
                                    </div>
                                </div>

                                <label for="email_address">Monto Pagado</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="registroMonto" id="email_address" class="form-control" placeholder="Ingrese el monto Pagado">
                                    </div>
                                </div>
                                <label for="password">Monto Deuda</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="registroDeuda" id="password" class="form-control" placeholder="Deuda">
                                    </div>
                                </div>

                                <label for="password">Nro Boleta</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="registroBoleta" id="password" class="form-control" placeholder="Nro de Boleta">
                                    </div>
                                </div>

                                <label for="password">Dni</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="registroDni" id="password" class="form-control" placeholder="Ingrese Dni">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">GUARDAR</button>
                                <button type="button" class="btn btn-danger m-t-15 waves-effect" onclick="cancelarForm(true);">CANCELAR</button><br>
                                <br>
                            </form>

                            <?php
                            $pagos = new GestorPagosController();
                            $pagos -> guardarNotasController();
                            $pagos -> editarPagosController();
                            ?>
                        </div>
                    </div>
                </div>

                    </div>
                </div>

                <!--====  End of CONTENIDO DINAMICO  ====-->

            </div>
        </div>
    </section>
