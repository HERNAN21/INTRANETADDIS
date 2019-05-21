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

                <div class="col-lg-9">
                    <div class="row ">
                        <!-- #END# IMAGEN DE BIENVENIDA -->

                        <!-- START TABLA CURSOS -->
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12" id="tablaPagos">
                            <div class="card">
                                <div class="header">
                                    <h2><!-- <?php #echo $_SESSION["cod_usuario"]; ?> --></h2>
                                    <h2>CONCEPTO DE PAGOS 2019</h2>
                                    <button type="button" class="btn bg-pink m-t-15 waves-effect" onclick="mostrarForm(true);">AGREGAR CONCEPTO DE PAGOS</button>
                                </div>
                                <div class="body table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead style="height: 70px;" class="bg-purple">
                                            <tr >
                                                <th style="padding-bottom: 20px;">Concepto</th>
                                                <th style="padding-bottom: 20px; text-align: center;">Monto Pago</th>
                                                <th style="padding-bottom: 20px; text-align: center;">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $r = new ConceptoPagosController();
                                            $r -> listarConceptoPagosController();
                                            $r -> borrarConceptoController();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                       </div>
                        <!-- END TABLA CURSOS -->


                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12" id="formularioConcepto">
                    <div class="card">
                        <div class="header">
                            <h2>
                                CONCEPTO DE PAGOS
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post" enctype="multipart/form-data">

                                <label for="email_address">Concepto</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="registroConcepto" id="email_address" class="form-control" placeholder="Ejemplo / matricula">
                                    </div>
                                </div>
                                <label for="password">Monto</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="registroMontos" id="password" class="form-control" placeholder="Ejemplo / 200.00">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">GUARDAR</button>
                                <button type="button" class="btn btn-danger m-t-15 waves-effect" onclick="cancelarForm(true);">CANCELAR</button><br>
                                <br>
                            </form>
                            <?php
                            $pagos = new ConceptoPagosController();
                            $pagos -> insertarConceptoController();
                            $pagos -> editarConceptoController();
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
