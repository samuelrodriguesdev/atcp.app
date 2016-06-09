<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;


class EstatisticaController extends Controller
{
    public function total_por_mes_ano(Request $request)
    {

    	$liquidado = DB::table('projecto_pedidos_pagamento')
    	->select( 
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 1 THEN valor_pedido_pagamento ELSE 0 END), 2) AS Janeiro'), 
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 2 THEN valor_pedido_pagamento ELSE 0 END), 2) AS Fevereiro'), 
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 3 THEN valor_pedido_pagamento ELSE 0 END), 2) AS Março'), 
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 4 THEN valor_pedido_pagamento ELSE 0 END), 2) AS Abril'), 
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 5 THEN valor_pedido_pagamento ELSE 0 END), 2) AS Maio'), 
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 6 THEN valor_pedido_pagamento ELSE 0 END), 2) AS Junho'), 
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 7 THEN valor_pedido_pagamento ELSE 0 END), 2) AS Julho'),
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 8 THEN valor_pedido_pagamento ELSE 0 END), 2) AS Agosto'),
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 9 THEN valor_pedido_pagamento ELSE 0 END), 2) AS Setembro'),
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 10 THEN valor_pedido_pagamento ELSE 0 END), 2) AS Outubro'),
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 11 THEN valor_pedido_pagamento ELSE 0 END), 2) AS Novembro'),
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 12 THEN valor_pedido_pagamento ELSE 0 END), 2) AS Dezembro')
    		)
    		->where(DB::raw('YEAR(data_recebimento_pagamento)'),'like', $request->input('pp_year'))
    	
    	->groupBy(DB::raw('YEAR(data_recebimento_pagamento)'))
    	->get();

    	$nao_liquidado = DB::table('projecto_pedidos_pagamento')
    	->select( 
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 1 THEN valor_pedido_pagamento-valor_pago_pagamento ELSE 0 END), 2) AS Janeiro'), 
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 2 THEN valor_pedido_pagamento-valor_pago_pagamento ELSE 0 END), 2) AS Fevereiro'), 
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 3 THEN valor_pedido_pagamento-valor_pago_pagamento ELSE 0 END), 2) AS Março'), 
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 4 THEN valor_pedido_pagamento-valor_pago_pagamento ELSE 0 END), 2) AS Abril'), 
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 5 THEN valor_pedido_pagamento-valor_pago_pagamento ELSE 0 END), 2) AS Maio'), 
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 6 THEN valor_pedido_pagamento-valor_pago_pagamento ELSE 0 END), 2) AS Junho'), 
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 7 THEN valor_pedido_pagamento-valor_pago_pagamento ELSE 0 END), 2) AS Julho'),
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 8 THEN valor_pedido_pagamento-valor_pago_pagamento ELSE 0 END), 2) AS Agosto'),
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 9 THEN valor_pedido_pagamento-valor_pago_pagamento ELSE 0 END), 2) AS Setembro'),
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 10 THEN valor_pedido_pagamento-valor_pago_pagamento ELSE 0 END), 2) AS Outubro'),
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 11 THEN valor_pedido_pagamento-valor_pago_pagamento ELSE 0 END), 2) AS Novembro'),
    		DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 12 THEN valor_pedido_pagamento-valor_pago_pagamento ELSE 0 END), 2) AS Dezembro')
    		)
    	->where(DB::raw('YEAR(data_recebimento_pagamento)'),'like', $request->input('pp_year'))
    	->whereIn('estado_pedido_pagamento', [1,3])
    	->groupBy(DB::raw('YEAR(data_recebimento_pagamento)'))
    	->get();

    	$results[0]=$liquidado;
    	$results[1]=$nao_liquidado;
    	return response()->json($results);
    }
}
