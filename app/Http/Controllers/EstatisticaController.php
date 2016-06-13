<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use PDO;

use App\Helpers\Helper;

class EstatisticaController extends Controller
{
	public function total_por_mes_ano(Request $request, Helper $helper)
	{
		DB::setFetchMode(PDO::FETCH_ASSOC);
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
		->join('projectos', 'projectos.id', '=', 'projecto_pedidos_pagamento.projecto_id')
		->when($request->has('ppYear'), function ($query) use ( $request ) {
			return $query->where(DB::raw('YEAR(data_recebimento_pagamento)'), $request->input('ppYear'));
		})
		->when($request->has('ppYear'), function ($query) use ( $request ) {
			return $query->groupBy(DB::raw('YEAR(data_recebimento_pagamento)'));
		})
		->when($request->has('ppCe'), function ($query) use ( $request ) {
			return $query->where('centro_emprego_id', $request->input('ppCe'));
		})
		->get();

		$nao_liquidado = DB::table('projecto_pedidos_pagamento')
		->select( 
			DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 1 THEN valor_pago_pagamento-valor_pedido_pagamento ELSE 0 END), 2) AS Janeiro'), 
			DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 2 THEN valor_pago_pagamento-valor_pedido_pagamento ELSE 0 END), 2) AS Fevereiro'), 
			DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 3 THEN valor_pago_pagamento-valor_pedido_pagamento ELSE 0 END), 2) AS Março'), 
			DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 4 THEN valor_pago_pagamento-valor_pedido_pagamento ELSE 0 END), 2) AS Abril'), 
			DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 5 THEN valor_pago_pagamento-valor_pedido_pagamento ELSE 0 END), 2) AS Maio'), 
			DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 6 THEN valor_pago_pagamento-valor_pedido_pagamento ELSE 0 END), 2) AS Junho'), 
			DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 7 THEN valor_pago_pagamento-valor_pedido_pagamento ELSE 0 END), 2) AS Julho'),
			DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 8 THEN valor_pago_pagamento-valor_pedido_pagamento ELSE 0 END), 2) AS Agosto'),
			DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 9 THEN valor_pago_pagamento-valor_pedido_pagamento ELSE 0 END), 2) AS Setembro'),
			DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 10 THEN valor_pago_pagamento-valor_pedido_pagamento ELSE 0 END), 2) AS Outubro'),
			DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 11 THEN valor_pago_pagamento-valor_pedido_pagamento ELSE 0 END), 2) AS Novembro'),
			DB::raw( 'ROUND(SUM(CASE WHEN MONTH(data_recebimento_pagamento) = 12 THEN valor_pago_pagamento-valor_pedido_pagamento ELSE 0 END), 2) AS Dezembro')
			)
		->join('projectos', 'projectos.id', '=', 'projecto_pedidos_pagamento.projecto_id')
		->when($request->has('ppYear'), function ($query) use ( $request ) {
			return $query->where(DB::raw('YEAR(data_recebimento_pagamento)'), $request->input('ppYear'));
		})
		->when($request->has('ppYear'), function ($query) use ( $request ) {
			return $query->groupBy(DB::raw('YEAR(data_recebimento_pagamento)'));
		})
		->when($request->has('ppCe'), function ($query) use ( $request ) {
			return $query->where('centro_emprego_id', $request->input('ppCe'));
		})
		->whereIn('estado_pedido_pagamento', [1,3])
		->get();

		DB::setFetchMode(PDO::FETCH_CLASS);

		
		$results[0]=$helper->formatArray($liquidado);
		$results[1]=$helper->formatArray($nao_liquidado);




		return response()->json($results);
	}

	public function total_por_estado(Request $request)
	{
		
		$result = DB::table('projecto_pedidos_pagamento')
		->select( DB::raw('ROUND(SUM(valor_pedido_pagamento), 2) AS Total'),
			DB::raw( 'ROUND(SUM(CASE WHEN estado_pedido_pagamento = 1 THEN valor_pedido_pagamento  WHEN estado_pedido_pagamento = 3 THEN valor_pedido_pagamento - valor_pago_pagamento ELSE 0 END), 2) AS Nao_Liquidado'), 
			DB::raw( '(ROUND(SUM(CASE WHEN estado_pedido_pagamento = 2 THEN valor_pedido_pagamento ELSE 0 END), 2) + ROUND(SUM(CASE WHEN estado_pedido_pagamento = 3 THEN valor_pago_pagamento ELSE 0 END), 2))  AS Liquidado') 
			)
		->join('projectos', 'projectos.id', '=', 'projecto_pedidos_pagamento.projecto_id')
		->when($request->has('ppYear'), function ($query) use ( $request ) {
			return $query->where(DB::raw('YEAR(data_recebimento_pagamento)'), $request->input('ppYear'));
		})
		->when($request->has('ppYear'), function ($query) use ( $request ) {
			return $query->groupBy(DB::raw('YEAR(data_recebimento_pagamento)'));
		})
		->when($request->has('ppCe'), function ($query) use ( $request ) {
			return $query->where('centro_emprego_id', $request->input('ppCe'));
		})
		->get();

		
		return response()->json($result);
	}
	
	public function total_por_apoio(Request $request)
	{
		
		$result = DB::table('projecto_pedidos_pagamento')
		->select( DB::raw('ROUND(SUM(valor_pedido_pagamento), 2) AS Total'),
			DB::raw( 'ROUND(SUM(CASE WHEN estado_pedido_pagamento = 1 THEN valor_pedido_pagamento  WHEN estado_pedido_pagamento = 3 THEN valor_pedido_pagamento - valor_pago_pagamento ELSE 0 END), 2) AS Nao_Liquidado'), 
			DB::raw( '(ROUND(SUM(CASE WHEN estado_pedido_pagamento = 2 THEN valor_pedido_pagamento ELSE 0 END), 2) + ROUND(SUM(CASE WHEN estado_pedido_pagamento = 3 THEN valor_pago_pagamento ELSE 0 END), 2))  AS Liquidado') 
			)
		->join('projectos', 'projectos.id', '=', 'projecto_pedidos_pagamento.projecto_id')
		->when($request->has('ppYear'), function ($query) use ( $request ) {
			return $query->where(DB::raw('YEAR(data_recebimento_pagamento)'), $request->input('ppYear'));
		})
		->when($request->has('ppYear'), function ($query) use ( $request ) {
			return $query->groupBy(DB::raw('YEAR(data_recebimento_pagamento)'));
		})
		->when($request->has('ppCe'), function ($query) use ( $request ) {
			return $query->where('centro_emprego_id', $request->input('ppCe'));
		})
		->get();

		
		return response()->json($result);
	}

}
