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
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <div class="col-md-7 col-sm-6">
                                        <h2>ESTADO DE CUENTA</h2>
                                    </div>
                                    <div class="col-md-5 col-sm-6">
                                        <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5">
                                            <label for="nomApell">PERIODO</label>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8 " style="margin-top: -5px;">
                                            <select class="form-control show-tick" id="idCicloAlumno" >
                                                <?php
                                                    $ciclo = new MisCursosController();
                                                    $ciclo->getCiclosAlumnoController();
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="body">
                                    <div class="table-responsive" id="listCuentasALumnos">
                                        <table class="table table-striped table-hover js-basic-example dataTable">
                                            
                                        </table>
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