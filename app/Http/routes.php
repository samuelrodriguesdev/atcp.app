<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');

Route::group(['middleware' => 'auth'], function () {

	

	Route::get('/', function () {
		return view('index');
	});
	Route::get('/Dashboard', function () {
		return view('index');
	});

	// Routes para Técnicos
	
	Route::get('/Tecnicos/', function() {
		return view('tecnicos/gestaoTecnicos');
	});
	Route::get('/Tecnicos/Novo-Tecnico', function() {
		return view('tecnicos/novoTecnico');
	});

	Route::get('/Tecnicos/Gestao-de-Tecnicos', function() {
		return view('tecnicos/gestaoTecnicos');
	});

	Route::get('Tecnicos/Detalhes/{tecnico}', 'TecnicosController@show');

	Route::get('tecnicos/list', 'TecnicosController@anyData');

	Route::post('tecnicos/update/{tecnico}', 'TecnicosController@update');

	Route::post('tecnicos/create', 'TecnicosController@create');

	Route::get('Tecnicos/Delete/{tecnico}', 'TecnicosController@delete');

	// Routes para Organimsos

	Route::get('/Instituicoes/Detalhes/{OrganismosEntidades}', 'OrganismosEntidadesController@show');
	
	Route::post('/OrganismosEntidades/update/{OrganismosEntidades}', 'OrganismosEntidadesController@update');

	Route::get('/Tecnicos/Gestao-de-Instituicoes', function() {
		return View::make('organismos_entidades/GestaoOrganismosEntidades');
	});

	Route::get('/Tecnicos/Nova-Instituicao', function() {
		return View::make('organismos_entidades/NovoOrganismoEntidade');
	});

	Route::get('organismos_entidades/data-table', 'OrganismosEntidadesController@anyData');
	Route::get('Organismos-Entidades/select2List', 'OrganismosEntidadesController@select2List');

	Route::post('organismos_entidades/create', 'OrganismosEntidadesController@create');
	Route::get('OrganismosEntidades/Delete/{OrganismosEntidades}', 'OrganismosEntidadesController@delete');
	// Routes para os Consultores

	Route::get('/Consultores/', function() {
		return View::make('consultores/gestaoConsultores');
	});
	Route::get('/Consultores/Gestao-de-Consultores', function() {
		return View::make('consultores/GestaoConsultores');
	});
	Route::get('/Consultores/Gestao-de-Contratos', function() {
		return View::make('consultores/GestaoContratos');
	});
	Route::get('/Consultores/Novo-Consultor', function() {
		return View::make('consultores/novoConsultor');
	});

	Route::post('consultores/store', 'ConsultoresController@store');
	Route::get('/Consultores/Detalhes/{consultor}', 'ConsultoresController@show');
	Route::post('consultores/update/{consultor}', 'ConsultoresController@update');
	Route::get('consultores/list', 'ConsultoresController@consultores');
	Route::get('consultores/contratos', 'ConsultoresController@contratos');

	Route::get('Consultores/Delete/{consultor}', 'ConsultoresController@delete');
	// Routes para os Promotores
	
	Route::get('/Promotores/', function() {
		return View::make('promotores/gestaoPromotores');
	});
	Route::get('/Promotores/Gestao-de-Promotores', function() {
		return View::make('promotores/gestaoPromotores');
	});
	Route::get('/Promotores/Novo-Promotor', function() {
		return View::make('promotores/novoPromotorProjeto');
	});
	Route::post('promotores/newProject', 'PromotoresController@store');
	Route::get('Promotores/Detalhes/{promotor}', 'PromotoresController@show');
	Route::get('promotores/data-table/', 'PromotoresController@tableData');
	Route::post('promotores/update/{promotor}', 'PromotoresController@update');

	Route::get('/projecto/novo_consultor/{projecto}', function($projecto) {
		return view('promotores/listaConsultores', ['projecto' => $projecto]);
	});

	Route::get('/projecto/novo_pedido_pagamento/{projecto}', function($projecto) {
		return view('promotores/novoPedidoPagamento', ['projecto' => $projecto]);
	});

	Route::get('/projecto/projecto_consultor_detalhes/{contrato}', function(App\ProjectoConsultor $contrato) {
		return view('promotores/detalhesConsultorProjecto', compact('contrato'));
	});

	Route::get('/projecto/pedido_pagamento_detalhes/{pp}', function(App\ProjectoPP	 $pp) {
		return view('promotores/detalhesPedidoPagamento', compact('pp'));
	});

	Route::post('projecto/post_consultor', 'PromotoresController@ProjectoConsultor');
	Route::post('projecto/update_consultor/{contrato}', 'PromotoresController@ProjectoConsultorUpdate');
	Route::post('projecto/post_pedido_pagamento', 'PromotoresController@ProjectoPP');
	Route::post('projecto/update_pedido_pagamento/{pp}', 'PromotoresController@ProjectoPPUpdate');
	Route::get('projecto/pp-delete/{pp}', 'PromotoresController@ProjectoPPDelete');
	
	Route::get('projecto/delete-consultor/{contrato}', 'PromotoresController@ProjectoConsultorDelete');
	// programas routes
	
	Route::get('/Programas/Novo-Programa', function() {
		return View::make('programas/NovoPrograma');
	});
	
	Route::get('/Programas/Gestao-de-Programas', function() {
		return View::make('programas/gestaoProgramas');
	});
	Route::post('programas/store', 'ProgramasController@store');	
	Route::get('/Programas/Detalhes/{programa}', 'ProgramasController@show');
	Route::post('programas/update/{programa}', 'ProgramasController@update');
	Route::get('programas/data-table', 'ProgramasController@programas');
	
	// Support Routes


	Route::get('distritos/list', 'DistritosController@select');
	Route::get('/hab_literarias/', function() {
		return DB::table('hab_literarias')->select('*')->get();
	});

	Route::get('select/tecnicos', 'SelectController@tecnicos');
	Route::get('select/programas', 'SelectController@programas');
	Route::get('select/apoios', 'SelectController@apoios_tecnicos');
	Route::get('select/estado', 'SelectController@apoio_estado');
	Route::get('select/programa_documentos', 'SelectController@programa_documentos');
	Route::get('select/consultores_projecto', 'SelectController@lista_consultores_projecto');
	Route::get('select/lista_organismos', 'SelectController@lista_organismos');
	Route::get('select/lista_consultores', 'SelectController@lista_consultores');
	Route::get('select/pp_years', 'SelectController@pp_years');


	Route::get('estatistica/grafico1', 'EstatisticaController@total_por_mes_ano');
	Route::get('estatistica/grafico2', 'EstatisticaController@total_por_estado');
	Route::get('estatistica/grafico3', 'EstatisticaController@total_por_apoio');
	Route::get('estatistica/grafico4', 'EstatisticaController@total_por_programa_centro');


	//EXCEL OUTPUTS
	Route::get('/Outputs', function() {
		return View::make('outputs/outputs');
	});

	Route::get('Outputs/export', 'OutputController@testexcel');
});


