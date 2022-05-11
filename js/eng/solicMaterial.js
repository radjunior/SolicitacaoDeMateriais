// menu toggle
let toggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
let main = document.querySelector('.main');

toggle.onclick = function() {
    navigation.classList.toggle('active');
    main.classList.toggle('active');
}

// adicionar classe HOVERED no item de lista selecionado
let list = document.querySelectorAll('.navigation li');

function activeLink() {
    list.forEach((item) =>
        item.classList.remove('hovered'));
    this.classList.add('hovered');
}
list.forEach((item) =>
    item.addEventListener('mouseover', activeLink));

//Data de Hoje
var data = new Date();
var dia = data.getDate();
var mes = data.getMonth() + 1;
var ano = data.getFullYear();
if (mes <= 9) {
    mes = "0" + mes;
}
var dataCompleta = dia + "/" + mes + "/" + ano;
document.getElementById('dataInsert').value = dataCompleta;

// Automação de busca Material por código
$(function() {
    $('#codigoMaterial').keypress(pesquisaMaterial);
    $('#codigoMaterial').keyup(pesquisaMaterial);
    $('#codigoMaterial').keydown(pesquisaMaterial);

    function pesquisaMaterial() {
        var pesquisa = $(this).val();
        if (pesquisa != '') {
            dados = {
                palavra: pesquisa
            }
            $.post('../../dao/eng/buscarMaterial.php', dados, function(retorno) {
                $("textarea[name='descricaoMaterial']").val(retorno.material);
                $("input[name='unidadeMaterial']").val(retorno.unidade);
            }, "json");
            document.addEventListener('keydown', function(event) {
                var code = event.keyCode || event.which;
                if (code === 9) {
                    $.post('../../dao/eng/buscarMaterial.php', dados, function(retorno) {
                        $("input[name='codigoMaterial']").val(retorno.codigo);
                    }, "json");
                }
            });
        }
    }
    $('#codigoCCusto').keypress(pesquisaCentroCusto);
    $('#codigoCCusto').keyup(pesquisaCentroCusto);
    $('#codigoCCusto').keydown(pesquisaCentroCusto);

    function pesquisaCentroCusto() {
        var pesquisa = $(this).val();
        if (pesquisa != '') {
            dados = {
                palavra: pesquisa
            }
            $.post('../../dao/eng/buscarCCusto.php', dados, function(retorno) {
                $("input[name='descricaoCCusto']").val(retorno.descricao);
                $("input[name='responsavelCCusto']").val(retorno.responsavel);
            }, "json");

            document.addEventListener('keydown', function(event) {
                var code = event.keyCode || event.which;
                if (code === 9) {
                    $.post('../../dao/eng/buscarCCusto.php', dados, function(retorno) {
                        $("input[name='codigoCCusto']").val(retorno.codigo);
                    }, "json");
                }
            });
        }
    }

});

// Máscara R$
$('#valorUnit').maskMoney({
    prefix: 'R$ ',
    allowNegative: true,
    thousands: '',
    decimal: '.',
    affixesStay: false
});

// Cálculo automatico dos qtde * valor Unitário
var eventoInput1 = window.document.getElementById('valorUnit');
var eventoInput2 = window.document.getElementById('qtdeMaterial');

eventoInput1.addEventListener('keyup', pegarValor);
eventoInput1.addEventListener('keydown', pegarValor);
eventoInput1.addEventListener('keypress', pegarValor);

eventoInput2.addEventListener('keyup', pegarValor);
eventoInput2.addEventListener('keydown', pegarValor);
eventoInput2.addEventListener('keypress', pegarValor);
// Função de cálculo
function pegarValor() {
    var unit = window.document.getElementById('valorUnit').value;
    var qtde = window.document.getElementById('qtdeMaterial').value;

    var StrUnit = unit.substring(3);
    var nInput1 = Number(StrUnit);
    var nInput2 = Number(qtde);
    var res = nInput1 * nInput2;
    document.querySelector("[name='valorReal']").value = `R$ ${res.toFixed(2)}`;
}