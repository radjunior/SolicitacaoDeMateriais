<?php
require_once "../app/conexao.php";
require_once "../app/session.php";

$usuario = $_POST['user'] ?? NULL;
$senha = $_POST['pass'] ?? NULL;

$apelido;
$loginDB;
$senhaDB;
$situacao;
$acesso;

if ($usuario != NULL && $senha != NULL) {
    try {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT * FROM USUARIOS WHERE login_usuario = '$usuario' AND senha_usuario = '$senha'";
        $stmt = $conn->query($query);
    } catch (PDOException $e) {
        echo "Erro: <br>", $e;
    }

    foreach ($stmt as $item) {
        if ($item['situacao'] == 'ativo') {
            $apelido = $item['apelido_usuario'];
            $loginDB = $item['login_usuario'];
            $senhaDB = $item['senha_usuario'];
            $acesso = $item['nivel_acesso'];
        } else {
            $_SESSION['msgErroUserPass'] = "Usuário Desativado";
            header('Location: ../../index.php');
            exit();
        }
    }

    if ($loginDB == $usuario && $senhaDB == $senha) {
        $_SESSION['nomeUsuario'] = $apelido;
        $_SESSION['usuarioLogin'] = $loginDB;
        $_SESSION['codigoAcesso'] = $acesso;
        if ($acesso == 1 || $acesso == 2 || $acesso == 3) {
            header('Location: ../../view/front/home.php');
            exit();
        } else {
            $_SESSION['msgErroUserPass'] = "Erro no Nível de Acesso";
            header('Location: ../../index.php');
            exit();
        }
    } else {
        $_SESSION['msgErroUserPass'] = "Usuário ou Senha Incorreta";
        header('Location: ../../index.php');
        exit();
    }
} else {
    $_SESSION['msgErroUserPass'] = "Preencha todos os Campos";
    header('Location: ../../index.php');
    exit();
}
