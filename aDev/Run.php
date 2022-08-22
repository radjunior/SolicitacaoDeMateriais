<?php
# file:///C:/xampp/htdocs/Temp/solicitacao-materiais/anexos/
# http://localhost:8000/Temp/solicitacao-materiais/anexos/
$path = 'C:/xampp/htdocs/Temp/solicitacao-materiais/anexos/62fd218860728.pdf';

$file = str_replace('file:///C:/xampp/htdocs', 'http://localhost:8000', $path);

$file = file_get_contents($pdf);
var_dump($file);


exit();
Class Teste {
    public string $nome;
    public int $idade;

    public function __construct(array $arr)
    {
        $this->nome = $arr['nome'];
        $this->idade = $arr['idade'];

    }
}

$obj1 = new Teste(['nome' => 'Junior', 'idade' => 22]);
$obj2 = new Teste(['nome' => 'Rafa', 'idade' => 21]);
$obj3 = new Teste(['nome' => 'Sophie', 'idade' => 6]);

$arr = [];

array_push($arr, $obj1);
array_push($arr, $obj2);
array_push($arr, $obj3);

#var_dump($arr);

foreach ($arr as $key => $val) {
    echo $val->nome . PHP_EOL;
}
