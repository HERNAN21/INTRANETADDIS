<div class="card">
    <div class="clearfix m-b-20">
        <div class="dd menu">
            <ul class="dd-list">
                <li class="header text-center">
                    <h2>MIS FORMATOS</h2>
                </li>
                <li>
                    <a href="inicio"><i class="material-icons icono izquierda">home</i>Inicio</a>
                </li>
                <!-- Menu Lateral izquierdo -->  
                <?php
                    $menu = new panelIzquierdoController();
                    $menu->getModulosController();
                ?> 
            </ul>
        </div>
    </div>
</div>