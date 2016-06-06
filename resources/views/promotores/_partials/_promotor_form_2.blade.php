<div class="box">
    <div class="box-body">
        <div class="form-group has-feedback">
            <label for="programa_id">Programa</label>
            <select name="programa_id" id="programa_id" class="form-control" style="width: 100%;" required="required">
            </select>
            <div class="help-block with-errors"></div>
        </div>
        <div class="row">
            <div class="form-group has-feedback col-md-6">
                <label for="apoio_tecnico_id">Apoio á Criação</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <input id="apoio_criacao" data-value="1" value="1" class="apoio_criacao" name="apoio_criacao" type="checkbox" aria-label="..." disabled/>
                    </span>
                    <select name="apoio_criacao_estado" id="apoio_criacao_input" class="form-control" style="width: 100%;" required="required" disabled>
                        <option></option>
                        <option value="1">Em Processo</option>
                        <option value="2">Em Análise</option>
                        <option value="3">Aprovado</option>
                        <option value="4">Desistente</option>
                    </select>
                </div>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback col-md-6">
                <label for="apoio_tecnico_id">Apoio á Consolidação</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <input class="apoio_consolidacao" data-value="2" value="1" id="apoio_consolidacao" name="apoio_consolidacao"type="checkbox" aria-label="..." disabled />
                    </span>
                    <select name="apoio_consolidacao_estado" id="apoio_consolidacao_input" class="form-control" style="width: 100%;" required="required" disabled>
                        <option></option>
                        <option value="1">Em Acompanhamento</option>
                        <option value="2">Concluído</option>
                        <option value="3">Encerrado</option>
                        <option value="4">Desistente</option>
                    </select>
                </div>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" >
                <div id="apoio_1" style="display:none;">
                    
                </div>
            </div>
            <div class="col-md-6" >
                 <div id="apoio_2" style="display:none;">
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group has-feedback col-md-3 " >
                <label for="declaracao_atcp">Declaração de ATCP</label>
                <div class="radio">
                    <label>
                    <input type="radio" class="toggle" name="declaracao_atcp" id="show" value="1">
                        Sim
                    </label>
                    <label>
                        <input type="radio" class="toggle" name="declaracao_atcp" id="hide" value="0" checked="checked">
                        Não
                    </label>
                </div>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback col-md-4 to_toggle" style="display:none;">
                <label for="declaracao_atcp_data">Data de Entrega</label>
                <input class="form-control date" name="declaracao_atcp_data" type="text" id="declaracao_atcp_data" required="required" disabled />
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="row">
            <div class="form-group has-feedback col-md-3" >
                <label for="contrato_atcp">Contrato de ATCP</label>
                <div class="radio">
                    <label>
                        <input type="radio" class="toggle" name="contrato_atcp" value="1" checked="checked">
                        Sim
                    </label>
                    <label>
                        <input type="radio" class="toggle" name="contrato_atcp" value="0" checked="checked">
                        Não
                    </label>
                </div>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback col-md-4 to_toggle" id="1" style="display:none;">
                <label for="contrato_atcp_data">Data de Entrega</label>
                <input class="form-control date" name="contrato_atcp_data" type="text" id="contrato_atcp_data" required="required" disabled/>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="row">
            <div class="form-group has-feedback col-md-3">
                <label for="projecto_data_inicio">Data de Inicio</label>
                <input class="form-control date" name="projecto_data_inicio" type="text" id="projecto_data_inicio" required="required" />
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback col-md-3">
                <label for="projecto_data_submissao">Data de Submissão</label>
                <input class="form-control date" name="projecto_data_submissao" type="text" id="projecto_data_submissao" required="required" />
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback col-md-3">
                <label for="projecto_data_aprovacao">Data de Aprovação</label>
                <input class="form-control date" name="projecto_data_aprovacao" type="text" id="projecto_data_aprovacao" required="required" />
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback col-md-3">
                <label for="processo_numero">Nº Processo</label>
                <input class="form-control" name="processo_numero" type="text" id="processo_numero" required="required" />
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="row">
            <div class="form-group has-feedback col-md-4 col-sm-6">
                <label for="inicio_actividade_data">Data de Inicio de Actividade</label>
                <input class="form-control date" name="inicio_actividade_data" type="text" id="inicio_actividade_data" required="required" />
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback col-md-4 col-sm-6">
                <label for="projecto_data_fim">Data de Fim</label>
                <input class="form-control date" name="projecto_data_fim" type="text" id="projecto_data_fim" required="required" />
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback col-md-2 col-sm-6">
                <label for="n_meses">Nº Meses</label>
                <input class="form-control" name="numero_meses" type="text" id="n_meses" readonly required="required" />
            </div>
            <div class="form-group has-feedback col-md-2 col-sm-6">
            <label for="montante_total_elegivel">Plafond</label>
            <input class="form-control" name="montante_total_elegivel" type="text" id="montante_total_elegivel" required="required" readonly/>
        </div>
        </div>
        
        <div class="form-group has-feedback">
            <label for="projecto_notas">Notas</label>
            <textarea class="form-control" name="projecto_notas" rows="3" id="projecto_notas"></textarea>
            <div class="help-block with-errors"></div>
        </div>
    </div>
    <div class="box-footer">
        <input class="btn bg-green btn-flat pull-right" type="submit" value="Guardar" />
    </div>
</div>

