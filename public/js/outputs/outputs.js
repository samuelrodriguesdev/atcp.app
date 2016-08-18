$(document).ready(function(){
    $('#ano').select2({
        placeholder: '',
        allowClear: true,
        ajax: {
            url: config.url+'/select/pp_years',
            dataType: 'json',
            data: function (params) {
                return {
                    term : params.term || '',
                    page : params.page || 1
                }
            },
            cache: true
        },
    });
    $('#centro_emprego').select2({
        placeholder: '',
        allowClear: true,
        ajax: {
            url: config.url+'/select/lista_organismos',
            dataType: 'json',
            data: function (params) {
                return {
                    term : params.term || '',
                    page : params.page || 1
                }
            },
            cache: true
        },
    });

    $('#programa').select2({
        placeholder: '',
        allowClear: true,
        ajax: {
            url: config.url+'/select/programas',
            dataType: 'json',
            data: function (params) {
                return {
                    term : params.term || '',
                    page : params.page || 1
                }
            },
            cache: true
        },
    });

    $('#estado_pedido_pagamento, #tipo_de_apoio').select2();

    $('input').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'icheckbox_flat-green',
        increaseArea: '20%' 
    });

    $( "#export" ).click(function( event ) {
        event.preventDefault();
        window.open('output/pedidosPagamento?'+$( ':input' ).serialize(), '_blank');
    });

    $( "#export_promotores" ).click(function( event ) {
        event.preventDefault();
        window.open('output/promotores?'+$( ':input' ).serialize(), '_blank');
    });

    $( "#export_consultores" ).click(function( event ) {
        event.preventDefault();
        window.open('output/consultores?'+$( ':input' ).serialize(), '_blank');
    });
});