<?php
require_once '../../Conexion/Conexion.php';
require_once '../../Modelo/Visitante/Bean/VisitaVO.php';

class mdlVisita extends conexion
{
    const RUTA_SQL = "../../Modelo/Visitante/sqlVisita.xml";

    function visualizarVisitantes()
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("VISUALIZAR_VISITANTES", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID_VIS" => $row['ID_VIS'],
                    "NOMBRE_COMPLETO" => $row['NOMBRE_COMPLETO'],
                    "NUM_DOCUMENTO" => $row['NUM_DOCUMENTO'],
                    "NUM_INGRESO" => $row['NUM_INGRESO'],
                    "REFERENCIA" => $row['REFERENCIA']
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

    function visualizarVisitaRealizada()
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("VISUALIZAR_VISITAS_REALIZADAS", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID_VIS" => $row['ID_VIS'],

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