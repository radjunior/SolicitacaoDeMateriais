<?php
require_once "../app/conexao.php";

function parseFloat($str)
{
    if (strstr($str, ",")) {
        $str = str_replace(".", "", $str); // substituir pontos (mil seps) por brancos
        $str = str_replace(",", ".", $str); // substituir ',' por '.'
    }

    if (preg_match("#([0-9\.]+)#", $str, $match)) { // procure o número que pode conter '.'
        return floatval($match[0]);
    } else {
        return floatval($str); // dar algumas últimas chances com floatval
    }
}

// Materiais
$codMaterial = filter_input(INPUT_POST, 'codigoMaterial');
$unidadeMaterial = filter_input(INPUT_POST, 'unidadeMaterial');
$qtdeMaterial = filter_input(INPUT_POST, 'qtdeMaterial');
$valorUnitString = filter_input(INPUT_POST, 'valorUnit');
$valorUnit = parseFloat($valorUnitString);
$valorReal = filter_input(INPUT_POST, 'valorReal');
$descricaoMaterial = filter_input(INPUT_POST, 'descricaoMaterial');
// Centro de Custo
$codigoCCusto = filter_input(INPUT_POST, 'codigoCCusto');
$descricaoCCusto = filter_input(INPUT_POST, 'descricaoCCusto');
// Aplicação
$prioridade = filter_input(INPUT_POST, 'prioridade');
$proposta = filter_input(INPUT_POST, 'proposta');
$aplicacao = filter_input(INPUT_POST, 'aplicacao');
$equipe = filter_input(INPUT_POST, 'equipe');
//  Externo
$fornecedor = filter_input(INPUT_POST, 'fornecedor');
$requisicao = filter_input(INPUT_POST, 'requisicao');
$itemRequisicao = filter_input(INPUT_POST, 'itemRequisicao');
//  Datas
$mesAprov = filter_input(INPUT_POST, 'mesAprov');
$dataInsert = filter_input(INPUT_POST, 'dataInsert');
// Dados preenchidos automaticamente
$solicitante = filter_input(INPUT_POST, 'solicitante');
$statusSolic = filter_input(INPUT_POST, 'statusSolic');
$dataAprovacao = filter_input(INPUT_POST, 'dataAprovacao');
$dataAutorizacao = filter_input(INPUT_POST, 'dataAutoriz');
$periodo = filter_input(INPUT_POST, 'periodo');

try {
    $conn = ConexaoLocal::getConnection();
    $query = "INSERT INTO MATERIAIS_SOLICITADOS
                (MES_APROVACAO, 
                MES_INSERCAO, 
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
                EQUIPE) 
                VALUES 
                (:col01, 
                :col02, 
                :col03, 
                :col04, 
                :col05, 
                :col06, 
                :col07, 
                :col08, 
                :col09, 
                :col10, 
                :col11, 
                :col12, 
                :col13, 
                :col14, 
                :col15, 
                :col16, 
                :col17, 
                :col18, 
                :col19, 
                :col20, 
                :col21, 
                :col22)";
    $stmt = $conn->prepare($query);
    $stmt->execute(array(
        ':col01' => $mesAprov,
        ':col02' => $dataInsert,
        ':col03' => $codMaterial,
        ':col04' => $descricaoMaterial,
        ':col05' => $unidadeMaterial,
        ':col06' => $qtdeMaterial,
        ':col07' => $proposta,
        ':col08' => $valorUnit,
        ':col09' => $valorReal,
        ':col10' => $codigoCCusto,
        ':col11' => $descricaoCCusto,
        ':col12' => $fornecedor,
        ':col13' => $requisicao,
        ':col14' => $itemRequisicao,
        ':col15' => $solicitante,
        ':col16' => $statusSolic,
        ':col17' => $dataAprovacao,
        ':col18' => $dataAutorizacao,
        ':col19' => $prioridade,
        ':col20' => $aplicacao,
        ':col21' => $periodo,
        ':col22' => $equipe
    ));
} catch (Exception $exc) {
    echo json_encode($exc);
    exit;
}
echo json_encode($stmt);