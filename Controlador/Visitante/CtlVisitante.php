<?php

require_once '../../Modelo/Visitante/MdlVisitante.php';
require_once '../../Modelo/Visitante/Bean/VisitanteVO.php';

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
    case 8:
        listarComboDepartamento();
        break;
    case 9:
        listarComboSexoVi();
        break;
    case 10:
        registrarVisitanteInvitado();
        break;
    case 11:
        visualizarVisitanteInv();
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
    $idDepartamento = addslashes(htmlspecialchars($_POST["idDepartamento"]));
    try {

        $listarComboCiudad = $mdlVisitante->listarComboCiudad($idDepartamento);
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

function listarComboDepartamento()
{
    $mdlVisitante = new mdlVisitante();
    try {

        $listarComboDepartamento = $mdlVisitante->listarComboDepartamento();
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

function listarComboSexoVi()
{
    $mdlVisitante = new mdlVisitante();
    try {

        $listarComboSexoVi = $mdlVisitante->listarComboSexoVi();
        if ($listarComboSexoVi !== null) {
            $json = json_encode($listarComboSexoVi);
            echo $json;
        } else {
            echo "Lita vacia.";  // devolver en un arreglos , es por esta la razon que en el json se presenta error.
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function registrarVisitanteInvitado()
{
    $mdlVisitante = new mdlVisitante();
    $referencia = addslashes(htmlspecialchars($_POST["referencia"]));
    $fechaActual = addslashes(htmlspecialchars($_POST["fechaActual"]));
    $terConso = addslashes(htmlspecialchars($_POST["terConso"]));
    $terPasPrin = addslashes(htmlspecialchars($_POST["terPasPrin"]));
    $terObrero = addslashes(htmlspecialchars($_POST["terObrero"]));
    $tipoDocVisInv = addslashes(htmlspecialchars($_POST["tipoDocVisInv"]));
    $docVisInv = addslashes(htmlspecialchars($_POST["docVisInv"]));
    $primerNombreVisInv = addslashes(htmlspecialchars($_POST["primerNombreVisInv"]));
    $segundoNombreVisInv = addslashes(htmlspecialchars($_POST["segundoNombreVisInv"]));
    $primerApellidoVisInv = addslashes(htmlspecialchars($_POST["primerApellidoVisInv"]));
    $segundoApellidoVisInv = addslashes(htmlspecialchars($_POST["segundoApellidoVisInv"]));
    $departamento = addslashes(htmlspecialchars($_POST["departamento"]));
    $ciudad = addslashes(htmlspecialchars($_POST["ciudad"]));
    $barrio = addslashes(htmlspecialchars($_POST["barrio"]));
    $direccion = addslashes(htmlspecialchars($_POST["direccion"]));
    $celular = addslashes(htmlspecialchars($_POST["celular"]));
    $sexo = addslashes(htmlspecialchars($_POST["sexo"]));
    $edad = addslashes(htmlspecialchars($_POST["edad"]));
    $estadoCivil = addslashes(htmlspecialchars($_POST["estadoCivil"]));
    $editarVisInv = addslashes(htmlspecialchars($_POST["editarVisInv"]));
    $idVisInv = addslashes(htmlspecialchars($_POST["idVisInv"]));
    $terInvVis = addslashes(htmlspecialchars($_POST["terInvVis"]));

    $VisitanteVO = new VisitanteVO();
    $VisitanteVO->setReferencia($referencia);
    $VisitanteVO->setFechaActual($fechaActual);
    $VisitanteVO->setTerConso($terConso);
    $VisitanteVO->setTerPasPrin($terPasPrin);
    $VisitanteVO->setTerObrero($terObrero);
    $VisitanteVO->setTipoDocVisInv($tipoDocVisInv);
    $VisitanteVO->setDocVisInv($docVisInv);
    $VisitanteVO->setPrimerNombreVisInv($primerNombreVisInv);
    $VisitanteVO->setSegundoNombreVisInv($segundoNombreVisInv);
    $VisitanteVO->setPrimerApellidoVisInv($primerApellidoVisInv);
    $VisitanteVO->setSegundoApellidoVisInv($segundoApellidoVisInv);
    $VisitanteVO->setDepartamento($departamento);
    $VisitanteVO->setCiudad($ciudad);
    $VisitanteVO->setBarrio($barrio);
    $VisitanteVO->setDireccion($direccion);
    $VisitanteVO->setCelular($celular);
    $VisitanteVO->setSexo($sexo);
    $VisitanteVO->setEdad($edad);
    $VisitanteVO->setEstadoCivil($estadoCivil);
    $VisitanteVO->setIdVisInv($idVisInv);
    $VisitanteVO->setTerInvVis($terInvVis);
    $statusJson = array();
    try {
        if ($editarVisInv == 1) {
            # code...
        } else {
            $registrarVisitante = $mdlVisitante->registrarVisitanteInv($VisitanteVO);
            $msj = "Visitante invitado guardado correctamente";
        }

        if ($registrarVisitante > 0) {
            $statusJson["success"] = $msj;
        } else {
            $statusJson["error"] = "Error al guardar el registro";
        }
        echo json_encode($statusJson);
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function visualizarVisitanteInv()
{
    $mdlVisitante = new mdlVisitante();
    try {
        $listarRegistros = $mdlVisitante->visualizarVisitanteInv();
        if ($listarRegistros !== null) {
            $json = json_encode($listarRegistros);
            echo $json;
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
