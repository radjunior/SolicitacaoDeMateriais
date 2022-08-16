<?php require_once "../base-top.php"; ?>

<link rel="stylesheet" type="text/css" href="../../css/eng/solicMaterial.css">
<link rel="stylesheet" type="text/css" href="../../scripts/datatables/datatables.css">
<link rel="stylesheet" type="text/css" href="../../css/css.bootstrap/bootstrap.css">
<!-- Main -->
<div class="main">
    <!-- Botão / Titulo / Foto -->
    <div class="topbar">
        <!-- Botão Container -->
        <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
        </div>
        <!-- Titulo -->
        <div class="titleTopBar">
            <h2>Solicitação de Materiais</h2>
        </div>
        <!-- Imagem do Usuario -->
        <div class="user">
            <img src="../../images/user.jpg">
        </div>
    </div>
    <!-- Card Resultados -->
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
    <div class="cardRbMaterial">
        <div class="rbButtonsDestinoMaterial">
            <h2>Período</h2>
            <div class="form-check">
                <input class="form-check-input" onchange="alterarRbSafra()" type="radio" name="rbPeriodoSafra" id="rbPeriodoSafra">
                <label class="form-check-label" for="rbPeriodoSafra">Safra</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" onchange="alterarRbEntreSafra()" type="radio" name="rbPeriodoEntreSafra" id="rbPeriodoEntreSafra">
                <label class="form-check-label" for="rbPeriodoEntreSafra">E-Safra</label>
            </div>
        </div>
    </div>

    <!-- Caixa de Cards -->
    <div class="cardBox">
        <!-- Card Material -->
        <div class="cardMaterial">
            <input type="hidden" placeholder="Solicitante" id="solicitante" name="solicitante" value="<?php echo $_SESSION['usuarioLogin']; ?>">
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
                <input type="text" placeholder="R$ Unitário *" id="valorUnit" name="valorUnit" readonly>
                <input type="text" placeholder="R$ Total" id="valorReal" name="valorReal" readonly>
            </div>
            <div class="inputDescricao">
                <textarea placeholder="Descrição" id="descricaoMaterial" name="descricaoMaterial" cols="30" readonly></textarea>
            </div>
        </div>
        <!-- Card Centro de Custo -->
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
        <!-- Card Aplicação -->
        <div class="cardAplicacao">
            <div class="titleAplicacao">
                <h2>Aplicação</h2>
            </div>
            <div class="aplicacaoValores">
                <div>
                    <label for="prioridade">Prioridade [0-1-2]*</label>
                    <input type="range" placeholder="Prioridade" id="prioridade" name="prioridade" min="0" max="2">
                </div>
                <div>
                    <input type="text" placeholder="Proposta" id="proposta" name="proposta">
                </div>
                <div id="divEquipe" style="display: none;">
                    <input type="text" placeholder="Equipe" id="equipe" name="equipe">
                </div>
                <div>
                    <textarea placeholder="Aplicação *" id="aplicacao" name="aplicacao"></textarea>
                </div>
            </div>
        </div>
        <!-- Card Externo -->
        <div class="cardExterno">
            <div class="titleExterno">
                <h2>Externo</h2>
                <button type="button" data-bs-toggle="modal" data-bs-target="#mdlFornecedor">
                    <ion-icon name="search-circle-outline"></ion-icon>
                </button>
            </div>
            <div class="inputExterno">
                <div>
                    <input type="text" placeholder="Fornecedor" id="fornecedor" name="fornecedor" readonly>
                </div>
                <div>
                    <input type="number" placeholder="Requisição" id="requisicao" name="requisicao">
                </div>
                <div>
                    <input type="number" placeholder="Item da Requisição" id="itemRequisicao" name="itemRequisicao">
                </div>
            </div>
        </div>
        <!-- Card Datas -->
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
    <!-- Botões de Ação -->
    <div class="containerBTN">
        <div class="botaoAcao">
            <button type="button" onclick="itemSolic.cancelar()">
                Limpar<ion-icon name="trash-bin-outline"></ion-icon>
            </button>
            <button type="button" onclick="itemSolic.salvar()" id="btnInsertAtt">
                Inserir<ion-icon name="arrow-down-circle-outline"></ion-icon>
            </button>
        </div>
    </div>
    <!-- Tabela -->
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
                        <td scope="col">Equipe</td>
                        <td scope="col">Config</td>
                    </tr>
                </thead>
                <tbody id="tBody">
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal Material-->
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
                                <td scope="col">Preço Unitário</td>
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
    <!-- Modal Centro de Custo-->
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
    <!-- Modal Fornecedor-->
    <div class="modal fade" id="mdlFornecedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Selecionar Fornecedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modalTop">
                        <input type="text" placeholder="Pesquisar" id="pesquisaFornecedor">
                    </div>
                    <table class="table table-striped tabelaModalFornecedor">
                        <thead>
                            <tr>
                                <td scope="col">Codigo</td>
                                <td scope="col">Descrição</td>
                                <td scope="col">Selecionar</td>
                            </tr>
                        </thead>
                        <tbody id="tBodyModalFornecedor">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="../../scripts/datatables/datatables.js"></script>
<script type="text/javascript" src="../../js/vendor/jquery/jquery.mask.js"></script>
<script type="text/javascript" src="../../js/js.bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="../../js/eng/solicMaterial.js"></script>
<script type="text/javascript" src="../../js/class/Material.class.js"></script>

<?php require_once "../base-bot.php"; ?>