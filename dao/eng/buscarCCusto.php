<?php
require_once "../app/conexao.php";

$codigo = $_GET['itemCodigo'] ?? NULL;
$descricao = $_GET['itemDescricao'] ?? NULL;
$dados = "";
if ($codigo != NULL) {
    try {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT TOP(1) * FROM CENTRO_CUSTO WHERE CODIGO LIKE '$codigo%'";
        $stmt = $conn->query($query);

        foreach ($stmt as $item) {
            $descricao = $item['DESCRICAO'];
            $responsavel = $item['RESPONSAVEL'];
            $codigoDB = $item['CODIGO'];

            $arr = array(
                'codigo' => $codigoDB,
                'descricao' => $descricao,
            );
        }
        echo json_encode($arr);
    } catch (PDOException $th) {
        echo $th;
    }
} else {
    try {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT TOP(20) * FROM CENTRO_CUSTO WHERE DESCRICAO LIKE '$descricao%'";
        $stmt = $conn->query($query);

        foreach ($stmt as $item) {
            $dados .=
                "<tr>" .
                    "<td>" . $item['CODIGO'] . "</td>" .
                    "<td>" . $item['DESCRICAO'] . "</td>" .
                    "<td>" .'<button type="button" onclick="receberCodigoCentroCustoModal(' . $item["CODIGO"] . ')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdlCentroCusto" data-bs-whatever="' . $item["CODIGO"] . '">Selecionar</button>'."</td>".
                "</tr>";
        }
        echo $dados;
    } catch (PDOException $th) {
        echo $th;
    }
}
