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
	public function testexcel()
	{

		DB::setFetchMode(PDO::FETCH_ASSOC);
		$data = DB::table('projecto_pedidos_pagamento')
		->select('programas.designacao', 'organismos_entidades.nome as organismo', 'promotores.nome as promotor', 'estado_pedido_pagamento', 'data_pedido_pagamento', 'data_recebimento_pagamento', 'valor_pedido_pagamento', 'valor_pago_pagamento', 'observacoes')
		->join('projectos', 'projectos.id', '=', 'projecto_pedidos_pagamento.projecto_id')
		->join('promotores', 'promotores.id', '=', 'projectos.promotor_id')
		->join('organismos_entidades', 'projectos.centro_emprego_id', '=', 'organismos_entidades.id')
		->join('programas','projectos.programa_id', '=', 'programas.id')
		->whereNull('promotores.deleted_at')
		->when($request->has('centro_de_emprego'), function ($query) use ( $request ) {
			return $query->where('promotores.centro_emprego_id', $request->input('centro_de_emprego'));
		})
		->when($request->has('programa'), function ($query) use ( $request ) {
			return $query->where('promotores.programa_id', $request->input('programa'));
		})
		->when($request->has('estado_pedido_pagamento'), function ($query) use ( $request ) {
			return $query->where('projecto_pedidos_pagamento.estado_pedido_pagamento', $request->input('estado_pedido_pagamento'));
		})
		->when($request->has('ano'), function ($query) use ( $request ) {
			return $query->where('YEAR(data_pedido_pagamento)', $request->input('ano'));
		})
		->when($request->has('trimestre'), function ($query) use ( $request ) {
			return $query->where('QUARTER(data_pedido_pagamento)', $request->input('trimestre'));
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

		Excel::create('testfile', function($excel) use ($data) 
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
				$sheet->cells('A2:J'.count($data)+1, function($cells) {
					$cells->setBorder(array(
					    'outline'   => array(
					        'style' => 'medium'
					    ),
					));
				});
				$sheet->cells('G306:H308', function($cells) {
					$cells->setBorder(array(
					    'outline'   => array(
					        'style' => 'medium'
					    ),
					));
				});

			});

		})->download('xlsx');
	}
}