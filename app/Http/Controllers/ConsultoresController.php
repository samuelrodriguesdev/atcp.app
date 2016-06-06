<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Consultores;

use App\ConsultoresContatos;

use DB;

use Yajra\Datatables\Datatables;

class ConsultoresController extends Controller
{
   /**
    * Process datatables ajax request.
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function consultores()
    {
        $consultores = DB::table('consultores')
        ->select(['consultores.id', 'consultores.nome', 'consultores.nif', 'consultores.created_at']);
        return Datatables::of($consultores)
        ->make();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $consultor = Consultores::create($request->except(['consultor_email', 'contatos']));
        
        foreach ($request->input('consultor_email') as $email) { 
            $contatos[] = new ConsultoresContatos($email);
        }

       	foreach ($request->input('contatos') as $contato) { 
            $contatos[] = new ConsultoresContatos($contato);
        }
        
      
        $result = $consultor->contatos()->saveMany($contatos);
        if (!$result) {
           flash()->error('Ups, Ocorreu um Erro Tente Novamente Mais Tarde. Se o Problema Persistir, Contacte o Administrador!');
           return redirect()->back();
        }

        flash()->success('Registo Criado com Sucesso!');
        return redirect()->to('Consultores/Detalhes/'.$consultor->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $consultor
     * @return \Illuminate\Http\Response
     */
    public function show(Consultores $consultor)
    {   
        return view('consultores/detalhesConsultor', compact('consultor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultores $consultor)
    {
        $consultor->update($request->except(['consultor_email', 'contatos']));
        
        foreach ($request->input('consultor_email') as $email) {
        	if ($email['value']) { 
            	$contatos[] = new ConsultoresContatos($email);
        	}
        }

       	foreach ($request->input('contatos') as $contato) {
       		if ($contato['value']) {
       		 	$contatos[] = new ConsultoresContatos($contato);
       		} 
        }

        $consultor->contatos()->delete();
        $result = $consultor->contatos()->saveMany($contatos);

        if (!$result) {
           flash()->error('Ups, Ocorreu um Erro Tente Novamente Mais Tarde. Se o Problema Persistir, Contacte o Administrador!');
           return redirect()->back();
        }

        flash()->success('Registo Actualizado com Sucesso!');
        return redirect()->to('Consultores/Detalhes/'.$consultor->id);
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
