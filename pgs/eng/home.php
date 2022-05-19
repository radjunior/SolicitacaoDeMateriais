<?php
require_once "../../dao/conexao.php";
require_once "../../dao/session.php";
require_once "../../dao/operacoes.php";

$stmtMateriaisGeral = MaterialDAO::getMateriaisGeral();
$stmtSomaRealTotal = MaterialDAO::getSomaMateriaisRealTotal();
$stmtCountAprovar = MaterialDAO::getCountMateriaisAprovar();
$stmtCountAprovado = MaterialDAO::getCountMateriaisAprovado();
$stmtCountAutorizado = MaterialDAO::getCountMateriaisAutorizado();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automação</title>
    <link rel="shortcut icon" href="../../images/favicon-original.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../css/eng/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/datatable/datatables.css">
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
                <h2>Home Page</h2>
            </div>
            <!-- userImg -->
            <div class="user">
                <img src="../../images/user.jpg">
            </div>

        </div>
        <!-- cards -->
        <div class="cardBox">
            <div class="carde">
                <div>
                    <div class="numbersComprasTotal">
                        <?php foreach ($stmtSomaRealTotal as $item) {
                            echo $item['REAL_TOTAL'];
                        } ?>
                    </div>
                    <div class="cardName">Compras (R$)</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="cart-outline"></ion-icon>
                </div>
            </div>
            <div class="carde">
                <div>
                    <div class="numbersComprasTotal">
                        <?php foreach ($stmtCountAprovar as $item) {
                            echo $item['TOTAL_COUNT'];
                        } ?>
                    </div>
                    <div class="cardName">Aprovar</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="checkmark-outline"></ion-icon>
                </div>
            </div>
            <div class="carde">
                <div>
                    <div class="numbersComprasTotal">
                        <?php foreach ($stmtCountAprovado as $item) {
                            echo $item['TOTAL_COUNT'];
                        } ?></div>
                    <div class="cardName">Aprovado</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="checkmark-done-outline"></ion-icon>
                </div>
            </div>
            <div class="carde">
                <div>
                    <div class="numbers">
                        <?php foreach ($stmtCountAutorizado as $item) {
                            echo $item['TOTAL_COUNT'];
                        } ?>
                    </div>
                    <div class="cardName">Autorizado</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="checkmark-circle-outline"></ion-icon>
                </div>
            </div>
        </div>
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Solicitações</h2>
                </div>
                <table id="TabelaHome" class="tabelaPrincipal">
                    <thead>
                        <tr>
                            <td scope="col">Descrição</td>
                            <td scope="col">Qtde</td>
                            <td scope="col">Valor Unit.</td>
                            <td scope="col">Valor Total</td>
                            <td scope="col">Solicitante</td>
                            <td scope="col">Aplicação</td>
                            <td scope="col">Mês Aprovação</td>
                            <td scope="col">Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stmtMateriaisGeral as $item) { ?>
                            <tr id="tBody">
                                <td><?php echo $item['DESCRICAO'] ?></td>
                                <td><?php echo $item['QUANTIDADE'] ?></td>
                                <td><?php echo $item['REAL_UNITARIO'] ?></td>
                                <td><?php echo $item['REAL_TOTAL'] ?></td>
                                <td><?php echo $item['SOLICITANTE'] ?></td>
                                <td><?php echo $item['APLICACAO'] ?></td>
                                <td><?php echo $item['MES_APROVACAO'] ?></td>
                                <td><?php echo $item['STATUS_SOLIC'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../../js/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../js/jQuery/jquery.mask.js"></script>
    <script type="text/javascript" src="../../js/datatables/datatables.js"></script>
    <script type="text/javascript" src="../../js/eng/home.js"></script>
    <script type="text/javascript" src="../../js/js.bootstrap/bootstrap.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>