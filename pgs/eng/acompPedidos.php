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
                    <a href="./solicMaterialCAPEX.php">
                        <span class="icon">
                            <ion-icon name="logo-usd"></ion-icon>
                        </span>
                        <span class="title">CAPEX [Em Breve]</span>
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
                    <a href="./cadastroGeral.php">
                        <span class="icon">
                            <ion-icon name="documents-outline"></ion-icon>
                        </span>
                        <span class="title"><s>Cadastro</s>[Em Breve]</span>
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
        <div class="graficosTop">
            <div class="graficoSolic" id="graficoSolic"></div>
            <div class="graficoAreas" id="graficoAreas"></div>
        </div>
        <div class="graficosBody">
            <div class="graficoStatus" id="graficoStatus"></div>
        </div>

    </div>
    <script type="text/javascript" src="../../js/echarts/echarts.min.js"></script>
    <script type="text/javascript">
        //Gráfico de solicitação de mateirais por ano
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

        //Gráfico de áreas
        var graficoAreas = document.getElementById('graficoAreas');
        var graficoAreasDom = echarts.init(graficoAreas);
        var areaOption;

        const data = [];
        for (let i = 0; i < 5; ++i) {
            data.push(Math.round(Math.random() * 200));
        }
        areaOption = {
            xAxis: {
                max: 'dataMax'
            },
            yAxis: {
                type: 'category',
                data: ['Cleber', 'João', 'Vanders', 'Bruno', 'Marcos'],
                inverse: true,
                animationDuration: 300,
                animationDurationUpdate: 300,
                max: 2 // only the largest 3 bars will be displayed
            },
            series: [{
                realtimeSort: true,
                name: 'Solicitações',
                type: 'bar',
                data: data,
                label: {
                    show: true,
                    position: 'right',
                    valueAnimation: true
                }
            }],
            legend: {
                show: true
            },
            animationDuration: 0,
            animationDurationUpdate: 3000,
            animationEasing: 'linear',
            animationEasingUpdate: 'linear'
        };

        function run() {
            for (var i = 0; i < data.length; ++i) {
                if (Math.random() > 0.9) {
                    data[i] += Math.round(Math.random() * 2000);
                } else {
                    data[i] += Math.round(Math.random() * 200);
                }
            }
            graficoAreasDom.setOption({
                series: [{
                    type: 'bar',
                    data
                }]
            });
        }
        setTimeout(function() {
            run();
        }, 0);
        setInterval(function() {
            run();
        }, 3000);

        areaOption && graficoAreasDom.setOption(areaOption);

        //gráfico de status;
        var graficoStatus = document.getElementById('graficoStatus');
        var myGraficoStatus = echarts.init(graficoStatus);
        var statusOption;
        statusOption = {
            title: {
                text: 'Status das Solicitações',
                subtext: '05/2022',
                left: 'center'
            },
            tooltip: {
                trigger: 'item'
            },
            legend: {
                orient: 'horizontal',
                left: 'center',
                top: 'bottom'
            },
            series: [{
                name: 'Quantidade',
                type: 'pie',
                radius: '50%',
                data: [{
                        value: 1048,
                        name: 'Aprovar'
                    },
                    {
                        value: 735,
                        name: 'Aprovado'
                    },
                    {
                        value: 580,
                        name: 'Autorizado'
                    }
                ],
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        };
        statusOption && myGraficoStatus.setOption(statusOption);
    </script>

    <script type="text/javascript" src="../../js/eng/acompPedidos.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>