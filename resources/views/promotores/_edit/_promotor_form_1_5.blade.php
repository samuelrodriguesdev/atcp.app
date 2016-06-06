<div class="form-group has-feedback">
    <label for="area_intervencao">*Área de intervenção </label>
    <textarea name="area_intervencao" class="form-control" rows="3" required="required">{{ $promotor->ficha_iniciativa->area_intervencao }}</textarea>
</div>
<div class="form-group has-feedback">
    <label for="pontos_fortes">*Pontos fortes do seu plano de negócio (Factores de inovação e/ou diferenciação)</label>
    <textarea name="pontos_fortes" class="form-control" rows="3">{{ $promotor->ficha_iniciativa->pontos_fortes }}</textarea>
</div>
<div class="form-group has-feedback">
    <label for="objectivos">*Objectivos</label>
    <textarea name="objectivos" class="form-control" rows="3" >{{ $promotor->ficha_iniciativa->objectivos }}</textarea>
</div>
<div class="form-group has-feedback">
    <label for="tipo_bem_servico">*Tipos de bens a produzir ou serviços a prestar</label>
    <textarea name="tipo_bem_servico" class="form-control" rows="3" >{{ $promotor->ficha_iniciativa->tipo_bem_servico }}</textarea>
</div>
<div class="form-group has-feedback">
    <label for="caracterizacao_mercado">*Caracterização do mercado (Clientes, Fornecedores e concorrentes)</label>
    <textarea name="caracterizacao_mercado" class="form-control" rows="3">{{ $promotor->ficha_iniciativa->caracterizacao_mercado }}</textarea>
</div>
<div class="form-group has-feedback">
    <label for="caracterizacao_instalacoes">*Caracterização das instalações e sua localização </label>
    <textarea name="caracterizacao_instalacoes" class="form-control" rows="3" >{{ $promotor->ficha_iniciativa->caracterizacao_instalacoes }}</textarea>
</div>
<div class="form-group has-feedback">
    <label for="recursos_materiais">Materiais</label>
    <textarea name="recursos_materiais" class="form-control" rows="3">{{ $promotor->ficha_iniciativa->recursos_materiais }}</textarea>
</div>
<div class="form-group has-feedback">
    <label for="recursos_tecnologicos">Tecnológicos</label>
    <textarea name="recursos_tecnologicos" class="form-control" rows="3">{{ $promotor->ficha_iniciativa->recursos_tecnologicos }}</textarea>
</div>
<div class="form-group has-feedback">
    <label for="recursos_humanos">Humanos</label>
    <textarea name="recursos_humanos" class="form-control" rows="3">{{ $promotor->ficha_iniciativa->recursos_humanos }}</textarea>
</div>
<div class="form-group has-feedback">
    <label for="recursos_financeiros">Financeiros</label>
    <textarea name="recursos_financeiros" class="form-control" rows="3">{{ $promotor->ficha_iniciativa->recursos_financeiros }}</textarea>
</div>
<div class="row">
    <div class="form-group has-feedback col-md-3 col-sm-6">
        <label for="Nome">Elaboração da Candidatura</label>
        <div class="input-group">
            <span class="input-group-addon">
                <input id="elaboracao_candidatura" type="checkbox" aria-label="..." {{ $promotor->ficha_iniciativa->elaboracao_candidatura != 0 ? 'checked' : '' }} />
            </span>
            <input class="form-control" name="elaboracao_candidatura" type="text" id="elaboracao_candidatura_input" required="required" {{ $promotor->ficha_iniciativa->elaboracao_candidatura != 0 ? 'value='.$promotor->ficha_iniciativa->elaboracao_candidatura : 'disabled' }} />
            <div class="help-block with-errors"></div>
        </div>
    </div>
    <div class="form-group has-feedback col-md-3 col-sm-6">
        <label for="Nome">Capital Próprio</label>
        <div class="input-group">
            <span class="input-group-addon">
                <input id="capital_proprio" type="checkbox" aria-label="..." {{ $promotor->ficha_iniciativa->capital_proprio != 0 ? 'checked' : '' }}>
            </span>
            <input class="form-control" name="capital_proprio" type="text" id="capital_proprio_input" required="required" {{ $promotor->ficha_iniciativa->capital_proprio != 0 ? 'value='.$promotor->ficha_iniciativa->capital_proprio : 'disabled' }} />
            <div class="help-block with-errors"></div>
        </div>
    </div>
    <div class="form-group has-feedback col-md-3 col-sm-6">
        <label for="micro_invest">Microinvest ou Invest+.</label>
        <div class="input-group">
            <span class="input-group-addon">
                <input id="micro_invest" type="checkbox" aria-label="..." {{ $promotor->ficha_iniciativa->micro_invest != 0 ? 'checked' : '' }}>
            </span>
            <input class="form-control" name="micro_invest" type="text" id="micro_invest_input" required="required" {{ $promotor->ficha_iniciativa->micro_invest != 0 ? 'value='.$promotor->ficha_iniciativa->micro_invest : 'disabled' }} />
            <div class="help-block with-errors"></div>
        </div>
    </div>
    <div class="form-group has-feedback col-md-3 col-sm-6">
        <label for="antecipacao_subsidio">Antecipação do subsidio</label>
        <div class="input-group">
            <span class="input-group-addon">
                <input id="antecipacao_subsidio" type="checkbox" aria-label="..." {{ $promotor->ficha_iniciativa->antecipacao_subsidio != 0 ? 'checked' : '' }}>
            </span>
            <input class="form-control" name="antecipacao_subsidio" type="text" id="antecipacao_subsidio_input" required="required" {{ $promotor->ficha_iniciativa->antecipacao_subsidio != 0 ? 'value='.$promotor->ficha_iniciativa->antecipacao_subsidio : 'disabled' }} />
            <div class="help-block with-errors"></div>
        </div>
    </div>
</div>
<div class="form-group has-feedback">
    <label for="caracteristicas_promotor">Características pessoais e profissionais na sua pessoa que considera relevantes para o sucesso do seu projecto?</label>
    <textarea name="caracteristicas_promotor" class="form-control" rows="3" required="required">{{ $promotor->ficha_iniciativa->caracteristicas_promotor }}</textarea>
</div>