<?php
require_once '../../Conexion/Conexion.php';
require_once '../../Modelo/Visitante/Bean/VisitanteVO.php';

class mdlVisitante extends conexion
{
    const RUTA_SQL = "../../Modelo/Visitante/sqlVisitante.xml";

    function listarPastorInmediato()
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_PASTOR_INMEDIATO", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID" => $row['ID'],
                    "DESCRIPCION" => $row['DESCRIPCION']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarCreyentes()
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_CREYENTE", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID" => $row['ID'],
                    "DESCRIPCION" => $row['DESCRIPCION'],
                    "CELULAR" => $row['CELULAR']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }
    function listartelefono($idObrero)
    {
        $rawdata = array();
        try {
            //die(var_dump($idObrero));
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_TELEFONO", self::RUTA_SQL));
            $respuesta->bind_param('s', $idObrero);
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "NUMEROTELEFONO" => $row['NUMEROTELEFONO']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarTipoDocumento()
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_TIPO_DOCUMENTO", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID" => $row['ID'],
                    "DESCRIPCION" => $row['DESCRIPCION']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboCiudad($idDepartament)
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_CIUDADES", self::RUTA_SQL));
            $respuesta->bind_param('s', $idDepartament);
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID" => $row['ID'],
                    "DESCRIPCION" => $row['DESCRIPCION']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }
    function listarComboBarrio($idCiudad)
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_BARRIOS", self::RUTA_SQL));
            $respuesta->bind_param('s', $idCiudad);
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID" => $row['ID'],
                    "DESCRIPCION" => $row['DESCRIPCION']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarEstadoCivil()
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_ESTADO_CIVIL", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID" => $row['ID'],
                    "DESCRIPCION" => $row['DESCRIPCION']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }
    function listarComboDepartamento()
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_DEPARTAMENTOS", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID" => $row['ID'],
                    "DESCRIPCION" => $row['DESCRIPCION']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboSexoVi()
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_SEXO", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID" => $row['ID'],
                    "DESCRIPCION" => $row['DESCRIPCION']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function registrarVisitanteInv(VisitanteVO $VisitanteVO)
    {
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $referencia = $VisitanteVO->getReferencia();
            $fechaActual = $VisitanteVO->getFechaActual();
            $terConso = $VisitanteVO->getTerConso();
            $terPasPrin = $VisitanteVO->getTerPasPrin();
            $terObrero = $VisitanteVO->getTerObrero();
            $tipoDocVisInv = $VisitanteVO->getTipoDocVisInv();
            $docVisInv = $VisitanteVO->getDocVisInv();
            $primerNombreVisInv = $VisitanteVO->getPrimerNombreVisInv();
            $segundoNombreVisInv = $VisitanteVO->getSegundoNombreVisInv();
            $primerApellidoVisInv = $VisitanteVO->getPrimerApellidoVisInv();
            $segundoApellidoVisInv = $VisitanteVO->getSegundoApellidoVisInv();
            $departamento = $VisitanteVO->getDepartamento();
            $ciudad = $VisitanteVO->getCiudad();
            $barrio = $VisitanteVO->getBarrio();
            $direccion = $VisitanteVO->getDireccion();
            $celular = $VisitanteVO->getCelular();
            $sexo = $VisitanteVO->getSexo();
            $edad = $VisitanteVO->getEdad();
            $estadoCivil = $VisitanteVO->getEstadoCivil();
            $peticion = $VisitanteVO->getPeticion();
            /*$idVisInv = $VisitanteVO->getIdVisInv();
            $terInvVis = $VisitanteVO->getTerInvVis();*/
            $respuesta = $conexion->prepare($this->getSql("CONSULTAR_DOCUMENTO", self::RUTA_SQL));
            $respuesta->bind_param('s', $docVisInv);
            $respuesta->execute();
            $resultado = $respuesta->get_result();
            $row = $resultado->fetch_assoc();
            if (count($row) === 0) {
                $respuesta = $conexion->prepare($this->getSql("AGREGAR_TER_INVITADO", self::RUTA_SQL));
                $respuesta->bind_param('ssssssssssssss', $tipoDocVisInv, $docVisInv, $primerNombreVisInv, $segundoNombreVisInv, $primerApellidoVisInv, $segundoApellidoVisInv, $departamento, $ciudad, $barrio, $direccion, $celular, $sexo, $edad, $estadoCivil);
                $filasAfectadas = $respuesta->execute() or ($respuesta->error);
                $idTerVis = mysqli_insert_id($conexion);
                if ($filasAfectadas > 0) {
                    $respuesta = $conexion->prepare($this->getSql("VISITANTE_INVITADO_DETALLE", self::RUTA_SQL));
                    $respuesta->bind_param('sssssss', $referencia, $fechaActual, $terConso, $terPasPrin, $terObrero, $idTerVis, $peticion);
                    $filasAfectadas = $respuesta->execute();

                    if ($filasAfectadas) {
                        $tipoDoc = 1;
                        $respuesta = $conexion->prepare($this->getSql("AUMENTAR_CONSECUTIVO_VI", self::RUTA_SQL));
                    }
                }



            } else {
                $filasAfectadas = $respuesta->error;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $filasAfectadas;
    }

    function visualizarVisitanteInv()
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("VISUALIZAR_VISITANTES_INVITADOS", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID_VIS" => $row['ID_VIS'],
                    "TER_VIS" => $row['TER_VIS'],
                    "FECHA_REGISTRO" => $row['FECHA_REGISTRO'],
                    "TER_CONSO" => $row['TER_CONSO'],
                    "PAST_PRINC" => $row['PAST_PRINC'],
                    "TER_OBR" => $row['TER_OBR'],
                    "TIPO_DOC" => $row['TIPO_DOC'],
                    "DOCUMENTO" => $row['DOCUMENTO'],
                    "PRIMER_NOMBRE" => $row['PRIMER_NOMBRE'],
                    "SEGUNDO_NOMBRE" => $row['SEGUNDO_NOMBRE'],
                    "PRIMER_APELLIDO" => $row['PRIMER_APELLIDO'],
                    "SEGUNDO_APELLIDO" => $row['SEGUNDO_APELLIDO'],
                    "NOMBRE" => $row['NOMBRE'],
                    "OBRERO" => $row['OBRERO'],
                    "CONSOLIDADOR" => $row['CONSOLIDADOR'],
                    "ID_DEP" => $row['ID_DEP'],
                    "ID_CIU" => $row['ID_CIU'],
                    "ID_BARRIO" => $row['ID_BARRIO'],
                    "DIRECCION" => $row['DIRECCION'],
                    "EDAD" => $row['EDAD'],
                    "SEXO" => $row['SEXO'],
                    "CELULAR" => $row['CELULAR'],
                    "ESTADO_CIVIL" => $row['ESTADO_CIVIL'],
                    "PETICION" => $row['PETICION'],
                    "NUM_INGRESO" => $row['NUM_INGRESO']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function actualizarVisitanteInv(VisitanteVO $VisitanteVO)
    {
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $referencia = $VisitanteVO->getReferencia();
            $fechaActual = $VisitanteVO->getFechaActual();
            $terConso = $VisitanteVO->getTerConso();
            $terPasPrin = $VisitanteVO->getTerPasPrin();
            $terObrero = $VisitanteVO->getTerObrero();
            $tipoDocVisInv = $VisitanteVO->getTipoDocVisInv();
            $docVisInv = $VisitanteVO->getDocVisInv();
            $primerNombreVisInv = $VisitanteVO->getPrimerNombreVisInv();
            $segundoNombreVisInv = $VisitanteVO->getSegundoNombreVisInv();
            $primerApellidoVisInv = $VisitanteVO->getPrimerApellidoVisInv();
            $segundoApellidoVisInv = $VisitanteVO->getSegundoApellidoVisInv();
            $departamento = $VisitanteVO->getDepartamento();
            $ciudad = $VisitanteVO->getCiudad();
            $barrio = $VisitanteVO->getBarrio();
            $direccion = $VisitanteVO->getDireccion();
            $celular = $VisitanteVO->getCelular();
            $sexo = $VisitanteVO->getSexo();
            $edad = $VisitanteVO->getEdad();
            $estadoCivil = $VisitanteVO->getEstadoCivil();
            $idVisInv = $VisitanteVO->getIdVisInv();
            $terInvVis = $VisitanteVO->getTerInvVis();
            //die(var_dump($referencia,$terConso,$terPasPrin,$terObrero,$terInvVis, $idVisInv));
            $respuesta = $conexion->prepare($this->getSql("ACTUALIZAR_TER_VISINV", self::RUTA_SQL));
            $respuesta->bind_param('ssssssssssssss', $tipoDocVisInv, $primerNombreVisInv, $segundoNombreVisInv, $primerApellidoVisInv, $segundoApellidoVisInv, $departamento, $ciudad, $barrio, $direccion, $celular, $sexo, $edad, $estadoCivil, $terInvVis);
            $filasAfectadas1 = $respuesta->execute() or ($respuesta->error);
            // if ($filasAfectadas > 0) {
            $respuesta = $conexion->prepare($this->getSql("ACTUALIZAR_VISITANTE_INVITADO", self::RUTA_SQL));
            $respuesta->bind_param('ssssss', $referencia, $terConso, $terPasPrin, $terObrero, $terInvVis, $idVisInv);
            $filasAfectadas2 = $respuesta->execute();
            //  }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return ($filasAfectadas1 > 0 || $filasAfectadas2 > 0);
    }

    function registrarVisitanteNoInv(visitanteVO $visitanteVO)
    {
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $referencia2 = $visitanteVO->getReferencia();
            $fechaRegistroVni = $visitanteVO->getFechaActual();
            $terConsejero = $visitanteVO->getTerConso();
            $horaLlamdaVni = $visitanteVO->getHllamdaVni();
            $tipDocVni = $visitanteVO->getTipoDocVisInv();
            $numDocVni = $visitanteVO->getDocVisInv();
            $primerNombreVni = $visitanteVO->getPrimerNombreVisInv();
            $segundoNombreVni = $visitanteVO->getSegundoNombreVisInv();
            $primerApellidoVni = $visitanteVO->getPrimerApellidoVisInv();
            $segundoApellidoVni = $visitanteVO->getSegundoApellidoVisInv();
            $departamentoVni = $visitanteVO->getDepartamento();
            $ciudadVni = $visitanteVO->getCiudad();
            $barrioVni = $visitanteVO->getBarrio();
            $direccionVni = $visitanteVO->getDireccion();
            $edadVni = $visitanteVO->getEdad();
            $celularVni = $visitanteVO->getCelular();
            $estadoCivilVni = $visitanteVO->getEstadoCivil();
            $peticionVni = $visitanteVO->getPeticion();
            $terAsig = $visitanteVO->getTerAsignado();
            $horaLlamadaAsig = $visitanteVO->getHllamadaAsig();
            $sexo = $visitanteVO->getSexo();
            /*$idVis = $visitanteVO->getIdVisInv();
            $terIdVis = $visitanteVO->getTerInvVis();*/
            $respuesta = $conexion->prepare($this->getSql("CONSULTAR_DOCUMENTO_VNI", self::RUTA_SQL));
            $respuesta->bind_param('s', $numDocVni);
            $respuesta->execute();
            $resultado = $respuesta->get_result();
            $row = $resultado->fetch_assoc();
            if (count($row) === 0) {
                $respuesta = $conexion->prepare($this->getSql("AGREGAR_TER_NOINVITADO", self::RUTA_SQL));
                $respuesta->bind_param('ssssssssssssss', $tipDocVni, $numDocVni, $primerNombreVni, $segundoNombreVni, $primerApellidoVni, $segundoApellidoVni, $departamentoVni, $ciudadVni, $barrioVni, $direccionVni, $celularVni, $sexo, $edadVni, $estadoCivilVni);
                $filasAfectadas = $respuesta->execute() or ($respuesta->error);
                $idTerVni = mysqli_insert_id($conexion);
                if ($filasAfectadas > 0) {
                    $respuesta = $conexion->prepare($this->getSql("VISITANTE_NOINVITADO_DETALLE", self::RUTA_SQL));
                    $respuesta->bind_param('ssssssss', $referencia2, $fechaRegistroVni, $terConsejero, $horaLlamdaVni, $peticionVni, $terAsig, $horaLlamadaAsig, $idTerVni);
                    $filasAfectadas = $respuesta->execute() or ($respuesta->error);
                }
            } else {
                $filasAfectadas = $respuesta->error;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $filasAfectadas;
    }

    function visualizarVisitanteNoInv()
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("VISUALIZAR_VISITANTES_NOINVITADOS", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID_VIS" => $row['ID_VIS'],
                    "TER_VIS" => $row['TER_VIS'],
                    "FECHA_REGISTRO" => $row['FECHA_REGISTRO'],
                    "TER_CONSE" => $row['TER_CONSE'],
                    "HORA_LLAMADA" => $row['HORA_LLAMADA'],
                    "TIPO_DOC" => $row['TIPO_DOC'],
                    "NUM_DOC" => $row['NUM_DOC'],
                    "PRIMER_NOMBRE" => $row['PRIMER_NOMBRE'],
                    "SEGUNDO_NOMBRE" => $row['SEGUNDO_NOMBRE'],
                    "PRIMER_APELLIDO" => $row['PRIMER_APELLIDO'],
                    "SEGUNDO_APELLIDO" => $row['SEGUNDO_APELLIDO'],
                    "NOMBRE_COMPLETO" => $row['NOMBRE_COMPLETO'],
                    "DEPARTAMENTO" => $row['DEPARTAMENTO'],
                    "CIUDAD" => $row['CIUDAD'],
                    "BARRIO" => $row['BARRIO'],
                    "DIRECCION" => $row['DIRECCION'],
                    "EDAD" => $row['EDAD'],
                    "CELULAR" => $row['CELULAR'],
                    "ASIGNADO" => $row['ASIGNADO'],
                    "TER_ASIG" => $row['TER_ASIG'],
                    "CONSEJERO" => $row['CONSEJERO'],
                    "TER_CONSO" => $row['TER_CONSO'],
                    "SEXO_ID" => $row['SEXO_ID'],
                    "ESTADO_CIVIL" => $row['ESTADO_CIVIL'],
                    "PETICION" => $row['PETICION'],
                    "LLAMADA_ASIG" => $row['LLAMADA_ASIG'],
                    "NUM_INGRESO" => $row['NUM_INGRESO']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }
}