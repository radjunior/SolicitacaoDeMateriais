<?php
require_once "../conexao.php";

$cod = $_POST['codigo'] ?? NULL;
$data = $_POST['data'] ?? NULL;
$status = 'REPROVADO';
//echo $cod." / ".$data;
if ($cod != NULL && $data != null) {
    try {
        $conn = ConexaoLocal::getConnection();
        $query = "UPDATE MATERIAIS_SOLICITADOS SET STATUS_SOLIC = '$status', DATA_APROVACAO = '$data' WHERE ID = '$cod'";
        $stmt = $conn->query($query);
        echo 'true';
        exit;
    } catch (PDOException $e) {
        echo "Erro: <br>", $e;
    }
}
