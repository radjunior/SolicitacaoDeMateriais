<?php
Class SolicitacaoMateriais
{
    public string   $mes_aprovacao;
    public int      $codigo_material;
    public string   $descricao_material;
    public string   $unidade;
    public float    $quantidade;
    public string   $proposta;
    public float    $rs_unitario;
    public float    $rs_total;
    public int      $codigo_ccusto;
    public string   $descricao_ccusto;
    public string   $fornecedor;
    public int      $requisicao;
    public int      $item_requisicao;
    public string   $solicitante;
    public string   $status_solicitacao;
    public string   $data_aprovacao;
    public string   $data_autorizacao;
    public int      $prioridade;
    public string   $aplicacao;
    public string   $periodo;
    public string   $equipe; 

    public function __construct(array $solicitacoes)
    {
        $this->mes_aprovacao =          $solicitacoes['mes_aprovacao'];
        $this->codigo_material =        $solicitacoes['codigo_material'];
        $this->descricao_material =     $solicitacoes['descricao_material'];
        $this->unidade =                $solicitacoes['unidade'];
        $this->quantidade =             $solicitacoes['quantidade'];
        $this->proposta =               $solicitacoes['proposta'];
        $this->rs_unitario =            $solicitacoes['rs_unitario'];
        $this->rs_total =               $solicitacoes['rs_total'];
        $this->codigo_ccusto =          $solicitacoes['codigo_ccusto'];
        $this->descricao_ccusto =       $solicitacoes['descricao_ccusto'];
        $this->fornecedor =             $solicitacoes['fornecedor'];
        $this->requisicao =             $solicitacoes['requisicao'];
        $this->item_requisicao =        $solicitacoes['item_requisicao'];
        $this->solicitante =            $solicitacoes['solicitante'];
        $this->status_solicitacao =     $solicitacoes['status_solicitacao'];
        $this->data_aprovacao =         $solicitacoes['data_aprovacao'];
        $this->data_autorizacao =       $solicitacoes['data_autorizacao'];
        $this->prioridade =             $solicitacoes['prioridade'];
        $this->aplicacao =              $solicitacoes['aplicacao'];
        $this->periodo =                $solicitacoes['periodo'];
        $this->equipe =                 $solicitacoes['equipe'];
    }
}