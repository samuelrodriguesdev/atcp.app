<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ProjectoConsultor;

use App\ProjectoConsultoresDetalhes;

use DB;

use Carbon\Carbon;

class TestesController extends Controller
{
    public function teste()
    {
    	/*$detalhes = ProjectoConsultor::where('elaboracao_candidatura',1)->get();
    	foreach ($detalhes as $detalhe) {
			$quarter = Carbon::parse($detalhe->data_inicio_servico)->quarter;
			$year    = Carbon::parse($detalhe->data_inicio_servico)->year;
    		$query = DB::table('projecto_consultores_detalhes')
    			->insert([ 
					'projecto_consultor_id' => $detalhe->id, 
					'tipo'         => 3, 
					'trimestre'    => $quarter, 
					'ano'          => $year,
					'valor_hora'   => $detalhe->valor_hora_consultoria, 
					'numero_horas' => $detalhe->numero_horas_consultoria,
					'total'        => $detalhe->total_consultoria,
					'created_at'   => DB::raw('NOW()'),
					'updated_at'   => '',
					'deleted_at'   => ''
    			]);
    	}*/
    }
}
