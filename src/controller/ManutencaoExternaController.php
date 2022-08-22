<?php
require_once "../model/ManutencaoExterna.php";
require_once "../dao/ManutencaoExternaDAO.php";
require_once "../../framework/ExceptionErros.php";

try {
    $arqOrcamento = $_FILES["arqOrcamento"];

    if ($arqOrcamento['error'] != 0) {
        $msgErro;
        switch ($arqOrcamento['error']) {
            case 1:
                $msgErro = "[1] - O arquivo enviado excede o limite de tamanho definido.";
            break;
            case 2:
                $msgErro = "[2] - O arquivo enviado excede o limite de tamanho definido.";
            break;
            case 3:
                $msgErro = "[3] - O upload do arquivo foi feito parcialmente.";
            break;
            case 4:
                $msgErro = "[4] - Nenhum arquivo foi enviado.";
            break;
            case 6:
                $msgErro = "[6] - Pasta temporária ausente.";
            break;
            case 7:
                $msgErro = "[7] - Falha ao escrever o arquivo no disco.";
            break;
            case 8:
                $msgErro = "[8] - Uma extensão do PHP interrompeu o upload do arquivo.";
            break;
        }
        ExceptionErros::gerarLog(realpath(__FILE__), $msgErro);
    }

    if ($arqOrcamento['error'] == 0 && $arqOrcamento['size'] > 0) {
        $pasta = "C:/xampp/htdocs/Temp/solicitacao-materiais/anexos/";
        $nomeArquivo = $arqOrcamento['name'];
        $novoNome = uniqid();
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

        if ($extensao != '' && $extensao != 'jpg' && $extensao != 'png' && $extensao != 'pdf' && $extensao != 'zip' && $extensao != 'rar') {
            ExceptionErros::gerarLog(realpath(__FILE__), "Tipo de arquivo não aceito!");
        }

        $statusEnvioArquivo = move_uploaded_file($arqOrcamento['tmp_name'], $pasta . $novoNome . "." . $extensao);
        $pathAnexo = $pasta . $novoNome . "." . $extensao;
    }

    $arrManutExterna = [
        'codigo_equipamento' =>         $_POST['txtCodigoMaterial'],
        'unidade_equipamento' =>        $_POST['txtUnidadeMaterial'],
        'quantidade_equipamento' =>     $_POST['txtQtdeMaterial'],
        'rs_unitario_equipamento' =>    $_POST['txtValorUnit'],
        'rs_total_equipamento' =>       $_POST['txtValorReal'],
        'descricao_equipamento' =>      $_POST['txtDescricaoMaterial'],
        'codigo_servico' =>             $_POST['txtCodigoServico'],
        'descricao_servico' =>          $_POST['txtDescricaoServico'],
        'codigo_centro_custo' =>        $_POST['txtCodigoCCusto'],
        'descricao_centro_custo' =>     $_POST['txtDescricaoCCusto'],
        'defeito' =>                    $_POST['txtDefeitoObs'],
        'aplicacao' =>                  $_POST['txtAplicacao'],
        'num_serie' =>                  $_POST['txtNumSerie'],
        'num_patrimonio' =>             $_POST['txtNumPatrimonio'],
        'fornecedor' =>                 $_POST['txtFornecedor'],
        'requisicao' =>                 $_POST['txtRequisicao'],
        'item_requisicao' =>            $_POST['txtItemRequisicao'],
        'pedido' =>                     $_POST['txtPedido'],
        'item_pedido' =>                $_POST['txtItemPedido'],
        'mes_aprovacao' =>              $_POST['txtMesAprov'],
        'nome_solicitante' =>           $_POST['txtSolicitante'],
        'proposta' =>                   $_POST['txtProposta'],
        'item_proposta' =>              $_POST['txtItemProposta'],
        'custo_total' =>                $_POST['txtCustoTotal'],
        'gut_gravidade' =>              $_POST['rgGravidade'],
        'gut_urgencia' =>               $_POST['rgUrgencia'],
        'gut_tendencia' =>              $_POST['rgTendencia'],
        'gut_prioridade' =>             $_POST['txtPrioridade'],
        'nf_codigo_envio' =>            $_POST['txtNumNfEnvio'],
        'nf_codigo_retorno' =>          $_POST['txtNumNfRetorno'],
        'nf_data_envio' =>              $_POST['txtDataNfEnvio'],
        'nf_data_retorno' =>            $_POST['txtDataNfRetorno'],
        'anx_orcamento' =>              $pathAnexo,
    ];
    $objManutExterna = new ManutencaoExterna($arrManutExterna);
    $retorno = ManutencaoExternaRepository::cadastrarRepository($objManutExterna);
    if ($retorno)
        header('Location: ../view/front/solicManutExterna.php');

} catch (Exception $ex) {
    ExceptionErros::gerarLog(realpath(__FILE__), json_encode($ex));
}
