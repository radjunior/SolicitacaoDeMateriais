<?php
session_start();

if (empty($_SESSION['arrSolicitacoes'])) 
{
    $_SESSION['arrSolicitacoes'] = [];
    $_SESSION['contador_id'] = 0;
}

if (isset($_GET['logout']) && $_GET['logout'] == 1) 
{
    $_SESSION = array();
    session_destroy();
    header('Location: ../../../index.php');
}

if (isset($_GET['enviarformulario']) && $_GET['enviarformulario'] == "true") 
{
    header('Location: ../../controller/SolicitacaoMateriaisController.php?enviarSolicitacaoMateriaisRepository=true');
}

