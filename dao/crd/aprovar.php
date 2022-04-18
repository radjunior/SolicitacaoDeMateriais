<?php
require_once "../conexao.php";

$cod = $_POST['materialId'] ?? NULL;
$data = $_POST['dataHoje'] ?? NULL;
$status = 'APROVADO';

if ($cod != NULL && $data != null) {
    try {
        $conn = ConexaoLocal::getConnection();
        $query = "UPDATE MATERIAIS_SOLICITADOS SET STATUS_SOLIC = '$status', DATA_APROVACAO = '$data' WHERE ID = '$cod'";
        $stmt = $conn->query($query);
        header("Location: ../../pgs/crd/home.php");
        exit;
    } catch (PDOException $e) {
        echo "Erro: <br>", $e;
    }
}
