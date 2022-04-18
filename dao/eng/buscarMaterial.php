<?php
require_once "../conexao.php";

$codigo = filter_input(INPUT_POST, 'palavra');


$conn = ConexaoLocal::getConnection();
$query = "SELECT TOP(1) * FROM MATERIAIS WHERE CODIGO LIKE '$codigo%'";
$stmt = $conn->query($query);

foreach ($stmt as $item) {
    $material = $item['MATERIAL'];
    $unidade = $item['UNIDADE'];
    $codigoDB = $item['CODIGO'];

    $materiais = array(
        'codigo' => $codigoDB,
        'material' => $material,
        'unidade' => $unidade
    );
    echo json_encode($materiais);
}
