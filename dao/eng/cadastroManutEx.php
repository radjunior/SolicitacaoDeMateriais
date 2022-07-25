<?php
require_once "../app/conexao.php";

// Automatico
$txtSttSolic = "APROVAR";
$txtDataAprovacao = "AGUARD";
$txtDataAutorizacao = "AGUARD";

// Materiais
$txtCodigoMaterial = filter_input(INPUT_POST, 'txtCodigoMaterial');
$txtUnidadeMaterial = filter_input(INPUT_POST, 'txtUnidadeMaterial');
$txtQtdeMaterial = filter_input(INPUT_POST, 'txtQtdeMaterial');
$txtValorUnit = filter_input(INPUT_POST, 'txtValorUnit');
$txtValorReal = filter_input(INPUT_POST, 'txtValorReal');
$txtDescricaoMaterial = filter_input(INPUT_POST, 'txtDescricaoMaterial');
// Servicos
$txtCodigoServico = filter_input(INPUT_POST, 'txtCodigoServico');
$txtDescricaoServico = filter_input(INPUT_POST, 'txtDescricaoServico');
// Centro de Custo
$txtCodigoCCusto = filter_input(INPUT_POST, 'txtCodigoCCusto');
$txtDescricaoCCusto = filter_input(INPUT_POST, 'txtDescricaoCCusto');
// Aplicação
$txtDefeitoObs = filter_input(INPUT_POST, 'txtDefeitoObs');
$txtAplicacao = filter_input(INPUT_POST, 'txtAplicacao');
$txtNumSerie = filter_input(INPUT_POST, 'txtNumSerie');
$txtNumPatrimonio = filter_input(INPUT_POST, 'txtNumPatrimonio');
// Externo
$txtFornecedor = filter_input(INPUT_POST, 'txtFornecedor');
$txtRequisicao = filter_input(INPUT_POST, 'txtRequisicao');
$txtItemRequisicao = filter_input(INPUT_POST, 'txtItemRequisicao');
$txtPedido = filter_input(INPUT_POST, 'txtPedido');
$txtItemPedido = filter_input(INPUT_POST, 'txtItemPedido');
// Datas e Solicitante
$txtMesAprov = filter_input(INPUT_POST, 'txtMesAprov');
$txtDataInsert = filter_input(INPUT_POST, 'txtDataInsert');
$txtSolicitante = filter_input(INPUT_POST, 'txtSolicitante');
//Orçamento
$txtProposta = filter_input(INPUT_POST, 'txtProposta');
$txtItemProposta = filter_input(INPUT_POST, 'txtItemProposta');
$txtCustoTotal = filter_input(INPUT_POST, 'txtCustoTotal');
$arqOrcamento = $_FILES["arqOrcamento"];
// Matriz Gut
$rgGravidade = filter_input(INPUT_POST, 'rgGravidade');
$rgUrgencia = filter_input(INPUT_POST, 'rgUrgencia');
$rgTendencia = filter_input(INPUT_POST, 'rgTendencia');
$txtPrioridade = filter_input(INPUT_POST, 'txtPrioridade');
// Notas Fiscais
$txtNumNfEnvio = filter_input(INPUT_POST, 'txtNumNfEnvio');
$txtDataNfEnvio = filter_input(INPUT_POST, 'txtDataNfEnvio');
$txtNumNfRetorno = filter_input(INPUT_POST, 'txtNumNfRetorno');
$txtDataNfRetorno = filter_input(INPUT_POST, 'txtDataNfRetorno');

if ($arqOrcamento['error'] != 4) { 
    die("Falha ao enviar o arquivo");
} 

if($arqOrcamento['error'] == 0 && $arqOrcamento['size'] > 0) {
    $pasta = "C:/xampp/htdocs/Temp/solicitacao-materiais/anexos/";
    $nomeArquivo = $arqOrcamento['name'];
    $novoNome = uniqid();
    $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
    
    if ($extensao != '' && $extensao != 'jpg' && $extensao != 'png' && $extensao != 'pdf' && $extensao != 'zip' && $extensao != 'rar') {
        die("Tipo de arquivo não aceito!");
    }
    
    $statusEnvioArquivo = move_uploaded_file($arqOrcamento['tmp_name'], $pasta . $novoNome . "." . $extensao);
    $path = $pasta . $novoNome . "." . $extensao;
}

