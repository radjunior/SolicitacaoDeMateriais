<?php
require_once "../app/conexao.php";

$cod = $_POST['codigo'] ?? NULL;
$data = $_POST['data'] ?? NULL;
$mesAprov = $_POST['mesApr'] ?? NULL;
$qtde = $_POST['qtde'] ?? NULL;

echo "código: ".$cod;


$status = 'APROVAR';
$qtdeOriginal;

if (str_contains($qtde, ",")) {
    $qtde = str_replace(",", ".", $qtde);
}

if ($cod != NULL && $data != NULL && $qtde != NULL && $mesAprov != NULL) {
    try {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT * FROM MATERIAIS_SOLICITADOS WHERE ID = '$cod'";
        $stmt = $conn->query($query);
        foreach ($stmt as $item) {
            $qtdeOriginal = $item['QUANTIDADE'];
        }
        if ($qtdeOriginal != $qtde) {
            //echo "<br><br><br>Quantidade alterada";
            $query = "UPDATE MATERIAIS_SOLICITADOS SET STATUS_SOLIC = '$status', DATA_APROVACAO = '$data', QUANTIDADE = '$qtde', MES_APROVACAO = '$mesAprov' WHERE ID = '$cod'";
            $stmt = $conn->query($query);
            echo "true";
            exit;
        } else {
            //echo "<br><br><br>Quantidade não alterada";
            $query = "UPDATE MATERIAIS_SOLICITADOS SET STATUS_SOLIC = '$status', DATA_APROVACAO = '$data', MES_APROVACAO = '$mesAprov' WHERE ID = '$cod'";
            $stmt = $conn->query($query);
            echo "true";
            exit;
        }
    } catch (PDOException $e) {
        echo "Erro: <br>" . $e;
    }
}
