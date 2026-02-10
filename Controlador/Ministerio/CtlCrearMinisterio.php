<?php

require_once '../../Modelo/Ministerio/MdlCrearMinisterio.php';

//require_once '../../webPage/PHPJasperXML-master/tcpdf/tcpdf.php';
//require_once '../../webPage/PHPJasperXML-master/PHPJasperXML.inc.php';

$op = filter_input(INPUT_POST, 'op', FILTER_DEFAULT);
$isDefinidida = isset($op) ? true : false;  // indica si la variable esta definida o no;


switch ($op) {
    case 1:
        visualizarMinisterios();
        break;
    case 2:
        registrarMinisterio();
        break;
}

function visualizarMinisterios()
{
    $mdlCrearMinisterio = new mdlCrearMinisterio();
    try {
        $listaRegistro = $mdlCrearMinisterio->visualizarMinisterios();
        if ($listaRegistro !== null) {
            $json = json_encode($listaRegistro);
            echo $json;
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function registrarMinisterio()
{
    $mdlCrearMinisterio = new mdlCrearMinisterio();
    $nombre = addslashes(htmlspecialchars($_POST["nombre"]));
    $estadoMin = addslashes(htmlspecialchars($_POST["estadoMin"]));
    $idMin = addslashes(htmlspecialchars($_POST["idMin"]));
    $editarMin = addslashes(htmlspecialchars($_POST["editarMin"]));
    // die(var_dump($editarMin));

    try {
        if ($editarMin == 1) {
            $registrarMin = $mdlCrearMinisterio->actualizarMinsiterio($idMin, $nombre, $estadoMin);
            $msj = "Ministerio actualizado correctamente";
        } else {
            $registrarMin = $mdlCrearMinisterio->registrarMinisterio($nombre, $estadoMin);
            $msj = "Minsterio guardado correctamente";
        }

        if ($registrarMin > 0) {
            $statusJson["success"] = $msj;
        } else {
            $statusJson["error"] = "error al generar registro";
        }
        echo json_encode($statusJson);
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}