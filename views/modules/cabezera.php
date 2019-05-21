 <div class="navbar" >
    <div class="container" >
        <div class="row clearfix header">
            <div class="col-xs-9 col-sm-5 col-md-5 col-lg-6 title-nav">
                <a href="#" class="btn-iconos">
                    <i class="material-icons font-20">more_vert</i>
                </a>
                <a href="inicio" class="perfil">
                        <?php   
                            $perfil = new panelIzquierdoController();
                            $perfil -> getPerfilesUserController(); 
                        ?>         
                </a>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2 col-lg-offset-2 iconos">
                <ul>
                    <li> <a role="button"> <i class="material-icons font-24">notifications</i></a></li>
                    <li><a  role="button"><i class="material-icons font-24">email</i></a></li>
                     <li><a href="salir"><i class="material-icons font-24">power_settings_new</i></a></li>
                </ul>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-3 col-lg-3 col-sm-2 col-md-2 col-lg-offset-2 " >
                <img src="views/images/login/logoAd.png" alt="Logo" class="img-responsive logo-header">
            </div>
        </div>
    </div>
</div>
