<?php 

class panelIzquierdoController{

# DATOS DEL USUARIO
	#---------------------------------------------------------------------------------------
    public function getDatosUserController()
    {

        $cod_usuario = $_SESSION["cod_usuario"];

        $respuesta = panelIzquierdoModel::getDatosUserModel($cod_usuario, "persona");

        $_SESSION["nombres"] = $respuesta["nombre"];
        $_SESSION["apePaterno"] = $respuesta["aPaterno"];
        $_SESSION["apeMaterno"] = $respuesta["aMaterno"];
        $_SESSION["dni"] = $respuesta["dni"];

        echo '
            <h5>' . $respuesta["nombre"] . '</h5>
            <h5>' . $respuesta["aPaterno"] . "&nbsp " . $respuesta["aMaterno"] . '</h5>
            <h5>' . $respuesta["dni"] . '</h5>
        ';

    }


#PERFIL DEL USUARIO LOGEADO
    #-------------------------------------------------------------------
    public function getPerfilesUserController(){

        $cod_usuarios = $_SESSION["cod_usuario"];

        $respuesta = panelIzquierdoModel::getDatUserModel($cod_usuarios, "perfiles");

        echo  'PORTAL DEL '.$respuesta["deslar"];

        $_SESSION["codPerfil"] = $respuesta["id_perfil"];

    }


#MENU LATERAL IZQUIERDO
    #--------------------------------------------------------------------
	public function getModulosController(){

        $cod_usuario = $_SESSION["cod_usuario"];

        $respuesta = panelIzquierdoModel::getModulosMenuModel($cod_usuario, "modulos");

        $rptSubModulos = panelIzquierdoModel::getSubModulosMenuModel("modulos");

        foreach ($respuesta as $row => $item) {

             if( $item{"link"} != ""){
                echo '
                    <li>
                        <a href=" '.$item["link"].' "><i class="material-icons icono izquierda">' . $item["icono"] . '</i>  ' . $item["deslar"] . '
                        </a>
                    </li>
                 ';
            }else{
                echo '
                     <li>
                        <a href="#"><i class="material-icons icono izquierda">' . $item["icono"] . ' </i>' . $item["deslar"] . '<i class="material-icons icono derecha">expand_more</i>
                        </a>';

                        foreach ($rptSubModulos as $rowchild => $itemchild){

                            if($itemchild["mod_super"] == $item["id_modulo"]){
                                    echo '
                                        <ul>
                                            <li style="margin-left: 40px;">
                                                <a href=" '.$itemchild["link"].' "> <i class="icono izquierda material-icons">' . $itemchild["icono"] . ' </i> ' . $itemchild["deslar"] . ' </a>
                                            <li>
                                        </ul>
                                    '   ;
                            }

                        }

                echo '</li>';
            }
        }
    }


}


