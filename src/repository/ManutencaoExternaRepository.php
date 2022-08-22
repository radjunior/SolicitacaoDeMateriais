<?php
require_once "../repository/app/conexao.php";
require_once "../../framework/ExceptionErros.php";

Class ManutencaoExternaRepository
{
    public static function cadastrarRepository(object $arrManutExterna):bool
    {
        try {
            $conn = ConexaoLocal::getConnection();
            $query = "INSERT INTO SERVICOS_SOLICITADOS (
                            COD_EQUIP,
                            UNID_EQUIP,
                            DSC_EQUIP,
                            QTD_EQUIP,
                            VAL_UNIT,
                            VAL_TOTAL,
                            COD_SERVIC,
                            DSC_SERVIC,
                            COD_CENTRO_CUSTO,
                            DSC_CENTRO_CUSTO,
                            DSC_DEFEITO_OBS,
                            DSC_APLICACAO,
                            NUM_SERIE,
                            NUM_PATRIMONIO,
                            NOM_FORNECEDOR,
                            NUM_REQUISICAO,
                            NUM_ITEM_REQUISICAO,
                            NUM_PEDIDO,
                            NUM_ITEM_PEDIDO,
                            MES_APROVACAO,
                            DSC_PROPOSTA,
                            DSC_ITEM_PROPOSTA,
                            VAL_CUSTO_TOTAL,
                            ANX_ORCAMENTO,
                            NUM_GUT_GRAVIDADE,
                            NUM_GUT_URGENCIA,
                            NUM_GUT_TENDENCIA,
                            NUM_GUT_PRIORIDADE,
                            NUM_NF_ENVIO,
                            DAT_NF_ENVIO,
                            NUM_NF_RETORNO,
                            DAT_NF_RETORNO,
                            NOM_SOLICITANTE,
                            STT_SOLIC,
                            DAT_APROVACAO,
                            DAT_AUTORIZACAO
                        ) VALUES (
                            ".$arrManutExterna->codigo_equipamento.",
                            '".$arrManutExterna->unidade_equipamento."',
                            '".$arrManutExterna->descricao_equipamento."',
                            ".$arrManutExterna->quantidade_equipamento.",
                            ".$arrManutExterna->rs_unitario_equipamento.",
                            ".$arrManutExterna->rs_total_equipamento.",
                            ".$arrManutExterna->codigo_servico.",
                            '".$arrManutExterna->descricao_servico."',
                            ".$arrManutExterna->codigo_centro_custo.",
                            '".$arrManutExterna->descricao_centro_custo."',
                            '".$arrManutExterna->defeito."',
                            '".$arrManutExterna->aplicacao."',
                            ".$arrManutExterna->num_serie.",
                            ".$arrManutExterna->num_patrimonio.",
                            '".$arrManutExterna->fornecedor."',
                            ".$arrManutExterna->requisicao.",
                            ".$arrManutExterna->item_requisicao.",
                            ".$arrManutExterna->pedido.",
                            ".$arrManutExterna->item_pedido.",
                            '".$arrManutExterna->mes_aprovacao."',
                            '".$arrManutExterna->proposta."',
                            '".$arrManutExterna->item_proposta."',
                            ".$arrManutExterna->custo_total.",
                            '".$arrManutExterna->anx_orcamento."',
                            ".$arrManutExterna->gut_gravidade.",
                            ".$arrManutExterna->gut_urgencia.",
                            ".$arrManutExterna->gut_tendencia.",
                            ".$arrManutExterna->gut_prioridade.",
                            ".$arrManutExterna->nf_codigo_envio.",
                            '".$arrManutExterna->nf_data_envio."',
                            ".$arrManutExterna->nf_codigo_retorno.",
                            '".$arrManutExterna->nf_data_retorno."',
                            '".$arrManutExterna->nome_solicitante."',
                            '".$arrManutExterna->status_solicitacao."',
                            '".$arrManutExterna->data_aprovacao."',
                            '".$arrManutExterna->data_autorizacao."'
                        )";
            $conn->query($query);
            return true;
        } catch (Exception $exc) {
            ExceptionErros::gerarLog(realpath(__FILE__), json_encode($exc));
            return false;
        }
    }
}