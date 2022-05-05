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

$queryTotal = "SELECT SUM(real_total) AS totalValorTotal FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'AUTORIZADO'";
$stmtValorTotal = $conn->query($queryTotal);

$queryTotal = "SELECT SUM(real_total) AS totalValorTotal FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'AUTORIZADO'";
$stmtValorTotal = $conn->query($queryTotal);

$queryTotal = "SELECT SUM(real_total) AS totalValorTotal FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'AUTORIZADO'";
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
    <link rel="stylesheet" type="text/css" href="../../css/acompPedidos.css">
    <script type="text/javascript" src="../../js/echarts/echarts.min.js"></script>
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
                <h2>[Página em Desenvolvimento]</h2>
            </div>
            <!-- userImg -->
            <div class="user">
                <img src="../../images/user.jpg">
            </div>
        </div>
        <div class="graficos">
            <div class="graficoSolic" id="graficoSolic"></div>
            <div class="graficoAreas" id="graficoAreas"></div>
        </div>

    </div>
    <script type="text/javascript">
        var graficoSolic = echarts.init(document.getElementById('graficoSolic'));
        var solicOption = {
            title: {
                text: 'Solicitações p/ano',
                left: "center",
            },
            tooltip: {},
            legend: {
                data: ['Solicitações'],
                bottom: "bottom"
            },
            xAxis: {
                data: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
            },
            yAxis: {},
            series: [{
                name: 'Solicitações',
                type: 'bar',
                data: [5, 20, 36, 10, 10, 20, 5, 20, 30, 10, 10, 20]
            }]
        };
        graficoSolic.setOption(solicOption);

        var graficoAreas = document.getElementById('graficoAreas');
        var graficoAreasDom = echarts.init(graficoAreas);
        var areaOption;

        areaOption = {
            title: {
                text: 'Tempo Gasto / Quantidade',
                left: "center"
            },
            legend: {
                data: ['Tempo', 'Quantidade'],
                bottom: "bottom"
            },
            radar: {
                // shape: 'circle',
                indicator: [{
                        name: 'Engenharia',
                        max: 6500
                    },
                    {
                        name: 'Instrumentação',
                        max: 16000
                    },
                    {
                        name: 'Elétrica',
                        max: 30000
                    },
                    {
                        name: 'Automação',
                        max: 38000
                    },
                    {
                        name: 'Supervisão',
                        max: 52000
                    },
                    {
                        name: 'PCM Planejamento',
                        max: 25000
                    }
                ]
            },
            series: [{
                name: 'Tempo vs Quantidade',
                type: 'radar',
                data: [{
                        value: [4200, 3000, 20000, 35000, 50000, 18000],
                        name: 'Tempo'
                    },
                    {
                        value: [5000, 14000, 28000, 26000, 42000, 21000],
                        name: 'Quantidade'
                    }
                ]
            }]
        };

        areaOption && graficoAreasDom.setOption(areaOption);
    </script>
    <script type="text/javascript" src="../../js/eng/acompPedidos.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>