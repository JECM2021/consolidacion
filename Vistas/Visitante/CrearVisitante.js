$(document).ready(function () {
    $('#cmbReferencia').change(function () {

        var vistaSeleccionada = $(this).val();
        if (vistaSeleccionada == 1) {
            $("#content-1").removeClass('hidden');
            $("#content-2").addClass('hidden');
        } else if (vistaSeleccionada == 2) {
            $("#content-2").removeClass('hidden');
            $("#content-1").addClass('hidden');
        } else {
            alert("Seleccione un campo por favor")
        }

    });
    visualizarVisitanteInv();
    listarPastorInmediato('cmbCodPastInm');
    listarCreyentes('cmbNombConso');
    listarCreyentes('cmbNombreObrero');
    listarTipoDocumento('cmbTipoDocumentoVi');
    //listarComboCiudad('cmbCiudadVi');
    listarComboDepartamento('cmbDepartamentoVi')
    listarEstadoCivil('cmbEstadoCivilVi');
    listarComboSexo('cmbSexoVi');
    /*-----Visitante Solo--------*/
    listarCreyentes('cmbNombConsVs');
    listarTipoDocumento('cmbTipoDocumentoVs');
    //listarComboCiudad('cmbCiudadVs');
    listarComboDepartamento('cmbDepartamentoVs');
    listarEstadoCivil('cmbEstadoCivilVs');
    listarCreyentes('cmbNombPerAsig');
    $("#btnGuardarVisInv").click(function () {
        validarCamposVisitanteInvitado();
    });

    $("#btnCancelarVisInv").click(function () {
        limpiarCamposVisitanteInvitado();
    });
});

function listarPastorInmediato(idCombo) {
    var ur = CONTROLLERVISITANTE;
    var op = 1;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success: function (data) {
            //alert(data)
            var ret = eval('(' + data + ')');
            try {
                $listarCombo = $("#" + idCombo);
                $listarCombo.html('');
                var option = $("<option value=''>Seleccione</option>");
                $listarCombo.append(option);
                for (var i = 0; i < ret.length; i++) {
                    var option = $("<option  value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                    $listarCombo.append(option);
                }
            } catch (e) { }
        },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listarCreyentes(idCombo) {
    var ur = CONTROLLERVISITANTE;
    var op = 2;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success: function (data) {
            //alert(data)
            var ret = eval('(' + data + ')');
            try {
                $listarCombo = $("#" + idCombo);
                $listarCombo.html('');
                var option = $("<option value=''>Seleccione</option>");
                $listarCombo.append(option);
                for (var i = 0; i < ret.length; i++) {
                    var option = $("<option  value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                    $listarCombo.append(option);
                }

            } catch (e) { }
        },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listartelefono(valor) {
    var idObrero = valor.value;
    var ur = CONTROLLERVISITANTE;
    var op = 3;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op,
            idObrero: idObrero
        }),
        success: function (data) {
            //alert(data)
            var ret = eval('(' + data + ')');
            try {
                var numCelular = ret[0].NUMEROTELEFONO;
                var tipoReferencia = $("#cmbReferencia").val();
                if (tipoReferencia == 1) {
                    $("#txtTelefonoOb").val(numCelular);
                } else {
                    $("#txtTelefonoVs").val(numCelular);
                }
            } catch (e) { }
        },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });

}
function listarTipoDocumento(idCombo) {
    var ur = CONTROLLERVISITANTE;
    var op = 4;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success: function (data) {
            //alert(data)
            var ret = eval('(' + data + ')');
            try {
                $listarCombo = $("#" + idCombo);
                $listarCombo.html('');
                var option = $("<option value=''>Seleccione</option>");
                $listarCombo.append(option);
                for (var i = 0; i < ret.length; i++) {
                    var option = $("<option  value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                    $listarCombo.append(option);
                }
            } catch (e) { }
        },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listarComboCiudad(valor, idCombo) {
    var idDepartamento = valor.value;
    var ur = CONTROLLERVISITANTE;
    var op = 5;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op,
            idDepartamento: idDepartamento
        }),
        success: function (data) {
            var ret = eval('(' + data + ')');
            try {
                $listarCombo = $("#" + idCombo);
                $listarCombo.html('');
                var option = $("<option value=''>Seleccione</option>");
                $listarCombo.append(option);
                for (var i = 0; i < ret.length; i++) {
                    var option = $("<option  value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                    $listarCombo.append(option);
                }
            } catch (e) { }
        },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listarComboBarrio(valor, idCombo) {
    var idCiudad = valor.value;
    var ur = CONTROLLERVISITANTE;
    var op = 6;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op,
            idCiudad: idCiudad
        }),
        success: function (data) {
            var ret = eval('(' + data + ')');
            try {
                $listarCombo = $("#" + idCombo);
                $listarCombo.html('');
                // var option = $("<option value=''>Seleccione</option>");
                $listarCombo.append(option);
                for (var i = 0; i < ret.length; i++) {
                    var option = $("<option  value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                    $listarCombo.append(option);
                }
            } catch (e) { }
        },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });

}

