/*
 * Função que executa quando o site é carregado por completo
 */
$(document).ready(function() {
    // Inserindo data de hoje formatada no corpo do site
    document.getElementById('dataInsert').value = getDataHoje();

    // Definindo máscara padrão BRL na digitação reversa
    $('#valorUnit').mask('#.##0,00', { reverse: true });

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
 * Tarefa que permite o acesso ao explorer do Windows para fazer upload de um arquivo qualquer
 */

document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
    const dropZoneElement = inputElement.closest(".drop-zone");

    dropZoneElement.addEventListener("click", (e) => {
        inputElement.click();
    });

    inputElement.addEventListener("change", (e) => {
        if (inputElement.files.length) {
            updateThumbnail(dropZoneElement, inputElement.files[0]);
        }
    });

    dropZoneElement.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropZoneElement.classList.add("drop-zone--over");
    });

    ["dragleave", "dragend"].forEach((type) => {
        dropZoneElement.addEventListener(type, (e) => {
            dropZoneElement.classList.remove("drop-zone--over");
        });
    });

    dropZoneElement.addEventListener("drop", (e) => {
        e.preventDefault();

        if (e.dataTransfer.files.length) {
            inputElement.files = e.dataTransfer.files;
            updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
        }

        dropZoneElement.classList.remove("drop-zone--over");
    });
});

/**
 * Atualiza a miniatura em um elemento de zona para soltar.
 *
 * @param {HTMLElement} dropZoneElement
 * @param {File} file
 */
function updateThumbnail(dropZoneElement, file) {
    let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

    // Primeira vez - remova o prompt
    if (dropZoneElement.querySelector(".drop-zone__prompt")) {
        dropZoneElement.querySelector(".drop-zone__prompt").remove();
    }

    // Primeira vez - não há elemento de miniatura, então vamos criá-lo
    if (!thumbnailElement) {
        thumbnailElement = document.createElement("div");
        thumbnailElement.classList.add("drop-zone__thumb");
        dropZoneElement.appendChild(thumbnailElement);
    }

    thumbnailElement.dataset.label = file.name;

    // Exibir imagem do arquivo
    if (file.type.startsWith("image/")) {
        const reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = () => {
            thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
        };
    } else {
        thumbnailElement.style.backgroundImage = null;
    }
}

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
                var valorSemFormatar = retorno.preco;
                var valorFormatado = valorSemFormatar.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                });
                $("input[name='valorUnit']").val(valorFormatado);
            }, "json");
            document.addEventListener('keydown', function(event) {
                var code = event.keyCode || event.which;
                if (code === 9) {
                    $.get('../../dao/eng/buscarMaterial.php', dados, function(retorno) {
                        $("input[name='codigoMaterial']").val(retorno.codigo);
                    }, "json");
                }
            });
        }
    }
});
/*
 * Função que busca o Material pela descrição sempre quando há entrada dentro do Input '#pesquisaMaterial'
 */

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

/*
 * Função que busca o Centro de Custo pelo código sempre quando há entrada dentro do Input '#codigoCCusto'
 */

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
                    $.get('../../dao/eng/buscarCCusto.php', dados, function(retorno) {
                        $("input[name='codigoCCusto']").val(retorno.codigo);
                    }, "json");
                }
            });
        }
    }

});

/*
 * Função que busca o Centro de Custo pela descrição sempre quando há entrada dentro do Input '#pesquisaCentroCusto'
 */

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
/*
 * Função que calcula o (valor unitário * qtde do material) sempre quando há entrada de dados nos respectivos input's
 */

$(function() {
    // Capturar evento de entrada de dados no Input do valor unitário
    var eventoInput1 = window.document.getElementById('valorUnit');
    eventoInput1.addEventListener('keyup', calcularValor);
    eventoInput1.addEventListener('keydown', calcularValor);
    eventoInput1.addEventListener('keypress', calcularValor);

    // Capturar evento de entrada de dados no Input da qtde do material
    var eventoInput2 = window.document.getElementById('qtdeMaterial');
    eventoInput2.addEventListener('keyup', calcularValor);
    eventoInput2.addEventListener('keydown', calcularValor);
    eventoInput2.addEventListener('keypress', calcularValor);

    // Cálculo
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
        // Retornando para o site
        document.querySelector("[name='valorReal']").value = retorno;
    }
});

/*
 * Enviar Mateiral do Modal de Pesquisa de Materiais para os Campos do Card
 */

function receberCodigoMaterialModal(codigo) {
    $('#tBodyModalMaterial').html("");
    document.getElementById('pesquisaMaterial').value = "";

    dados = { itemCodigo: codigo }
    $.get('../../dao/eng/buscarMaterial.php', dados, function(retorno) {
        $("input[name='codigoMaterial']").val(retorno.codigo);
        $("textarea[name='descricaoMaterial']").val(retorno.material);
        $("input[name='unidadeMaterial']").val(retorno.unidade);
    }, "json");
}

/*
 * Enviar Centro de Custo do Modal de Pesquisa de Centro de Custo para os Campos do Card
 */

function receberCodigoCentroCustoModal(codigo) {
    $('#tBodyModalCentroCusto').html("");
    document.getElementById('pesquisaCentroCusto').value = "";

    dados = { itemCodigo: codigo }
    $.get('../../dao/eng/buscarCCusto.php', dados, function(retorno) {
        $("input[name='codigoCCusto']").val(retorno.codigo);
        $("input[name='descricaoCCusto']").val(retorno.descricao);
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