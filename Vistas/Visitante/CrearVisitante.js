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
    listarComboSexo('cmbsexoVs');
    /*-----Visitante Solo--------*/
    visualizarVisitanteNoInv();
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

    $("#btnGuardarVisSolo").click(function () {
        validarCamposVisitanteNoInvitado();
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
    var peticion = $("#txtPeticion").val();

    if (editarVisInv == 0) {
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
                registrarVisitanteInvitado(referencia, fechaActual, terConso, terPasPrin, terObrero, tipoDocVisInv, docVisInv, primerNombreVisInv, segundoNombreVisInv, primerApellidoVisInv, segundoApellidoVisInv, departamento, ciudad, barrio, direccion, edad, sexo, celular, estadoCivil, editarVisInv, idVisInv, terInvVis, peticion);
            }, function () { });
        }
    } else {
        if (referencia.length === 0) {
            alertify.alert('Por favor seleccione tipo de referencia');
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
                registrarVisitanteInvitado(referencia, fechaActual, terConso, terPasPrin, terObrero, tipoDocVisInv, docVisInv, primerNombreVisInv, segundoNombreVisInv, primerApellidoVisInv, segundoApellidoVisInv, departamento, ciudad, barrio, direccion, edad, sexo, celular, estadoCivil, editarVisInv, idVisInv, terInvVis, peticion);
            }, function () { });
        }
    }

}

function registrarVisitanteInvitado(referencia, fechaActual, terConso, terPasPrin, terObrero, tipoDocVisInv, docVisInv, primerNombreVisInv, segundoNombreVisInv, primerApellidoVisInv, segundoApellidoVisInv, departamento, ciudad, barrio, direccion, edad, sexo, celular, estadoCivil, editarVisInv, idVisInv, terInvVis, peticion) {
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
            terInvVis: terInvVis,
            peticion: peticion
        }),
        success: function (data) {
            try {
                var ret = eval('(' + data + ')');
                if (ret.hasOwnProperty("success")) {
                    alertify.success(ret.success);
                    limpiarCamposVisitanteInvitado();
                    visualizarVisitanteInv();
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
    $("#cmbReferencia").val('1');
    $("#fechaActual").val('');
    $("#cmbNombConso").val('').change();
    $("#cmbCodPastInm").val('').change();
    $("#cmbNombreObrero").val('').change();
    $("#txtTelefonoOb").val('');
    $("#cmbTipoDocumentoVi").val('');
    $("#txtEditarVi").val('');
    $("#txtIdVi").val('');
    $("#txtTeridVi").val('');
    $("#txtDocumentoVi").val('');
    $("#txtDocumentoVi").prop('disabled', false);
    $("#txtPrimerNombreVi").val('');
    $("#txtSegundoNombreVi").val('');
    $("#txtPrimerApellidoVi").val('');
    $("#txtSegundoApellidoVi").val('');
    $("#cmbDepartamentoVi").val('').change();
    $("#cmbCiudadVi").val('').change();
    $("#cmbBarrioVi").val('').change();
    $("#txtDireccionVi").val('');
    $("#txtEdadVi").val('');
    $("#cmbSexoVi").val('').change();
    $("#txtCelularVi").val('');
    $("#cmbEstadoCivilVi").val('').change();
    $("#txtPeticion").val('');
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
                    var th = $("<th style=''>NUMERO INGRESO</th>");
                    tr.append(th);
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
                        var td = $("<td>" + (ret[i].hasOwnProperty("NUM_INGRESO") ? ret[i].NUM_INGRESO : "") + "</td>");
                        tr.append(td);
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
    alertify.confirm('Mensaje', 'Esta seguro de Editar el registro', function () {
        //debugger;
        var fechaRegistro = listarVisitante[index].FECHA_REGISTRO;
        var terconso = listarVisitante[index].TER_CONSO;
        var codpastor = listarVisitante[index].PAST_PRINC;
        var terobr = listarVisitante[index].TER_OBR;
        var tipoDoc = listarVisitante[index].TIPO_DOC;
        var doc = listarVisitante[index].DOCUMENTO;
        var primerNombre = listarVisitante[index].PRIMER_NOMBRE;
        var segundoNombre = listarVisitante[index].SEGUNDO_NOMBRE;
        var primerApellido = listarVisitante[index].PRIMER_APELLIDO;
        var segundoApellido = listarVisitante[index].SEGUNDO_APELLIDO;
        var dept = listarVisitante[index].ID_DEP;
        var ciu_id = listarVisitante[index].ID_CIU;
        var barrio_id = listarVisitante[index].ID_BARRIO;
        var direccion = listarVisitante[index].DIRECCION;
        var edad = listarVisitante[index].EDAD;
        var idsexo = listarVisitante[index].SEXO;
        var celular = listarVisitante[index].CELULAR;
        var idCivil = listarVisitante[index].ESTADO_CIVIL;
        var peticion = listarVisitante[index].PETICION;
        var idVis = listarVisitante[index].ID_VIS;
        var idTerVis = listarVisitante[index].TER_VIS;

        $("#fechaActual").val(fechaRegistro);
        $("#cmbNombConso").val(terconso).change();
        $("#cmbCodPastInm").val(codpastor).change();
        $("#cmbNombreObrero").val(terobr).change();
        $("#cmbTipoDocumentoVi").val(tipoDoc);
        $("#txtDocumentoVi").prop('disabled', true);
        $("#txtDocumentoVi").val(doc);
        $("#txtPrimerNombreVi").val(primerNombre);
        $("#txtSegundoNombreVi").val(segundoNombre);
        $("#txtPrimerApellidoVi").val(primerApellido);
        $("#txtSegundoApellidoVi").val(segundoApellido);
        setTimeout(() => {
            $("#cmbDepartamentoVi").val(dept).change();
        }, 500);
        setTimeout(() => {
            $("#cmbCiudadVi").val(ciu_id).change();
        }, 1000);
        setTimeout(() => {
            $("#cmbBarrioVi").val(barrio_id).change();
        }, 1500);
        $("#txtDireccionVi").val(direccion);
        $("#txtEdadVi").val(edad);
        $("#cmbSexoVi").val(idsexo).change();
        $("#txtCelularVi").val(celular);
        $("#cmbEstadoCivilVi").val(idCivil).change();
        $("#txtPeticion").val(peticion);
        $("#txtIdVi").val(idVis);
        $("#txtTeridVi").val(idTerVis);
        $("#txtEditarVi").val(1);
        $("#btnGuardarVisInv").html("Actualizar");

    }, function () { });

}

//------------------- VISITANTE NO INVITADO------------

function listartelefonoAsignado(valor) {
    var idObrero = valor.value;
    var ur = CONTROLLERVISITANTE;
    var op = 12;
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
                if (tipoReferencia > 1) {
                    $("#txtTelefonoPerAsig").val(numCelular);
                }
            } catch (e) { }
        },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });

}

