<?php
require_once "../app/conexao.php";

function parseFloat($str) {
    if (strstr($str, ",")) {
        $str = str_replace(".", "", $str); // replace dots (thousand seps) with blancs
        $str = str_replace(",", ".", $str); // replace ',' with '.'
    }

    if (preg_match("#([0-9\.]+)#", $str, $match)) { // search for number that may contain '.'
        return floatval($match[0]);
    } else {
        return floatval($str); // take some last chances with floatval
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

try {
    $conn = ConexaoLocal::getConnection();
    $query = "INSERT INTO MATERIAIS_SOLICITADOS(MES_APROVACAO, MES_INSERCAO, CODIGO, DESCRICAO, UNIDADE, QUANTIDADE, PROPOSTA, REAL_UNITARIO, REAL_TOTAL, CENTRO_CUSTO, DESCRICAO_CENTRO_CUSTO, FORNECEDOR, REQUISICAO, ITEM_REQUISICAO, SOLICITANTE, STATUS_SOLIC, DATA_APROVACAO, DATA_AUTORIZACAO, PRIORIDADE, APLICACAO) 
    VALUES (:col01, :col02, :col03, :col04, :col05, :col06, :col07, :col08, :col09, :col10, :col11, :col12, :col13, :col14, :col15, :col16, :col17, :col18, :col19, :col20)";
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
        ':col20' => $aplicacao
    ));
} catch (Exception $exc) {
    echo json_encode($exc);
    exit;
}
echo json_encode($stmt);

// $arr = array(
//     'Exception' => $exc,
//     'Stmt' => $stmt,
//     'Conexão' => $conn
// );
// echo json_encode($arr);

// header("Location: ../pgs/eng/solicMaterial.php");
// exit;

/* EXIBIÇÃO
echo "Código Material: ", $codMaterial;
echo "<br>Unidade: ", $unidadeMaterial;
echo "<br>Qtde: ", $qtdeMaterial;
echo "<br>Valor Unit: ", $valorUnit;
echo "<br>Valor Real: ", $valorReal;
echo "<br>Descricao: ", $descricaoMaterial;
echo "<br>Cod Centro: ", $codigoCCusto;
echo "<br>Desc Centro: ", $descricaoCCusto;
echo "<br>Prioridade: ", $prioridade;
echo "<br>Proposta: ", $proposta;
echo "<br>Aplicavao: ", $aplicacao;
echo "<br>Fornecedor: ", $fornecedor;
echo "<br>requisicao: ", $requisicao;
echo "<br>itemRequisicao: ", $itemRequisicao;
echo "<br>mesAprov: ", $mesAprov;
echo "<br>dataInsert: ", $dataInsert;
echo "<br> ****Dados preenchidos automaticamente****";
echo "<br>", $solicitante;
echo "<br>", $statusSolic;
echo "<br>", $dataAprovacao;
echo "<br>", $dataAutorizacao;*/

//20 atributos "22/12/2021"
//20 atributos no Banco + (id) 21 total;