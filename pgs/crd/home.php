<?php
require_once "../../dao/conexao.php";
require_once "../../dao/session.php";

$conn = ConexaoLocal::getConnection();
$query = "SELECT * FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'APROVAR'";
$stmt = $conn->query($query);

$queryAprovado = "SELECT COUNT(STATUS_SOLIC) AS totalAprovado FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'APROVADO'";
$stmtAprovado = $conn->query($queryAprovado);

$queryAprovar = "SELECT COUNT(STATUS_SOLIC) AS totalAprovar FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'APROVAR'";
$stmtAprovar = $conn->query($queryAprovar);

$queryAutorizado = "SELECT COUNT(STATUS_SOLIC) AS totalAutorizado FROM MATERIAIS_SOLICITADOS WHERE STATUS_SOLIC = 'AUTORIZADO'";
$stmtAutorizado = $conn->query($queryAutorizado);

$queryTotal = "SELECT SUM(real_total) AS totalValorTotal FROM MATERIAIS_SOLICITADOS";
$stmtValorTotal = $conn->query($queryTotal);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Automação</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../images/favicon-original.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/datatable/datatable.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="leftBar">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="code-working-outline"></ion-icon>
                        </span>
                        <span class="title">Olá, <?php echo $_SESSION['nomeUsuario']; ?></span>
                    </a>
                </li>
                <li>
                    <a href="./home.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Início</span>
                    </a>
                </li>
                <li>
                    <a href="?logout=1">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sair</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- main -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
            <!-- search -->
            <div class="titleTopBar">
                <h2>Solicitação de Materiais</h2>
            </div>
            <!-- userImg -->
            <div class="user">
                <img src="../../images/user.jpg">
            </div>

        </div>
        <!-- cards -->
        <div class="cardBox">
            <div class="carde">
                <div>
                    <div class="numbersComprasTotal">
                        <?php foreach ($stmtValorTotal as $item) {
                            echo $item['totalValorTotal'];
                        } ?>
                    </div>
                    <div class="cardName">Compras (R$)</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="cart-outline"></ion-icon>
                </div>
            </div>
            <div class="carde">
                <div>
                    <div class="numbers">
                        <?php foreach ($stmtAprovar as $item) {
                            echo $item['totalAprovar'];
                        } ?></div>
                    <div class="cardName">Aprovar</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="reload-outline"></ion-icon>
                </div>
            </div>
            <div class="carde">
                <div>
                    <div class="numbers">
                        <?php foreach ($stmtAprovado as $item) {
                            echo $item['totalAprovado'];
                        } ?></div>
                    <div class="cardName">Aprovado</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="thumbs-up-outline"></ion-icon>
                </div>
            </div>
            <div class="carde">
                <div>
                    <div class="numbers">
                        <?php foreach ($stmtAutorizado as $item) {
                            echo $item['totalAutorizado'];
                        } ?>
                    </div>
                    <div class="cardName">Autorizado</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="checkmark-circle-outline"></ion-icon>
                </div>
            </div>
        </div>
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Materiais a Serem Solicitados</h2>
                </div>
                <table id="TabelaHome" class="tabelaPrincipal">
                    <thead>
                        <tr>
                            <td scope="col">Descrição</td>
                            <td scope="col">Qtde</td>
                            <td scope="col">Valor Unitário</td>
                            <td scope="col">Valor Total</td>
                            <td scope="col">Aplicação</td>
                            <td scope="col">Solicitante</td>
                            <td scope="col">Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stmt as $item) { ?>
                            <tr>
                                <td><?php echo $item['DESCRICAO'] ?></td>
                                <td><?php echo $item['QUANTIDADE'] ?></td>
                                <td><?php echo 'R$ ' . $item['REAL_UNITARIO'] ?></td>
                                <td><?php echo 'R$ ' . $item['REAL_TOTAL'] ?></td>
                                <td><?php echo $item['APLICACAO'] ?></td>
                                <td><?php echo $item['SOLICITANTE'] ?></td>
                                <td><button type="button" class="botaoId" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-materialId="<?php echo $item['ID'] ?>" data-bs-materialCodigo="<?php echo $item['CODIGO'] ?>" data-bs-materialDescricao="<?php echo $item['DESCRICAO'] ?>" data-bs-materialRealUnit="<?php echo $item['REAL_UNITARIO'] ?>" data-bs-materialRealTotal="<?php echo $item['REAL_TOTAL'] ?>" data-bs-materialAplicacao="<?php echo $item['APLICACAO'] ?>" data-bs-materialSolicitante="<?php echo $item['SOLICITANTE'] ?>">Aprovar</button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Inicio Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="../../dao/crd/aprovar.php" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Aprovar Solicitação</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" placeholder="id" class="form-control" name="materialId" id="materialId">
                            <input type="hidden" placeholder="data" class="form-control" name="dataAtual" id="dataAtual">
                            <div class="mb-3">
                                <label for="materialDescricao" class="col-form-label">Descrição</label>
                                <input type="text" class="form-control" name="materialDescricao" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="materialAplicacao" class="col-form-label">Aplicação</label>
                                <input type="text" class="form-control" name="materialAplicacao" readonly>
                            </div>
                            <div class="centerModal">
                                <div class="mb-3">
                                    <label for="materialCodigo" class="col-form-label">Codigo</label>
                                    <input type="text" class="form-control" name="materialCodigo" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="materialSolicitante" class="col-form-label">Solicitante</label>
                                    <input type="text" class="form-control" name="materialSolicitante" readonly>
                                </div>
                            </div>
                            <div class="rodapeModal">
                                <div class="mb-3">
                                    <label for="materialRealUnit" class="col-form-label">Valor Unitário</label>
                                    <input type="text" class="form-control" name="materialRealUnit" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="materialRealTotal" class="col-form-label">Valor Total</label>
                                    <input type="text" class="form-control" name="materialRealTotal" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-danger" onclick="reprovar()">Reprovar</button>
                            <button type="submit" class="btn btn-primary">Aprovar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Fim Modal -->
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script type="text/javascript" src="../../js/google.api/jquery.min.js"></script>
<script type="text/javascript" src="../../js/google.api/jquery.mask.min.js"></script>
<script type="text/javascript" src="../../js/crd/home.js"></script>
<script type="text/javascript" src="../../js/eng/jquery.maskMoney.js"></script>
<script type="text/javascript" src="../../js/datatable/datatable.js"></script>
<script type="text/javascript" src="../../js/datatable/jquery-3-5-1.js"></script>
<script type="text/javascript" src="../../js/datatable/jquery.dataTables.min.js"></script>

</html>