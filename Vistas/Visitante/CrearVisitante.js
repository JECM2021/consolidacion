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
    listarPastorInmediato('cmbCodPastInm');
    listarCreyentes('cmbNombConso');
    listarCreyentes('cmbNombreObrero');
    listarTipoDocumento('cmbTipoDocumentoVi');
    listarComboCiudad('cmbCiudadVi');
    listarEstadoCivil('cmbEstadoCivilVi');
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
                $("#txtTelefonoOb").val(numCelular);
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

function listarComboCiudad(idCombo) {
    var ur = CONTROLLERVISITANTE;
    var op = 5;
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