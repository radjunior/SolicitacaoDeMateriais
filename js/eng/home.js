$(function() {
    $('#btnFiltrar').click(listarTabelaHome);

    function listarTabelaHome() {
        var inputFiltroMes = $('#iptFiltroMes').val();
        if (inputFiltroMes != '') {
            dados = {
                item: inputFiltroMes
            }
            $.get('../../dao/filtrarDataAprovacao.php', dados, function(retorno) {
                $('#tbodyHome').html(retorno);
            });
        }
    }
});
//DataTable
$(document).ready(function() {
    $('#TabelaHome').DataTable({
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

$('.numbersComprasTotal').mask('#.##0,00', { reverse: true });