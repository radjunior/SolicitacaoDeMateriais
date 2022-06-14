<?php
require_once "../../dao/app/operacoes.php";
require_once "../../dao/app/session.php";

$stmtMateriaisAprovado = MaterialDAO::getMateriaisAprovado();
$stmtSomaAprovado = MaterialDAO::getSomaMateriaisAprovado();
$stmtCountAprovado = MaterialDAO::getCountMateriaisAprovado();
$stmtCountAutorizado = MaterialDAO::getCountMateriaisAutorizado();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Automação</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../images/favicon-original.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../scripts/datatables/datatables.css">
    <link rel="stylesheet" type="text/css" href="../../css/css.bootstrap/bootstrap.css">
</head>

<body>
<div class="leftBar">
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
                    <a href="./acompPedidos.php">
                        <span class="icon">
                            <ion-icon name="bar-chart-outline"></ion-icon>
                        </span>
                        <span class="title"><s>Acompanhamento</s>[Em Breve]</span>
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
            <div class="titleTopBar">
                <h2>Solicitação de Materiais</h2>
            </div>
            <div class="user">
                <img src="../../images/user.jpg">
            </div>
        </div>
        <!-- cards -->
        <div class="cardBox">
            <div class="carde">
                <div class="cardDivInput">
                    <label>R$<input type="text" class="numbersComprasTotal" value="<?php echo $stmtSomaAprovado ?>"></label>
                    <div class="cardName">Compras</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="cart-outline"></ion-icon>
                </div>
            </div>
            <div class="carde">
                <div class="cardDivInput">
                    <input type="text" class="numbersComprasTotal" value="<?php echo $stmtCountAprovado ?>">
                    <div class="cardName">Aprovar</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="checkmark-outline"></ion-icon>
                </div>
            </div>
            <div class="carde">
                <div class="cardDivInput">
                    <input type="text" class="numbersComprasTotal" value="<?php echo $stmtCountAutorizado ?>">
                    <div class="cardName">Aprovado</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="checkmark-done-outline"></ion-icon>
                </div>
            </div>
        </div>
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Materiais a Serem Autorizados</h2>
                    <div>
                        <input type="month" id="iptFiltroMes">
                    </div>
                </div>
                <table id="TabelaHome" class="table table-striped">
                    <thead>
                        <tr>
                            <td scope="col">Descrição</td>
                            <td scope="col">Qtde</td>
                            <td scope="col">Valor Unitário</td>
                            <td scope="col">Valor Total</td>
                            <td scope="col">Aplicação</td>
                            <td scope="col">Mês Aprovação</td>
                            <td scope="col">Solicitante</td>
                            <td scope="col">Ação</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($stmtMateriaisAprovado as $item) { ?>
                            <tr>
                                <td><?php echo $item['DESCRICAO'] ?></td>
                                <td><?php echo $item['QUANTIDADE'] ?></td>
                                <td><?php echo $item['REAL_UNITARIO'] ?></td>
                                <td><?php echo $item['REAL_TOTAL'] ?></td>
                                <td><?php echo $item['APLICACAO'] ?></td>
                                <td><?php echo $item['MES_APROVACAO'] ?></td>
                                <td><?php echo $item['SOLICITANTE'] ?></td>
                                <td><button type="button" class="botaoId" data-bs-toggle="modal" data-bs-target="#exampleModal" 
                                data-bs-materialId="<?php echo $item['ID'] ?>" 
                                data-bs-materialCodigo="<?php echo $item['CODIGO'] ?>" 
                                data-bs-materialDescricao="<?php echo $item['DESCRICAO'] ?>" 
                                data-bs-materialRealUnit="<?php echo $item['REAL_UNITARIO'] ?>" 
                                data-bs-materialRealTotal="<?php echo $item['REAL_TOTAL'] ?>" 
                                data-bs-materialAplicacao="<?php echo $item['APLICACAO'] ?>" 
                                data-bs-materialSolicitante="<?php echo $item['SOLICITANTE'] ?>">Autorizar</button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Inicio Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="../../dao/ger/autorizar.php" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Autorizar Solicitação</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="form-control" name="materialId" id="materialId">
                            <input type="hidden" class="form-control" name="dataAtual" id="dataAtual">
                            <div class="mb-3">
                                <label for="materialDescricao" class="col-form-label">Descrição</label>
                                <input type="text" class="form-control" name="materialDescricao" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="materialAplicacao" class="col-form-label">Aplicação</label>
                                <input type="text" class="form-control" name="materialAplicacao" readonly>
                            </div>
                            <div class="centerModal">
                                <div class="mb-3">
                                    <label for="materialCodigo" class="col-form-label">Codigo</label>
                                    <input type="text" class="form-control" name="materialCodigo" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="materialSolicitante" class="col-form-label">Solicitante</label>
                                    <input type="text" class="form-control" name="materialSolicitante" readonly>
                                </div>
                            </div>
                            <div class="rodapeModal">
                                <div class="mb-3">
                                    <label for="materialRealUnit" class="col-form-label">Valor Unitário</label>
                                    <input type="text" class="form-control" name="materialRealUnit" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="materialRealTotal" class="col-form-label">Valor Total</label>
                                    <input type="text" class="form-control" name="materialRealTotal" readonly>
                                </div>
                            </div>
                            <div class="rodapeModal">
                                <div class="mb-3">
                                    <label for="materialRealUnit" class="col-form-label">Valor Unitário</label>
                                    <input type="text" class="form-control" name="materialRealUnit" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="materialRealTotal" class="col-form-label">Valor Total</label>
                                    <input type="text" class="form-control" name="materialRealTotal" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <!--<button type="button" class="btn btn-danger" onclick="desautorizar()">Não Autorizar</button>-->
                            <button type="button" class="btn btn-danger">Não Autorizar</button>
                            <button type="submit" class="btn btn-primary">Autorizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Fim Modal -->
    </div>
</body>
    <script type="text/javascript" src="../../scripts/datatables/datatables.js"></script>
    <script type="text/javascript" src="../../js/vendor/jquery/jquery.mask.js"></script>
    <script type="text/javascript" src="../../js/js.bootstrap/bootstrap.js"></script>
    <script type="text/javascript" src="../../js/ger/home.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>