<?php require_once "../resources/base-top.php"; ?>
<link rel="stylesheet" type="text/css" href="../../../css/solicMaterialCAPEX.css">
<link rel="stylesheet" type="text/css" href="../../../scripts/datatables/datatables.css">
<link rel="stylesheet" type="text/css" href="../../../css/css.bootstrap/bootstrap.css">
<!-- main -->
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
        </div>
        <!-- search -->
        <div class="titleTopBar">
            <h2>Solicitação de Materiais CAPEX</h2>
        </div>
        <!-- userImg -->
        <div class="user">
            <img src="../../../css/images/user.jpg">
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

    <div class="msgErro">
        <span class="msg-erro"></span>
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
                <h2>Capital</h2>
            </div>
            <div class="cardCapital">
                <select name="cptDescricao" id="cptDescricao">
                    <option value="1">Caldeiras</option>
                    <option value="2">Moendas</option>
                    <option value="3">Destilaria</option>
                    <option value="4">Fábrica</option>
                </select>
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
    <div class="modal fade" id="mdlMaterial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="text" placeholder="Pesquisar" id="pesquisaCentroCusto">
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
<script type="text/javascript" src="../../../scripts/datatables/datatables.js"></script>
<script type="text/javascript" src="../../../scripts/js/vendor/jquery/jquery.mask.js"></script>
<script type="text/javascript" src="../../../scripts/js/js.bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="../../../scripts/js/eng/solicMaterialCAPEX.js"></script>
<script type="text/javascript" src="../../../scripts/js/class/MaterialCAPEX.class.js"></script>

<?php require_once "../resources/base-bot.php"; ?>