function listarEstadoCivil(idCombo) {
    var ur = CONTROLLERVISITANTE;
    var op = 7;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success: function (data) {
            var ret = eval('(' + data + ')');
            try {
                $listarCombo = $("#" + idCombo);
                $listarCombo.html('');
                var option = $("<option value=''>Seleccione</option>");
                $listarCombo.append(option);
                for (var i = 0; i < ret.length; i++) {
                    var option = $("<option  value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                    $listarCombo.append(option);
                }
            } catch (e) { }
        },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listarComboDepartamento(idCombo) {
    var ur = CONTROLLERVISITANTE;
    var op = 8;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success: function (data) {
            var ret = eval('(' + data + ')');
            try {
                $listarCombo = $("#" + idCombo);
                $listarCombo.html('');
                var option = $("<option value=''>Seleccione</option>");
                $listarCombo.append(option);
                for (var i = 0; i < ret.length; i++) {
                    var option = $("<option  value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                    $listarCombo.append(option);
                }
            } catch (e) { }
        },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listarComboSexo(idCombo) {
    var ur = CONTROLLERVISITANTE;
    var op = 9;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success: function (data) {
            var ret = eval('(' + data + ')');
            try {
                $listarCombo = $("#" + idCombo);
                $listarCombo.html('');
                var option = $("<option value=''>Seleccione</option>");
                $listarCombo.append(option);
                for (var i = 0; i < ret.length; i++) {
                    var option = $("<option  value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                    $listarCombo.append(option);
                }
            } catch (e) { }
        },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function validarCamposVisitanteInvitado() {
    var referencia = $("#cmbReferencia").val();
    var fechaActual = $("#fechaActual").val();
    var terConso = $("#cmbNombConso").val();
    var terPasPrin = $("#cmbCodPastInm").val();
    var terObrero = $("#cmbNombreObrero").val();
    var tipoDocVisInv = $("#cmbTipoDocumentoVi").val();
    var editarVisInv = $("#txtEditarVi").val();
    var idVisInv = $("#txtIdVi").val();
    var terInvVis = $("#txtTeridVi").val();
    var docVisInv = $("#txtDocumentoVi").val();
    var primerNombreVisInv = $("#txtPrimerNombreVi").val();
    var segundoNombreVisInv = $("#txtSegundoNombreVi").val();
    var primerApellidoVisInv = $("#txtPrimerApellidoVi").val();
    var segundoApellidoVisInv = $("#txtSegundoApellidoVi").val();
    var departamento = $("#cmbDepartamentoVi").val();
    var ciudad = $("#cmbCiudadVi").val();
    var barrio = $("#cmbBarrioVi").val();
    var direccion = $("#txtDireccionVi").val();
    var edad = $("#txtEdadVi").val();
    var sexo = $("#cmbSexoVi").val();
    var celular = $("#txtCelularVi").val();
    var estadoCivil = $("#cmbEstadoCivilVi").val();

    if (referencia.length === 0) {
        alertify.alert('Por favor seleccione tipo de referencia');
    } else if (fechaActual.length === 0) {
        alertify.alert('Por favor seleccione la fecha de registro');
    } else if (terConso.length === 0) {
        alertify.alert('Por favor seleccione un consolidador');
    } else if (terPasPrin.length === 0) {
        alertify.alert('Por favor seleccione el codigo de pastor inmediato');
    } else if (terObrero.length === 0) {
        alertify.alert('Por favor seleccione un obrero');
    } else if (tipoDocVisInv.length === 0) {
        alertify.alert('Por favor seleccione tipo de documento');
    } else if (docVisInv.length === 0) {
        alertify.alert('El numero de documento no puede quedar vacio');
    } else if (primerNombreVisInv.length === 0) {
        alertify.alert('El primer nombre no puede quedar vacio');
    } else if (primerApellidoVisInv.length === 0) {
        alertify.alert('El primer apellido no puede quedar vacio');
    } else if (segundoApellidoVisInv.length === 0) {
        alertify.alert('El segundo apellido no puede quedar vacio');
    } else if (departamento.length === 0) {
        alertify.alert('Por favor seleccione un departamento');
    } else if (ciudad.length === 0) {
        alertify.alert('Por favor seleccione una ciudad');
    } else if (barrio.length === 0) {
        alertify.alert('Por favor seleccione un barrio');
    } else if (direccion.length === 0) {
        alertify.alert('Por favor digite la direccion');
    } else if (edad.length === 0) {
        alertify.alert('La edad no puede quedar vacia');
    } else if (sexo.length === 0) {
        alertify.alert('La edad no puede quedar vacia');
    } else if (celular.length === 0) {
        alertify.alert('El numero de celular no puede quedar vacio');
    } else if (estadoCivil.length === 0) {
        alertify.alert('Por favor seleccione el estado civil');
    } else {
        alertify.confirm('Mnesaje', 'Esta seguro de realizar el registro', function () {
            registrarVisitanteInvitado(referencia, fechaActual, terConso, terPasPrin, terObrero, tipoDocVisInv, docVisInv, primerNombreVisInv, segundoNombreVisInv, primerApellidoVisInv, segundoApellidoVisInv, departamento, ciudad, barrio, direccion, edad, sexo, celular, estadoCivil, editarVisInv, idVisInv, terInvVis);
        }, function () { });
    }
}

function registrarVisitanteInvitado(referencia, fechaActual, terConso, terPasPrin, terObrero, tipoDocVisInv, docVisInv, primerNombreVisInv, segundoNombreVisInv, primerApellidoVisInv, segundoApellidoVisInv, departamento, ciudad, barrio, direccion, edad, sexo, celular, estadoCivil, editarVisInv, idVisInv, terInvVis) {
    var ur = CONTROLLERVISITANTE;
    var op = 10;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op,
            referencia: referencia,
            fechaActual: fechaActual,
            terConso: terConso,
            terPasPrin: terPasPrin,
            terObrero: terObrero,
            tipoDocVisInv: tipoDocVisInv,
            docVisInv: docVisInv,
            primerNombreVisInv: primerNombreVisInv,
            segundoNombreVisInv: segundoNombreVisInv,
            primerApellidoVisInv: primerApellidoVisInv,
            segundoApellidoVisInv: segundoApellidoVisInv,
            departamento: departamento,
            ciudad: ciudad,
            barrio: barrio,
            direccion: direccion,
            celular: celular,
            sexo: sexo,
            edad: edad,
            estadoCivil: estadoCivil,
            editarVisInv: editarVisInv,
            idVisInv: idVisInv,
            terInvVis: terInvVis
        }),
        success: function (data) {
            try {
                var ret = eval('(' + data + ')');
                if (ret.hasOwnProperty("success")) {
                    alertify.success(ret.success);
                    limpiarCamposVisitanteInvitado();
                    //visualizarPastGeneral();
                    //limpiarCampos();
                } else if (ret.hasOwnProperty("error")) {
                    alertify.alert('Mensaje', ret.error);
                }
            } catch (e) { }
        },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function limpiarCamposVisitanteInvitado() {
    $("#cmbReferencia").val('');
    $("#fechaActual").val('');
    $("#cmbNombConso").val('');
    $("#cmbCodPastInm").val('');
    $("#cmbNombreObrero").val('');
    $("#cmbTipoDocumentoVi").val('');
    $("#txtEditarVi").val('');
    $("#txtIdVi").val('');
    $("#txtTeridVi").val('');
    $("#txtDocumentoVi").val('');
    $("#txtPrimerNombreVi").val('');
    $("#txtSegundoNombreVi").val('');
    $("#txtPrimerApellidoVi").val('');
    $("#txtSegundoApellidoVi").val('');
    $("#cmbDepartamentoVi").val('');
    $("#cmbCiudadVi").val('');
    $("#cmbBarrioVi").val('');
    $("#txtDireccionVi").val('');
    $("#txtEdadVi").val('');
    $("#cmbSexoVi").val('');
    $("#txtCelularVi").val('');
    $("#cmbEstadoCivilVi").val('');
}

var listarVisitante = "";

function visualizarVisitanteInv() {
    $("#tbl_visitante_invitado").html("<label style='float:left; margin-left:48%; margin-top:15%; font-size:15px;'>Cargando...</label><img src=''  style='float:left; margin-top:%; margin-left:49%; width:5%;'>");
    var ur = CONTROLLERVISITANTE;
    var op = 11;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        cache: false,
        dataType: "html",
        success: function (data) {
            var ret = "";
            try {
                ret = eval('(' + data + ')');
                listarVisitante = ret;
                if (ret.hasOwnProperty("error")) {
                    alertify.error(ret.error);
                } else {
                    $listaUsuario = $("#tbl_visitante_invitado");
                    $listaUsuario.html('');
                    var thead = $("<thead></thead>");
                    $listaUsuario.append(thead);
                    var tr = $("<tr class='info'></tr>");
                    thead.append(tr);
                    var th = $("<th style=''>DOCUMENTO</th>");
                    tr.append(th);
                    var th = $("<th style=''>NOMBRE Y APELLIDO</th>");
                    tr.append(th);
                    th = $("<th style=''>OBRERO</th>");
                    tr.append(th);
                    var th = $("<th style=''>CONSOLIDADOR</th>");
                    tr.append(th);
                    var th = $("<th style='width: 2%;'><i class='fa fa-pencil-square-o'aria-hidden='true'></i></th>");
                    tr.append(th);
                    var tbody = $("<tbody></tbody>");
                    $listaUsuario.append(tbody);
                    for (var i = 0; i < ret.length; i++) {
                        var tr = $("<tr class='tblFiltrarUsuario' oncontextmenu=\"colorCeldas(this,4,'" + i + "');\"  style  = 'cursor:pointer;'></tr>");
                        tbody.append(tr);
                        var td = $("<td>" + (ret[i].hasOwnProperty("DOCUMENTO") ? ret[i].DOCUMENTO : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("NOMBRE") ? ret[i].NOMBRE : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("OBRERO") ? ret[i].OBRERO : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("CONSOLIDADOR") ? ret[i].CONSOLIDADOR : "") + "</td>");
                        tr.append(td);
                        var td = $("<td onclick =\"consultarInformacionVisitInv('" + i + "');\" '><i class='fa fa-pencil-square-o' aria-hidden='true'></i></td>");
                        tr.append(td);

                    }
                }
            } catch (e) { }
        },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function consultarInformacionVisitInv(index) {
    alertify.confirm('Mnesaje', 'Esta seguro de Editar el registro', function () {
        //debugger;

        var fechaRegistro = listarVisitante[index].FECHA_REGISTRO;
        var terconso = listarVisitante[index].TER_CONSO;
        var codpastor = listarVisitante[index].PAST_PRINC;
        var terobr = listarVisitante[index].TER_OBR;

        $("#fechaActual").val(fechaRegistro);
        $("#cmbNombConso").val(terconso).change();
        $("#cmbCodPastInm").val(codpastor).change();
        $("#cmbNombreObrero").val(terobr).change();
        /*var tipoDocumento = listarPastGeneral[index].TIPO_DOCUMENTO;
        var documento = listarPastGeneral[index].DOCUMENTO;
        var pNombre = listarPastGeneral[index].PRIMER_NOMBRE;
        var sNombre = listarPastGeneral[index].SEGUNDO_NOMBRE;
        var pApellido = listarPastGeneral[index].PRIMER_APELLIDO;
        var sApellido = listarPastGeneral[index].SEGUNDO_APELLIDO;
        var dep_id = listarPastGeneral[index].DEPARTAMENTO;
        var ciu_id = listarPastGeneral[index].CIUDAD;
        var barrio_id = listarPastGeneral[index].BARRIO;
        var direccion = listarPastGeneral[index].DIRECCION;
        var telefono = listarPastGeneral[index].TELEFONO;
        var celular = listarPastGeneral[index].CELULAR;
        var sexo = listarPastGeneral[index].SEXO;
        var edad = listarPastGeneral[index].EDAD;
        var etcCivil = listarPastGeneral[index].EST_CIVIL;
        var min_id = listarPastGeneral[index].MINISTERIO_ID;
        var codigo = listarPastGeneral[index].CODIGO;
        var estado = listarPastGeneral[index].ESTADO_ID;
        var past_id = listarPastGeneral[index].PASTGEN_ID;
        var ter_id = listarPastGeneral[index].TER_ID;


        

        $("#cmbTipoDocumentoPg").val(tipoDocumento);
        $("#txtDocumentoPg").prop('disabled', true);
        $("#txtDocumentoPg").val(documento);
        $("#txtPrimerNombrePg").val(pNombre);
        $("#txtSegundoNombrePg").val(sNombre);
        $("#txtPrimerApellidoPg").val(pApellido);
        $("#txtSegundoApellidoPg").val(sApellido);
        setTimeout(() => {
            $("#cmbDepartamentoPg").val(dep_id).change();
        }, 500);
        setTimeout(() => {
            $("#cmbCiudadPg").val(ciu_id).change();
        }, 1000);
        setTimeout(() => {
            $("#cmbBarrioPg").val(barrio_id).change();
        }, 1500);
        $("#txtDireccionpg").val(direccion);
        $("#txtTelefonopg").val(telefono);
        $("#txtCelularpg").val(celular);
        $("#cmbSexoPg").val(sexo).change();
        $("#txtEdadpg").val(edad);
        $("#cmbEstadoCivilPg").val(etcCivil).change();
        $("#cmbMinisterioPg").val(min_id).change();
        $("#txtCodigopg").val(codigo);
        $("#cmbEstado").val(estado).change();
        $("txtIdPg").val(past_id);
        $("txtTerPg_id").val(ter_id);
        $("#txtEditarPg").val(1);

        $("#btnGuardarPastorPg").html("Actualizar");*/


    }, function () { });

}