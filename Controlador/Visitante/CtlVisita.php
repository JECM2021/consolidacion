<?php

require_once '../../Modelo/Visitante/MdlVisita.php';
require_once '../../Modelo/Visitante/Bean/VisitaVO.php';

//require_once '../../webPage/PHPJasperXML-master/tcpdf/tcpdf.php';
//require_once '../../webPage/PHPJasperXML-master/PHPJasperXML.inc.php';

$op = filter_input(INPUT_POST, 'op', FILTER_DEFAULT);
$isDefinidida = isset($op) ? true : false;  // indica si la variable esta definida o no;


switch ($op) {
    case 1:
        visualizarVisitantes();
        break;
    case 2:
        visualizarVisitaRealizada();
        break;

}

function visualizarVisitantes()
{
    $statusJson = array();
    $mdlVisita = new mdlVisita();
    try {
        $listarVisitantes = $mdlVisita->visualizarVisitantes();
        if (!empty($listarVisitantes)) {
            $json = json_encode($listarVisitantes);
            echo $json;
        } else {
            $statusJson["Mensaje"] = "No hay Visitantes disponibles para realizar informe de visita";
            echo json_encode($statusJson);
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function visualizarVisitaRealizada()
{
    $mdlVisita = new mdlVisita();
    try {
        $listarRegistro = $mdlVisita->visualizarVisitaRealizada();
        if ($listarRegistro !== null) {
            $json = json_encode($listarRegistro);
            echo $json;
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}