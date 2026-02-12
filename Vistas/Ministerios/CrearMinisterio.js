$(document).ready(function () {

    $("#btnGuardarMinisterios").click(function () {
        validarCamposMinisterio();
    });

    $("#btnCancelarMinisterios").click(function () {
        limpiarCampos();
    });

    visualizarMinisterios();

});

var listarMinisterios = "";

function visualizarMinisterios() {
    $("#tbl_visualizar_Ministerios").html("<label style='float:left; margin-left:48%; margin-top:15%; font-size:15px;'>Cargando...</label><img src=''  style='float:left; margin-top:%; margin-left:49%; width:5%;'>");
    var ur = CONTROLLERMINISTERIOS;
    var op = 1;
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
                listarMinisterios = ret;
                if (ret.hasOwnProperty("error")) {
                    alertify.error(ret.error);
                } else {
                    $listaUsuario = $("#tbl_visualizar_Ministerios");
                    $listaUsuario.html('');
                    var thead = $("<thead></thead>");
                    $listaUsuario.append(thead);
                    var tr = $("<tr class='info'></tr>");
                    thead.append(tr);
                    th = $("<th style=''>NOMBRE MINISTERIO</th>");
                    tr.append(th);
                    var th = $("<th style=''>ESTADO</th>");
                    tr.append(th);
                    var th = $("<th style='width: 2%;'><i class='fa fa-pencil-square-o'aria-hidden='true'></i></th>");
                    tr.append(th);
                    var th = $("<th style='width: 2%;'><i class='fa fa-trash'aria-hidden='true'></i></th>");
                    tr.append(th);
                    var tbody = $("<tbody></tbody>");
                    $listaUsuario.append(tbody);
                    for (var i = 0; i < ret.length; i++) {
                        var tr = $("<tr class='tblFiltrarUsuario' oncontextmenu=\"colorCeldas(this,4,'" + i + "');\"  style  = 'cursor:pointer;'></tr>");
                        tbody.append(tr);
                        var td = $("<td>" + (ret[i].hasOwnProperty("MINISTERIO") ? ret[i].MINISTERIO : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("ESTADO") ? ret[i].ESTADO : "") + "</td>");
                        tr.append(td);
                        var td = $("<td onclick =\"consultarInformacionMinisterio('" + i + "');\" '><i class='fa fa-pencil-square-o' aria-hidden='true'></i></td>");
                        tr.append(td);
                        var td = $("<td onclick =\"eliminarInformacionMinisterio('" + i + "');\" '><i class='fa fa-trash' aria-hidden='true'></i></td>");
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

function validarCamposMinisterio() {
    var nombre = $("#txtNombreMinisterio").val();
    var estadoMin = $("#cmbEstadoMin").val();
    var idMin = $("#txtIdMin").val();
    var editarMin = $("#txtEditarMin").val();

    if (nombre.length === 0) {
        alertify.alert('Por favor Ingrese el Nombre del Minsiterio');
    } else if (estadoMin.length === 0) {
        alertify.alert('Por favor seleccione estado');
    } else {
        alertify.confirm('Mensaje', 'Esta seguro de realizar el registro', function () {
            registrarMinisterio(nombre, estadoMin, idMin, editarMin)
        }, function () { });
    }
}

function registrarMinisterio(nombre, estadoMin, idMin, editarMin) {
    var ur = CONTROLLERMINISTERIOS;
    var op = 2;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op,
            nombre: nombre,
            estadoMin: estadoMin,
            idMin: idMin,
            editarMin: editarMin
        }),
        success: function (data) {
            try {
                var ret = eval('(' + data + ')');
                if (ret.hasOwnProperty("success")) {
                    alertify.success(ret.success);
                    visualizarMinisterios();
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

function consultarInformacionMinisterio(index) {

    alertify.confirm('Mnesaje', 'Esta seguro de Editar el registro', function () {
        //debugger;
        var ministerio = listarMinisterios[index].MINISTERIO;
        var estado = listarMinisterios[index].ESTADO;
        var idMin = listarMinisterios[index].ID;

        $("#txtIdMin").val(idMin);
        $("#txtNombreMinisterio").val(ministerio);
        $("#cmbEstadoMin").val(estado);
        $("#txtEditarMin").val(1);

        $("#btnGuardarMinisterios").html("Actualizar");


    }, function () { });
}

function eliminarInformacionMinisterio(index) {
    alertify.confirm('Mensaje', 'Esta seguro de Eliminar el registro', function () {
        var idMin = listarMinisterios[index].ID;
        var ur = CONTROLLERMINISTERIOS;
        var op = 3;
        $.ajax({
            type: "POST",
            url: ur,
            data: ({
                op: op,
                idMin: idMin
            }),
            success: function (data) {
                try {
                    var ret = eval('(' + data + ')');
                    if (ret.hasOwnProperty("success")) {
                        alertify.success(ret.success);
                        visualizarMinisterios();
                    } else {
                        alertify.error(ret.error);
                    }
                } catch (e) { }
            },
            error: function (objeto, error, error2) {
                alertify.alert(error);
            }
        });



    }, function () { });
}

function limpiarCampos() {
    $("#txtNombreMinisterio").val('');
    $("#txtEditarMin").val('');
    $("#txtIdMin").val('');
    $("#cmbEstadoMin").val('');
    $("#btnGuardarMinisterios").html("Guardar");
}