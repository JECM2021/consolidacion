<?php

require_once '/../Modelo/Seguridad/Bean/UsuariosVO.php';
require_once '../validaSession.php';
require_once '../Modelo/MdlConsolidacion.php';
include_once "../Vistas/funciones.php";
$mdlPacientes = new MdlClinica();
$op = addslashes(htmlspecialchars($_POST["op"]));
switch ($op) {
    case 1:
        listarComboTipoDocumento();
        break;
    case 2:
        listarComboSexo();
        break;
    case 3:
        listarComboTipoPaciente();
        break;
    case 4:
        listarGrupoSanguineo();
        break;
    case 5:
        listarComboCiudades();
        break;
    case 6:
        listarComboEstadoCivil();
        break;
    case 7:
        loguerarUsuario();
        break;
    case 8:
        listarComboTarifarios();
        break;
    case 9:
        listarComboProcedimiento();
        break;
    case 10:
        visualizarConvenios();
        break;
    case 11:
        listarComboDepartamento();
        break;
    case 12:
        listarComboOcupacion();
        break;
    case 13:
        obtenerServicio();
        break;
    case 14:
        listarComboPlantel();
        break;
    case 15:
        listarComboMovil();
        break;
    case 16:
        listarComboCodigosEi10();
        break;
    case 17:
        listarComboEstadosTriage();
        break;
    case 18:
        listarComboReferencia();
        break;
    case 19:
        listarComboTipoPlaca();
        break;
    case 20:
        obtenerConsecutivo();
        break;
    case 21:
        obtenerConsecutivoResolucion();
        break;
    case 22:
        listarComboProcedimientos();
        break;
    case 23:
        listarComboTipoCaso();
        break;
    case 24:
        listarComboMedicosEspecialista();
        break;
    case 25:
        listarComboAmbito();
        break;
    case 26:
        listarComboAnestesia();
        break;
    case 27:
        listarComboTipoProcedimiento();
        break;
    case 28:
        listarComboServiciosEpcricis();
        break;
    case 29:
        listarComboFinalidad();
        break;
    case 30:
        listarComboRealizacion();
        break;
    case 31:
        listarComboAtienden();
        break;
    case 32:
        listarComboProcedimientosMenores();
        break;
    case 33:
        cambiarContrasenaUsuario();
        break;
    case 34:
        listarComboPatologia();
        break;
    case 35:
        listarComboDestinoSalida();
        break;
    case 36:
        listarFuncionesIntenvertores();
        break;
    case 37:
        optenerValorReferencia();
        break;
    case 38:
        listarComboTipoCliente();
        break;
    case 39:
        listarComboLotes();
        break;
    case 40:
        listarComboBodega();
        break;
    case 41:
        listarComboTipoMovimiento();
        break;
    case 42:
        listarComboLoteGeneral();
        break;
    case 43:
        listarComboLaboratorio();
        break;
    case 44:
        consultarCodigoCie10();
        break;
    case 45:
        listarCombonInsulina();
        break;
    case 46:
        listarParteCuerpo();
        break;
    case 47:
        listarCausas();
        break;
    case 48:
        listarComboAreaRural();
        break;
    case 49:
        listarComboTipoVehiculo();
        break;
    case 50:
        listarComboEstadoVehiculo();
        break;
    case 51:
        listarComboLaboratorios();
        break;
    case 52:
        listarComboExamenesLaboratorio();
        break;
    case 53:
        listarReferenciaVencidas();
        break;
    case 54 :
        listarOrdenesLaboratorioPendientes();
        break;
}

