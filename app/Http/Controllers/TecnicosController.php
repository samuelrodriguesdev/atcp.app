<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Yajra\Datatables\Datatables;

use App\Tecnicos;

use DB;

use Carbon\Carbon;

use App\TecnicosContatos;

class TecnicosController extends Controller
{

    /**
    * Process datatables ajax request.
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function anyData()
    {
        $tecnicos = DB::table('tecnicos')
        ->leftJoin('organismos_entidades', 'tecnicos.organismo_entidade_id', '=', 'organismos_entidades.id')
        ->select(['tecnicos.id', 'tecnicos.nome as tecnico', 'tecnicos.created_at', 'organismos_entidades.nome as organismo']);
        
        return Datatables::of($tecnicos)
        ->editColumn('tecnico', '<b> [ {{ $organismo }} ] </b> - {{ $tecnico }}')
        ->make();
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
        $tecnico = Tecnicos::create([
            'nome'                  => $data['nome'],
            'organismo_entidade_id' => $data['organismo_entidade_id']
        ]);
        $contatos = [];
        for ($i=0; $i < count($data['contatos']); $i++) { 
            if ($data['contatos'][$i]['value']) {
                $contatos[] = new TecnicosContatos($data['contatos'][$i]);
            }
        }
       
        for ($i=0; $i < count($data['tecnico_email']); $i++) { 
            if ($data['tecnico_email'][$i]['value']) {
                $contatos[] = new TecnicosContatos($data['tecnico_email'][$i]);
            }
        }

        if (!$tecnico) {
           flash()->error('Ups, Ocorreu um Erro Tente Novamente Mais Tarde. Se o Problema Persistir, Contacte o Administrador!');
        }

        if ($contatos) {
            $result = $tecnico->contatos()->saveMany($contatos);
            if (!$result) {
                flash()->error('Ups, Ocorreu um Erro Tente Novamente Mais Tarde. Se o Problema Persistir, Contacte o Administrador!');
            }
            flash()->success('Registo Criado com Sucesso!');
            return redirect()->to('Tecnicos/Detalhes/'.$tecnico->id);
        }
        
        flash()->success('Registo Criado com Sucesso!');
        return redirect()->to('Tecnicos/Detalhes/'.$tecnico->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tecnicos $tecnico)
    {
        return view('tecnicos/detalhesTecnico', compact('tecnico'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tecnicos $tecnico)
    {
        $data = $request->all();
        $tecnico->update($data);
        
        $contatos = [];
        $contatos_array = array_values($data['contatos']);
        for ($i=0; $i < count($contatos_array); $i++) { 
            if ($contatos_array[$i]['value']) {
                $contatos[] = new TecnicosContatos($contatos_array[$i]);
            }
        }

        $emails_array = array_values($data['tecnico_email']);
        for ($i=0; $i < count($emails_array); $i++) { 
            if ($emails_array[$i]['value']) {
                $contatos[] = new TecnicosContatos($emails_array[$i]);
            }
        }

        $tecnico->contatos()->delete();

        if (!$tecnico) {
           flash()->error('Ups, Ocorreu um Erro Tente Novamente Mais Tarde. Se o Problema Persistir, Contacte o Administrador!');
        }

        if ($contatos) {
            $result = $tecnico->contatos()->saveMany($contatos);
            if (!$result) {
                flash()->error('Ups, Ocorreu um Erro Tente Novamente Mais Tarde. Se o Problema Persistir, Contacte o Administrador!');
            }
            flash()->success('Registo Atualizado com Sucesso!');
            return redirect()->back();
        }
        
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
        //
    }
}
