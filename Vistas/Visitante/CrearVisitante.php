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
        var CONTROLLERVISITANTE = "../../Controlador/Visitante/CtlVisitante.php";
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
                <div class="row">
                    <div class="col-md-2">
                        <label><strong>Referencia:</strong></label>
                        <select class="form-control input-sm " id="cmbReferencia" name="cmbReferencia">
                            <option value="1">Visitante Invitado</option>
                            <option value="2">Visitante Solo</option>
                        </select>
                    </div>
                </div>
                <div id="content-1">
                    <div class="row">
                        <br>
                        <div class="col-md-2">
                            <label><strong>Fecha Registro</strong></label>
                            <input type="date" id="fechaActual" value="<?php echo date("Y-m-d"); ?>" class="form-control  input-sm">
                        </div>
                        <div class="col-md-6">
                            <label><strong>Nombre del Consolidador:</strong></label>
                            <select class="form-control input-sm select2" id="cmbNombConso" name="cmbNombConso"> </select>
                        </div>
                        <div class="col-md-4">
                            <label><strong>Codigo del Pastor Inmediato:</strong></label>
                            <select class="form-control input-sm select2" id="cmbCodPastInm" name="cmbCodPastInm"> </select>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-4">
                            <label><strong>Nombre del Obrero:</strong></label>
                            <select class="form-control input-sm select2" id="cmbNombreObrero" name="cmbNombreObrero" onchange="listartelefono(this, 'txtTelefonoOb')"> </select>
                        </div>
                        <div class="col-md-3">
                            <label><strong>Telefono:</strong></label>
                            <input type="text" name="txtTelefonoOb"
                                onkeyup="this.value = this.value.toUpperCase();" id="txtTelefonoOb"
                                class="form-control input-sm solo-numero">
                        </div>
                    </div>
                    <br>
                    <hr style="border: none; height: 1px; background-color: grey; width: 100%;">
                    <div class="row">
                        <div class="col-md-2">
                            <label><strong>Tipo de Documento:</strong></label>
                            <select class="form-control input-sm " id="cmbTipoDocumentoVi"
                                name="cmbTipoDocumentoVi"> </select>
                            <input type="hidden" id="txtEditarVi" name="txtEditarVi" value="0" />
                            <input type="hidden" id="txtIdVi" name="txtIdVi" />
                            <input type="hidden" id="txtTeridVi" name="txtTeridVi" />
                        </div>
                        <div class="col-md-2">
                            <label><strong>Documento:</strong></label>
                            <input type="text" name="txtDocumentoVi" id="txtDocumentoVi"
                                class="form-control  input-sm solo-numero">
                        </div>
                        <div class="col-md-2">
                            <label><strong>Primer nombre: </strong></label>
                            <input type="text" name="txtPrimerNombreVi"
                                onkeyup="this.value = this.value.toUpperCase();" id="txtPrimerNombreVi"
                                class="form-control  input-sm">
                        </div>
                        <div class="col-md-2">
                            <label><strong>Segundo nombre: </strong></label>
                            <input type="text" name="txtSegundoNombreVi"
                                onkeyup="this.value = this.value.toUpperCase();" id="txtSegundoNombreVi"
                                class="form-control  input-sm">
                        </div>
                        <div class="col-md-2">
                            <label><strong>Primer apellido: </strong></label>
                            <input type="text" name="txtPrimerApellidoVi"
                                onkeyup="this.value = this.value.toUpperCase();" id="txtPrimerApellidoVi"
                                class="form-control  input-sm">
                        </div>
                        <div class="col-md-2">
                            <label><strong>Segundo apellido: </strong></label>
                            <input type="text" name="txtSegundoApellidoVi"
                                onkeyup="this.value = this.value.toUpperCase();" id="txtSegundoApellidoVi"
                                class="form-control  input-sm">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-2">
                            <label><strong>Ciudad:</strong></label>
                            <select class="form-control input-sm select2" id="cmbCiudadVi" style="width: 100%;"
                                name="cmbCiudadVi" onchange="listarComboBarrio(this, 'cmbBarrioVi')"> </select>
                        </div>
                        <div class="col-md-2">
                            <label><strong>Barrio:</strong></label>
                            <select class="form-control input-sm select2" id="cmbBarrioVi" style="width: 100%;"
                                name="cmbBarrioVi"> </select>
                        </div>
                        <div class="col-md-2">
                            <label><strong>Direccion:</strong></label>
                            <input type="text" name="txtDireccionVi"
                                onkeyup="this.value = this.value.toUpperCase();" id="txtDireccionVi"
                                class="form-control  input-sm">
                        </div>
                        <div class="col-md-2">
                            <label><strong>Edad:</strong></label>
                            <input type="text" name="txtEdadVi"
                                onkeyup="this.value = this.value.toUpperCase();" id="txtEdadVi"
                                class="form-control  input-sm">
                        </div>
                        <div class="col-md-2">
                            <label><strong>Celular:</strong></label>
                            <input type="text" name="txtTelefonoVi"
                                onkeyup="this.value = this.value.toUpperCase();" id="txtTelefonoVi"
                                class="form-control  input-sm">
                        </div>
                        <div class="col-md-2">
                            <label><strong>Estado Civil:</strong></label>
                            <select class="form-control input-sm select2" id="cmbEstadoCivilVi" style="width: 100%;"
                                name="cmbEstadoCivilVi"> </select>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label><strong>Peticion:</strong></label>
                            <textarea class="form-control" id="txtPeticion" placeholder="Escriba la peticion." style="resize: none; height: 6%;"></textarea>
                        </div>
                    </div>


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
                            <div id="divVisitanteInvitado" style="overflow: auto; width: 100%; height: 320px">
                                <table id='tbl_visitante_invitado' style=' font-size: 11px;'
                                    class='table-hover table-condensed table-striped table-bordered  table  callback1'>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="btnGuardarVisInv" id="btnGuardarVisInv"
                            class="btn btn-primary btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Guardar</button>
                        <button type="reset" name="btnCancelarVisInv" id="btnCancelarVisInv"
                            data-dismiss="modal" class="btn btn-warning btn-sm"><i class="fa fa-sign-out"
                                aria-hidden="true"></i> Cancelar</button>
                    </div>
                </div>
                <br>
                <!-----------------CONTENEDOR DOS---------------------->
                <div id="content-2" class="hidden">
                    <div class="row"><br>
                        <div class="col-md-2">
                            <label><strong>Fecha Registro</strong></label>
                            <input type="date" id="fechaActualVs" value="<?php echo date("Y-m-d"); ?>" class="form-control  input-sm">
                        </div>
                        <div class="col-md-6">
                            <label><strong>Nombre del Consejero:</strong></label>
                            <select class="form-control input-sm select2" style="width: 100%;" id="cmbNombConsVs" name="cmbNombConsVs"></select>
                        </div>
                        <div class="col-md-2">
                            <label><strong>Telefono:</strong></label>
                            <input type="text" name="txtTelefonoVs"
                                onkeyup="this.value = this.value.toUpperCase();" id="txtTelefonoVs"
                                class="form-control  input-sm">
                        </div>
                        <div class="col-md-2">
                            <label><strong>Llamada:</strong></label>
                            <input type="time" style="width: 100%;" id="txtLlamadaVs" name="txtLlamadaVs" min="09:00" max="18:00" required />
                        </div>
                    </div> <br>
                    <hr style="border: none; height: 1px; background-color: grey; width: 100%;">
                    <div class="row">
                        <div class="col-md-2">
                            <label><strong>Tipo de Documento:</strong></label>
                            <select class="form-control input-sm " id="cmbTipoDocumentoVs"
                                name="cmbTipoDocumentoVs"> </select>
                            <input type="hidden" id="txtEditarVs" name="txtEditarVs" value="0" />
                            <input type="hidden" id="txtIdVs" name="txtIdVs" />
                            <input type="hidden" id="txtTeridVs" name="txtTeridVs" />
                        </div>
                        <div class="col-md-2">
                            <label><strong>Documento:</strong></label>
                            <input type="text" name="txtDocumentoVs" id="txtDocumentoVs"
                                class="form-control  input-sm solo-numero">
                        </div>
                        <div class="col-md-2">
                            <label><strong>Primer nombre: </strong></label>
                            <input type="text" name="txtPrimerNombreVs"
                                onkeyup="this.value = this.value.toUpperCase();" id="txtPrimerNombreVs"
                                class="form-control  input-sm">
                        </div>
                        <div class="col-md-2">
                            <label><strong>Segundo nombre: </strong></label>
                            <input type="text" name="txtSegundoNombreVs"
                                onkeyup="this.value = this.value.toUpperCase();" id="txtSegundoNombreVs"
                                class="form-control  input-sm">
                        </div>
                        <div class="col-md-2">
                            <label><strong>Primer apellido: </strong></label>
                            <input type="text" name="txtPrimerApellidoVs"
                                onkeyup="this.value = this.value.toUpperCase();" id="txtPrimerApellidoVs"
                                class="form-control  input-sm">
                        </div>
                        <div class="col-md-2">
                            <label><strong>Segundo apellido: </strong></label>
                            <input type="text" name="txtSegundoApellidoVs"
                                onkeyup="this.value = this.value.toUpperCase();" id="txtSegundoApellidoVs."
                                class="form-control  input-sm">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-2">
                            <label><strong>Ciudad:</strong></label>
                            <select class="form-control input-sm select2" id="cmbCiudadVs" style="width: 100%;"
                                name="cmbCiudadVs" onchange="listarComboBarrio(this, 'cmbBarrioVs')"> </select>
                        </div>
                        <div class="col-md-2">
                            <label><strong>Barrio:</strong></label>
                            <select class="form-control input-sm select2" id="cmbBarrioVs" style="width: 100%;"
                                name="cmbBarrioVs"> </select>
                        </div>
                        <div class="col-md-2">
                            <label><strong>Direccion:</strong></label>
                            <input type="text" name="txtDireccionVs"
                                onkeyup="this.value = this.value.toUpperCase();" id="txtDireccionVs"
                                class="form-control  input-sm">
                        </div>
                        <div class="col-md-2">
                            <label><strong>Edad:</strong></label>
                            <input type="text" name="txtEdadVs"
                                onkeyup="this.value = this.value.toUpperCase();" id="txtEdadVs"
                                class="form-control  input-sm">
                        </div>
                        <div class="col-md-2">
                            <label><strong>Celular:</strong></label>
                            <input type="text" name="txtTelefonoVs"
                                onkeyup="this.value = this.value.toUpperCase();" id="txtTelefonoVs"
                                class="form-control  input-sm">
                        </div>
                        <div class="col-md-2">
                            <label><strong>Estado Civil:</strong></label>
                            <select class="form-control input-sm select2" id="cmbEstadoCivilVs" style="width: 100%;"
                                name="cmbEstadoCivilVs"> </select>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label><strong>Peticion:</strong></label>
                            <textarea class="form-control" id="txtPeticion" placeholder="Escriba la peticion." style="resize: none; height: 6%;"></textarea>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6">
                            <label><strong>Asignado a:</strong></label>
                            <select class="form-control input-sm select2" style="width: 100%;" id="cmbNombPerAsig" name="cmbNombPerAsig"></select>
                        </div>
                        <div class="col-md-2">
                            <label><strong>Telefono:</strong></label>
                            <input type="text" name="txtTelefonoPerAsig"
                                onkeyup="this.value = this.value.toUpperCase();" id="txtTelefonoPerAsig"
                                class="form-control  input-sm">
                        </div>
                        <div class="col-md-2">
                            <label><strong>Llamada:</strong></label>
                            <input type="time" style="width: 100%;" id="txtLlamadaPerAsig" name="txtLlamadaPerAsig" min="09:00" max="18:00" required />
                        </div>
                    </div>
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
                            <div id="divVisitanteSolo" style="overflow: auto; width: 100%; height: 320px">
                                <table id='tbl_visitante_solo' style=' font-size: 11px;'
                                    class='table-hover table-condensed table-striped table-bordered  table  callback1'>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="btnGuardarVisSolo" id="btnGuardarVisSolo"
                            class="btn btn-primary btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Guardar</button>
                        <button type="reset" name="btnCancelarVisSolo" id="btnCancelarVisSolo"
                            data-dismiss="modal" class="btn btn-warning btn-sm"><i class="fa fa-sign-out"
                                aria-hidden="true"></i> Cancelar</button>
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