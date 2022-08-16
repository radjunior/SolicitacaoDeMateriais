<?php require_once "../base-top.php"; ?>
<?php
$stmtMateriaisAprovado = MaterialDAO::getMateriaisAprovado();
?>

<link rel="stylesheet" type="text/css" href="../../css/ger/style.css">
<link rel="stylesheet" type="text/css" href="../../scripts/datatables/datatables.css">
<link rel="stylesheet" type="text/css" href="../../css/css.bootstrap/bootstrap.css">
<!-- main -->
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
        </div>
        <div class="titleTopBar">
            <h2>Solicitação de Materiais</h2>
        </div>
        <div class="user">
            <img src="../../images/user.jpg">
        </div>
    </div>
    <!-- cards -->
    <div class="cardBox">
        <div class="cardeRealTotal">
            <div class="cardeTop">
                <h2>Valor Total</h2>
                <input type="text" id="iptSomaRealTotal" readonly>
                <div class="iconBx">
                    <ion-icon name="bag-add-outline"></ion-icon>
                </div>
            </div>
        </div>
        <div class="cardeAprovar">
            <div class="cardeTop">
                <h2>Aprovar</h2>
                <input type="text" id="iptCountAprovar" readonly>
                <div class="iconBx">
                    <ion-icon name="sync-outline"></ion-icon>
                </div>
            </div>
        </div>
        <div class="cardeAprovado">
            <div class="cardeL">
                <h2>Aprovado</h2>
                <input type="text" id="iptCountAprovado" readonly>
                <div class="iconBx">
                    <ion-icon name="checkmark-outline"></ion-icon>
                </div>
            </div>
            <div class="cardeR">
                <h2>Reprovado</h2>
                <input type="text" id="iptCountReprovado" readonly>
                <div class="iconBx">
                    <ion-icon name="close-outline"></ion-icon>
                </div>
            </div>
        </div>
        <div class="cardeAutorizado">
            <div class="cardeL">
                <h2>Autorizado</h2>
                <input type="text" id="iptCountAutorizado" readonly>
                <div class="iconBx">
                    <ion-icon name="checkmark-circle-outline"></ion-icon>
                </div>
            </div>
            <div class="cardeR">
                <h2>Desautorizado</h2>
                <input type="text" id="iptCountDesautorizado" readonly>
                <div class="iconBx">
                    <ion-icon name="close-circle-outline"></ion-icon>
                </div>
            </div>
        </div>
    </div>
    <div class="cardFiltros">
        <div class="cptFiltros">
            <div>
                <select name="cptSolicitante" id="cptSolicitante">
                    <option value="">Solicitante</option>
                    <option value="jvstomaz">jvstomaz</option>
                    <option value="ctsilva">ctsilva</option>
                    <option value="vgsouza">vgsouza</option>
                    <option value="bscastro">bscastro</option>
                    <option value="marsantos">marsantos</option>
                </select>
            </div>
            <div>
                <select name="cptStatus" id="cptStatus">
                    <option value="">Status</option>
                    <option value="APROVAR">Aprovar</option>
                    <option value="APROVADO">Aprovado</option>
                    <option value="REPROVADO">Reprovado</option>
                    <option value="AUTORIZADO">Autorizado</option>
                    <option value="NAO_AUTORIZADO">Desautorizado</option>
                </select>
            </div>
            <div>
                <select name="cptPriord" id="cptPriord">
                    <option value="">Prioridade</option>
                    <option value="0">[0] Baixa</option>
                    <option value="1">[1] Média</option>
                    <option value="2">[2] Alta</option>
                </select>
            </div>
            <div>
                <input type="month" id="iptFiltroMes">
            </div>
        </div>
    </div>
    <!-- tabelaPrincipal -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Materiais a Serem Autorizados</h2>
            </div>
            <div class="tabelaAbsolute">
                <table id="TabelaHome" class="table table-hover">
                    <thead>
                        <tr>
                            <td scope="col">Código</td>
                            <td scope="col">Descrição</td>
                            <td scope="col">Qtde</td>
                            <td scope="col">Valor Unitário</td>
                            <td scope="col">Valor Total</td>
                            <td scope="col">Aplicação</td>
                            <td scope="col">Mês Aprovação</td>
                            <td scope="col">Solicitante</td>
                            <td scope="col">Status</td>
                            <td scope="col">Prioridade</td>
                            <td scope="col">Ação</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stmtMateriaisAprovado as $item) { ?>
                            <tr>
                                <td><?php echo $item['CODIGO'] ?></td>
                                <td><?php echo $item['DESCRICAO'] ?></td>
                                <td><?php echo $item['QUANTIDADE'] ?></td>
                                <td><?php echo $item['REAL_UNITARIO'] ?></td>
                                <td><?php echo $item['REAL_TOTAL'] ?></td>
                                <td><?php echo $item['APLICACAO'] ?></td>
                                <td><?php echo $item['MES_APROVACAO'] ?></td>
                                <td><?php echo $item['SOLICITANTE'] ?></td>
                                <td><?php echo $item['STATUS_SOLIC'] ?></td>
                                <td><?php echo $item['PRIORIDADE'] ?></td>
                                <td><button type="button" class="botaoId" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-materialId="<?php echo $item['ID'] ?>" data-bs-materialCodigo="<?php echo $item['CODIGO'] ?>" data-bs-materialDescricao="<?php echo $item['DESCRICAO'] ?>" data-bs-materialRealUnit="<?php echo $item['REAL_UNITARIO'] ?>" data-bs-materialRealTotal="<?php echo $item['REAL_TOTAL'] ?>" data-bs-materialAplicacao="<?php echo $item['APLICACAO'] ?>" data-bs-materialSolicitante="<?php echo $item['SOLICITANTE'] ?>">Autorizar</button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Inicio Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../../dao/ger/autorizar.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Autorizar Solicitação</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" name="materialId" id="materialId">
                        <input type="hidden" class="form-control" name="dataAtual" id="dataAtual">
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
                        <!--<button type="button" class="btn btn-danger" onclick="desautorizar()">Não Autorizar</button>-->
                        <button type="button" class="btn btn-danger">Não Autorizar</button>
                        <button type="submit" class="btn btn-primary">Autorizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Fim Modal -->
</div>

<script type="text/javascript" src="../../scripts/datatables/datatables.js"></script>
<script type="text/javascript" src="../../js/vendor/jquery/jquery.mask.js"></script>
<script type="text/javascript" src="../../js/js.bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="../../js/ger/home.js"></script>
<?php require_once "../base-bot.php"; ?>