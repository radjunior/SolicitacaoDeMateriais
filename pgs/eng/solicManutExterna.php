<?php
require_once "../../dao/app/conexao.php";
require_once "../../dao/app/session.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../images/favicon-original.ico" type="image/x-icon">
    <title>Solicitação de Material</title>
    <link rel="stylesheet" type="text/css" href="../../css/eng/solicManutExterna.css">
    <link rel="stylesheet" type="text/css" href="../../scripts/datatables/datatables.css">
    <link rel="stylesheet" type="text/css" href="../../css/css.bootstrap/bootstrap.css">
</head>

<body>
    <div class="conteiner">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="code-working-outline"></ion-icon>
                        </span>
                        <span class="title">Olá, <?php echo $_SESSION['nomeUsuario']; ?></span>
                    </a>
                </li>
                <li>
                    <a href="./home.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Início</span>
                    </a>
                </li>
                <li>
                    <a href="./solicMaterial.php">
                        <span class="icon">
                            <ion-icon name="add-outline"></ion-icon>
                            </ion-icon>
                        </span>
                        <span class="title">Solicitar Material</span>
                    </a>
                </li>
                <li>
                    <a href="./solicMaterialCAPEX.php">
                        <span class="icon">
                            <ion-icon name="logo-usd"></ion-icon>
                        </span>
                        <span class="title">CAPEX</span>
                    </a>
                </li>
                <li>
                    <a href="./solicManutExterna.php">
                        <span class="icon">
                            <ion-icon name="cog-outline"></ion-icon>
                        </span>
                        <span class="title">Solitar Manutenção</span>
                    </a>
                </li>
                <li>
                    <a href="./acompPedidos.php">
                        <span class="icon">
                            <ion-icon name="bar-chart-outline"></ion-icon>
                        </span>
                        <span class="title">Acompanhamento</span>
                    </a>
                </li>
                <li>
                    <a href="./cadastroGeral.php">
                        <span class="icon">
                            <ion-icon name="documents-outline"></ion-icon>
                        </span>
                        <span class="title">Cadastro</span>
                    </a>
                </li>
                <li>
                    <a href="?logout=1">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sair</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- main -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
            <!-- search -->
            <div class="titleTopBar">
                <h2>Solicitação de Manutenção Externa</h2>
            </div>
            <!-- userImg -->
            <div class="user">
                <img src="../../images/user.jpg">
            </div>
        </div>
        <!-- body -->
        <div class="resultados">
            <div class="cardResultados">
                <div class="modelResult">
                    <ion-icon class="icone" name="cart-outline"></ion-icon>
                    <span id="spnValorTotal"></span>
                </div>
                <div class="nameModel">Total</div>
            </div>
            <div class="cardResultados">
                <div class="modelResult">
                    <ion-icon class="icone" name="file-tray-stacked-outline"></ion-icon>
                    <span id="spnQtde"></span>
                </div>
                <div class="nameModel">Quantidade</div>
            </div>
        </div>
        <form action="../../dao/eng/cadastroManutEx.php" method="post" id="form" enctype="multipart/form-data">
            <div class="cardBox">
                <div class="cardMaterial">
                    <div class="titleMaterial">
                        <h2>Equipamento</h2>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#mdlMaterial">
                            <ion-icon name="search-circle-outline"></ion-icon>
                        </button>
                    </div>
                    <div class="inputMaterial">
                        <input type="text" placeholder="Código *" id="txtCodigoMaterial" name="txtCodigoMaterial" onblur="validarCodigoMaterial(this.value)">
                        <input type="text" placeholder="Un" id="txtUnidadeMaterial" name="txtUnidadeMaterial" readonly>
                        <input type="number" placeholder="Qtde *" id="txtQtdeMaterial" name="txtQtdeMaterial">
                    </div>
                    <div class="inputValores">
                        <input type="text" placeholder="R$ Unitário" id="txtValorUnit" name="txtValorUnit" readonly>
                        <input type="text" placeholder="R$ Total" id="txtValorReal" name="txtValorReal" readonly>
                    </div>
                    <div class="inputDescricao">
                        <textarea placeholder="Descrição" id="txtDescricaoMaterial" name="txtDescricaoMaterial" cols="30" readonly></textarea>
                    </div>
                </div>
                <div class="cardServico">
                    <div class="titleServico">
                        <h2>Serviço</h2>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#mdlServico">
                            <ion-icon name="search-circle-outline"></ion-icon>
                        </button>
                    </div>
                    <div class="inputServico">
                        <div>
                            <input type="number" placeholder="Código *" id="txtCodigoServico" name="txtCodigoServico" onblur="validarCodigoServico(this.value)">
                        </div>
                        <div>
                            <textarea placeholder="Descrição" id="txtDescricaoServico" name="txtDescricaoServico" cols="30" readonly></textarea>
                        </div>
                    </div>
                </div>
                <div class="cardCentroCusto">
                    <div class="titleCusto">
                        <h2>Centro de Custo</h2>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#mdlCentroCusto">
                            <ion-icon name="search-circle-outline"></ion-icon>
                        </button>
                    </div>
                    <div class="inputCentroCusto">
                        <div>
                            <input type="number" placeholder="Código *" id="txtCodigoCCusto" name="txtCodigoCCusto" onblur="validarCodigoCCusto(this.value)">
                        </div>
                        <div>
                            <input type="text" placeholder="Descrição" id="txtDescricaoCCusto" name="txtDescricaoCCusto" readonly>
                        </div>
                    </div>
                </div>

                <div class="cardAplicacao">
                    <div class="titleAplicacao">
                        <h2>Aplicação</h2>
                    </div>
                    <div class="aplicacaoValores">
                        <div>
                            <textarea placeholder="Defeito/Obs *" id="txtDefeitoObs" name="txtDefeitoObs"></textarea>
                            <textarea placeholder="Aplicação *" id="txtAplicacao" name="txtAplicacao"></textarea>
                            <input type="text" placeholder="Número de Série" id="txtNumSerie" name="txtNumSerie">
                            <input type="text" placeholder="Número de Patrimônio" id="txtNumPatrimonio" name="txtNumPatrimonio">
                        </div>
                    </div>
                </div>
                <div class="cardExterno">
                    <div class="titleExterno">
                        <h2>Externo</h2>
                    </div>
                    <div class="inputExterno">
                        <input type="text" placeholder="Fornecedor *" id="txtFornecedor" name="txtFornecedor">
                        <input type="number" placeholder="Requisição" id="txtRequisicao" name="txtRequisicao">
                        <input type="number" placeholder="Item da Requisição" id="txtItemRequisicao" name="txtItemRequisicao">
                        <input type="number" placeholder="Pedido" id="txtPedido" name="txtPedido">
                        <input type="number" placeholder="Item do Pedido" id="txtItemPedido" name="txtItemPedido">
                    </div>
                </div>
                <div class="cardDatas">
                    <h2>Datas</h2>
                    <div class="inputDatas">
                        <div>
                            <label for="mesAprov">Mês de Aprovação</label>
                            <input type="month" id="txtMesAprov" name="txtMesAprov">
                        </div>
                        <div>
                            <label for="dataInsert">Data de Inserção *</label>
                            <input type="text" id="txtDataInsert" name="txtDataInsert" readonly>
                        </div>
                    </div>
                    <input type="hidden" id="txtSolicitante" name="txtSolicitante" value="<?php echo $_SESSION['usuarioLogin']; ?>">
                </div>
                <div class="cardOrcamento">
                    <h2>Orçamento</h2>
                    <div class="inputOrcamento">
                        <div>
                            <input type="text" placeholder="Proposta" id="txtProposta" name="txtProposta">
                            <input type="text" placeholder="Item da Proposta" id="txtItemProposta" name="txtItemProposta">
                            <input type="text" placeholder="Custo Total" id="txtCustoTotal" name="txtCustoTotal">
                            <div class="input-group">
                                <input type="file" class="form-control" id="arqOrcamento" name="arqOrcamento" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Limpar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cardGut">
                    <h2>Matriz Gut</h2>
                    <div class="inputGut">
                        <label for="rgGravidade">Gravidade</label><span id="lblGravidade"></span>
                        <input type="range" id="rgGravidade" name="rgGravidade" min="0" max="5" step="1" value="0" oninput="calcularMatrizGut()">
                        <label for="rgUrgencia">Urgência</label><span id="lblUrgencia"></span>
                        <input type="range" id="rgUrgencia" name="rgUrgencia" min="0" max="5" step="1" value="0" oninput="calcularMatrizGut()">
                        <label for="rgTendencia">Tendencia</label><span id="lblTendencia"></span>
                        <input type="range" id="rgTendencia" name="rgTendencia" min="0" max="5" step="1" value="0" oninput="calcularMatrizGut()">
                    </div>
                    <div class="inputBottonGut">
                        <label>Prioridade: </label>
                        <span id="txtPrioridade" name="txtPrioridade"></span>
                    </div>
                </div>
                <div class="cardNfs">
                    <h2>[NF] Remessa e Retorno</h2>
                    <div class="inputNfs">
                        <input type="text" placeholder="Num NF Envio" id="txtNumNfEnvio" name="txtNumNfEnvio">
                        <input type="date" placeholder="Data NF Envio" id="txtDataNfEnvio" name="txtDataNfEnvio">
                        <input type="text" placeholder="Num NF Retorno" id="txtNumNfRetorno" name="txtNumNfRetorno">
                        <input type="date" placeholder="Data NF Retorno" id="txtDataNfRetorno" name="txtDataNfRetorno">
                    </div>
                </div>
            </div>
            <div class="containerBTN">
                <div class="botaoAcao">
                    <button type="reset">Limpar<ion-icon name="trash-bin-outline"></ion-icon></button>
                    <button type="submit">Inserir<ion-icon name="arrow-down-circle-outline"></ion-icon></button>
                </div>
            </div>
            <!--
            <div class="containerBTN">
                <div class="botaoAcao">
                    <button type="button" onclick="itemServico.cancelar()">Limpar<ion-icon name="trash-bin-outline"></ion-icon></button>
                    <button type="button" onclick="itemServico.salvar()" id="btnInsertAtt">Inserir<ion-icon name="arrow-down-circle-outline"></ion-icon></button>
                </div>
            </div>
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Solicitações de Serviços</h2>
                        <button type="button" id="btnEnviarSolicitacaoBD" onclick="itemServico.enviarBD()">Solicitar Serviço</button>
                    </div>
                    <table id="tabelaPrincipal" class="table table-striped">
                        <thead>
                            <tr>
                                <td scope="col">Id</td>
                                <td scope="col">Equipamento</td>
                                <td scope="col">Quantidade</td>
                                <td scope="col">Valor Unitário</td>
                                <td scope="col">Valor Total</td>
                                <td scope="col">Serviço</td>
                                <td scope="col">Centro de Custo</td>
                                <td scope="col">Defeito/Obs</td>
                                <td scope="col">Aplicação</td>
                                <td scope="col">Fornecedor</td>
                                <td scope="col">Prioridade</td> 
                                <td scope="col"></td>
                            </tr>
                        </thead>
                        <tbody id="tBody">
                        </tbody>
                    </table>
                </div>
            </div>
            -->
        </form>
        <!-- Inicio Modal Material-->
        <div class="modal fade" id="mdlMaterial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Selecionar Mateiral</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modalTop">
                            <input type="text" placeholder="Pesquisar" id="txtPesquisaMaterial">
                        </div>
                        <table class="table table-striped tabelaModalMaterial">
                            <thead>
                                <tr>
                                    <td scope="col">Código</td>
                                    <td scope="col">Material</td>
                                    <td scope="col">Tipo</td>
                                    <td scope="col">Unidade</td>
                                </tr>
                            </thead>
                            <tbody id="tBodyModalMaterial">
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                        <button type="button" class="btn btn-primary">Selecionar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fim Modal Material-->
        <!-- Inicio Modal Servicos-->
        <div class="modal fade" id="mdlServico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Selecionar Serviço</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modalTop">
                            <input type="text" placeholder="Pesquisar" id="pesquisaServico">
                        </div>
                        <table class="table table-striped tabelaModalServico">
                            <thead>
                                <tr>
                                    <td scope="col">Código</td>
                                    <td scope="col">Material</td>
                                    <td scope="col">Tipo</td>
                                    <td scope="col">Unidade</td>
                                </tr>
                            </thead>
                            <tbody id="tBodyModalServico">
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                        <button type="button" class="btn btn-primary">Selecionar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fim Modal Servicos-->
        <!-- Inicio Modal Centro de Custo-->
        <div class="modal fade" id="mdlCentroCusto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Selecionar Centro de Custo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modalTop">
                            <input type="text" placeholder="Pesquisar" id="txtPesquisaCentroCusto">
                        </div>
                        <table class="table table-striped tabelaModalCentroCusto">
                            <thead>
                                <tr>
                                    <td scope="col">Codigo</td>
                                    <td scope="col">Descrição</td>
                                </tr>
                            </thead>
                            <tbody id="tBodyModalCentroCusto">
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                        <button type="button" class="btn btn-primary">Selecionar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fim Modal Centro de Custo-->
    </div>
    <script type="text/javascript" src="../../scripts/datatables/datatables.js"></script>
    <script type="text/javascript" src="../../js/vendor/jquery/jquery.mask.js"></script>
    <script type="text/javascript" src="../../js/js.bootstrap/bootstrap.js"></script>
    <script type="text/javascript" src="../../js/eng/solicManutExterna.js"></script>
    <script type="text/javascript" src="../../js/class/MaterialManutExterna.class.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>