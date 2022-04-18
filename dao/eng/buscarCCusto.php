<?php
require_once "../conexao.php";

$codigo = filter_input(INPUT_POST, 'palavra');

$conn = ConexaoLocal::getConnection();
$query = "SELECT TOP(1) * FROM CENTRO_CUSTO WHERE CODIGO LIKE '%$codigo%'";
$stmt = $conn->query($query);

foreach ($stmt as $item) {
    $descricao = $item['DESCRICAO'];
    $responsavel = $item['RESPONSAVEL'];
    $codigoDB = $item['CODIGO'];

    $arr = array(
        'codigo' => $codigoDB,
        'descricao' => $descricao,
        'responsavel' => $responsavel
    );
    echo json_encode($arr);
}
