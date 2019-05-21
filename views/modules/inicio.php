<?php

    session_start();

    if (!$_SESSION["validar"]){

        header ("location: ingreso");

        exit();

    }

    /*======================================
    =            PAGE PRELOADER            =
    ======================================*/
    
    // include "cargando.php";
    
    /*=====  End of PAGE PRELOADER  ======*/

    /*=============================================
    =            CABEZERA DEL PORTAL            =
    =============================================*/

    include "cabezera.php";
    
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
                
                <?php  include   "panel-Izquierdo.php";    ?>
                
                <!--====  End of PANEL IZQUIERDO  ====-->               

                <!--========================================
                =            CONTENIDO DINAMICO            =
                =========================================-->
                
                <div class="col-lg-9 col-md-9">
                    <div class="row ">
                        <!-- START IMAGEN DE BIENVENIDA -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <!-- <div class="card">
                                 <img src="views/images/img-inicio.jpg" alt="Imagen de Entrada" class="js-animating-object img-responsive">
                            </div> -->
                            <div class="card">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <!-- <img src="views/images/img-inicio.jpg" /> -->
                                        <?php 
                                            $imagen = new gestorInicioController();
                                            $imagen ->  mostrarImagenInicioController();
                                        ?>
                                        <!-- <div class="carousel-caption" style="margin-bottom: -40px; background: rgba(0, 0, 0, .4);">
                                            <h3>First slide label</h3>
                                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                        </div> -->
                                    </div>
                            </div>
                            </div>
                        </div>
                        <!-- #END# IMAGEN DE BIENVENIDA -->

                        <!-- START TABLA CURSOS -->
                        <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <h2>CURSOS MATRICULADOS 2018 - CICLO V AGOSTO</h2>
                                </div>
                                <div class="body table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead style="height: 70px;" class="bg-purple">
                                            <tr >
                                                <th style="padding-bottom: 20px;">Curso</th>
                                                <th style="padding-bottom: 20px;">Docente</th>
                                                <th style="padding-bottom: 20px;">Horas Seman</th>
                                                <th style="padding-bottom: 20px;">Créditos</th>
                                                <th style="padding-bottom: 20px;">Inasist...</th>
                                                <th style="padding-bottom: 20px;">Ult. Nota</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <th scope="">Taller de Programación Web</th>
                                                    <td>Manrique Fernandez Gustavo</td>
                                                    <td>6 hrs</td>
                                                    <td>4 crts</td>
                                                    <td>20%</td>
                                                    <td>18</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Logica de Programación</th>
                                                    <td>Beltran Puma Caña</td>
                                                    <td>4 hrs</td>
                                                    <td>3 crts</td>
                                                    <td>10%</td>
                                                    <td>18</td>
                                                </tr>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                       </div> -->
                        <!-- END TABLA CURSOS -->
                    </div>
                </div>
                
                <!--====  End of CONTENIDO DINAMICO  ====-->
                
            </div>
        </div>
    </section>