<?php
session_start();

if (empty($_SESSION['arrSolicitacoes'])) {
    $_SESSION['arrSolicitacoes'] = [];
 }

if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    $_SESSION = array();
    session_destroy();
    header('Location: ../../../index.php');
}


