class SolicitacaoMaterial {

    constructor() {
        this.id = 1;
        this.arrSolicitacao = [];
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

        //Automáticos
        arrSolic.id = this.id;
        arrSolic.statusSolic = this.sttAprovar;
        arrSolic.dataAprovacao = this.dtAguardar;
        arrSolic.dataAutoriz = this.dtAguardar;
        //Materiais
        arrSolic.codigoMaterial = document.getElementById('codigoMaterial').value;
        arrSolic.unidadeMaterial = document.getElementById('unidadeMaterial').value;
        arrSolic.qtdeMaterial = document.getElementById('qtdeMaterial').value;
        arrSolic.valorUnit = document.getElementById('valorUnit').value;
        arrSolic.valorReal = document.getElementById('valorReal').value;
        arrSolic.descricaoMaterial = document.getElementById('descricaoMaterial').value;
        //Centro de Custo        
        arrSolic.codigoCCusto = document.getElementById('codigoCCusto').value;
        arrSolic.descricaoCCusto = document.getElementById('descricaoCCusto').value;
        //Aplicação
        arrSolic.prioridade = document.getElementById('prioridade').value;
        arrSolic.proposta = document.getElementById('proposta').value;
        arrSolic.aplicacao = document.getElementById('aplicacao').value;
        if (document.getElementById('rbPeriodoEntreSafra').checked) {
            arrSolic.equipe = document.getElementById('equipe').value;
        }
        //Externo
        arrSolic.fornecedor = document.getElementById('fornecedor').value;
        arrSolic.requisicao = document.getElementById('requisicao').value;
        arrSolic.itemRequisicao = document.getElementById('itemRequisicao').value;
        //Datas e Solicitante
        arrSolic.mesAprov = document.getElementById('mesAprov').value;
        arrSolic.solicitante = document.getElementById('solicitante').value;


        return arrSolic;
    }

    validaCampo(dados) {
        let msg = '';

        if (document.getElementById('rbPeriodoSafra').checked != true &&
            document.getElementById('rbPeriodoEntreSafra').checked != true) {
            msg += 'Informe o Período (Safra ou Entre-safra)\n';
        }
        if (document.getElementById('rbPeriodoEntreSafra').checked == true) {
            if (document.getElementById('equipe').value == '') {
                msg += 'Informe a Equipe\n';
            }
        }

        if (dados.codigoMaterial == '') {
            msg += 'Informe o Material\n';
        }

        if (dados.qtdeMaterial == '') {
            msg += 'Informe a Qtde de Material\n';
        }

        if (dados.valorUnit == '') {
            msg += 'Informe o Valor unitário\n';
        }

        if (dados.codigoCCusto == '') {
            msg += 'Informe o Centro de Custo\n';
        }

        if (dados.aplicacao == '') {
            msg += 'Informe a Aplicação\n';
        }

        if (dados.mesAprov == '') {
            msg += 'Informe o Mês de Aprovação\n';
        }

        if (msg != '') {
            alert(msg);
            return false;
        }

        return true;
    }

    adicionarArr(arrSolic) {
        this.arrSolicitacao.push(arrSolic);
        this.id++;
        this.totalQtde++;
    }

    preparaEdicao(dados) {
        this.editId = dados.id;
        //Materiais
        document.getElementById('codigoMaterial').value = dados.codigoMaterial;
        document.getElementById('unidadeMaterial').value = dados.unidadeMaterial;
        document.getElementById('descricaoMaterial').value = dados.descricaoMaterial;
        document.getElementById('qtdeMaterial').value = dados.qtdeMaterial;
        document.getElementById('valorUnit').value = dados.valorUnit;
        document.getElementById('valorReal').value = dados.valorReal;
        //Centro de Custo
        document.getElementById('codigoCCusto').value = dados.codigoCCusto;
        document.getElementById('descricaoCCusto').value = dados.descricaoCCusto;
        //Aplicação
        document.getElementById('prioridade').value = dados.prioridade;
        document.getElementById('proposta').value = dados.proposta;
        document.getElementById('aplicacao').value = dados.aplicacao;
        document.getElementById('equipe').value = dados.equipe;
        //Externo
        document.getElementById('fornecedor').value = dados.fornecedor;
        document.getElementById('requisicao').value = dados.requisicao;
        document.getElementById('itemRequisicao').value = dados.itemRequisicao;
        //Datas
        document.getElementById('mesAprov').value = dados.mesAprov;
        //Alterando Texto do botão "Salvar" para "Atualizar"
        document.getElementById('btnInsertAtt').innerText = 'Atualizar'
    }

