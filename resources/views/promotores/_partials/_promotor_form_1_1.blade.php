<div class="row">
    <div class="form-group has-feedback col-md-6">
        <label for="promotor_estado">Estado</label>
        <select name="promotor_estado" id="promotor_estado" class="form-control" style="width: 100%">
            <option value="1">Pontencial</option>
            <option value="2">Activo</option>
            <option value="3">Inactivo</option>
        </select>
        <div class="help-block with-errors"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="tecnico_responsavel_1">Técnico Responsável</label>
        <div class="input-group">
            <span class="input-group-addon">
                <input id="tecnico_responsavel_1" type="checkbox" aria-label="..." />
            </span>
            <select name="tecnico_id[]" class="form-control" id="tecnico_responsavel_1_input" required="required" disabled>
            </select>
        </div>
        <div class="help-block with-errors"></div>
    </div>
    <div class="col-md-6">
        <label for="tecnico_responsavel_2">Técnico Responsável</label>
        <div class="input-group">
            <span class="input-group-addon">
                <input id="tecnico_responsavel_2" type="checkbox" aria-label="..." />
            </span>
            <select name="tecnico_id[]" class="form-control" id="tecnico_responsavel_2_input" required="required" disabled>
            </select>
            
        </div>
        <div class="help-block with-errors"></div>
    </div>
</div>
<br>