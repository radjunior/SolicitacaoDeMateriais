<?php
require_once "conexao.php";
class MaterialDAO
{
    private function __construct()
    {
    }
    public static function getMateriaisGeral()
    {
        try {
            $conn = ConexaoLocal::getConnection();
            $query = "SELECT * FROM MATERIAIS_SOLICITADOS";
            $stmt = $conn->query($query);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }

    public static function getMateriaisAprovar()
    {
        try {
            $conn = ConexaoLocal::getConnection();
            $query = "SELECT * FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'APROVAR'";
            $stmt = $conn->query($query);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }

    public static function getMateriaisAprovado()
    {
        try {
            $conn = ConexaoLocal::getConnection();
            $query = "SELECT * FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'APROVADO'";
            $stmt = $conn->query($query);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }

    public static function getMateriaisAutorizado()
    {
        try {
            $conn = ConexaoLocal::getConnection();
            $query = "SELECT * FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'AUTORIZADO'";
            $stmt = $conn->query($query);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }

    public static function getCountMateriaisAprovar()
    {
        try {
            $conn = ConexaoLocal::getConnection();
            $query = "SELECT COUNT(STATUS_SOLIC) AS TOTAL_COUNT FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'APROVAR'";
            $stmt = $conn->query($query);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }

    public static function getCountMateriaisAprovado()
    {
        try {
            $conn = ConexaoLocal::getConnection();
            $query = "SELECT COUNT(STATUS_SOLIC) AS TOTAL_COUNT FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'APROVADO'";
            $stmt = $conn->query($query);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }

    public static function getCountMateriaisAutorizado()
    {
        try {
            $conn = ConexaoLocal::getConnection();
            $query = "SELECT COUNT(STATUS_SOLIC) AS TOTAL_COUNT FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'AUTORIZADO'";
            $stmt = $conn->query($query);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }

    public static function getSomaMateriaisRealTotal()
    {
        try {
            $conn = ConexaoLocal::getConnection();
            $query = "SELECT SUM(REAL_TOTAL) AS REAL_TOTAL FROM MATERIAIS_SOLICITADOS";
            $stmt = $conn->query($query);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }

    public static function getSomaMateriaisAprovar()
    {
        try {
            $conn = ConexaoLocal::getConnection();
            $query = "SELECT SUM(REAL_TOTAL) AS REAL_TOTAL FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'APROVAR'";
            $stmt = $conn->query($query);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }

    public static function getSomaMateriaisAprovado()
    {
        try {
            $conn = ConexaoLocal::getConnection();
            $query = "SELECT SUM(REAL_TOTAL) AS REAL_TOTAL FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'APROVADO'";
            $stmt = $conn->query($query);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }

    public static function getSomaMateriaisAutorizado()
    {
        try {
            $conn = ConexaoLocal::getConnection();
            $query = "SELECT SUM(REAL_TOTAL) AS REAL_TOTAL FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'AUTORIZADO'";
            $stmt = $conn->query($query);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }
}
