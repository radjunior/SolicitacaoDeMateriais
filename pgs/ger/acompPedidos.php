<?php require_once "../base-top.php"; ?>
    <link rel="stylesheet" type="text/css" href="../../css/ger/acompPedidos.css">
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

    <?php require_once "../base-bot.php"; ?>