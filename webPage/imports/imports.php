<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="/consolidacion/webPage/plantilla/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/consolidacion/webPage/plantilla/assets/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/consolidacion/webPage/plantilla/assets/bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="/consolidacion/webPage/plantilla/assets/css/datatable.css">
<link rel="stylesheet" href="/consolidacion/webPage/plantilla/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<link rel="stylesheet" href="/consolidacion/webPage/plantilla/assets/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="/consolidacion/webPage/plantilla/assets/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/consolidacion/webPage/plantilla/alertifyjs/css/alertify.min.css">
<link rel="stylesheet" href="/consolidacion/webPage/plantilla/alertifyjs/css/themes/semantic.css">
<link rel="stylesheet" href="/consolidacion/webPage/plantilla/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="/consolidacion/webPage/plantilla/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="/consolidacion/webPage/plantilla/assets/bower_components/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="/consolidacion/webPage/plantilla/assets/css/ui.css">
<link rel="stylesheet" href="/consolidacion/webPage/plantilla/liberias/css/jquery.auto-complete.css">
<link rel="stylesheet" type="text/css" href="/consolidacion/webPage/plantilla/menu/css/jquery.classycontextmenu.min.css" />
<link href="/consolidacion/webPage/plantilla/Css/select2-utl.css" rel="stylesheet" type="text/css"/>

<!--============================== JS ============================-->
<script src="/consolidacion/webPage/plantilla/assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/consolidacion/webPage/plantilla/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/consolidacion/webPage/plantilla/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/consolidacion/webPage/plantilla/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/consolidacion/webPage/plantilla/alertifyjs/alertify.min.js"></script>
<script src="/consolidacion/webPage/plantilla/assets/dist/js/adminlte.min.js"></script>
<script src="/consolidacion/webPage/plantilla/js/tooltip.js"></script>
<script src="/consolidacion/webPage/plantilla/liberias/js/tableHeadFixer.js"></script>
<script src="/consolidacion/webPage/js/jsOperacionesPublic.js?v=<?php echo(rand()); ?>"></script>
<?php //if ($factura != true) { ?>
    <script src="/consolidacion/webPage/js/cron.js?v=<?php echo(rand()); ?>"></script>
<?php //}?>
<script src="/consolidacion/webPage/plantilla/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="/consolidacion/webPage/plantilla/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/consolidacion/webPage/plantilla/assets/js/data-table.js"></script>
<script src="/consolidacion/webPage/plantilla/assets/js/ui.js"></script>
<script src="/consolidacion/webPage/plantilla/liberias/js/jquery.auto-complete.js"></script>
<script src="/consolidacion/webPage/plantilla/menu/js/jquery.classycontextmenu.min.js"></script>
<script src="https://unpkg.com/moment@2.17.0/moment.js"></script>

<script>
    var CONTROLLERPUBLIC = "./../../Controlador/CtlOperacionesPublics.php";
    var CONTROLLER = "../../Controlador/Terceros/CtlTercero";
//    alertify.defaults.transition = "zoom";
//    alertify.defaults.theme.ok = "ui positive button";
//    alertify.defaults.theme.cancel = "ui black button";
</script>
<style>
    .select2-selection__rendered{
        word-wrap: break-word !important;
        text-overflow: inherit !important;
        white-space: normal !important;
    }
    .input-sm{
        height: 26px !important;
    }



    .btn-sm{
        height: 26px !important;
    }
    .btn-active,.btn-active:hover {
        background-color: #eee !important;
        color: #00a65a;
    }


    .lds-dual-ring {
        display: inline-block;
        width: 64px;
        height: 64px;
    }
    .lds-dual-ring:after {
        content: " ";
        display: block;
        width: 46px;
        height: 46px;
        margin: 1px;
        border-radius: 50%;
        border: 5px solid #fff;
        border-color: #3c8dbc transparent #3c8dbc transparent;
        animation: lds-dual-ring 1.2s linear infinite;
    }
    @keyframes lds-dual-ring {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .select2-container .select2-selection--multiple{
        min-height: 28px !important;
    }
</style>
