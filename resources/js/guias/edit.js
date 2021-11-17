$(function(){

    $('ficha_id').on('change', onSelectFichaChange);

});

function onSelectFichaChange() {
    
    var ficha_id = $(this).val();
    alert(ficha_id); 
    
}