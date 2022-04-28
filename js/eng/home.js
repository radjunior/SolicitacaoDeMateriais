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
//DataTable
$(document).ready(function() {
    $('#TabelaHome').DataTable();
});

$('.numbersComprasTotal').mask('##.##0,00',{reverse: true});
$('#itemTabelaValores').mask('##.##0,00',{reverse: true});

$('#tBody tbody tr').each(function () {
    // Recuperar todas as colunas da linha percorida
    var colunas = $(this).children();
    var pedidos = [];
    // Criar objeto para armazenar os dados
    var pedido = {
        'itemTableValorUnitario': $(colunas[0]).text(), // valor da coluna Produto
        'itemTableValorReal': $(colunas[1]).text() // Valor da coluna Quantidade
    };

    // Adicionar o objeto pedido no array
    pedidos.push(pedido);
    console.log(pedidos);
});
