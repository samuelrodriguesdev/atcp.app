<div class="form-group has-feedback">
    <label for="negocio_proprio">3.1 Possui negócio próprio?</label>
    <div class="radio">
        <label>
            <input type="radio" name="negocio_proprio" class="negocio_proprio" value="1" {{ $promotor->ficha_iniciativa->negocio_proprio == 1 ? 'checked' : '' }}>
            Sim
        </label>
        <label>
            <input type="radio" name="negocio_proprio" class="negocio_proprio" value="0" {{ $promotor->ficha_iniciativa->negocio_proprio == 0 ? 'checked' : '' }}>
            Não
        </label>
    </div>
    <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback" {{ $promotor->ficha_iniciativa->negocio_proprio == 0 ? '' : 'style=display:none;' }}>
    <label for="negocio_proprio">3.2 Pretende vir a criar o seu próprio negócio/emprego?</label>
    <div class="radio">
        <label>
            <input type="radio" name="intencao_negocio_proprio" value="1" {{ $promotor->ficha_iniciativa->negocio_proprio == 0 && $promotor->ficha_iniciativa->intencao_negocio_proprio == 1 ? 'checked' : 'disabled' }} >
            Sim
        </label>
        <label>
            <input type="radio" name="intencao_negocio_proprio" value="0" {{ $promotor->ficha_iniciativa->negocio_proprio == 0 && $promotor->ficha_iniciativa->intencao_negocio_proprio == 0 ? 'checked' : 'disabled' }} >
            Não
        </label>
    </div>
    <div class="help-block with-errors"></div>
</div>
<div class="optional" {{ $promotor->ficha_iniciativa->negocio_proprio == 1 ? '' : 'style=display:none;' }}>
    <div class="form-group has-feedback">
        <label for="fundador">3.1.1.Foi o fundador(a) do mesmo? </label>
        <div class="radio">
            <label>
                <input type="radio" name="fundador" id="fundador" value="1" {{ $promotor->ficha_iniciativa->negocio_proprio == 1 && $promotor->ficha_iniciativa->fundador == 1 ? 'checked' : 'disabled' }}>
                Sim
            </label>
            <label>
                <input type="radio" name="fundador" id="fundador" value="0" {{ $promotor->ficha_iniciativa->negocio_proprio == 1 && $promotor->ficha_iniciativa->fundador == 0 ? 'checked' : 'disabled' }}>
                Não
            </label>
        </div>
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group has-feedback">
        <label for="apoio_externo">3.1.2.Teve apoio do IEFP ou de outra entidade para a criação do seu negócio?</label>
        <div class="radio">
            <label>
                <input type="radio" name="apoio_externo" id="apoio_externo" value="1" {{ $promotor->ficha_iniciativa->negocio_proprio == 1 && $promotor->ficha_iniciativa->apoio_externo == 1 ? 'checked' : 'disabled' }}>
                Sim
            </label>
            <label>
                <input type="radio" name="apoio_externo" id="apoio_externo" value="0" {{ $promotor->ficha_iniciativa->negocio_proprio == 1 && $promotor->ficha_iniciativa->apoio_externo == 0 ? 'checked' : 'disabled' }}>
                Não
            </label>
        </div>
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group has-feedback">
        <label for="estado_negocio">3.1.3.O seu negócio já está em actividade?</label>
        <div class="radio">
            <label>
                <input type="radio" name="estado_negocio" id="estado_negocio" value="1" {{ $promotor->ficha_iniciativa->negocio_proprio == 1 && $promotor->ficha_iniciativa->estado_negocio == 1 ? 'checked' : 'disabled' }}>
                Sim
            </label>
            <label>
                <input type="radio" name="estado_negocio" id="estado_negocio" value="0" {{ $promotor->ficha_iniciativa->negocio_proprio == 1 && $promotor->ficha_iniciativa->estado_negocio == 0 ? 'checked' : 'disabled' }}>
                Não
            </label>
        </div>
        <div class="help-block with-errors"></div>
    </div>
</div>