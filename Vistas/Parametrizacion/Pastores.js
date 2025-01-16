$(document).ready(function() {
    /*$('#txtNumeroFactura').keypress(function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode === 13) {
            consultarFactura();
        }
    });*/


    $("#btnGuardarPastorPg").click(function() {
        validarCamposPastorGeneral();
    });


    listarTipoDocumento('cmbTipoDocumentoPg');
    listarComboSexo('cmbSexoPg');
    listarComboDepartamento('cmbDepartamentoPg');
    listarEstadoCivil('cmbEstadoCivilPg');
    listarMinisterios('cmbMinisterioPg');
    visualizarPastGeneral();

});

function listarTipoDocumento(idCombo) {
    var ur = CONTROLLERPASTORES;
    var op = 1;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success: function(data) {
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
            } catch (e) {}
        },
        error: function(objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listarComboSexo(idCombo) {
    var ur = CONTROLLERPASTORES;
    var op = 2;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success: function(data) {
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
            } catch (e) {}
        },
        error: function(objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listarComboDepartamento(idCombo) {
    var ur = CONTROLLERPASTORES;
    var op = 3;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success: function(data) {
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
            } catch (e) {}
        },
        error: function(objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listarComboCiudad(valor, idCombo) {
    var idDepartamento = valor.value;
    var ur = CONTROLLERPASTORES;
    var op = 4;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op,
            idDepartamento: idDepartamento
        }),
        success: function(data) {
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
            } catch (e) {}
        },
        error: function(objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listarComboBarrio(valor, idCombo) {
    var idCiudad = valor.value;
    var ur = CONTROLLERPASTORES;
    var op = 5;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op,
            idCiudad: idCiudad
        }),
        success: function(data) {
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
            } catch (e) {}
        },
        error: function(objeto, error, error2) {
            alertify.alert(error);
        }
    });

}

function listarEstadoCivil(idCombo) {
    var ur = CONTROLLERPASTORES;
    var op = 6;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success: function(data) {
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
            } catch (e) {}
        },
        error: function(objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function listarMinisterios(idCombo) {
    var ur = CONTROLLERPASTORES;
    var op = 7;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success: function(data) {
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
            } catch (e) {}
        },
        error: function(objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

function validarCamposPastorGeneral() {
    var tipoDocumento = $("#cmbTipoDocumentoPg").val();
    var numDocumento = $("#txtDocumentoPg").val();
    var primerNombre = $("#txtPrimerNombrePg").val();
    var segundoNombre = $("#txtSegundoNombrePg").val();
    var primerApellido = $("#txtPrimerApellidoPg").val();
    var segundoApellido = $("#txtSegundoApellidoPg").val();
    var departamento = $("#cmbDepartamentoPg").val();
    var ciudad = $("#cmbCiudadPg").val();
    var barrios = $("#cmbBarrioPg").val();
    var direccion = $("#txtDireccionpg").val();
    var telefono = $("#txtTelefonopg").val();
    var celular = $("#txtCelularpg").val();
    var sexo = $("#cmbSexoPg").val();
    var edad = $("#txtEdadpg").val();
    var estadoCivil = $("#cmbEstadoCivilPg").val();
    var ministerio = $("#cmbMinisterioPg").val();
    var codigoPastor = $("#txtCodigopg").val();
    var editarPg = $("#txtEditarPg").val();
    var idPg = $("#txtIdPg").val();

    if (tipoDocumento.length === 0) {
        alertify.alert('Por favor seleccione tipo de documento');
    } else if (numDocumento.length === 0) {
        alertify.alert('Por favor diigitar el numero de documento');
    } else if (primerNombre.length === 0) {
        alertify.alert('El primer nombre no puede quedar vacio');
    } else if (primerApellido.length === 0) {
        alertify.alert('El primer apellido no puede quedar vacio');
    } else if (departamento.length === 0) {
        alertify.alert('Por favor seleccione un departamento');
    } else if (ciudad.length === 0) {
        alertify.alert('Por favor seleccione una ciudad');
    } else if (barrios.length === 0) {
        alertify.alert('Por favor seleccione un barrio');
    } else if (direccion.length === 0) {
        alertify.alert('Por favor digitar la direccion');
    } else if (celular.length === 0) {
        alertify.alert('Por favor digitar el numuero celular');
    } else if (sexo.length === 0) {
        alertify.alert('Por favor seleccione el sexo');
    } else if (edad.length === 0) {
        alertify.alert('La edad no puede quedar vacio');
    } else if (estadoCivil.length === 0) {
        alertify.alert('Por favor seleccione el estado civil');
    } else if (ministerio.length === 0) {
        alertify.alert('Por favor seleccione un ministerio');
    } else if (codigoPastor.length === 0) {
        alertify.alert('Por favor digitar el codigo pastor');
    } else {
        alertify.confirm('Mnesaje', 'Esta seguro de realizar el registro', function() {
            registrarPastorGeneral(tipoDocumento, numDocumento, primerNombre, segundoNombre, primerApellido, segundoApellido, departamento, ciudad, barrios, direccion, telefono, celular, sexo, edad, estadoCivil, ministerio, codigoPastor, editarPg, idPg);
        }, function() {});
    }
}

function registrarPastorGeneral(tipoDocumento, numDocumento, primerNombre, segundoNombre, primerApellido, segundoApellido, departamento, ciudad, barrios, direccion, telefono, celular, sexo, edad, estadoCivil, ministerio, codigoPastor, editarPg, idPg) {
    var ur = CONTROLLERPASTORES;
    var op = 8;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op,
            tipoDocumento: tipoDocumento,
            numDocumento: numDocumento,
            primerNombre: primerNombre,
            segundoNombre: segundoNombre,
            primerApellido: primerApellido,
            segundoApellido: segundoApellido,
            departamento: departamento,
            ciudad: ciudad,
            barrios: barrios,
            direccion: direccion,
            telefono: telefono,
            celular: celular,
            sexo: sexo,
            edad: edad,
            estadoCivil: estadoCivil,
            ministerio: ministerio,
            codigoPastor: codigoPastor,
            editarPg: editarPg,
            idPg: idPg
        }),
        success: function(data) {
            try {
                var ret = eval('(' + data + ')');
                if (ret.hasOwnProperty("success")) {
                    alertify.success(ret.success);
                    //$('#tbl_visualizar_cargos').DataTable().ajax.reload();
                    //limpiarCampos();

                } else if (ret.hasOwnProperty("error")) {
                    alertify.alert('Mensaje', ret.error);
                }
            } catch (e) {}
        },
        error: function(objeto, error, error2) {
            alertify.alert(error);
        }
    });
}

