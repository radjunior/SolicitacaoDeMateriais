<?php
require_once "../../dao/conexao.php";
require_once "../../dao/session.php";

$conn = ConexaoLocal::getConnection();
$query = "SELECT * FROM MATERIAIS_SOLICITADOS";
$stmt = $conn->query($query);

$queryAprovado = "SELECT COUNT(STATUS_SOLIC) AS totalAprovado FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'APROVADO'";
$stmtAprovado = $conn->query($queryAprovado);

$queryAprovar = "SELECT COUNT(STATUS_SOLIC) AS totalAprovar FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'APROVAR'";
$stmtAprovar = $conn->query($queryAprovar);

$queryAutorizado = "SELECT COUNT(STATUS_SOLIC) AS totalAutorizado FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'AUTORIZADO'";
$stmtAutorizado = $conn->query($queryAutorizado);

$queryTotalAprovar = "SELECT SUM(real_total) AS real_total_aprovar FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'APROVAR'";
$stmtValorTotalAprovar = $conn->query($queryTotalAprovar);

$queryTotalAprovado = "SELECT SUM(real_total) AS real_total_aprovado FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'APROVADO'";
$stmtValorTotalAprovado = $conn->query($queryTotalAprovado);

$queryTotalAutorizado = "SELECT SUM(real_total) AS real_total_autorizado FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'AUTORIZADO'";
$stmtValorTotalAutorizado = $conn->query($queryTotalAutorizado);
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
    <link rel="stylesheet" type="text/css" href="../../css/datatable/datatable.css">
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
                        <?php foreach ($stmtValorTotalAprovar as $item) {
                            echo $item['real_total_aprovar'];
                        } ?>
                    </div>
                    <div class="cardName">R$ Total Solicitado</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="cart-outline"></ion-icon>
                </div>
            </div>
            <div class="carde">
                <div>
                    <div class="numbersComprasTotal">
                        <?php foreach ($stmtValorTotalAprovado as $item) {
                            echo $item['real_total_aprovado'];
                        } ?>
                    </div>
                    <div class="cardName">R$ Total Aprovado</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="checkmark-outline"></ion-icon>
                </div>
            </div>
            <div class="carde">
                <div>
                    <div class="numbersComprasTotal">
                        <?php foreach ($stmtValorTotalAutorizado as $item) {
                            echo $item['real_total_autorizado'];
                        } ?></div>
                    <div class="cardName">R$ Total Autorizado</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="checkmark-done-outline"></ion-icon>
                </div>
            </div>
            <div class="carde">
                <div>
                    <div class="numbers">
                        <?php foreach ($stmtAutorizado as $item) {
                            echo $item['totalAutorizado'];
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
                        <?php foreach ($stmt as $item) { ?>
                            <tr id="tBody">
                                <td><?php echo $item['DESCRICAO'] ?></td>
                                <td><?php echo $item['QUANTIDADE'] ?></td>
                                <td class="itemTableValorUnitario"><?php echo $item['REAL_UNITARIO'] ?></td>
                                <td class="itemTableValorReal"><?php echo $item['REAL_TOTAL'] ?></td>
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
    <script type="text/javascript" src="../../js/eng/jquery.maskMoney.js"></script>
    <script type="text/javascript" src="../../js/eng/home.js"></script>
    <script type="text/javascript" src="../../js/eng/jquery.maskMoney.js"></script>
    <script type="text/javascript" src="../../js/datatable/datatable.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>