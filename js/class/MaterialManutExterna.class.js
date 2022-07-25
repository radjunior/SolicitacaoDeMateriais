class SolicitacaoServicos {

    constructor() {
        this.id = 1;
        this.arrServicos = [];
        this.editId = null;
        this.sttAprovar = "APROVAR";
        this.dtAguardar = "AGUARDANDO";
        this.totalQtde = 0;
        this.totalReal = 0;
        document.getElementById('spnQtde').innerText = this.totalQtde;
        document.getElementById('spnValorTotal').innerText = this.totalReal;
    }

    salvar() {
        let arrSolic = this.lerDados();
        if (this.validaCampo(arrSolic)) {
            if (this.editId == null) {
                this.adicionarArr(arrSolic);
            } else {
                this.atualizarDados(this.editId, arrSolic);
            }
            this.listaTabela();
            this.calcularTotalReal();
            this.cancelar();
        }
    }

    lerDados() {
        let arrSolic = {};
        // Automaticos
        arrSolic.id = this.id;
        arrSolic.statusSolic = this.sttAprovar;
        arrSolic.dataAprovacao = this.dtAguardar;
        arrSolic.dataAutoriz = this.dtAguardar;
        // Materiais
        arrSolic.txtCodigoMaterial = document.getElementById('txtCodigoMaterial').value;
        arrSolic.txtUnidadeMaterial = document.getElementById('txtUnidadeMaterial').value;
        arrSolic.txtQtdeMaterial = document.getElementById('txtQtdeMaterial').value;
        arrSolic.txtValorUnit = document.getElementById('txtValorUnit').value;
        arrSolic.txtValorReal = document.getElementById('txtValorReal').value;
        arrSolic.txtDescricaoMaterial = document.getElementById('txtDescricaoMaterial').value;
        // Servicos
        arrSolic.txtCodigoServico = document.getElementById('txtCodigoServico').value;
        arrSolic.txtDescricaoServico = document.getElementById('txtDescricaoServico').value;
        // Centro de Custo        
        arrSolic.txtCodigoCCusto = document.getElementById('txtCodigoCCusto').value;
        arrSolic.txtDescricaoCCusto = document.getElementById('txtDescricaoCCusto').value;
        // Aplicacao
        arrSolic.txtDefeitoObs = document.getElementById('txtDefeitoObs').value;
        arrSolic.txtAplicacao = document.getElementById('txtAplicacao').value;
        arrSolic.txtNumSerie = document.getElementById('txtNumSerie').value;
        arrSolic.txtNumPatrimonio = document.getElementById('txtNumPatrimonio').value;
        // Externo
        arrSolic.txtFornecedor = document.getElementById('txtFornecedor').value;
        arrSolic.txtRequisicao = document.getElementById('txtRequisicao').value;
        arrSolic.txtItemRequisicao = document.getElementById('txtItemRequisicao').value;
        arrSolic.txtPedido = document.getElementById('txtPedido').value;
        arrSolic.txtItemPedido = document.getElementById('txtItemPedido').value;
        // Datas e Solicitante
        arrSolic.txtMesAprov = document.getElementById('txtMesAprov').value;
        arrSolic.txtDataInsert = document.getElementById('txtDataInsert').value;
        arrSolic.txtSolicitante = document.getElementById('txtSolicitante').value;
        // Orcamento
        arrSolic.txtProposta = document.getElementById('txtProposta').value;
        arrSolic.txtItemProposta = document.getElementById('txtItemProposta').value;
        arrSolic.txtCustoTotal = document.getElementById('txtCustoTotal').value;
        arrSolic.arqOrcamento = document.getElementById('arqOrcamento').value;
        // Matriz Gut
        arrSolic.rgGravidade = document.getElementById('rgGravidade').value;
        arrSolic.rgUrgencia = document.getElementById('rgUrgencia').value;
        arrSolic.rgTendencia = document.getElementById('rgTendencia').value;
        arrSolic.txtPrioridade = document.getElementById('txtPrioridade').innerText;
        // Notas Fiscais
        arrSolic.txtNumNfEnvio = document.getElementById('txtNumNfEnvio').value;
        arrSolic.txtDataNfEnvio = document.getElementById('txtDataNfEnvio').value;
        arrSolic.txtNumNfRetorno = document.getElementById('txtNumNfRetorno').value;
        arrSolic.txtDataNfRetorno = document.getElementById('txtDataNfRetorno').value;

        return arrSolic;
    }

    validaCampo(dados) {
        let msg = '';

        if (dados.txtCodigoMaterial == '') {
            msg += 'Informe o código do Material\n';
        }

        if (dados.txtQtdeMaterial == '') {
            msg += 'Informe a qtde de Material\n';
        }

        if (dados.txtCodigoServico == '') {
            msg += 'Informe o código do Serviço\n';
        }

        if (dados.txtCodigoCCusto == '') {
            msg += 'Informe o código do Centro de Custo\n';
        }

        if (dados.txtDefeitoObs == '') {
            msg += 'Informe o Defeito/obs\n';
        }

        if (dados.txtAplicacao == '') {
            msg += 'Informe a Aplicação\n';
        }

        if (dados.txtFornecedor == '') {
            msg += 'Informe o Fornecedor\n';
        }

        if (msg != '') {
            alert(msg);
            return false;
        }

        return true;
    }

    adicionarArr(arrSolic) {
        this.arrServicos.push(arrSolic);
        this.id++;
        this.totalQtde++;
    }

    preparaEdicao(dados) {
        this.editId = dados.id;
        // Materiais
        document.getElementById('txtCodigoMaterial').value = dados.txtCodigoMaterial;
        document.getElementById('txtUnidadeMaterial').value = dados.txtUnidadeMaterial;
        document.getElementById('txtQtdeMaterial').value = dados.txtQtdeMaterial;
        document.getElementById('txtValorUnit').value = dados.txtValorUnit;
        document.getElementById('txtValorReal').value = dados.txtValorReal;
        document.getElementById('txtDescricaoMaterial').value = dados.txtDescricaoMaterial;
        // Servicos
        document.getElementById('txtCodigoServico').value = dados.txtCodigoServico;
        document.getElementById('txtDescricaoServico').value = dados.txtDescricaoServico;
        // Centro de Custo
        document.getElementById('txtCodigoCCusto').value = dados.txtCodigoCCusto;
        document.getElementById('txtDescricaoCCusto').value = dados.txtDescricaoCCusto;
        // Aplicacao
        document.getElementById('txtDefeitoObs').value = dados.txtDefeitoObs;
        document.getElementById('txtAplicacao').value = dados.txtAplicacao;
        document.getElementById('txtNumSerie').value = dados.txtNumSerie;
        document.getElementById('txtNumPatrimonio').value = dados.txtNumPatrimonio;
        // Externo
        document.getElementById('txtFornecedor').value = dados.txtFornecedor;
        document.getElementById('txtRequisicao').value = dados.txtRequisicao;
        document.getElementById('txtItemRequisicao').value = dados.txtItemRequisicao;
        document.getElementById('txtPedido').value = dados.txtPedido;
        document.getElementById('txtItemPedido').value = dados.txtItemPedido;
        // Datas e Solicitante
        document.getElementById('txtMesAprov').value = dados.txtMesAprov;
        document.getElementById('txtDataInsert').value = dados.txtDataInsert;
        document.getElementById('txtSolicitante').value = dados.txtSolicitante;
        // Orcamento
        document.getElementById('txtProposta').value = dados.txtProposta;
        document.getElementById('txtItemProposta').value = dados.txtItemProposta;
        document.getElementById('txtCustoTotal').value = dados.txtCustoTotal;
        document.getElementById('arqOrcamento').value = dados.arqOrcamento;
        // Matriz Gut
        document.getElementById('rgGravidade').value = dados.rgGravidade;
        document.getElementById('rgUrgencia').value = dados.rgUrgencia;
        document.getElementById('rgTendencia').value = dados.rgTendencia;
        document.getElementById('txtPrioridade').value = dados.txtPrioridade;
        // Notas Fiscais
        document.getElementById('txtNumNfEnvio').value = dados.txtNumNfEnvio;
        document.getElementById('txtDataNfEnvio').value = dados.txtDataNfEnvio;
        document.getElementById('txtNumNfRetorno').value = dados.txtNumNfRetorno;
        document.getElementById('txtDataNfRetorno').value = dados.txtDataNfRetorno;

        //Alterando Texto do botão "Salvar" para "Atualizar"
        document.getElementById('btnInsertAtt').innerText = 'Atualizar'
    }

    atualizarDados(id, dados) {
        for (let i = 0; i < this.arrServicos.length; i++) {
            if (this.arrServicos[i].id == id) {
                // Materiais
                this.arrServicos[i].txtCodigoMaterial = dados.txtCodigoMaterial;
                this.arrServicos[i].txtUnidadeMaterial = dados.txtUnidadeMaterial;
                this.arrServicos[i].txtQtdeMaterial = dados.txtQtdeMaterial;
                this.arrServicos[i].txtValorUnit = dados.txtValorUnit;
                this.arrServicos[i].txtValorReal = dados.txtValorReal;
                this.arrServicos[i].txtDescricaoMaterial = dados.txtDescricaoMaterial;
                // Servicos
                this.arrServicos[i].txtCodigoServico = dados.txtCodigoServico;
                this.arrServicos[i].txtDescricaoServico = dados.txtDescricaoServico;
                // Centro de Custo
                this.arrServicos[i].txtCodigoCCusto = dados.txtCodigoCCusto;
                this.arrServicos[i].txtDescricaoCCusto = dados.txtDescricaoCCusto;
                // Aplicacao
                this.arrServicos[i].txtDefeitoObs = dados.txtDefeitoObs;
                this.arrServicos[i].txtAplicacao = dados.txtAplicacao;
                this.arrServicos[i].txtNumSerie = dados.txtNumSerie;
                this.arrServicos[i].txtNumPatrimonio = dados.txtNumPatrimonio;
                // Externo
                this.arrServicos[i].txtFornecedor = dados.txtFornecedor;
                this.arrServicos[i].txtRequisicao = dados.txtRequisicao;
                this.arrServicos[i].txtItemRequisicao = dados.txtItemRequisicao;
                this.arrServicos[i].txtPedido = dados.txtPedido;
                this.arrServicos[i].txtItemPedido = dados.txtItemPedido;
                // Datas e Solicitante
                this.arrServicos[i].txtMesAprov = dados.txtMesAprov;
                this.arrServicos[i].txtDataInsert = dados.txtDataInsert;
                this.arrServicos[i].txtSolicitante = dados.txtSolicitante;
                // Orcamento
                this.arrServicos[i].txtProposta = dados.txtProposta;
                this.arrServicos[i].txtItemProposta = dados.txtItemProposta;
                this.arrServicos[i].txtCustoTotal = dados.txtCustoTotal;
                this.arrServicos[i].arqOrcamento = dados.arqOrcamento;
                // Matriz Gut
                this.arrServicos[i].rgGravidade = dados.rgGravidade;
                this.arrServicos[i].rgUrgencia = dados.rgUrgencia;
                this.arrServicos[i].rgTendencia = dados.rgTendencia;
                this.arrServicos[i].txtPrioridade = dados.txtPrioridade;
                // Notas Fiscais
                this.arrServicos[i].txtNumNfEnvio = dados.txtNumNfEnvio;
                this.arrServicos[i].txtDataNfEnvio = dados.txtDataNfEnvio;
                this.arrServicos[i].txtNumNfRetorno = dados.txtNumNfRetorno;
                this.arrServicos[i].txtDataNfRetorno = dados.txtDataNfRetorno;
            }
        }
    }

    deletar(id) {
        if (confirm('Deseja deletar o Item: ' + id)) {
            let tbody = document.getElementById('tBody');
            for (let i = 0; i < this.arrServicos.length; i++) {
                if (this.arrServicos[i].id == id) {
                    this.arrServicos.splice(i, 1);
                    tbody.deleteRow(i);
                }
            }
            this.totalQtde--;
            document.getElementById('spnQtde').innerText = this.totalQtde;
            document.getElementById('spnValorTotal').innerText = this.calcularTotalReal();
        }
    }

    limparTabela() {
        let tbody = document.getElementById('tBody');
        for (let i = 0; i < this.arrServicos.length; i++) {
            this.arrServicos.splice(i, 1);
            tbody.deleteRow(i);
        }
    }

    listaTabela() {
        let tbody = document.getElementById('tBody');
        tbody.innerText = '';
        document.getElementById('spnQtde').innerText = this.totalQtde;
        var valorTotalSemFormatacao = this.calcularTotalReal();
        var valorFormatado = valorTotalSemFormatacao.toLocaleString('pt-BR', {
            style: 'currency',
            currency: 'BRL'
        });
        document.getElementById('spnValorTotal').innerText = valorFormatado;
        for (let i = 0; i < this.arrServicos.length; i++) {
            let tr = tbody.insertRow();

            let td_id = tr.insertCell();
            td_id.innerText = this.arrServicos[i].id;

            let txtDescricaoMaterial = tr.insertCell();
            let txtQtdeMaterial = tr.insertCell();
            let txtValorUnit = tr.insertCell();
            let txtValorReal = tr.insertCell();
            let txtDescricaoServico = tr.insertCell();
            let txtDescricaoCCusto = tr.insertCell();
            let txtDefeitoObs = tr.insertCell();
            let txtAplicacao = tr.insertCell();
            let txtFornecedor = tr.insertCell();
            let txtPrioridade = tr.insertCell();

            txtDescricaoMaterial.innerText = this.arrServicos[i].txtDescricaoMaterial;
            txtQtdeMaterial.innerText = this.arrServicos[i].txtQtdeMaterial;
            txtValorUnit.innerText = this.arrServicos[i].txtValorUnit;
            txtValorReal.innerText = this.arrServicos[i].txtValorReal;
            txtDescricaoServico.innerText = this.arrServicos[i].txtDescricaoServico;
            txtDescricaoCCusto.innerText = this.arrServicos[i].txtDescricaoCCusto;
            txtDefeitoObs.innerText = this.arrServicos[i].txtDefeitoObs;
            txtAplicacao.innerText = this.arrServicos[i].txtAplicacao;
            txtFornecedor.innerText = this.arrServicos[i].txtFornecedor;
            txtPrioridade.innerText = this.arrServicos[i].txtPrioridade;

            let td_acoes = tr.insertCell();

            let imgEdit = document.createElement('img');
            imgEdit.src = '../../images/icons/edit.png';
            imgEdit.setAttribute('onclick', 'itemServico.preparaEdicao(' + JSON.stringify(this.arrServicos[i]) + ')');

            let imgLixo = document.createElement('img');
            imgLixo.src = '../../images/icons/lixo.png';
            imgLixo.setAttribute('onclick', 'itemServico.deletar(' + this.arrServicos[i].id + ')');

            td_acoes.appendChild(imgEdit);
            td_acoes.appendChild(imgLixo);
        }
    }
    calcularTotalReal() {
        var valor = 0;
        for (let i = 0; i < this.arrServicos.length; i++) {
            valor += parseFloat(this.arrServicos[i].txtValorReal);

        }
        return valor;
    }
    cancelar() {
        this.editId = null;
        // Materiais
        itemServico.txtCodigoMaterial = document.getElementById('txtCodigoMaterial').value = '';
        itemServico.txtUnidadeMaterial = document.getElementById('txtUnidadeMaterial').value = '';
        itemServico.txtQtdeMaterial = document.getElementById('txtQtdeMaterial').value = '';
        itemServico.txtValorUnit = document.getElementById('txtValorUnit').value = '';
        itemServico.txtValorReal = document.getElementById('txtValorReal').value = '';
        itemServico.txtDescricaoMaterial = document.getElementById('txtDescricaoMaterial').value = '';
        // Servicos
        itemServico.txtCodigoServico = document.getElementById('txtCodigoServico').value = '';
        itemServico.txtDescricaoServico = document.getElementById('txtDescricaoServico').value = '';
        // Centro de Custo
        itemServico.txtCodigoCCusto = document.getElementById('txtCodigoCCusto').value = '';
        itemServico.txtDescricaoCCusto = document.getElementById('txtDescricaoCCusto').value = '';
        // Aplicacao
        itemServico.txtDefeitoObs = document.getElementById('txtDefeitoObs').value = '';
        itemServico.txtAplicacao = document.getElementById('txtAplicacao').value = '';
        itemServico.txtNumSerie = document.getElementById('txtNumSerie').value = '';
        itemServico.txtNumPatrimonio = document.getElementById('txtNumPatrimonio').value = '';
        // Externo
        itemServico.txtFornecedor = document.getElementById('txtFornecedor').value = '';
        itemServico.txtRequisicao = document.getElementById('txtRequisicao').value = '';
        itemServico.txtItemRequisicao = document.getElementById('txtItemRequisicao').value = '';
        itemServico.txtPedido = document.getElementById('txtPedido').value = '';
        itemServico.txtItemPedido = document.getElementById('txtItemPedido').value = '';
        // Datas e Solicitante
        itemServico.txtMesAprov = document.getElementById('txtMesAprov').value = '';
        itemServico.txtDataInsert = document.getElementById('txtDataInsert').value = '';
        itemServico.txtSolicitante = document.getElementById('txtSolicitante').value = '';
        // Orcamento
        itemServico.txtProposta = document.getElementById('txtProposta').value = '';
        itemServico.txtItemProposta = document.getElementById('txtItemProposta').value = '';
        itemServico.txtCustoTotal = document.getElementById('txtCustoTotal').value = '';
        itemServico.arqOrcamento = document.getElementById('arqOrcamento').value = '';
        // Matriz Gut
        itemServico.rgGravidade = document.getElementById('rgGravidade').value = '';
        itemServico.rgUrgencia = document.getElementById('rgUrgencia').value = '';
        itemServico.rgTendencia = document.getElementById('rgTendencia').value = '';
        itemServico.txtPrioridade = document.getElementById('txtPrioridade').value = '';
        // Notas Fiscais
        itemServico.txtNumNfEnvio = document.getElementById('txtNumNfEnvio').value = '';
        itemServico.txtDataNfEnvio = document.getElementById('txtDataNfEnvio').value = '';
        itemServico.txtNumNfRetorno = document.getElementById('txtNumNfRetorno').value = '';
        itemServico.txtDataNfRetorno = document.getElementById('txtDataNfRetorno').value = '';
        document.getElementById('btnInsertAtt').innerText = 'Salvar';
    }

    enviarBD() {
        this.arrServicos
        for (let i = 0; i < this.arrServicos.length; i++) {
            dados = {
                arqOrcamento: this.arrServicos[i].arqOrcamento
            }
            $.post('../../dao/eng/cadastroManutEx.php', dados, function(retorno) {
                if (retorno.queryString == null) {
                    alert("Erro ao efetuar a solicitação de Manutenção Externa:\n" + retorno.errorInfo[2]);
                } else {
                    confirm("Manutenção Externa solicitada com sucesso");
                    location.reload();
                }
            }, "json");
        }
    }
}
itemServico = new SolicitacaoServicos();