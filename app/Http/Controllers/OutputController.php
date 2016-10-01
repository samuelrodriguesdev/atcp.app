<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Excel;

use DB;

use PDO;

use Carbon\Carbon;

use App\Promotores;

use App\Projectos;

use App\PromotoresContatos;

use App\PromotoresFichaIniciativa;

use App\ProjectoConsultor;

use App\ProjectoPP;

use App\Helpers\Helper;

class OutputController extends Controller
{
	public function pedidosPagamento(Request $request)
	{

		DB::setFetchMode(PDO::FETCH_ASSOC);
		$data = DB::table('projecto_pedidos_pagamento')
		->select('programas.designacao', 'organismos_entidades.nome as organismo', 'promotores.nome as promotor', 'estado_pedido_pagamento', 'data_pedido_pagamento', 'data_recebimento_pagamento', 'valor_pedido_pagamento', 'valor_pago_pagamento', 'observacoes')
		->join('projectos', 'projectos.id', '=', 'projecto_pedidos_pagamento.projecto_id')
		->join('promotores', 'promotores.id', '=', 'projectos.promotor_id')
		->join('organismos_entidades', 'projectos.centro_emprego_id', '=', 'organismos_entidades.id')
		->join('programas','projectos.programa_id', '=', 'programas.id')
		->whereNull('promotores.deleted_at')
		->when($request->has('centro_emprego'), function ($query) use ( $request ) {
			return $query->where('projectos.centro_emprego_id', $request->input('centro_emprego'));
		})
		->when($request->has('programa'), function ($query) use ( $request ) {
			return $query->where('projectos.programa_id', $request->input('programa'));
		})
		->when($request->has('estado_pedido_pagamento'), function ($query) use ( $request ) {
			return $query->where('projecto_pedidos_pagamento.estado_pedido_pagamento', $request->input('estado_pedido_pagamento'));
		})
		->when($request->has('ano'), function ($query) use ( $request ) {
			return $query->where(DB::raw('YEAR(data_pedido_pagamento)'), $request->input('ano'));
		})
		->when($request->has('trimestres'), function ($query) use ( $request ) {
			return $query->whereIn(DB::raw('QUARTER(data_pedido_pagamento)'), $request->input('trimestres'));
		})
		->when($request->has('tipo_de_apoio'), function ($query) use ( $request ) {
			if ( $request->input('tipo_de_apoio') == 1) 
				return $query->where('projectos.apoio_criacao', 1);
			else 
				return $query->where('projectos.apoio_consolidacao', 1);
		})
		->get();
		DB::setFetchMode(PDO::FETCH_CLASS);
		foreach ($data as $key => &$object) 
		{

			switch ($object['estado_pedido_pagamento']) 
			{
				case '1':
				$object['estado_pedido_pagamento'] = 'Não Liquidado';
				$object['data_recebimento_pagamento'] = '';
				break;
				case '2':
				$object['estado_pedido_pagamento'] = 'Liquidado';
				break;
				case '3':
				$object['estado_pedido_pagamento'] = 'Liquidado Parcialmente';
				break;
			}
			Helper::array_insert( $data[$key], "data_pedido_pagamento", ['trimeste' => ''.Carbon::parse($object['data_pedido_pagamento'])->quarter.'º/'.Carbon::parse($object['data_pedido_pagamento'])->year] );
		}

		Excel::create('export_pedidos_de_pagamento', function($excel) use ($data) 
		{

			$excel->sheet('sheet1', function($sheet) use ($data) 
			{
				$sheet->setColumnFormat(array(
					'A' => '@',
					'B' => '@',
					'C' => '@',
					'D' => '@',
					'E' => '@',
					'F' => 'yyyy-mm-dd',
					'G' => 'yyyy-mm-dd',
					'H' => '[$€ ]#,##0.00_-',
					'I' => '[$€ ]#,##0.00_-',
					'J' => '@'
					));
				$lastRow = count($data)+1;
				$sheet->fromArray($data, null, 'A2', false, false);

				$sheet->appendRow(1, array(
					'Programa', 'Centro de Emprego', 'Promotor', 'Estado do Pagamento', 'Trimestre/Ano', 'Data do Pedido de Pagamento', 'Data de Recebimento do Pagamento', 'Valor Pedido', 'Valor Pago', 'Obervações'
					));
				$sheet->row(1, function($row) {
					$row->setBackground('#BFBFBF');
					$row->setFontWeight('bold');
				});
				

				$sheet->appendRow(count($data)+3, array(
					'','','','','','', 'Total Pedido', '=SUM(H2:H'.$lastRow.')'
					));
				$sheet->appendRow(count($data)+4, array(
					'','','','','','', 'Total Recebido', '=SUMIF(D2:D'.$lastRow.',"Liquidado",H2:H'.$lastRow.')+SUMIF(D2:D'.$lastRow.',"Liquidado Parcialmente",I2:I'.$lastRow.')'
					));
				$sheet->appendRow(count($data)+5, array(
					'','','','','','', 'Total Por Receber', '=SUMIF(D2:D'.$lastRow.',"Não Liquidado",H2:H'.$lastRow.')+SUMIF(D2:D'.$lastRow.',"Liquidado Parcialmente",H2:H'.$lastRow.')-SUMIF(D2:D'.$lastRow.',"Liquidado Parcialmente",I2:I'.$lastRow.')'
					));
				$sheet->cells('A1:J1', function($cells) {
					$cells->setBorder(array(
						'outline'   => array(
							'style' => 'medium'
							),
						));
				});
				$sheet->cells('A2:J',count($data)+1, function($cells) {
					$cells->setBorder(array(
						'outline'   => array(
							'style' => 'medium'
							),
						));
				});
				$resultsInitialRow = count($data)+3;
				$resultsFinalRow   = count($data)+5;
				$sheet->cells('G'.$resultsInitialRow.':H'.$resultsFinalRow, function($cells) {
					$cells->setBorder(array(
						'outline'   => array(
							'style' => 'medium'
							),
						));
				});

			});

		})->download('xlsx');
	}

