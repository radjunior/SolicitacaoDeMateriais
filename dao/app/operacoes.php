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
            foreach ($stmt as $item) {
                if ($item['TOTAL_COUNT'] != NULL) {
                    $stmtCountAprovar = $item['TOTAL_COUNT'];
                } else {
                    $stmtCountAprovar = "0";
                }
            }
            return $stmtCountAprovar;
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
            foreach ($stmt as $item) {
                if ($item['TOTAL_COUNT'] != NULL) {
                    $stmtCountAprovado = $item['TOTAL_COUNT'];
                } else {
                    $stmtCountAprovado = "0";
                }
            }
            return $stmtCountAprovado;
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
            foreach ($stmt as $item) {
                if ($item['TOTAL_COUNT'] != NULL) {
                    $stmtCountAutorizado = $item['TOTAL_COUNT'];
                } else {
                    $stmtCountAutorizado = "0";
                }
            }
            return $stmtCountAutorizado;
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
            foreach ($stmt as $item) {
                if ($item['REAL_TOTAL'] == NULL) {
                    $somaRealTotal = "0.00";
                } else {
                    $somaRealTotal = $item['REAL_TOTAL'];
                }
            }
            return $somaRealTotal;
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
            foreach ($stmt as $item) {
                if ($item['REAL_TOTAL'] == NULL) {
                    $stmtSomaRealTotalAprovar = "0.00";
                } else {
                    $stmtSomaRealTotalAprovar = $item['REAL_TOTAL'];
                }
            }
            return $stmtSomaRealTotalAprovar;
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
            foreach ($stmt as $item) {
                if ($item['REAL_TOTAL'] == NULL) {
                    $stmtSomaRealTotalAprovado = "0.00";
                } else {
                    $stmtSomaRealTotalAprovado = $item['REAL_TOTAL'];
                }
            }
            return $stmtSomaRealTotalAprovado;
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
            foreach ($stmt as $item) {
                if ($item['REAL_TOTAL'] == NULL) {
                    $stmtSomaRealTotalAutorizado = "0.00";
                } else {
                    $stmtSomaRealTotalAutorizado = $item['REAL_TOTAL'];
                }
            }
            return $stmtSomaRealTotalAutorizado;
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }
}
