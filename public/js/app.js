$(document).ready(function(){
    // Fonction pour initialiser un modal avec les mêmes paramètres
    function initializeModal(modalId) {
        $(modalId).modal({
            backdrop: 'static',
            keyboard: false
        });
    }

    // Initialiser les modals
    initializeModal('#formTontine');
    initializeModal('#basicModal_edit');
    initializeModal('#payTontine');
    initializeModal('#basicModal');
    initializeModal('#formTirage');
    initializeModal('#formTontine');
    initializeModal('#paymentForm');
    initializeModal('#userForm');
});
