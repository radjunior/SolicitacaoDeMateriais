//DataTable
$.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
        if (($('#cptSolicitante').val() == "" || $('#cptSolicitante').val() == data[5]) &&
            ($('#cptStatus').val() == "" || $('#cptStatus').val() == data[8]) &&
            ($('#cptPriord').val() == "" || $('#cptPriord').val() == data[11]) &&
            ($('#iptFiltroMes').val() == "" || $('#iptFiltroMes').val() == data[7])) {
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
                target: 2,
                render: DataTable.render.number(null, null, 0, null),
            },
            {
                target: 3,
                render: DataTable.render.number(null, null, 2, 'R$ '),
            },
            {
                target: 4,
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
        if (($('#cptSolicitante').val() == "" || $('#cptSolicitante').val() == data[5]) &&
            ($('#cptStatus').val() == "" || $('#cptStatus').val() == data[8]) &&
            ($('#cptPriord').val() == "" || $('#cptPriord').val() == data[11]) &&
            ($('#iptFiltroMes').val() == "" || $('#iptFiltroMes').val() == data[7])) {
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