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
        <label for="contrato_tipo">Tipo de Apoio</label>
        <div class="radio">
            <label>
                <input type="radio" id="criacao" name="contrato_tipo" value="1" {{ $contrato->contrato_tipo ==1 ? 'checked' : '' }}>
                Apoio á Criação
            </label>
            <label>
                <input type="radio" id="consolidacao" name="contrato_tipo" value="2" {{ $contrato->contrato_tipo ==2 ? 'checked' : '' }}>
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
                <label for="data_inicio_servico">Data de Inicio do Apoio</label>
                <input type="text" name="data_inicio_servico" class="form-control date" value="{{$contrato->data_inicio_servico }}">
            </div>
            <div class="form-group has-feedback col-md-6 col-xs-6">
                <label for="data_fim_servico">Data de Fim do Apoio</label>
                <input type="text" name="data_fim_servico"  class="form-control date" value="{{$contrato->data_fim_servico }}">
            </div>
        </div>
        <div class="row" id="apoio_a_criacao" {{ $contrato->contrato_tipo ==1 ? '' : 'style=display:none;' }}>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="elaboracao_candidatura" value="1" id="apoio_criacao" {{ $contrato->detalhes()->where('tipo', 3)->count() > 0 ? 'checked' : '' }}>
                    Elaboração da Candidatura
                </label>
            </div>
        </div>
        <div class="row" id="apoio_a_consolidacao" {{ $contrato->contrato_tipo ==2 ? '' : 'style=display:none;' }}>
            <div class="checkbox">
                <label>
                <input type="checkbox" name="consultoria_chk" value="1" id="consultoria" {{ $contrato->detalhes()->where('tipo', 2)->count() > 0 ? 'checked' : '' }}>
                    Consultoria
                </label>
                <label>
                    <input type="checkbox" name="formacao_chk" value="1" id="formacao" {{ $contrato->detalhes()->where('tipo', 1)->count() > 0 ==1 ? 'checked' : '' }}>
                    Formação
                </label>
            </div>
        </div>
        @if( $contrato->detalhes()->where('tipo', 2)->count() > 0 )
        <hr style="border: 0; height: 1px;  background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));" id="consultoria_hr">
        <?php $first = true; ?>
        <div class="consultoria_container">
            @foreach( $contrato->detalhes()->where('tipo', 2)->get() as $detalhe)
            <div class="row hidden_inputs consultoria_div" id="consultoria_div" {{ $contrato->detalhes->where('tipo', 2)->count() > 0 ? '' : 'style=display:none;' }} >
                <input type="hidden" name="consultoria[ {{ $detalhe->id }} ][tipo]" class="form-control" value="2">
                <div class="form-group has-feedback col-md-3 col-xs-3">
                    <label for="valor_hora">Trim./Ano</label>
                    <div class="input-group">
                        <select name="consultoria[ {{ $detalhe->id }} ][trimestre]" class="inputTrimestre form-control custom-control">
                            <option value="1" {{ $detalhe->trimestre == 1 ? 'selected' : '' }}>1</option>
                            <option value="2" {{ $detalhe->trimestre == 2 ? 'selected' : '' }}>2</option>
                            <option value="3" {{ $detalhe->trimestre == 3 ? 'selected' : '' }}>3</option>
                            <option value="4" {{ $detalhe->trimestre == 4 ? 'selected' : '' }}>4</option>
                        </select>
                        <select name="consultoria[ {{ $detalhe->id }} ][ano]" class="inputAno form-control custom-control">
                            <option value="2010" {{ $detalhe->ano == 2010 ? 'selected' : '' }} >2010</option>
                            <option value="2011" {{ $detalhe->ano == 2011 ? 'selected' : '' }} >2011</option>
                            <option value="2012" {{ $detalhe->ano == 2012 ? 'selected' : '' }} >2012</option>
                            <option value="2013" {{ $detalhe->ano == 2013 ? 'selected' : '' }} >2013</option>
                            <option value="2014" {{ $detalhe->ano == 2014 ? 'selected' : '' }} >2014</option>
                            <option value="2015" {{ $detalhe->ano == 2015 ? 'selected' : '' }} >2015</option>
                            <option value="2016" {{ $detalhe->ano == 2016 ? 'selected' : '' }} >2016</option>
                            <option value="2017" {{ $detalhe->ano == 2017 ? 'selected' : '' }} >2017</option>
                            <option value="2018" {{ $detalhe->ano == 2018 ? 'selected' : '' }} >2018</option>
                            <option value="2019" {{ $detalhe->ano == 2019 ? 'selected' : '' }} >2019</option>
                            <option value="2020" {{ $detalhe->ano == 2020 ? 'selected' : '' }} >2020</option>
                            <option value="2021" {{ $detalhe->ano == 2021 ? 'selected' : '' }} >2021</option>
                            <option value="2022" {{ $detalhe->ano == 2022 ? 'selected' : '' }} >2022</option>
                            <option value="2023" {{ $detalhe->ano == 2023 ? 'selected' : '' }} >2023</option>
                            <option value="2024" {{ $detalhe->ano == 2024 ? 'selected' : '' }} >2024</option>
                            <option value="2025" {{ $detalhe->ano == 2025 ? 'selected' : '' }} >2025</option>
                            <option value="2026" {{ $detalhe->ano == 2026 ? 'selected' : '' }} >2026</option>
                            <option value="2027" {{ $detalhe->ano == 2027 ? 'selected' : '' }} >2027</option>
                            <option value="2028" {{ $detalhe->ano == 2028 ? 'selected' : '' }} >2028</option>
                            <option value="2029" {{ $detalhe->ano == 2029 ? 'selected' : '' }} >2029</option>
                            <option value="2030" {{ $detalhe->ano == 2030 ? 'selected' : '' }} >2030</option> 
                        </select>
                    </div>
                </div>
                <div class="form-group has-feedback col-md-3 col-xs-3">
                    <label for="numero_horas_consultoria">NºHoras Consultoria</label>
                    <input type="text" name="consultoria[ {{ $detalhe->id }} ][numero_horas]" class="form-control numero_horas2" value="{{ $detalhe->numero_horas }}">
                </div>
                <div class="form-group has-feedback col-md-2 col-xs-2">
                    <label for="valor_hora_consultoria">€/H</label>
                    <input type="text" name="consultoria[ {{ $detalhe->id }} ][valor_hora]" class="form-control valor_hora2" value="{{ $detalhe->valor_hora }}">
                </div>
                <div class="form-group has-feedback col-md-2 col-xs-2">
                    <label for="total_consultoria">Total</label>
                    <input type="text" name="consultoria[ {{ $detalhe->id }} ][total]" id="total_consultoria" class="form-control" value="{{ $detalhe->total }}" readonly>
                </div>
                <div class="form-group has-feedback col-md-2 col-xs-2 rmv_btn">
                    @if (!$first)
                    <label for="rm-btn">&nbsp;</label><br>
                    <button class="btn btn-flat bg-red remove_btn" data-div="consultoria_div" id="rm-btn" type="button"><i class="fa fa-minus"></i></button>
                    @endif
                </div>
            </div>
            <?php $first = false; ?>
            @endforeach
        </div>
        <div class="row hidden_inputs" id="consultoria_add_btn"  {{ $contrato->detalhes->where('tipo', 2)->count() > 0 ? '' : 'style=display:none;' }}>
            <div class="form-group has-feedback col-md-6 col-xs-6">
                <button class="btn btn-flat bg-green add_btn" type="button" data-div="consultoria_container" data-remove="consultoria_div"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        @else
        <hr style="display:none; border: 0; height: 1px;  background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));" id="consultoria_hr">
        <div class="consultoria_container">
            <div class="row hidden_inputs consultoria_div" id="consultoria_div" style="display:none;">
                <input type="hidden" name="consultoria[99999][tipo]" class="form-control" value="2">
                <div class="form-group has-feedback col-md-3 col-xs-3">
                    <label for="valor_hora">Trim./Ano</label>
                    <div class="input-group">
                        <select name="consultoria[99999][trimestre]" class="inputTrimestre form-control custom-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <select name="consultoria[99999][ano]" class="inputAno form-control custom-control">
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
                    <input type="text" name="consultoria[99999][numero_horas]" class="form-control numero_horas2">
                </div>
                <div class="form-group has-feedback col-md-2 col-xs-2">
                    <label for="valor_hora_consultoria">€/H</label>
                    <input type="text" name="consultoria[99999][valor_hora]" class="form-control valor_hora2">
                </div>
                <div class="form-group has-feedback col-md-2 col-xs-2">
                    <label for="total_consultoria">Total</label>
                    <input type="text" name="consultoria[99999][total]" id="total_consultoria" class="form-control" readonly>
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
        @endif
        @if( $contrato->detalhes()->where('tipo', 1)->count() > 0 )
        <hr style="border: 0; height: 1px;  background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));" id="consultoria_hr">
        <?php $first = true; ?>
        <div class="formacao_container">
            @foreach( $contrato->detalhes()->where('tipo', 1)->get() as $detalhe)
            <div class="row hidden_inputs formacao_div" id="formacao_div" {{ $contrato->detalhes->where('tipo', 1)->count() > 0 ? '' : 'style=display:none;' }}>
                <input type="hidden" name="formacao[ {{ $detalhe->id }} ][tipo]" class="form-control" value="1">
                <div class="form-group has-feedback col-md-3 col-xs-3">
                    <label for="valor_hora">Trim./Ano</label>
                    <div class="input-group">
                        <select name="formacao[ {{ $detalhe->id }} ][trimestre]" class="inputTrimestre form-control custom-control">
                            <option value="1" {{ $detalhe->trimestre == 1 ? 'selected' : '' }}>1</option>
                            <option value="2" {{ $detalhe->trimestre == 2 ? 'selected' : '' }}>2</option>
                            <option value="3" {{ $detalhe->trimestre == 3 ? 'selected' : '' }}>3</option>
                            <option value="4" {{ $detalhe->trimestre == 4 ? 'selected' : '' }}>4</option>
                        </select>
                        <select name="formacao[ {{ $detalhe->id }} ][ano]" class="inputAno form-control custom-control">
                            <option value="2010" {{ $detalhe->ano == 2010 ? 'selected' : '' }} >2010</option>
                            <option value="2011" {{ $detalhe->ano == 2011 ? 'selected' : '' }} >2011</option>
                            <option value="2012" {{ $detalhe->ano == 2012 ? 'selected' : '' }} >2012</option>
                            <option value="2013" {{ $detalhe->ano == 2013 ? 'selected' : '' }} >2013</option>
                            <option value="2014" {{ $detalhe->ano == 2014 ? 'selected' : '' }} >2014</option>
                            <option value="2015" {{ $detalhe->ano == 2015 ? 'selected' : '' }} >2015</option>
                            <option value="2016" {{ $detalhe->ano == 2016 ? 'selected' : '' }} >2016</option>
                            <option value="2017" {{ $detalhe->ano == 2017 ? 'selected' : '' }} >2017</option>
                            <option value="2018" {{ $detalhe->ano == 2018 ? 'selected' : '' }} >2018</option>
                            <option value="2019" {{ $detalhe->ano == 2019 ? 'selected' : '' }} >2019</option>
                            <option value="2020" {{ $detalhe->ano == 2020 ? 'selected' : '' }} >2020</option>
                            <option value="2021" {{ $detalhe->ano == 2021 ? 'selected' : '' }} >2021</option>
                            <option value="2022" {{ $detalhe->ano == 2022 ? 'selected' : '' }} >2022</option>
                            <option value="2023" {{ $detalhe->ano == 2023 ? 'selected' : '' }} >2023</option>
                            <option value="2024" {{ $detalhe->ano == 2024 ? 'selected' : '' }} >2024</option>
                            <option value="2025" {{ $detalhe->ano == 2025 ? 'selected' : '' }} >2025</option>
                            <option value="2026" {{ $detalhe->ano == 2026 ? 'selected' : '' }} >2026</option>
                            <option value="2027" {{ $detalhe->ano == 2027 ? 'selected' : '' }} >2027</option>
                            <option value="2028" {{ $detalhe->ano == 2028 ? 'selected' : '' }} >2028</option>
                            <option value="2029" {{ $detalhe->ano == 2029 ? 'selected' : '' }} >2029</option>
                            <option value="2030" {{ $detalhe->ano == 2030 ? 'selected' : '' }} >2030</option> 
                        </select>
                    </div>
                </div>
                <div class="form-group has-feedback col-md-3 col-xs-3">
                    <label for="numero_horas_formacao">NºHoras Formação</label>
                    <input type="text" name="formacao[ {{ $detalhe->id }} ][numero_horas]" class="form-control numero_horas2" value="{{ $detalhe->numero_horas }}">
                </div>
                <div class="form-group has-feedback col-md-2 col-xs-2">
                    <label for="valor_hora_formacao">€/H</label>
                    <input type="text" name="formacao[ {{ $detalhe->id }} ][valor_hora]" class="form-control valor_hora2" value="{{ $detalhe->valor_hora }}">
                </div>
                <div class="form-group has-feedback col-md-2 col-xs-2">
                    <label for="total_formacao">Total</label>
                    <input type="text" name="formacao[ {{ $detalhe->id }} ][total]" id="total_formacao" class="form-control" value="{{ $detalhe->total }}" readonly>
                </div>
                <div class="form-group has-feedback col-md-2 col-xs-2 rmv_btn">
                    @if (!$first)
                    <label for="rm-btn">&nbsp;</label><br>
                    <button class="btn btn-flat bg-red remove_btn" data-div="formacao_div" type="button"><i class="fa fa-minus"></i></button>
                    @endif
                </div>
            </div>
            <?php $first = false; ?>
            @endforeach
        </div>
        <div class="row hidden_inputs" id="formacao_add_btn"  {{ $contrato->detalhes->where('tipo', 1)->count() > 0 ? '' : 'style=display:none;' }}>
            <div class="form-group has-feedback col-md-4 col-xs-4">
                <button class="btn btn-flat bg-green add_btn" type="button" data-div="formacao_container" data-remove="formacao_div"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        @else
        <hr style="display:none; border: 0; height: 1px;  background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));" id="formacao_hr">
        <div class="formacao_container">
            <div class="row hidden_inputs formacao_div" id="formacao_div" style="display:none;">
                <input type="hidden" name="formacao[99999][tipo]" class="form-control" value="1">
                <div class="form-group has-feedback col-md-3 col-xs-3">
                    <label for="valor_hora">Trim./Ano</label>
                    <div class="input-group">
                        <select name="formacao[99999][trimestre]" class="inputTrimestre form-control custom-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <select name="formacao[99999][ano]" class="inputAno form-control custom-control">
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
                    <input type="text" name="formacao[99999][numero_horas]" class="form-control numero_horas2">
                </div>
                <div class="form-group has-feedback col-md-2 col-xs-2">
                    <label for="valor_hora_formacao">€/H</label>
                    <input type="text" name="formacao[99999][valor_hora]" class="form-control valor_hora2">
                </div>
                <div class="form-group has-feedback col-md-2 col-xs-2">
                    <label for="total_formacao">Total</label>
                    <input type="text" name="formacao[99999][total]" id="total_formacao" class="form-control" readonly>
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
        @endif

        <?php $first = true; ?>
        @if( $contrato->detalhes()->where('tipo', 3)->count() > 0 )
        <div class="apoio_criacao_container">
            @foreach( $contrato->detalhes()->where('tipo', 3)->get() as $detalhe)
            <div class="row hidden_inputs apoio_criacao_div" id="apoio_criacao_div" {{ $contrato->detalhes->where('tipo', 3)->count() > 0 ? '' : 'style=display:none;' }}>
                <input type="hidden" name="apoio_criacao[ {{ $detalhe->id }} ][tipo]" class="form-control" value="3">
                <div class="form-group has-feedback col-md-4 col-xs-4">
                    <label for="valor_hora">Trim./Ano</label>
                    <div class="input-group">
                        <select name="apoio_criacao[ {{ $detalhe->id }} ][trimestre]" class="inputTrimestre form-control custom-control">
                            <option value="1" {{ $detalhe->trimestre == 1 ? 'selected' : '' }}>1</option>
                            <option value="2" {{ $detalhe->trimestre == 2 ? 'selected' : '' }}>2</option>
                            <option value="3" {{ $detalhe->trimestre == 3 ? 'selected' : '' }}>3</option>
                            <option value="4" {{ $detalhe->trimestre == 4 ? 'selected' : '' }}>4</option>
                        </select>
                        <select name="apoio_criacao[ {{ $detalhe->id }} ][ano]" class="inputAno form-control custom-control">
                            <option value="2010" {{ $detalhe->ano == 2010 ? 'selected' : '' }} >2010</option>
                            <option value="2011" {{ $detalhe->ano == 2011 ? 'selected' : '' }} >2011</option>
                            <option value="2012" {{ $detalhe->ano == 2012 ? 'selected' : '' }} >2012</option>
                            <option value="2013" {{ $detalhe->ano == 2013 ? 'selected' : '' }} >2013</option>
                            <option value="2014" {{ $detalhe->ano == 2014 ? 'selected' : '' }} >2014</option>
                            <option value="2015" {{ $detalhe->ano == 2015 ? 'selected' : '' }} >2015</option>
                            <option value="2016" {{ $detalhe->ano == 2016 ? 'selected' : '' }} >2016</option>
                            <option value="2017" {{ $detalhe->ano == 2017 ? 'selected' : '' }} >2017</option>
                            <option value="2018" {{ $detalhe->ano == 2018 ? 'selected' : '' }} >2018</option>
                            <option value="2019" {{ $detalhe->ano == 2019 ? 'selected' : '' }} >2019</option>
                            <option value="2020" {{ $detalhe->ano == 2020 ? 'selected' : '' }} >2020</option>
                            <option value="2021" {{ $detalhe->ano == 2021 ? 'selected' : '' }} >2021</option>
                            <option value="2022" {{ $detalhe->ano == 2022 ? 'selected' : '' }} >2022</option>
                            <option value="2023" {{ $detalhe->ano == 2023 ? 'selected' : '' }} >2023</option>
                            <option value="2024" {{ $detalhe->ano == 2024 ? 'selected' : '' }} >2024</option>
                            <option value="2025" {{ $detalhe->ano == 2025 ? 'selected' : '' }} >2025</option>
                            <option value="2026" {{ $detalhe->ano == 2026 ? 'selected' : '' }} >2026</option>
                            <option value="2027" {{ $detalhe->ano == 2027 ? 'selected' : '' }} >2027</option>
                            <option value="2028" {{ $detalhe->ano == 2028 ? 'selected' : '' }} >2028</option>
                            <option value="2029" {{ $detalhe->ano == 2029 ? 'selected' : '' }} >2029</option>
                            <option value="2030" {{ $detalhe->ano == 2030 ? 'selected' : '' }} >2030</option> 
                        </select>
                    </div>
                </div>
                <div class="form-group has-feedback col-md-3 col-xs-3 div_valor_hora">
                    <label for="valor_hora">% EC</label>
                    <input type="text" name="apoio_criacao[ {{ $detalhe->id }} ][valor_hora]" class="form-control valor_hora" value="{{ $detalhe->valor_hora }}">
                </div>
                <div class="form-group has-feedback col-md-3 col-xs-3">
                    <label for="total">Total</label>
                    <input type="text" name="apoio_criacao[ {{ $detalhe->id }} ][total]" class="form-control total_elaboracao_candidatura" value="{{ $detalhe->total }}" readonly>
                </div>   
                <div class="form-group has-feedback col-md-2 col-xs-2 rmv_btn">
                    @if (!$first)
                    <label for="rm-btn">&nbsp;</label><br>
                    <button class="btn btn-flat bg-red remove_btn" data-div="apoio_criacao_div" type="button"><i class="fa fa-minus"></i></button>
                    @endif
                </div>
            </div>
            <?php $first = false; ?>
            @endforeach
        </div>
        <div class="row hidden_inputs" id="apoio_criacao_add_btn"  {{ $contrato->detalhes->where('tipo', 3)->count() > 0 ? '' : 'style=display:none;' }}>
            <div class="form-group has-feedback col-md-6 col-xs-6">
                <button class="btn btn-flat bg-green add_btn" type="button" data-div="apoio_criacao_container" data-remove="apoio_criacao_div"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        @else
        <div class="apoio_criacao_container">
            <div class="row hidden_inputs apoio_criacao_div" id="apoio_criacao_div" style="display:none;">
                <input type="hidden" name="apoio_criacao[99999][tipo]" class="form-control" value="3">
                <div class="form-group has-feedback col-md-4 col-xs-4">
                    <label for="valor_hora">Trim./Ano</label>
                    <div class="input-group">
                        <select name="apoio_criacao[99999][trimestre]" class="inputTrimestre form-control custom-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <select name="apoio_criacao[99999][ano]" class="form-control inputAno custom-control">
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
                    <input type="text" name="apoio_criacao[99999][valor_hora]" class="form-control valor_hora">
                </div>
                <div class="form-group has-feedback col-md-3 col-xs-3">
                    <label for="total">Total</label>
                    <input type="text" name="apoio_criacao[99999][total]" class="form-control total_elaboracao_candidatura" readonly>
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
        @endif
    </div> <!-- modal -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Fechar</button>
        <button id="updateConsultor" type="submit" class="btn btn-primary btn-flat">Guardar</button>
    </div>
</form> 
<?php $mte = App\Projectos::find($contrato->projecto_id)->montante_total_elegivel;?>
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
