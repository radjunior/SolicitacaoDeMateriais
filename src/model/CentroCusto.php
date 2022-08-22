<?php

namespace USCO\Solic\Model;

class CentroCusto
{
    private string $codigo;
    private string $descricao;
    private string $responsavel;

    public function __construct()
    {
    }

    /**
     * GETTERS E SETTERS
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getResponsavel()
    {
        return $this->responsavel;
    }

    public function setResponsavel($responsavel)
    {
        $this->responsavel = $responsavel;
        return $this;
    }
}
