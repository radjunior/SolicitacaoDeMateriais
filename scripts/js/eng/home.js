//DataTable
$.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
        if (($('#cptSolicitante').val() == "" || $('#cptSolicitante').val() == data[6]) &&
            ($('#cptStatus').val() == "" || $('#cptStatus').val() == data[9]) &&
            ($('#cptPriord').val() == "" || $('#cptPriord').val() == data[12]) &&
            ($('#iptFiltroMes').val() == "" || $('#iptFiltroMes').val() == data[8]) &&
            ($('#cptPeriodo').val() == "" || $('#cptPeriodo').val() == data[1]) &&
            ($('#cptEquipe').val() == "" || $('#cptEquipe').val() == data[13])) {
            return true;
        } else {
            return false;
        }
    }
);
$(document).ready(function() {
    var limateriais = document.querySelector('.limateriais');
    var liservicos = document.querySelector('.liservicos');

    document.getElementById("tab-table1").addEventListener("click", function(){
        document.getElementById('table1').style.display = 'flex'; // Materiais
        document.getElementById('table2').style.display = 'none'; // Servicos
        limateriais.classList.add('active');
        liservicos.classList.remove('active');
    })

    document.getElementById("tab-table2").addEventListener("click", function(){
        document.getElementById('table1').style.display = 'none'; // Materiais
        document.getElementById('table2').style.display = 'flex'; // Servicos
        limateriais.classList.remove('active');
        liservicos.classList.add('active');
    })
    $('.numbersComprasTotal').mask('#.##0,00', { reverse: true });

    $('#TableServicos').DataTable({
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
    }).columns.adjust();

    var table = $('#TableMaterial').DataTable({
        paging: false,
        ordering: true,
        info: true,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.12.0/i18n/pt-BR.json'
        },
        columnDefs: [{
                target: 3,
                render: DataTable.render.number(null, null, 0, null),
            },
            {
                target: 4,
                render: DataTable.render.number(null, null, 2, 'R$ '),
            },
            {
                target: 5,
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
    }).columns.adjust();

    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        $.fn.dataTable.tables({
            visible: true,
            api: true
        }).columns.adjust();
    });

    $('#cptEquipe').change(function() {
        atualizarCardResultados(table);
        table.draw();
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

    $('#cptPeriodo').change(function() {
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
        if (($('#cptSolicitante').val() == "" || $('#cptSolicitante').val() == data[6]) &&
            ($('#cptStatus').val() == "" || $('#cptStatus').val() == data[9]) &&
            ($('#cptPriord').val() == "" || $('#cptPriord').val() == data[12]) &&
            ($('#iptFiltroMes').val() == "" || $('#iptFiltroMes').val() == data[8]) &&
            ($('#cptPeriodo').val() == "" || $('#cptPeriodo').val() == data[1]) &&
            ($('#cptEquipe').val() == "" || $('#cptEquipe').val() == data[13])) {
            valorTotal += parseFloat(data[5]);
            if (data[9] == "APROVAR") {
                contAprovar++;
            } else if (data[9] == "APROVADO") {
                contAprovado++;
            } else if (data[9] == "REPROVADO") {
                contReprovado++;
            } else if (data[9] == "AUTORIZADO") {
                contAutorizado++;
            } else if (data[9] == "NAO_AUTORIZADO") {
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