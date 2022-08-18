<?php require_once "../resources/base-top.php"; ?>

    <link rel="stylesheet" type="text/css" href="../../../css/acompPedidos.css">
    <!-- main -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
            <!-- search -->
            <div class="titleTopBar">
                <h2>Acompanhamento</h2>
            </div>
            <!-- userImg -->
            <div class="user">
                <img src="../../../css/images/user.jpg">
            </div>
        </div>
        <div class="graficosTop">
            <div class="grfSolicitacao">
                <h2>Solicitações em 2022</h2>
                <div class="graficoSolic" id="graficoSolic" style="width: 633px; height: 400px;"></div>
            </div>
            <div class="grfSttUser">
                <h2>Status - Usuários</h2>
                <div class="graficoAreas" id="graficoAreas"></div>
            </div>
        </div>
        <div class="graficosBody">
            <div class="graficoStatus" id="graficoStatus"></div>
        </div>
    </div>
    <script type="text/javascript" src="../../js/echarts/echarts.min.js"></script>
    <script type="text/javascript" src="../../scripts/datatables/jQuery-3.6.0/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../../js/eng/acompPedidos.js"></script>
    
    <?php require_once "../resources/base-bot.php"; ?>