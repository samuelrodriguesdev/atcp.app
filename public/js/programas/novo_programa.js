  $(document).ready(function(){
    $( '#programa-form' ).validator();
    $('.add_field').click(function(e){ 
        e.preventDefault();
        var id     = this.id,
        clone  = $(this).closest('div#additional_'+id).children().last().clone(),
        label  = clone.find('label'),
        span   = clone.find('span.remove'),
        button = clone.find('#'+id);
        clone.find('input:text, input[type="hidden"]').each(function(index) {
            var name   = $(this).attr('name'),
            field  = clone.find('input[name="'+name+'"]');
            name   = name.replace(/\[(\d+)\]/, function(str,p1) {
                return '[' + (parseInt(p1,10)+1) + ']';
            });
            $(field, clone).attr('name', name);
            $(clone.find('input:text'), clone).val('');
        });
        $(label, clone).remove();
        $(span, clone).remove();
        $(button, clone)
        .removeClass('bg-green add_field')
        .addClass('btn-danger remove_field')
        .html('<i class="fa fa-minus"></i>');
        clone.appendTo('#additional_'+id);
    });
    
    $(document).on('click', '.remove_field', function(e) {
        event.preventDefault();
        var id = this.id;
        $(this).closest('div#div_'+id).remove();
    });

    $('input').on('ifToggled', function(e){
        e.preventDefault();
        $(this).closest('.form-group').find('input:text, input:hidden').attr('disabled', !this.checked);
        $(this).closest('.form-group').find('.add_field').attr('disabled', !this.checked);
        $(this).closest('.col-md-6').find('.form-group').not(':first').remove();
    });
    
    $('input').iCheck({
        checkboxClass : 'icheckbox_flat-green',
        radioClass    : 'iradio_flat-green',
        increaseArea  : '20%' 
    });
    $('#ias_valor_1, #ias_valor_2').keyup(function(e) {
       var value = $(this).val(),
           total = (value*ias).toFixed(2);

       $(this).next().next().attr('value', total);
       
    });
});