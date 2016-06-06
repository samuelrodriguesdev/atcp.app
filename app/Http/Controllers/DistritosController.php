<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

use Carbon\Carbon;

class DistritosController extends Controller
{
	/**
	 * lista distritos para select2
	 * 
	 * @return \Illuminate\Http\JsonResponse
	 */
   public function select(Request $request)
   {
   		$search = $request->input('search');
        $result['results'] = DB::table('distritos')
                			->select(['distritos.id as id','distritos.designacao as text' ])
                			->where('distritos.designacao', 'LIKE', '%'.$search.'%')->get();
        $result['total_count'] = Count($result['results']);
        return $result;
   }
}
