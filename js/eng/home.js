//DataTable
$.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
        if ($("#iptFiltroMes").val() == data[6]) {
            return true;
        } else {
            return false;
        }
    }
);
$(document).ready(function() {
    $('.numbersComprasTotal').mask('#.##0,00', { reverse: true });
    // $('.iptSomaRealTotal').mask('#.##0,00', { reverse: true });
    var table = $('#TabelaHome').DataTable({
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
    /*var qtdeStatusAprovar;
    var qtdeStatusAprovado;
    var qtdeStatusAutorizado;*/
    $('#iptFiltroMes').change(function() {
        /*qtdeStatusAprovar = 0;
        qtdeStatusAprovado = 0;
        qtdeStatusAutorizado = 0;
        table.column(6).data().each(function(data, index) {
            if ($("#iptFiltroMes").val() == data) {
                table.column(7).data().each(function(value, index) {
                    if (value == "APROVAR") {
                        qtdeStatusAprovar++;
                    }
                    if (value == "APROVADO") {
                        qtdeStatusAprovado++;
                    }
                    if (value == "AUTORIZADO") {
                        qtdeStatusAutorizado++;
                    }
                });
            }
        });
        $("#iptCountAprovar").val(qtdeStatusAprovar);
        $("#iptCountAprovado").val(qtdeStatusAprovado);
        $("#iptCountAutorizado").val(qtdeStatusAutorizado);*/
        table.draw();
    });
});
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