	public function consultores(Request $request)
	{

		DB::setFetchMode(PDO::FETCH_ASSOC);
		$data = DB::table('projecto_consultores')
		->select('programas.designacao', 'promotores.nome as promotor', 'consultores.nome', 'contrato_tipo', 'valor_hora', 'numero_horas', 'total', 'data_inicio_servico', 'data_fim_servico')
		->join('projectos', 'projectos.id', '=', 'projecto_consultores.projecto_id')
		->join('promotores', 'promotores.id', '=', 'projectos.promotor_id')
		->join('consultores', 'projecto_consultores.consultor_id', '=', 'consultores.id')
		->join('organismos_entidades', 'projectos.centro_emprego_id', '=', 'organismos_entidades.id')
		->join('programas','projectos.programa_id', '=', 'programas.id')
		->whereNull('promotores.deleted_at')
		->when($request->has('centro_emprego'), function ($query) use ( $request ) {
			return $query->where('projectos.centro_emprego_id', $request->input('centro_emprego'));
		})
		->when($request->has('programa'), function ($query) use ( $request ) {
			return $query->where('projectos.programa_id', $request->input('programa'));
		})
		->when($request->has('tipo_de_apoio'), function ($query) use ( $request ) {
			if ( $request->input('tipo_de_apoio') == 1) 
				return $query->where('projectos.apoio_criacao', 1);
			else 
				return $query->where('projectos.apoio_consolidacao', 1);
		})
		->when($request->has('ano'), function ($query) use ( $request ) {
			return $query->where(DB::raw('YEAR(projecto_data_inicio)'), $request->input('ano'));
		})
		->get();

		DB::setFetchMode(PDO::FETCH_CLASS);
		foreach ($data as $key => &$object) 
		{

			switch ($object['contrato_tipo']) 
			{
				case '1':
				$object['contrato_tipo'] = 'Apoio á Criação';
				break;
				case '2':
				$object['contrato_tipo'] = 'Apoio á Consolidação';
				break;
			}
		}

		Excel::create('export_consultores', function($excel) use ($data) 
		{

			$excel->sheet('sheet1', function($sheet) use ($data) 
			{
				$sheet->setColumnFormat(array(
					'A' => '@',
					'B' => '@',
					'C' => '@',
					'D' => '[$€ ]#,##0.00_-',
					'E' => '0',
					'F' => '[$€ ]#,##0.00_-',
					'G' => '[$€ ]#,##0.00_-',
					'H' => '0',
					'I' => '[$€ ]#,##0.00_-',
					'J' => '0',
					'K' => '[$€ ]#,##0.00_-',
					'L' => 'yyyy-mm-dd',
					'M' => 'yyyy-mm-dd'
				));

				$sheet->fromArray([], null, 'A2', false, false);

				$sheet->appendRow(1, array(
					'Programa', 'Promotor', 'Consultor', 'Tipo de Apoio', 'Consultoria(€/H)', 'Consultoria(H)', 'Consultoria(Total)', 'Formação(€/H)', 'Consultoria(H)', 'Consultoria(Total)', 'Elaboração de Candidatura(%)', 'Elaboração de Candidatura(Total)', 'Data Início', 'Data Fim'
					));
				$sheet->row(1, function($row) {
					$row->setBackground('#BFBFBF');
					$row->setFontWeight('bold');
				});

				foreach ($data as $object) {
					$sheet->appendRow($object);
					if ($object['contrato_tipo'] == "Apoio á Criação") {
						$sheet->mergeCells('D'.$sheet->getHighestRow().':I'.$sheet->getHighestRow());
            			$sheet->cell('D'.$sheet->getHighestRow(), function($cell) {
   							$cell->setValue('');
   							$cell->setBackground('#FFFF99');
						});
            		}
            		else {
            			$sheet->mergeCells('J'.$sheet->getHighestRow().':K'.$sheet->getHighestRow());
            			$sheet->cell('J'.$sheet->getHighestRow(), function($cell) {
   							$cell->setValue('');
   							$cell->setBackground('FFFF99');
						});
					}

            	}
				$lastRow    = $sheet->getHighestRow();
				$resultsRow = $sheet->getHighestRow()+2;
				$headerRow  = $sheet->getHighestRow()+3;
            	$sheet->mergeCells('A'.$resultsRow.':C'.$headerRow);
            	$sheet->mergeCells('E'.$resultsRow.':G'.$headerRow);
            	$sheet->mergeCells('I'.$resultsRow.':K'.$headerRow);
            	$sheet->cell('A'.$resultsRow, function($cell) {
   					$cell->setValue('Consultoria');
   					$cell->setBackground('#538DD5');
   					$cell->setFontSize(16);
   					$cell->setFontWeight('bold');
   					$cell->setAlignment('center');
   					$cell->setValignment('center');
				});
				$sheet->cell('E'.$resultsRow, function($cell) {
   					$cell->setValue('Formação');
   					$cell->setBackground('#538DD5');
   					$cell->setFontSize(16);
   					$cell->setFontWeight('bold');
   					$cell->setAlignment('center');
   					$cell->setValignment('center');
				});
				$sheet->cell('I'.$resultsRow, function($cell) {
   					$cell->setValue('Elaboração de Candidatura');
   					$cell->setBackground('#538DD5');
   					$cell->setFontSize(16);
   					$cell->setFontWeight('bold');
   					$cell->setAlignment('center');
   					$cell->setValignment('center');
				});
				$firstTotalTop = $headerRow +1;
				$firstTotalBot = $firstTotalTop +1;
				$sheet->mergeCells('A'.$firstTotalTop.':B'.$firstTotalBot);
				$sheet->mergeCells('C'.$firstTotalTop.':C'.$firstTotalBot);
				$sheet->mergeCells('E'.$firstTotalTop.':F'.$firstTotalBot);
				$sheet->mergeCells('G'.$firstTotalTop.':G'.$firstTotalBot);
				$sheet->mergeCells('I'.$firstTotalTop.':J'.$firstTotalBot);
				$sheet->mergeCells('K'.$firstTotalTop.':K'.$firstTotalBot);
				$sheet->cell('A'.$firstTotalTop, function($cell) {
   					$cell->setValue('Total(€)');
   					$cell->setFontWeight('bold');
   					$cell->setAlignment('center');
   					$cell->setValignment('center');
				});
				$sheet->cell('C'.$firstTotalTop, function($cell) use($sheet, $lastRow) {
   					$cell->setValue('=SUM(F2:F'.$lastRow.')');
   					$cell->setFontWeight('bold');
   					$cell->setAlignment('center');
   					$cell->setValignment('center');
				});
				$sheet->cell('E'.$firstTotalTop, function($cell) {
   					$cell->setValue('Total(€)');
   					$cell->setFontWeight('bold');
   					$cell->setAlignment('center');
   					$cell->setValignment('center');
				});
				$sheet->cell('G'.$firstTotalTop, function($cell) use($sheet, $lastRow) {
   					$cell->setValue('=SUM(I2:I'.$lastRow.')');
   					$cell->setFontWeight('bold');
   					$cell->setAlignment('center');
   					$cell->setValignment('center');
				});
				$sheet->cell('I'.$firstTotalTop, function($cell) {
   					$cell->setValue('Total(€)');
   					$cell->setFontWeight('bold');
   					$cell->setAlignment('center');
   					$cell->setValignment('center');
				});
				$sheet->cell('K'.$firstTotalTop, function($cell) use($sheet, $lastRow) {
   					$cell->setValue('=SUM(K2:K'.$lastRow.')');
   					$cell->setFontWeight('bold');
   					$cell->setAlignment('center');
   					$cell->setValignment('center');
				});
				$secondTotalTop = $firstTotalBot +1;
				$secondTotalBot = $secondTotalTop +1;
				$sheet->mergeCells('A'.$secondTotalTop.':B'.$secondTotalBot);
				$sheet->mergeCells('C'.$secondTotalTop.':C'.$secondTotalBot);
				$sheet->mergeCells('E'.$secondTotalTop.':F'.$secondTotalBot);
				$sheet->mergeCells('G'.$secondTotalTop.':G'.$secondTotalBot);
				$sheet->cell('A'.$secondTotalTop, function($cell) {
   					$cell->setValue('Total(H)');
   					$cell->setFontWeight('bold');
   					$cell->setAlignment('center');
   					$cell->setValignment('center');
				});
				$sheet->cell('C'.$secondTotalTop, function($cell) use($sheet, $lastRow) {
   					$cell->setValue('=SUM(E2:E'.$lastRow.')');
   					$cell->setFontWeight('bold');
   					$cell->setAlignment('center');
   					$cell->setValignment('center');
				});
				$sheet->cell('E'.$secondTotalTop, function($cell) {
   					$cell->setValue('Total(H)');
   					$cell->setFontWeight('bold');
   					$cell->setAlignment('center');
   					$cell->setValignment('center');
				});
				$sheet->cell('G'.$secondTotalTop, function($cell) use($sheet, $lastRow) {
   					$cell->setValue('=SUM(H2:H'.$lastRow.')');
   					$cell->setFontWeight('bold');
   					$cell->setAlignment('center');
   					$cell->setValignment('center');
				});
				$thirdTotalTop = $secondTotalBot +1;
				$thirdTotalBot = $thirdTotalTop +1;
				$sheet->mergeCells('A'.$thirdTotalTop.':B'.$thirdTotalBot);
				$sheet->mergeCells('C'.$thirdTotalTop.':C'.$thirdTotalBot);
				$sheet->mergeCells('E'.$thirdTotalTop.':F'.$thirdTotalBot);
				$sheet->mergeCells('G'.$thirdTotalTop.':G'.$thirdTotalBot);
				$sheet->cell('A'.$thirdTotalTop, function($cell) {
   					$cell->setValue('Valor Médio(€\H)');
   					$cell->setFontWeight('bold');
   					$cell->setAlignment('center');
   					$cell->setValignment('center');
				});
				$sheet->cell('C'.$thirdTotalTop, function($cell) use($sheet, $lastRow) {
   					$cell->setValue('=SUM(F2:F'.$lastRow.')/SUM(E2:E'.$lastRow.')');
   					$cell->setFontWeight('bold');
   					$cell->setAlignment('center');
   					$cell->setValignment('center');
				});
				$sheet->cell('E'.$thirdTotalTop, function($cell) {
   					$cell->setValue('Valor Médio(€\H)');
   					$cell->setFontWeight('bold');
   					$cell->setAlignment('center');
   					$cell->setValignment('center');
				});
				$sheet->cell('G'.$thirdTotalTop, function($cell) use($sheet, $lastRow) {
   					$cell->setValue('=SUM(I2:I'.$lastRow.')/SUM(H2:H'.$lastRow.')');
   					$cell->setFontWeight('bold');
   					$cell->setAlignment('center');
   					$cell->setValignment('center');
				});
				$currencyFormat = '_(€* #,##0.00_);_(€* (#,##0.00);_(€* "-"??_);_(@_)';
				$textFormat='@';
				$sheet->getStyle('C'.$firstTotalTop)
					  ->getNumberFormat()
					  ->setFormatCode($currencyFormat);		
				$sheet->getStyle('C'.$thirdTotalTop)
					  ->getNumberFormat()
					  ->setFormatCode($currencyFormat);
				$sheet->getStyle('G'.$firstTotalTop)
					  ->getNumberFormat()
					  ->setFormatCode($currencyFormat);		
				$sheet->getStyle('G'.$thirdTotalTop)
					  ->getNumberFormat()
					  ->setFormatCode($currencyFormat);
				$sheet->getStyle('G'.$secondTotalTop)
					  ->getNumberFormat()
					  ->setFormatCode($textFormat);
				$sheet->getStyle('K'.$firstTotalTop)
					  ->getNumberFormat()
					  ->setFormatCode($currencyFormat);

				$sheet->cells('A'.$resultsRow.':C'.$thirdTotalBot, function($cells) {
					$cells->setBorder(array(
						'outline'   => array(
							'style' => 'medium'
							),
					));
				});

				$sheet->cells('E'.$resultsRow.':G'.$thirdTotalBot, function($cells) {
					$cells->setBorder(array(
						'outline'   => array(
							'style' => 'medium'
							),
						));
				});

				$sheet->cells('I'.$resultsRow.':K'.$firstTotalBot, function($cells) {
					$cells->setBorder(array(
						'outline'   => array(
							'style' => 'medium'
							),
						));
				});

			});

		})->download('xlsx');
	}


