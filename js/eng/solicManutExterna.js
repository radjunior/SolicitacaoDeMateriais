/*
 * Função que executa quando o site é carregado por completo
 */

$(document).ready(function() {
    // Inserindo data de hoje formatada no corpo do site
    document.getElementById('txtDataInsert').value = getDataHoje();

    // Inicializando Datatables
    $('#tabelaPrincipal').DataTable({
        paging: false,
        ordering: true,
        info: true,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.12.0/i18n/pt-BR.json'
        }
    });
});

/*
 * Tarefa que altera a da navbar para 'Active' a fim de recolher e exibir a navbar
 */

let toggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
let main = document.querySelector('.main');

toggle.onclick = function() {
    navigation.classList.toggle('active');
    main.classList.toggle('active');
}

/*
 * Tarefa que altera a classe do item da navbar para "HOVERED" a fim manter o mesmo selecionado
 */

let list = document.querySelectorAll('.navigation li');

function activeLink() {
    list.forEach((item) =>
        item.classList.remove('hovered'));
    this.classList.add('hovered');
}

list.forEach((item) => item.addEventListener('mouseover', activeLink));

/*
 * Função que instancia e formata a data do dia 
 */

function getDataHoje() {
    let data = new Date();
    let dia = data.getDate();
    let mes = data.getMonth() + 1;
    let ano = data.getFullYear();
    if (mes <= 9) {
        mes = "0" + mes;
    }
    return dia + "/" + mes + "/" + ano; /* dd/MM/yyyy */
}

/*
 * Função que busca o Material pelo código sempre quando há entrada dentro do Input '#codigoMaterial'
 */

$(function() {
    $('#txtCodigoMaterial').keypress(pesquisaMaterial);
    $('#txtCodigoMaterial').keyup(pesquisaMaterial);
    $('#txtCodigoMaterial').keydown(pesquisaMaterial);

    function pesquisaMaterial() {
        var pesquisa = $(this).val();
        if (pesquisa != '') {
            dados = {
                itemCodigo: pesquisa
            }
            $.get('../../dao/eng/buscarMaterial.php', dados, function(retorno) {
                $("textarea[name='txtDescricaoMaterial']").val(retorno.material);
                $("input[name='txtUnidadeMaterial']").val(retorno.unidade);
                var valorSemFormatar = retorno.preco;
                var valorFormatado = valorSemFormatar.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                });
                $("input[name='txtValorUnit']").val(valorFormatado);
            }, "json");
        }
    }
});

function validarCodigoMaterial(codigo) {
    dados = {
        itemCodigo: codigo
    }
    $.get('../../dao/eng/buscarMaterial.php', dados, function(retorno) {
        $("#txtCodigoMaterial").val(retorno.codigo);
    }, "json");
}

/*
 * Função que busca o Material pela descrição sempre quando há entrada dentro do Input '#pesquisaMaterial'
 */

$(function() {
    $('#txtPesquisaMaterial').keypress(pesquisaMaterialDescricao);
    $('#txtPesquisaMaterial').keyup(pesquisaMaterialDescricao);
    $('#txtPesquisaMaterial').keydown(pesquisaMaterialDescricao);

    function pesquisaMaterialDescricao() {
        var pesquisa = $(this).val();
        if (pesquisa != '') {
            dados = {
                itemMaterial: pesquisa
            }
            $.get('../../dao/eng/buscarMaterial.php', dados, function(retorno) {
                $('#tBodyModalMaterial').html(retorno);
            });
        }
    }
});

/*
 * Função que busca o Centro de Custo pelo código sempre quando há entrada dentro do Input '#codigoCCusto'
 */

$(function() {
    $('#txtCodigoCCusto').keypress(pesquisaCentroCusto);
    $('#txtCodigoCCusto').keyup(pesquisaCentroCusto);
    $('#txtCodigoCCusto').keydown(pesquisaCentroCusto);

    function pesquisaCentroCusto() {
        var pesquisa = $(this).val();
        if (pesquisa != '') {
            dados = {
                itemCodigo: pesquisa
            }
            $.get('../../dao/eng/buscarCCusto.php', dados, function(retorno) {
                $("input[name='txtDescricaoCCusto']").val(retorno.descricao);
            }, "json");
        }
    }
});

function validarCodigoCCusto(codigo) {
    dados = {
        itemCodigo: codigo
    }
    $.get('../../dao/eng/buscarCCusto.php', dados, function(retorno) {
        $("#txtCodigoCCusto").val(retorno.codigo);
    }, "json");
}

/*
 * Função que busca o Centro de Custo pela descrição sempre quando há entrada dentro do Input '#pesquisaCentroCusto'
 */

$(function() {
    $('#txtPesquisaCentroCusto').keypress(pesquisaCentroCusto);
    $('#txtPesquisaCentroCusto').keyup(pesquisaCentroCusto);
    $('#txtPesquisaCentroCusto').keydown(pesquisaCentroCusto);

    function pesquisaCentroCusto() {
        var pesquisa = $(this).val();
        if (pesquisa != '') {
            dados = {
                itemDescricao: pesquisa
            }
            $.get('../../dao/eng/buscarCCusto.php', dados, function(retorno) {
                $('#tBodyModalCentroCusto').html(retorno);
            });
        }
    }
});

