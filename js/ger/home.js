//DataTable
$.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
        if (($('#cptSolicitante').val() == "" || $('#cptSolicitante').val() == data[7]) &&
            ($('#cptStatus').val() == "" || $('#cptStatus').val() == data[8]) &&
            ($('#cptPriord').val() == "" || $('#cptPriord').val() == data[9]) &&
            ($('#iptFiltroMes').val() == "" || $('#iptFiltroMes').val() == data[6])) {
            return true;
        } else {
            return false;
        }
    }
);
$(document).ready(function() {
    $('.numbersComprasTotal').mask('#.##0,00', { reverse: true });
    var table = $('#TabelaHome').DataTable({
        paging: false,
        ordering: true,
        info: true,
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
        dom: 'Bfrtip',
        buttons: {
            dom: {
                button: {
                    className: "btn"
                }
            },
            buttons: [{
                    extend: "excel",
                    text: "Excel",
                    className: "btn btn-outline-success",
                    excelStyles: {
                        template: "cyan_medium"
                    }
                },
                {
                    extend: "print",
                    text: "Imprimir",
                }
            ]
        }
    });
    $('#iptFiltroMes').change(function() {
        atualizarCardResultados(table);
        table.draw();
    });
    $('#cptSolicitante').change(function() {
        atualizarCardResultados(table);
        table.draw();
    });
    $('#cptStatus').change(function() {
        atualizarCardResultados(table);
        table.draw();
    });
    $('#cptPriord').change(function() {
        atualizarCardResultados(table);
        table.draw();
    });
    atualizarCardResultados(table);
});

function atualizarCardResultados(table) {
    var valorTotal = 0;
    var contAprovar = 0;
    var contAprovado = 0;
    var contReprovado = 0;
    var contAutorizado = 0;
    var contDesautorizado = 0;
    $('#iptSomaRealTotal').val(valorTotal);
    $('#iptCountAprovar').val(contAprovar);
    $('#iptCountAprovado').val(contAprovado);
    $('#iptCountReprovado').val(contReprovado);
    $('#iptCountAutorizado').val(contAutorizado);
    $('#iptCountDesautorizado').val(contDesautorizado);
    table.rows().every(function() {
        var data = this.data();
        if (($('#cptSolicitante').val() == "" || $('#cptSolicitante').val() == data[7]) &&
            ($('#cptStatus').val() == "" || $('#cptStatus').val() == data[8]) &&
            ($('#cptPriord').val() == "" || $('#cptPriord').val() == data[9]) &&
            ($('#iptFiltroMes').val() == "" || $('#iptFiltroMes').val() == data[6])) {
            valorTotal += parseFloat(data[4]);
            if (data[8] == "APROVAR") {
                contAprovar++;
            } else if (data[8] == "APROVADO") {
                contAprovado++;
            } else if (data[8] == "REPROVADO") {
                contReprovado++;
            } else if (data[8] == "AUTORIZADO") {
                contAutorizado++;
            } else if (data[8] == "NAO_AUTORIZADO") {
                contDesautorizado++;
            }
        }
    });
    var valorFormatado = valorTotal.toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    });
    $('#iptSomaRealTotal').val(valorFormatado);
    $('#iptCountAprovar').val(contAprovar);
    $('#iptCountAprovado').val(contAprovado);
    $('#iptCountReprovado').val(contReprovado);
    $('#iptCountAutorizado').val(contAutorizado);
    $('#iptCountDesautorizado').val(contDesautorizado);
    valorTotal = 0;
    contAprovar = 0;
    contAprovado = 0;
    contReprovado = 0;
    contAutorizado = 0;
    contDesautorizado = 0;
}
// menu toggle
let toggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
let main = document.querySelector('.main');

toggle.onclick = function() {
    navigation.classList.toggle('active');
    main.classList.toggle('active');
}

// add hovered class in selected list item
let list = document.querySelectorAll('.navigation li');

function activeLink() {
    list.forEach((item) =>
        item.classList.remove('hovered'));
    this.classList.add('hovered');
}
list.forEach((item) =>
    item.addEventListener('mouseover', activeLink));
//Modal
var exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget
            // Extract info from data-bs-* attributes
        var materialId = button.getAttribute('data-bs-materialId')
        var materialCodigo = button.getAttribute('data-bs-materialCodigo')
        var materialDescricao = button.getAttribute('data-bs-materialDescricao')
        var materialRealUnit = button.getAttribute('data-bs-materialRealUnit')
        var materialRealTotal = button.getAttribute('data-bs-materialRealTotal')
        var materialSolicitante = button.getAttribute('data-bs-materialSolicitante')
        var materialAplicacao = button.getAttribute('data-bs-materialAplicacao');
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        document.querySelector("[name='materialId']").value = `${materialId}`;
        document.querySelector("[name='materialCodigo']").value = `${materialCodigo}`;
        document.querySelector("[name='materialDescricao']").value = `${materialDescricao}`;
        document.querySelector("[name='materialRealUnit']").value = `R$ ${materialRealUnit}`;
        document.querySelector("[name='materialRealTotal']").value = `R$ ${materialRealTotal}`;
        document.querySelector("[name='materialSolicitante']").value = `${materialSolicitante}`;
        document.querySelector("[name='materialAplicacao']").value = `${materialAplicacao}`;
    })
    // data hoje
var data = new Date();
var dia = data.getDate();
var mes = data.getMonth() + 1;
var ano = data.getFullYear();

if (mes <= 9) {
    mes = "0" + mes;
}
var dataCompleta = dia + "/" + mes + "/" + ano;
document.getElementById('dataAtual').value = dataCompleta;

function desautorizar() {
    var dataHoje = dataCompleta;
    var txtCodigo = document.querySelector("[name='materialId']").value;
    $.ajax({
        url: '../../dao/ger/desautorizar.php',
        type: 'POST',
        data: { codigo: txtCodigo, data: dataHoje },
        success: function(result) {
            if (result) {
                location.reload();
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
        }
    });
}