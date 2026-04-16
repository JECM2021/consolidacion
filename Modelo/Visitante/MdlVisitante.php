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
                    $respuesta->bind_param('ssssss', $referencia, $fechaActual, $terConso, $terPasPrin, $terObrero, $idTerVis);
                    $filasAfectadas = $respuesta->execute();
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
                    "ESTADO_CIVIL" => $row['ESTADO_CIVIL']
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
