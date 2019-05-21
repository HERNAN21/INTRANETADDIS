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
                <div class="col-md-12 col-lg-9 ">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ACTUALIZA TUS DATOS
                                <small>Para mejorar la seguridad de tus datos, manten tus datos actualizados...!</small>
                            </h2>
                        </div>
                    </div>
                    <div class="body">
                        <div class="card">
                            <div class="header">
                                <h2 style="color: #24a8e7">
                                    INFORMACIÓN PERSONAL
                                    <small>mis datos actuales</small>
                                </h2>
                            </div>
                            <div class="header">
                                <div class="row clearfix">
                                    <div class="col-lg-1 col-md-1 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nroCip">DNI</label>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <input type="text" id="showDni" class="form-control" value="<?php echo $_SESSION["dni"]; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nomApell">NOMBRES</label>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <input type="text" id="showNomApell" class="form-control" value="<?php echo $_SESSION["nombres"] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nomApell">APELLIDOS</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <input type="text" id="showUsuario" class="form-control" value="<?php echo $_SESSION["apePaterno"] .' ' . $_SESSION["apeMaterno"] ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h2 style="color: #76c802">
                                    MI FOTO ACTUAL
                                </h2>
                            </div>
                            <div class="header">
                                <div class="row clearfix">
                                    <form method="POST" id="formCambiarImagen" enctype="multipart/form-data">
                                        <div class="col-lg-5 col-md-5 col-sm-8 col-xs-7">
                                            <div class="card">
                                                <div class="carousel-inner" role="listbox">
                                                    <div class="item active text-center" id="imagenUsuario">
                                                        <img src="<?php echo $_SESSION['foto_usuario']; ?>" id="imagenUsuario" style="display: inline-block;">
                                                        <input type="hidden" value="<?php echo $_SESSION['foto_usuario']; ?>" name="fotoUsuarioAntigua">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-8 col-xs-7">
                                            <div class="row clearfix">
                                                <div class="col-lg-9 text-center">
                                                    <button type="button" class="btn bg-green btn-sm" style="display: inline-block;" id="btn-editarImagen">Click aqui, para cambiar la imagen <i class="material-icons"> edit</i></button>
                                                    <input type="file" class="btn btn-default" style="width: 100%; display: none;" id="actNuevaFotoUsuario">
                                                </div>
                                                <div class="col-lg-2">
                                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                                </div>
                                            </div><br><br><br>
                                            <div class="row clearfix">
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="header bg-blue-grey">
                                                            <h2>
                                                                Ten en cuenta...!
                                                            </h2>
                                                        </div>
                                                        <div class="body">
                                                            <ul>
                                                                <li>El tamaño de la foto no debe superar los 200 KB.</li>
                                                                <li>Solamente se aceptan archivos en formato (JPG, PNG).</li>
                                                                <li>El tamaño recomendado de la imagen es 400px * 400px.</li>
                                                                <li>Tu rostro debe ser legible.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php 
                                        $foto = new GestorMiPerfilController();
                                        $foto -> guardarFotoUsuarioController(); 
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h2 style="color: #e34d52">
                                    MODIFICAR CONTRASEÑA
                                </h2>
                            </div>
                            <div class="body">
                                <form action="POST">
                                    <div class="row clearfix text-center">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                            <label for="nroCip">Contraseña Actual</label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="passwordActual" class="form-control" id="passwordActual">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                            <label for="nomApell">Nueva Contraseña</label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="passwordNueva" class="form-control" id="passwordNueva">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg" style="display: inline-block;">Actualizar Contraseña</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--====  End of CONTENIDO DINAMICO  ====-->
                
            </div>
        </div>
    </section>