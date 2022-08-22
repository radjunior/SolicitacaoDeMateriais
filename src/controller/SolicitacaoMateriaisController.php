<?php
require_once "../model/SolicitacaoMateriais.php";
require_once "../repository/app/session.php";
require_once "../repository/SolicitacaoMateriaisRepository.php";

if ($_GET['enviarSolicitacaoMateriaisRepository'] == "true") {
    enviarSolicitacaoMateriaisRepository();
}

if ($_GET['enviarSolicitacaoMateriaisRepository'] == "true") {
    enviarSolicitacaoMateriaisRepository();
}

$periodo = 'ENTRE_SAFRA';
if (isset($_POST['rbPeriodoSafra'])) {
    $periodo = 'SAFRA';
}

$mesAprov =             $_POST['mesAprov'] ?? NULL;
$codigoMaterial =       $_POST['codigoMaterial'] ?? NULL;
$descricaoMaterial =    $_POST['descricaoMaterial'] ?? NULL;
$unidadeMaterial =      $_POST['unidadeMaterial'] ?? NULL;
$qtdeMaterial =         $_POST['qtdeMaterial'] ?? NULL;
$proposta =             $_POST['proposta'] ?? NULL;
$valorUnit =            $_POST['valorUnit'] ?? NULL;
$valorReal =            $_POST['valorReal'] ?? NULL;
$codigoCCusto =         $_POST['codigoCCusto'] ?? NULL;
$descricaoCCusto =      $_POST['descricaoCCusto'] ?? NULL;
$fornecedor =           $_POST['fornecedor'] ?? NULL;
$requisicao =           $_POST['requisicao'] ?? NULL;
$itemRequisicao =       $_POST['itemRequisicao'] ?? NULL;
$solicitante =          $_POST['solicitante'] ?? NULL;
$prioridade =           $_POST['prioridade'] ?? NULL;
$aplicacao =            $_POST['aplicacao'] ?? NULL;
$equipe =               $_POST['equipe'] ?? NULL;

$_SESSION['contador_id'] += 1;

$solicitacao =
    [
        'id' =>                 $_SESSION['contador_id'],
        'mes_aprovacao' =>      $mesAprov,
        'codigo_material' =>    intval($codigoMaterial),
        'descricao_material' => $descricaoMaterial,
        'unidade' =>            $unidadeMaterial,
        'quantidade' =>         floatval($qtdeMaterial),
        'proposta' =>           $proposta,
        'rs_unitario' =>        floatval($valorUnit),
        'rs_total' =>           floatval($valorReal),
        'codigo_ccusto' =>      intval($codigoCCusto),
        'descricao_ccusto' =>   $descricaoCCusto,
        'fornecedor' =>         $fornecedor,
        'requisicao' =>         intval($requisicao),
        'item_requisicao' =>    intval($itemRequisicao),
        'solicitante' =>        $solicitante,
        'status_solicitacao' => 'APROVAR',
        'data_aprovacao' =>     'AGUARDANDO',
        'data_autorizacao' =>   'AGUARDANDO',
        'prioridade' =>         intval($prioridade),
        'aplicacao' =>          $aplicacao,
        'periodo' =>            $periodo,
        'equipe' =>             $equipe
    ];

# $objSolicitacao = new SolicitacaoMateriais($solicitacao);
array_push($_SESSION['arrSolicitacoes'], $solicitacao);
header('Location: ../view/front/solicMaterial.php');
# var_dump($_SESSION['arrSolicitacoes']);

function enviarSolicitacaoMateriaisRepository()
{
    SolicitacaoMateriaisRepository::cadastrarSolicitacao();
    $_SESSION['arrSolicitacoes'] = null;
    $_SESSION['contador_id'] = null;
    header('Location: ../view/front/solicMaterial.php');
}
