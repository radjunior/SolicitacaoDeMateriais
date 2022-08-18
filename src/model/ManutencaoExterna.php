<?php
Class ManutencaoExterna 
{
    
    # Equipamento
    public int $codigo_equipamento;
    public string $unidade_equipamento;
    public float $quantidade_equipamento;
    public float $rs_unitario_equipamento;
    public float $rs_total_equipamento;
    public string $descricao_equipamento;

    # Servico
    public int $codigo_servico;
    public string $descricao_servico;

    # Centro de Custo
    public int $codigo_centro_custo;
    public string $descricao_centro_custo;

    # Aplicacao
    public string $defeito;
    public string $aplicacao;
    public int $num_serie;
    public int $num_patrimonio;

    #Externo
    public string $fornecedor;
    public int $requisicao;
    public int $item_requisicao;
    public int $pedido;
    public int $item_pedido;
    
    # Datas
    public string $mes_aprovacao;

    # Orcamento
    public string $proposta;
    public string $item_proposta;
    public float $custo_total;
    public string $anx_orcamento;

    # Matriz de Gut
    public int $gut_gravidade;
    public int $gut_urgencia;
    public int $gut_tendencia;
    public int $gut_prioridade;

    # Notas Fiscais
    public int $nf_codigo_envio;
    public int $nf_codigo_retorno;
    public string $nf_data_envio;
    public string $nf_data_retorno;
    
    # Default
    public string $nome_solicitante;
    public string $status_solicitacao;
    public string $data_aprovacao;
    public string $data_autorizacao;

    public function __construct(array $arrManutExterna)
    {
        $this->codigo_equipamento = $arrManutExterna['codigo_equipamento'];
        $this->unidade_equipamento = $arrManutExterna['unidade_equipamento'];
        $this->quantidade_equipamento = $arrManutExterna['quantidade_equipamento'];
        $this->rs_unitario_equipamento = $arrManutExterna['rs_unitario_equipamento'];
        $this->rs_total_equipamento = $arrManutExterna['rs_total_equipamento'];
        $this->descricao_equipamento = $arrManutExterna['descricao_equipamento'];
        $this->codigo_servico = $arrManutExterna['codigo_servico'];
        $this->descricao_servico = $arrManutExterna['descricao_servico'];
        $this->codigo_centro_custo = $arrManutExterna['codigo_centro_custo'];
        $this->descricao_centro_custo = $arrManutExterna['descricao_centro_custo'];
        $this->defeito = $arrManutExterna['defeito'];
        $this->aplicacao = $arrManutExterna['aplicacao'];
        $this->num_serie = $arrManutExterna['num_serie'];
        $this->num_patrimonio = $arrManutExterna['num_patrimonio'];
        $this->fornecedor = $arrManutExterna['fornecedor'];
        $this->requisicao = $arrManutExterna['requisicao'];
        $this->item_requisicao = $arrManutExterna['item_requisicao'];
        $this->pedido = $arrManutExterna['pedido'];
        $this->item_pedido = $arrManutExterna['item_pedido'];
        $this->mes_aprovacao = $arrManutExterna['mes_aprovacao'];
        $this->proposta = $arrManutExterna['proposta'];
        $this->item_proposta = $arrManutExterna['item_proposta'];
        $this->custo_total = $arrManutExterna['custo_total'];
        $this->anx_orcamento = $arrManutExterna['anx_orcamento'];
        $this->gut_gravidade = $arrManutExterna['gut_gravidade'];
        $this->gut_urgencia = $arrManutExterna['gut_urgencia'];
        $this->gut_tendencia = $arrManutExterna['gut_tendencia'];
        $this->gut_prioridade = $arrManutExterna['gut_prioridade'];
        $this->nf_codigo_envio = $arrManutExterna['nf_codigo_envio'];
        $this->nf_codigo_retorno = $arrManutExterna['nf_codigo_retorno'];
        $this->nf_data_envio = $arrManutExterna['nf_data_envio'];
        $this->nf_data_retorno = $arrManutExterna['nf_data_retorno'];
        $this->nome_solicitante = $arrManutExterna['nome_solicitante'];
        $this->status_solicitacao = 'APROVAR';
        $this->data_aprovacao = 'AGUARDANDO';
        $this->data_autorizacao = 'AGUARDANDO';
    }
}