function validarCamposVisitanteNoInvitado() {

    var referencia2 = $("#cmbReferencia").val();
    var fechaRegistroVni = $("#fechaActualVs").val();
    var terConsejero = $("#cmbNombConsVs").val();
    var horaLlamdaVni = $("#txtLlamadaVs").val();
    var tipDocVni = $("#cmbTipoDocumentoVs").val();
    var numDocVni = $("#txtDocumentoVs").val();
    var primerNombreVni = $("#txtPrimerNombreVs").val();
    var segundoNombreVni = $("#txtSegundoNombreVs").val();
    var primerApellidoVni = $("#txtPrimerApellidoVs").val();
    var segundoApellidoVni = $("#txtSegundoApellidoVs").val();
    var departamentoVni = $("#cmbDepartamentoVs").val();
    var ciudadVni = $("#cmbCiudadVs").val();
    var barrioVni = $("#cmbBarrioVs").val();
    var direccionVni = $("#txtDireccionVs").val();
    var edadVni = $("#txtEdadVs").val();
    var celularVni = $("#txtCelularVs").val();
    var estadoCivilVni = $("#cmbEstadoCivilVs").val();
    var peticionVni = $("#txtPeticionVni").val();
    var terAsig = $("#cmbNombPerAsig").val();
    var horaLlamadaAsig = $("#txtLlamadaPerAsig").val();
    var editarVni = $("#txtEditarVs").val();
    var idVis = $("#txtIdVs").val();
    var terIdVis = $("#txtTeridVs").val();
    var sexo = $("#cmbsexoVs").val();

    if (editarVni == 0) {
        if (referencia2.length === 0) {
            alertify.alert('Por favor seleccione tipo de referencia');
        } else if (fechaRegistroVni.length === 0) {
            alertify.alert('Por favor seleccione una fecha de registro');
        } else if (terConsejero.length === 0) {
            alertify.alert('Por favor seleccione un consejero');
        } else if (horaLlamdaVni.length === 0) {
            alertify.alert('Por favor seleccione una hora de llamada');
        } else if (tipDocVni.length === 0) {
            alertify.alert('Por favor seleccione un tipo de documento');
        } else if (numDocVni.length === 0) {
            alertify.alert('Por favor digite el numero de documento');
        } else if (primerNombreVni.length === 0) {
            alertify.alert('El primer nombre no puede quedar vacio');
        } else if (primerApellidoVni.length === 0) {
            alertify.alert('El primer apellido no puede quedar vacio');
        } /*else if (segundoApellidoVni.length === 0) {
            alertify.alert('El segundo apellido no puede quedar vacio');
        }*/ else if (departamentoVni.length === 0) {
            alertify.alert('Por favor seleccione un departamento');
        } else if (ciudadVni.length === 0) {
            alertify.alert('Por favor seleccione una ciudad');
        } else if (barrioVni.length === 0) {
            alertify.alert('Por favor seleccione un barrio');
        } else if (direccionVni.length === 0) {
            alertify.alert('Por favor digite la direccion');
        } else if (edadVni.length === 0) {
            alertify.alert('Por favor digite la edad');
        } else if (celularVni.length === 0) {
            alertify.alert('Por favor digite el numero celular');
        } else if (estadoCivilVni.length === 0) {
            alertify.alert('Por favor seleccione el estado civil');
        } else if (peticionVni.length === 0) {
            alertify.alert('Por favor digite la peticion');
        } else {
            alertify.confirm('Mnesaje', 'Esta seguro de realizar el registro', function () {
                registrarVisitanteNoInvitado(referencia2, fechaRegistroVni, terConsejero, horaLlamdaVni, tipDocVni, numDocVni, primerNombreVni, segundoNombreVni, primerApellidoVni, segundoApellidoVni, departamentoVni, ciudadVni, barrioVni, direccionVni, edadVni, celularVni, estadoCivilVni, peticionVni, terAsig, horaLlamadaAsig, editarVni, idVis, terIdVis, sexo);
            }, function () { });
        }
    } else {
        if (referencia2.length === 0) {
            alertify.alert('Por favor seleccione tipo de referencia');
        } else if (terConsejero.length === 0) {
            alertify.alert('Por favor seleccione un consejero');
        } else if (horaLlamdaVni.length === 0) {
            alertify.alert('Por favor seleccione una hora de llamada');
        } else if (tipDocVni.length === 0) {
            alertify.alert('Por favor seleccione un tipo de documento');
        } else if (numDocVni.length === 0) {
            alertify.alert('Por favor digite el numero de documento');
        } else if (primerNombreVni.length === 0) {
            alertify.alert('El primer nombre no puede quedar vacio');
        } else if (primerApellidoVni.length === 0) {
            alertify.alert('El primer apellido no puede quedar vacio');
        } else if (segundoApellidoVni.length === 0) {
            alertify.alert('El segundo apellido no puede quedar vacio');
        } else if (departamentoVni.length === 0) {
            alertify.alert('Por favor seleccione un departamento');
        } else if (ciudadVni.length === 0) {
            alertify.alert('Por favor seleccione una ciudad');
        } else if (barrioVni.length === 0) {
            alertify.alert('Por favor seleccione un barrio');
        } else if (direccionVni.length === 0) {
            alertify.alert('Por favor digite la direccion');
        } else if (edadVni.length === 0) {
            alertify.alert('Por favor digite la edad');
        } else if (celularVni.length === 0) {
            alertify.alert('Por favor digite el numero celular');
        } else if (estadoCivilVni.length === 0) {
            alertify.alert('Por favor seleccione el estado civil');
        } else if (peticionVni.length === 0) {
            alertify.alert('Por favor digite la peticion');
        } else {
            alertify.confirm('Mnesaje', 'Esta seguro de realizar el registro', function () {
                registrarVisitanteNoInvitado(referencia2, fechaRegistroVni, terConsejero, horaLlamdaVni, tipDocVni, numDocVni, primerNombreVni, segundoNombreVni, primerApellidoVni, segundoApellidoVni, departamentoVni, ciudadVni, barrioVni, direccionVni, edadVni, celularVni, estadoCivilVni, peticionVni, terAsig, horaLlamadaAsig, editarVni, idVis, terIdVis, sexo);
            }, function () { });
        }
    }
}

