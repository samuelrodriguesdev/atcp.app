$(document).ready(function() {

   var Url = config.url;

   $( '#organismo_entidade_form' ).validator();

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

   $( '#distrito_id' ).select2({
      ajax: {
         url: Url+'/distritos/list',
         dataType: 'json',
         data: function (params) {
            return {
               search : params.term,
            };
         },
         processResults: function (data, params) {
            return { 
               results : data.results,
            };
         },
         cache: true
      },
   });
});