	public function promotores(Request $request)
	{
		
		Excel::create('export_promotores', function($excel) use ($request)
		{

			$excel->sheet('sheet1', function($sheet) use ($request)
			{
				
				DB::setFetchMode(PDO::FETCH_ASSOC);
					$promotores = DB::table('promotores')
					->select('projectos.id as projecto_id', 'programas.designacao', 'promotores.nome as promotor', 'organismos_entidades.nome as organismo')
					->join('projectos', 'projectos.promotor_id', '=', 'promotores.id')
					->join('programas','projectos.programa_id', '=', 'programas.id')
					->join('organismos_entidades', 'projectos.centro_emprego_id', '=', 'organismos_entidades.id')
					->whereNull('promotores.deleted_at')
					->when($request->has('centro_emprego'), function ($query) use ( $request ) {
						return $query->where('projectos.centro_emprego_id', $request->input('centro_emprego'));
					})
					->when($request->has('programa'), function ($query) use ( $request ) {
						return $query->where('projectos.programa_id', $request->input('programa'));
					})
					->when($request->has('tipo_de_apoio'), function ($query) use ( $request ) {
						if ( $request->input('tipo_de_apoio') == 1) 
							return $query->where('projectos.apoio_criacao', 1);
						else 
							return $query->where('projectos.apoio_consolidacao', 1);
					})
					->get();
				DB::setFetchMode(PDO::FETCH_CLASS);
					foreach ($promotores as $promotor) 
					{
						$sheet->appendRow(['','','','','','','','']);
						$sheet->row($sheet->getHighestRow(), function($row) {
							$row->setBackground('#000000');
							$row->setFontWeight('bold');
						});
						$sheet->appendRow($promotor);
						$sheet->row($sheet->getHighestRow(), function($row) {
							$row->setBackground('#BFBFBF');
							$row->setFontWeight('bold');
						});
						
						$pedidosPagamento = ProjectoPP::select('estado_pedido_pagamento', 'data_pedido_pagamento', 'data_recebimento_pagamento', 'valor_pedido_pagamento', 'valor_pago_pagamento', 'observacoes')
						->where('projecto_id', $promotor['projecto_id'])
						->when($request->has('estado_pedido_pagamento'), function ($query) use ( $request ) {
							return $query->where('projecto_pedidos_pagamento.estado_pedido_pagamento', $request->input('estado_pedido_pagamento'));
						})
						->when($request->has('ano'), function ($query) use ( $request ) {
							return $query->where(DB::raw('YEAR(data_pedido_pagamento)'), $request->input('ano'));
						})
						->when($request->has('trimestres'), function ($query) use ( $request ) {
							return $query->whereIn(DB::raw('QUARTER(data_pedido_pagamento)'), $request->input('trimestres'));
						})
						->get()->toArray();
						$sheet->appendRow(array('Pagamentos', 'Estado do Pagamento', 'Trimestre/Ano', 'Data do Pedido de Pagamento', 'Data de Recebimento do Pagamento', 'Valor Pedido', 'Valor Pago', 'Obervações'
						));
						$sheet->row($sheet->getHighestRow(), function($row) {
							$row->setBackground('#538DD5');
							$row->setFontWeight('bold');
						});		
						foreach ($pedidosPagamento as &$pagamento) 
						{
							switch ($pagamento['estado_pedido_pagamento']) 
							{
								case '1':
								$pagamento['estado_pedido_pagamento'] = 'Não Liquidado';
								$pagamento['data_recebimento_pagamento'] = '';
								break;
								case '2':
								$pagamento['estado_pedido_pagamento'] = 'Liquidado';
								break;
								case '3':
								$pagamento['estado_pedido_pagamento'] = 'Liquidado Parcialmente';
								break;
							}
							Helper::array_insert( $pagamento, "data_pedido_pagamento", ['trimeste' => ''.Carbon::parse($pagamento['data_pedido_pagamento'])->quarter.'º/'.Carbon::parse($pagamento['data_pedido_pagamento'])->year] );
							$pagamento = array_prepend($pagamento, '');
							$sheet->appendRow($pagamento);
							
						}

						$consultores = ProjectoConsultor::select('consultores.nome', 'valor_hora_consultoria', 'numero_horas_consultoria', 'total_consultoria', 'valor_hora_formacao', 'numero_horas_formacao', 'total_formacao', 'percentagem_elaboracao_candidatura', 'total_elaboracao_candidatura', 'data_inicio_servico', 'data_fim_servico')
						->join('consultores', 'projecto_consultores.consultor_id', '=', 'consultores.id')
						->where('projecto_id', $promotor['projecto_id'])
						->get()->toArray();
						$sheet->appendRow(array('Consultores','Consultoria(€/H)', 'Consultoria(H)', 'Consultoria(Total)', 'Formação(€/H)', 'Consultoria(H)', 'Consultoria(Total)', 'Elaboração de Candidatura(%)', 'Elaboração de Candidatura(Total)', 'Data Início', 'Data Fim'
						));
						$sheet->row($sheet->getHighestRow(), function($row) {
							$row->setBackground('#FFA07A');
							$row->setFontWeight('bold');
						});	
						foreach ($consultores as $consultor) 
						{
							$sheet->appendRow($consultor);
						}

					}
				
			});
		})->download('xlsx');
	}
}