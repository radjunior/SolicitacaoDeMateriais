<?php
require_once "../conexao.php";

$cod = $_POST['codigo'] ?? NULL;
$data = $_POST['data'] ?? NULL;
$status = 'NAO_AUTORIZADO';
echo $cod."\n".$data;
if ($cod != NULL && $data != null) {
    try {
        $conn = ConexaoLocal::getConnection();
        $query = "UPDATE MATERIAIS_SOLICITADOS SET STATUS_SOLIC = '$status', DATA_AUTORIZACAO = '$data' WHERE ID = '$cod'";
        $stmt = $conn->query($query);
        exit;
    } catch (PDOException $e) {
        echo "Erro: <br>", $e;
    }
}
