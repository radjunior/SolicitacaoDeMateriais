<?php
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
    <link rel="stylesheet" type="text/css" href="../../css/solicMaterial.css">
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
                <h2>Solicitação de Materiais</h2>
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

        <div class="cardBox">

            <div class="cardMaterial">
                <div class="titleMaterial">
                    <h2>Materiais</h2>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#mdlMaterial">
                        <ion-icon name="search-circle-outline"></ion-icon>
                    </button>
                </div>
                <div class="inputMaterial">
                    <input type="text" placeholder="Código *" id="codigoMaterial" name="codigoMaterial">
                    <input type="text" placeholder="Un" id="unidadeMaterial" name="unidadeMaterial" readonly>
                    <input type="number" placeholder="Qtde *" id="qtdeMaterial" name="qtdeMaterial">
                </div>
                <div class="inputValores">
                    <input type="text" placeholder="R$ Unitário *" id="valorUnit" name="valorUnit">
                    <input type="text" placeholder="R$ Total" name="valorReal" id="valorReal">
                </div>
                <div class="inputDescricao">
                    <textarea placeholder="Descrição" name="descricaoMaterial" id="descricaoMaterial" cols="30" readonly></textarea>
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
                        <input type="number" placeholder="Código *" id="codigoCCusto" name="codigoCCusto">
                    </div>
                    <div>
                        <input type="text" placeholder="Descrição" id="descricaoCCusto" name="descricaoCCusto" readonly>
                    </div>
                </div>
            </div>

            <div class="cardAplicacao">
                <div class="titleAplicacao">
                    <h2>Aplicação</h2>
                    <button type="button" id="btnLimparZipProposta">
                        <ion-icon name="trash-bin-outline"></ion-icon>
                    </button>
                </div>
                <div class="aplicacaoValores">
                    <div>
                        <label for="prioridade">Prioridade [0-1-2]*</label>
                        <input type="range" placeholder="Prioridade" id="prioridade" name="prioridade" min="0" max="2">
                    </div>
                    <div>
                        <input type="text" placeholder="Proposta" id="proposta" name="proposta">
                    </div>
                    <!-- <div class="drop-zone">
                        <span class="drop-zone__prompt">Upload Proposta (.zip)</span>
                        <input type="file" id="zipProposta" name="myFile" class="drop-zone__input" multiple="multiple">
                    </div> -->
                    <div>
                        <textarea placeholder="Aplicação *" id="aplicacao" name="aplicacao"></textarea>
                    </div>
                </div>
                <div>
                    <input type="hidden" placeholder="Solicitante" id="solicitante" name="solicitante" value="<?php echo $_SESSION['usuarioLogin']; ?>">
                </div>
            </div>
            <div class="cardExterno">
                <div class="titleExterno">
                    <h2>Externo</h2>
                    <button type="button" id="btnLimparZipRequisicao">
                        <ion-icon name="trash-bin-outline"></ion-icon>
                    </button>
                </div>
                <div class="inputExterno">
                    <div>
                        <input type="text" placeholder="Fornecedor" id="fornecedor" name="fornecedor">
                    </div>
                    <div>
                        <input type="number" placeholder="Requisição" id="requisicao" name="requisicao">
                    </div>
                    <div>
                        <input type="number" placeholder="Item da Requisição" id="itemRequisicao" name="itemRequisicao">
                    </div>
                    <!-- <div class="drop-zone">
                        <span class="drop-zone__prompt">Upload Item Requisição (.zip)</span>
                        <input type="file" id="zipItemRequisicao" name="myFile" class="drop-zone__input" multiple="multiple">
                    </div> -->
                </div>
            </div>
            <div class="cardDatas">
                <h2>Datas</h2>
                <div class="inputDatas">
                    <div>
                        <label for="mesAprov">Mês de Aprovação *</label>
                        <input type="month" id="mesAprov" name="mesAprov">
                    </div>
                    <div>
                        <label for="dataInsert">Data de Inserção *</label>
                        <input type="text" id="dataInsert" name="dataInsert" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="containerBTN">
            <div class="botaoAcao">
                <button type="button" onclick="itemSolic.cancelar()">Limpar<ion-icon name="trash-bin-outline"></ion-icon></button>
                <button type="button" onclick="itemSolic.salvar()" id="btnInsertAtt">Inserir<ion-icon name="arrow-down-circle-outline"></ion-icon></button>

            </div>
        </div>
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Materiais a Serem Solicitados</h2>
                    <button type="button" id="btnEnviarSolicitacaoBD" onclick="itemSolic.enviarBD()">Solicitar Materiais</button>
                </div>
                <table id="tabelaPrincipal" class="table table-striped">
                    <thead>
                        <tr>
                            <td scope="col">Id</td>
                            <td scope="col">Codigo</td>
                            <td scope="col">Descrição</td>
                            <td scope="col">Quantidade</td>
                            <td scope="col">Valor Unitário</td>
                            <td scope="col">Valor Total</td>
                            <td scope="col">Aplicação</td>
                            <td scope="col">Solicitante</td>
                            <td scope="col">Config</td>
                        </tr>
                    </thead>
                    <tbody id="tBody">
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Inicio Modal Material-->
        <div class="modal fade" id="mdlMaterial" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Selecionar Mateiral</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modalTop">
                            <input type="text" placeholder="Pesquisar" id="pesquisaMaterial">
                        </div>
                        <table class="table table-striped tabelaModalMaterial">
                            <thead>
                                <tr>
                                    <td scope="col">Código</td>
                                    <td scope="col">Material</td>
                                    <td scope="col">Tipo</td>
                                    <td scope="col">Unidade</td>
                                    <td scope="col">Selecionar</td>
                                </tr>
                            </thead>
                            <tbody id="tBodyModalMaterial">
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fim Modal Material-->
        <!-- Inicio Modal Centro de Custo-->
        <div class="modal fade" id="mdlCentroCusto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Selecionar Centro de Custo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modalTop">
                            <input type="text" placeholder="Pesquisar" id="pesquisaCentroCusto">
                        </div>
                        <table class="table table-striped tabelaModalCCusto">
                            <thead>
                                <tr>
                                    <td scope="col">Codigo</td>
                                    <td scope="col">Descrição</td>
                                    <td scope="col">Selecionar</td>
                                </tr>
                            </thead>
                            <tbody id="tBodyModalCentroCusto">
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fim Modal Centro de Custo-->
    </div>
    <script type="text/javascript" src="../../scripts/datatables/datatables.js"></script>
    <script type="text/javascript" src="../../js/vendor/jquery/jquery.mask.js"></script>
    <script type="text/javascript" src="../../js/js.bootstrap/bootstrap.js"></script>
    <script type="text/javascript" src="../../js/eng/solicMaterial.js"></script>
    <script type="text/javascript" src="../../js/eng/Material.class.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>