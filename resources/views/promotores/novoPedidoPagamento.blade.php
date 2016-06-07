<style>
    .datepicker{ z-index:1200 !important; }
</style>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Novo Pedido</h4>
</div>
<div class="modal-body">
    <form id="novoPP_Form" action="{{ url('projecto/post_pedido_pagamento') }}" method="POST" accept-charset="utf-8" data-toggle="validator">
        {{ csrf_field() }}
        <input type="hidden" name="projecto_id" value="{{ $projecto }}">
        <div class="row">
            <div class="form-group has-feedback col-md-6">
                <label for="data_pedido_pagamento">Data P.P</label>
                <input type="text" name="data_pedido_pagamento" class="form-control date" required>
            </div>
            <div class="form-group has-feedback col-md-6">
                <label for="data_recebimento_pagamento">Data Recebimento P.P</label>
                <input type="text" name="data_recebimento_pagamento" class="form-control date" required>
            </div>
        </div>
        <div class="row">
             <div class="form-group has-feedback col-md-5">
                <label for="valor_pedido_pagamento">Valor P.P</label>
                <input type="text" name="valor_pedido_pagamento" id="valor_pedido_pagamento" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group has-feedback col-md-7">
                <label for="consultor_id">Estado</label>
                <select name="estado_pedido_pagamento" id="estado_pedido_pagamento" class="form-control" required="required" style="width:100%;">
                    <option value="1">Não Liquidado</option>
                    <option value="2">Liquidado</option>
                    <option value="3">Liquidado Parcialmente</option>
                </select>
            </div>
            <div class="form-group has-feedback col-md-5" id="toggle_valor" style="display:none;">
                <label for="valor_pago_pagamento">Valor Recebido P.P</label>
                <input type="text" name="valor_pago_pagamento" id="valor_pago_pagamento" class="form-control">
            </div>
        </div>
        <label for="observacoes">Observações</label>
        <textarea name="observacoes" id="observacoes" class="form-control" rows="3"></textarea>
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
        if (this.value ==3) {
            $('#toggle_valor').show();
        }
    });

</script>