function registrarVisitanteNoInvitado(referencia2, fechaRegistroVni, terConsejero, horaLlamdaVni, tipDocVni, numDocVni, primerNombreVni, segundoNombreVni, primerApellidoVni, segundoApellidoVni, departamentoVni, ciudadVni, barrioVni, direccionVni, edadVni, celularVni, estadoCivilVni, peticionVni, terAsig, horaLlamadaAsig, editarVni, idVis, terIdVis, sexo) {
    var ur = CONTROLLERVISITANTE;
    var op = 13;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op,
            referencia2: referencia2,
            fechaRegistroVni: fechaRegistroVni,
            terConsejero: terConsejero,
            horaLlamdaVni: horaLlamdaVni,
            tipDocVni: tipDocVni,
            numDocVni: numDocVni,
            primerNombreVni: primerNombreVni,
            segundoNombreVni: segundoNombreVni,
            primerApellidoVni: primerApellidoVni,
            segundoApellidoVni: segundoApellidoVni,
            departamentoVni: departamentoVni,
            ciudadVni: ciudadVni,
            barrioVni: barrioVni,
            direccionVni: direccionVni,
            edadVni: edadVni,
            celularVni: celularVni,
            estadoCivilVni: estadoCivilVni,
            peticionVni: peticionVni,
            terAsig: terAsig,
            horaLlamadaAsig: horaLlamadaAsig,
            editarVni: editarVni,
            idVis: idVis,
            terIdVis: terIdVis,
            sexo: sexo
        }),
        success: function (data) {
            try {
                var ret = eval('(' + data + ')');
                if (ret.hasOwnProperty("success")) {
                    alertify.success(ret.success);
                    limpiarCamposVisitanteNoInvitado();
                    visualizarVisitanteNoInv();
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

var listarVisitanteNoInvt = "";
function visualizarVisitanteNoInv() {
    $("#tbl_visitante_solo").html("<label style='float:left; margin-left:48%; margin-top:15%; font-size:15px;'>Cargando...</label><img src=''  style='float:left; margin-top:%; margin-left:49%; width:5%;'>");
    var ur = CONTROLLERVISITANTE;
    var op = 14;
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
                listarVisitanteNoInvt = ret;
                if (ret.hasOwnProperty("error")) {
                    alertify.error(ret.error);
                } else {
                    $listaUsuario = $("#tbl_visitante_solo");
                    $listaUsuario.html('');
                    var thead = $("<thead></thead>");
                    $listaUsuario.append(thead);
                    var tr = $("<tr class='info'></tr>");
                    thead.append(tr);
                    var th = $("<th style=''>NUMERO INGRESO</th>");
                    tr.append(th);
                    var th = $("<th style=''>DOCUMENTO</th>");
                    tr.append(th);
                    var th = $("<th style=''>NOMBRE Y APELLIDO</th>");
                    tr.append(th);
                    th = $("<th style=''>NOMBRE DEL CONSEJERO</th>");
                    tr.append(th);
                    var th = $("<th style=''>ASIGNADO A</th>");
                    tr.append(th);
                    var th = $("<th style='width: 2%;'><i class='fa fa-pencil-square-o'aria-hidden='true'></i></th>");
                    tr.append(th);
                    var tbody = $("<tbody></tbody>");
                    $listaUsuario.append(tbody);
                    for (var i = 0; i < ret.length; i++) {
                        var tr = $("<tr class='tblFiltrarUsuario' oncontextmenu=\"colorCeldas(this,4,'" + i + "');\"  style  = 'cursor:pointer;'></tr>");
                        tbody.append(tr);
                        var td = $("<td>" + (ret[i].hasOwnProperty("NUM_INGRESO") ? ret[i].NUM_INGRESO : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("NUM_DOC") ? ret[i].NUM_DOC : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("NOMBRE_COMPLETO") ? ret[i].NOMBRE_COMPLETO : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("CONSEJERO") ? ret[i].CONSEJERO : "") + "</td>");
                        tr.append(td);
                        var td = $("<td>" + (ret[i].hasOwnProperty("ASIGNADO") ? ret[i].ASIGNADO : "") + "</td>");
                        tr.append(td);
                        var td = $("<td onclick =\"consultarInformacionVisitNoInv('" + i + "');\" '><i class='fa fa-pencil-square-o' aria-hidden='true'></i></td>");
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

function consultarInformacionVisitNoInv(index) {
    alertify.confirm('Mensaje', 'Esta seguro de Editar el registro', function () {
        //debugger;
        var idVis = listarVisitanteNoInvt[index].ID_VIS;
        var terVis = listarVisitanteNoInvt[index].TER_VIS;
        var fechaRegistro = listarVisitanteNoInvt[index].FECHA_REGISTRO;
        var terConse = listarVisitanteNoInvt[index].TER_CONSE;
        var horaLlamdaVis = listarVisitanteNoInvt[index].HORA_LLAMADA;
        var tipoDoc = listarVisitanteNoInvt[index].TIPO_DOC;
        var numeroDoc = listarVisitanteNoInvt[index].NUM_DOC;
        var primerNombre = listarVisitanteNoInvt[index].PRIMER_NOMBRE;
        var segundoNombre = listarVisitanteNoInvt[index].SEGUNDO_NOMBRE;
        var primerApellido = listarVisitanteNoInvt[index].PRIMER_APELLIDO;
        var segundoApellido = listarVisitanteNoInvt[index].SEGUNDO_APELLIDO;
        var dept = listarVisitanteNoInvt[index].DEPARTAMENTO;
        var ciud = listarVisitanteNoInvt[index].CIUDAD;
        var barrio = listarVisitanteNoInvt[index].BARRIO;
        var direccion = listarVisitanteNoInvt[index].DIRECCION;
        var edad = listarVisitanteNoInvt[index].EDAD;
        var celular = listarVisitanteNoInvt[index].CELULAR;
        var terAsignado = listarVisitanteNoInvt[index].TER_ASIG;
        var terConso = listarVisitanteNoInvt[index].TER_CONSO;
        var sexo = listarVisitanteNoInvt[index].SEXO_ID;
        var estadoCivil = listarVisitanteNoInvt[index].ESTADO_CIVIL;
        var peticion = listarVisitanteNoInvt[index].PETICION;

        $("#fechaActualVs").val(fechaRegistro);
        $("#cmbNombConsVs").val(terConse);
        $("#txtLlamadaVs").val(horaLlamdaVis);
        $("#cmbTipoDocumentoVs").val(tipoDoc);
        $("#txtDocumentoVs").val(numeroDoc);
        $("#txtPrimerNombreVs").val(primerNombre);
        $("#txtSegundoNombreVs").val(segundoNombre);
        $("#txtPrimerApellidoVs").val(primerApellido);
        $("#txtSegundoApellidoVs").val(segundoApellido);
        setTimeout(() => {
            $("#cmbDepartamentoVs").val(dept).change();
        }, 500);
        setTimeout(() => {
            $("#cmbCiudadVs").val(ciud).change();
        }, 1000);
        setTimeout(() => {
            $("#cmbBarrioVs").val(barrio).change();
        }, 1500);
        $("#txtDireccionVs").val(direccion);
        $("#txtEdadVs").val(edad);
        $("#txtCelularVs").val(celular);
        $("#cmbsexoVs").val(sexo).change();
        $("#cmbEstadoCivilVs").val(estadoCivil).change();
        $("#txtPeticionVni").val(peticion);
        $("#cmbNombPerAsig").val(terAsignado);
        $("#txtEditarVs").val(1);
        $("#txtIdVs").val(idVis);
        $("#txtTeridVs").val(terVis);
        $("#btnGuardarVisSolo").html("Actualizar");

    }, function () { });
}