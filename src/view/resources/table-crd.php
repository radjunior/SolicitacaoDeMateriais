<div class="tab-pane active" id="table1">
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Materiais</h2>
            </div>
            <div class="tabelaAbsolute">
                <table id="TableMaterial" class="table table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <td scope="col">Código</td>
                            <td scope="col">Período</td>
                            <td scope="col">Descrição</td>
                            <td scope="col">Qtde</td>
                            <td scope="col">Valor Unitário</td>
                            <td scope="col">Valor Total</td>
                            <td scope="col">Aplicação</td>
                            <td scope="col">Mês Aprovação</td>
                            <td scope="col">Solicitante</td>
                            <td scope="col">Status</td>
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
                                <td><?php echo $item['APLICACAO'] ?></td>
                                <td><?php echo $item['MES_APROVACAO'] ?></td>
                                <td><?php echo $item['SOLICITANTE'] ?></td>
                                <td><?php echo $item['STATUS_SOLIC'] ?></td>
                                <td><?php echo $item['PRIORIDADE'] ?></td>
                                <td><?php echo $item['EQUIPE'] ?></td> 
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane" id="table2">
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Serviços</h2>
            </div>
            <div class="tabelaAbsolute">
                <table id="TableServicos" class="table table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <td scope="col">Código</td>
                            <td scope="col">Equipamento</td>
                            <td scope="col">Qtde</td>
                            <td scope="col">Valor Unitário</td>
                            <td scope="col">Valor Total</td>
                            <td scope="col">Código Serviço</td>
                            <td scope="col">Serviço</td>
                            <td scope="col">Centro de Custo</td>
                            <td scope="col">Defeito/Obs</td>
                            <td scope="col">Aplicação</td>
                            <td scope="col">Fornecedor</td>
                            <td scope="col">Mês para Aprovação</td>
                            <td scope="col">Prioridade GUT</td>
                            <td scope="col">Anexo</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stmtServicosGeral as $item): $file = str_replace('C:/xampp/htdocs/', 'http://localhost:8000/', $item['ANX_ORCAMENTO']);?>
                            <tr>
                                <td><?php echo $item['COD_EQUIP'] ?></td>
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
                                <td><?php echo $item['MES_APROVACAO'] ?></td>    
                                <td><?php echo $item['NUM_GUT_PRIORIDADE'] ?></td>
                                <td><a target="__blank" href="<?php echo $file?>">Anexo</a></td>  
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>