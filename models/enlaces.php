<?php

class EnlacesModel
{

    public function enlacesTemplateModel($enlacesModel)
    {

        if( $enlacesModel == "ingreso" || $enlacesModel == "inicio"  || $enlacesModel == "miPerfil"){

        	$module = "views/modules/".$enlacesModel.".php";

        }elseif( $enlacesModel == "mn_gestorNotas" || $enlacesModel == "mn_misCursos" || $enlacesModel == "mn_recordNotas"){

            $module = "views/modules/mod_notas/".$enlacesModel.".php";

        }elseif( $enlacesModel == "ma_gestorAsistencia"){

            $module = "views/modules/mod_asistencia/".$enlacesModel.".php";

        }elseif($enlacesModel == "ms_usuarios" || $enlacesModel == "ms_perfiles" || $enlacesModel == "ms_modulos"){

            $module = "views/modules/mod_seguridad/".$enlacesModel.".php";

        }elseif($enlacesModel == "ma_gestorProgAcademicos" || $enlacesModel == "ma_gestorCursos" || $enlacesModel == "ma_gestorCiclos" || $enlacesModel == "ma_gestorSecciones" || $enlacesModel == "ma_gestorSemestres"){

            $module = "views/modules/mod_academico/".$enlacesModel.".php";

        }elseif($enlacesModel == "mc_gestorInicio" || $enlacesModel == "mc_miPerfil"){

            $module =  "views/modules/mod_configuracion/".$enlacesModel.".php";

        }elseif($enlacesModel == "mp_gestorConceptos" || $enlacesModel == "mp_gestorPagos" || $enlacesModel == "mp_misPagos"){

            $module =  "views/modules/mod_pagos/".$enlacesModel.".php";

        }else if($enlacesModel=='mm_gestorMatricula'){
            $module =  "views/modules/mod_matricula/".$enlacesModel.".php";        
        }elseif ( $enlacesModel == "index"){

        	$module = "views/modules/ingreso.php";

        }else{

            $module = "views/modules/ingreso.php";

        }

        return $module;

    }

}