try {
    $conn = ConexaoLocal::getConnection();
    $query = "INSERT INTO SERVICOS_SOLICITADOS
                (
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
                )
                VALUES 
                (
                    :col01, 
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
                    :col22,
                    :col23, 
                    :col24, 
                    :col25, 
                    :col26, 
                    :col27, 
                    :col28, 
                    :col29, 
                    :col30,
                    :col31, 
                    :col32, 
                    :col33,
                    :col34,
                    :col35,
                    :col36
                )";
    $stmt = $conn->prepare($query);
    $stmt->execute(array(
        ':col01' => $txtCodigoMaterial,
        ':col02' => $txtUnidadeMaterial,
        ':col03' => $txtDescricaoMaterial,
        ':col04' => $txtQtdeMaterial,
        ':col05' => $txtValorUnit,
        ':col06' => $txtValorReal,
        ':col07' => $txtCodigoServico,
        ':col08' => $txtDescricaoServico,
        ':col09' => $txtCodigoCCusto,
        ':col10' => $txtDescricaoCCusto,
        ':col11' => $txtDefeitoObs,
        ':col12' => $txtAplicacao,
        ':col13' => $txtNumSerie,
        ':col14' => $txtNumPatrimonio,
        ':col15' => $txtFornecedor,
        ':col16' => $txtRequisicao,
        ':col17' => $txtItemRequisicao,
        ':col18' => $txtPedido,
        ':col19' => $txtItemPedido,
        ':col20' => $txtMesAprov,
        ':col21' => $txtProposta,
        ':col22' => $txtItemProposta,
        ':col23' => $txtCustoTotal,
        ':col24' => $path,
        ':col25' => $rgGravidade,
        ':col26' => $rgUrgencia,
        ':col27' => $rgTendencia,
        ':col28' => $txtPrioridade,
        ':col29' => $txtNumNfEnvio,
        ':col30' => $txtDataNfEnvio,
        ':col31' => $txtNumNfRetorno,
        ':col32' => $txtDataNfRetorno,
        ':col33' => $txtSolicitante,
        ':col34' => $txtSttSolic,
        ':col35' => $txtDataAprovacao,
        ':col36' => $txtDataAutorizacao
    ));
    header("Location: ../../pgs/eng/solicManutExterna.php");
    exit;
} catch (Exception $exc) {
    echo json_encode($exc);
    exit;
}

/*
echo $txtCodigoMaterial . "<br>";
echo $txtUnidadeMaterial . "<br>";
echo $txtQtdeMaterial . "<br>";
echo $txtValorUnit . "<br>";
echo $txtValorReal . "<br>";
echo $txtDescricaoMaterial . "<br>";

echo $txtCodigoServico . "<br>";
echo $txtDescricaoServico . "<br>";

echo $txtCodigoCCusto . "<br>";
echo $txtDescricaoCCusto . "<br>";

echo $txtDefeitoObs . "<br>";
echo $txtAplicacao . "<br>";
echo $txtNumSerie . "<br>";
echo $txtNumPatrimonio . "<br>";

echo $txtFornecedor . "<br>";
echo $txtRequisicao . "<br>";
echo $txtItemRequisicao . "<br>";
echo $txtPedido . "<br>";
echo $txtItemPedido . "<br>";

echo $txtMesAprov . "<br>";
echo $txtDataInsert . "<br>";
echo $txtSolicitante . "<br>";

echo $txtProposta . "<br>";
echo $txtItemProposta . "<br>";
echo $txtCustoTotal . "<br>";
echo var_dump($arqOrcamento) . "<br>";

echo $rgGravidade . "<br>";
echo $rgUrgencia . "<br>";
echo $rgTendencia . "<br>";

echo $txtPrioridade . "<br>";

echo $txtNumNfEnvio . "<br>";
echo $txtDataNfEnvio . "<br>";
echo $txtNumNfRetorno . "<br>";
echo $txtDataNfRetorno . "<br>";
*/