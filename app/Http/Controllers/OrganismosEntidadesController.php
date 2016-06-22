<?php

namespace App\Http\Controllers;

use App\OrganismosEntidades;

use App\OrganismosEntidadesContatos;

use Illuminate\Http\Request;

use App\Http\Requests;

use Yajra\Datatables\Datatables;

use DB;

use Carbon\Carbon;

use Flash;

class OrganismosEntidadesController extends Controller
{

    /**
    * Process datatables ajax request.
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function anyData() 
    {
        $organismosEntidades = DB::table('organismos_entidades')
                                ->select(['id', 'nome', 'localidade']);
        return Datatables::of($organismosEntidades)
                        ->make();

    }
    /**
    * Select2 Formatted array.
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function select2List(Request $request)
    {
        $search = $request->input('search');
        $result['results'] = DB::table('organismos_entidades')
                ->select(['organismos_entidades.id as id','organismos_entidades.nome as text' ])
                ->where('organismos_entidades.nome', 'LIKE', '%'.$search.'%')->get();
        $result['total_count'] = Count($result['results']);
        return $result;
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $organismo = OrganismosEntidades::create([
            'nome'        => $data['nome'],
            'morada'      => $data['morada'],
            'cp4'         => $data['cp4'],
            'cp3'         => $data['cp3'],
            'distrito_id' => $data['distrito_id'],
            'localidade'  => $data['localidade']
        ]);
        
        
        for ($i=0; $i < count($data['contatos']); $i++) { 
            $contatos[] = new OrganismosEntidadesContatos($data['contatos'][$i]);
        }
       
        for ($i=0; $i < count($data['organismo_email']); $i++) { 
            $contatos[] = new OrganismosEntidadesContatos($data['organismo_email'][$i]);
        }
        $result = $organismo->contatos()->saveMany($contatos);
        if (!$result) {
           flash()->error('Ups, Ocorreu um Erro Tente Novamente Mais Tarde. Se o Problema Persistir, Contacte o Administrador!');
           return redirect()->back();
        }
        flash()->success('Registo Criado com Sucesso!');
        return redirect()->to('Organismos-Entidades/Detalhes/'.$organismo->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(OrganismosEntidades $OrganismosEntidades)
    {
       return view('organismos_entidades/DetalhesOrganismoEntidade', compact('OrganismosEntidades')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        $organismo = OrganismosEntidades::find($id);
        $organismo->update($request->all());

        
        $contatos_array = array_values($data['contatos']);
       
        for ($i=0; $i < count($contatos_array); $i++) { 
            if ($contatos_array[$i]['value']) {
                $contatos[] = new OrganismosEntidadesContatos($contatos_array[$i]);
            }
        }

        $emails_array = array_values($data['organismo_email']);
        for ($i=0; $i < count($emails_array); $i++) { 
            if ($emails_array[$i]['value']) {
                $contatos[] = new OrganismosEntidadesContatos($emails_array[$i]);
            }  
        }

        $organismo->contatos()->delete();

        $result = $organismo->contatos()->saveMany($contatos);
        flash()->success('Registo Atualizado com Sucesso!');
        return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
