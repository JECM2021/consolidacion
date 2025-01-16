<?php

require_once '../../Modelo/Parametrizacion/MdlPastores.php';
require_once '../../Modelo/Parametrizacion/Bean/PastoresVO.php';
require_once '../../Modelo/MdlConsolidacion.php';

//require_once '../../webPage/PHPJasperXML-master/tcpdf/tcpdf.php';
//require_once '../../webPage/PHPJasperXML-master/PHPJasperXML.inc.php';

$op = filter_input(INPUT_POST, 'op', FILTER_DEFAULT);
$isDefinidida = isset($op) ? true : false;  // indica si la variable esta definida o no;


switch ($op) {
    case 1:
        listarTipoDocumento();
        break;
    case 2:
        listarComboSexo();
        break;
    case 3:
        listarComboDepartamento();
        break;
    case 4:
        listarComboCiudad();
        break;
    case 5:
        listarComboBarrio();
        break;
    case 6:
        listarEstadoCivil();
        break;
    case 7:
        listarMinisterios();
        break;
    case 8:
        registrarPastorGeneral();
        break;
    case 9:
        visualizarPastGeneral();
        break;
}



function listarTipoDocumento()
{
    $mdlPastores = new mdlPastores();
    try {

        $listarTipoDocumento = $mdlPastores->listarTipoDocumento();
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

function listarComboSexo()
{
    $mdlPastores = new mdlPastores();
    try {

        $listarComboSexo = $mdlPastores->listarComboSexo();
        if ($listarComboSexo !== null) {
            $json = json_encode($listarComboSexo);
            echo $json;
        } else {
            echo "Lita vacia.";  // devolver en un arreglos , es por esta la razon que en el json se presenta error.
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboDepartamento()
{
    $mdlPastores = new mdlPastores();
    try {

        $listarComboDepartamento = $mdlPastores->listarComboDepartamento();
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
    $mdlPastores = new mdlPastores();
    $idDepartamento = addslashes(htmlspecialchars($_POST["idDepartamento"]));
    try {
        $listarComboCiudad = $mdlPastores->listarComboCiudad($idDepartamento);
        if (!empty($listarComboCiudad)) {
            $json = json_encode($listarComboCiudad);
            echo $json;
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboBarrio()
{
    $mdlPastores = new mdlPastores();
    $idCiudad = addslashes(htmlspecialchars($_POST["idCiudad"]));
    try {
        $listarComboBarrio = $mdlPastores->listarComboBarrio($idCiudad);
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
    $mdlPastores = new mdlPastores();
    try {

        $listarEstadoCivil = $mdlPastores->listarEstadoCivil();
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

function listarMinisterios()
{
    $mdlPastores = new mdlPastores();
    try {

        $listarMinisterios = $mdlPastores->listarMinisterios();
        if ($listarMinisterios !== null) {
            $json = json_encode($listarMinisterios);
            echo $json;
        } else {
            echo "Lita vacia.";  // devolver en un arreglos , es por esta la razon que en el json se presenta error.
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function registrarPastorGeneral()
{
    $mdlPastores = new mdlPastores();
    $tipoDocumento = addslashes(htmlspecialchars($_POST["tipoDocumento"]));
    $numDocumento = addslashes(htmlspecialchars($_POST["numDocumento"]));
    $primerNombre = addslashes(htmlspecialchars($_POST["primerNombre"]));
    $segundoNombre = addslashes(htmlspecialchars($_POST["segundoNombre"]));
    $primerApellido = addslashes(htmlspecialchars($_POST["primerApellido"]));
    $segundoApellido = addslashes(htmlspecialchars($_POST["segundoApellido"]));
    $departamento = addslashes(htmlspecialchars($_POST["departamento"]));
    $ciudad = addslashes(htmlspecialchars($_POST["ciudad"]));
    $barrios = addslashes(htmlspecialchars($_POST["barrios"]));
    $direccion = addslashes(htmlspecialchars($_POST["direccion"]));
    $telefono = addslashes(htmlspecialchars($_POST["telefono"]));
    $celular = addslashes(htmlspecialchars($_POST["celular"]));
    $sexo = addslashes(htmlspecialchars($_POST["sexo"]));
    $edad = addslashes(htmlspecialchars($_POST["edad"]));
    $estadoCivil = addslashes(htmlspecialchars($_POST["estadoCivil"]));
    $ministerio = addslashes(htmlspecialchars($_POST["ministerio"]));
    $codigoPastor = addslashes(htmlspecialchars($_POST["codigoPastor"]));
    $editarPg = addslashes(htmlspecialchars($_POST["editarPg"]));
    $idPg = addslashes(htmlspecialchars($_POST["idPg"]));
    $PastoresVO = new PastoresVO();
    $PastoresVO->setTipoDocumento($tipoDocumento);
    $PastoresVO->setNumDocumento($numDocumento);
    $PastoresVO->setPrimerNombre($primerNombre);
    $PastoresVO->setSegundoNombre($segundoNombre);
    $PastoresVO->setPrimerApellido($primerApellido);
    $PastoresVO->setSegundoApellido($segundoApellido);
    $PastoresVO->setDepartamento($departamento);
    $PastoresVO->setCiudad($ciudad);
    $PastoresVO->setBarrios($barrios);
    $PastoresVO->setDireccion($direccion);
    $PastoresVO->setTelefono($telefono);
    $PastoresVO->setCelular($celular);
    $PastoresVO->setSexo($sexo);
    $PastoresVO->setEdad($edad);
    $PastoresVO->setEstadoCivil($estadoCivil);
    $PastoresVO->setMinisterio($ministerio);
    $PastoresVO->setCodigoPastor($codigoPastor);
    $PastoresVO->setIdpg($idPg);
    $statusJson = array();
    try {
        if ($editarPg == 1) {
            $parametrosPg = $mdlPastores->actualizarPastorGeneral($PastoresVO);
            $msj =  "Pastor general Actualizado correctamente";
        } else {
            $parametrosPg = $mdlPastores->registrarPastorGeneral($PastoresVO);
            $msj =  "Pastor General guardando correctamente";
        }

        if ($parametrosPg > 0) {
            $statusJson["success"] = $msj;
        } else {
            $statusJson["error"] = "El codigo ya se encentra creado";
        }
        echo json_encode($statusJson);
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function visualizarPastGeneral()
{
    $mdlPastores = new mdlPastores();
    try {
        $listaRegistro = $mdlPastores->visualizarPastGeneral();
        if ($listaRegistro !== null) {
            $json = json_encode($listaRegistro);
            echo $json;
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}