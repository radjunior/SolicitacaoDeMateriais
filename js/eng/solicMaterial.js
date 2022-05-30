//Máscara
$(document).ready(function() {
    // Máscara R$
    $('#valorUnit').mask('#.##0,00', { reverse: true });
    $('#valorReal').mask('000.000.000.000.000,00', { reverse: true });
    table = $('#tabelaPrincipal').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.12.0/i18n/pt-BR.json'
        },
        columnDefs: [{
                target: 1,
                render: DataTable.render.number(null, null, 0, null),
            },
            {
                target: 2,
                render: DataTable.render.number(null, null, 2, 'R$ '),
            },
            {
                target: 3,
                render: DataTable.render.number(null, null, 2, 'R$ '),
            }
        ],
    });
});

$("#btnLimparZipProposta").click(function() {
    console.log("limpar!")
    $("#zipProposta").val("");
});

$("#btnLimparZipRequisicao").click(function() {
    console.log("limpar!")
    $("#zipItemRequisicao").val("");
});

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
 * Updates the thumbnail on a drop zone element.
 *
 * @param {HTMLElement} dropZoneElement
 * @param {File} file
 */
function updateThumbnail(dropZoneElement, file) {
    let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

    // First time - remove the prompt
    if (dropZoneElement.querySelector(".drop-zone__prompt")) {
        dropZoneElement.querySelector(".drop-zone__prompt").remove();
    }

    // First time - there is no thumbnail element, so lets create it
    if (!thumbnailElement) {
        thumbnailElement = document.createElement("div");
        thumbnailElement.classList.add("drop-zone__thumb");
        dropZoneElement.appendChild(thumbnailElement);
    }

    thumbnailElement.dataset.label = file.name;

    // Show thumbnail for image files
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
    eventoInput1.addEventListener('keyup', calcularValor);
    eventoInput1.addEventListener('keydown', calcularValor);
    eventoInput1.addEventListener('keypress', calcularValor);

    var eventoInput2 = window.document.getElementById('qtdeMaterial');
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