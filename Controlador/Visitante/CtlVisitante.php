<?php

require_once '../../Modelo/Visitante/MdlVisitante.php';

//require_once '../../webPage/PHPJasperXML-master/tcpdf/tcpdf.php';
//require_once '../../webPage/PHPJasperXML-master/PHPJasperXML.inc.php';

$op = filter_input(INPUT_POST, 'op', FILTER_DEFAULT);
$isDefinidida = isset($op) ? true : false;  // indica si la variable esta definida o no;


switch ($op) {
    case 1:
        listarPastorInmediato();
        break;
    case 2:
        listarCreyentes();
        break;
    case 3:
        listartelefono();
        break;
    case 4:
        listarTipoDocumento();
        break;
    case 5:
        listarComboCiudad();
        break;
    case 6:
        listarComboBarrio();
        break;
    case 7:
        listarEstadoCivil();
        break;
}

function listarPastorInmediato()
{
    $mdlVisitante = new mdlVisitante();
    try {

        $listarPastorInmediato = $mdlVisitante->listarPastorInmediato();
        if ($listarPastorInmediato !== null) {
            $json = json_encode($listarPastorInmediato);
            echo $json;
        } else {
            echo "Lita vacia.";  // devolver en un arreglos , es por esta la razon que en el json se presenta error.
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarCreyentes()
{
    $mdlVisitante = new mdlVisitante();
    try {

        $listarCreyentes = $mdlVisitante->listarCreyentes();
        if ($listarCreyentes !== null) {
            $json = json_encode($listarCreyentes);
            echo $json;
        } else {
            echo "Lita vacia.";  // devolver en un arreglos , es por esta la razon que en el json se presenta error.
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listartelefono()
{
    $mdlVisitante = new mdlVisitante();
    try {
        $idObrero = addslashes(htmlspecialchars($_POST["idObrero"]));
        try {
            $listarTelefonoObrero = $mdlVisitante->listartelefono($idObrero);
            if (!empty($listarTelefonoObrero)) {
                $json = json_encode($listarTelefonoObrero);
                echo $json;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    } catch (\Throwable $th) {
        echo $exc->getTraceAsString();
    }
}

function listarTipoDocumento()
{
    $mdlVisitante = new mdlVisitante();
    try {

        $listarTipoDocumento = $mdlVisitante->listarTipoDocumento();
        if ($listarTipoDocumento !== null) {
            $json = json_encode($listarTipoDocumento);
            echo $json;
        } else {
            echo "Lita vacia.";  // devolver en un arreglos , es por esta la razon que en el json se presenta error.
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboCiudad()
{
    $mdlVisitante = new mdlVisitante();
    try {

        $listarComboCiudad = $mdlVisitante->listarComboCiudad();
        if ($listarComboCiudad !== null) {
            $json = json_encode($listarComboCiudad);
            echo $json;
        } else {
            echo "Lita vacia.";  // devolver en un arreglos , es por esta la razon que en el json se presenta error.
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboBarrio()
{
    $mdlVisitante = new mdlVisitante();
    $idCiudad = addslashes(htmlspecialchars($_POST["idCiudad"]));
    try {
        $listarComboBarrio = $mdlVisitante->listarComboBarrio($idCiudad);
        if (!empty($listarComboBarrio)) {
            $json = json_encode($listarComboBarrio);
            echo $json;
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarEstadoCivil()
{
    $mdlVisitante = new mdlVisitante();
    try {

        $listarEstadoCivil = $mdlVisitante->listarEstadoCivil();
        if ($listarEstadoCivil !== null) {
            $json = json_encode($listarEstadoCivil);
            echo $json;
        } else {
            echo "Lita vacia.";  // devolver en un arreglos , es por esta la razon que en el json se presenta error.
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
