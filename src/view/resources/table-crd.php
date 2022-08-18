<div class="tab-pane active" id="tab-table1">
    <div class="cardHeader">
        <h2>Materiais</h2>
    </div>
    <table id="TableMaterial" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td scope="col">Código</td>
                <td scope="col">Período</td>
                <td scope="col">Descrição</td>
                <td scope="col">Qtde</td>
                <td scope="col">Valor Unit.</td>
                <td scope="col">Valor Total</td>
                <td scope="col">Solicitante</td>
                <td scope="col">Aplicação</td>
                <td scope="col">Mês Aprovação</td>
                <td scope="col">Status</td>
                <td scope="col">Fornecedor</td>
                <td scope="col">Proposta</td>
                <td scope="col">Prioridade</td>
                <td scope="col">Equipe</td>
                <td scope="col">Ação</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stmtMateriaisGeral as $item) { ?>
                <tr>
                    <td><?php echo $item['CODIGO'] ?></td>
                    <td><?php echo $item['PERIODO'] ?></td>
                    <td><?php echo $item['DESCRICAO'] ?></td>
                    <td><?php echo $item['QUANTIDADE'] ?></td>
                    <td><?php echo $item['REAL_UNITARIO'] ?></td>
                    <td><?php echo $item['REAL_TOTAL'] ?></td>
                    <td><?php echo $item['SOLICITANTE'] ?></td>
                    <td><?php echo $item['APLICACAO'] ?></td>
                    <td><?php echo $item['MES_APROVACAO'] ?></td>
                    <td><?php echo $item['STATUS_SOLIC'] ?></td>
                    <td><?php echo $item['FORNECEDOR'] ?></td>
                    <td><?php echo $item['PROPOSTA'] ?></td>
                    <td><?php echo $item['PRIORIDADE'] ?></td>
                    <td><?php echo $item['EQUIPE'] ?></td>
                    <td><button type="button" class="botaoId" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-solicitacaoId="<?php echo $item['ID'] ?>" data-bs-materialCodigo="<?php echo $item['CODIGO'] ?>" data-bs-materialQuantidade="<?php echo $item['QUANTIDADE'] ?>" data-bs-materialDescricao="<?php echo $item['DESCRICAO'] ?>" data-bs-materialRealUnit="<?php echo $item['REAL_UNITARIO'] ?>" data-bs-materialRealTotal="<?php echo $item['REAL_TOTAL'] ?>" data-bs-materialAplicacao="<?php echo $item['APLICACAO'] ?>" data-bs-materialMesAprovacao="<?php echo $item['MES_APROVACAO'] ?>" data-bs-materialSolicitante="<?php echo $item['SOLICITANTE'] ?>">Aprovar</button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="tab-pane" id="tab-table2">
    <div class="cardHeader">
        <h2>Serviços</h2>
    </div>
    <table id="TableServicos" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td scope="col">ID</td>
                <td scope="col">Material</td>
                <td scope="col">Qtde</td>
                <td scope="col">R$ Unit</td>
                <td scope="col">R$ Total</td>
                <td scope="col">Código Serviço</td>
                <td scope="col">Serviço</td>
                <td scope="col">Centro Custo</td>
                <td scope="col">Defeito</td>
                <td scope="col">Aplicação</td>
                <td scope="col">Fornecedor</td>
                <td scope="col">Prioridade</td>
                <td scope="col">Anexo</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stmtServicosGeral as $item) {
                $output  = str_replace("C:/xampp/htdocs/", "", $item['ANX_ORCAMENTO']);
            ?>
                <tr>
                    <td><?php echo $item['ID'] ?></td>
                    <td><?php echo $item['DSC_EQUIP'] ?></td>
                    <td><?php echo $item['QTD_EQUIP'] ?></td>
                    <td><?php echo $item['VAL_UNIT'] ?></td>
                    <td><?php echo $item['VAL_TOTAL'] ?></td>
                    <td><?php echo $item['COD_SERVIC'] ?></td>
                    <td><?php echo $item['DSC_SERVIC'] ?></td>
                    <td><?php echo $item['DSC_CENTRO_CUSTO'] ?></td>
                    <td><?php echo $item['DSC_DEFEITO_OBS'] ?></td>
                    <td><?php echo $item['DSC_APLICACAO'] ?></td>
                    <td><?php echo $item['NOM_FORNECEDOR'] ?></td>
                    <td><?php echo $item['NUM_GUT_PRIORIDADE'] ?></td>
                    <td><a target="_blank" href="http://localhost:8000/<?php echo $output ?>">Anexo</a> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>