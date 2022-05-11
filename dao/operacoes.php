<?php
require_once "conexao.php";
class Material
{
    private function __construct()
    {
    }
    public static function getMateriaisAprovar()
    {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT * FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'APROVAR'";
        $stmt = $conn->query($query);
        return $stmt;
        try {
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }
    public static function getMateriaisAprovado()
    {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT * FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'APROVADO'";
        $stmt = $conn->query($query);
        return $stmt;
        try {
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }
    public static function getMateriaisAutorizado()
    {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT * FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'AUTORIZADO'";
        $stmt = $conn->query($query);
        return $stmt;
        try {
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }
    public static function getCountMateriaisAprovar()
    {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT COUNT(STATUS_SOLIC) AS totalAprovar FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'APROVAR'";
        $stmt = $conn->query($query);
        return $stmt;
        try {
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }
    public static function getCountMateriaisAprovado()
    {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT COUNT(STATUS_SOLIC) AS totalaprovado FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'APROVADO'";
        $stmt = $conn->query($query);
        return $stmt;
        try {
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }
    public static function getCountMateriaisAutorizado()
    {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT COUNT(STATUS_SOLIC) AS totalAutorizado FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'AUTORIZADO'";
        $stmt = $conn->query($query);
        return $stmt;
        try {
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }
    public static function getSomaMateriaisAprovar()
    {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT SUM(REAL_TOTAL) AS REAL_TOTAL FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'APROVAR'";
        $stmt = $conn->query($query);
        return $stmt;
        try {
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }
    public static function getSomaMateriaisAprovado()
    {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT SUM(REAL_TOTAL) AS REAL_TOTAL FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'APROVADO'";
        $stmt = $conn->query($query);
        return $stmt;
        try {
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }
    public static function getSomaMateriaisAutorizado()
    {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT SUM(REAL_TOTAL) AS REAL_TOTAL FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'AUTORIZADO'";
        $stmt = $conn->query($query);
        return $stmt;
        try {
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }
}
