class Produto {
    constructor() {
        this.id = 1;
        this.arrayCadastro = [];
        this.editId = null;
    }
    lerDados() {
        let pess = {};
        pess.id = this.id;
        pess.nome = document.getElementById('txtNome').value;
        pess.idade = document.getElementById('txtIdade').value;
        return pess;
    }
    salvar() {
        let dados = this.lerDados();

        if (this.validaCampo(dados)) {
            if (this.editId == null) {
                this.adicionarArr(dados);
            } else {
                this.atualizarDados(this.editId, dados);
            }
        }
        this.listaTabela();
        this.cancelar();
    }
    validaCampo(arr) {
        let msg = '';
        if (arr.nome == '') {
            msg += 'Informe o Nome\n';
        }

        if (arr.idade == '') {
            msg += 'Informe a Idade\n';
        }

        if (msg != '') {
            alert(msg);
            return false;
        }

        return true;
    }
    adicionarArr(arr) {
        this.arrayCadastro.push(arr);
        this.id++;
    }
    listaTabela() {
        let tbody = document.getElementById('tBody');
        tbody.innerText = '';
        for (let i = 0; i < this.arrayCadastro.length; i++) {
            let tr = tbody.insertRow();
            let td_id = tr.insertCell();
            let td_nome = tr.insertCell();
            let td_idade = tr.insertCell();
            let td_acoes = tr.insertCell();

            td_id.innerText = this.arrayCadastro[i].id;
            td_nome.innerText = this.arrayCadastro[i].nome;
            td_idade.innerText = this.arrayCadastro[i].idade;

            let imgEdit = document.createElement('img');
            imgEdit.src = '../images/icons/edit.svg';
            imgEdit.setAttribute('onclick', 'pess.preparaEdicao(' + JSON.stringify(this.arrayCadastro[i]) + ')');

            let imgLixo = document.createElement('img');
            imgLixo.src = '../images/icons/lixo.svg';
            imgLixo.setAttribute('onclick', 'pess.deletar(' + this.arrayCadastro[i].id + ')');

            td_acoes.appendChild(imgEdit);
            td_acoes.appendChild(imgLixo);
        }
    }
    preparaEdicao(dados) {
        this.editId = dados.id;
        document.getElementById('txtNome').value = dados.nome;
        document.getElementById('txtIdade').value = dados.idade;
        document.getElementById('btn1').innerText = 'Atualizar'
    }
    atualizarDados(id, dados) {
        for (let i = 0; i < this.arrayCadastro.length; i++) {
            if (this.arrayCadastro[i].id == id) {
                this.arrayCadastro[i].nome = dados.nome;
                this.arrayCadastro[i].idade = dados.idade;
            }
        }
    }
    cancelar() {
        pess.nome = document.getElementById('txtNome').value = '';
        pess.idade = document.getElementById('txtIdade').value = '';
        this.editId = null;
        document.getElementById('btn1').innerText = 'Salvar';
    }
    deletar(id) {
        if (confirm('Deseja deletar o Item: ' + id)) {
            let tbody = document.getElementById('tBody');
            for (let i = 0; i < this.arrayCadastro.length; i++) {
                if (this.arrayCadastro[i].id == id) {
                    this.arrayCadastro.splice(i, 1);
                    tbody.deleteRow(i);
                }
            }
        }
    }
}
pess = new Produto();