<!--=============================================================
    FORMULARIO DE INGRESO
#=============================================================-->

<div class="limiter">
        <div class="container-login100">
            <img class="logo" src="views/images/login/banner-login.png" alt="logo" width="65%">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post" >
                    <span class="login100-form-title p-b-5">
                        <img src="views/images/logo1.png" alt="" height="60" width="150">
                    </span>
                    <span class="login100-form-title p-b-30">
                        CAMPUS VIRTUAL DEL 
                        <p class="sub-title">INSTITUTO</p>
                    </span>
                    <div class="wrap-input100 validate-input">
                        <input type="text" class="input100" name="Usuario" required="">
                        <span class="focus-input100" data-placeholder="Usuario"></span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input type="text" class="input100" name="Password" required="">
                        <span class="focus-input100" data-placeholder="Contraseña"></span>
                    </div>
                    <?php 
                    $ingreso = new IngresoController();
                    $ingreso -> ingresoUsuarioController();
                    ?>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="btn-lg btn-primary btn-block" type="submit">Ingresar</button>
                        </div>
                    </div>
                    <br>
                    <div class="text-center p-t-30">
                        <span class="txt1">
                            TMLH
                        </span><br>
                        <span class="txt1">
                            2019 ® Derechos Reservados
                        </span>
                    </div>
                </form>
            </div>
        </div>

        <div class="ac_footer"">
            <a href="#">Olvide mi Contraseña</a>
        </div>

    </div>