    atualizarDados(id, dados) {
        for (let i = 0; i < this.arrSolicitacao.length; i++) {
            if (this.arrSolicitacao[i].id == id) {
                //Materiais
                this.arrSolicitacao[i].codigoMaterial = dados.codigoMaterial;
                this.arrSolicitacao[i].unidadeMaterial = dados.unidadeMaterial;
                this.arrSolicitacao[i].descricaoMaterial = dados.descricaoMaterial;
                this.arrSolicitacao[i].qtdeMaterial = dados.qtdeMaterial;
                this.arrSolicitacao[i].valorUnit = dados.valorUnit;
                this.arrSolicitacao[i].valorReal = dados.valorReal;
                //Centro de Custo
                this.arrSolicitacao[i].codigoCCusto = dados.codigoCCusto;
                this.arrSolicitacao[i].descricaoCCusto = dados.descricaoCCusto;
                //Aplicação
                this.arrSolicitacao[i].prioridade = dados.prioridade;
                this.arrSolicitacao[i].proposta = dados.proposta;
                this.arrSolicitacao[i].aplicacao = dados.aplicacao;
                this.arrSolicitacao[i].equipe = dados.equipe;
                //Externo
                this.arrSolicitacao[i].fornecedor = dados.fornecedor;
                this.arrSolicitacao[i].requisicao = dados.requisicao;
                this.arrSolicitacao[i].itemRequisicao = dados.itemRequisicao;
                //Datas
                this.arrSolicitacao[i].mesAprov = dados.mesAprov;
            }
        }
    }

