<?php
require_once "../../repository/app/operacoes.php";
require_once "../../repository/app/conexao.php";
require_once "../../repository/app/session.php";

$engenheiro = "1";
$coordenador = "2";
$gerente = "3";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automação</title>
    <link rel="shortcut icon" href="../../../css/images/favicon-original.ico" type="image/x-icon">
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
            <?php 
            if ($_SESSION['codigoAcesso'] === $engenheiro){
                require_once 'acessos-eng.php';

            } else if ($_SESSION['codigoAcesso'] === $coordenador) {
                require_once 'acessos-crd.php';

            } else if ($_SESSION['codigoAcesso'] === $gerente) {
                require_once 'acessos-ger.php';
            }
            ?>
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