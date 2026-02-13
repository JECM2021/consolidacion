$(document).ready(function () {

    $("#btnGuardarPastorPg").click(function () {
        validarCamposPastorGeneral();
    });

    $("#btnCancelarPastorPg").click(function () {
        limpiarCampos();
    });


    listarTipoDocumento('cmbTipoDocumentoPg');
    listarTipoDocumento('cmbTipoDocumentoPp');

    listarComboSexo('cmbSexoPg');
    listarComboSexo('cmbSexoPp');

    listarComboDepartamento('cmbDepartamentoPg');
    listarComboDepartamento('cmbDepartamentoPp');

    listarEstadoCivil('cmbEstadoCivilPg');
    listarEstadoCivil('cmbEstadoCivilPp');

    listarMinisterios('cmbMinisterioPg');
    listarMinisterios('cmbMinisterioPp');

    listarPastoresGenerales('cmbPastorGeneral');

    visualizarPastGeneral();

    $("#btnGuardarPastorPp").click(function () {
        validarCamposPastorPrincipal();
    });

    visualizarPastPrincipal();

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

function listarComboSexo(idCombo) {
    var ur = CONTROLLERPASTORES;
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

function listarComboDepartamento(idCombo) {
    var ur = CONTROLLERPASTORES;
    var op = 3;
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
    var ur = CONTROLLERPASTORES;
    var op = 4;
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
    var ur = CONTROLLERPASTORES;
    var op = 5;
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
    var ur = CONTROLLERPASTORES;
    var op = 6;
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

function listarMinisterios(idCombo) {
    var ur = CONTROLLERPASTORES;
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
    var ter_id = $("#txtTerPg_id").val();
    var estado = $("#cmbEstado").val();

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
        alertify.confirm('Mnesaje', 'Esta seguro de realizar el registro', function () {
            registrarPastorGeneral(tipoDocumento, numDocumento, primerNombre, segundoNombre, primerApellido, segundoApellido, departamento, ciudad, barrios, direccion, telefono, celular, sexo, edad, estadoCivil, ministerio, codigoPastor, editarPg, idPg, estado, ter_id);
        }, function () { });
    }
}

function registrarPastorGeneral(tipoDocumento, numDocumento, primerNombre, segundoNombre, primerApellido, segundoApellido, departamento, ciudad, barrios, direccion, telefono, celular, sexo, edad, estadoCivil, ministerio, codigoPastor, editarPg, idPg, estado, ter_id) {
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
            idPg: idPg,
            estado: estado,
            ter_id: ter_id
        }),
        success: function (data) {
            try {
                var ret = eval('(' + data + ')');
                if (ret.hasOwnProperty("success")) {
                    alertify.success(ret.success);
                    visualizarPastGeneral();
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
        success: function (data) {
            var ret = "";
            try {
                ret = eval('(' + data + ')');
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
                        var td = $("<td onclick =\"consultarInformacionPastGeneral('" + i + "');\" '><i class='fa fa-pencil-square-o' aria-hidden='true'></i></td>");
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

function consultarInformacionPastGeneral(index) {

    alertify.confirm('Mnesaje', 'Esta seguro de Editar el registro', function () {
        //debugger;
        var tipoDocumento = listarPastGeneral[index].TIPO_DOCUMENTO;
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

        $("#btnGuardarPastorPg").html("Actualizar");


    }, function () { });

}

function limpiarCampos() {
    $("#cmbTipoDocumentoPg").val('');
    $("#txtDocumentoPg").val('');
    $("#txtEditarPg").val('');
    $("#txtIdPg").val('');
    $("#txtTerPg_id").val('');
    $("#txtPrimerNombrePg").val('');
    $("#txtSegundoNombrePg").val('');
    $("#txtPrimerApellidoPg").val('');
    $("#txtSegundoApellidoPg").val('');
    $("#cmbDepartamentoPg").val('').change();
    $("#cmbCiudadPg").val('').change();
    $("#cmbBarrioPg").val('').change();
    $("#txtDireccionpg").val('');
    $("#txtTelefonopg").val('');
    $("#txtCelularpg").val('');
    $("#cmbSexoPg").val('');
    $("#txtEdadpg").val('');
    $("#cmbEstadoCivilPg").val('');
    $("#cmbMinisterioPg").val('');
    $("#txtCodigopg").val('');
    $("#cmbEstado").val('');
}
//--VISTA PASTORES PRINCIPALES

function listarPastoresGenerales(idCombo) {
    var ur = CONTROLLERPASTORES;
    var op = 10;
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

function validarCamposPastorPrincipal() {
    var tipoDocumento = $("#cmbTipoDocumentoPp").val();
    var numDocumento = $("#txtDocumentoPp").val();
    var primerNombre = $("#txtPrimerNombrePp").val();
    var segundoNombre = $("#txtSegundoNombrePp").val();
    var primerApellido = $("#txtPrimerApellidoPp").val();
    var segundoApellido = $("#txtSegundoApellidoPp").val();
    var departamento = $("#cmbDepartamentoPp").val();
    var ciudad = $("#cmbCiudadPp").val();
    var barrios = $("#cmbBarrioPp").val();
    var direccion = $("#txtDireccionPp").val();
    var telefono = $("#txtTelefonoPp").val();
    var celular = $("#txtCelularPp").val();
    var sexo = $("#cmbSexoPp").val();
    var edad = $("#txtEdadPp").val();
    var estadoCivil = $("#cmbEstadoCivilPp").val();
    var ministerio = $("#cmbMinisterioPp").val();
    var codigoPastor = $("#txtCodigoPp").val();
    var editarPp = $("#txtEditarPp").val();
    var idPp = $("#txtIdPp").val();
    var ter_id = $("#txtTerPp_id").val();
    var estadoPp = $("#cmbEstadoPp").val();
    var idPg = $("#cmbPastorGeneral").val();

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
        alertify.confirm('Mensaje', 'Esta seguro de realizar el registro', function () {
            registrarPastorPrincipal(tipoDocumento, numDocumento, primerNombre, segundoNombre, primerApellido, segundoApellido, departamento, ciudad, barrios, direccion, telefono, celular, sexo, edad, estadoCivil, ministerio, codigoPastor, idPg, ter_id, editarPp, idPp, estadoPp);
        }, function () { });
    }
}

function registrarPastorPrincipal(tipoDocumento, numDocumento, primerNombre, segundoNombre, primerApellido, segundoApellido, departamento, ciudad, barrios, direccion, telefono, celular, sexo, edad, estadoCivil, ministerio, codigoPastor, idPg, ter_id, editarPp, idPp, estadoPp) {
    var ur = CONTROLLERPASTORES;
    var op = 11;
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
            idPg: idPg,
            ter_id: ter_id,
            editarPp: editarPp,
            idPp: idPp,
            estadoPp: estadoPp
        }),
        success: function (data) {
            try {
                var ret = eval('(' + data + ')');
                if (ret.hasOwnProperty("success")) {
                    alertify.success(ret.success);
                    visualizarPastPrincipal();
                    limpiarCamposPp();

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

function limpiarCamposPp() {
    $("#cmbPastorGeneral").val('');
    $("#cmbTipoDocumentoPp").val('');
    $("#txtEditarPp").val('');
    $("#txtIdPp").val('');
    $("#txtTerPp_id").val('');
    $("#txtDocumentoPp").val('');
    $("#txtPrimerNombrePp").val('');
    $("#txtSegundoNombrePp").val('');
    $("#txtPrimerApellidoPp").val('');
    $("#txtSegundoApellidoPp").val('');
    $("#cmbDepartamentoPp").val('').change();
    $("#cmbCiudadPp").val('').change();
    $("#cmbBarrioPp").val('').change();
    $("#txtDireccionPp").val('');
    $("#txtTelefonoPp").val('');
    $("#txtCelularPp").val('');
    $("#cmbSexoPp").val('');
    $("#txtEdadPp").val('');
    $("#cmbEstadoCivilPp").val('');
    $("#cmbMinisterioPp").val('');
    $("#txtCodigoPp").val('');
    $("#cmbEstadoPp").val('A');
    $("#btnGuardarPastorPp").html("Guardar");
}

var listarPastPrincipal = "";
function visualizarPastPrincipal() {
    $("#tbl_visualizar_PastPrincipal").html("<label style='float:left; margin-left:48%; margin-top:15%; font-size:15px;'>Cargando...</label><img src=''  style='float:left; margin-top:%; margin-left:49%; width:5%;'>");
    var ur = CONTROLLERPASTORES;
    var op = 12;
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
                listarPastPrincipal = ret;
                if (ret.hasOwnProperty("error")) {
                    alertify.error(ret.error);
                } else {
                    $listaUsuario = $("#tbl_visualizar_PastPrincipal");
                    $listaUsuario.html('');
                    var thead = $("<thead></thead>");
                    $listaUsuario.append(thead);
                    var tr = $("<tr class='info'></tr>");
                    thead.append(tr);
                    var th = $("<th style=''>PASTOR GENERAL</th>");
                    tr.append(th);
                    var th = $("<th style=''>CODIGO PASTOR PRINCIPAL</th>");
                    tr.append(th);
                    var th = $("<th style=''>NOMBRE PASTOR PRINCIPAL</th>");
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
                        var td = $("<td>" + (ret[i].hasOwnProperty("PASTORGENERAL") ? ret[i].PASTORGENERAL : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("COD_PP") ? ret[i].COD_PP : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("NOMBRE") ? ret[i].NOMBRE : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("MINISTERIO") ? ret[i].MINISTERIO : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("ESTADO") ? ret[i].ESTADO : "") + "</td>");
                        tr.append(td);
                        var td = $("<td onclick =\"consultarInformacionPastPrincipal('" + i + "');\" '><i class='fa fa-pencil-square-o' aria-hidden='true'></i></td>");
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

function consultarInformacionPastPrincipal(index) {
    alertify.confirm('Mnesaje', 'Esta seguro de Editar el registro', function () {
        //debugger;
        var idPp = listarPastPrincipal[index].ID_PP;
        var terpp = listarPastPrincipal[index].TER_PP;
        var idPg = listarPastPrincipal[index].ID_PG;
        var tipoDoc = listarPastPrincipal[index].TIPO_DOC;
        var docPp = listarPastPrincipal[index].DOCUMENTO;
        var priNomPp = listarPastPrincipal[index].PRIMER_NOMBRE;
        var segNomPp = listarPastPrincipal[index].SEGUNDO_NOMBRE;
        var priApelPp = listarPastPrincipal[index].PRIMER_APELLIDO;
        var segApelPp = listarPastPrincipal[index].SEGUNDO_APELLIDO;
        var dept = listarPastPrincipal[index].DEPT;
        var ciu = listarPastPrincipal[index].CIU;
        var barrio = listarPastPrincipal[index].BARRIO;
        var direccion = listarPastPrincipal[index].DIRECCION;
        var telefono = listarPastPrincipal[index].TELEFONO;
        var celular = listarPastPrincipal[index].CELULAR;
        var sexo = listarPastPrincipal[index].SEXO;
        var edad = listarPastPrincipal[index].EDAD;
        var civil = listarPastPrincipal[index].CIVIL;
        var ministerio = listarPastPrincipal[index].ID_MINISTERIO;
        var codPastPp = listarPastPrincipal[index].COD_PP;
        var estado = listarPastPrincipal[index].ID_ESTADO;

        $("#txtIdPp").val(idPp);
        $("#txtTerPp_id").val(terpp);
        $("#cmbPastorGeneral").val(idPg);
        $("#cmbTipoDocumentoPp").val(tipoDoc);
        $("#txtDocumentoPp").val(docPp);
        $("#txtDocumentoPp").prop("disabled", true);
        $("#txtPrimerNombrePp").val(priNomPp);
        $("#txtSegundoNombrePp").val(segNomPp);
        $("#txtPrimerApellidoPp").val(priApelPp);
        $("#txtSegundoApellidoPp").val(segApelPp);
        $("#cmbDepartamentoPp").val(dept).change();
        setTimeout(function () {
            $("#cmbCiudadPp").val(ciu).change();
        }, 200);
        setTimeout(function () {
            $("#cmbBarrioPp").val(barrio).change();
        }, 200);
        $("#txtDireccionPp").val(direccion);
        $("#txtTelefonoPp").val(telefono);
        $("#txtCelularPp").val(celular);
        $("#cmbSexoPp").val(sexo);
        $("#txtEdadPp").val(edad);
        $("#cmbEstadoCivilPp").val(civil);
        $("#cmbMinisterioPp").val(ministerio);
        $("#txtCodigoPp").val(codPastPp);
        $("#cmbEstadoPp").val(estado);

        $("#txtEditarPp").val(1);
        $("#btnGuardarPastorPp").html("Actualizar");
    }, function () { });

}
// ----------OBREROS----------