function loguerarUsuario()
{
    global $mdlPacientes;
    $usuarios = addslashes(htmlspecialchars($_POST["usu"]));
    $contrasena = addslashes(htmlspecialchars($_POST["con"]));
    $empresa = addslashes(htmlspecialchars($_POST["empresa"]));
    $contraseyaEncriptada = claves($contrasena);
    $usuarioVO = new UsuariosVO();
    $usuarioVO->setUsuusuario($usuarios);
    $usuarioVO->setContrasena($contraseyaEncriptada);
    $usuarioVO->setEmpresa($empresa);
    try {
        $usuariosVO = $mdlPacientes->loguearUsuario($usuarioVO);
        $empresaVO = $mdlPacientes->obtenerConfiguracionEmpresa($usuariosVO->getIdUsuario());
        session_start();
        if ($usuariosVO !== null) {
            $_SESSION['user_name'] = $usuariosVO->getNombreUsuario();
            $_SESSION['usu_id'] = $usuariosVO->getIdUsuario();
            $_SESSION['usu_perfil'] = $usuariosVO->getIdPeril();
            //$_SESSION['tercero'] = $usuariosVO->getTerId();
            $_SESSION['usuUsuario'] = $usuariosVO->getUsuusuario();
            $_SESSION['empEmpresa'] = $empresaVO;
           // $_SESSION['cod_empresa'] = $empresa;
            $listaMenu = $mdlPacientes->obtenerMenu($usuariosVO);
            $listMenuReporte = $mdlPacientes->visualizarMenuReportes($usuariosVO);
            $listMenuPagReporte = $mdlPacientes->visualizarPaginasReportes($usuariosVO);
            $operacionesUsuario = $mdlPacientes->operacionesUsuario($usuariosVO);
            $_SESSION['listaMenu'] = $listaMenu;
            $_SESSION['lisMenReport'] = $listMenuReporte;
            $_SESSION['lisMenPagReport'] = $listMenuPagReporte;
            $_SESSION['operacionesUsuario'] = $operacionesUsuario;
            $_SESSION['invalido'] = "";
            header("Location: /consolidacion/Principal");
        } else {
            $_SESSION['invalido'] = "Usuario o contraseña incorrecta. Por favor verifique.";
            header("Location: /consolidacion/login");
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function cambiarContrasenaUsuario()
{
    $contrasenaAnterior = addslashes(htmlspecialchars($_POST["contraActual"]));
    $contrasenanNueva = addslashes(htmlspecialchars($_POST["contrasenaNueva"]));
    $contraActual = claves($contrasenaAnterior);
    $contraNueva = claves($contrasenanNueva);
    global $usuUsuario;
    global $mdlPacientes;
    $statusJson = array();
    try {
        $rsDatosusuario = $mdlPacientes->verificarUsuario($usuUsuario, $contraActual);
        if ($rsDatosusuario !== NULL) {
            $rsActualizacion = $mdlPacientes->actualizarContrasena($usuUsuario, $contraNueva);
            if ($rsActualizacion > 0) {
                $statusJson["success"] = "Contraseña cambiada correctamente.";
            }
        } else {
            $statusJson["mensaje"] = "La contraseña actual es incorrecta, por favor intente de nuevo.";
        }
        echo json_encode($statusJson);
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboTipoDocumento()
{
    global $mdlPacientes;
    try {
        $listatipoDocumento = $mdlPacientes->listarComboTipoDocumento();
        if ($listatipoDocumento !== null) {
            $json = json_encode($listatipoDocumento);
            echo $json;
        } else {
            echo "Lista vacia.";  // devolver en un arreglos , es por esta la razon que en el json se presenta error.
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboSexo()
{
    global $mdlPacientes;
    try {
        $listarComboSexo = $mdlPacientes->listarComboSexo();
        if ($listarComboSexo !== null) {
            $json = json_encode($listarComboSexo);
            echo $json;
        } else {
            echo "Lita vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboTipoPaciente()
{
    global $mdlPacientes;
    try {
        $listarComboSexo = $mdlPacientes->listarTipoPaciente();
        if ($listarComboSexo !== null) {
            $json = json_encode($listarComboSexo);
            echo $json;
        } else {
            echo "Lita vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarGrupoSanguineo()
{
    global $mdlPacientes;
    try {
        $listarComboSexo = $mdlPacientes->listarGrupoSanguineo();
        if ($listarComboSexo !== null) {
            $json = json_encode($listarComboSexo);
            echo $json;
        } else {
            echo "Lita vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboCiudades()
{
    global $mdlPacientes;
    try {
        $listarComboSexo = $mdlPacientes->listarComboCiudades();
        if ($listarComboSexo !== null) {
            $json = json_encode($listarComboSexo);
            echo $json;
        } else {
            echo "Lita vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboDepartamento()
{
    global $mdlPacientes;
    $idCiudad = addslashes(htmlspecialchars($_POST["idCiudad"]));
    try {
        $listarComboSexo = $mdlPacientes->listarComboDepartamento($idCiudad);
        if (!empty($listarComboSexo)) {
            $json = json_encode($listarComboSexo);
            echo $json;
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboOcupacion()
{
    global $mdlPacientes;

    try {
        $listarComboSexo = $mdlPacientes->listarComboOcupacion();
        if ($listarComboSexo !== null) {
            $json = json_encode($listarComboSexo);
            echo $json;
        } else {
            echo "Lita vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboEstadoCivil()
{
    global $mdlPacientes;
    try {
        $listarComboSexo = $mdlPacientes->listarComboEstadoCivil();
        if ($listarComboSexo !== null) {
            $json = json_encode($listarComboSexo);
            echo $json;
        } else {
            echo "Lita vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboPlantel()
{
    global $mdlPacientes;
    try {
        $listarComboSexo = $mdlPacientes->listarComboPlantel();
        if ($listarComboSexo !== null) {
            $json = json_encode($listarComboSexo);
            echo $json;
        } else {
            echo "Lita vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboMovil()
{
    global $mdlPacientes;
    try {
        $listarComboSexo = $mdlPacientes->listarComboMovil();
        if ($listarComboSexo !== null) {
            $json = json_encode($listarComboSexo);
            echo $json;
        } else {
            echo "Lita vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboCodigosEi10()
{
    global $mdlPacientes;
    try {
        $listarComboCodigos = $mdlPacientes->listarComboCodigosEi10();
        if ($listarComboCodigos !== null) {
            $json = json_encode($listarComboCodigos);
            echo $json;
        } else {
            echo "Lita vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboEstadosTriage()
{
    global $mdlPacientes;
    try {
        $listarComboSexo = $mdlPacientes->listarComboEstadosTriage();
        if ($listarComboSexo !== null) {
            $json = json_encode($listarComboSexo);
            echo $json;
        } else {
            echo "Lita vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboReferencia()
{
    global $mdlPacientes;
    try {
        $listarComboSexo = $mdlPacientes->listarComboReferencia();
        if ($listarComboSexo !== null) {
            $json = json_encode($listarComboSexo);
            echo $json;
        } else {
            echo "Lita vacia.";
            exit;
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboTipoPlaca()
{
    global $mdlPacientes;
    try {
        $listarComboSexo = $mdlPacientes->listarComboTipoPlaca();
        if ($listarComboSexo !== null) {
            $json = json_encode($listarComboSexo);
            echo $json;
        } else {
            echo "Lita vacia.";
            exit;
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboTipoCaso()
{
    global $mdlPacientes;
    try {
        $listarComboTipoCaso = $mdlPacientes->listarComboTipoCaso();
        if ($listarComboTipoCaso !== null) {
            $json = json_encode($listarComboTipoCaso);
            echo $json;
        } else {
            echo "Lita vacia.";
            exit;
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function obtenerConsecutivo()
{
    global $mdlPacientes;
    $tipoConsecutivo = addslashes(htmlspecialchars($_POST["tipoConsecutivo"]));

    try {
        $listaRegistro = $mdlPacientes->obtenerConsecutivoDocumento($tipoConsecutivo);
        if ($listaRegistro !== null) {
            $json = json_encode($listaRegistro);
            echo $json;
        } else {
            echo "Lista vacia";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function obtenerConsecutivoResolucion()
{
    global $mdlPacientes;
    try {
        $listaRegistro = $mdlPacientes->obtenerConsecutivoResolucion();
        if ($listaRegistro !== null) {
            $json = json_encode($listaRegistro);
            echo $json;
        } else {
            echo "Lista vacia";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboTarifarios()
{
    global $mdlPacientes;
    try {
        $listarComboSexo = $mdlPacientes->listarComboTarifarios();
        if ($listarComboSexo !== null) {
            $json = json_encode($listarComboSexo);
            echo $json;
        } else {
            echo "Lita vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboProcedimiento()
{
    $isOrdenMedica = addslashes(htmlspecialchars($_POST["isOrdenMedica"]));
    $isOrdenServicio = addslashes(htmlspecialchars($_POST["isOrdenServicio"]));
    global $mdlPacientes;
    try {
        $listarComboSexo = $mdlPacientes->listarComboProcedimiento($isOrdenMedica, $isOrdenServicio);
        if ($listarComboSexo !== null) {
            $json = json_encode($listarComboSexo);
            echo $json;
        } else {
            echo "Lita vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function visualizarConvenios()
{
    global $mdlPacientes;
    try {
        $listaRegistro = $mdlPacientes->visualizarConvenios();
        if ($listaRegistro !== null) {
            $json = json_encode($listaRegistro);
            echo $json;
        } else {
            echo "Lista vacia";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function obtenerServicio()
{
    $procedimiento = addslashes(htmlspecialchars($_POST["idProcedimiento"]));
    $tarifario = addslashes(htmlspecialchars($_POST["tarifario"]));
    global $mdlPacientes;
    try {
        $listaRegistro = $mdlPacientes->obtenerServicio($procedimiento, $tarifario);

        if ($listaRegistro !== null) {
            $json = json_encode($listaRegistro);
            echo $json;
        } else {
            echo "Lista vacia";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboProcedimientos()
{
    global $mdlPacientes;
    try {
        $listarComboProdecimientos = $mdlPacientes->listarComboProdecimientosCirugia();
        if ($listarComboProdecimientos !== null) {
            $json = json_encode($listarComboProdecimientos);
            echo $json;
        } else {
            echo "Lita vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboMedicosEspecialista()
{
    global $mdlPacientes;
    try {
        $listarComboMedicos = $mdlPacientes->listarComboMedicos();
        if ($listarComboMedicos !== null) {
            $json = json_encode($listarComboMedicos);
            echo $json;
        } else {
            echo "Lista vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboAmbito()
{
    global $mdlPacientes;
    try {
        $listarComboSexo = $mdlPacientes->listarComboAmbito();
        if ($listarComboSexo !== null) {
            $json = json_encode($listarComboSexo);
            echo $json;
        } else {
            echo "Lista esta vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboAnestesia()
{
    global $mdlPacientes;
    try {
        $listarComboSexo = $mdlPacientes->listarComboAnestesia();
        if ($listarComboSexo !== null) {
            $json = json_encode($listarComboSexo);
            echo $json;
        } else {
            echo "Lista esta vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboTipoProcedimiento()
{
    global $mdlPacientes;
    try {
        $listarComboSexo = $mdlPacientes->listarComboTipoProdecimientos();
        if ($listarComboSexo !== null) {
            $json = json_encode($listarComboSexo);
            echo $json;
        } else {
            echo "Lista esta vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboServiciosEpcricis()
{
    global $mdlPacientes;
    try {
        $listarComboServicios = $mdlPacientes->listarComboServiciosEpicrisis();
        if ($listarComboServicios !== null) {
            $json = json_encode($listarComboServicios);
            echo $json;
        } else {
            echo "Lista esta vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboFinalidad()
{
    global $mdlPacientes;
    try {
        $listarComboFinalidad = $mdlPacientes->listarComboFinalidad();
        if ($listarComboFinalidad !== null) {
            $json = json_encode($listarComboFinalidad);
            echo $json;
        } else {
            echo "Lista esta vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboRealizacion()
{
    global $mdlPacientes;
    try {
        $listarComboRealizacion = $mdlPacientes->listarComboRealizacionForma();
        if ($listarComboRealizacion !== null) {
            $json = json_encode($listarComboRealizacion);
            echo $json;
        } else {
            echo "Lista esta vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboAtienden()
{
    global $mdlPacientes;
    try {
        $listarComboAtencionm = $mdlPacientes->listarComboAtendido();
        if ($listarComboAtencionm !== null) {
            $json = json_encode($listarComboAtencionm);
            echo $json;
        } else {
            echo "Lista esta vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboProcedimientosMenores()
{
    global $mdlPacientes;
    try {
        $listarComboProdecimientosMenores = $mdlPacientes->listarComboProdecimientosMenores();
        if ($listarComboProdecimientosMenores !== null) {
            $json = json_encode($listarComboProdecimientosMenores);
            echo $json;
        } else {
            echo "Lista vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboPatologia()
{
    global $mdlPacientes;
    try {
        $listarComboPatologia = $mdlPacientes->listarComboPatologia();
        if ($listarComboPatologia !== null) {
            $json = json_encode($listarComboPatologia);
            echo $json;
        } else {
            echo "Lista esta vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboDestinoSalida()
{
    global $mdlPacientes;
    try {
        $listarComboDestinoSalida = $mdlPacientes->listarComboDestinoSalida();
        if ($listarComboDestinoSalida !== null) {
            $json = json_encode($listarComboDestinoSalida);
            echo $json;
        } else {
            echo "Lista esta vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarFuncionesIntenvertores()
{
    global $mdlPacientes;
    try {
        $listaFunciones = $mdlPacientes->listarFuncionesIntenvertores();
        if ($listaFunciones !== null) {
            $json = json_encode($listaFunciones);
            echo $json;
        } else {
            echo "Lista esta vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function optenerValorReferencia()
{
    $codigo = addslashes(htmlspecialchars($_POST["codigo"]));
    global $mdlPacientes;
    try {
        $listaValores = $mdlPacientes->optenerValorReferencia($codigo);
        if ($listaValores !== null) {
            $json = json_encode($listaValores);
            echo $json;
        } else {
            echo "Lista esta vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboTipoCliente()
{
    global $mdlPacientes;
    try {
        $listarComboCliente = $mdlPacientes->listarComboTipoCliente();
        if ($listarComboCliente !== null) {
            $json = json_encode($listarComboCliente);
            echo $json;
        } else {
            echo "Lista esta vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboLotes()
{
    $bodega = addslashes(htmlspecialchars($_POST["bodegaLote"]));
    $statusJson = array();
    global $mdlPacientes;
    try {
        $listarComboLote = $mdlPacientes->ListarLotes($bodega);
        if (!empty($listarComboLote)) {
            $json = json_encode($listarComboLote);
            echo $json;
        } else {
            $statusJson["Mensaje"] = "No se encontraron Lotes.";
            echo json_encode($statusJson);
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboBodega()
{
    $statusJson = array();
    global $mdlPacientes;
    try {
        $listarComboBodega = $mdlPacientes->ListarBodegas();
        if (!empty($listarComboBodega)) {
            $json = json_encode($listarComboBodega);
            echo $json;
        } else {
            $statusJson["Mensaje"] = "No se encontraron Lotes.";
            echo json_encode($statusJson);
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboTipoMovimiento()
{
    global $mdlPacientes;
    try {
        $listaTipoMovi = $mdlPacientes->listarComboTipoMovimiento();
        if ($listaTipoMovi !== null) {
            $json = json_encode($listaTipoMovi);
            echo $json;
        } else {
            echo "Lita vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboLoteGeneral()
{
    $statusJson = array();
    global $mdlPacientes;
    try {
        $listarComboLoteGeneral = $mdlPacientes->ListarLoteGeneral();
        if (!empty($listarComboLoteGeneral)) {
            $json = json_encode($listarComboLoteGeneral);
            echo $json;
        } else {
            $statusJson["Mensaje"] = "No se encontraron Lotes.";
            echo json_encode($statusJson);
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarComboLaboratorio()
{
    $statusJson = array();
    global $mdlPacientes;
    try {
        $laboratorio = $mdlPacientes->listarComboLaboratorios();
        if (!empty($laboratorio)) {
            $json = json_encode($laboratorio);
            echo $json;
        } else {
            $statusJson["Mensaje"] = "No se encontraron registros.";
            echo json_encode($statusJson);
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarCombonInsulina()
{
    global $mdlPacientes;
    try {
        $listarComboInsulina = $mdlPacientes->listarComboInsulina();
        if ($listarComboInsulina !== null) {
            $json = json_encode($listarComboInsulina);
            echo $json;
        } else {
            echo "Lista esta vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function consultarCodigoCie10()
{
    $parametos = addslashes(htmlspecialchars($_POST["parametros"]));
    global $mdlPacientes;
    try {
        $listado = $mdlPacientes->consultarCodigoEi10($parametos);
        if ($listado !== null) {
            $json = json_encode($listado);
            echo $json;
        } else {
            echo "Lita vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarParteCuerpo()
{
    global $mdlPacientes;
    try {
        $listado = $mdlPacientes->listarParteCuerpo();
        if ($listado !== null) {
            $json = json_encode($listado);
            echo $json;
        } else {
            echo "Lita vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function listarCausas()
{
    global $mdlPacientes;
    try {
        $listado = $mdlPacientes->listarCausas();
        if ($listado !== null) {
            $json = json_encode($listado);
            echo $json;
        } else {
            echo "Lita vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
function listarComboAreaRural()
{
    global $mdlPacientes;
    try {
        $listarComboAreaRural = $mdlPacientes->listarComboAreaRurales();
        if ($listarComboAreaRural !== null) {
            $json = json_encode($listarComboAreaRural);
            echo $json;
        } else {
            echo "Lista esta vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
function listarComboTipoVehiculo()
{
    global $mdlPacientes;
    try {
        $listarComboTipoVehiculo = $mdlPacientes->listarComboTipoVehiculo();
        if ($listarComboTipoVehiculo !== null) {
            $json = json_encode($listarComboTipoVehiculo);
            echo $json;
        } else {
            echo "Lista esta vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
function listarComboEstadoVehiculo()
{
    global $mdlPacientes;
    try {
        $listarComboEstadoVehiculo = $mdlPacientes->listarComboEstadoVehiculo();
        if ($listarComboEstadoVehiculo !== null) {
            $json = json_encode($listarComboEstadoVehiculo);
            echo $json;
        } else {
            echo "Lista esta vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
function listarComboLaboratorios()
{
    global $mdlPacientes;
    try {
        $listarClientes = $mdlPacientes->listarComboLaboratorio();
        if ($listarClientes !== null) {
            $json = json_encode($listarClientes);
            echo $json;
        } else {
            echo "Lista Clientes Vacias.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
function listarComboExamenesLaboratorio()
{
    $procedimiento = addslashes(htmlspecialchars($_POST["idProcedimiento"]));
    $tarifario = addslashes(htmlspecialchars($_POST["tarifario"]));
    global $mdlPacientes;
    try {
        $listarClientes = $mdlPacientes->listarExamenesLaboratorio($procedimiento, $tarifario);
        if ($listarClientes !== null) {
            $json = json_encode($listarClientes);
            echo $json;
        } else {
            echo "Lista Clientes Vacias.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
function listarReferenciaVencidas(){
    global $mdlPacientes;
    try {
        $listarReferencias = $mdlPacientes->listarReferenciasVencidas();
        if ($listarReferencias !== null) {
            $json = json_encode($listarReferencias);
            echo $json;
        } else {
            echo "Lista vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
    
}
function listarOrdenesLaboratorioPendientes(){
    global $mdlPacientes;
    try {
        $listarReferencias = $mdlPacientes->listarOrdenesPendientes();
        if ($listarReferencias !== null) {
            $json = json_encode($listarReferencias);
            echo $json;
        } else {
            echo "Lista vacia.";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
    
}
