<?php

namespace USCO\Solic\Model;

class Servico
{
    private string $codigo;
    private string $descricao;

    public function __construct()
    {
    }

    /**
     * GETTERS E SETTERS
     */
    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
        return $this;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }
}
