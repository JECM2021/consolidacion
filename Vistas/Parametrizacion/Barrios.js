$(document).ready(function () {

    $("#btnGuardarBarrio").click(function () {
        validarCamposBarrios();
    });

    $("#btnCancelarBarrio").click(function () {
        limpiarCampos();
    });

    listarComboDepartamento('cmbDepartamento');


    visualizarBarrios();

});


function listarComboDepartamento(idCombo) {
    var ur = CONTROLLERBARRIOS;
    var op = 1;
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

function listarComboCiudad(valor, idCombo) {
    var idDepartamento = valor.value;
    var ur = CONTROLLERBARRIOS;
    var op = 2;
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


function validarCamposBarrios() {
    var idDepartamento = $("#cmbDepartamento").val();
    var idCiudad = $("#cmbCiudad").val();
    var nombreBarrio = $("#txtBarrio").val();
    var idBarrio = $("#txtIdBarrio").val();
    var idEditar = $("#txtEditarBarrio").val();

    if (idDepartamento.length === 0) {
        alertify.alert('Por favor seleccione el departamento');
    } else if (idCiudad.length === 0) {
        alertify.alert('Por favor seleccione la ciudad');
    } else if (nombreBarrio.length === 0) {
        alertify.alert('Por favor escriba el nombre del barrio');
    } else {
        registrarBarrio(idCiudad, nombreBarrio, idBarrio, idEditar);
    }

}

function registrarBarrio(idCiudad, nombreBarrio, idBarrio, idEditar) {
    var ur = CONTROLLERBARRIOS;
    var op = 3;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op,
            idCiudad: idCiudad,
            nombreBarrio: nombreBarrio,
            idBarrio: idBarrio,
            idEditar: idEditar

        }),
        success: function (data) {
            try {
                var ret = eval('(' + data + ')');
                if (ret.hasOwnProperty("success")) {
                    alertify.success(ret.success);
                    visualizarBarrios();
                    limpiarCampos();

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

var listarBarrios = "";

function visualizarBarrios() {
    $("#tbl_visualizar_Barrios").html("<label style='float:left; margin-left:48%; margin-top:15%; font-size:15px;'>Cargando...</label><img src=''  style='float:left; margin-top:%; margin-left:49%; width:5%;'>");
    var ur = CONTROLLERBARRIOS;
    var op = 4;
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
                listarBarrios = ret;
                if (ret.hasOwnProperty("error")) {
                    alertify.error(ret.error);
                } else {
                    $listaUsuario = $("#tbl_visualizar_Barrios");
                    $listaUsuario.html('');
                    var thead = $("<thead></thead>");
                    $listaUsuario.append(thead);
                    var tr = $("<tr class='info'></tr>");
                    thead.append(tr);
                    th = $("<th style=''>DEPARTAMENTO</th>");
                    tr.append(th);
                    var th = $("<th style=''>CIUDAD</th>");
                    tr.append(th);
                    var th = $("<th style=''>BARRIO</th>");
                    tr.append(th);
                    var th = $("<th style='width: 2%;'><i class='fa fa-pencil-square-o'aria-hidden='true'></i></th>");
                    tr.append(th);
                    var tbody = $("<tbody></tbody>");
                    $listaUsuario.append(tbody);
                    for (var i = 0; i < ret.length; i++) {
                        var tr = $("<tr class='tblFiltrarUsuario' oncontextmenu=\"colorCeldas(this,4,'" + i + "');\"  style  = 'cursor:pointer;'></tr>");
                        tbody.append(tr);
                        var td = $("<td>" + (ret[i].hasOwnProperty("DEPARTAMENTO") ? ret[i].DEPARTAMENTO : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("CIUDAD") ? ret[i].CIUDAD : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("BARRIO") ? ret[i].BARRIO : "") + "</td>");
                        tr.append(td);
                        var td = $("<td onclick =\"consultarInformacionBarrio('" + i + "');\" '><i class='fa fa-pencil-square-o' aria-hidden='true'></i></td>");
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

function consultarInformacionBarrio(index) {
    alertify.confirm('Mnesaje', 'Esta seguro de Editar el registro', function () {
        //debugger;
        var idBarrio = listarBarrios[index].ID;
        var idDept = listarBarrios[index].IDDEPT;
        var idCiud = listarBarrios[index].IDCUID;
        var barrio = listarBarrios[index].BARRIO;

        $("#txtIdBarrio").val(idBarrio);

        $("#cmbDepartamento").val(idDept).change();
        setTimeout(function () {
            $("#cmbCiudad").val(idCiud).change();
        }, 200);
        $("#txtBarrio").val(barrio);
        $("#txtEditarBarrio").val(1);

        $("#btnGuardarBarrio").html("Actualizar");


    }, function () { });

}

function limpiarCampos() {
    $("#cmbDepartamento").val('').change();
    $("#cmbCiudad").val('').change();
    $("#txtBarrio").val('');
    $("#txtEditarBarrio").val('');
    $("#txtIdBarrio").val('');
    $("#btnGuardarBarrio").html("Guardar");
}