<?php
require_once "../app/conexao.php";

$cod = $_POST['materialId'] ?? NULL;
$data = $_POST['dataAtual'] ?? NULL;
$status = 'AUTORIZADO';

if ($cod != NULL && $data != null) {
    try {
        $conn = ConexaoLocal::getConnection();
        $query = "UPDATE MATERIAIS_SOLICITADOS SET STATUS_SOLIC = '$status', DATA_AUTORIZACAO = '$data' WHERE ID = '$cod'";
        $stmt = $conn->query($query);
        header("Location: ../../pgs/ger/home.php");
        exit;
    } catch (PDOException $e) {
        echo "Erro: <br>", $e;
    }
}
