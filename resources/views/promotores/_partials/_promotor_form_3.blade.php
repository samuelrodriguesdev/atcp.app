 <div class="form-group has-feedback">
    <label for="Nome">Associar consultores</label>
    <input class="form-control" name="tecnico_nome" type="text" id="tecnico_nome" required="required" />
    <div class="help-block with-errors"></div>
</div>
<label for="Nome">dados consultor</label>
<ul>
    <li>valor a pagar por hora+total</li>
    <li>data de inicio/fim do servico</li>
    <li>nº horas consultoria/formacao por mês/trimestre ou em % radio</li>
    <li>FIP+20dias data de aprovacao e PP controlar isto para o ATCP1 --> PD data de inicio do contrato + 20dias, FM mensal, FTePP trimestre do ano, RF+20dias FA+20dias fim para o ATCP2 por tooltip</li>
    <li>|| 15 dias || 2semana $$  || 1semana antes</li>
</ul>
<label for="Nome">pedidos de pagamento</label>
<ul>
    <li>data do pedido e o estado do pagamento (Não Liquidado, Liquidado, Liquidado Parcialmente campo para valor )</li>
    <li>trimestre e ano</li>
    <li>horas de consultoria /formacao e acompanhamento</li>
    <li>montante total pedido (formula) -> =(HY50+IA50)*18,865+(IC50*41,92) || =(HY80)*25,1532+(IC80*55,9)</li>
    <li>obervacoes</li>
</ul>