<?php
require_once "../../dao/conexao.php";
require_once "../../dao/session.php";
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
</head>

<body>
    <div class="container">
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
            <div class="card">
                <div class="model">
                    <ion-icon class="icone" name="cart-outline"></ion-icon>
                    <span id="spnValorTotal"></span>
                </div>
                <div class="nameModel">Total</div>
            </div>
            <div class="card">
                <div class="model">
                    <ion-icon class="icone" name="file-tray-stacked-outline"></ion-icon>
                    <span id="spnQtde"></span>
                </div>
                <div class="nameModel">Quantidade</div>
            </div>
        </div>

        <div class="msgErro">
            <span class="msg-erro"></span>
        </div>
        <div class="cardBox">

            <div class="cardMaterial">
                <div class="titleMaterial">
                    <h2>Materiais</h2>
                    <button type="button" href="#">
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
                    <input type="text" id="valorReal" name="valorReal" placeholder="R$ Total" readonly>
                </div>
                <div class="inputDescricao">
                    <textarea placeholder="Descrição" name="descricaoMaterial" id="descricaoMaterial" cols="30" readonly></textarea>
                </div>
            </div>

            <div class="cardCentroCusto">
                <div class="titleCusto">
                    <h2>Centro de Custo</h2>
                    <button type="button" href="#">
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
                <h2>Aplicação</h2>
                <div class="aplicacaoValores">
                    <div>
                        <label for="prioridade">Prioridade [0-1-2]*</label>
                        <input type="range" placeholder="Prioridade" id="prioridade" name="prioridade" min="0" max="2">
                    </div>
                    <div>
                        <input type="text" placeholder="Proposta" id="proposta" name="proposta">
                    </div>
                    <div>
                        <textarea placeholder="Aplicação *" id="aplicacao" name="aplicacao"></textarea>
                    </div>
                </div>
                <div>
                    <input type="hidden" placeholder="Solicitante" id="solicitante" name="solicitante" value="<?php echo $_SESSION['usuarioLogin']; ?>">
                </div>
            </div>
            <div class="cardExterno">
                <h2>Externo</h2>
                <div class="inputExterno">
                    <div>
                        <input type="text" placeholder="Fornecedor" id="fornecedor" name="fornecedor">
                    </div>
                    <div>
                        <input type="number" placeholder="Requisição" id="requisicao" name="requisicao">
                    </div>
                    <div>
                        <input type="number" placeholder="Item de Requisição" id="itemRequisicao" name="itemRequisicao">
                    </div>
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
                <button type="button" onclick="itemSolic.cancelar()">Limpar</button>
                <button type="button" onclick="itemSolic.salvar()" id="btnInsertAtt">Inserir</button>
            </div>
        </div>
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Materiais a Serem Solicitados</h2>
                    <button type="button" id="btnEnviarSolicitacaoBD" onclick="itemSolic.enviarBD()">Solicitar Materiais</button>
                </div>
                <table id="tabelaPrincipal" class="tabelaPrincipal">
                    <thead>
                        <tr>
                            <td scope="col">Id</td>
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
    </div>
    <script type="text/javascript" src="../../js/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../js/eng/jquery.maskMoney.js"></script>
    <script type="text/javascript" src="../../js/eng/solicMaterial.js"></script>
    <script type="text/javascript" src="../../js/eng/Material.class.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>