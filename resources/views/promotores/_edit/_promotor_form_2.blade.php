<div class="box">
    <div class="box-body">
        <div class="form-group has-feedback">
            <label for="programa_id">Programa</label>
            <select name="programa_id" id="programa_id" class="form-control" style="width: 100%;" required="required">
                <option value="{{ $promotor->projecto->programa->id }}">{{ $promotor->projecto->programa->designacao }}</option>
            </select>
            <div class="help-block with-errors"></div>
        </div>
        <div class="row">
            <div class="form-group has-feedback col-md-6">
                <label for="apoio_tecnico_id">Apoio á Criação</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <input class="apoio_criacao" id="apoio_criacao" name="apoio_criacao" value="1" data-value="1" type="checkbox" aria-label="..." {{ $promotor->projecto->apoio_criacao == 1 ? 'checked' : '' }} >
                    </span>
                    <select {{ $promotor->projecto->apoio_criacao == 1 ? '' : 'disabled' }} name="apoio_criacao_estado" id="apoio_criacao_input" class="form-control" style="width: 100%;" required="required">
                        <option></option>
                        <option value="1" {{ $promotor->projecto->apoio_criacao_estado == 1 ? 'selected' : '' }} >Em Processo</option>
                        <option value="2" {{ $promotor->projecto->apoio_criacao_estado == 2 ? 'selected' : '' }} >Em Análise</option>
                        <option value="3" {{ $promotor->projecto->apoio_criacao_estado == 3 ? 'selected' : '' }} >Aprovado</option>
                        <option value="4" {{ $promotor->projecto->apoio_criacao_estado == 4 ? 'selected' : '' }} >Desistente</option>
                    </select>
                </div>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback col-md-6">
                <label for="apoio_tecnico_id">Apoio á Consolidação</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <input class="apoio_consolidacao" id="apoio_consolidacao" name="apoio_consolidacao" value="1" data-value="2" type="checkbox" aria-label="..." {{ $promotor->projecto->apoio_consolidacao == 1 ? 'checked' : '' }} />
                    </span>
                    <select {{ $promotor->projecto->apoio_consolidacao == 1 ? '' : 'disabled' }} name="apoio_consolidacao_estado" id="apoio_consolidacao_input" class="form-control" style="width: 100%;" required="required">
                        <option></option>
                        <option value="1" {{ $promotor->projecto->apoio_consolidacao_estado == 1 ? 'selected' : '' }}>Em Acompanhamento</option>
                        <option value="2" {{ $promotor->projecto->apoio_consolidacao_estado == 2 ? 'selected' : '' }}>Concluído</option>
                        <option value="3" {{ $promotor->projecto->apoio_consolidacao_estado == 3 ? 'selected' : '' }}>Encerrado</option>
                        <option value="4" {{ $promotor->projecto->apoio_consolidacao_estado == 4 ? 'selected' : '' }}>Desistente</option>
                    </select>
                </div>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" >
                <div id="apoio_1" {{ $promotor->projecto->apoio_criacao == 1 ? '' : 'style="display:none;"' }} >

                    @foreach( $promotor->projecto->programa->documentos->where('apoio_tipo', 1) as $documento )
                    <div class="checkbox">
                        <label for="projecto_documentos">
                            <input type="checkbox" name="projecto_documentos[]" value="{{ $documento->id }}"
                            @foreach( $promotor->projecto->documentos as $projecto_doc )
                                {{ $projecto_doc->pivot->documento_id == $documento->id ? 'checked' : ''   }}
                            @endforeach 
                            >
                            {{ $documento->designacao }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-6" >
                 <div id="apoio_2" {{ $promotor->projecto->apoio_consolidacao == 1 ? '' : 'style="display:none;"' }}>
                    @foreach( $promotor->projecto->programa->documentos->where('apoio_tipo', 2) as $documento )

                    <div class="checkbox">
                        <label for="projecto_documentos">
                            <input type="checkbox" name="projecto_documentos[]" value="{{ $documento->id }}" {{ array_has($promotor->projecto->documentos, $documento->id) ? 'checked' : '' }}>
                            {{ $documento->designacao }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group has-feedback col-md-3 " >
                <label for="declaracao_atcp">Declaração de ATCP</label>
                <div class="radio">
                    <label>
                        <input type="radio" class="toggle" name="declaracao_atcp" id="show" value="1" {{ $promotor->projecto->declaracao_atcp == 1 ? 'checked' : '' }}>
                        Sim
                    </label>
                    <label>
                        <input type="radio" class="toggle" name="declaracao_atcp" id="hide" value="0" {{ $promotor->projecto->declaracao_atcp == 0 ? 'checked' : '' }}>
                        Não
                    </label>
                </div>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback col-md-4 to_toggle" {{ $promotor->projecto->declaracao_atcp == 1 ? '' : 'style=display:none;' }} >
                <label for="declaracao_atcp_data">Data de Entrega</label>
                <input class="form-control date" name="declaracao_atcp_data" type="text" id="declaracao_atcp_data" required="required" value="{{ $promotor->projecto->declaracao_atcp_data }}" {{ $promotor->projecto->declaracao_atcp == 0 ? 'disabled' : '' }} />
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="row">
            <div class="form-group has-feedback col-md-3" >
                <label for="contrato_atcp">Contrato de ATCP</label>
                <div class="radio">
                    <label>
                        <input type="radio" class="toggle" name="contrato_atcp" value="1" {{ $promotor->projecto->contrato_atcp == 1 ? 'checked' : '' }}>
                        Sim
                    </label>
                    <label>
                        <input type="radio" class="toggle" name="contrato_atcp" value="0" {{ $promotor->projecto->contrato_atcp == 0 ? 'checked' : '' }}>
                        Não
                    </label>
                </div>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback col-md-4 to_toggle" id="1" {{ $promotor->projecto->contrato_atcp == 1 ? '' : 'style=display:none;' }}>
                <label for="contrato_atcp_data">Data de Entrega</label>
                <input class="form-control date" name="contrato_atcp_data" type="text" id="contrato_atcp_data" required="required" value="{{ $promotor->projecto->contrato_atcp_data }}" {{ $promotor->projecto->contrato_atcp == 0 ? 'disabled' : '' }} />
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="row">
            <div class="form-group has-feedback col-md-3">
                <label for="projecto_data_inicio">Data de Inicio</label>
                <input class="form-control date" name="projecto_data_inicio" type="text" id="projecto_data_inicio" required="required" value="{{ $promotor->projecto->projecto_data_inicio }}" />
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback col-md-3">
                <label for="projecto_data_submissao">Data de Submissão</label>
                <input class="form-control date" name="projecto_data_submissao" type="text" id="projecto_data_submissao" required="required" value="{{ $promotor->projecto->projecto_data_submissao }}" />
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback col-md-3">
                <label for="projecto_data_aprovacao">Data de Aprovação</label>
                <input class="form-control date" name="projecto_data_aprovacao" type="text" id="projecto_data_aprovacao" required="required" value="{{ $promotor->projecto->projecto_data_aprovacao }}" />
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback col-md-3">
                <label for="processo_numero">Nº Processo</label>
                <input class="form-control" name="processo_numero" type="text" id="processo_numero" required="required" value="{{ $promotor->projecto->processo_numero }}" />
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="row">
            <div class="form-group has-feedback col-md-4 col-sm-6">
                <label for="inicio_actividade_data">Data de Inicio de Actividade</label>
                <input class="form-control date" name="inicio_actividade_data" type="text" id="inicio_actividade_data" required="required" value="{{ $promotor->projecto->inicio_actividade_data }}" />
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback col-md-4 col-sm-6">
                <label for="projecto_data_fim">Data de Fim</label>
                <input class="form-control date" name="projecto_data_fim" type="text" id="projecto_data_fim" required="required" value="{{ $promotor->projecto->projecto_data_fim }}" />
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback col-md-2 col-sm-6">
                <label for="n_meses">Nº Meses</label>
                <input class="form-control" name="numero_meses" type="text" id="numero_meses" readonly value="{{ $promotor->projecto->numero_meses }}" />
            </div>
            <div class="form-group has-feedback col-md-2 col-sm-6">
                <label for="montante_total_elegivel">Plafond</label>
                <input class="form-control" name="montante_total_elegivel" type="text" id="montante_total_elegivel" required="required" value="{{ $promotor->projecto->montante_total_elegivel }}" readonly/>
            </div>
        </div>
        <div class="form-group has-feedback">
            <label for="projecto_notas">Notas</label>
            <textarea class="form-control" name="projecto_notas" rows="3" id="projecto_notas">{{ $promotor->projecto->projecto_notas }}</textarea>
            <div class="help-block with-errors"></div>
        </div>
    </div>
    <div class="box-footer">
        <input class="btn bg-green btn-flat pull-right" type="submit" value="Guardar" />
    </div>
</div>
    