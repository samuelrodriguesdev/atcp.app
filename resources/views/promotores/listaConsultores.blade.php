<style>
    .datepicker { z-index:1200 !important; }
    .custom-control { width: 80% !important; }
</style>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Novo Consultor</h4>
</div>
<div class="modal-body">
    <form id="novoConsultorForm" action="{{ url('projecto/post_consultor') }}" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <input type="hidden" name="projecto_id" value="{{ $projecto }}">
        <label for="contrato_tipo">Tipo de Apoio</label>
        <div class="radio">
            <label>
                <input type="radio" id="criacao" name="contrato_tipo" value="1" checked="checked">
                Apoio á Criação
            </label>
            <label>
                <input type="radio" id="consolidacao" name="contrato_tipo" value="2">
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
                <label for="data_inicio_servico">Data de Inicio do Apoio</label>
                <input type="text" name="data_inicio_servico" class="form-control date">
            </div>
            <div class="form-group has-feedback col-md-6 col-xs-6">
                <label for="data_fim_servico">Data de Fim do Apoio</label>
                <input type="text" name="data_fim_servico"  class="form-control date">
            </div>
        </div>
        <div class="row" id="apoio_a_criacao">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="elaboracao_candidatura" value="1" id="apoio_criacao">
                    Elaboração da Candidatura
                </label>
            </div>
        </div>
        <div class="row" id="apoio_a_consolidacao" style="display:none;">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="consultoria_chk" value="1" id="consultoria">
                    Consultoria
                </label>
                <label>
                    <input type="checkbox" name="formacao_chk" value="1" id="formacao">
                    Formação
                </label>
            </div>
        </div>
        <hr style="display:none; border: 0; height: 1px;  background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));" id="consultoria_hr">
        <div class="consultoria_container">
            <div class="row hidden_inputs consultoria_div" id="consultoria_div" style="display:none;">
                <input type="hidden" name="consultoria[0][tipo]" class="form-control" value="2">
                <div class="form-group has-feedback col-md-3 col-xs-3">
                    <label for="valor_hora">Trim./Ano</label>
                    <div class="input-group">
                        <select name="consultoria[0][trimestre]" class="inputTrimestre form-control custom-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <select name="consultoria[0][ano]" class="inputAno form-control custom-control">
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option> 
                        </select>
                    </div>
                </div>
                <div class="form-group has-feedback col-md-3 col-xs-3">
                    <label for="numero_horas_consultoria">NºHoras Consultoria</label>
                    <input type="text" name="consultoria[0][numero_horas]" class="form-control numero_horas2">
                </div>
                <div class="form-group has-feedback col-md-2 col-xs-2">
                    <label for="valor_hora_consultoria">€/H</label>
                    <input type="text" name="consultoria[0][valor_hora]" class="form-control valor_hora2">
                </div>
                <div class="form-group has-feedback col-md-2 col-xs-2">
                    <label for="total_consultoria">Total</label>
                    <input type="text" name="consultoria[0][total]" id="total_consultoria" class="form-control" readonly>
                </div>
                <div class="form-group has-feedback col-md-2 col-xs-2 rmv_btn">
                </div>
            </div>
        </div>
        <div class="row hidden_inputs" id="consultoria_add_btn"  style="display:none;">
            <div class="form-group has-feedback col-md-6 col-xs-6">
                <button class="btn btn-flat bg-green add_btn" type="button" data-div="consultoria_container" data-remove="consultoria_div"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        <hr style="display:none; border: 0; height: 1px;  background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));" id="formacao_hr">
        <div class="formacao_container">
            <div class="row hidden_inputs formacao_div" id="formacao_div" style="display:none;">
                <input type="hidden" name="formacao[0][tipo]" class="form-control" value="1">
                <div class="form-group has-feedback col-md-3 col-xs-3">
                    <label for="valor_hora">Trim./Ano</label>
                    <div class="input-group">
                        <select name="formacao[0][trimestre]" class="inputTrimestre form-control custom-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <select name="formacao[0][ano]" class="inputAno form-control custom-control">
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option> 
                        </select>
                    </div>
                </div>
                <div class="form-group has-feedback col-md-3 col-xs-3">
                    <label for="numero_horas_formacao">NºHoras Formação</label>
                    <input type="text" name="formacao[0][numero_horas]" class="form-control numero_horas2">
                </div>
                <div class="form-group has-feedback col-md-2 col-xs-2">
                    <label for="valor_hora_formacao">€/H</label>
                    <input type="text" name="formacao[0][valor_hora]" class="form-control valor_hora2">
                </div>
                <div class="form-group has-feedback col-md-2 col-xs-2">
                    <label for="total_formacao">Total</label>
                    <input type="text" name="formacao[0][total]" id="total_formacao" class="form-control" readonly>
                </div>
                <div class="form-group has-feedback col-md-2 col-xs-2 rmv_btn">
                </div>
            </div>
        </div>
        <div class="row hidden_inputs" id="formacao_add_btn"  style="display:none;">
            <div class="form-group has-feedback col-md-4 col-xs-4">
                <button class="btn btn-flat bg-green add_btn" type="button" data-div="formacao_container" data-remove="formacao_div"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div class="apoio_criacao_container">
            <div class="row hidden_inputs apoio_criacao_div" id="apoio_criacao_div" style="display:none;">
                <input type="hidden" name="apoio_criacao[0][tipo]" class="form-control" value="3">
                <div class="form-group has-feedback col-md-4 col-xs-4">
                    <label for="valor_hora">Trim./Ano</label>
                    <div class="input-group">
                        <select name="apoio_criacao[0][trimestre]" class="inputTrimestre form-control custom-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <select name="apoio_criacao[0][ano]" class="form-control inputAno custom-control">
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option> 
                        </select>
                    </div>
                </div>
                <div class="form-group has-feedback col-md-3 col-xs-3 div_valor_hora">
                    <label for="valor_hora">% EC</label>
                    <input type="text" name="apoio_criacao[0][valor_hora]" class="form-control valor_hora">
                </div>
                <div class="form-group has-feedback col-md-3 col-xs-3">
                    <label for="total">Total</label>
                    <input type="text" name="apoio_criacao[0][total]" class="form-control total_elaboracao_candidatura" readonly>
                </div>   
                <div class="form-group has-feedback col-md-2 col-xs-2 rmv_btn">
                </div>
            </div>
        </div>
        <div class="row hidden_inputs" id="apoio_criacao_add_btn"  style="display:none;">
            <div class="form-group has-feedback col-md-6 col-xs-6">
                <button class="btn btn-flat bg-green add_btn" type="button" data-div="apoio_criacao_container" data-remove="apoio_criacao_div"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Fechar</button>
        <button id="novoConsultor" type="submit" class="btn btn-primary btn-flat">Guardar</button>
    </div>
