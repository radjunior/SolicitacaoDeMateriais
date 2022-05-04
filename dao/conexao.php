<?php
define('DB_HOST_LOCAL', "localhost\SQLEXPRESS");
define('DB_USER_LOCAL', "sa");
define('DB_PASS_LOCAL', "Coruripe10");
define('DB_NAME_LOCAL', "USCO");
define('DB_DRIVER_LOCAL', "sqlsrv");

class ConexaoLocal
{
    private function __construct()
    {
    }
    public static function getConnection()
    {
        $pdoConfig = DB_DRIVER_LOCAL . ":" . "Server=" . DB_HOST_LOCAL . ";";
        $pdoConfig .= "Database=" . DB_NAME_LOCAL . ";";
        try {
            if (!isset($connection)) {
                $connection = new PDO($pdoConfig, DB_USER_LOCAL, DB_PASS_LOCAL);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $connection;
        } catch (PDOException $e) {
            $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
            $mensagem .= "\nErro: " . $e->getMessage() . "\n";
            throw new Exception($mensagem);
        }
    }
}
