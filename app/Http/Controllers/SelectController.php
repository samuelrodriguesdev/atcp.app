<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tecnicos;

use App\Distritos;

use App\Programas;

use DB;

use App\ProgramasApoiosDocumentos;

class SelectController extends Controller
{
    public function tecnicos(Request $request)
    {
    	if ($request->ajax())
		{
    		$page = $request->input('page');
    		$resultCount = 25;

    		$offset = ($page - 1) * $resultCount;

    		$tecnicos = Tecnicos::leftJoin('organismos_entidades', 'tecnicos.organismo_entidade_id', '=', 'organismos_entidades.id')
    						->where('tecnicos.nome', 'LIKE',  '%' . $request->input("term"). '%')
    						->orderBy('organismos_entidades.nome')
    						->skip($offset)
    						->take($resultCount)
    						->get(['tecnicos.id','tecnicos.nome as tecnico', 'organismos_entidades.nome as organismo']);

    		$count = Tecnicos::count();
    		$endCount = $offset + $resultCount;
    		$morePages =  $count > $endCount ;

    		$results = [
      			"results" => $tecnicos,
      			"pagination" => [
        			"more" => $morePages
        		],
      		];

    		return response()->json($results);
		}
    }

    public function distritos(Request $request)
    {
    	if ($request->ajax())
		{
    		$page = $request->input('page');
    		$resultCount = 25;

    		$offset = ($page - 1) * $resultCount;

    		$distritos = Distritos::where('designacao', 'LIKE',  '%' . $request->input("term"). '%')
    						->orderBy('designacao')
    						->skip($offset)
    						->take($resultCount)
    						->get(['id',DB::raw('designacao as text')]);

    		$count = Distritos::count();
    		$endCount = $offset + $resultCount;
    		$morePages = $endCount > $count;

    		$results = [
      			"results" => $distritos,
      			"pagination" => [
        			"more" => $morePages
        		],
      		];

    		return response()->json($results);
		}
    }

    public function hab_literarias(Request $request)
    {
    	if ($request->ajax())
		{
    		$page = $request->input('page');
    		$resultCount = 25;

    		$offset = ($page - 1) * $resultCount;

    		$hab_literarias = DB::table('hab_literarias')
    						->where('designacao', 'LIKE',  '%' . $request->input("term"). '%')
    						->orderBy('designacao')
    						->skip($offset)
    						->take($resultCount)
    						->get(['id',DB::raw('designacao as text')]);

    		$count = DB::table('hab_literarias')->count();
    		$endCount = $offset + $resultCount;
    		$morePages = $endCount > $count;

    		$results = [
      			"results" => $hab_literarias,
      			"pagination" => [
        			"more" => $morePages
        		],
      		];

    		return response()->json($results);
		}
    }

    public function programas(Request $request)
    {
        if ($request->ajax())
        {
            $page = $request->input('page');
            $resultCount = 25;

            $offset = ($page - 1) * $resultCount;

            $programas = Programas::where('designacao', 'LIKE',  '%' . $request->input("term"). '%')
                            ->orderBy('designacao')
                            ->skip($offset)
                            ->take($resultCount)
                            ->get(['id',DB::raw('designacao as text')]);

            $count = Programas::count();
            $endCount = $offset + $resultCount;
            $morePages = $count > $endCount;

            $results = [
                "results" => $programas,
                "pagination" => [
                    "more" => $morePages
                ],
            ];

            return response()->json($results);
        }
    }

    public function apoios_tecnicos(Request $request)
    {
        if ($request->ajax())
        {
          
            $programa = Programas::find( $request->input('programa') );
            $apoios = ['apoio_criacao' => 'disable', 'apoio_consolidacao' => 'disable'];
            if ($programa->apoio_criacao == 1) {
               $apoios['apoio_criacao'] = 'enable';
            }  
            if ($programa->apoio_consolidacao == 1) {
                $apoios['apoio_consolidacao'] = 'enable';  
            } 

            return response()->json($apoios);
        }
    }

    public function apoio_estado(Request $request)
    {
        if ($request->ajax())
        {
          
            $apoios = DB::table('apoios_estados')
                        ->select('id', 'designacao as text')
                        ->where('apoio_tipo', '=', $request->input('apoio'))
                        ->get();
            $results = [
                "results" => $apoios,
                "pagination" => [
                    "more" => false
                ],
            ];

            return response()->json($results);
        }
    }

    public function programa_documentos(Request $request)
    {
        if ($request->ajax())
        {
            $documentos = Programas::find($request->input('programa'))
                                ->documentos()
                                ->where('apoio_tipo', $request->input('apoio'))
                                ->get(['id', 'designacao']);
            $results = [
                "results" => $documentos,
                "pagination" => [
                    "more" => false
                ],
            ];
            return response()->json($results);
        }
    }

    public function lista_consultores_projecto(Request $request)
    {
        if ($request->ajax())
        {
            $page = $request->input('page');
            $resultCount = 25;

            $offset = ($page - 1) * $resultCount;

            $consultores = DB::table('consultores')
                            ->leftjoin('projecto_consultores', 'consultores.id', '=', 'projecto_consultores.consultor_id')
                            ->where('nome', 'LIKE',  '%' . $request->input("term"). '%')
                            ->groupBy(DB::raw('consultores.id'))
                            ->orderBy('nome')
                            ->skip($offset)
                            ->take($resultCount)
                            ->get([ DB::raw('consultores.id'), DB::raw('nome as consultor'), DB::raw('count(projecto_consultores.consultor_id) as total')]);

            $count = DB::table('consultores')->count();
            $endCount = $offset + $resultCount;
            $morePages = $endCount > $count;

            $results = [
                "results" => $consultores,
                "pagination" => [
                    "more" => $morePages
                ],
            ];

            return response()->json($results);
        }
    }
}
