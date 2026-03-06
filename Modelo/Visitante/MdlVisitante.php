<?php
require_once '../../Conexion/Conexion.php';

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

    function listarComboCiudad()
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_CIUDADES", self::RUTA_SQL));
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
}
