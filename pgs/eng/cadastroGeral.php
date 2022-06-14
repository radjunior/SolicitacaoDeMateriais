<?php
require_once "../../dao/app/conexao.php";
require_once "../../dao/app/session.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../images/favicon-original.ico" type="image/x-icon">
    <title>Cadastros Gerais</title>
    <link rel="stylesheet" type="text/css" href="../../css/cadastroGeral.css">
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
                <h2>Cadastro Geral</h2>
            </div>
            <!-- userImg -->
            <div class="user">
                <img src="../../images/user.jpg">
            </div>
        </div>
        <div class="containerCards">
            <div class="containerUsuario">
                <form action="" method="post">
                    <div class="cardUsuario">
                        <div class="topUsuario">
                            <h2>Cadastro de Usuário</h2>
                            <button type="button" href="#">
                                <ion-icon name="search-circle-outline"></ion-icon>
                            </button>
                        </div>
                        <div class="bodyUsuario">
                            <div>
                                <label for="nomeUsuario">Nome Completo</label>
                                <input type="text" id="nomeUsuario">
                            </div>
                            <div>
                                <label for="apelidoUsuario">Apelido</label>
                                <input type="text" id="apelidoUsuario">
                            </div>
                            <div>
                                <label for="loginUsuario">Login</label>
                                <input type="text" id="loginUsuario">
                            </div>
                            <div>
                                <label for="senhaUsuario">Senha</label>
                                <input type="password" id="senhaUsuario">
                            </div>
                            <div>
                                <label for="senhaUsuario2">Confirme a Senha</label>
                                <input type="password" id="senhaUsuario2">
                            </div>
                        </div>
                        <div class="rodapeUsuario">
                            <div>
                                <label for="nivelAcesso">Nível de Acesso</label>
                                <input type="range" id="nivelAcesso" min="1" max="3" title="1 a 3: Solicitante, Aprovador, Autorizador">
                            </div>
                            <div class="btnUsuario">
                                <button type="submit">Salvar</button>
                                <button type="reset">Limpar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="containerMaterial">
                <form action="" method="post">
                    <div class="topMaterial">
                        <h2>Cadastro de Materiais</h2>
                        <button type="button" href="#">
                            <ion-icon name="search-circle-outline"></ion-icon>
                        </button>
                    </div>
                    <div class="bodyMaterial">
                        <div>
                            <label for="codMaterial">Código</label>
                            <input type="number" id="codMaterial" maxlength="8">
                        </div>
                        <div>
                            <label for="descricaoMaterial">Descrição</label>
                            <input type="text" id="descricaoMaterial" maxlength="255">
                        </div>
                        <div>
                            <label for="tipoMaterial">Tipo</label>
                            <input type="text" id="tipoMaterial" maxlength="10">
                        </div>
                        <div>
                            <label for="unidadeMaterial">Unidade</label>
                            <input type="text" id="unidadeMaterial" maxlength="10">
                        </div>
                        <div>
                            <label for="grupoMaterial">Grupo</label>
                            <input type="number" id="grupoMaterial" maxlength="7">
                        </div>
                        <div>
                            <label for="criacaoMaterial">Criação</label>
                            <input type="date" id="criacaoMaterial">
                        </div>
                        <div>
                            <label for="criadorMaterial">Criador</label>
                            <input type="text" id="criadorMaterial" maxlength="255" value="<?php echo $_SESSION['usuarioLogin']; ?>" readonly>
                        </div>
                    </div>
                    <div class="rodapeMaterial">
                        <div class="btnMaterial">
                            <button type="submit">Salvar</button>
                            <button type="reset">Limpar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript" src="../../js/eng/cadastroGeral.js"></script>
</body>

</html>