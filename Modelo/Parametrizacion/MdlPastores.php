<?php
require_once '../../Conexion/Conexion.php';
require_once '../../Modelo/Parametrizacion/Bean/PastoresVO.php';

class mdlPastores extends conexion
{
    const RUTA_SQL = "../../Modelo/Parametrizacion/sqlPastores.xml";

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

    function listarComboSexo()
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_TIPO_SEXO", self::RUTA_SQL));
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

    function listarMinisterios()
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_MINISTERIOS", self::RUTA_SQL));
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

    function registrarPastorGeneral(PastoresVO $PastoresVO)
    {
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $tipoDocumento = $PastoresVO->getTipoDocumento();
            $numDocumento = $PastoresVO->getNumDocumento();
            $primerNombre = $PastoresVO->getPrimerNombre();
            $segundoNombre = $PastoresVO->getSegundoNombre();
            $primerApellido = $PastoresVO->getPrimerApellido();
            $segundoApellido = $PastoresVO->getSegundoApellido();
            $departamento = $PastoresVO->getDepartamento();
            $ciudad = $PastoresVO->getCiudad();
            $barrios = $PastoresVO->getBarrios();
            $direccion = $PastoresVO->getDireccion();
            $telefono = $PastoresVO->getTelefono();
            $celular = $PastoresVO->getCelular();
            $sexo = $PastoresVO->getSexo();
            $edad = $PastoresVO->getEdad();
            $estadoCivil = $PastoresVO->getEstadoCivil();
            $ministerio = $PastoresVO->getMinisterio();
            $codigoPastor = $PastoresVO->getCodigoPastor();
            $respuesta = $conexion->prepare($this->getSql("CONSULTAR_CODIGO_PASTOR", self::RUTA_SQL));
            $respuesta->bind_param('s', $codigoPastor);
            $respuesta->execute();
            $resultado = $respuesta->get_result();
            $row = $resultado->fetch_assoc();
            if (count($row) === 0) {
                $respuesta = $conexion->prepare($this->getSql("AGREGAR_PASTOR_GENERAL", self::RUTA_SQL));
                $respuesta->bind_param('sssssssssssssss', $tipoDocumento, $numDocumento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $departamento, $ciudad, $barrios, $direccion, $telefono, $celular, $sexo, $edad, $estadoCivil);
                $filasAfectadas = $respuesta->execute() or ($respuesta->error);
                $idter = mysqli_insert_id($conexion);
                if ($filasAfectadas > 0) {
                    $respuesta = $conexion->prepare($this->getSql("AGREGAR_PASTORGENERAL_DETALLE", self::RUTA_SQL));
                    $respuesta->bind_param('sss', $idter, $ministerio, $codigoPastor);

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

    function visualizarPastGeneral()
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("VISUALIZAR_PASTORES_GENERAL", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "TER_ID" => $row['TER_ID'],
                    "PASTGEN_ID" => $row['PASTGEN_ID'],
                    "CODIGO" => $row['CODIGO'],
                    "NOMBRE" => $row['NOMBRE'],
                    "MINISTERIO" => $row['MINISTERIO'],
                    "ESTADO" => $row['ESTADO'],
                    "ESTADO_ID" => $row['ESTADO_ID'],
                    "TIPO_DOCUMENTO" => $row['TIPO_DOCUMENTO'],
                    "DOCUMENTO" => $row['DOCUMENTO'],
                    "PRIMER_NOMBRE" => $row['PRIMER_NOMBRE'],
                    "SEGUNDO_NOMBRE" => $row['SEGUNDO_NOMBRE'],
                    "PRIMER_APELLIDO" => $row['PRIMER_APELLIDO'],
                    "SEGUNDO_APELLIDO" => $row['SEGUNDO_APELLIDO'],
                    "DEPARTAMENTO" => $row['DEPARTAMENTO'],
                    "CIUDAD" => $row['CIUDAD'],
                    "BARRIO" => $row['BARRIO'],
                    "DIRECCION" => $row['DIRECCION'],
                    "TELEFONO" => $row['TELEFONO'],
                    "CELULAR" => $row['CELULAR'],
                    "SEXO" => $row['SEXO'],
                    "EDAD" => $row['EDAD'],
                    "EST_CIVIL" => $row['EST_CIVIL'],
                    "MINISTERIO_ID" => $row['MINISTERIO_ID']
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

    function actualizarPastorGeneral(PastoresVO $PastoresVO, $idTer,$estado)
    {
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("ACTUALIZAR_PASTOR_GENERAL", self::RUTA_SQL));
            $tipoDocumento = $PastoresVO->getTipoDocumento();
            $numDocumento = $PastoresVO->getNumDocumento();
            $primerNombre = $PastoresVO->getPrimerNombre();
            $segundoNombre = $PastoresVO->getSegundoNombre();
            $primerApellido = $PastoresVO->getPrimerApellido();
            $segundoApellido = $PastoresVO->getSegundoApellido();
            $departamento = $PastoresVO->getDepartamento();
            $ciudad = $PastoresVO->getCiudad();
            $barrios = $PastoresVO->getBarrios();
            $direccion = $PastoresVO->getDireccion();
            $telefono = $PastoresVO->getTelefono();
            $celular = $PastoresVO->getCelular();
            $sexo = $PastoresVO->getSexo();
            $edad = $PastoresVO->getEdad();
            $estadoCivil = $PastoresVO->getEstadoCivil();
            $ministerio = $PastoresVO->getMinisterio();
            $codigoPastor = $PastoresVO->getCodigoPastor();
            $respuesta = $conexion->prepare($this->getSql("ACTUALIZAR_PASTOR_GENERAL", self::RUTA_SQL));
            $respuesta->bind_param('ssssssssssssssss', $tipoDocumento, $numDocumento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $departamento, $ciudad, $barrios, $direccion, $telefono, $celular, $sexo, $edad, $estadoCivil, $idTer);
            $filasAfectadas = $respuesta->execute() or ($respuesta->error);
            if ($filasAfectadas > 0) {
                $respuesta = $conexion->prepare($this->getSql("ACTUALIZAR_PASTORGENERAL_DETALLE", self::RUTA_SQL));
                $respuesta->bind_param('ssss', $ministerio, $codigoPastor,$estado, $idTer);
                $filasAfectadas = $respuesta->execute();
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

    function listarPastoresGenerales(){
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_PASTORES_GENERALES", self::RUTA_SQL));
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