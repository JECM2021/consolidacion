<?php
class PastoresVO
{
    public $tipoDocumento;
    public $numDocumento;
    public $primerNombre;
    public $segundoNombre;
    public $primerApellido;
    public $segundoApellido;
    public $departamento;
    public $ciudad;
    public $barrios;
    public $direccion;
    public $telefono;
    public $celular;
    public $sexo;
    public $edad;
    public $estadoCivil;
    public $ministerio;
    public $codigoPastor;

    public $idPg;

    function setIdpg($idPg)
    {
        $this->idPg = $idPg;
    }

    function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;
    }

    function setNumDocumento($numDocumento)
    {
        $this->numDocumento = $numDocumento;
    }

    function setPrimerNombre($primerNombre)
    {
        $this->primerNombre = $primerNombre;
    }

    function setSegundoNombre($segundoNombre)
    {
        $this->segundoNombre = $segundoNombre;
    }

    function setPrimerApellido($primerApellido)
    {
        $this->primerApellido = $primerApellido;
    }

    function setSegundoApellido($segundoApellido)
    {
        $this->segundoApellido = $segundoApellido;
    }

    function setDepartamento($departamento)
    {
        $this->departamento = $departamento;
    }

    function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    }

    function setBarrios($barrios)
    {
        $this->barrios = $barrios;
    }

    function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    function setCelular($celular)
    {
        $this->celular = $celular;
    }

    function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    function setEdad($edad)
    {
        $this->edad = $edad;
    }

    function setEstadoCivil($estadoCivil)
    {
        $this->estadoCivil = $estadoCivil;
    }

    function setMinisterio($ministerio)
    {
        $this->ministerio = $ministerio;
    }

    function setCodigoPastor($codigoPastor)
    {
        $this->codigoPastor = $codigoPastor;
    }
    ///////////////////////////////////////////

    function getIdPg()
    {
        return $this->idPg;
    }

    function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    function getNumDocumento()
    {
        return $this->numDocumento;
    }

    function getPrimerNombre()
    {
        return $this->primerNombre;
    }

    function getSegundoNombre()
    {
        return $this->segundoNombre;
    }

    function getPrimerApellido()
    {
        return $this->primerApellido;
    }

    function getSegundoApellido()
    {
        return $this->segundoApellido;
    }

    function getDepartamento()
    {
        return $this->departamento;
    }

    function getCiudad()
    {
        return $this->ciudad;
    }

    function getBarrios()
    {
        return $this->barrios;
    }

    function getDireccion()
    {
        return $this->direccion;
    }

    function getTelefono()
    {
        return $this->telefono;
    }

    function getCelular()
    {
        return $this->celular;
    }

    function getSexo()
    {
        return $this->sexo;
    }

    function getEdad()
    {
        return $this->edad;
    }

    function getEstadoCivil()
    {
        return $this->estadoCivil;
    }

    function getMinisterio()
    {
        return $this->ministerio;
    }

    function getCodigoPastor()
    {
        return $this->codigoPastor;
    }
}
