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
    var button = event.relatedTarget
    var materialId = button.getAttribute('data-bs-materialId')
    var materialCodigo = button.getAttribute('data-bs-materialCodigo')
    var materialDescricao = button.getAttribute('data-bs-materialDescricao')
    var materialRealUnit = button.getAttribute('data-bs-materialRealUnit')
    var materialRealTotal = button.getAttribute('data-bs-materialRealTotal')
    var materialSolicitante = button.getAttribute('data-bs-materialSolicitante')
    var materialAplicacao = button.getAttribute('data-bs-materialAplicacao');
    document.querySelector("[name='materialId']").value = `${materialId}`;
    document.querySelector("[name='materialCodigo']").value = `${materialCodigo}`;
    document.querySelector("[name='materialDescricao']").value = `${materialDescricao}`;
    document.querySelector("[name='materialRealUnit']").value = `R$ ${materialRealUnit}`;
    document.querySelector("[name='materialRealTotal']").value = `R$ ${materialRealTotal}`;
    document.querySelector("[name='materialSolicitante']").value = `${materialSolicitante}`;
    document.querySelector("[name='materialAplicacao']").value = `${materialAplicacao}`;
})

$('.numbersComprasTotal').mask('000.000.000.000.000,00', { reverse: true });

var data = new Date();
var dia = data.getDate();
var mes = data.getMonth() + 1;
var ano = data.getFullYear();

if (mes <= 9) {
    mes = "0" + mes;
}

var dataCompleta = dia + "/" + mes + "/" + ano;
document.getElementById('dataAtual').value = dataCompleta;

function reprovar() {
    var dataHoje = dataCompleta;
    var txtCodigo = document.querySelector("[name='materialId']").value;
    $.ajax({
        url: '../../dao/crd/reprovar.php',
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
//DataTable
$(document).ready(function() {
    $('#TabelaHome').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    });
});