<?php
require_once "../../dao/app/conexao.php";
require_once "../../dao/app/session.php";
require_once "../../dao/app/operacoes.php";

$stmtMateriaisGeral = MaterialDAO::getMateriaisGeral();
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
    <link rel="stylesheet" type="text/css" href="../../scripts/datatables/datatables.css">
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
            <div class="cardeRealTotal">
                <div class="cardeTop">
                    <h2>Valor Total</h2>
                    <input type="text" id="iptSomaRealTotal" readonly>
                    <div class="iconBx">
                        <ion-icon name="bag-add-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="cardeAprovar">
                <div class="cardeTop">
                    <h2>Aprovar</h2>
                    <input type="text" id="iptCountAprovar" readonly>
                    <div class="iconBx">
                        <ion-icon name="sync-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="cardeAprovado">
                <div class="cardeL">
                    <h2>Aprovado</h2>
                    <input type="text" id="iptCountAprovado" readonly>
                    <div class="iconBx">
                        <ion-icon name="checkmark-outline"></ion-icon>
                    </div>
                </div>
                <div class="cardeR">
                    <h2>Reprovado</h2>
                    <input type="text" id="iptCountReprovado" readonly>
                    <div class="iconBx">
                        <ion-icon name="close-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="cardeAutorizado">
                <div class="cardeL">
                    <h2>Autorizado</h2>
                    <input type="text" id="iptCountAutorizado" readonly>
                    <div class="iconBx">
                        <ion-icon name="checkmark-circle-outline"></ion-icon>
                    </div>
                </div>
                <div class="cardeR">
                    <h2>Desautorizado</h2>
                    <input type="text" id="iptCountDesautorizado" readonly>
                    <div class="iconBx">
                        <ion-icon name="close-circle-outline"></ion-icon>
                    </div>
                </div>
            </div>
        </div>
        <div class="cardFiltros">
            <div class="cptFiltros">
                <div>
                    <select name="cptEquipe" id="cptEquipe">
                        <option value="">Equipe</option>
                        <option value="MURILO">Murilo</option>
                        <option value="DAVES">Daves</option>
                        <option value="GEDEON">Gedeon</option>
                        <option value="JEFFERSON">Jefferon</option>
                        <option value="OSCAR">Oscar</option>
                        <option value="RODRIGO">Rodrigo</option>
                        <option value="AGMAR">Agmar</option>
                        <option value="MESSIAS">Messias</option>
                        <option value="RODOLFO">Rodolfo</option>
                        <option value="REISSON">Reisson</option>
                        <option value="FLAVIO">Flavio</option>
                        <option value="MARCOS">Marcos</option>
                        <option value="JOSELAN">Joselan</option>
                    </select>
                </div>
                <div>
                    <select name="cptPeriodo" id="cptPeriodo">
                        <option value="">Período</option>
                        <option value="safra">Safra</option>
                        <option value="entre_safra">E-Safra</option>
                    </select>
                </div>
                <div>
                    <select name="cptSolicitante" id="cptSolicitante">
                        <option value="">Solicitante</option>
                        <option value="jvstomaz">jvstomaz</option>
                        <option value="ctsilva">ctsilva</option>
                        <option value="vgsouza">vgsouza</option>
                        <option value="bscastro">bscastro</option>
                        <option value="marsantos">marsantos</option>
                    </select>
                </div>
                <div>
                    <select name="cptStatus" id="cptStatus">
                        <option value="">Status</option>
                        <option value="APROVAR">Aprovar</option>
                        <option value="APROVADO">Aprovado</option>
                        <option value="REPROVADO">Reprovado</option>
                        <option value="AUTORIZADO">Autorizado</option>
                        <option value="NAO_AUTORIZADO">Desautorizado</option>
                    </select>
                </div>
                <div>
                    <select name="cptPriord" id="cptPriord">
                        <option value="">Prioridade</option>
                        <option value="0">[0] Baixa</option>
                        <option value="1">[1] Média</option>
                        <option value="2">[2] Alta</option>
                    </select>
                </div>
                <div>
                    <input type="month" id="iptFiltroMes">
                </div>
            </div>
        </div>
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Solicitações</h2>
                </div>
                <div class="tabelaAbsolute">
                    <table id="TabelaHome" class="table table-hover">
                        <thead>
                            <tr>
                                <td scope="col">Código</td>
                                <td scope="col">Período</td>
                                <td scope="col">Descrição</td>
                                <td scope="col">Qtde</td>
                                <td scope="col">Valor Unit.</td>
                                <td scope="col">Valor Total</td>
                                <td scope="col">Solicitante</td>
                                <td scope="col">Aplicação</td>
                                <td scope="col">Mês Aprovação</td>
                                <td scope="col">Status</td>
                                <td scope="col">Fornecedor</td>
                                <td scope="col">Proposta</td>
                                <td scope="col">Prioridade</td>
                                <td scope="col">Equipe</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($stmtMateriaisGeral as $item) { ?>
                                <tr>
                                    <td><?php echo $item['CODIGO'] ?></td>
                                    <td><?php echo $item['PERIODO'] ?></td>
                                    <td><?php echo $item['DESCRICAO'] ?></td>
                                    <td><?php echo $item['QUANTIDADE'] ?></td>
                                    <td><?php echo $item['REAL_UNITARIO'] ?></td>
                                    <td><?php echo $item['REAL_TOTAL'] ?></td>
                                    <td><?php echo $item['SOLICITANTE'] ?></td>
                                    <td><?php echo $item['APLICACAO'] ?></td>
                                    <td><?php echo $item['MES_APROVACAO'] ?></td>
                                    <td><?php echo $item['STATUS_SOLIC'] ?></td>
                                    <td><?php echo $item['FORNECEDOR'] ?></td>
                                    <td><?php echo $item['PROPOSTA'] ?></td>
                                    <td><?php echo $item['PRIORIDADE'] ?></td>
                                    <td><?php echo $item['EQUIPE'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
<script type="text/javascript" src="../../scripts/datatables/datatables.js"></script>
<script type="text/javascript" src="../../js/vendor/jquery/jquery.mask.js"></script>
<script type="text/javascript" src="../../js/js.bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="../../js/vendor/numeral/numeral.min.js"></script>
<script type="text/javascript" src="../../js/eng/home.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</html>