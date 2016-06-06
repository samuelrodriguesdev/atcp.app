<div class="form-group has-feedback col-md-7">
{{ csrf_field() }}
</div>
<div class="row">
    <div class="form-group has-feedback col-md-6">
        <label for="promotor_estado">Estado</label>
        <select name="promotor_estado" id="promotor_estado" class="form-control" required="required" style="width: 100%">
            <option value="1" {{ $promotor->promotor_estado == 1 ? 'selected' : '' }} >Pontencial</option>
            <option value="2" {{ $promotor->promotor_estado == 2 ? 'selected' : '' }} >Activo</option>
            <option value="3" {{ $promotor->promotor_estado == 3 ? 'selected' : '' }} >Inactivo</option>
        </select>
        <div class="help-block with-errors"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="tecnico_responsavel_1">Técnico Responsável</label>
        <div class="input-group">
            <span class="input-group-addon">
                <input id="tecnico_responsavel_1" type="checkbox" aria-label="..." {{ count( $promotor->projecto->tecnicos ) > 0 ? 'checked' : '' }} />
            </span>
            <select style="width:100%;" name="tecnico_id[]" class="form-control" id="tecnico_responsavel_1_input" required="required" {{ count( $promotor->projecto->tecnicos ) > 0 ? '' : 'disabled' }} >
                @if( count( $promotor->projecto->tecnicos ) > 0 )
                <option value="{{ $promotor->projecto->tecnicos[0]->id }}">{{ $promotor->projecto->tecnicos[0]->nome }}</option>
                @endif
            </select>
        </div>
        <div class="help-block with-errors"></div>
    </div>
    <div class="col-md-6">
        <label for="tecnico_responsavel_2">Técnico Responsável</label>
        <div class="input-group">
            <span class="input-group-addon">
                <input id="tecnico_responsavel_2" type="checkbox" aria-label="..." {{ count( $promotor->projecto->tecnicos ) == 2 ? 'checked' : '' }} />
            </span>
            <select style="width:100%;" name="tecnico_id[]" class="form-control" id="tecnico_responsavel_2_input" required="required" {{ count( $promotor->projecto->tecnicos ) == 2 ? '' : 'disabled' }} >
                @if( count( $promotor->projecto->tecnicos ) == 2 )
                <option value="{{ $promotor->projecto->tecnicos[1]->id }}">{{ $promotor->projecto->tecnicos[1]->nome }}</option>
                @endif
            </select>

        </div>
        <div class="help-block with-errors"></div>
    </div>
</div>
<br>