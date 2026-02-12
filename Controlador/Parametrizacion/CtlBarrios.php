<?php

require_once '../../Modelo/Parametrizacion/MdlBarrios.php';
require_once '../../Modelo/MdlConsolidacion.php';

//require_once '../../webPage/PHPJasperXML-master/tcpdf/tcpdf.php';
//require_once '../../webPage/PHPJasperXML-master/PHPJasperXML.inc.php';

$op = filter_input(INPUT_POST, 'op', FILTER_DEFAULT);
$isDefinidida = isset($op) ? true : false;  // indica si la variable esta definida o no;

switch ($op) {
    case 1:
        listarComboDepartamento();
        break;
    case 2:
        listarComboCiudad();
        break;
    case 3:
        registrarBarrio();
        break;
    case 4:
        visualizarBarrios();
        break;
}


function listarComboDepartamento()
{
    $mdlBarrios = new mdlBarrios();
    try {

        $listarComboDepartamento = $mdlBarrios->listarComboDepartamento();
        if ($listarComboDepartamento !== null) {
            $json = json_encode($listarComboDepartamento);
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
    $mdlBarrios = new mdlBarrios();
    $idDepartamento = addslashes(htmlspecialchars($_POST["idDepartamento"]));
    try {
        $listarComboCiudad = $mdlBarrios->listarComboCiudad($idDepartamento);
        if (!empty($listarComboCiudad)) {
            $json = json_encode($listarComboCiudad);
            echo $json;
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function registrarBarrio()
{
    $mdlBarrios = new mdlBarrios();
    $idCiudad = addslashes(htmlspecialchars($_POST["idCiudad"]));
    $nombreBarrio = addslashes(htmlspecialchars($_POST["nombreBarrio"]));
    $idBarrio = addslashes(htmlspecialchars($_POST['idBarrio']));
    $idEditar = addslashes(htmlspecialchars($_POST['idEditar']));
    $statusJson = array();

    try {
        if ($idEditar == 1) {
            $parametrosBarrio = $mdlBarrios->actualizarBarrio($idBarrio, $idCiudad, $nombreBarrio);
            $msj =  "Barrio actualizado correctamente";
        } else {
            $parametrosBarrio = $mdlBarrios->registrarBarrio($idCiudad, $nombreBarrio);
            $msj =  "Barrio guardando correctamente";
        }
        if ($parametrosBarrio > 0) {
            $statusJson["success"] = $msj;
        } else {
            $statusJson["error"] = "El codigo ya se encentra creado";
        }
        echo json_encode($statusJson);
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function visualizarBarrios()
{
    $mdlBarrios = new mdlBarrios();
    try {
        $listaRegistro = $mdlBarrios->visualizarBarrios();
        if ($listaRegistro !== null) {
            $json = json_encode($listaRegistro);
            echo $json;
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
