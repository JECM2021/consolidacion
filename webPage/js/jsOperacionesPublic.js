/* global tarifario, CONTROLLERPUBLIC, alertify */

$(document).ready(function () {
    choices = [];
    procedures = [];
    specialization = [];
    servicios = [];
    minorProcedure = [];
    arrayOcupaciones = [];
});
function listarComboTipoDocumento(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 1;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listarComboSexo(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 2;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboTipoPaiente(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 3;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboGrupoSanguineo(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 4;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboCiudades(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 5;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op

        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboOcupacion_(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 12;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listarComboOcupacion() {
    var ur = CONTROLLERPUBLIC;
    var op = 12;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    arrayOcupaciones = [];
                    try {
                        for (var i = 0; i < ret.length; i++) {
                            arrayOcupaciones.push(ret[i].DESCRIPCION);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboDepartamento(valor, idCombo) {
    var idCiudad = valor.value;
    var ur = CONTROLLERPUBLIC;
    var op = 11;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op,
            idCiudad: idCiudad

        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
//                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboEstadoCivil(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 6;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboTarifario(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 8;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value='-1'>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboProcedimiento(idCombo, isOrdenMedica, isOrdenServicio) {
    var ur = CONTROLLERPUBLIC;
    var op = 9;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op,
            isOrdenMedica: isOrdenMedica,
            isOrdenServicio: isOrdenServicio

        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboServicios(idCombo, prmPro) {
    var ur = CONTROLLERPUBLIC;
    var op = 13;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op,
            idProcedimiento: prmPro,
            tarifario: tarifario

        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    servicios = [];
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            servicios.push({codigo: ret[i].codigo, id: ret[i].ID, valor: ret[i].tarifa});
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listarComboPlantel(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 14;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboMovil(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 15;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listarComboCodigosEi10() {
    var ur = CONTROLLERPUBLIC;
    var op = 16;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    choices = [];
                    try {
                        for (var i = 0; i < ret.length; i++) {
                            choices.push(ret[i].DESCRIPCION);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listarComboEstadoTriage(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 17;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboRerencias(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 18;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboTipoPlaca(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 19;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function conxecutivoDocumentos(input, tipoConsecutivo) {
    var ur = CONTROLLERPUBLIC;
    var op = 20;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op,
            tipoConsecutivo: tipoConsecutivo
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $("#" + input).val(ret[0].consecutivo);
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function conxecutivoResolucion(input) {
    var ur = CONTROLLERPUBLIC;
    var op = 21;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $("#" + input).val(ret[0].consecutivo);

                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboTipoCaso(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 23;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}




function desglosarCadenasPublic(cadena) {
    var codigos = new Array();
    var isCodigos = true;
    var armarCadenaCodigo = "";
    var armarCadenaDescripcion = "";
    for (var i = 0; i < cadena.length; i++) {
        var caracter = cadena.charAt(i);
        if (caracter === "|") {
            isCodigos = false;
        }
        if (isCodigos) {
            armarCadenaCodigo += armarCadenaCodigo = caracter;
        } else {
            if (caracter !== "|") {
                armarCadenaDescripcion += armarCadenaDescripcion = caracter;
            }
        }
    }
    codigos.push({codigo: armarCadenaCodigo, descripcion: armarCadenaDescripcion});
    return codigos;
}

function listarComboProcedimientos() {
    var ur = CONTROLLERPUBLIC;
    var op = 22;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    procedures = [];
                    try {
                        for (var i = 0; i < ret.length; i++) {
                            procedures.push(ret[i].DESCRIPCION);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboMedicosEspecialista() {
    var ur = CONTROLLERPUBLIC;
    var op = 24;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    specialization = [];
                    try {
                        for (var i = 0; i < ret.length; i++) {
                            specialization.push({value: ret[i].DESCRIPCION, label: ret[i].DOCUMENTO});
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listarComboAmbito(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 25;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboAnestesia(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 26;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboTipoProcedimiento(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 27;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboServiciosEpicrisis(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 28;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboFinalidad(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 29;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboRealizacion(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 30;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboAtendidoPor(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 31;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboProcedimientosMenores() {
    var ur = CONTROLLERPUBLIC;
    var op = 32;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    minorProcedure = [];
                    try {
                        for (var i = 0; i < ret.length; i++) {
                            minorProcedure.push(ret[i].DESCRIPCION);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}


function cambiarContrasena() {
    var contraActual = $("#txtContrasenaAnterior").val();
    var contrasenaNueva = $("#txtContrasenaNueva").val();
    var confirmarContrasena = $("#txtConfirmarContraena").val();
    if (contraActual.length === 0) {
        alertify.error("La contraseña actual no puede quedar vacia.");
    } else if (contrasenaNueva.length === 0) {
        alertify.error("La contraseña nueva no puede quedar vacia.");
    } else if (confirmarContrasena.length === 0) {
        alertify.error("Es necesario confirmar la contraseña.");
    } else {
        if (contraActual !== contrasenaNueva) {
            if (contrasenaNueva === confirmarContrasena) {
                var ur = CONTROLLERPUBLIC;
                var op = 33;
                $.ajax({
                    type: "POST",
                    url: ur,
                    data: ({
                        op: op,
                        contraActual: contraActual,
                        contrasenaNueva: contrasenaNueva,
                        confirmarContrasena: confirmarContrasena

                    }),
                    success:
                            function (data) {
                                try {
                                    var ret = eval('(' + data + ')');
                                    if (ret.hasOwnProperty("success")) {
                                        location.href = "/clinicasv/php_cerrar";
                                    } else if (ret.hasOwnProperty("mensaje")) {
                                        alertify.error(ret.mensaje);
                                    }
                                } catch (e) {
                                }
                            },
                    error: function (objeto, error, error2) {
                        alertify.alert(error);
                    }
                });
            } else {
                alertify.error("La contraseña nueva no coincide con la confirmacion");
            }
        } else {
            alertify.error("La contraseña nueva no puede ser igual a la anterior.");
        }
    }
}

function listarComboPatologia(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 34;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboDestinoSalida(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 35;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarFuncionesIntenvertores(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 36;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}


//===========================FUNCIONES ======================
function filtrarDatos(txtInput, txtTabla) {

    $("#" + txtInput).on('keyup', function () {
        var string = new RegExp(this.value, 'i');
        $('.' + txtTabla).each(function () {
            if (string.test(this.innerHTML))
                $(this).show();
            else
                $(this).hide();
        });
    });
}
var filaSelCel = [undefined];
function colorCeltaTabla(celda, index, fila) {

    try {
        if (filaSelCel[index] !== undefined) {
            filaSelCel[index].style.backgroundColor = "transparent";
        }
    } catch (e) {
    }
    celda.style.backgroundColor = "rgb(168, 204, 236)";
    filaSelCel[index] = celda;
}

function quitarEspacios(idCampo) {
    $("#" + idCampo).val($("#" + idCampo).val().trim());
}
function optenerValorReferenciaP(codigo, input) {
    var ur = CONTROLLERPUBLIC;
    var op = 37;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op,
            codigo: codigo
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $("#" + input).val(ret[0].valor);
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listarComboTipoCliente(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 38;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboLotesBodega(bodega, idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 39;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op,
            bodegaLote: bodega
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function ListarComboBodegas(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 40;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listarComboTipoMoviento(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 41;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function ListarComboBodegaGeneral(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 42;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function ListarLaboratorio(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 43;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboInsulina(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 45;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarParteCuerpo(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 46;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        var lisParteCuerpo = $("#" + idCombo);
                        lisParteCuerpo.html('');
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].NOMBRE + "</option>");
                            lisParteCuerpo.append(option);
                        }

                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

var listaCausas = "";
function listarCausas() {
    var ur = CONTROLLERPUBLIC;
    var op = 47;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        listaCausas = ret;
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboAreaRurales(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 48;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboEstadoVehiculo(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 49;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarComboTipoVehiculo(idCombo) {
    var ur = CONTROLLERPUBLIC;
    var op = 50;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listarComboLaboratorios(idCombo){
    var ur = CONTROLLERPUBLIC;
    var op = 51;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option data-codigo ='"+ ret[i].CODIGO +"' value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}
function listarExemenesLaboratorio(idCombo, prmPro) {
    var ur = CONTROLLERPUBLIC;
    var op = 52;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op,
            idProcedimiento: prmPro,
            tarifario: tarifario

        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    try {
                        $listarCombo = $("#" + idCombo);
                        $listarCombo.html('');
                        var option = $("<option value=''>Seleccione</option>");
                        $listarCombo.append(option);
                        for (var i = 0; i < ret.length; i++) {
                            var option = $("<option value = " + ret[i].ID + ">" + ret[i].DESCRIPCION + "</option>");
                            $listarCombo.append(option);
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

