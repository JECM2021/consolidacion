$(document).ready(function () {
    listadoVencidos = [];
     visulizarReferenciaVencidas();
     visulizarOrdenesVencidas();
     
 });
 
 function visulizarReferenciaVencidas() {
     var ur = CONTROLLERPUBLIC;
     var op = 53;
     $.ajax({
         type: "POST",
         url: ur,
         data: ({
             op: op
         }),
         success:
                 function (data) {
                     var ret = eval('(' + data + ')');
                     listadoVencidos = [];
                     try {
                         if (ret.length > 0) {
                             $("#spanAlertas").text(ret.length);
 
                             $("li.header.Med").text("Tiene " + ret.length + " Alerta.");
                             var option = $("<li class='header med' value=''>Tiene " + ret.length + " notificaciones.</li>");
                             for (var i = 0; i < ret.length; i++) {
                                 if (ret[i].DIAS <= 0) {
                                     $("#menuAlertas>li").append("<a href='/clinicasv/Vistas/Referencia/Referencias?page=8&pageMenu=2&pageSub=3&refId=" + ret[i].ID + "' style='color: #a94442 !important;'><i class='fa fa-exclamation-triangle text-danger' aria-hidden='true'></i>la Ref: " + ret[i].CODIGO + " Esta Vencida</a>")
                                 } else {
                                     $("#menuAlertas>li").append("<a href='/clinicasv/Vistas/Referencia/Referencias?page=8&pageMenu=2&pageSub=3&refId=" + ret[i].ID + "'><i class='fa fa-calendar-plus-o text-warning' aria-hidden='true'></i>la Ref: " + ret[i].CODIGO + " Se Vence en (" + ret[i].DIAS + ")Dias</a>")
                                 }
                             }
                         }
                     } catch (e) {
                     }
                 },
         error: function (objeto, error, error2) {
             alertify.alert(error);
         }
     });
 }
 function visulizarOrdenesVencidas() {
    var ur = CONTROLLERPUBLIC;
    var op = 54;
    $.ajax({
        type: "POST",
        url: ur,
        data: ({
            op: op
        }),
        success:
                function (data) {
                    var ret = eval('(' + data + ')');
                    listadoVencidos = [];
                    try {
                        if (ret.length > 0) {
                            $("#spanTareas").text(ret.length);

                            $("li.header.tasks").text("Tiene " + ret.length + " Tareas.");
                            var option = $("<li class='header tasks' value=''>Tiene " + ret.length + " Tareas.</li>");
                            for (var i = 0; i < ret.length; i++) {
                                if (ret[i].DIAS <= 0) {
                                    $("#menuAlertas>li").append("<a href='/clinicasv/Vistas/Referencia/Referencias?page=8&pageMenu=2&pageSub=3&refId=" + ret[i].ID + "' style='color: #a94442 !important;'><i class='fa fa-exclamation-triangle text-danger' aria-hidden='true'></i>la Ref: " + ret[i].CODIGO + " Esta Vencida</a>")
                                } else {
                                    $("#menuAlertas>li").append("<a href='/clinicasv/Vistas/Referencia/Referencias?page=8&pageMenu=2&pageSub=3&refId=" + ret[i].ID + "'><i class='fa fa-calendar-plus-o text-warning' aria-hidden='true'></i>la Ref: " + ret[i].CODIGO + " Se Vence en (" + ret[i].DIAS + ")Dias</a>")
                                }
                            }
                        }
                    } catch (e) {
                    }
                },
        error: function (objeto, error, error2) {
            alertify.alert(error);
        }
    });
}