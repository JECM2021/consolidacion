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

    function actualizarPastorGeneral(PastoresVO $PastoresVO, $idTer, $estado)
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
                $respuesta->bind_param('ssss', $ministerio, $codigoPastor, $estado, $idTer);
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

    function listarPastoresGenerales()
    {
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

    function registrarPastorPrincipal($tipoDocumento, $numDocumento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $departamento, $ciudad, $barrios, $direccion, $telefono, $celular, $sexo, $edad, $estadoCivil, $ministerio, $codigoPastor, $idPg, $estadoPp)
    {
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("CONSULTAR_CODIGO_PASTOR_PRINCIPAL", self::RUTA_SQL));
            $respuesta->bind_param('s', $codigoPastor);
            $respuesta->execute();
            $resultado = $respuesta->get_result();
            $row = $resultado->fetch_assoc();
            if (count($row) === 0) {
                $respuesta = $conexion->prepare($this->getSql("AGREGAR_PASTOR_PRINCIPAL", self::RUTA_SQL));
                $respuesta->bind_param('sssssssssssssss', $tipoDocumento, $numDocumento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $departamento, $ciudad, $barrios, $direccion, $telefono, $celular, $sexo, $edad, $estadoCivil);
                $filasAfectadas = $respuesta->execute() or ($respuesta->error);
                $idter = mysqli_insert_id($conexion);
                if ($filasAfectadas > 0) {
                    $respuesta = $conexion->prepare($this->getSql("AGREGAR_PASTORPRINCIPAL_DETALLE", self::RUTA_SQL));
                    $respuesta->bind_param('sssss', $idter, $ministerio, $codigoPastor, $idPg, $estadoPp);

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

    function visualizarPastPrincipal()
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("VISUALIZAR_PASTORES_PRINCIPAL", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID_PP" => $row['ID_PP'],
                    "TER_PP" => $row['TER_PP'],
                    "ID_PG" => $row['ID_PG'],
                    "TIPO_DOC" => $row['TIPO_DOC'],
                    "DOCUMENTO" => $row['DOCUMENTO'],
                    "PRIMER_NOMBRE" => $row['PRIMER_NOMBRE'],
                    "SEGUNDO_NOMBRE" => $row['SEGUNDO_NOMBRE'],
                    "PRIMER_APELLIDO" => $row['PRIMER_APELLIDO'],
                    "SEGUNDO_APELLIDO" => $row['SEGUNDO_APELLIDO'],
                    "NOMBRE" => $row['NOMBRE'],
                    "DEPT" => $row['DEPT'],
                    "CIU" => $row['CIU'],
                    "BARRIO" => $row['BARRIO'],
                    "DIRECCION" => $row['DIRECCION'],
                    "TELEFONO" => $row['TELEFONO'],
                    "CELULAR" => $row['CELULAR'],
                    "SEXO" => $row['SEXO'],
                    "EDAD" => $row['EDAD'],
                    "CIVIL" => $row['CIVIL'],
                    "ID_MINISTERIO" => $row['ID_MINISTERIO'],
                    "COD_PP" => $row['COD_PP'],
                    "PASTORGENERAL" => $row['PASTORGENERAL'],
                    "MINISTERIO" => $row['MINISTERIO'],
                    "ID_ESTADO" => $row['ID_ESTADO'],
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

    function actualizarPastorPrincipal($tipoDocumento, $numDocumento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $departamento, $ciudad, $barrios, $direccion, $telefono, $celular, $sexo, $edad, $estadoCivil, $ministerio, $codigoPastor, $idPg, $ter_id, $estadoPp, $idPp)
    {
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("ACTUALIZAR_PASTOR_PRINCIPAL", self::RUTA_SQL));
            $respuesta->bind_param('ssssssssssssssss', $tipoDocumento, $numDocumento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $departamento, $ciudad, $barrios, $direccion, $telefono, $celular, $sexo, $edad, $estadoCivil, $ter_id);
            $filasAfectadas = $respuesta->execute() or ($respuesta->error);
            if ($filasAfectadas > 0) {
                $respuesta = $conexion->prepare($this->getSql("ACTUALIZAR_PASTORPRINCIPAL_DETALLE", self::RUTA_SQL));
                $respuesta->bind_param('ssssss', $ministerio, $codigoPastor, $estadoPp, $idPg, $idTer, $idPp);
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

    function listarPastoresPrincipales()
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_PASTORES_PRINCIPALES", self::RUTA_SQL));
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

    function registrarObrero($pastorPrincipal, $tipoDocumentoOb, $documentoOb, $primerNombreOb, $segundoNombreOb, $primerApellidoOb, $segundoApellidoOb, $departamentoOb, $ciudadOb, $barrioOb, $direccionOb, $telefonoOb, $celularOb, $sexoOb, $edadOb, $estadoCivilOb, $estadoOb)
    {
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $conexion->begin_transaction();
            $conexion->autocommit(false);
            $respuesta = $conexion->prepare($this->getSql("CONSULTAR_DOCUMENTO", self::RUTA_SQL));
            $respuesta->bind_param('s', $documentoOb);
            $respuesta->execute();
            $resultado = $respuesta->get_result();
            $row = $resultado->fetch_assoc();
            if (count($row) === 0) {
                $respuesta = $conexion->prepare($this->getSql("AGREGAR_OBRERO", self::RUTA_SQL));
                $respuesta->bind_param('sssssssssssssss', $tipoDocumentoOb, $documentoOb, $primerNombreOb, $segundoNombreOb, $primerApellidoOb, $segundoApellidoOb, $departamentoOb, $ciudadOb, $barrioOb, $direccionOb, $telefonoOb, $celularOb, $sexoOb, $edadOb, $estadoCivilOb);
                $filasAfectadas = $respuesta->execute() or ($respuesta->error);
                $idter = mysqli_insert_id($conexion);
                if ($filasAfectadas > 0) {
                    $respuesta = $conexion->prepare($this->getSql("AGREGAR_OBERRO_DETALLE", self::RUTA_SQL));
                    $respuesta->bind_param('sss', $idter, $pastorPrincipal, $estadoOb);
                    //$filasAfectadas = $respuesta->execute() or ($respuesta->error);
                    if (!empty($idter)) {
                        $filasAfectadas = $respuesta->execute();
                        $afectaRegistros = true;
                    } else {
                        $filasAfectadas = -1;
                        $afectaRegistros = false;
                    }
                    if ($afectaRegistros == true) {
                        $conexion->autocommit(true);
                    } else {
                        $conexion->rollback();
                        $filasAfectadas = $respuesta->error;
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
    function visualizarObreros()
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("VISUALIZAR_OBREROS", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "PP_ID" => $row['PP_ID'],
                    "OB_ID" => $row['OB_ID'],
                    "OB_TERID" => $row['OB_TERID'],
                    "TIPO_DOC" => $row['TIPO_DOC'],
                    "NUM_DOCUMENTO" => $row['NUM_DOCUMENTO'],
                    "PRIMER_NOMBRE" => $row['PRIMER_NOMBRE'],
                    "SEGUNDO_NOMBRE" => $row['SEGUNDO_NOMBRE'],
                    "PRIMER_APELLIDO" => $row['PRIMER_APELLIDO'],
                    "SEGUNDO_APELLIDO" => $row['SEGUNDO_APELLIDO'],
                    "NOMBRE_COMPLETO" => $row['NOMBRE_COMPLETO'],
                    "NOMBRE_PASTOR" => $row['NOMBRE_PASTOR'],
                    "DEPT_ID" => $row['DEPT_ID'],
                    "CIU_ID" => $row['CIU_ID'],
                    "BARRIO_ID" => $row['BARRIO_ID'],
                    "DIRECCION" => $row['DIRECCION'],
                    "TELEFONO" => $row['TELEFONO'],
                    "CELULAR" => $row['CELULAR'],
                    "SEXO_ID" => $row['SEXO_ID'],
                    "EDAD" => $row['EDAD'],
                    "ETC_ID" => $row['ETC_ID'],
                    "ESTADO_ID" => $row['ESTADO_ID'],
                    "ESTADO" => $row['ESTADO'],
                    "MINISTERIO" => $row['MINISTERIO']
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

    function actualizarObrero($pastorPrincipal, $tipoDocumentoOb, $documentoOb, $primerNombreOb, $segundoNombreOb, $primerApellidoOb, $segundoApellidoOb, $departamentoOb, $ciudadOb, $barrioOb, $direccionOb, $telefonoOb, $celularOb, $sexoOb, $edadOb, $estadoCivilOb, $estadoOb, $terIdOb, $idOb)
    {
        try {
            $conexion = $this->conectarBd(self::CONSOLIDACION);
            $respuesta = $conexion->prepare($this->getSql("ACTUALIZAR_TEROBRERO", self::RUTA_SQL));
            $respuesta->bind_param('ssssssssssssssss', $tipoDocumentoOb, $documentoOb, $primerNombreOb, $segundoNombreOb, $primerApellidoOb, $segundoApellidoOb, $departamentoOb, $ciudadOb, $barrioOb, $direccionOb, $telefonoOb, $celularOb, $sexoOb, $edadOb, $estadoCivilOb, $terIdOb);
            $filasAfectadas = $respuesta->execute() or ($respuesta->error);
            if ($filasAfectadas > 0) {
                $respuesta = $conexion->prepare($this->getSql("ACTUALIZAR_OBRERO_DETALLE", self::RUTA_SQL));
                $respuesta->bind_param('ssss', $pastorPrincipal, $estadoOb, $terIdOb, $idOb);
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
}
