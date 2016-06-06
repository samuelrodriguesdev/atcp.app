<div class="row">
    <div class="form-group has-feedback col-md-8 col-sm-8">
        <label for="situacao_profissional">Situação Profissional</label>
        <div class="radio">
            <label>
                <input type="radio" name="situacao_profissional" class="situacao_profissional" value="1" checked="checked">
                Á procura do 1º emprego
            </label>
            <label>
                <input type="radio" name="situacao_profissional" class="situacao_profissional" value="2">
                Desempregado
            </label>
            <label>
                <input type="radio" name="situacao_profissional" class="situacao_profissional" value="3">
                Trabalhador Independente
            </label>
        </div>
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group has-feedback col-md-4 col-sm-4 tipo_desemprego" style="display:none;">
        <label for="tipo_desemprego">&nbsp;</label>
        <div class="radio">
            <label>
                <input type="radio" name="tipo_desemprego" class="tipo_desemprego" value="1" checked="checked" required disabled>
                Voluntário
            </label>
            <label>
                <input type="radio" name="tipo_desemprego" class="tipo_desemprego" value="2" required disabled>
                Involuntário
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group has-feedback col-lg-6 col-md-8">
        <label for="situacao_profissional_data">Desde quando se encontra nessa situação ? </label>
        <input class="form-control date" name="situacao_profissional_data" type="text" id="situacao_profissional_data" required="required" />
        <div class="help-block with-errors"></div>
    </div>
</div>
<div class="row">
    <div class="form-group has-feedback col-md-7 col-sm-7">
        <label for="centro_emprego_inscricao">Está inscrito no centro de emprego?</label>
        <div class="radio">
            <label>
                <input type="radio" class="toggle" name="centro_emprego_inscricao" id="centro_emprego_inscricao" value="1">
                Sim
            </label>
            <label>
                <input type="radio" class="toggle" name="centro_emprego_inscricao" id="centro_emprego_inscricao" value="0" checked="checked">
                Não
            </label>
        </div>
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group has-feedback col-md-4 col-sm-4 to_toggle" style="display:none;">
        <label for="centro_emprego_inscricao_data">Desde</label>
        <input class="form-control date" name="centro_emprego_inscricao_data" type="text" id="centro_emprego_inscricao_data" required="required" disabled/>
        <div class="help-block with-errors"></div>
    </div>
</div>
<div class="row">
    <div class="form-group has-feedback col-md-7 col-sm-7">
        <label for="subsidio_desemprego">Recebe Subsidio de desemprego?</label>
        <div class="radio">
            <label>
                <input type="radio" class="toggle" name="subsidio_desemprego" id="subsidio_desemprego" value="1" >
                Sim
            </label>
            <label>
                <input type="radio" class="toggle" name="subsidio_desemprego" id="subsidio_desemprego" value="0" checked="checked">
                Não
            </label>
        </div>
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group has-feedback col-md-4 col-sm-4 to_toggle" style="display:none;">
        <label for="subsidio_desemprego_valor">Valor/Nº Meses</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-euro"></i></span>
            <input class="form-control" name="subsidio_desemprego_valor" type="text" id="subsidio_desemprego_valor" required="required" disabled/>
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input class="form-control" name="subsidio_desemprego_data" type="text" id="subsidio_desemprego_data" required="required" disabled/>
        </div>
        <div class="help-block with-errors"></div>
    </div>
</div>
<div class="form-group has-feedback">
    <label for="funcoes_desempenhadas">Funções desempenhadas anteriormente:</label>
    <textarea name="funcoes_desempenhadas" id="funcoes_desempenhadas" class="form-control" rows="3"></textarea>
</div>