<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Programas;

use App\ProgramasApoiosDocumentos;

use DB;

use Yajra\Datatables\Datatables;

class ProgramasController extends Controller
{
    /**
    * Process datatables ajax request.
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function programas()
    {
        $programas = DB::table('programas')
        ->select(['programas.id', 'programas.designacao', 'programas.created_at']);
        return Datatables::of($programas)
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

        $programa = Programas::create($request->except(['apoio_tec_1', 'apoio_tec_2']));

        if ( $request->has('apoio_tec_1') ) { 
            foreach ($request->input('apoio_tec_1') as $documento) { 
                $documentos[] = new ProgramasApoiosDocumentos($documento);
            }
        }

        if ( $request->has('apoio_tec_2') ) {
            foreach ($request->input('apoio_tec_2') as $documento) { 
                $documentos[] = new ProgramasApoiosDocumentos($documento);
            }
        }
      
        if (!$programa) {
           flash()->error('Ups, Ocorreu um Erro Tente Novamente Mais Tarde. Se o Problema Persistir, Contacte o Administrador!');
        }

        if ( $request->has('apoio_tec_1') || $request->has('apoio_tec_2') ) {
            $result = $programa->documentos()->saveMany($documentos);
            if (!$result) {
                flash()->error('Ups, Ocorreu um Erro Tente Novamente Mais Tarde. Se o Problema Persistir, Contacte o Administrador!');
            }
            flash()->success('Registo Criado com Sucesso!');
            return redirect()->to('Programas/Detalhes/'.$programa->id);
        }
        
        flash()->success('Registo Criado com Sucesso!');
        return redirect()->to('Programas/Detalhes/'.$programa->id);
    }

    /**
     * Display the specified resource.
     *
      * @param  \App\Programas  $programa
     * @return \Illuminate\Http\Response
     */
    public function show(Programas $programa)
    {
         return view('programas/DetalhesPrograma', compact('programa')); 
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programas $programa)
    {
        $programa->update($request->except(['apoio_tec_1', 'apoio_tec_2']));
        $documentos = [];
        if ( $request->has('apoio_tec_1') ) { 
            foreach ($request->input('apoio_tec_1') as $documento) {
                if ($documento['designacao']) {
                    $documentos[] = new ProgramasApoiosDocumentos($documento);                    
                }
            }
        }
        
        if ( $request->has('apoio_tec_2') ) {
            foreach ($request->input('apoio_tec_2') as $documento) { 
                if ($documento['designacao']) {
                    $documentos[] = new ProgramasApoiosDocumentos($documento);                    
                }
            }
        }
        
        if (!$programa) {
           flash()->error('Ups, Ocorreu um Erro Tente Novamente Mais Tarde. Se o Problema Persistir, Contacte o Administrador!');
        }

        $programa->documentos()->delete();

        if ( $documentos ) {
            $result = $programa->documentos()->saveMany($documentos);
            if (!$result) {
                flash()->error('Ups, Ocorreu um Erro Tente Novamente Mais Tarde. Se o Problema Persistir, Contacte o Administrador!');
            }
            flash()->success('Registo Actualizado com Sucesso!');
            return redirect()->to('Programas/Detalhes/'.$programa->id);
        }
        
        flash()->success('Registo Actualizado com Sucesso!');
        return redirect()->to('Programas/Detalhes/'.$programa->id);
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
