<?php

namespace USCO\Solic\Model;

class Equipamento
{
    private string $codigo;
    private string $descricao;
    private string $tipo;
    private string $unidade;
    private float $precoUnitario;

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

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    public function getUnidade(): string
    {
        return $this->unidade;
    }

    public function setUnidade($unidade)
    {
        $this->unidade = $unidade;
        return $this;
    }

    public function getPrecoUnitario(): float
    {
        return $this->precoUnitario;
    }

    public function setPrecoUnitario($precoUnitario)
    {
        $this->precoUnitario = $precoUnitario;
        return $this;
    }
}
