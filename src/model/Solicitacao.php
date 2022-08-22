<?php

namespace USCO\Solic\Model;

use USCO\Solic\Model\Material;
use USCO\Solic\Model\CentroCusto;
use USCO\Solic\Model\Fornecedor;

class Solicitacao
{
    private string      $mes_aprovacao;
    private Material    $material;
    private float       $quantidade;
    private string      $proposta;
    private float       $rs_total;
    private CentroCusto $ccusto;
    private Fornecedor  $fornecedor;
    private int         $requisicao;
    private int         $item_requisicao;
    private string      $solicitante;
    private string      $status_solicitacao;
    private string      $data_aprovacao;
    private string      $data_autorizacao;
    private int         $prioridade;
    private string      $aplicacao;
    private string      $periodo;
    private string      $equipe;

    public function __construct(array $solicitacoes, Material $material, CentroCusto $ccusto, Fornecedor $fornecedor)
    {
        $this->mes_aprovacao =          $solicitacoes['mes_aprovacao'];
        $this->material =               $material;
        $this->quantidade =             $solicitacoes['quantidade'];
        $this->proposta =               $solicitacoes['proposta'];
        $this->rs_total =               $solicitacoes['rs_total'];
        $this->ccusto =                 $ccusto;
        $this->fornecedor =             $fornecedor;
        $this->requisicao =             $solicitacoes['requisicao'];
        $this->item_requisicao =        $solicitacoes['item_requisicao'];
        $this->solicitante =            $_SESSION['nomeUsuario'];
        $this->status_solicitacao =     $solicitacoes['status_solicitacao'];
        $this->data_aprovacao =         $solicitacoes['data_aprovacao'];
        $this->data_autorizacao =       $solicitacoes['data_autorizacao'];
        $this->prioridade =             $solicitacoes['prioridade'];
        $this->aplicacao =              $solicitacoes['aplicacao'];
        $this->periodo =                $solicitacoes['periodo'];
        $this->equipe =                 $solicitacoes['equipe'];
    }

    public function getMes_aprovacao()
    {
        return $this->mes_aprovacao;
    }

    public function setMes_aprovacao($mes_aprovacao)
    {
        $this->mes_aprovacao = $mes_aprovacao;

        return $this;
    }

    public function getMaterial()
    {
        return $this->material;
    }

    public function setMaterial($material)
    {
        $this->material = $material;

        return $this;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    public function getProposta()
    {
        return $this->proposta;
    }

    public function setProposta($proposta)
    {
        $this->proposta = $proposta;

        return $this;
    }

    public function getRs_total()
    {
        return $this->rs_total;
    }

    public function setRs_total($rs_total)
    {
        $this->rs_total = $rs_total;

        return $this;
    }

    public function getCcusto()
    {
        return $this->ccusto;
    }

    public function setCcusto($ccusto)
    {
        $this->ccusto = $ccusto;

        return $this;
    }

    public function getFornecedor()
    {
        return $this->fornecedor;
    }

    public function setFornecedor($fornecedor)
    {
        $this->fornecedor = $fornecedor;

        return $this;
    }
    public function getRequisicao()
    {
        return $this->requisicao;
    }

    public function setRequisicao($requisicao)
    {
        $this->requisicao = $requisicao;

        return $this;
    }

    public function getItem_requisicao()
    {
        return $this->item_requisicao;
    }

    public function setItem_requisicao($item_requisicao)
    {
        $this->item_requisicao = $item_requisicao;

        return $this;
    }

    public function getSolicitante()
    {
        return $this->solicitante;
    }

    public function setSolicitante($solicitante)
    {
        $this->solicitante = $solicitante;

        return $this;
    }

    public function getStatus_solicitacao()
    {
        return $this->status_solicitacao;
    }

    public function setStatus_solicitacao($status_solicitacao)
    {
        $this->status_solicitacao = $status_solicitacao;

        return $this;
    }

    public function getData_aprovacao()
    {
        return $this->data_aprovacao;
    }

    public function setData_aprovacao($data_aprovacao)
    {
        $this->data_aprovacao = $data_aprovacao;

        return $this;
    }

    public function getData_autorizacao()
    {
        return $this->data_autorizacao;
    }

    public function setData_autorizacao($data_autorizacao)
    {
        $this->data_autorizacao = $data_autorizacao;

        return $this;
    }

    public function getPrioridade()
    {
        return $this->prioridade;
    }

    public function setPrioridade($prioridade)
    {
        $this->prioridade = $prioridade;

        return $this;
    }

    public function getAplicacao()
    {
        return $this->aplicacao;
    }

    public function setAplicacao($aplicacao)
    {
        $this->aplicacao = $aplicacao;

        return $this;
    }

    public function getPeriodo()
    {
        return $this->periodo;
    }

    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }

    public function getEquipe()
    {
        return $this->equipe;
    }

    public function setEquipe($equipe)
    {
        $this->equipe = $equipe;

        return $this;
    }
}