var listarPastGeneral = "";

function visualizarPastGeneral() {
    $("#tbl_visualizar_PastGeneral").html("<label style='float:left; margin-left:48%; margin-top:15%; font-size:15px;'>Cargando...</label><img src=''  style='float:left; margin-top:%; margin-left:49%; width:5%;'>");
    var ur = CONTROLLERPASTORES;
    var op = 9;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        cache: false,
        dataType: "html",
        success: function(data) {
            var ret = "";
            try {
                ret = eval('(' + data + ')');
                debugger;
                listarPastGeneral = ret;
                if (ret.hasOwnProperty("error")) {
                    alertify.error(ret.error);
                } else {
                    $listaUsuario = $("#tbl_visualizar_PastGeneral");
                    $listaUsuario.html('');
                    var thead = $("<thead></thead>");
                    $listaUsuario.append(thead);
                    var tr = $("<tr class='info'></tr>");
                    thead.append(tr);
                    var th = $("<th style=''>CODIGO</th>");
                    tr.append(th);
                    var th = $("<th style=''>NOMBRE Y APELLIDO</th>");
                    tr.append(th);
                    th = $("<th style=''>MINISTERIO</th>");
                    tr.append(th);
                    var th = $("<th style=''>ESTADO</th>");
                    tr.append(th);
                    var th = $("<th style='width: 2%;'><i class='fa fa-pencil-square-o'aria-hidden='true'></i></th>");
                    tr.append(th);
                    var tbody = $("<tbody></tbody>");
                    $listaUsuario.append(tbody);
                    for (var i = 0; i < ret.length; i++) {
                        var tr = $("<tr class='tblFiltrarUsuario' oncontextmenu=\"colorCeldas(this,4,'" + i + "');\"  style  = 'cursor:pointer;'></tr>");
                        tbody.append(tr);
                        var td = $("<td>" + (ret[i].hasOwnProperty("CODIGO") ? ret[i].CODIGO : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("NOMBRE") ? ret[i].NOMBRE : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("MINISTERIO") ? ret[i].MINISTERIO : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("ESTADO") ? ret[i].ESTADO : "") + "</td>");
                        tr.append(td);
                        var td = $("<td onclick =\"consultarInformacionPastGeneral('" + i + "');\"  data-toggle='modal' data-target='#modalEdiPastorGeneral'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></td>");
                        tr.append(td);

                    }
                }
            } catch (e) {}
        },
        error: function(objeto, error, error2) {
            alertify.alert(error);
        }
    });
}