<?php require_once "../base-top.php"; ?>
<link rel="stylesheet" type="text/css" href="../../css/eng/cadastroGeral.css">
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
                <div class="topUsuario">
                    <h2>Cadastro de Usuário</h2>
                    <button type="button" href="#">
                        <ion-icon name="search-circle-outline"></ion-icon>
                    </button>
                </div>
                <div class="bodyUsuario">
                    <div>
                        <input type="text" placeholder="Nome Completo" name="nomeUsuario">
                    </div>
                    <div>
                        <input type="text" placeholder="Apelido" name="apelidoUsuario">
                    </div>
                    <div>
                        <input type="text" placeholder="Login" name="loginUsuario">
                    </div>
                    <div>
                        <input type="password" placeholder="Senha" name="senhaUsuario" id="senhaUsuario">
                    </div>
                    <div>
                        <input type="password" placeholder="Confirmar Senha" name="senhaUsuario2" id="senhaUsuario2">
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

            </form>
        </div>
        <div class="containerRequisicao">
            <div>
                <input type="number" placeholder="Requisição" id="requisicao" name="requisicao">
            </div>
            <div>
                <input type="number" placeholder="Item da Requisição" id="itemRequisicao" name="itemRequisicao">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../../js/eng/cadastroGeral.js"></script>

<?php require_once "../base-bot.php"; ?>