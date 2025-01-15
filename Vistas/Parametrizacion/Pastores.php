<?php
include_once '../../validaSession.php';
include_once '../../Operaciones.php';
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SICS | Registro Pastores</title>
    <?php
    include '../../webPage/imports/imports.php';
    ?>
    <script>
        var CONTROLLERPASTORES = "../../Controlador/Parametrizacion/CtlPastores.php";
    </script>

    <script src="Pastores.js?v=<?php echo (rand()); ?>"></script>
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
                    <i class="fa fa-reply-all"></i> Registro Pastores
                </h1>
                <ol class="breadcrumb">
                    <li><a href="../../principal"><i class="fa fa-dashboard"></i> Principal</a></li>
                    <li class="">Parametrizacion</li>
                    <li class="">Registro Pastores</li>
                </ol>
            </section>
            <section class="content">
                <div role="tabpanel">
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active">
                            <a href="#pastoresGenerales" aria-controls="pastoresGenerales" role="tab" data-toggle="tab">Pastores Generales</a>
                        </li>
                        <li role="presentation">
                            <a href="#pastoresPrincipales" aria-controls="pastoresPrincipales" role="tab" data-toggle="tab">Pastores Principales</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="pastoresGenerales">
                            <div class="row">
                                <br>
                                <div class="col-md-2">
                                    <label><strong>Tipo de Documento:</strong></label>
                                    <select class="form-control input-sm " id="cmbTipoDocumentoPg" name="cmbTipoDocumentoPg"> </select>
                                    <input type="hidden" id="txtEditarPg" name="txtEditarPg" value="0" />
                                    <input type="hidden" id="txtIdPg" name="txtIdPg" />
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Documento:</strong></label>
                                    <input type="text" name="txtDocumentoPg" id="txtDocumentoPg" class="form-control  input-sm solo-numero">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Primer nombre: </strong></label>
                                    <input type="text" name="txtPrimerNombrePg" onkeyup="this.value = this.value.toUpperCase();" id="txtPrimerNombrePg" class="form-control  input-sm">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Segundo nombre: </strong></label>
                                    <input type="text" name="txtSegundoNombrePg" onkeyup="this.value = this.value.toUpperCase();" id="txtSegundoNombrePg" class="form-control  input-sm">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Primer apellido: </strong></label>
                                    <input type="text" name="txtPrimerApellidoPg" onkeyup="this.value = this.value.toUpperCase();" id="txtPrimerApellidoPg" class="form-control  input-sm">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Segundo apellido: </strong></label>
                                    <input type="text" name="txtSegundoApellidoPg" onkeyup="this.value = this.value.toUpperCase();" id="txtSegundoApellidoPg" class="form-control  input-sm">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label><strong>Departamento:</strong></label>
                                    <select class="form-control input-sm select2" style="width: 100%;" id="cmbDepartamentoPg" name="cmbDepartamentoPg" onchange="listarComboCiudad(this, 'cmbCiudadPg')"> </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Ciudad:</strong></label>
                                    <select class="form-control input-sm select2" style="width: 100%;" id="cmbCiudadPg" name="cmbCiudadPg" onchange="listarComboBarrio(this, 'cmbBarrioPg')"> </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Barrio:</strong></label>
                                    <select class="form-control input-sm select2" id="cmbBarrioPg" style="width: 100%;" name="cmbBarrioPg"> </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Direccion:</strong></label>
                                    <input type="text" name="txtDireccionpg" onkeyup="this.value = this.value.toUpperCase();" id="txtDireccionpg" class="form-control  input-sm">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Telefono:</strong></label>
                                    <input type="text" name="txtTelefonopg" onkeyup="this.value = this.value.toUpperCase();" id="txtTelefonopg" class="form-control input-sm solo-numero">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Celular:</strong></label>
                                    <input type="text" name="txtCelularpg" onkeyup="this.value = this.value.toUpperCase();" id="txtCelularpg" class="form-control input-sm solo-numero">
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label><strong>Sexo:</strong></label>
                                    <select class="form-control input-sm " id="cmbSexoPg" name="cmbSexoPg"> </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Edad:</strong></label>
                                    <input type="text" name="txtEdadpg" onkeyup="this.value = this.value.toUpperCase();" id="txtEdadpg" class="form-control input-sm solo-numero">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Estado Civil:</strong></label>
                                    <select class="form-control input-sm " id="cmbEstadoCivilPg" name="cmbEstadoCivilPg"> </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Ministerio:</strong></label>
                                    <select class="form-control input-sm " id="cmbMinisterioPg" name="cmbMinisterioPg">
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Codigo Pastor:</strong></label>
                                    <input type="text" name="txtCodigopg" onkeyup="this.value = this.value.toUpperCase();" id="txtCodigopg" class="form-control input-sm solo-numero">
                                </div>
                            </div><br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label><strong>Filtro rapido:</strong></label>
                                    <input type="text" name="txtFiltro" onkeyup="this.value = this.value.toUpperCase();" id="txtFiltroUsuarios" onclick="filtrarDatos('txtFiltroUsuarios', 'tblFiltrarUsuario')" class="form-control  input-sm">
                                </div>
                            </div><br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="divVisualizarUsuarios" style="overflow: auto; width: 100%; height: 320px">
                                        <table id='tbl_visualizaer_usuarios' style=' font-size: 11px;' class='table-hover table-condensed table-striped table-bordered  table  callback1'>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" name="btnGuardarPastorPg" id="btnGuardarPastorPg" class="btn btn-primary btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                    Guardar</button>
                                <button type="reset" name="btnCancelarPastorPg" id="btnCancelarPastorPg" data-dismiss="modal" class="btn btn-warning btn-sm"><i class="fa fa-sign-out" aria-hidden="true"></i> Cancelar</button>
                            </div>
                        </div>
                        <!--INICIO TABPANEL 2-->
                        <div role="tabpanel" class="tab-pane" id="pastoresPrincipales">...</div>
                    </div>
                </div>
            </section>


            <div class="modal fade " id="modalLoandig" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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