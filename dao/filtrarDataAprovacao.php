<?php
include_once "./conexao.php";
$mesAprov = $_GET['item'] ?? NULL;
$dados = "";
if($mesAprov != NULL){
    try {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT * FROM MATERIAIS_SOLICITADOS WHERE MES_APROVACAO = '$mesAprov'";
        $stmt = $conn->query($query);
        foreach ($stmt as $item) {
            $dados .=
                "<tr>" .
                    "<td>" . $item['DESCRICAO'] . "</td>" .
                    "<td>" . $item['QUANTIDADE'] . "</td>" .
                    "<td>" . $item['REAL_UNITARIO'] . "</td>" .
                    "<td>" . $item['REAL_TOTAL'] . "</td>" .
                    "<td>" . $item['SOLICITANTE'] . "</td>" .
                    "<td>" . $item['APLICACAO'] . "</td>" .
                    "<td>" . $item['MES_APROVACAO'] . "</td>" .
                    "<td>" . $item['STATUS_SOLIC'] . "</td>" .
                    "<td></td>" .
                "</tr>";
        }
        echo $dados;
    } catch (PDOException $e) {
        echo $e;
    }
} else {
    try {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT * FROM MATERIAIS_SOLICITADOS";
        $stmt = $conn->query($query);
        foreach ($stmt as $item) {
            $dados .=
                "<tr>" .
                    "<td>" . $item['DESCRICAO'] . "</td>" .
                    "<td>" . $item['QUANTIDADE'] . "</td>" .
                    "<td>" . $item['REAL_UNITARIO'] . "</td>" .
                    "<td>" . $item['REAL_TOTAL'] . "</td>" .
                    "<td>" . $item['SOLICITANTE'] . "</td>" .
                    "<td>" . $item['APLICACAO'] . "</td>" .
                    "<td>" . $item['MES_APROVACAO'] . "</td>" .
                    "<td>" . $item['STATUS_SOLIC'] . "</td>" .
                    "<td></td>" .
                "</tr>";
        }
        echo $dados;
    } catch (PDOException $e) {
        echo $e;
    }
}

