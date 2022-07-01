<?php
require_once "../app/conexao.php";

$jan = 0;
$fev = 0;
$mar = 0;
$abr = 0;
$mai = 0;
$jun = 0;
$jul = 0;
$ago = 0;
$set = 0;
$out = 0;
$nov = 0;
$dez = 0;

$param1 = $_GET['opcao_1'] ?? NULL;
$param2 = $_GET['opcao_2'] ?? NULL;
$param3 = $_GET['opcao_3'] ?? NULL;

if ($param1 == 'solicitacao_mes') {
    try {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT * FROM MATERIAIS_SOLICITADOS";
        $stmt = $conn->query($query);

        foreach ($stmt as $item) {
            if ($item['MES_APROVACAO'] == '2022-01') {
                $jan++;
            }
            if ($item['MES_APROVACAO'] == '2022-02') {
                $fev++;
            }
            if ($item['MES_APROVACAO'] == '2022-03') {
                $mar++;
            }
            if ($item['MES_APROVACAO'] == '2022-04') {
                $abr++;
            }
            if ($item['MES_APROVACAO'] == '2022-05') {
                $mai++;
            }
            if ($item['MES_APROVACAO'] == '2022-06') {
                $jun++;
            }
            if ($item['MES_APROVACAO'] == '2022-07') {
                $jul++;
            }
            if ($item['MES_APROVACAO'] == '2022-08') {
                $ago++;
            }
            if ($item['MES_APROVACAO'] == '2022-09') {
                $set++;
            }
            if ($item['MES_APROVACAO'] == '2022-10') {
                $out++;
            }
            if ($item['MES_APROVACAO'] == '2022-11') {
                $nov++;
            }
            if ($item['MES_APROVACAO'] == '2022-12') {
                $dez++;
            }
            $arr = array(
                'janeiro' => $jan,
                'fevereiro' => $fev,
                'marco' => $mar,
                'abril' => $abr,
                'maio' => $mai,
                'junho' => $jun,
                'julho' => $jul,
                'agosto' => $ago,
                'setembro' => $set,
                'outubro' => $out,
                'novembro' => $nov,
                'dezembro' => $dez
            );
        }
        echo json_encode($arr);
    } catch (PDOException $th) {
        echo $th;
    }
}
if ($param2 == 'usuario_status') {
    $user1_contAprovar = 0;
    $user1_contAprovado = 0;
    $user1_contReprovado = 0;
    $user1_contAutorizado = 0;
    $user1_contDesautorizado = 0;

    $user2_contAprovar = 0;
    $user2_contAprovado = 0;
    $user2_contReprovado = 0;
    $user2_contAutorizado = 0;
    $user2_contDesautorizado = 0;

    $user3_contAprovar = 0;
    $user3_contAprovado = 0;
    $user3_contReprovado = 0;
    $user3_contAutorizado = 0;
    $user3_contDesautorizado = 0;

    $user4_contAprovar = 0;
    $user4_contAprovado = 0;
    $user4_contReprovado = 0;
    $user4_contAutorizado = 0;
    $user4_contDesautorizado = 0;

    $user5_contAprovar = 0;
    $user5_contAprovado = 0;
    $user5_contReprovado = 0;
    $user5_contAutorizado = 0;
    $user5_contDesautorizado = 0;
    try {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT * FROM MATERIAIS_SOLICITADOS";
        $stmt = $conn->query($query);

        foreach ($stmt as $item) {
            if ($item['SOLICITANTE'] == 'jvstomaz') {
                if ($item['STATUS_SOLIC'] == 'APROVAR') {
                    $user1_contAprovar++;
                }
                if ($item['STATUS_SOLIC'] == 'APROVADO') {
                    $user1_contAprovado++;
                }
                if ($item['STATUS_SOLIC'] == 'REPROVADO') {
                    $user1_contReprovado++;
                }
                if ($item['STATUS_SOLIC'] == 'AUTORIZADO') {
                    $user1_contAutorizado++;
                }
                if ($item['STATUS_SOLIC'] == 'NAO_AUTORIZADO') {
                    $user1_contDesautorizado++;
                }
            }
            if ($item['SOLICITANTE'] == 'bscastro') {
                if ($item['STATUS_SOLIC'] == 'APROVAR') {
                    $user2_contAprovar++;
                }
                if ($item['STATUS_SOLIC'] == 'APROVADO') {
                    $user2_contAprovado++;
                }
                if ($item['STATUS_SOLIC'] == 'REPROVADO') {
                    $user2_contReprovado++;
                }
                if ($item['STATUS_SOLIC'] == 'AUTORIZADO') {
                    $user2_contAutorizado++;
                }
                if ($item['STATUS_SOLIC'] == 'NAO_AUTORIZADO') {
                    $user2_contDesautorizado++;
                }
            }
            if ($item['SOLICITANTE'] == 'vgsouza') {
                if ($item['STATUS_SOLIC'] == 'APROVAR') {
                    $user3_contAprovar++;
                }
                if ($item['STATUS_SOLIC'] == 'APROVADO') {
                    $user3_contAprovado++;
                }
                if ($item['STATUS_SOLIC'] == 'REPROVADO') {
                    $user3_contReprovado++;
                }
                if ($item['STATUS_SOLIC'] == 'AUTORIZADO') {
                    $user3_contAutorizado++;
                }
                if ($item['STATUS_SOLIC'] == 'NAO_AUTORIZADO') {
                    $user3_contDesautorizado++;
                }
            }
            if ($item['SOLICITANTE'] == 'ctsilva') {
                if ($item['STATUS_SOLIC'] == 'APROVAR') {
                    $user4_contAprovar++;
                }
                if ($item['STATUS_SOLIC'] == 'APROVADO') {
                    $user4_contAprovado++;
                }
                if ($item['STATUS_SOLIC'] == 'REPROVADO') {
                    $user4_contReprovado++;
                }
                if ($item['STATUS_SOLIC'] == 'AUTORIZADO') {
                    $user4_contAutorizado++;
                }
                if ($item['STATUS_SOLIC'] == 'NAO_AUTORIZADO') {
                    $user4_contDesautorizado++;
                }
            }
            if ($item['SOLICITANTE'] == 'marsantos') {
                if ($item['STATUS_SOLIC'] == 'APROVAR') {
                    $user5_contAprovar++;
                }
                if ($item['STATUS_SOLIC'] == 'APROVADO') {
                    $user5_contAprovado++;
                }
                if ($item['STATUS_SOLIC'] == 'REPROVADO') {
                    $user5_contReprovado++;
                }
                if ($item['STATUS_SOLIC'] == 'AUTORIZADO') {
                    $user5_contAutorizado++;
                }
                if ($item['STATUS_SOLIC'] == 'NAO_AUTORIZADO') {
                    $user5_contDesautorizado++;
                }
            }
            $arr = array(
                'jvstomaz' => array(
                    'aprovar' => $user1_contAprovar,
                    'aprovado' => $user1_contAprovado,
                    'reprovado' => $user1_contReprovado,
                    'autorizado' => $user1_contAutorizado,
                    'desautorizado' => $user1_contDesautorizado
                ),
                'bscastro' => array(
                    'aprovar' => $user2_contAprovar,
                    'aprovado' => $user2_contAprovado,
                    'reprovado' => $user2_contReprovado,
                    'autorizado' => $user2_contAutorizado,
                    'desautorizado' => $user2_contDesautorizado
                ),
                'vgsouza' => array(
                    'aprovar' => $user3_contAprovar,
                    'aprovado' => $user3_contAprovado,
                    'reprovado' => $user3_contReprovado,
                    'autorizado' => $user3_contAutorizado,
                    'desautorizado' => $user3_contDesautorizado
                ),
                'ctsilva' => array(
                    'aprovar' => $user4_contAprovar,
                    'aprovado' => $user4_contAprovado,
                    'reprovado' => $user4_contReprovado,
                    'autorizado' => $user4_contAutorizado,
                    'desautorizado' => $user4_contDesautorizado
                ),
                'marsantos' => array(
                    'aprovar' => $user5_contAprovar,
                    'aprovado' => $user5_contAprovado,
                    'reprovado' => $user5_contReprovado,
                    'autorizado' => $user5_contAutorizado,
                    'desautorizado' => $user5_contDesautorizado
                )

            );
        }

        echo json_encode($arr);
    } catch (PDOException $th) {
        echo $th;
    }
}
if ($param3 == 'status_total') {
    $contAprovar = 0;
    $contAprovado = 0;
    $contReprovado = 0;
    $contAutorizado = 0;
    $contDesautorizado = 0;
    try {
        $conn = ConexaoLocal::getConnection();
        $query = "SELECT * FROM MATERIAIS_SOLICITADOS";
        $stmt = $conn->query($query);

        foreach ($stmt as $item) {
            if ($item['STATUS_SOLIC'] == 'APROVAR') {
                $contAprovar++;
            }
            if ($item['STATUS_SOLIC'] == 'APROVADO') {
                $contAprovado++;
            }
            if ($item['STATUS_SOLIC'] == 'REPROVADO') {
                $contReprovado++;
            }
            if ($item['STATUS_SOLIC'] == 'AUTORIZADO') {
                $contAutorizado++;
            }
            if ($item['STATUS_SOLIC'] == 'NAO_AUTORIZADO') {
                $contDesautorizado++;
            }
            $arr = array(
                'aprovar' => $contAprovar,
                'aprovado' => $contAprovado,
                'reprovado' => $contReprovado,
                'autorizado' => $contAutorizado,
                'desautorizado' => $contDesautorizado
            );
        }
        echo json_encode($arr);
    } catch (PDOException $th) {
        echo $th;
    }
}
