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
    case 10:
        listarPastoresGenerales();
        break;
    case 11:
        registrarPastorPrincipal();
        break;
    case 12:
        visualizarPastPrincipal();
        break;
    case 13:
        listarPastoresPrincipales();
        break;
    case 14:
        registrarObrero();
        break;
    case 15:
        visualizarObreros();
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
    $idTer = addslashes(htmlspecialchars($_POST["ter_id"]));
    $estado = addslashes(htmlspecialchars($_POST["estado"]));
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
            $parametrosPg = $mdlPastores->actualizarPastorGeneral($PastoresVO, $idTer, $estado);
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

//--CONTROLADOR PASTORES PRINCIPALES

function listarPastoresGenerales()
{
    $mdlPastores = new mdlPastores();
    try {

        $listarPastoresGenerales = $mdlPastores->listarPastoresGenerales();
        if ($listarPastoresGenerales !== null) {
            $json = json_encode($listarPastoresGenerales);
            echo $json;
        } else {
            echo "Lita vacia.";  // devolver en un arreglos , es por esta la razon que en el json se presenta error.
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function registrarPastorPrincipal()
{
    $mdlPastores = new mdlPastores();
    $tipoDocumento = addslashes(htmlspecialchars($_POST["tipoDocumento"]));
    $numDocumento = addslashes(htmlspecialchars($_POST['numDocumento']));
    $primerNombre = addslashes(htmlspecialchars($_POST['primerNombre']));
    $segundoNombre = addslashes(htmlspecialchars($_POST['segundoNombre']));
    $primerApellido = addslashes(htmlspecialchars($_POST['primerApellido']));
    $segundoApellido = addslashes(htmlspecialchars($_POST['segundoApellido']));
    $departamento = addslashes(htmlspecialchars($_POST['departamento']));
    $ciudad = addslashes(htmlspecialchars($_POST['ciudad']));
    $barrios = addslashes(htmlspecialchars($_POST['barrios']));
    $direccion = addslashes(htmlspecialchars($_POST['direccion']));
    $telefono = addslashes(htmlspecialchars($_POST['telefono']));
    $celular = addslashes(htmlspecialchars($_POST['celular']));
    $sexo = addslashes(htmlspecialchars($_POST['sexo']));
    $edad = addslashes(htmlspecialchars($_POST['edad']));
    $estadoCivil = addslashes(htmlspecialchars($_POST['estadoCivil']));
    $ministerio = addslashes(htmlspecialchars($_POST['ministerio']));
    $codigoPastor = addslashes(htmlspecialchars($_POST['codigoPastor']));
    $idPg = addslashes(htmlspecialchars($_POST['idPg']));
    $ter_id = addslashes(htmlspecialchars($_POST['ter_id']));
    $editarPp = addslashes(htmlspecialchars($_POST['editarPp']));
    $idPp = addslashes(htmlspecialchars($_POST['idPp']));
    $estadoPp = addslashes(htmlspecialchars($_POST['estadoPp']));
    $statusJson = array();

    try {
        if ($editarPp == 1) {
            $parametrosPp = $mdlPastores->actualizarPastorPrincipal($tipoDocumento, $numDocumento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $departamento, $ciudad, $barrios, $direccion, $telefono, $celular, $sexo, $edad, $estadoCivil, $ministerio, $codigoPastor, $idPg, $ter_id, $estadoPp, $idPp);
            $msj =  "Pastor general Actualizado correctamente";
        } else {
            $parametrosPp = $mdlPastores->registrarPastorPrincipal($tipoDocumento, $numDocumento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $departamento, $ciudad, $barrios, $direccion, $telefono, $celular, $sexo, $edad, $estadoCivil, $ministerio, $codigoPastor, $idPg, $estadoPp);
            $msj =  "Pastor General guardando correctamente";
        }

        if ($parametrosPp > 0) {
            $statusJson["success"] = $msj;
        } else {
            $statusJson["error"] = "El codigo ya se encentra creado";
        }
        echo json_encode($statusJson);
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function visualizarPastPrincipal()
{
    $mdlPastores = new mdlPastores();
    try {
        $listaRegistro = $mdlPastores->visualizarPastPrincipal();
        if ($listaRegistro !== null) {
            $json = json_encode($listaRegistro);
            echo $json;
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarPastoresPrincipales()
{
    $mdlPastores = new mdlPastores();
    try {

        $listarPastoresPrincipales = $mdlPastores->listarPastoresPrincipales();
        if ($listarPastoresPrincipales !== null) {
            $json = json_encode($listarPastoresPrincipales);
            echo $json;
        } else {
            echo "Lita vacia.";  // devolver en un arreglos , es por esta la razon que en el json se presenta error.
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function registrarObrero()
{
    $mdlPastores = new mdlPastores();
    $pastorPrincipal = addslashes(htmlspecialchars($_POST['pastorPrincipal']));
    $tipoDocumentoOb = addslashes(htmlspecialchars($_POST['tipoDocumentoOb']));
    $editarOb = addslashes(htmlspecialchars($_POST['editarOb']));
    $idOb = addslashes(htmlspecialchars($_POST['idOb']));
    $terIdOb = addslashes(htmlspecialchars($_POST['terIdOb']));
    $documentoOb = addslashes(htmlspecialchars($_POST['documentoOb']));
    $primerNombreOb = addslashes(htmlspecialchars($_POST['primerNombreOb']));
    $segundoNombreOb = addslashes(htmlspecialchars($_POST['segundoNombreOb']));
    $primerApellidoOb = addslashes(htmlspecialchars($_POST['primerApellidoOb']));
    $segundoApellidoOb = addslashes(htmlspecialchars($_POST['segundoApellidoOb']));
    $departamentoOb = addslashes(htmlspecialchars($_POST['departamentoOb']));
    $ciudadOb = addslashes(htmlspecialchars($_POST['ciudadOb']));
    $barrioOb = addslashes(htmlspecialchars($_POST['barrioOb']));
    $direccionOb = addslashes(htmlspecialchars($_POST['direccionOb']));
    $telefonoOb = addslashes(htmlspecialchars($_POST['telefonoOb']));
    $celularOb = addslashes(htmlspecialchars($_POST['celularOb']));
    $sexoOb = addslashes(htmlspecialchars($_POST['sexoOb']));
    $edadOb = addslashes(htmlspecialchars($_POST['edadOb']));
    $estadoCivilOb = addslashes(htmlspecialchars($_POST['estadoCivilOb']));
    $estadoOb = addslashes(htmlspecialchars($_POST['estadoOb']));
    $statusJson = array();
    try {
        if ($editarOb == 1) {
            $parametrosPp = $mdlPastores->actualizarObrero($pastorPrincipal, $tipoDocumentoOb, $documentoOb, $primerNombreOb, $segundoNombreOb, $primerApellidoOb, $segundoApellidoOb, $departamentoOb, $ciudadOb, $barrioOb, $direccionOb, $telefonoOb, $celularOb, $sexoOb, $edadOb, $estadoCivilOb, $estadoOb, $terIdOb, $idOb);
            $msj =  "Obrero actualizado correctamente";
            if ($parametrosPp > 0) {
                $statusJson["success"] = $msj;
            } else {
                $statusJson["error"] = "Error al registrar Ingreso";
            }
        } else {
            $parametrosPp = $mdlPastores->registrarObrero($pastorPrincipal, $tipoDocumentoOb, $documentoOb, $primerNombreOb, $segundoNombreOb, $primerApellidoOb, $segundoApellidoOb, $departamentoOb, $ciudadOb, $barrioOb, $direccionOb, $telefonoOb, $celularOb, $sexoOb, $edadOb, $estadoCivilOb, $estadoOb);
            $msj =  "Obrero guardando correctamente";
            if ($parametrosPp > 0) {
                $statusJson["success"] = $msj;
            } else {
                $statusJson["error"] = "Error al registrar Ingreso";
            }
        }
        echo json_encode($statusJson);
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function visualizarObreros()
{
    $mdlPastores = new mdlPastores();
    try {
        $listaRegistro = $mdlPastores->visualizarObreros();
        if ($listaRegistro !== null) {
            $json = json_encode($listaRegistro);
            echo $json;
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
