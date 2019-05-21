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

                <div class="col-md-12 col-lg-9 card">
                    <div class="header">
                        <h2>
                            CONFIGURACIÓN DE IMAGENES DE INICIO
                        </h2>
                        <button class="btn btn-primary" id="showformInsertarImagen"><i class="material-icons">add</i><span>Agregar Imagen</span></button> 
                    </div>
                    <div class="body">
                        <div class="row clearfix" id="formInsertarImagen" style="display: none;">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                                <div style="border: 1px solid #dddddd; padding: 20px;">
                                    <form  class="form-horizontal" method="POST" enctype="multipart/form-data" id="formInicio">
                                        <div class="row clearfix">
                                             <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="tituloInicio">Título</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="tituloInicio" name="tituloInicio" placeholder="  Escriba aqui el título de la imagen" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                             <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="descripciónInicio">Descripción</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <textarea class="form-control" id="descripciónInicio" name="descripciónInicio" placeholder="  Escriba aqui la descripción de la imagen" required rows="2"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                             <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="perfilInicio">Tipo de Perfil</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <select class="form-control show-tick" id="perfilInicio" name="perfilInicio">
                                                        <option value="0">... Seleccione el tipo de perfil...</option>
                                                        <?php 
                                                            $select = new gestorInicioController();
                                                            $select -> viewSelectPerfiles();
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-6 col-md-12">
                                                    <div class="caption text-center"><br>
                                                        <input type="file" class="btn btn-default" id="subirImagenInicio" style="display:inline-block; margin:10px 0" name="imagen"><br>
                                                        <p style="display:inline-block; margin:10px 0" >tamaño recomendado de la imagen: 1600px * 750px, peso máximo 2MB</p>
                                                    </div>
                                                <div class="text-center" id="mostrarImagenInicio">
                                                   <!--  <img src="views\images\img-usuarios\usuario.jpg" style="width: 200px; height: 100px; border: solid #fff 1px;" > -->
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success text-center" style="display: inline-block;"><i class="material-icons">save</i><span>Guardar registro</span></button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php 
                                        $insert = new gestorInicioController();
                                        $insert -> insertInicioController();
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                                <div class="header">
                                    <ul>
                                        <button class="btn bg-indigo btn-xs header-dropdown m-r-30"><i class="material-icons">edit</i></button>
                                        <button class="btn bg-red btn-xs header-dropdown m-r--5"><i class="material-icons">delete</i></button>
                                    </ul>
                                </div>
                                <div class="body">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="javascript:void(0);">
                                                <img class="media-object" src="http://placehold.it/64x64" width="150" height="80">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">Media heading <strong> &nbsp; &nbsp; - &nbsp; &nbsp; ADMINISTRADOR</strong></h4> 
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                            ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra
                                            turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                                            in faucibus.
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <?php 
                                $view = new gestorInicioController();
                                $view -> viewImagenesInicioController();
                                $view -> deleteArchivoContoller();
                                $view -> editarArchivoInicioController();
                            ?>
                        </div>
                        <!-- <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                                <div class="header">
                                    <ul>
                                        <button class="btn bg-blue header-dropdown m-r--15"><i class="material-icons">save</i><span>Guardar Cambios</span></button>
                                    </ul>
                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                            <input type="file" style="display:none" id="subirNuevaFoto">
                                                <div style="display: inline-block;">
                                                    <img class="media-object" src="http://placehold.it/64x64" width="250" height="130">
                                                </div>
                                                    <button class="bg-red btn-sm btn cambiarImagen" style="margin-top: -10%; margin-right: -95%;"><i class="material-icons">delete</i></button>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 form-control-label">
                                                    <label for="insertTituloIni">Título</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" id="insertTituloIni" name="insertTituloIni" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 form-control-label">
                                                    <label for="inertDescorM">Perfil</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-7">
                                                    <div class="form-group">
                                                        <select class="form-control show-tick" id="inertModSuperSubM" name="inertModSuperSubM">
                                                            <option value="0">... Seleccione el tipo de perfil...</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="row clearfix">
                                                <div class="col-xs-2 form-control-label">
                                                    <label for="inertDescorM">Descripción</label>
                                                </div>
                                                <div class="col-xs-10">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <textarea class="form-control" id="inertDescorM" name="inertDescorM" required rows="2"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!--====  End of CONTENIDO DINAMICO  ====-->
                
            </div>
        </div>
    </section>