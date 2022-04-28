class SolicitacaoMaterial {

    constructor() {
        this.id = 1;
        this.arrSolicitacao = [];
        this.editId = null;
        this.sttAprovar = "APROVAR";
        this.dtAguardar = "AGUARDANDO";
        this.totalReal = 0;
        this.totalQtde = 0;
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
        //Externo
        arrSolic.fornecedor = document.getElementById('fornecedor').value;
        arrSolic.requisicao = document.getElementById('requisicao').value;
        arrSolic.itemRequisicao = document.getElementById('itemRequisicao').value;
        //Datas e Solicitante
        arrSolic.mesAprov = document.getElementById('mesAprov').value;
        arrSolic.dataInsert = document.getElementById('dataInsert').value;
        arrSolic.solicitante = document.getElementById('solicitante').value;


        return arrSolic;
    }

    validaCampo(dados) {
        let msg = '';

        if (dados.codigoMaterial == '') {
            msg += 'Informe o Material\n';
        }

        if (dados.qtdeMaterial == '') {
            msg += 'Informe a Qtde de Material\n';
        }

        if (dados.valorUnit == '') {
            msg += 'Informe o valor unitário\n';
        }

        if (dados.codigoCCusto == '') {
            msg += 'Informe o centro de custo\n';
        }

        if (dados.aplicacao == '') {
            msg += 'Informe a aplicação\n';
        }

        if (dados.mesAprov == '') {
            msg += 'Informe o mês de aprovação\n';
        }

        if (dados.dataInsert == '') {
            msg += 'Informe a data de inserção\n';
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
        this.totalQtde = this.calcularTotalReal();
        document.getElementById('spnQtde').innerText = this.totalQtde;
        document.getElementById('spnValorTotal').innerText = this.totalReal;
        for (let i = 0; i < this.arrSolicitacao.length; i++) {
            let tr = tbody.insertRow();
            let td_id = tr.insertCell();
            let td_descricaoMaterial = tr.insertCell();
            let td_qtdeMaterial = tr.insertCell();
            let td_valorUnit = tr.insertCell();
            let td_valorReal = tr.insertCell();
            let td_aplicacao = tr.insertCell();
            let td_solicitante = tr.insertCell();
            let td_acoes = tr.insertCell();
            td_id.innerText = this.arrSolicitacao[i].id;
            td_descricaoMaterial.innerText = this.arrSolicitacao[i].descricaoMaterial;
            td_qtdeMaterial.innerText = this.arrSolicitacao[i].qtdeMaterial;
            td_valorUnit.innerText = "R$ " + this.arrSolicitacao[i].valorUnit;
            td_valorReal.innerText = this.arrSolicitacao[i].valorReal;
            td_solicitante.innerText = this.arrSolicitacao[i].solicitante;
            td_aplicacao.innerText = this.arrSolicitacao[i].aplicacao;

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
        for (let i = 0; i < this.arrSolicitacao.length; i++) {
            let valor = this.arrSolicitacao[i].valorReal;
            valor = valor.substr(4, 0);
            let valorInt = Number(valor);
            this.totalReal += valorInt;
        }
        return 0;
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
        //Externo
        itemSolic.fornecedor = document.getElementById('fornecedor').value = '';
        itemSolic.requisicao = document.getElementById('requisicao').value = '';
        itemSolic.itemRequisicao = document.getElementById('itemRequisicao').value = '';
        //Datas e Botão de Salvar
        itemSolic.mesAprov = document.getElementById('mesAprov').value = '';
        document.getElementById('btnInsertAtt').innerText = 'Salvar';
    }

    enviarBD() {
        this.arrSolicitacao
            // console.log(dados);
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
                dataInsert: this.arrSolicitacao[i].dataInsert,
                solicitante: this.arrSolicitacao[i].solicitante,
                statusSolic: this.arrSolicitacao[i].statusSolic,
                dataAprovacao: this.arrSolicitacao[i].dataAprovacao,
                dataAutoriz: this.arrSolicitacao[i].dataAutoriz
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