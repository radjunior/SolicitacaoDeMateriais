<?php
require_once('./conexao.php');

$cod = $_POST['materialId'] ?? NULL;
$data = $_POST['dataHoje'] ?? NULL;
$status = 'AUTORIZADO';
echo $data;

if ($cod != NULL && $data != null) {
    try {
        $conn = ConexaoLocal::getConnection();
        $query = "UPDATE MATERIAIS_SOLICITADOS SET STATUS = '$status', DATA_AUTORIZACAO = '$data' WHERE ID = '$cod'";
        $stmt = $conn->query($query);
        header("Location: ../pgs/ger/home.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro: <br>", $e;
    }
}
