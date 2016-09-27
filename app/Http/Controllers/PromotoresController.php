<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Yajra\Datatables\Datatables;

use DB;

use App\Promotores;

use App\Projectos;

use App\PromotoresContatos;

use App\PromotoresFichaIniciativa;

use App\ProjectoConsultor;

use App\ProjectoPP;

use App\ProjectoConsultoresDetalhes;

class PromotoresController extends Controller
{
	public function tableData()
	{
        $promotores = DB::table('promotores')
        ->leftJoin('projectos', 'promotores.id', '=', 'projectos.promotor_id')
        ->leftJoin('programas', 'projectos.programa_id', '=', 'programas.id')
        ->leftJoin('organismos_entidades', 'projectos.centro_emprego_id', '=', 'organismos_entidades.id')
        ->select(['promotores.id', 'promotores.nome', 'programas.designacao', DB::raw('(CASE WHEN promotor_estado = 1 THEN "Potencial" WHEN promotor_estado = 2 THEN "Activo" WHEN promotor_estado = 3 THEN "Inactivo" ELSE "" END) as promotor_estado'), 'organismos_entidades.nome as organismo'])
        ->whereNull('promotores.deleted_at');
        return Datatables::of($promotores)
        ->make();
    
	}

	public function store(Request $request)
	{
		
		$success = DB::transaction(function ($request) use ($request) {

			$promotor = Promotores::create( $request->all() );

			foreach ($request->input('promotor_email') as $email) { 
				$contatos[] = new PromotoresContatos($email);
			}

			foreach ($request->input('contatos') as $contato) { 
				$contatos[] = new PromotoresContatos($contato);
			}

			$promotor->contatos()->saveMany($contatos);

			$projecto = $promotor->projecto()->save( new Projectos( $request->all() ));

			$projecto->documentos()->attach($request->input('projecto_documentos'));

			$promotor->ficha_iniciativa()->save( new PromotoresFichaIniciativa( $request->all() ) );

			$projecto->tecnicos()->attach($request->input('tecnico_id'));

			return $promotor->id;

		});

		flash()->success('Registo Criado com Sucesso!');
		return redirect()->to('Promotores/Detalhes/'.$success);
	}

	public function show(Promotores $promotor)
	{
		return view('promotores/DetalhesPromotor', compact('promotor')); 
	}

	public function update(Request $request, Promotores $promotor)
	{
		$success = DB::transaction(function () use ($request, $promotor) {

			$promotor->update( $request->all() );

			foreach ($request->input('promotor_email') as $email) { 
				if ($email['value']) { 
					$contatos[] = new PromotoresContatos($email);
				}
			}

			foreach ($request->input('contatos') as $contato) {
				if ($contato['value']) {  
					$contatos[] = new PromotoresContatos($contato);
				}
			}

			$promotor->contatos()->delete();
			$promotor->contatos()->saveMany($contatos);

			$promotor->projecto->update( $request->all() );

			$promotor->projecto->documentos()->sync($request->input('projecto_documentos') ? $request->input('projecto_documentos') : []);

			$promotor->ficha_iniciativa->update( $request->all() );

			$promotor->projecto->tecnicos()->sync($request->input('tecnico_id') ? $request->input('tecnico_id') : []);

			return $promotor->id;

		});

		flash()->success('Registo Actualizado com Sucesso!');
		return redirect()->to('Promotores/Detalhes/'.$success);
	}



	public function ProjectoConsultor(Request $request)
	{
		
		$consultor = ProjectoConsultor::create($request->all());

		if ($request->input('contrato_tipo') == 2 && $request->has('formacao_chk')) {
			foreach ($request->input('formacao') as $array) {
				$array = array_prepend($array, $consultor->id, 'projecto_consultor_id');
				ProjectoConsultoresDetalhes::create($array);
			}
		}
		if ($request->input('contrato_tipo') == 2 && $request->has('consultoria_chk')) {
			foreach ($request->input('consultoria') as $array) {
				$array = array_prepend($array, $consultor->id, 'projecto_consultor_id');
				ProjectoConsultoresDetalhes::create($array);
			}
		}
		if ($request->input('contrato_tipo') == 1) {
			foreach ($request->input('apoio_criacao') as $array) {
				$array = array_prepend($array, $consultor->id, 'projecto_consultor_id');
				ProjectoConsultoresDetalhes::create($array);
			}
		}
        flash()->success('Consultor Adicionado com Sucesso!');
	}

	public function ProjectoPP(Request $request)
	{
		
		$query = ProjectoPP::create($request->all());
        if (!$query) {
           flash()->error('Ups, Ocorreu um Erro Tente Novamente Mais Tarde. Se o Problema Persistir, Contacte o Administrador!');
           return redirect()->back();
        }
        flash()->success('Pedido de Pagamento Adicionado com Sucesso!');
	}

	public function ProjectoConsultorUpdate(Request $request, ProjectoConsultor $contrato)
	{
		$contrato->update($request->all());
		$contrato->detalhes()->delete();

		if ($request->input('contrato_tipo') == 2 && $request->has('formacao_chk')) {
			foreach ($request->input('formacao') as $array) {
				$array = array_prepend($array, $contrato->id, 'projecto_consultor_id');
				ProjectoConsultoresDetalhes::create($array);
			}
		}

		if ($request->input('contrato_tipo') == 2 && $request->has('consultoria_chk')) {
			foreach ($request->input('consultoria') as $array) {
				$array = array_prepend($array, $contrato->id, 'projecto_consultor_id');
				ProjectoConsultoresDetalhes::create($array);
			}
		}

		if ($request->input('contrato_tipo') == 1) {
			foreach ($request->input('apoio_criacao') as $array) {
				$array = array_prepend($array, $contrato->id, 'projecto_consultor_id');
				ProjectoConsultoresDetalhes::create($array);
			}
		}
       
        flash()->success('Consultor Actualizado com Sucesso!');
	}

	public function ProjectoPPUpdate(Request $request, ProjectoPP $pp)
	{
		$query = $pp->update($request->all());
        if (!$query) {
           flash()->error('Ups, Ocorreu um Erro Tente Novamente Mais Tarde. Se o Problema Persistir, Contacte o Administrador!');
           return redirect()->back();
        }
        flash()->success('P.P Actualizado com Sucesso!');
	}

	public function ProjectoConsultorDelete(ProjectoConsultor $contrato)
	{
		$contrato->delete();
        flash()->success('Registo Eliminado com Sucesso!');
        return redirect()->back();
	}

	public function ProjectoPPDelete(ProjectoPP $pp)
	{
		$pp->delete();
        flash()->success('P.P Eliminado com Sucesso!');
        return redirect()->back();
	}
}
