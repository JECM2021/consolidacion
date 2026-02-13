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
                    <i class="fa fa-reply-all"></i> Registro Pastores / Obreros
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
                            <a href="#pastoresGenerales" aria-controls="pastoresGenerales" role="tab"
                                data-toggle="tab">Pastores Generales</a>
                        </li>
                        <li role="presentation">
                            <a href="#pastoresPrincipales" aria-controls="pastoresPrincipales" role="tab"
                                data-toggle="tab">Pastores Principales</a>
                        </li>
                        <li role="presentation">
                            <a href="#pastoresObreros" aria-controls="pastoresObreros" role="tab"
                                data-toggle="tab">Obreros</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="pastoresGenerales">
                            <div class="row">
                                <br>
                                <div class="col-md-2">
                                    <label><strong>Tipo de Documento:</strong></label>
                                    <select class="form-control input-sm " id="cmbTipoDocumentoPg"
                                        name="cmbTipoDocumentoPg"> </select>
                                    <input type="hidden" id="txtEditarPg" name="txtEditarPg" value="0" />
                                    <input type="hidden" id="txtIdPg" name="txtIdPg" />
                                    <input type="hidden" id="txtTerPg_id" name="txtTerPg_id" />
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Documento:</strong></label>
                                    <input type="text" name="txtDocumentoPg" id="txtDocumentoPg"
                                        class="form-control  input-sm solo-numero">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Primer nombre: </strong></label>
                                    <input type="text" name="txtPrimerNombrePg"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtPrimerNombrePg"
                                        class="form-control  input-sm">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Segundo nombre: </strong></label>
                                    <input type="text" name="txtSegundoNombrePg"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtSegundoNombrePg"
                                        class="form-control  input-sm">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Primer apellido: </strong></label>
                                    <input type="text" name="txtPrimerApellidoPg"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtPrimerApellidoPg"
                                        class="form-control  input-sm">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Segundo apellido: </strong></label>
                                    <input type="text" name="txtSegundoApellidoPg"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtSegundoApellidoPg"
                                        class="form-control  input-sm">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label><strong>Departamento:</strong></label>
                                    <select class="form-control input-sm select2" style="width: 100%;"
                                        id="cmbDepartamentoPg" name="cmbDepartamentoPg"
                                        onchange="listarComboCiudad(this, 'cmbCiudadPg')"> </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Ciudad:</strong></label>
                                    <select class="form-control input-sm select2" style="width: 100%;" id="cmbCiudadPg"
                                        name="cmbCiudadPg" onchange="listarComboBarrio(this, 'cmbBarrioPg')"> </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Barrio:</strong></label>
                                    <select class="form-control input-sm select2" id="cmbBarrioPg" style="width: 100%;"
                                        name="cmbBarrioPg"> </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Direccion:</strong></label>
                                    <input type="text" name="txtDireccionpg"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtDireccionpg"
                                        class="form-control  input-sm">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Telefono:</strong></label>
                                    <input type="text" name="txtTelefonopg"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtTelefonopg"
                                        class="form-control input-sm solo-numero">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Celular:</strong></label>
                                    <input type="text" name="txtCelularpg"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtCelularpg"
                                        class="form-control input-sm solo-numero">
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
                                    <input type="text" name="txtEdadpg" onkeyup="this.value = this.value.toUpperCase();"
                                        id="txtEdadpg" class="form-control input-sm solo-numero">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Estado Civil:</strong></label>
                                    <select class="form-control input-sm " id="cmbEstadoCivilPg"
                                        name="cmbEstadoCivilPg"> </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Ministerio:</strong></label>
                                    <select class="form-control input-sm " id="cmbMinisterioPg" name="cmbMinisterioPg">
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Codigo Pastor:</strong></label>
                                    <input type="text" name="txtCodigopg"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtCodigopg"
                                        class="form-control input-sm solo-numero">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Estado:</strong></label>
                                    <select class="form-control input-sm " id="cmbEstado" name="cmbEstado">
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
                                    <div id="divVisualizarPastGeneral"
                                        style="overflow: auto; width: 100%; height: 320px">
                                        <table id='tbl_visualizar_PastGeneral' style=' font-size: 11px;'
                                            class='table-hover table-condensed table-striped table-bordered  table  callback1'>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" name="btnGuardarPastorPg" id="btnGuardarPastorPg"
                                    class="btn btn-primary btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                    Guardar</button>
                                <button type="reset" name="btnCancelarPastorPg" id="btnCancelarPastorPg"
                                    data-dismiss="modal" class="btn btn-warning btn-sm"><i class="fa fa-sign-out"
                                        aria-hidden="true"></i> Cancelar</button>
                            </div>
                        </div>
                        <!--INICIO TABPANEL 2-->
                        <div role="tabpanel" class="tab-pane" id="pastoresPrincipales">
                            <div class="row">
                                <br>
                                <div class="col-md-2">
                                    <label><strong>Pastor General:</strong></label>
                                    <select class="form-control input-sm " id="cmbPastorGeneral"
                                        name="cmbPastorGeneral"> </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <br>
                                <div class="col-md-2">
                                    <label><strong>Tipo de Documento:</strong></label>
                                    <select class="form-control input-sm " id="cmbTipoDocumentoPp"
                                        name="cmbTipoDocumentoPp"> </select>
                                    <input type="hidden" id="txtEditarPp" name="txtEditarPp" value="0" />
                                    <input type="hidden" id="txtIdPp" name="txtIdPp" />
                                    <input type="hidden" id="txtTerPp_id" name="txtTerPp_id" />
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Documento:</strong></label>
                                    <input type="text" name="txtDocumentoPp" id="txtDocumentoPp"
                                        class="form-control  input-sm solo-numero">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Primer nombre: </strong></label>
                                    <input type="text" name="txtPrimerNombrePp"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtPrimerNombrePp"
                                        class="form-control  input-sm">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Segundo nombre: </strong></label>
                                    <input type="text" name="txtSegundoNombrePp"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtSegundoNombrePp"
                                        class="form-control  input-sm">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Primer apellido: </strong></label>
                                    <input type="text" name="txtPrimerApellidoPp"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtPrimerApellidoPp"
                                        class="form-control  input-sm">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Segundo apellido: </strong></label>
                                    <input type="text" name="txtSegundoApellidoPp"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtSegundoApellidoPp"
                                        class="form-control  input-sm">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label><strong>Departamento:</strong></label>
                                    <select class="form-control input-sm select2" style="width: 100%;"
                                        id="cmbDepartamentoPp" name="cmbDepartamentoPp"
                                        onchange="listarComboCiudad(this, 'cmbCiudadPp')"> </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Ciudad:</strong></label>
                                    <select class="form-control input-sm select2" style="width: 100%;" id="cmbCiudadPp"
                                        name="cmbCiudadPp" onchange="listarComboBarrio(this, 'cmbBarrioPp')"> </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Barrio:</strong></label>
                                    <select class="form-control input-sm select2" id="cmbBarrioPp" style="width: 100%;"
                                        name="cmbBarrioPp"> </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Direccion:</strong></label>
                                    <input type="text" name="txtDireccionPp"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtDireccionPp"
                                        class="form-control  input-sm">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Telefono:</strong></label>
                                    <input type="text" name="txtTelefonoPp"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtTelefonoPp"
                                        class="form-control input-sm solo-numero">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Celular:</strong></label>
                                    <input type="text" name="txtCelularPp"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtCelularPp"
                                        class="form-control input-sm solo-numero">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label><strong>Sexo:</strong></label>
                                    <select class="form-control input-sm " id="cmbSexoPp" name="cmbSexoPp"> </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Edad:</strong></label>
                                    <input type="text" name="txtEdadPp" onkeyup="this.value = this.value.toUpperCase();"
                                        id="txtEdadPp" class="form-control input-sm solo-numero">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Estado Civil:</strong></label>
                                    <select class="form-control input-sm " id="cmbEstadoCivilPp"
                                        name="cmbEstadoCivilPp"> </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Ministerio:</strong></label>
                                    <select class="form-control input-sm " id="cmbMinisterioPp" name="cmbMinisterioPp">
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Codigo Pastor:</strong></label>
                                    <input type="text" name="txtCodigoPp"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtCodigoPp"
                                        class="form-control input-sm solo-numero">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Estado:</strong></label>
                                    <select class="form-control input-sm " id="cmbEstadoPp" name="cmbEstadoPp">
                                        <option value="A" selected>ACTIVO</option>
                                        <option value="I">INACTIVO</option>
                                    </select>
                                </div>
                            </div><br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label><strong>Filtro rapido:</strong></label>
                                    <input type="text" name="txtFiltroPp"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtFiltroUsuariosPp"
                                        onclick="filtrarDatos('txtFiltroUsuariosPp', 'tblFiltrarUsuarioPp')"
                                        class="form-control  input-sm">
                                </div>
                            </div><br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="divVisualizarPastPricipal"
                                        style="overflow: auto; width: 100%; height: 320px">
                                        <table id='tbl_visualizar_PastPrincipal' style=' font-size: 11px;'
                                            class='table-hover table-condensed table-striped table-bordered  table  callback1'>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" name="btnGuardarPastorPp" id="btnGuardarPastorPp"
                                    class="btn btn-primary btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                    Guardar</button>
                                <button type="reset" name="btnCancelarPastorPp" id="btnCancelarPastorPp"
                                    data-dismiss="modal" class="btn btn-warning btn-sm"><i class="fa fa-sign-out"
                                        aria-hidden="true"></i> Cancelar</button>
                            </div>
                        </div>
                        <!--INICIO TAP PANEL 3 OBREROS-->
                        <div role="tabpanel" class="tab-pane" id="pastoresObreros">
                            <div class="row">
                                <br>
                                <div class="col-md-2">
                                    <label><strong>Pastor Principal:</strong></label>
                                    <select class="form-control input-sm " id="cmbPastorPrincipal"
                                        name="cmbPastorPrincipal"> </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <br>
                                <div class="col-md-2">
                                    <label><strong>Tipo de Documento:</strong></label>
                                    <select class="form-control input-sm " id="cmbTipoDocumentoOb"
                                        name="cmbTipoDocumentoOb"> </select>
                                    <input type="hidden" id="txtEditarOb" name="txtEditarOb" value="0" />
                                    <input type="hidden" id="txtIdOb" name="txtIdOb" />
                                    <input type="hidden" id="txtTerOb_id" name="txtTerOb_id" />
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Documento:</strong></label>
                                    <input type="text" name="txtDocumentoOb" id="txtDocumentoOb"
                                        class="form-control  input-sm solo-numero">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Primer nombre: </strong></label>
                                    <input type="text" name="txtPrimerNombreOb"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtPrimerNombreOb"
                                        class="form-control  input-sm">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Segundo nombre: </strong></label>
                                    <input type="text" name="txtSegundoNombreOb"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtSegundoNombreOb"
                                        class="form-control  input-sm">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Primer apellido: </strong></label>
                                    <input type="text" name="txtPrimerApellidoOb"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtPrimerApellidoOb"
                                        class="form-control  input-sm">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Segundo apellido: </strong></label>
                                    <input type="text" name="txtSegundoApellidoOb"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtSegundoApellidoOb"
                                        class="form-control  input-sm">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label><strong>Departamento:</strong></label>
                                    <select class="form-control input-sm select2" style="width: 100%;"
                                        id="cmbDepartamentoOb" name="cmbDepartamentoOb"
                                        onchange="listarComboCiudad(this, 'cmbCiudadPp')"> </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Ciudad:</strong></label>
                                    <select class="form-control input-sm select2" style="width: 100%;" id="cmbCiudadOb"
                                        name="cmbCiudadOb" onchange="listarComboBarrio(this, 'cmbBarrioOb')"> </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Barrio:</strong></label>
                                    <select class="form-control input-sm select2" id="cmbBarrioOb" style="width: 100%;"
                                        name="cmbBarrioOb"> </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Direccion:</strong></label>
                                    <input type="text" name="txtDireccionOb"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtDireccionOb"
                                        class="form-control  input-sm">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Telefono:</strong></label>
                                    <input type="text" name="txtTelefonoOb"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtTelefonoOb"
                                        class="form-control input-sm solo-numero">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Celular:</strong></label>
                                    <input type="text" name="txtCelularOb"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtCelularOb"
                                        class="form-control input-sm solo-numero">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label><strong>Sexo:</strong></label>
                                    <select class="form-control input-sm " id="cmbSexoOb" name="cmbSexoOb"> </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Edad:</strong></label>
                                    <input type="text" name="txtEdadOb" onkeyup="this.value = this.value.toUpperCase();"
                                        id="txtEdadOb" class="form-control input-sm solo-numero">
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Estado Civil:</strong></label>
                                    <select class="form-control input-sm " id="cmbEstadoCivilOb"
                                        name="cmbEstadoCivilOb"> </select>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>Estado:</strong></label>
                                    <select class="form-control input-sm " id="cmbEstadoOb" name="cmbEstadoOb">
                                        <option value="A" selected>ACTIVO</option>
                                        <option value="I">INACTIVO</option>
                                    </select>
                                </div>
                            </div><br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label><strong>Filtro rapido:</strong></label>
                                    <input type="text" name="txtFiltroPp"
                                        onkeyup="this.value = this.value.toUpperCase();" id="txtFiltroUsuariosPp"
                                        onclick="filtrarDatos('txtFiltroUsuariosPp', 'tblFiltrarUsuarioPp')"
                                        class="form-control  input-sm">
                                </div>
                            </div><br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="divVisualizarObreros"
                                        style="overflow: auto; width: 100%; height: 320px">
                                        <table id='tbl_visualizar_Obreros' style=' font-size: 11px;'
                                            class='table-hover table-condensed table-striped table-bordered  table  callback1'>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" name="btnGuardarObreros" id="btnGuardarObreros"
                                    class="btn btn-primary btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                    Guardar</button>
                                <button type="reset" name="btnCancelarObrero" id="btnCancelarObreros"
                                    data-dismiss="modal" class="btn btn-warning btn-sm"><i class="fa fa-sign-out"
                                        aria-hidden="true"></i> Cancelar</button>
                            </div>
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