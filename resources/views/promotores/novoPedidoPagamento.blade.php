<style>
    .datepicker{ z-index:1200 !important; }
</style>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Novo Pedido</h4>
</div>
<div class="modal-body">
    <form id="novoConsultorForm" action="{{ url('projecto/post_consultor') }}" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <input type="hidden" name="projecto_id" value="{{ $projecto }}">
        <label for="contrato_tipo">Tipo de Contrato</label>
        <div class="radio">
            <label>
                <input type="radio" name="contrato_tipo" value="1" checked="checked">
                Apoio á Criação
            </label>
            <label>
                <input type="radio" name="contrato_tipo" value="2">
                Apoio á Consolidação
            </label>
        </div>
        <div class="form-group has-feedback">
            <label for="consultor_id">Consultor</label>
            <select name="consultor_id" id="consultores_select" class="form-control" required="required" style="width:100%;">
            </select>
        </div>

        <div class="row">
            <div class="form-group has-feedback col-md-6 col-xs-6">
                <label for="data_inicio_servico">Data de Inicio do Contrato</label>
                <input type="text" name="data_inicio_servico" class="form-control date">
            </div>
            <div class="form-group has-feedback col-md-6 col-xs-6">
                <label for="data_fim_servico">Data de Fim do Contrato</label>
                <input type="text" name="data_fim_servico"  class="form-control date">
            </div>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="consultoria" value="1" id="consultoria">
                Consultoria
            </label>
            <label>
                <input type="checkbox" name="formacao" value="1" id="formacao">
                Formação
            </label>
        </div>
        <div class="row" id="consultoria_div" style="display:none;">
            <div class="form-group has-feedback col-md-4 col-xs-4">
                <label for="numero_horas_consultoria">NºHoras Consultoria</label>
                <input type="text" name="numero_horas_consultoria" id="numero_horas_consultoria" class="form-control">
            </div>
            <div class="form-group has-feedback col-md-4 col-xs-4">
                <label for="valor_hora_consultoria">€/H</label>
                <input type="text" name="valor_hora_consultoria" id="valor_hora_consultoria" class="form-control">
            </div>
            <div class="form-group has-feedback col-md-4 col-xs-4">
                <label for="total_consultoria">Total</label>
                <input type="text" name="total_consultoria" id="total_consultoria" class="form-control" readonly>
            </div>
        </div>
        <div class="row" id="formacao_div" style="display:none;">
            <div class="form-group has-feedback col-md-4 col-xs-4">
                <label for="numero_horas_formacao">NºHoras Formação</label>
                <input type="text" name="numero_horas_formacao" id="numero_horas_formacao" class="form-control">
            </div>
            <div class="form-group has-feedback col-md-4 col-xs-4">
                <label for="valor_hora_formacao">€/H</label>
                <input type="text" name="valor_hora_formacao" id="valor_hora_formacao" class="form-control">
            </div>
            <div class="form-group has-feedback col-md-4 col-xs-4">
                <label for="total_formacao">Total</label>
                <input type="text" name="total_formacao" id="total_formacao" class="form-control" readonly>
            </div>
        </div> 
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Fechar</button>
        <button id="novoConsultor" type="submit" class="btn btn-primary btn-flat">Guardar</button>
    </div>
</form> 
<script type="text/javascript">

    $('#novoConsultor').click(function(e) {
        e.preventDefault()
        var formRequest = $('#'+this.id+'Form').attr('action');
        $.post( formRequest, $( '#'+this.id+'Form' ).serialize() );
        location.reload();
    });

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

    $('#consultoria, #formacao').on('ifToggled', function(e){
        e.preventDefault();
        $('div#'+this.id+'_div').toggle();
    });  

    $('#valor_hora_consultoria, #valor_hora_formacao').keyup(function(e) {
        var e = this.value, 
        h = $(this).closest('.row').find('input:first').val();
        $(this).closest('.row').find('input:last').val(h*e);
    });

    function formatOption (option) {
        if (!option.id) { return 'Loading...'; }
        var $option = $('<span> '+option.consultor+'  <b> | Projectos: ['+ option.total +'] <b> </span>');
        return $option;
    }
    function formatOptions (option) {  
        return option.consultor || option.text;
    }
    $( '#consultores_select' ).select2({
        ajax: {
            url: config.url+'/select/consultores_projecto',
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

    $
</script>
