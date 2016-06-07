<style>
    .datepicker{ z-index:1200 !important; }
</style>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Detalhes Consultor</h4>
</div>
<div class="modal-body">
    <form id="updateConsultorForm" action="{{ url('projecto/update_consultor/'.$contrato->id) }}" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <label for="contrato_tipo">Tipo de Contrato</label>
        <div class="radio">
            <label>
                <input type="radio" id="criacao" name="contrato_tipo" value="1" {{ $contrato->contrato_tipo ==1 ? 'checked' : '' }} >
                Apoio á Criação
            </label>
            <label>
                <input type="radio" id="consolidacao" name="contrato_tipo" value="2" {{ $contrato->contrato_tipo ==2 ? 'checked' : '' }} >
                Apoio á Consolidação
            </label>
        </div>
        <div class="form-group has-feedback">
            <label for="consultor_id">Consultor</label>
            <select name="consultor_id" id="consultores_select" class="form-control" required="required" style="width:100%;">
            <option value="{{  $contrato->consultor->id }}">{{  $contrato->consultor->nome }}</option>
            </select>
        </div>

        <div class="row">
            <div class="form-group has-feedback col-md-6 col-xs-6">
                <label for="data_inicio_servico">Data de Inicio do Contrato</label>
                <input type="text" name="data_inicio_servico" class="form-control date" value="{{$contrato->data_inicio_servico }}">
            </div>
            <div class="form-group has-feedback col-md-6 col-xs-6">
                <label for="data_fim_servico">Data de Fim do Contrato</label>
                <input type="text" name="data_fim_servico"  class="form-control date" value="{{$contrato->data_fim_servico }}">
            </div>
        </div>
        <div class="row" id="apoio_a_criacao" {{ $contrato->contrato_tipo ==1 ? '' : 'style=display:none;' }}>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="elaboracao_candidatura" value="1" id="apoio_criacao" {{ $contrato->elaboracao_candidatura ==1 ? 'checked' : '' }}>
                    Elaboração da Candidatura
                </label>
            </div>
        </div>
        <div class="row" id="apoio_a_consolidacao" {{ $contrato->contrato_tipo ==2 ? '' : 'style=display:none;' }}>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="consultoria" value="1" id="consultoria" {{ $contrato->consultoria ==1 ? 'checked' : '' }}>
                    Consultoria
                </label>
                <label>
                    <input type="checkbox" name="formacao" value="1" id="formacao" {{ $contrato->formacao ==1 ? 'checked' : '' }}>
                    Formação
                </label>
            </div>
        </div>
        <div class="row hidden_inputs" id="consultoria_div" {{ $contrato->consultoria ==1 ? '' : 'style=display:none;' }}>
            <div class="form-group has-feedback col-md-4 col-xs-4">
                <label for="numero_horas_consultoria">NºHoras Consultoria</label>
                <input type="text" name="numero_horas_consultoria" id="numero_horas_consultoria" class="form-control" value="{{ $contrato->numero_horas_consultoria }}">
            </div>
            <div class="form-group has-feedback col-md-4 col-xs-4">
                <label for="valor_hora_consultoria">€/H</label>
                <input type="text" name="valor_hora_consultoria" id="valor_hora_consultoria" class="form-control" value="{{ $contrato->valor_hora_consultoria }}">
            </div>
            <div class="form-group has-feedback col-md-4 col-xs-4">
                <label for="total_consultoria">Total</label>
                <input type="text" name="total_consultoria" id="total_consultoria" class="form-control" value="{{ $contrato->total_consultoria }}" readonly>
            </div>
        </div>
        <div class="row hidden_inputs" id="formacao_div" {{ $contrato->formacao ==1 ? '' : 'style=display:none;' }}>
            <div class="form-group has-feedback col-md-4 col-xs-4">
                <label for="numero_horas_formacao">NºHoras Formação</label>
                <input type="text" name="numero_horas_formacao" id="numero_horas_formacao" class="form-control" value="{{ $contrato->numero_horas_formacao }}" >
            </div>
            <div class="form-group has-feedback col-md-4 col-xs-4">
                <label for="valor_hora_formacao">€/H</label>
                <input type="text" name="valor_hora_formacao" id="valor_hora_formacao" class="form-control" value="{{ $contrato->valor_hora_formacao }}">
            </div>
            <div class="form-group has-feedback col-md-4 col-xs-4">
                <label for="total_formacao">Total</label>
                <input type="text" name="total_formacao" id="total_formacao" class="form-control" value="{{ $contrato->total_formacao }}" readonly>
            </div>
        </div>
        <div class="row hidden_inputs" id="apoio_criacao_div" {{ $contrato->elaboracao_candidatura ==1 ? '' : 'style=display:none;' }}>
            <div class="form-group has-feedback col-md-8 col-xs-8">
                <label for="numero_horas_apoio_criacao">% Elaboração da Candidatura</label>
                <input type="text" name="percentagem_elaboracao_candidatura" id="percentagem_elaboracao_candidatura" value="{{ $contrato->percentagem_elaboracao_candidatura }}" class="form-control">
            </div>
            <div class="form-group has-feedback col-md-4 col-xs-4">
                <label for="total_apoio_criacao">Total</label>
                <input type="text" name="total_elaboracao_candidatura" id="total_elaboracao_candidatura" class="form-control" value="{{ $contrato->total_elaboracao_candidatura }}" readonly>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Fechar</button>
        <button id="updateConsultor" type="submit" class="btn btn-primary btn-flat">Guardar</button>
    </div>
</form> 
<script type="text/javascript">

    $('#updateConsultor').click(function(e) {
        e.preventDefault()
        var formRequest = $('#'+this.id+'Form').attr('action');
        $.post( formRequest, $( '#'+this.id+'Form' ).serialize() ).always(function(){
            location.reload();
        });
        
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

    $('#consultoria, #formacao, #apoio_criacao').on('ifToggled', function(e){
        e.preventDefault();
        $('div#'+this.id+'_div').toggle();
    });

    $('#criacao, #consolidacao').on('ifToggled', function(e){
        e.preventDefault();
        $('.hidden_inputs').hide();
        $('#consultoria, #formacao, #apoio_criacao').iCheck('uncheck');
        $('div#apoio_a_'+this.id).toggle();
    });  

    $('#valor_hora_consultoria, #valor_hora_formacao').keyup(function(e) {
        var e = this.value, 
        h = $(this).closest('.row').find('input:first').val();
        $(this).closest('.row').find('input:last').val(h*e);
    });

    $('#percentagem_elaboracao_candidatura').keyup(function(e) {
        var e = this.value;
        $(this).closest('.row').find('input:last').val(((e/100)*((419.22)*(2.5))).toFixed(2));
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
</script>
