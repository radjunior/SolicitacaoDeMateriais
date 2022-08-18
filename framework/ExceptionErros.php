<?php
Class ExceptionErros
{
    public static function gerarLog($dir ,$msgErro): void 
    {
        $agora = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
        $dataHoraAtual = $agora->format('d/m/Y H:i');

        $dir = str_replace('C:\xampp\htdocs\SolicitacaoDeMateriais', "", $dir);
        $erro = $dataHoraAtual . " - " . $dir . ' - '. $msgErro;
        
        $fs = fopen('C:/xampp/logs/log_apache.txt', 'a');
        fwrite($fs, $erro.PHP_EOL);
        fclose($fs);
        header('Location: ../../framework/pagErro.php');
    }
}