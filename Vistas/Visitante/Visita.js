$(document).ready(function () {
    visualizarVisitantes();
    visualizarVisitaRealizada();
});

var listadoVisitantes = "";
function visualizarVisitantes() {
    $("#tboBodyVisitante").html("<label style='float:left; margin-left:249%; margin-top:15%; font-size:11px;'>Cargando...</label><div class='lds-dual-ring' style='float:left; margin-top:%; margin-left:249%; width:5%;'></div>");
    var ur = CONTROLLERVISITA;
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
                listadoVisitantes = ret;
                try {
                    $("#tboBodyVisitante").html('');
                    var listado = $("#tboBodyVisitante");
                    $("#tboBodyVisitante").append(listado);
                    for (var i = 0; i < ret.length; i++) {
                        var tr = $("<tr class='tblFiltradoVisitante' style='cursor:pointer' onclick =\"colorCeltaTabla(this,1,'" + i + "');obtenerDatosVisitante('" + i + "')\" ></tr>");
                        listado.append(tr);
                        var td = $("<td>" + ret[i].NUM_INGRESO + "</td>");
                        tr.append(td);
                        var td = $("<td>" + ret[i].NUM_DOCUMENTO + "</td>");
                        tr.append(td);
                        var td = $("<td>" + ret[i].NOMBRE_COMPLETO + "</td>");
                        tr.append(td);
                        var td = $("<td>" + ret[i].REFERENCIA + "</td>");
                        tr.append(td);
                    }
                } catch (e) {
                }
            },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function obtenerDatosVisitante(index) {
    var nombreCompleto = listadoVisitantes[index].NOMBRE_COMPLETO;
    var idVisitante = listadoVisitantes[index].ID_VIS;

    $("#txtnombreVisitante").val(nombreCompleto);
    $("#txtIdVisitante").val(idVisitante);

    $("#mdlVisita").modal("hide");

}

var visitasRealizadas = "";
function visualizarVisitaRealizada() {
    $("#tbl_visita_realizada").html("<label style='float:left; margin-left:48%; margin-top:15%; font-size:15px;'>Cargando...</label><img src=''  style='float:left; margin-top:%; margin-left:49%; width:5%;'>");
    var ur = CONTROLLERVISITA;
    var op = 2;
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
                visitasRealizadas = ret;
                if (ret.hasOwnProperty("error")) {
                    alertify.error(ret.error);
                } else {
                    $listaVr = $("#tbl_visita_realizada");
                    $listaVr.html('');
                    var thead = $("<thead></thead>");
                    $listaVr.append(thead);
                    var tr = $("<tr class='info'></tr>");
                    thead.append(tr);
                    var th = $("<th style=''>NUMERO INGRESO</th>");
                    tr.append(th);
                    var th = $("<th style=''>DOCUMENTO</th>");
                    tr.append(th);
                    var th = $("<th style=''>NOMBRE Y APELLIDO</th>");
                    tr.append(th);
                    th = $("<th style=''>OBRERO</th>");
                    tr.append(th);
                    var th = $("<th style=''>FECHA DE VISITA</th>");
                    tr.append(th);
                    var th = $("<th style=''>HORA DE VISITA</th>");
                    tr.append(th);
                    var th = $("<th style=''>ASISTE A REDEC</th>");
                    tr.append(th);
                    var th = $("<th style='width: 2%;'><i class='fa fa-pencil-square-o'aria-hidden='true'></i></th>");
                    tr.append(th);
                    var th = $("<th style='width: 2%;'><i class='fa fa-file-pdf-o'aria-hidden='true'></i></th>");
                    tr.append(th);
                    var tbody = $("<tbody></tbody>");
                    $listaVr.append(tbody);
                    for (var i = 0; i < ret.length; i++) {
                        var tr = $("<tr class='tblFiltrarUsuario' oncontextmenu=\"colorCeldas(this,4,'" + i + "');\"  style  = 'cursor:pointer;'></tr>");
                        tbody.append(tr);
                        var td = $("<td>" + (ret[i].hasOwnProperty("NUM_INGRESO") ? ret[i].NUM_INGRESO : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("DOCUMENTO") ? ret[i].DOCUMENTO : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("NOMBRE") ? ret[i].NOMBRE : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("OBRERO") ? ret[i].OBRERO : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("FECHA_VISITA") ? ret[i].FECHA_VISITA : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("HORA_VISITA") ? ret[i].HORA_VISITA : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("ASISTE_REDEC") ? ret[i].ASISTE_REDEC : "") + "</td>");
                        tr.append(td);
                        var td = $("<td onclick =\"consultarInformacionVisita('" + i + "');\" '><i class='fa fa-pencil-square-o' aria-hidden='true'></i></td>");
                        tr.append(td);
                        var td = $("<td onclick =\"ImprimirInformacionVisita('" + i + "');\" '><i class='fa fa-pencil-square-o' aria-hidden='true'></i></td>");
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