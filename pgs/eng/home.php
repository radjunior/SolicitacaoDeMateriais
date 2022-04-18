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

$queryTotal = "SELECT SUM(real_total) AS totalValorTotal FROM MATERIAIS_SOLICITADOS";
$stmtValorTotal = $conn->query($queryTotal);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automação</title>
    <link rel="shortcut icon" href="../../images/favicon-original.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
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
        <!-- cards -->
        <div class="cardBox">
            <div class="carde">
                <div>
                    <div class="numbers">R$
                        <?php foreach ($stmtValorTotal as $item) {
                            echo $item['totalValorTotal'];
                        } ?></div>
                    <div class="cardName">Compras</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="cart-outline"></ion-icon>
                </div>
            </div>
            <div class="carde">
                <div>
                    <div class="numbers">
                        <?php foreach ($stmtAprovar as $item) {
                            echo $item['totalAprovar'];
                        } ?></div>
                    <div class="cardName">Aprovar</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="reload-outline"></ion-icon>
                </div>
            </div>
            <div class="carde">
                <div>
                    <div class="numbers">
                        <?php foreach ($stmtAprovado as $item) {
                            echo $item['totalAprovado'];
                        } ?></div>
                    <div class="cardName">Aprovado</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="thumbs-up-outline"></ion-icon>
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
                    <a href="#" class="btn">Ver Todos</a>
                </div>
                <table id="TabelaHome" class="tabelaPrincipal">
                    <thead>
                        <tr>
                            <td scope="col">Descrição</td>
                            <td scope="col">Qthe</td>
                            <td scope="col">Valor Unit.</td>
                            <td scope="col">Valor Total</td>
                            <td scope="col">Solicitante</td>
                            <td scope="col">Status</td>
                        </tr>
                    </thead>
                    <tbody id="tBody">
                        <?php foreach ($stmt as $item) { ?>
                            <tr>
                                <td><?php echo $item['DESCRICAO'] ?></td>
                                <td><?php echo $item['QUANTIDADE'] ?></td>
                                <td><?php echo $item['REAL_UNITARIO'] ?></td>
                                <td><?php echo $item['REAL_TOTAL'] ?></td>
                                <td><?php echo $item['SOLICITANTE'] ?></td>
                                <td><?php echo $item['STATUS_SOLIC'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../../js/google.api/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/google.api/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../../js/eng/home.js"></script>
    <script type="text/javascript" src="../../js/datatable/datatable.js"></script>
    <script type="text/javascript" src="../../js/datatable/jquery-3-5-1.js"></script>
    <script type="text/javascript" src="../../js/datatable/jquery.dataTables.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>