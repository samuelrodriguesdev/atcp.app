<style>
    .datepicker{ z-index:1200 !important; }
</style>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Detalhes Pedido</h4>
</div>
<div class="modal-body">
    <form id="novoPP_Form" action="{{ url('projecto/update_pedido_pagamento/'.$pp->id) }}" method="POST" accept-charset="utf-8" data-toggle="validator">
        {{ csrf_field() }}
        <div class="row">
            <div class="form-group has-feedback col-md-6">
                <label for="data_pedido_pagamento">Data P.P</label>
                <input type="text" name="data_pedido_pagamento" class="form-control date" value="{{ $pp->data_pedido_pagamento }}" required>
            </div>
            <div class="form-group has-feedback col-md-6">
                <label for="valor_pedido_pagamento">Valor P.P</label>
                <input type="text" name="valor_pedido_pagamento" id="valor_pedido_pagamento" class="form-control" value="{{ $pp->valor_pedido_pagamento }}" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group has-feedback col-md-7">
                <label for="consultor_id">Estado</label>
                <select name="estado_pedido_pagamento" id="estado_pedido_pagamento" class="form-control" required="required" style="width:100%;">
                    <option value="1" {{ $pp->estado_pedido_pagamento == 1 ? 'selected' : '' }} >Não Liquidado</option>
                    <option value="2" {{ $pp->estado_pedido_pagamento == 2 ? 'selected' : '' }} >Liquidado</option>
                    <option value="3" {{ $pp->estado_pedido_pagamento == 3 ? 'selected' : '' }} >Liquidado Parcialmente</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group has-feedback col-md-6" id="toggle_data" {{ $pp->estado_pedido_pagamento == 3 || 2 ? '' : 'style=display:none;' }}>
                <label for="data_recebimento_pagamento">Data Recebimento P.P</label>
                <input type="text" name="data_recebimento_pagamento" class="form-control date" value="{{ $pp->data_recebimento_pagamento }}">
            </div>
            <div class="form-group has-feedback col-md-6" id="toggle_valor" {{ $pp->estado_pedido_pagamento == 3 ? '' : 'style=display:none;' }}>
                <label for="valor_pago_pagamento">Valor Recebido P.P</label>
                <input type="text" name="valor_pago_pagamento" id="valor_pago_pagamento" value="{{ $pp->valor_pago_pagamento }}" class="form-control">
            </div>
        </div>
        <label for="observacoes">Observações</label>
        <textarea name="observacoes" id="observacoes" class="form-control" rows="3">{{ $pp->observacoes }}</textarea>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Fechar</button>
        <button id="novoPP_" type="submit" class="btn btn-primary btn-flat">Guardar</button>
    </div>
</form> 
<script type="text/javascript">

    $('#novoPP_').click(function(e) {
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

    $( '#estado_pedido_pagamento' ).select2().on('select2:select', function (){
        $('#toggle_valor').hide();
        $('#toggle_data').hide();
        if (this.value ==2) {
            $('#toggle_data').show();
        } else if (this.value ==3) {
            $('#toggle_valor').show();
            $('#toggle_data').show();
        }
    });

</script>
