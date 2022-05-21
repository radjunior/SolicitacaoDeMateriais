$(document).ready(function() {
    // Máscara R$
    $('#valorUnit').mask('#.##0,00', { reverse: true });
    $('#valorReal').mask('000.000.000.000.000,00', { reverse: true });

});
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
    $('#pesquisaMaterial').keypress(pesquisaMaterialDescricao);
    $('#pesquisaMaterial').keyup(pesquisaMaterialDescricao);
    $('#pesquisaMaterial').keydown(pesquisaMaterialDescricao);

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
$(function() {
    $('#codigoMaterial').keypress(pesquisaMaterial);
    $('#codigoMaterial').keyup(pesquisaMaterial);
    $('#codigoMaterial').keydown(pesquisaMaterial);

    function pesquisaMaterial() {
        var pesquisa = $(this).val();
        if (pesquisa != '') {
            dados = {
                itemCodigo: pesquisa
            }
            $.get('../../dao/eng/buscarMaterial.php', dados, function(retorno) {
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
});
$(function() {
    $('#pesquisaCentroCusto').keypress(pesquisaCentroCusto);
    $('#pesquisaCentroCusto').keyup(pesquisaCentroCusto);
    $('#pesquisaCentroCusto').keydown(pesquisaCentroCusto);

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
$(function() {
    $('#codigoCCusto').keypress(pesquisaCentroCusto);
    $('#codigoCCusto').keyup(pesquisaCentroCusto);
    $('#codigoCCusto').keydown(pesquisaCentroCusto);

    function pesquisaCentroCusto() {
        var pesquisa = $(this).val();
        if (pesquisa != '') {
            dados = {
                itemCodigo: pesquisa
            }
            $.get('../../dao/eng/buscarCCusto.php', dados, function(retorno) {
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

$(function() {
    var eventoInput1 = window.document.getElementById('valorUnit');
    var eventoInput2 = window.document.getElementById('qtdeMaterial');
    eventoInput1.addEventListener('keyup', calcularValor);
    eventoInput1.addEventListener('keydown', calcularValor);
    eventoInput1.addEventListener('keypress', calcularValor);
    eventoInput2.addEventListener('keyup', calcularValor);
    eventoInput2.addEventListener('keydown', calcularValor);
    eventoInput2.addEventListener('keypress', calcularValor);

    function calcularValor() {
        var qtde = window.document.getElementById('qtdeMaterial').value;
        var valorSemMascara = $("#valorUnit").cleanVal();
        valorSemMascara = valorSemMascara.toString();
        var decimal = valorSemMascara.substr(-2)
        var valor = valorSemMascara.substr(0, valorSemMascara.length - 2);
        var valorFinal = valor + "." + decimal;
        if (valorFinal.length <= 3) {
            valorFinal = valorFinal.replace(".", "");
        }
        var retorno = valorFinal * qtde;
        document.querySelector("[name='valorReal']").value = retorno;
    }
});