</form>
<?php $mte = App\Projectos::find($projecto)->montante_total_elegivel;?>
<script type="text/javascript">
  
    $('.add_btn').click(function(e){ 
        e.preventDefault();
        var div     = $(this).data('div'),
        div_remove = $(this).data('remove'),
        clone  = $('.'+div).children().last().clone(),
        label  = clone.find('label'),
        button = clone.find('div.rmv_btn');
        $(button, clone).html('');
        clone.find(':input').each(function(index) {
            var name   = $(this).attr('name'),
            field  = clone.find('input[name="'+name+'"]');
            if (!$(this).attr('type')) {
                field  = clone.find('select[name="'+name+'"]');
            }
            name   = name.replace(/\[(\d+)\]/, function(str,p1) {
                return '[' + (parseInt(p1,10)+1) + ']';
            }); 
            $(field, clone).attr('name', name);
            $(clone.find('input:text'), clone).val('');
        });
        $(label, clone).remove();
        $(button, clone).html('<button class="btn btn-flat bg-red remove_btn" data-div="'+div_remove+'" type="button"><i class="fa fa-minus"></i></button>');
        clone.appendTo('.'+div);
    });
    $(document).on('click', '.remove_btn', function(e) {
        e.preventDefault();
        var div  = $(this).data('div');
        $(this).closest('div.'+div).remove();
    });
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
    $('#consultoria, #formacao, #apoio_criacao').on('ifToggled', function(e){
        e.preventDefault();
        $('div#'+this.id+'_div').toggle();
        $('#'+this.id+'_hr').toggle();
        $('#'+this.id+'_add_btn').toggle();
    });
    $('#criacao, #consolidacao').on('ifToggled', function(e){
        e.preventDefault();
        $('.hidden_inputs').hide();
        $('#consultoria, #formacao, #apoio_criacao').iCheck('uncheck');
        $('div#apoio_a_'+this.id).toggle();
    });  
    $(document).on('keyup', '.valor_hora2', function(e) {
        var e = this.value, 
        h = $(this).closest('.row').find('.numero_horas2').val();
        $(this).closest('.row').find('input:last').val((h*e).toFixed(2));
    });
    $(document).on('keyup', '.valor_hora', function(event) {
        var e = this.value;
        var mte = <?=$mte?>;
        $(this).closest('.row').find('input:last').val(((e/100)*((mte)*(2.5))).toFixed(2));
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
