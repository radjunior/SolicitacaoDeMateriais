<?php
require_once "../../dao/app/operacoes.php";
require_once "../../dao/app/conexao.php";
require_once "../../dao/app/session.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automação</title>
    <link rel="shortcut icon" href="../../images/favicon-original.ico" type="image/x-icon">
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
                <a href="./solicMaterialCAPEX.php">
                    <span class="icon">
                        <ion-icon name="logo-usd"></ion-icon>
                    </span>
                    <span class="title">CAPEX</span>
                </a>
            </li>
            <li>
                <a href="./solicManutExterna.php">
                    <span class="icon">
                        <ion-icon name="cog-outline"></ion-icon>
                    </span>
                    <span class="title">Solitar Manutenção</span>
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
<!-- FIM DA PÁGINA DEFAULT -->