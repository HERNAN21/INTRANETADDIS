<div class="card">
    <div class="header text-center">
        <h2>MI PERFIL</h2>
        <ul class=" header-dropdown m-r--5">
            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                </a>
                <ul class="dropdown-menu pull-right">
                    <li><a href="mc_miPerfil">My perfil</a></li>
                    <li><a href="miPerfil">Mis Publiaciones</a></li>
                    <li><a href="salir">Cerrar Sesion</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="body">
        <div class="thumbnail" style="padding: 8px 40px; border: none;">
            <img src="<?php echo $_SESSION['foto_usuario']; ?>" alt="Foto Usuario">
        </div>
        <div class="" style="text-align: center;">
            <p style="font-size: 16px; margin-bottom: 20px;">Te damos la bienvenida.</p>
            <!-- DATOS DEL USUARIO -->
            <?php
                $datosUser = new panelIzquierdoController();
                $datosUser->getDatosUserController();
             ?>
             <input type="hidden" id="idUser" value="<?php echo $_SESSION["cod_usuario"]?>">
        </div>
    </div>
</div>