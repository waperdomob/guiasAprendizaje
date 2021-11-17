$(function(){
    alert('hola');
    $('ficha_id').on('change', onSelectFichaChange);
})
function onSelectFichaChange() {

    var ficha_id = $(this).val();
    if (!ficha_id){
        $('#aprendiz').html('<option value="">Seleccione aprendiz</option>');  
    }
    $.get('/guias/'+ficha_id+'/aprendices', function(data){
        var html_select = '<option value="">Seleccione aprendiz</option>'
        for (var i = 0; i < data.length; ++i) {
            html_select += '<option value="'+data[i].id+'">'+data[i].name+'</option>';      
            $('#aprendiz').html(html_select);        
        }
    });
}