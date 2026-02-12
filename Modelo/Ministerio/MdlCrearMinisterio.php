<?php
require_once '../../Conexion/Conexion.php';

class mdlCrearMinisterio extends conexion
{
    const RUTA_SQL = "../../Modelo/Ministerio/sqlCrearMinisterio.xml";



    function visualizarMinisterios()
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("VISUALIZAR_MINISTERIOS", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID" => $row['ID'],
                    "MINISTERIO" => $row['MINISTERIO'],
                    "ESTADO" => $row['ESTADO']
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

    function registrarMinisterio($nombre, $estadoMin)
    {

        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("CONSULTAR_NOMBRE_MINISTERIO", self::RUTA_SQL));
            $respuesta->bind_param('s', $nombre);
            $respuesta->execute();
            $resultado = $respuesta->get_result();
            $row = $resultado->fetch_assoc();
            if (count($row) === 0) {
                $respuesta = $conexion->prepare($this->getSql("REGISTRAR_MINISTERIO", self::RUTA_SQL));
                $respuesta->bind_param('ss', $nombre, $estadoMin);
                $filasAfectadas = $respuesta->execute() or ($respuesta->error);
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

    function actualizarMinsiterio($idMin, $nombre, $estadoMin)
    {
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("ACTUALIZAR_MINISTERIO", self::RUTA_SQL));
            $respuesta->bind_param('sss', $nombre, $estadoMin, $idMin);
            $filasAfectadas = $respuesta->execute() or ($respuesta->error);
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

    function eliminarInformacionMinisterio($idMin)
    {
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("ELIMINAR_MINISTERIO", self::RUTA_SQL));
            $respuesta->bind_param('s', $idMin);
            $filasAfectadas = $respuesta->execute() or ($respuesta->error);
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
}
