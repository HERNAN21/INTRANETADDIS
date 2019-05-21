<?php

require_once "models/enlaces.php";
require_once "models/panel_Izquierdo.php";
require_once "models/ingreso.php";
require_once "models/mn_misCursos.php";
require_once "models/mn_gestorNotas.php";
require_once "models/ms_gestorPerfiles.php";
require_once "models/ms_gestorModulosPerfiles.php";
require_once "models/ms_gestorModulos.php";
require_once "models/ms_gestorUsuarios.php";
require_once "models/ms_gestorPerfilesUsuarios.php";
require_once "models/ma_gestorProgramAcademicos.php";
require_once "models/ma_gestorCursos.php";
require_once "models/ma_gestorCiclos.php";
require_once "models/ma_gestorSemestres.php";
require_once "models/ma_gestorSecciones.php";
require_once "models/ms_gestorCarrerasCursos.php";
require_once "models/ma_gestorCursosCiclos.php";
require_once "models/mc_gestorInicio.php";
require_once "models/mp_gestorConceptoPagos.php";
require_once "models/mp_gestorPagos.php";
require_once "models/utilities.php";
require_once "models/ma_gestorAsistencia.php";
require_once "models/mc_gestorMiPerfil.php";

require_once "controllers/template.php";
require_once "controllers/panel_Izquierdo.php";
require_once "controllers/ingreso.php";
require_once "controllers/mn_misCursos.php";
require_once "controllers/mn_gestorNotas.php";
require_once "controllers/ms_gestorPerfiles.php";
require_once "controllers/ms_gestorModulosPerfiles.php";
require_once "controllers/ms_gestorModulos.php";
require_once "controllers/ms_gestorUsuarios.php";
require_once "controllers/ms_gestorPerfilesUsuarios.php";
require_once "controllers/ma_gestorProgramAcademicos.php";
require_once "controllers/ma_gestorCursos.php";
require_once "controllers/ma_gestorCiclos.php";
require_once "controllers/ma_gestorSemestres.php";
require_once "controllers/ma_gestorSecciones.php";
require_once "controllers/ms_gestorCarrerasCursos.php";
require_once "controllers/ma_gestorCursosCiclos.php";
require_once "controllers/mc_gestorInicio.php";
require_once "controllers/mp_gestorConceptoPagos.php";
require_once "controllers/mp_gestorPagos.php";
require_once "controllers/utilities.php";
require_once "controllers/ma_gestorAsistencia.php";
require_once "controllers/mc_gestorMiPerfil.php";


$template = new Template();
$template->getTemplateController();
