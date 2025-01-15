<?php

require_once '/../Modelo/Bean/MenuVO.php';
require_once '/../Conexion/Conexion.php';

class MdlClinica extends Conexion {

    const RUTA_SQL = "../Modelo/sqlPublic.xml";

    function consultarCodigoEi10($parametros) {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("CONSULTAR_CODIGO_EIE10", self::RUTA_SQL));
            $pm = $parametros;
            $respuesta->bind_param('ss', $pm, $pm);
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "DESCRIPCION" => $row['DESCRIPCION']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function loguearUsuario(UsuariosVO $usuario) {
        $usuarioVO = null;
        try {
            $conexion = $this->conectarBd(self::CONFIGURACION);
            $respuesta = $conexion->prepare($this->getSql("LOGUEAR_USUARIO", self::RUTA_SQL));
            $emp = $usuario->getEmpresa();
            $usu = $usuario->getUsuusuario();
            $contrase = $usuario->getContrasena();
            $respuesta->bind_param('ss', $usu, $contrase);
            $respuesta->execute();
            $res = $respuesta->get_result();
            $row = $res->fetch_assoc();
            if ($row) {
                $usuarioVO = new UsuariosVO();
                $usuarioVO->setIdUsuario($row['USU_ID']);
                $usuarioVO->setDocumento($row['USU_DOCUMENTO']);
                $usuarioVO->setNombreUsuario($row['NOMBRE']);
                $usuarioVO->setIdPeril($row['PER_ID']);
               /* $usuarioVO->setTerId($row['TER_ID']);*/
                $usuarioVO->setUsuusuario($row['USU_USUARIO']);
               /* $usuarioVO->setEmpresa($row['NOMBRE_PASTOR']);
                $usuarioVO->setBdClinica($row['BD']);*/
            }
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $usuarioVO;
       
    }

    function listarComboTipoDocumento() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_TIPO_DOCUMENTO", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarTipoPaciente() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_TIPO_PACIENTE", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboSexo() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_SEXO", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboTipoMovimiento() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_TIPO_MOVIMIENTO", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarGrupoSanguineo() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_GRUPO_SANGUINEO", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboCiudades() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_CIUDADES", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboOcupacion() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_OCUPACION", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboDepartamento($idCiudad) {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_DEPARTAMENTO", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboTarifarios() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_TARIFARIOS", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboProcedimiento($isOrdenMedica, $isOrdenOtrosServicios) {
        $rawdata = array();
        try {
            $ordenMedica = $isOrdenMedica;
            $otrosServicios = $isOrdenOtrosServicios;

            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_PROCEDIMIENTO", self::RUTA_SQL));
            $respuesta->bind_param('ss', $ordenMedica, $otrosServicios);
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboEstadoCivil() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_CIVIL", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboPlantel() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_PLANTEL", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboMovil() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_MOVIL", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboCodigosEi10() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_EI10", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "DESCRIPCION" => $row['DESCRIPCION']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboEstadosTriage() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_ESTADO_TRIAGE", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboReferencia() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_REFERENCIA", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID" => $row['ID'],
                    "DESCRIPCION" => $row['DESCRIPCION'],
                    "CANTIDAD" => $row['CANTIDAD'],
                    "NOMBRE" => $row['NOMBRE'],
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboTipoPlaca() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_TIPO_PLACA", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboTipoCaso() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_TIPO_CASO", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function obtenerMenu(UsuariosVO $usuariosVO) {
        $rawdata = array();
        try {
            $idUsuario = $usuariosVO->getIdUsuario();
            $idPerfil = $usuariosVO->getIdPeril();
            $conexion = $this->conectarBd(self::CONFIGURACION);
            $respuesta = $conexion->prepare($this->getSql("OBTENER_MENU_USUARIO", self::RUTA_SQL));
            $respuesta->bind_param('ss', $idUsuario, $idPerfil);
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "menu_id" => $row['MENU_ID'],
                    "pagina_menu" => $row['PAGINA_MENU'],
                    "icono_menu" => $row['ICONO_MENU']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function obtenerPaginas($idMenu, $idPerfil, $usuId) {
        $rawdata = array();
        $i = 0;
        try {
            $conexion = $this->conectarBd(self::CONFIGURACION);
            $respuesta = $conexion->query("    
                                        SELECT perfil_paginas.pag_id,sof_nombre AS nombre, sof_url as url,sof_icono  as icono  
                                        FROM  configuraciones.perfil_paginas
                                        INNER JOIN configuraciones.paginas USING(pag_id)
                                        INNER JOIN configuraciones.menu men on men.men_id = paginas.men_id
                                        INNER JOIN configuraciones.perfil USING(per_id)
                                        INNER JOIN configuraciones.usuario USING(per_id)
                                        WHERE  men.tip_menu = 1 AND perfil.per_id = $idPerfil  AND usuario.usu_id = $usuId
                                        AND perfil_paginas.men_id =$idMenu AND perfil_paginas.prs_estado='A'
                                            ORDER by 2;
                                        ");
            while ($row = mysqli_fetch_array($respuesta)) {
                $rawdata[$i] = $row;
                $i++;
            }
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $rawdata;
    }

    function obtenerSubMenu($idMenu, $idPerfil, $usuId) {
        $rawdata = array();
        $i = 0;
        try {
            $conexion = $this->conectarBd(self::CONFIGURACION);
            $respuesta = $conexion->query("    
                                        SELECT  
                                        menu.men_id as menu_id, menu.men_nombre   AS nombre,men_icono AS icono  FROM menu menu 
                                        INNER JOIN perfil_menu perfil_menu  
                                        ON  menu.men_id   =  perfil_menu.men_id
                                        INNER JOIN  usuario usu on perfil_menu.per_id =  usu.per_id
                                        WHERE menu.tip_menu = 1 AND  usu_id = $usuId AND perfil_menu.per_id = $idPerfil and menu.men_padre = $idMenu
                                        AND  prm_estado =  'A'  ORDER BY  men_order;
                                        ");
            while ($row = mysqli_fetch_array($respuesta)) {
                $rawdata[$i] = $row;
                $i++;
            }
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $rawdata;
    }

    function visualizarConvenios() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->query("
                                            SELECT cli_razon_social as RAZON_SOCIAL,
                                            clientes.cli_id AS CLIENTE,
                                            cov_id AS CON,
                                            convenios.cov_codigo as CODIGO, 
                                            tipo_cliente.tpc_descripcion AS TIPO_CLI,
                                            tipo_cliente.tpc_id AS TIPO,
                                            tarifarios.tar_nombre AS TARIFARIO,  
                                            convenios.cov_fecha_inicial AS FECHA_INICIAL,
                                            convenios.cov_fecha_final AS FECHA_FINAL,
                                            convenios.cov_descripcion AS DESCRIPCION,
                                            COALESCE(convenios.cov_porcentaje,'') AS PORCENTAJE,
                                            tarifarios.tar_id AS ID_TARIFARIO,
                                            terceros.ter_documento AS DOCUMENTO
                                            FROM  convenios 
                                            INNER JOIN  tarifarios 
                                            USING(tar_id)
                                            INNER JOIN  tipo_cliente USING(tpc_id)
                                            INNER JOIN  terceros USING(ter_id)
                                            INNER JOIN  clientes USING(ter_id)");
            while ($row = mysqli_fetch_array($respuesta)) {
                $rawdata[] = $row;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function consultarTercero(TercerosVO $terceroVO) {
        require_once '../../Modelo/Bean/TercerosVO.php';
        $tercerosVO = null;
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $terDocumento = $terceroVO->getDocumento();
            $respuesta = $conexion->query("
                                            SELECT 
                                            con.cov_id,
                                            terceros.ter_documento as documento,
                                            sexo.sex_descripcion as sexo, 
                                            sexo.sex_id as id_sexo,
                                            plantel.pln_id  AS  id_plan,
                                            plantel.pln_nombre as plantel,
                                            plantel.tpp_id as tipo_plantel,
                                            plantel.pln_direccion as direccion,
                                            CONVERT(DATE_FORMAT(LOCALTIME,'%Y')-DATE_FORMAT(ter_fecha_nacimiento,'%Y'),INT) as edad,
                                            terceros.ter_direccion as direccion,
                                            terceros.ter_celular as celular,
                                            ciudad.ciu_id as id_ciudad,
                                            terceros.ter_telefono as telefono,
                                            terceros.ter_primer_nombre,
                                            terceros.ter_segundo_nombre,
                                            terceros.ter_primer_apellido,
                                            terceros.ter_segundo_apellido,
                                            CONCAT(terceros.ter_primer_nombre,  ' ', terceros.ter_segundo_nombre, ' ' ,  terceros.ter_primer_apellido, ' ' , terceros.ter_segundo_apellido )  AS nombres,
                                            departamento.dep_descripcion AS departamento,
                                            departamento.dep_id as id_dep,
                                            ciudad.ciu_descripcion as ciudad, 
                                            ter_barrio as barrio, 
                                            estado_civil.etc_descripcion AS estado_civil, 
                                            etc_id as id_estado,
                                            ocupacion.ocu_id, 
                                            grupo_sanguineo.gru_id as id_grupo,
                                            pacientes.tpc_id as tipo_pac,
                                            pacientes.tpc_id  as tipo,
                                            terceros.ter_fecha_expedicion,
                                            concat(ocu_id,' | ',ocupacion.ocu_descripcion) AS ocupacion, terceros.ter_fecha_nacimiento as nacimiento, grupo_sanguineo.gru_descripcion as grupo, 
                                            evento.eve_id as eve,eve_numero as evento,
                                               concat('Codigo:', ' ',cov_codigo, ' convenio: ', cov_descripcion) as convenio, tpc_descripcion as tipo_cliente, cli.cli_razon_social as cliente,ar.ar_id as idAreaRural                                          
                                               FROM  terceros INNER JOIN  sexo USING(sex_id)
                                            LEFT JOIN pacientes USING(ter_id)
                                            LEFT JOIN  plantel USING(pln_id)
                                            LEFT JOIN  ciudad USING(ciu_id)
                                            LEFT JOIN  departamento USING(dep_id)
                                            LEFT JOIN  estado_civil USING(etc_id)
                                            LEFT JOIN  ocupacion USING(ocu_id)
                                            LEFT JOIN  grupo_sanguineo USING(gru_id) 
                                             LEFT JOIN (
                                               SELECT  max(eve_id) as eve_id, ter_id  FROM  evento GROUP by ter_id
                                            ) evento USING(ter_id) 
                                            INNER JOIN evento USING(eve_id)
                                            INNER JOIN convenios con USING(cov_id)
                                            INNER JOIN tipo_cliente tpc on tpc.tpc_id = con.tpc_id
                                            INNER JOIN clientes cli on cli.ter_id = con.ter_id
                                            LEFT JOIN area_rural ar ON ar.ar_id = terceros.ar_id 
                                             WHERE  terceros.ter_documento = '$terDocumento';
                                             ");
            $row = mysqli_fetch_assoc($respuesta);
            if ($row) {
                $tercerosVO = new TercerosVO();
                $tercerosVO->setIdConvenio($row['cov_id']);
                $tercerosVO->setDocumento($row['documento']);
                $tercerosVO->setSexo($row['sexo']);
                $tercerosVO->setIdSexo($row['id_sexo']);
                $tercerosVO->setDireccion($row['direccion']);
                $tercerosVO->setCelualar($row['celular']);
                $tercerosVO->setTelefono($row['telefono']);
                $tercerosVO->setPrimerNombre($row['ter_primer_nombre']);
                $tercerosVO->setSegundoNombre($row['ter_segundo_nombre']);
                $tercerosVO->setPrimerApellido($row['ter_primer_apellido']);
                $tercerosVO->setSegundoApellido($row['ter_segundo_apellido']);
                $tercerosVO->setRazonSocial($row['nombres']);
                $tercerosVO->setDepartamento($row['departamento']);
                $tercerosVO->setCiudad($row['ciudad']);
                $tercerosVO->setIdCiudad($row['id_ciudad']);
                $tercerosVO->setBarrio($row['barrio']);
                $tercerosVO->setIdOcupacion($row['ocu_id']);
                $tercerosVO->setEstadoCivil($row['estado_civil']);
                $tercerosVO->setIdEstadoCivil($row['id_estado']);
                $tercerosVO->setOcupacion($row['ocupacion']);
                $tercerosVO->setFecha($row['nacimiento']);
                $tercerosVO->setEdad($row['edad']);
                $tercerosVO->setIdGrupo($row['id_grupo']);
                $tercerosVO->setGrupoSanguineo($row['grupo']);
                $tercerosVO->setTipoPaciente($row['tipo_pac']);
                $tercerosVO->setFechaExpe($row['ter_fecha_expedicion']);
                $tercerosVO->setIdDepartamento($row['id_dep']);
                $tercerosVO->setTipoDocumentos($row['tipo']);
                $tercerosVO->setNombrePlantel($row['plantel']);
                $tercerosVO->setDirreccionPlantel($row['direccion']);
                $tercerosVO->setTipoPlantel($row['tipo_plantel']);
                $tercerosVO->setPlantel($row['id_plan']);
                $tercerosVO->setEvento($row['eve']);
                $tercerosVO->setNumeroEvento($row['evento']);
                $tercerosVO->setConvenio($row['convenio']);
                $tercerosVO->setTipoCliente($row['tipo_cliente']);
                $tercerosVO->setRazonSocialCliente($row['cliente']);
                $tercerosVO->setAreaRural($row['idAreaRural']);
            }
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $tercerosVO;
    }

    function obtenerServicio($procedimiento, $tarifario) {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->query("SELECT   ser_codigo as codigo, ser_tarifa as tarifa, servicios.ser_id as ID, servicios.ser_descripcion as DESCRIPCION from 
                                                  servicios left JOIN componentes ON servicios.ser_id = componentes.ser_id_padre  where pro_id = '$procedimiento'  and tar_id = '$tarifario'");
            while ($row = mysqli_fetch_array($respuesta)) {
                $rawdata[] = $row;
            }
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $rawdata;
    }

    function obtenerCredencialesBd() {
        try {
            $arryBd = array("host" => self::HOST, "usuario" => self::USUARIO, "pass" => self::PASS, "BD" => self::BD);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $arryBd;
    }

    function consultarAcompanante(ParienteVO $ParienteVO) {
        require_once '../../Modelo/Bean/ParienteVO.php';
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $terDocumento = $ParienteVO->getDocumento();
            //$identificacion = $ParienteVO->getIdentificacion();
            $respuesta = $conexion->query("
            SELECT
            terceros.ter_documento AS documento,
            terceros.ter_direccion AS direccion,
            terceros.ter_celular AS celular,
            terceros.ter_telefono AS telefono,
            terceros.ter_primer_nombre,
            terceros.ter_segundo_nombre,
            terceros.ter_primer_apellido,
            terceros.ter_segundo_apellido,
            CONCAT(terceros.ter_primer_nombre,  ' ', terceros.ter_segundo_nombre, ' ' ,  terceros.ter_primer_apellido, ' ' , terceros.ter_segundo_apellido ) AS nombres,
            terceros.tip_id AS tipo
            FROM
            terceros
            WHERE
            terceros.ter_documento = '$terDocumento'  ");
            $row = mysqli_fetch_assoc($respuesta);
            if ($row) {
                $ParienteVO = new ParienteVO();
                $ParienteVO->setDocumento($row['documento']);
                $ParienteVO->setDireccion($row['direccion']);
                $ParienteVO->setCelualar($row['celular']);
                $ParienteVO->setTelefono($row['telefono']);
                $ParienteVO->setPrimerNombre($row['ter_primer_nombre']);
                $ParienteVO->setSegundoNombre($row['ter_segundo_nombre']);
                $ParienteVO->setPrimerApellido($row['ter_primer_apellido']);
                $ParienteVO->setSegundoApellido($row['ter_segundo_apellido']);
                $ParienteVO->setTipoDocumentos($row['tipo']);
            }
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $ParienteVO;
    }

    function obtenerConsecutivoDocumento($tipoConsecutivo) {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->query("SELECT (consecutivo_documento.con_numero + 1) as consecutivo  FROM  consecutivo_documento WHERE  consecutivo_documento.doc_id = '$tipoConsecutivo';");
            if ($row = mysqli_fetch_array($respuesta)) {
                $rawdata[0] = $row;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $rawdata;
    }

    function obtenerConsecutivoResolucion() {
        $rawdata = array();
        $i = 0;
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->query("SELECT CONCAT(RES_PREFIJO, ' ', (res_consecutivo + 1)) as consecutivo  FROM  resolucion WHERE res_estado = 'A'");
            if ($row = mysqli_fetch_array($respuesta)) {
                $rawdata[0] = $row;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $rawdata;
    }

    function listarComboProdecimientosCirugia() {
        $rawdata = array();
        $i = 0;
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->query("SELECT  
                CONCAT(servicios.ser_codigo , ' | ' , UPPER(servicios.ser_descripcion)) AS DESCRIPCION,
                tarifarios.tar_nombre AS TARIFARIO,
                servicios.ser_id AS ID_SER,
                servicios.ser_codigo AS CODIGO,
                servicios.ser_descripcion AS DESCRIP,
                servicios.ser_tarifa AS VALOR_TARIFA
            FROM   servicios
            INNER JOIN  tarifarios USING (tar_id)
            INNER JOIN  ordenes_medicas ON servicios.pro_id = ord_id
            WHERE servicios.pro_id = '66';");
            while ($row = mysqli_fetch_array($respuesta)) {
                $rawdata[] = $row;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $rawdata;
    }

    function listarComboMedicos() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->query("SELECT
                terceros.ter_id AS DOCUMENTO,
                UPPER(especialidad.esp_descripcion) AS ESPECIALIDAD,
                CONCAT(terceros.ter_primer_nombre,
                    ' ',terceros.ter_segundo_nombre,
                    ' ',terceros.ter_primer_apellido,
                    ' ',terceros.ter_segundo_apellido,' | ',UPPER(especialidad.esp_descripcion), ' | ', terceros.ter_id) AS DESCRIPCION
            FROM  terceros
            INNER JOIN  asistencial USING (ter_id)
            INNER JOIN  especialidad USING (esp_id);");
            while ($row = mysqli_fetch_array($respuesta)) {
                $rawdata[] = $row;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $rawdata;
    }

    function listarComboAmbito() {
        $rawdata = array();
        $i = 0;
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->query("SELECT amb_id AS ID, amb_descripcion AS DESCRIPCION  FROM ambito");
            while ($row = mysqli_fetch_array($respuesta)) {
                $rawdata[] = $row;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $rawdata;
    }

    function listarComboAnestesia() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->query("SELECT ant_id AS ID, ant_descripcion AS DESCRIPCION  FROM anestesia");
            while ($row = mysqli_fetch_array($respuesta)) {
                $rawdata[] = $row;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $rawdata;
    }

    function listarComboTipoProdecimientos() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->query("SELECT tipo_id AS ID, tipo_descripcion AS DESCRIPCION  FROM tipo_procedimientoc");
            while ($row = mysqli_fetch_array($respuesta)) {
                $rawdata[] = $row;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $rawdata;
    }

    function listarComboServiciosEpicrisis() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->query("SELECT epser_id AS ID, epser_descripcion AS DESCRIPCION  FROM servicios_epicrisis");
            while ($row = mysqli_fetch_array($respuesta)) {
                $rawdata[] = $row;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $rawdata;
    }

    function listarComboFinalidad() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->query("SELECT fin_id AS ID, fin_descripcion AS DESCRIPCION  FROM finalidad");
            while ($row = mysqli_fetch_array($respuesta)) {
                $rawdata[] = $row;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $rawdata;
    }

    function listarComboRealizacionForma() {
        $rawdataReal = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->query("SELECT freal_id AS ID, freal_descripcion AS DESCRIPCION  FROM forma_realizacion");
            while ($row = mysqli_fetch_array($respuesta)) {
                $rawdataReal[] = $row;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $rawdataReal;
    }

    function listarComboPatologia() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_PATOLOGIA", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID" => $row['PAT_ID'],
                    "DESCRIPCION" => $row['PAT_DESCRIPCION']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboTipoCliente() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_TIPO_CLIENTE", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID" => $row['TPC_ID'],
                    "DESCRIPCION" => $row['TPC_DESCRIPCION']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboDestinoSalida() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_SALIDA", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID" => $row['SAL_ID'],
                    "DESCRIPCION" => $row['SAL_NOMBRE']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarFuncionesIntenvertores() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_FUNCION_INTERVENTOR", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID" => $row['FUN_ID'],
                    "DESCRIPCION" => $row['FUN_DESCRIPCION']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboAtendido() {
        $rawdataReal = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->query("SELECT aten_id AS ID, aten_descripcion AS DESCRIPCION  FROM atendido");
            while ($row = mysqli_fetch_array($respuesta)) {
                $rawdataReal[] = $row;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $rawdataReal;
    }

    function listarComboProdecimientosMenores() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->query("SELECT  
                CONCAT(servicios.ser_codigo , ' | ' , UPPER(servicios.ser_descripcion)) AS DESCRIPCION,
                tarifarios.tar_nombre AS TARIFARIO,
                servicios.ser_id AS ID_SER,
                servicios.ser_codigo AS CODIGO,
                servicios.ser_descripcion AS DESCRIP,
                servicios.ser_tarifa AS VALOR_TARIFA
            FROM  servicios
            INNER JOIN tarifarios USING (tar_id)
            INNER JOIN ordenes_medicas ON servicios.pro_id = ord_id
            WHERE servicios.pro_id = '59';");
            while ($row = mysqli_fetch_array($respuesta)) {
                $rawdata[] = $row;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $rawdata;
    }

    function visualizarMenuReportes(UsuariosVO $usuariosVO) {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONFIGURACION);
            $idUsuario = $usuariosVO->getIdUsuario();
            $idPerfil = $usuariosVO->getIdPeril();
            $respuesta = $conexion->prepare($this->getSql("VISUALIZAR_MENU_REPORTES", self::RUTA_SQL));
            $respuesta->bind_param('ii', $idUsuario, $idPerfil);
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "menu_id" => $row['menu_id'],
                    "pagina_menu" => $row['pagina_menu'],
                    "icono_menu" => $row['icono_menu']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function visualizarPaginasReportes(UsuariosVO $usuariosVO) {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONFIGURACION);
            $respuesta = $conexion->prepare($this->getSql("VISUALIZAR_PAGINA_REPORTES", self::RUTA_SQL));
            $perfil = $usuariosVO->getIdPeril();
            $usuario = $usuariosVO->getIdUsuario();
            $respuesta->bind_param('ss', $perfil, $usuario);
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "pag_id" => $row['pag_id'],
                    "nombre" => $row['nombre'],
                    "url" => $row['url'],
                    "icono" => $row['icono'],
                    "men_id" => $row['men_id']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function verificarUsuario($usuUsuario, $contraActual) {
        $usuarioVO = null;
        try {
            $conexion = $this->conectarBd(self::CONFIGURACION);
            $respuesta = $conexion->prepare($this->getSql("VERIFICAR_USUARIO", self::RUTA_SQL));
            $usuario = $usuUsuario;
            $contrasena = $contraActual;
           // die(var_dump($usuario,$contrasena));
            $respuesta->bind_param('ss', $usuario, $contrasena);
            $respuesta->execute();
            $res = $respuesta->get_result();
            $row = $res->fetch_assoc();
            if ($row) {
                $usuarioVO = new UsuariosVO();
                $usuarioVO->setUsuusuario($row['USUARIO']);
            }
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $usuarioVO;
    }

    function actualizarContrasena($usuUsuario, $contraNueva) {
        try {
            $con = $this->conectarBd(self::ASISTENCIAL);
            $ps = $con->prepare($this->getSql("ACTUALIZAR_CONTRASENA", self::RUTA_SQL));
            $usuario = $usuUsuario;
            $contrasena = $contraNueva;
            $ps->bind_param('ss', $contrasena, $usuario);
            $filasAfectadas = $ps->execute() or $ps->error;
            if ($filasAfectadas > 0) {
                $filasAfectadas = $con->affected_rows;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($con);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $filasAfectadas;
    }

    function optenerValorReferencia($codigo) {
        $rawdata = array();
        try {
            $con = $this->conectarBd(self::ASISTENCIAL);
            $ps = $con->prepare($this->getSql("VALOR_RECETAS", self::RUTA_SQL));
            if ($ps) {
                $codigoMedicamentos = $codigo;
                $orden = "A";
                $ps->bind_param('ss', $codigoMedicamentos, $orden);
                $filasAfectadas = $ps->execute();
                if ($filasAfectadas > 0) {
                    $res = $ps->get_result();
                    $row = $res->fetch_assoc();
                    if ($row) {
                        $rawdata[] = array(
                            "valor" => $row['ref_precio_venta']
                        );
                    }
                } else {
                    $filasAfectadas = $ps->error;
                }
            } else {
                $filasAfectadas = $con->error;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($con);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function ListarLotes($bodega) {

        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_LOTES", self::RUTA_SQL));
            $bod = $bodega;
            $respuesta->bind_param('s', $bod);
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function ListarBodegas() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_BODEGAS", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function operacionesUsuario(UsuariosVO $usuariosVO) {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONFIGURACION);
            $respuesta = $conexion->prepare($this->getSql("OPERACIOENS_USUARIO", self::RUTA_SQL));
            if ($respuesta) {
                $usuario = $usuariosVO->getIdUsuario();
                $respuesta->bind_param('s', $usuario);
                $respuesta->execute();
                $result = $respuesta->get_result();
                while ($row = $result->fetch_assoc()) {
                    $rawdata[] = array(
                        "OPE_NUMERO" => $row['OPE_NUMERO']
                    );
                }
            } else {
                echo 'error al intentar cargar las operaciones' . $conexion->error;
                exit;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function menuContextualUsuario(UsuariosVO $usuariosVO) {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONFIGURACION);
            $respuesta = $conexion->prepare($this->getSql("MENU_CONTEXTUAL", self::RUTA_SQL));
            $usuario = $usuariosVO->getIdUsuario();
            $respuesta->bind_param('s', $usuario);
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "MEN_ID" => $row['MEN_ID'],
                    "NOMBRE" => $row['NOMBRE'],
                    "ICONO" => $row['ICONO']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboEmpresa() {
        $rawdata = array();
        $i = 0;
        try {
            $conexion = $this->conectarBd(self::CONFIGURACION);
            $respuesta = $conexion->query("SELECT REPLACE(EMP_RAZON_SOCIAL,'s.a.s','') as empresa, cod_empresa as codigo FROM EMPRESA");
            while ($row = mysqli_fetch_array($respuesta)) {
                $rawdata[$i] = $row;
                $i++;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $rawdata;
    }

    function obtenerConfiguracionEmpresa($usuario)
    {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::CONFIGURACION);
            $respuesta = $conexion->prepare($this->getSql("OBTENER_EMPRESA_USUARIOS", self::RUTA_SQL));
            //die(var_dump($usuario));
            $respuesta->bind_param('s', $usuario);
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "EMPRESA" => $row['NOMBRE_EMPRESA'],
                    "LOGO" => $row['LOGO'],
                    "ID" => $row['ID_EMPRESA'],
                    "BD" => $row['BD']
                );
            }
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function ListarLoteGeneral() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_LOTES_GENERAL", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboLaboratorios() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_LABORATORIOS", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarComboInsulina() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_INSULINAS", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarParteCuerpo() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_PARTE_CUERPO", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID" => $row['ID'],
                    "NOMBRE" => $row['NOMBRE']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }

    function listarCausas() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_CAUSAS", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "id" => $row['ID'],
                    "nombre" => $row['NOMBRE'],
                    "codigo" => $row['CODIGO']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }
     function listarComboAreaRurales() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_TIPO_AREA_RURAL", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }
    function listarComboTipoVehiculo() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_TIPO_VEHICULO", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }
    function listarComboEstadoVehiculo() {
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_ESTADO_VEHICULO", self::RUTA_SQL));
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
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }
    function  listarComboLaboratorio(){
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_CLIENTES_LABORATORIO", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID" => $row['ID'],
                    "NIT" => $row['NIT'],
                    "DESCRIPCION" => $row['DESCRIPCION'],
                    "CODIGO" => $row['CODIGO']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }
function  listarExamenesLaboratorio($procedimiento,$tarifario){
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_COMBO_EXAMENES_LABORATORIO", self::RUTA_SQL));
            $respuesta->bind_param('ss', $procedimiento,$tarifario);
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "ID" => $row['ID'],
                    "DESCRIPCION" => $row['DESCRIPCION'],
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
    }
    function listarReferenciasVencidas(){
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_REFERENCIAS_VENCIDAS", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "DIAS" => $row['CANTIDAD'],
                    "CODIGO" => $row['CODIGO'],
                    "ID" => $row['ID'],
                    "DESCRIPCION" => $row['DESCRIPCION']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
        
    }
    function listarOrdenesPendientes(){
        $rawdata = array();
        try {
            $conexion = $this->conectarBd(self::ASISTENCIAL);
            $respuesta = $conexion->prepare($this->getSql("LISTAR_ORDENES_VENCIDAS", self::RUTA_SQL));
            $respuesta->execute();
            $result = $respuesta->get_result();
            while ($row = $result->fetch_assoc()) {
                $rawdata[] = array(
                    "DIAS" => $row['CANTIDAD'],
                    "CODIGO" => $row['CODIGO'],
                    "ID" => $row['ID'],
                    "DESCRIPCION" => $row['DESCRIPCION']
                );
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } try {
            $this->descconectarBd($conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rawdata;
        
    }
}
