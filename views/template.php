<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge, chrome=1">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>PORTAL WEB INSTITUTO ADDIS</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="views/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" href="views/plugins/alertify/css/alertify.css">

    <!-- Waves Effect Css -->
    <link href="views/plugins/node-waves/waves.css" rel="stylesheet" />
    
    <!-- Animation Css -->
    <link href="views/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Select Css (Para usar los select) -->
    <!--<link href="views/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />-->

    <!-- JQuery DataTable Css -->
    <link href="views/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- JQuery Nestable Css -->
    <link href="views/plugins/nestable/jquery-nestable.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="views/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!--Sweetalert css - Alertas Suaves -->
    <link href="views/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="views/css/style.css" rel="stylesheet">
    <link href="views/css/my-style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="views/css/main_login.css">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="views/css/themes/all-themes.css" rel="stylesheet" />

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head>

<body class="">
        
        <?php           

            $modules = new Template();

            $modules -> enlacesController();

         ?>

    <!-- Jquery Core Js -->
    <script src="views/plugins/jquery/jquery.min.js"></script>
    <script src="views/js/pages/charts/Chart.bundle.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->

    <script type="text/javascript" src="views/plugins/alertify/alertify.js"></script>

    <!-- Login -->
    <script type="text/javascript" src="views/js/main.js"></script>

    <!-- Menu panel izquierdo Js -->
    <script src="views/js/menuIzquierda.js"></script>

     <!-- Bootstrap Core Js -->
    <script src="views/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="views/plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="views/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

     <!-- Select Plugin Js -->
    <!--<script src="views/plugins/bootstrap-select/js/bootstrap-select.js"></script>-->
    
    <!-- Waves Effect Plugin Js -->
    <script src="views/plugins/node-waves/waves.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="views/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Flot Chart Plugins Js -->
    <script src="views/plugins/flot-charts/jquery.flot.js"></script>
    <script src="views/plugins/flot-charts/jquery.flot.pie.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="views/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="views/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="views/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="views/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="views/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="views/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="views/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="views/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="views/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="views/js/sweetalert.min.js"></script>

    <!-- Custom Js -->
    <script src="views/js/admin.js"></script>
    <script src="views/js/pages/forms/form-validation.js"></script>
    <script src="views/js/pages/tables/jquery-datatable.js"></script>
    <script src="views/js/pages/ui/dialogs.js"></script>
    <script src="views/js/pages/forms/basic-form-elements.js"></script> 

    <!-- Demo Js -->
    <script src="views/plugins/sweetalert/sweetalert.min.js"></script>

     <!-- Mostrar / ocultar frm Usuarios Js -->
    <script src="views/js/gestorUsuario.js"></script>
    <script src="views/js/gestorNotas.js"></script>
    <script src="views/js/gestorPerfiles.js"></script>
    <script src="views/js/gestorModulos.js"></script>
    <script src="views/js/gestorCarreras.js"></script>
    <script src="views/js/gestorCursos.js"></script>
    <script src="views/js/gestorInicio.js"></script>
    <script src="views/js/gestorConcepPagos.js"></script>
    <script src="views/js/gestorAsistencia.js"></script>
    <script src="views/js/gestorMiPerfil.js"></script>
    <script src="views/js/ma_perfilAlumno.js"></script>
    <script src="views/js/mn_recordNotas.js"></script>
    <script src="views/js/ma_perfilAlumno.js"></script>
    <script src="views/js/reporteMatricula.js"></script>

</body>

</html>