    deletar(id) {
        if (confirm('Deseja deletar o Item: ' + id)) {
            let tbody = document.getElementById('tBody');
            for (let i = 0; i < this.arrSolicitacao.length; i++) {
                if (this.arrSolicitacao[i].id == id) {
                    this.arrSolicitacao.splice(i, 1);
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
        for (let i = 0; i < this.arrSolicitacao.length; i++) {
            this.arrSolicitacao.splice(i, 1);
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
        for (let i = 0; i < this.arrSolicitacao.length; i++) {
            let tr = tbody.insertRow();
            let td_id = tr.insertCell();
            let td_codigoMaterial = tr.insertCell();
            let td_descricaoMaterial = tr.insertCell();
            let td_qtdeMaterial = tr.insertCell();
            let td_valorUnit = tr.insertCell();
            let td_valorReal = tr.insertCell();
            let td_aplicacao = tr.insertCell();
            let td_solicitante = tr.insertCell();
            let td_equipe = tr.insertCell();
            let td_acoes = tr.insertCell();

            td_id.innerText = this.arrSolicitacao[i].id;
            td_codigoMaterial.innerText = this.arrSolicitacao[i].codigoMaterial;
            td_descricaoMaterial.innerText = this.arrSolicitacao[i].descricaoMaterial;
            td_qtdeMaterial.innerText = this.arrSolicitacao[i].qtdeMaterial;
            td_valorUnit.innerText = this.arrSolicitacao[i].valorUnit;
            td_valorReal.innerText = this.arrSolicitacao[i].valorReal;
            td_solicitante.innerText = this.arrSolicitacao[i].solicitante;
            td_aplicacao.innerText = this.arrSolicitacao[i].aplicacao;
            td_equipe.innerText = this.arrSolicitacao[i].equipe;

            let imgEdit = document.createElement('img');
            imgEdit.src = '../../images/icons/edit.png';
            imgEdit.setAttribute('onclick', 'itemSolic.preparaEdicao(' + JSON.stringify(this.arrSolicitacao[i]) + ')');

            let imgLixo = document.createElement('img');
            imgLixo.src = '../../images/icons/lixo.png';
            imgLixo.setAttribute('onclick', 'itemSolic.deletar(' + this.arrSolicitacao[i].id + ')');

            td_acoes.appendChild(imgEdit);
            td_acoes.appendChild(imgLixo);
        }
    }
    calcularTotalReal() {
        var valor = 0;
        for (let i = 0; i < this.arrSolicitacao.length; i++) {
            valor += parseFloat(this.arrSolicitacao[i].valorReal);

        }
        return valor;
    }
    cancelar() {
        this.editId = null;
        //Material
        itemSolic.codigoMaterial = document.getElementById('codigoMaterial').value = '';
        itemSolic.unidadeMaterial = document.getElementById('unidadeMaterial').value = '';
        itemSolic.qtdeMaterial = document.getElementById('qtdeMaterial').value = '';
        itemSolic.valorUnit = document.getElementById('valorUnit').value = '';
        itemSolic.valorReal = document.getElementById('valorReal').value = '';
        itemSolic.descricaoMaterial = document.getElementById('descricaoMaterial').value = '';
        //Centro de Custo
        itemSolic.codigoCCusto = document.getElementById('codigoCCusto').value = '';
        itemSolic.descricaoCCusto = document.getElementById('descricaoCCusto').value = '';
        //Aplicação
        itemSolic.prioridade = document.getElementById('prioridade').value = '';
        itemSolic.proposta = document.getElementById('proposta').value = '';
        itemSolic.aplicacao = document.getElementById('aplicacao').value = '';
        itemSolic.equipe = document.getElementById('equipe').value = '';
        //Externo
        itemSolic.fornecedor = document.getElementById('fornecedor').value = '';
        itemSolic.requisicao = document.getElementById('requisicao').value = '';
        itemSolic.itemRequisicao = document.getElementById('itemRequisicao').value = '';
        //Datas e Botão de Salvar
        itemSolic.mesAprov = document.getElementById('mesAprov').value = '';
        document.getElementById('btnInsertAtt').innerText = 'Salvar';
    }

    enviarBD() {
        var rbPeriodoValor;
        if (document.getElementById('rbPeriodoSafra').checked) {
            rbPeriodoValor = 'safra';
        }

        if (document.getElementById('rbPeriodoEntreSafra').checked) {
            rbPeriodoValor = 'entre_safra';
        }
        this.arrSolicitacao
        for (let i = 0; i < this.arrSolicitacao.length; i++) {
            dados = {
                codigoMaterial: this.arrSolicitacao[i].codigoMaterial,
                unidadeMaterial: this.arrSolicitacao[i].unidadeMaterial,
                qtdeMaterial: this.arrSolicitacao[i].qtdeMaterial,
                valorUnit: this.arrSolicitacao[i].valorUnit,
                valorReal: this.arrSolicitacao[i].valorReal,
                descricaoMaterial: this.arrSolicitacao[i].descricaoMaterial,
                codigoCCusto: this.arrSolicitacao[i].codigoCCusto,
                descricaoCCusto: this.arrSolicitacao[i].descricaoCCusto,
                prioridade: this.arrSolicitacao[i].prioridade,
                proposta: this.arrSolicitacao[i].proposta,
                aplicacao: this.arrSolicitacao[i].aplicacao,
                fornecedor: this.arrSolicitacao[i].fornecedor,
                requisicao: this.arrSolicitacao[i].requisicao,
                itemRequisicao: this.arrSolicitacao[i].itemRequisicao,
                mesAprov: this.arrSolicitacao[i].mesAprov,
                solicitante: this.arrSolicitacao[i].solicitante,
                statusSolic: this.arrSolicitacao[i].statusSolic,
                dataAprovacao: this.arrSolicitacao[i].dataAprovacao,
                dataAutoriz: this.arrSolicitacao[i].dataAutoriz,
                periodo: rbPeriodoValor,
                equipe: this.arrSolicitacao[i].equipe
            }
            $.post('../../dao/eng/cadastroDAO.php', dados, function(retorno) {
                if (retorno.queryString == null) {
                    alert("Erro ao efetuar a solicitação do Material:\n" + retorno.errorInfo[2]);
                } else {
                    confirm("Material solicitado com sucesso");
                    location.reload();
                }
            }, "json");
        }
    }
}
itemSolic = new SolicitacaoMaterial();