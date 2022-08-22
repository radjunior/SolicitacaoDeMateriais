<?php
require_once "../repository/app/conexao.php";
require_once "../../framework/ExceptionErros.php";

Class SolicitacaoMateriaisRepository
{
    public static function cadastrarSolicitacao():bool
    {
        try {
            foreach($_SESSION['arrSolicitacoes'] as $key => $value) {
                $conn = ConexaoLocal::getConnection();
                $query = "INSERT INTO MATERIAIS_SOLICITADOS (
                                MES_APROVACAO,
                                CODIGO,
                                DESCRICAO,
                                UNIDADE,
                                QUANTIDADE,
                                PROPOSTA,
                                REAL_UNITARIO,
                                REAL_TOTAL,
                                CENTRO_CUSTO,
                                DESCRICAO_CENTRO_CUSTO,
                                FORNECEDOR,
                                REQUISICAO,
                                ITEM_REQUISICAO,
                                SOLICITANTE,
                                STATUS_SOLIC,
                                DATA_APROVACAO,
                                DATA_AUTORIZACAO,
                                PRIORIDADE,
                                APLICACAO,
                                PERIODO,
                                EQUIPE
                            ) VALUES (
                                '".$value['mes_aprovacao']."'        ,
                                 ".$value['codigo_material']."       ,
                                '".$value['descricao_material']."'   ,
                                '".$value['unidade']."'              ,
                                 ".$value['quantidade']."            ,
                                '".$value['proposta']."'             ,
                                 ".$value['rs_unitario']."           ,
                                 ".$value['rs_total']."              ,
                                 ".$value['codigo_ccusto']."         ,
                                '".$value['descricao_ccusto']."'     ,
                                '".$value['fornecedor']."'           ,
                                 ".$value['requisicao']."            ,
                                 ".$value['item_requisicao']."       ,
                                '".$value['solicitante']."'          ,
                                '".$value['status_solicitacao']."'   ,
                                '".$value['data_aprovacao']."'       ,
                                '".$value['data_autorizacao']."'     ,
                                 ".$value['prioridade']."            ,
                                '".$value['aplicacao']."'            ,
                                '".$value['periodo']."'              ,
                                '".$value['equipe']."'
                            )";
                $conn->query($query);
            }
            return true;
        } catch (Exception $exc) {
            ExceptionErros::gerarLog(realpath(__FILE__), json_encode($exc));
            return false;
        }
    }
}