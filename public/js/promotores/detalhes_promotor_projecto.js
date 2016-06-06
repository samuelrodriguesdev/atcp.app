$(document).ready(function() {

    $( '.date' ).datepicker({
        autoclose : true,
        language : "pt",
        format: "dd-mm-yyyy"
    });

    $('input').iCheck({
        checkboxClass : 'icheckbox_flat-green',
        radioClass    : 'iradio_flat-green',
        increaseArea  : '20%' 
    });

    $( '#hab_literarias' ).select2({
        ajax: {
            url: config.url+'/hab_literarias',
            dataType: 'json',
            cache: true,
            data: function (params) {
                return {
                    search : params.term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.designacao,
                            id: item.designacao
                        };
                    })
                };
            }
        }
    });

    function formatOption (option) {
        if (!option.id) { return 'Loading...'; }
        var $option = $('<span> <b> [ '+option.organismo+' ]</b> - '+ option.tecnico +'</span>');
        return $option;
    }

    function formatOptions (option) {  
        return option.tecnico || option.text;
    }

    $( '#tecnico_responsavel_1_input, #tecnico_responsavel_2_input' ).select2({
        ajax: {
            url: config.url+'/select/tecnicos',
            dataType: 'json',
            data: function (params) {
                return {
                    term : params.term || '',
                    page : params.page || 1
                }
            },
            cache: true
        },
        escapeMarkup: function(markup) { return markup; },
        templateResult: formatOption,
        templateSelection: formatOptions
    });

    $( '#programa_id' ).select2({
        minimumResultsForSearch: Infinity,
        ajax: {
            url: config.url+'/select/programas',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    term : params.term || '',
                    page : params.page || 1
                }
            },
            cache: true
        },
    }).on('select2:select', function (){
        var programa = this.value;
        $.ajax({
            url: config.url+'/select/apoios',
            dataType: "json",
            data: { programa: programa }
        }).success(function(data){
            $('.apoio_criacao').iCheck(data.apoio_criacao);
            $('.apoio_consolidacao').iCheck(data.apoio_consolidacao);  
        });
    });

    $('.apoio_criacao, .apoio_consolidacao').on('ifToggled', function(e){
        e.preventDefault();
        var apoio = $(this).attr('data-value'), 
        programa = $('#programa_id').val();
        $('#apoio_'+apoio).toggle();
       
        $.ajax({
            url: config.url+'/select/programa_documentos',
            dataType: "json",
            data: { programa: programa, apoio: apoio }
        }).success(function(data) {
            chks = data.results;
            $('#apoio_'+apoio).html('');
            $.each(chks, function(index, obj) {
                var label = $("<label>").text('  '+obj.designacao);
                var div   = $('<div>', { class: 'checkbox' });
                $('<input>', {
                    type  : "checkbox",
                    name  : "projecto_documentos[]",
                    value : obj.id
                }).prependTo(label);
                label.prependTo(div);
                $('#apoio_'+apoio).append(div);
                $('#apoio_'+apoio+' input').iCheck({
                    checkboxClass : 'icheckbox_flat-green',
                    increaseArea  : '20%' 
                });
            });
        });
    });

    $('input').on('ifToggled', function(e){
        e.preventDefault();
        var toggle = this.id;
        $('#'+toggle+'_input').attr('disabled', !this.checked).val('').trigger('change');

    });

    $('.toggle').on('ifChecked', function(e){
        e.preventDefault();
        var display =  $(this).closest('.form-group').next('.to_toggle');
        display.toggle('slide', { direction: 'left' }, 'fast');  
        display.find('input:text').attr('disabled', !!!parseInt(this.value));
    });

    $('.situacao_profissional').on('ifClicked', function(e){
        if (this.value == 2) {
            $('div.tipo_desemprego').find('input[name="tipo_desemprego"]').iCheck('enable');
            $('div.tipo_desemprego').show();
        } 
        else {
            $('div.tipo_desemprego').find('input[name="tipo_desemprego"]').iCheck('disable');
            $('div.tipo_desemprego').hide();            
        }   
    });

    $('.negocio_proprio').on('ifChecked', function(e){
        e.preventDefault();
        var status = {
            true  : "enable", 
            false : "disable", 
        };

        var display =  $('div.optional');
        display.toggle('slide', { direction: 'left' });
        display.find('input').iCheck(status[!!parseInt(this.value)]);

        var optional = display.parent().prev();
        optional.toggle('slide', { direction: 'right' });
        optional.find('input').iCheck(status[!!!parseInt(this.value)]);
    });

    $('.add_field').click(function(e){ 
        e.preventDefault();
        var id     = this.id,
        clone  = $(this).closest('div#additional'+id).children().last().clone(),
        label  = clone.find('label'),
        button = clone.find('#'+id);
        clone.find('input:hidden, input:text').each(function(index) {
            var name   = $(this).attr('name'),
            field  = clone.find('input[name="'+name+'"]');
            name   = name.replace(/\[(\d+)\]/, function(str,p1) {
                return '[' + (parseInt(p1,10)+1) + ']';
            }); 
            $(field, clone).attr('name', name);
            $(clone.find('input:text'), clone).val('');
        });
        $(label, clone).remove();
        $(button, clone)
        .removeClass('bg-green add_field')
        .addClass('btn-danger remove_field')
        .html('<i class="fa fa-minus"></i>');
        clone.appendTo('#additional'+id);
    });

    $(document).on('click', '.remove_field', function(e) {
        event.preventDefault();
        var id = this.id;
        $(this).closest('div.div'+id).remove();
    });

    $(document).on('click', '.dropdown-menu > li', function(e) {
        e.preventDefault();
        var selected = $(this).text();
        $(this).closest('div.div_contato').find('.contato_tipo').val(selected);
        $(this).closest('div.div_contato').find('.dropdown_text').text(selected);
    });

    $('#projecto_data_fim, #projecto_data_inicio').on('changeDate', function(e) {

        function stringToDate(date) { 
            if (date) {
                var pattern = /^(\d{1,2})\-(\d{1,2})\-(\d{4})$/;
                var arrayDate = date.match(pattern);
                return new Date(arrayDate[3], arrayDate[2] - 1, arrayDate[1]);
            }
        }

        function calcMonths(date1, date2){
            var months;
            if (date1 && date2) {
                months   = (date2.getFullYear() - date1.getFullYear()) * 12;

                months  -= date1.getMonth()+1;
                months  += date2.getMonth();
                
                months  += date1.getDate() <= 15 ? 1 : 0;
                months  += date2.getDate() >= 15 ? 1 : 0;
            }
            return months;
        }
        function calcPlafond(months) {
            if (months) {
                var total;
                total = (months/24)*(6*ias)*0.4+(0.6*6*ias);
                return total.toFixed(2);
            }
        }
        date1 =  stringToDate( $('#projecto_data_inicio').val() ) ;
        date2 =  stringToDate( $('#projecto_data_fim').val() ) ;
        var months = calcMonths(date1, date2);
        var total  = calcPlafond(months);
        $('#numero_meses').val(months <= 0 ? 0 : months);
        $('#montante_total_elegivel').val(total <= 0 ? 0 : total);
    });
 

});