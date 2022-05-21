<?php
require_once "../conexao.php";

$cod = $_POST['solicitacaoId'] ?? NULL;
$data = $_POST['dataAtual'] ?? NULL;
$qtde = $_POST['materialQuantidade'] ?? NULL;
$status = 'APROVADO';
$qtdeOriginal;

if (str_contains($qtde, ",")) {
    $qtde = str_replace(",", ".", $qtde);
}

if ($cod != NULL && $data != NULL && $qtde != NULL) {
    try {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT * FROM MATERIAIS_SOLICITADOS WHERE ID = '$cod'";
        $stmt = $conn->query($query);
        foreach ($stmt as $item) {
            $qtdeOriginal = $item['QUANTIDADE'];
        }
        if ($qtdeOriginal != $qtde) {
            //echo "<br><br><br>Quantidade alterada";
            $query = "UPDATE MATERIAIS_SOLICITADOS SET STATUS_SOLIC = '$status', DATA_APROVACAO = '$data', QUANTIDADE = '$qtde' WHERE ID = '$cod'";
            $stmt = $conn->query($query);
            header("Location: ../../pgs/crd/home.php");
            exit;
        } else {
            //echo "<br><br><br>Quantidade não alterada";
            $query = "UPDATE MATERIAIS_SOLICITADOS SET STATUS_SOLIC = '$status', DATA_APROVACAO = '$data' WHERE ID = '$cod'";
            $stmt = $conn->query($query);
            header("Location: ../../pgs/crd/home.php");
            exit;
        }
    } catch (PDOException $e) {
        echo "Erro: <br>" . $e;
    }
}
