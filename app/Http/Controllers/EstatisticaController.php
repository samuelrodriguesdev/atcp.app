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
		DB::setFetchMode(PDO::FETCH_ASSOC);
		$result = DB::table('projecto_consultores')
		->when(!$request->has('contrato_tipo') || $request->input('contrato_tipo') ==1, function ($query) use ( $request ) {
			return $query->select( DB::raw( 'ROUND(SUM(CASE 
				WHEN MONTH(data_inicio_servico) = 1 THEN total_elaboracao_candidatura 
				WHEN MONTH(data_inicio_servico) = 2 THEN total_elaboracao_candidatura
				WHEN MONTH(data_inicio_servico) = 3 THEN total_elaboracao_candidatura
				ELSE 0 
				END), 2) AS 1_trimestre_elaboracao_candidatura'), 
			DB::raw( 'ROUND(SUM(CASE 
				WHEN MONTH(data_inicio_servico) = 4 THEN total_elaboracao_candidatura 
				WHEN MONTH(data_inicio_servico) = 5 THEN total_elaboracao_candidatura
				WHEN MONTH(data_inicio_servico) = 6 THEN total_elaboracao_candidatura
				ELSE 0 
				END), 2) AS 2_trimestre_elaboracao_candidatura'), 
			DB::raw( 'ROUND(SUM(CASE 
				WHEN MONTH(data_inicio_servico) = 7 THEN total_elaboracao_candidatura 
				WHEN MONTH(data_inicio_servico) = 8 THEN total_elaboracao_candidatura
				WHEN MONTH(data_inicio_servico) = 9 THEN total_elaboracao_candidatura
				ELSE 0 
				END), 2) AS 3_trimestre_elaboracao_candidatura'), 
			DB::raw( 'ROUND(SUM(CASE 
				WHEN MONTH(data_inicio_servico) = 10 THEN total_elaboracao_candidatura 
				WHEN MONTH(data_inicio_servico) = 11 THEN total_elaboracao_candidatura
				WHEN MONTH(data_inicio_servico) = 12 THEN total_elaboracao_candidatura
				ELSE 0 
				END), 2) AS 4_trimestre_elaboracao_candidatura'),
			DB::raw( 'ROUND(SUM(CASE 
				WHEN MONTH(data_inicio_servico) = 1 THEN total_consultoria 
				WHEN MONTH(data_inicio_servico) = 2 THEN total_consultoria
				WHEN MONTH(data_inicio_servico) = 3 THEN total_consultoria
				ELSE 0 
				END), 2) AS 1_trimestre_consultoria'), 
			DB::raw( 'ROUND(SUM(CASE 
				WHEN MONTH(data_inicio_servico) = 4 THEN total_consultoria 
				WHEN MONTH(data_inicio_servico) = 5 THEN total_consultoria
				WHEN MONTH(data_inicio_servico) = 6 THEN total_consultoria
				ELSE 0 
				END), 2) AS 2_trimestre_consultoria'), 
			DB::raw( 'ROUND(SUM(CASE 
				WHEN MONTH(data_inicio_servico) = 7 THEN total_consultoria 
				WHEN MONTH(data_inicio_servico) = 8 THEN total_consultoria
				WHEN MONTH(data_inicio_servico) = 9 THEN total_consultoria
				ELSE 0 
				END), 2) AS 3_trimestre_consultoria'), 
			DB::raw( 'ROUND(SUM(CASE 
				WHEN MONTH(data_inicio_servico) = 10 THEN total_consultoria 
				WHEN MONTH(data_inicio_servico) = 11 THEN total_consultoria
				WHEN MONTH(data_inicio_servico) = 12 THEN total_consultoria
				ELSE 0 
				END), 2) AS 4_trimestre_consultoria'),
			DB::raw( 'ROUND(SUM(CASE 
				WHEN MONTH(data_inicio_servico) = 1 THEN total_formacao 
				WHEN MONTH(data_inicio_servico) = 2 THEN total_formacao
				WHEN MONTH(data_inicio_servico) = 3 THEN total_formacao
				ELSE 0 
				END), 2) AS 1_trimestre_formacao '), 
			DB::raw( 'ROUND(SUM(CASE 
				WHEN MONTH(data_inicio_servico) = 4 THEN total_formacao 
				WHEN MONTH(data_inicio_servico) = 5 THEN total_formacao
				WHEN MONTH(data_inicio_servico) = 6 THEN total_formacao
				ELSE 0 
				END), 2) AS 2_trimestre_formacao '), 
			DB::raw( 'ROUND(SUM(CASE 
				WHEN MONTH(data_inicio_servico) = 7 THEN total_formacao 
				WHEN MONTH(data_inicio_servico) = 8 THEN total_formacao
				WHEN MONTH(data_inicio_servico) = 9 THEN total_formacao
				ELSE 0 
				END), 2) AS 3_trimestre_formacao '), 
			DB::raw( 'ROUND(SUM(CASE 
				WHEN MONTH(data_inicio_servico) = 10 THEN total_formacao 
				WHEN MONTH(data_inicio_servico) = 11 THEN total_formacao
				WHEN MONTH(data_inicio_servico) = 12 THEN total_formacao
				ELSE 0 
				END), 2) AS 4_trimestre_formacao ')
			);
		})	
		->when($request->only('contrato_tipo') && $request->input('contrato_tipo') == 2, function ($query) use ( $request ) {
			return $query->select(
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 1 THEN total_consultoria 
					WHEN MONTH(data_inicio_servico) = 2 THEN total_consultoria
					WHEN MONTH(data_inicio_servico) = 3 THEN total_consultoria
					ELSE 0 
					END), 2) AS 1_trimestre_consultoria'), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 4 THEN total_consultoria 
					WHEN MONTH(data_inicio_servico) = 5 THEN total_consultoria
					WHEN MONTH(data_inicio_servico) = 6 THEN total_consultoria
					ELSE 0 
					END), 2) AS 2_trimestre_consultoria'), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 7 THEN total_consultoria 
					WHEN MONTH(data_inicio_servico) = 8 THEN total_consultoria
					WHEN MONTH(data_inicio_servico) = 9 THEN total_consultoria
					ELSE 0 
					END), 2) AS 3_trimestre_consultoria'), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 10 THEN total_consultoria 
					WHEN MONTH(data_inicio_servico) = 11 THEN total_consultoria
					WHEN MONTH(data_inicio_servico) = 12 THEN total_consultoria
					ELSE 0 
					END), 2) AS 4_trimestre_consultoria'),
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 1 THEN total_formacao 
					WHEN MONTH(data_inicio_servico) = 2 THEN total_formacao
					WHEN MONTH(data_inicio_servico) = 3 THEN total_formacao
					ELSE 0 
					END), 2) AS 1_trimestre_formacao '), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 4 THEN total_formacao 
					WHEN MONTH(data_inicio_servico) = 5 THEN total_formacao
					WHEN MONTH(data_inicio_servico) = 6 THEN total_formacao
					ELSE 0 
					END), 2) AS 2_trimestre_formacao '), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 7 THEN total_formacao 
					WHEN MONTH(data_inicio_servico) = 8 THEN total_formacao
					WHEN MONTH(data_inicio_servico) = 9 THEN total_formacao
					ELSE 0 
					END), 2) AS 3_trimestre_formacao '), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 10 THEN total_formacao 
					WHEN MONTH(data_inicio_servico) = 11 THEN total_formacao
					WHEN MONTH(data_inicio_servico) = 12 THEN total_formacao
					ELSE 0 
					END), 2) AS 4_trimestre_formacao ')
				);
		})	
		->when($request->has('contrato_tipo') && $request->input('contrato_tipo') == 2 && $request->input('consultoria') == 'true' && $request->input('formacao') == 'false' , function ($query) use ( $request ) {
			return $query->select(
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 1 THEN total_consultoria 
					WHEN MONTH(data_inicio_servico) = 2 THEN total_consultoria
					WHEN MONTH(data_inicio_servico) = 3 THEN total_consultoria
					ELSE 0 
					END), 2) AS 1_trimestre_consultoria'), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 4 THEN total_consultoria 
					WHEN MONTH(data_inicio_servico) = 5 THEN total_consultoria
					WHEN MONTH(data_inicio_servico) = 6 THEN total_consultoria
					ELSE 0 
					END), 2) AS 2_trimestre_consultoria'), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 7 THEN total_consultoria 
					WHEN MONTH(data_inicio_servico) = 8 THEN total_consultoria
					WHEN MONTH(data_inicio_servico) = 9 THEN total_consultoria
					ELSE 0 
					END), 2) AS 3_trimestre_consultoria'), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 10 THEN total_consultoria 
					WHEN MONTH(data_inicio_servico) = 11 THEN total_consultoria
					WHEN MONTH(data_inicio_servico) = 12 THEN total_consultoria
					ELSE 0 
					END), 2) AS 4_trimestre_consultoria'),
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 1 THEN numero_horas_consultoria 
					WHEN MONTH(data_inicio_servico) = 2 THEN numero_horas_consultoria
					WHEN MONTH(data_inicio_servico) = 3 THEN numero_horas_consultoria
					ELSE 0 
					END), 2) AS 1_trimestre_horas_consultoria '), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 4 THEN numero_horas_consultoria 
					WHEN MONTH(data_inicio_servico) = 5 THEN numero_horas_consultoria
					WHEN MONTH(data_inicio_servico) = 6 THEN numero_horas_consultoria
					ELSE 0 
					END), 2) AS 2_trimestre_horas_consultoria '), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 7 THEN numero_horas_consultoria 
					WHEN MONTH(data_inicio_servico) = 8 THEN numero_horas_consultoria
					WHEN MONTH(data_inicio_servico) = 9 THEN numero_horas_consultoria
					ELSE 0 
					END), 2) AS 3_trimestre_horas_consultoria '), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 10 THEN numero_horas_consultoria 
					WHEN MONTH(data_inicio_servico) = 11 THEN numero_horas_consultoria
					WHEN MONTH(data_inicio_servico) = 12 THEN numero_horas_consultoria
					ELSE 0 
					END), 2) AS 4_trimestre_horas_consultoria ')
				);
		})	
		->when($request->has('contrato_tipo') && $request->input('contrato_tipo') == 2 && $request->input('consultoria') == 'true' && $request->input('formacao') == 'true' , function ($query) use ( $request ) {
			return $query->select(
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 1 THEN total_consultoria 
					WHEN MONTH(data_inicio_servico) = 2 THEN total_consultoria
					WHEN MONTH(data_inicio_servico) = 3 THEN total_consultoria
					ELSE 0 
					END), 2) AS 1_trimestre_consultoria'), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 4 THEN total_consultoria 
					WHEN MONTH(data_inicio_servico) = 5 THEN total_consultoria
					WHEN MONTH(data_inicio_servico) = 6 THEN total_consultoria
					ELSE 0 
					END), 2) AS 2_trimestre_consultoria'), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 7 THEN total_consultoria 
					WHEN MONTH(data_inicio_servico) = 8 THEN total_consultoria
					WHEN MONTH(data_inicio_servico) = 9 THEN total_consultoria
					ELSE 0 
					END), 2) AS 3_trimestre_consultoria'), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 10 THEN total_consultoria 
					WHEN MONTH(data_inicio_servico) = 11 THEN total_consultoria
					WHEN MONTH(data_inicio_servico) = 12 THEN total_consultoria
					ELSE 0 
					END), 2) AS 4_trimestre_consultoria'),
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 1 THEN numero_horas_consultoria 
					WHEN MONTH(data_inicio_servico) = 2 THEN numero_horas_consultoria
					WHEN MONTH(data_inicio_servico) = 3 THEN numero_horas_consultoria
					ELSE 0 
					END), 2) AS 1_trimestre_horas_consultoria '), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 4 THEN numero_horas_consultoria 
					WHEN MONTH(data_inicio_servico) = 5 THEN numero_horas_consultoria
					WHEN MONTH(data_inicio_servico) = 6 THEN numero_horas_consultoria
					ELSE 0 
					END), 2) AS 2_trimestre_horas_consultoria '), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 7 THEN numero_horas_consultoria 
					WHEN MONTH(data_inicio_servico) = 8 THEN numero_horas_consultoria
					WHEN MONTH(data_inicio_servico) = 9 THEN numero_horas_consultoria
					ELSE 0 
					END), 2) AS 3_trimestre_horas_consultoria '), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 10 THEN numero_horas_consultoria 
					WHEN MONTH(data_inicio_servico) = 11 THEN numero_horas_consultoria
					WHEN MONTH(data_inicio_servico) = 12 THEN numero_horas_consultoria
					ELSE 0 
					END), 2) AS 4_trimestre_horas_consultoria '),
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 1 THEN total_formacao 
					WHEN MONTH(data_inicio_servico) = 2 THEN total_formacao
					WHEN MONTH(data_inicio_servico) = 3 THEN total_formacao
					ELSE 0 
					END), 2) AS 1_trimestre_formacao'), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 4 THEN total_formacao 
					WHEN MONTH(data_inicio_servico) = 5 THEN total_formacao
					WHEN MONTH(data_inicio_servico) = 6 THEN total_formacao
					ELSE 0 
					END), 2) AS 2_trimestre_formacao'), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 7 THEN total_formacao 
					WHEN MONTH(data_inicio_servico) = 8 THEN total_formacao
					WHEN MONTH(data_inicio_servico) = 9 THEN total_formacao
					ELSE 0 
					END), 2) AS 3_trimestre_formacao'), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 10 THEN total_formacao 
					WHEN MONTH(data_inicio_servico) = 11 THEN total_formacao
					WHEN MONTH(data_inicio_servico) = 12 THEN total_formacao
					ELSE 0 
					END), 2) AS 4_trimestre_formacao'),
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 1 THEN numero_horas_formacao 
					WHEN MONTH(data_inicio_servico) = 2 THEN numero_horas_formacao
					WHEN MONTH(data_inicio_servico) = 3 THEN numero_horas_formacao
					ELSE 0 
					END), 2) AS 1_trimestre_horas_formacao '), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 4 THEN numero_horas_formacao 
					WHEN MONTH(data_inicio_servico) = 5 THEN numero_horas_formacao
					WHEN MONTH(data_inicio_servico) = 6 THEN numero_horas_formacao
					ELSE 0 
					END), 2) AS 2_trimestre_horas_formacao '), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 7 THEN numero_horas_formacao 
					WHEN MONTH(data_inicio_servico) = 8 THEN numero_horas_formacao
					WHEN MONTH(data_inicio_servico) = 9 THEN numero_horas_formacao
					ELSE 0 
					END), 2) AS 3_trimestre_horas_formacao '), 
				DB::raw( 'ROUND(SUM(CASE 
					WHEN MONTH(data_inicio_servico) = 10 THEN numero_horas_formacao 
					WHEN MONTH(data_inicio_servico) = 11 THEN numero_horas_formacao
					WHEN MONTH(data_inicio_servico) = 12 THEN numero_horas_formacao
					ELSE 0 
					END), 2) AS 4_trimestre_horas_formacao ')
				);
})	
->when($request->has('contrato_tipo') && $request->input('contrato_tipo') == 2 && $request->input('consultoria') == 'false' && $request->input('formacao') == 'true' , function ($query) use ( $request ) {
	return $query->select(
		DB::raw( 'ROUND(SUM(CASE 
			WHEN MONTH(data_inicio_servico) = 1 THEN total_formacao
			WHEN MONTH(data_inicio_servico) = 2 THEN total_formacao
			WHEN MONTH(data_inicio_servico) = 3 THEN total_formacao
			ELSE 0 
			END), 2) AS 1_trimestre_formacao'), 
		DB::raw( 'ROUND(SUM(CASE 
			WHEN MONTH(data_inicio_servico) = 4 THEN total_formacao 
			WHEN MONTH(data_inicio_servico) = 5 THEN total_formacao
			WHEN MONTH(data_inicio_servico) = 6 THEN total_formacao
			ELSE 0 
			END), 2) AS 2_trimestre_formacao'), 
		DB::raw( 'ROUND(SUM(CASE 
			WHEN MONTH(data_inicio_servico) = 7 THEN total_formacao 
			WHEN MONTH(data_inicio_servico) = 8 THEN total_formacao
			WHEN MONTH(data_inicio_servico) = 9 THEN total_formacao
			ELSE 0 
			END), 2) AS 3_trimestre_formacao'), 
		DB::raw( 'ROUND(SUM(CASE 
			WHEN MONTH(data_inicio_servico) = 10 THEN total_formacao 
			WHEN MONTH(data_inicio_servico) = 11 THEN total_formacao
			WHEN MONTH(data_inicio_servico) = 12 THEN total_formacao
			ELSE 0 
			END), 2) AS 4_trimestre_formacao'),
		DB::raw( 'ROUND(SUM(CASE 
			WHEN MONTH(data_inicio_servico) = 1 THEN numero_horas_formacao 
			WHEN MONTH(data_inicio_servico) = 2 THEN numero_horas_formacao
			WHEN MONTH(data_inicio_servico) = 3 THEN numero_horas_formacao
			ELSE 0 
			END), 2) AS 1_trimestre_horas_formacao '), 
		DB::raw( 'ROUND(SUM(CASE 
			WHEN MONTH(data_inicio_servico) = 4 THEN numero_horas_formacao 
			WHEN MONTH(data_inicio_servico) = 5 THEN numero_horas_formacao
			WHEN MONTH(data_inicio_servico) = 6 THEN numero_horas_formacao
			ELSE 0 
			END), 2) AS 2_trimestre_horas_formacao '), 
		DB::raw( 'ROUND(SUM(CASE 
			WHEN MONTH(data_inicio_servico) = 7 THEN numero_horas_formacao 
			WHEN MONTH(data_inicio_servico) = 8 THEN numero_horas_formacao
			WHEN MONTH(data_inicio_servico) = 9 THEN numero_horas_formacao
			ELSE 0 
			END), 2) AS 3_trimestre_horas_formacao '), 
		DB::raw( 'ROUND(SUM(CASE 
			WHEN MONTH(data_inicio_servico) = 10 THEN numero_horas_formacao 
			WHEN MONTH(data_inicio_servico) = 11 THEN numero_horas_formacao
			WHEN MONTH(data_inicio_servico) = 12 THEN numero_horas_formacao
			ELSE 0 
			END), 2) AS 4_trimestre_horas_formacao ')
		);
})	
->join('projectos', 'projectos.id', '=', 'projecto_consultores.projecto_id')
->when($request->has('ppYear'), function ($query) use ( $request ) {
	return $query->where(DB::raw('YEAR(data_inicio_servico)'), $request->input('ppYear'));
})
->when($request->has('ppYear'), function ($query) use ( $request ) {
	return $query->groupBy(DB::raw('YEAR(data_inicio_servico)'));
})
->when($request->has('ppCe'), function ($query) use ( $request ) {
	return $query->where('centro_emprego_id', $request->input('ppCe'));
})

