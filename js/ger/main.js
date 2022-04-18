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
})