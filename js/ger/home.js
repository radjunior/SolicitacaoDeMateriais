//DataTable
$.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
        if ($("#iptFiltroMes").val() == data[5]) {
            return true;
        } else {
            return false;
        }
    }
);
$(document).ready(function() {
    $('.numbersComprasTotal').mask('#.##0,00', { reverse: true });
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

    $('#iptFiltroMes').change(function() {
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