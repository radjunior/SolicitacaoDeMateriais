<?php
require_once "../conexao.php";

$codigo = $_GET['itemCodigo'] ?? NULL;
$txtMaterial = $_GET['itemMaterial'] ?? NULL;
$dados = "";

if ($txtMaterial != null) {
    try {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT TOP(10) * FROM MATERIAIS WHERE MATERIAL LIKE '$txtMaterial%'";
        $stmt = $conn->query($query);
        foreach ($stmt as $item) {
            $dados .=
                "<tr>" .
                "<td>" . $item['MATERIAL'] . "</td>" .
                "<td>" . $item['TIPO'] . "</td>" .
                "<td>" . $item['UNIDADE'] . "</td>" .
                "</tr>";
        }
        echo $dados;
    } catch (PDOException $pdoex) {
        echo $pdoex;
    }
} else {
    try {
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
    } catch (PDOException $pdoex) {
        echo $pdoex;
    }
}