->get();
DB::setFetchMode(PDO::FETCH_CLASS);

if ($request->has('contrato_tipo') && $request->input('contrato_tipo') == 2 && $request->input('consultoria') == 'true' && $request->input('formacao') == 'false') {

	$result=array_chunk(array_flatten($result), 4);
	$result[0] = [ 'label' => 'Total Consultoria', 'data' => $result[0]  ];
	$result[1] = [ 'label' => 'Total Horas Consultoria', 'data' => $result[1]  ];


} elseif ($request->has('contrato_tipo') && $request->input('contrato_tipo') == 2 && $request->input('consultoria') == 'true' && $request->input('formacao') == 'true') {

	$result=array_chunk(array_flatten($result), 4);
	$result[0] = [ 'label' => 'Total Consultoria', 'data' => $result[0]  ];
	$result[1] = [ 'label' => 'Total Horas Consultoria', 'data' => $result[1]  ];
	$result[2] = [ 'label' => 'Total Formação', 'data' => $result[2]  ];
	$result[3] = [ 'label' => 'Total Horas Formação', 'data' => $result[3]  ];

} elseif ($request->has('contrato_tipo') && $request->input('contrato_tipo') == 2 && $request->input('consultoria') == 'false' && $request->input('formacao') == 'true') {

	$result=array_chunk(array_flatten($result), 4);
	$result[0] = [ 'label' => 'Total Formação', 'data' => $result[0]  ];
	$result[1] = [ 'label' => 'Total Horas Formação', 'data' => $result[1]  ];


} elseif($request->only('contrato_tipo') && $request->input('contrato_tipo') == 2){

	$result=array_chunk(array_flatten($result), 4);
	$result[0] = [ 'label' => 'Total Consultoria', 'data' => $result[0]  ];
	$result[1] = [ 'label' => 'Total Formação', 'data' => $result[1]  ];

} elseif (!$request->has('contrato_tipo') || $request->input('contrato_tipo') ==1) {

	$result=array_chunk(array_flatten($result), 4);
	$result[0] = [ 'label' => 'Total Elaboração de Candidatura', 'data' => $result[0]  ];
	$result[1] = [ 'label' => 'Total Consultoria', 'data' => $result[1]  ];
	$result[2] = [ 'label' => 'Total Formação', 'data' => $result[2]  ];

}