/*
 * Função que busca o Serviço pelo código sempre quando há entrada dentro do Input '#txtCodigoServico'
 */

$(function() {
    $('#txtCodigoServico').keypress(pesquisaMaterial);
    $('#txtCodigoServico').keyup(pesquisaMaterial);
    $('#txtCodigoServico').keydown(pesquisaMaterial);

    function pesquisaMaterial() {
        var pesquisa = $(this).val();
        if (pesquisa != '') {
            dados = {
                itemCodigo: pesquisa
            }
            $.get('../../dao/eng/buscarMaterial.php', dados, function(retorno) {
                $("textarea[name='txtDescricaoServico']").val(retorno.material);
            }, "json");
        }
    }
});

function validarCodigoServico(codigo) {
    dados = {
        itemCodigo: codigo
    }
    $.get('../../dao/eng/buscarMaterial.php', dados, function(retorno) {
        $("#txtCodigoServico").val(retorno.codigo);
    }, "json");
}


/*
 * Função que calcula o (valor unitário * qtde do material) sempre quando há entrada de dados nos respectivos input's
 */

$(function() {
    // Capturar evento de entrada de dados no Input do valor unitário
    var eventoInput1 = document.getElementById('txtValorUnit');
    eventoInput1.addEventListener('keydown', calcularValor);

    // Capturar evento de entrada de dados no Input da qtde do material
    var eventoInput2 = document.getElementById('txtQtdeMaterial');
    eventoInput2.addEventListener('keydown', calcularValor);

    // Cálculo
    function calcularValor() {
        var qtde = document.getElementById('txtQtdeMaterial').value;
        var valor = document.getElementById('txtValorUnit').value;
        var retorno = valor * qtde;
        // Retornando para o site
        document.querySelector("[name='txtValorReal']").value = retorno.toFixed(2);
    }
});

/*
 * Enviar Mateiral do Modal para os Campos do Card
 */

function receberCodigoMaterialModal(codigo) {
    $('#tBodyModalMaterial').html("");
    document.getElementById('txtPesquisaMaterial').value = "";

    dados = { itemCodigo: codigo }
    $.get('../../dao/eng/buscarMaterial.php', dados, function(retorno) {
        $("input[name='txtCodigoMaterial']").val(retorno.codigo);
        $("textarea[name='txtDescricaoMaterial']").val(retorno.material);
        $("input[name='txtUnidadeMaterial']").val(retorno.unidade);
    }, "json");
}

/*
 * Enviar Centro de Custo do Modal de Pesquisa para os Campos do Card
 */

function receberCodigoCentroCustoModal(codigo) {
    $('#tBodyModalCentroCusto').html("");
    document.getElementById('txtPesquisaCentroCusto').value = "";

    dados = { itemCodigo: codigo }
    $.get('../../dao/eng/buscarCCusto.php', dados, function(retorno) {
        $("input[name='txtCodigoCCusto']").val(retorno.codigo);
        $("input[name='txtDescricaoCCusto']").val(retorno.descricao);
    }, "json");
}

/*
 * Lógica do Rádio Buttom
 */

function alterarRbSafra() {
    document.getElementById('rbPeriodoSafra').checked = true;
    document.getElementById('rbPeriodoEntreSafra').checked = false;
    document.getElementById('divEquipe').style.display = 'none';
}

function alterarRbEntreSafra() {
    document.getElementById('rbPeriodoEntreSafra').checked = true;
    document.getElementById('rbPeriodoSafra').checked = false;
    document.getElementById('divEquipe').style.display = '';
}

/*
 * Matriz de Gut 
 */

function calcularMatrizGut() {
    var g = document.getElementById('rgGravidade').value;
    var u = document.getElementById('rgUrgencia').value;
    var t = document.getElementById('rgTendencia').value;

    document.getElementById('lblGravidade').innerText = g;
    document.getElementById('lblUrgencia').innerText = u;
    document.getElementById('lblTendencia').innerText = t;

    var res = (g * u * t);

    document.getElementById('spnPrioridade').innerText = res;
    document.getElementById('txtPrioridade').value = res;

}

/*
 * Lógica de validação de campos do formulário
 */


$("#formCadastroManutEx").on('submit', (function(e) {
    let msg = '';

    if (document.getElementById('txtCodigoMaterial').value == '') {
        msg += 'Informe o código do Material\n';
    }

    if (document.getElementById('txtQtdeMaterial').value == '') {
        msg += 'Informe a qtde de Material\n';
    }

    if (document.getElementById('txtCodigoServico').value == '') {
        msg += 'Informe o código do Serviço\n';
    }

    if (document.getElementById('txtCodigoCCusto').value == '') {
        msg += 'Informe o código do Centro de Custo\n';
    }

    if (document.getElementById('txtDefeitoObs').value == '') {
        msg += 'Informe o Defeito/obs\n';
    }

    if (document.getElementById('txtAplicacao').value == '') {
        msg += 'Informe a Aplicação\n';
    }

    if (document.getElementById('txtFornecedor').value == '') {
        msg += 'Informe o Fornecedor\n';
    }

    if (msg != '') {
        alert(msg);
        e.preventDefault();
    }
}));