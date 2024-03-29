<?php
require_once "./src/repository/session.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Automação CFL</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="scripts/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="scripts/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="scripts/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="scripts/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="css/images/img-01.png" alt="IMG">
                </div>

                <form method="POST" action="./src/repository/idx/autenticacao.php" class="login100-form validate-form">
                    <span class="login100-form-title">
                        Solicitação de Materiais
                    </span>
                    <span class="msg-erro">
                        <?php
                        if (isset($_SESSION['msgErroUserPass'])) {
                            echo $_SESSION['msgErroUserPass'];
                            unset($_SESSION['msgErroUserPass']);
                        }
                        ?>
                    </span>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="user" placeholder="Usuário">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Senha">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">Login</button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">Esqueceu</span>
                        <a class="txt2" href="#">Usuário / Senha ?</a>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="#">Solicite seu login
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="scripts/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="scripts/vendor/bootstrap/js/popper.js"></script>
    <script src="scripts/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="scripts/vendor/select2/select2.min.js"></script>
    <script src="scripts/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
</body>

</html>