return response()->json($result);
}
public function total_por_programa_centro(Request $request)
{
	DB::setFetchMode(PDO::FETCH_ASSOC);

	/*->when($request->has('ppYear'), function ($query) use ( $request ) {
		return $query->groupBy(DB::raw('YEAR(data_recebimento_pagamento)'));
	})*/


	$programas = DB::table('projectos')
	->select('centro_emprego_id', 'nome')
	->distinct() 
	->leftJoin('organismos_entidades','projectos.centro_emprego_id', '=', 'organismos_entidades.id')
	->orderBy('centro_emprego_id')
	->get();
	$Results= [];
	foreach ($programas as $id) {

		$total_por_programa = DB::table('programas')
		->select(DB::raw('COUNT(projectos.id) as Total'))
		->leftJoin('projectos', function ($join) use ($id) {
			$join->on('projectos.programa_id', '=', 'programas.id')
			->where('projectos.centro_emprego_id', '=', $id['centro_emprego_id']);
		})
		->orderBy('centro_emprego_id')
		->groupBy(DB::raw('programas.id'))
		->get();
		$Results['data'][$id['centro_emprego_id']] = array_flatten($total_por_programa);
	}

	DB::setFetchMode(PDO::FETCH_CLASS);
	
	$labels = array_pluck($programas, 'nome');
	$Results['labels'] = $labels;
    $data = array_values($Results['data']);
    $Results['data'] = $data;
	return response()->json($Results);
}
}
