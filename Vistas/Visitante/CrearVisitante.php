<?php
include_once '../../validaSession.php';
include_once '../../Operaciones.php';
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SICS | Crear Nuevo Visitante</title>
    <?php
    include '../../webPage/imports/imports.php';
    ?>
    <script>
        var CONTROLLERVISITANTE = "";
    </script>

    <script src="CrearVisitante.js?v=<?php echo (rand()); ?>"></script>
</head>

<body class="skin-blue sidebar-mini">
    <div class="wrapper">
        <?php
        include_once "../../webPage/plantilla/cabezote_principal.php";
        include_once "../../webPage/plantilla/lateral_principal.php";
        ?>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    <i class="fa fa-reply-all"></i> Crear Nuevo Visitante
                </h1>
                <ol class="breadcrumb">
                    <li><a href="../../principal"><i class="fa fa-dashboard"></i> Principal</a></li>
                    <li class="">Registro Reporte</li>
                    <li class="">Crear Nuevo Visitante</li>
                </ol>
            </section>
            <section class="content">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="pastoresGenerales">
                        <div class="row">
                            <br>

                            <div class="col-md-8">
                                <label><strong>Nombre del Ministerio</strong></label>
                                <input type="text" name="txtNombreMinisterio"
                                    onkeyup="this.value = this.value.toUpperCase();" id="txtNombreMinisterio"
                                    class="form-control  input-sm">
                                <input type="hidden" id="txtEditarMin" name="txtEditarMin" value="0" />
                                <input type="hidden" id="txtIdMin" name="txtIdMin" />
                            </div>
                            <div class="col-md-2">
                                <label><strong>Estado:</strong></label>
                                <select class="form-control input-sm " id="cmbEstadoMin" name="cmbEstadoMin">
                                    <option value="A" selected>ACTIVO</option>
                                    <option value="I">INACTIVO</option>
                                </select>
                            </div>
                        </div><br><br>
                        <div class="row">
                            <div class="col-md-12">
                                <label><strong>Filtro rapido:</strong></label>
                                <input type="text" name="txtFiltro" onkeyup="this.value = this.value.toUpperCase();"
                                    id="txtFiltroUsuarios"
                                    onclick="filtrarDatos('txtFiltroUsuarios', 'tblFiltrarUsuario')"
                                    class="form-control  input-sm">
                            </div>
                        </div><br><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="divVisualizarMinisterio" style="overflow: auto; width: 100%; height: 320px">
                                    <table id='tbl_visualizar_Ministerios' style=' font-size: 11px;'
                                        class='table-hover table-condensed table-striped table-bordered  table  callback1'>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="btnGuardarMinisterios" id="btnGuardarMinisterios"
                                class="btn btn-primary btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                Guardar</button>
                            <button type="reset" name="btnCancelarMinisterios" id="btnCancelarMinisterios"
                                data-dismiss="modal" class="btn btn-warning btn-sm"><i class="fa fa-sign-out"
                                    aria-hidden="true"></i> Cancelar</button>
                        </div>
                    </div>
                </div>
            </section>
            <div class="modal fade " id="modalLoandig" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 100px;margin-left: 39%;margin-top: 34%;">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="cargando">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include "../../webPage/plantilla/footer.php";
        ?>
    </div>
    <script>
        $(".solo-numero").keydown(function(event) {
            //alert(event.keyCode);
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event
                .keyCode !== 190 && event.keyCode !== 110 && event.keyCode !== 8 && event.keyCode !== 9) {
                return false;
            }
        });
    </script>
    <script>
        $(function() {
            $('.select2').select2();
        });
    </script>
</body>

</html>