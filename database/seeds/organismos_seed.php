<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class organismos_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('organismos_entidades')->insert([
			[
			'id'          => 1,
			'nome'        => "Jovens Associados para o Desenvolvimento Regional do Centro",
			'morada'      => "Rua Manuel Madeira, Edifício Delta, 2º Esq.",
			'cp4'         => "3025",
			'cp3'         => "047",
			'distrito_id' => 6,
			'localidade'  => "Pedrulha",
			'created_at'  => Carbon::Now(),
			'updated_at'  => Carbon::Now(),
			'deleted_at'  => NULL
			],
			[
			'id'          => 2,
			'nome'        => "Centro de Emprego de Coimbra",
			'morada'      => "Avenida Fernão de Magalhães, nº 660-D",
			'cp4'         => "3000",
			'cp3'         => "174",
			'distrito_id' => 6,
			'localidade'  => "Coimbra",
			'created_at'  => Carbon::Now(),
			'updated_at'  => Carbon::Now(),
			'deleted_at'  => NULL
			],
			[
			'id'          => 3,
			'nome'        => "Centro de Emprego da Figueira da Foz",
			'morada'      => "Rua de Coimbra, nº 1",
			'cp4'         => "3080",
			'cp3'         => "000",
			'distrito_id' => 6,
			'localidade'  => "Figueira da Foz",
			'created_at'  => Carbon::Now(),
			'updated_at'  => Carbon::Now(),
			'deleted_at'  => NULL
			],
			[
			'id'          => 4,
			'nome'        => "Centro de Emprego de Águeda",
			'morada'      => "Rua do Rio Grande, nº 13",
			'cp4'         => "3750",
			'cp3'         => "101",
			'distrito_id' => 1,
			'localidade'  => "Águeda",
			'created_at'  => Carbon::Now(),
			'updated_at'  => Carbon::Now(),
			'deleted_at'  => NULL
			],
			[
			'id'          => 5,
			'nome'        => "Centro de Emprego de Arganil",
			'morada'      => "Avenida das Forças Armadas",
			'cp4'         => "3300",
			'cp3'         => "011",
			'distrito_id' => 6,
			'localidade'  => "Arganil",
			'created_at'  => Carbon::Now(),
			'updated_at'  => Carbon::Now(),
			'deleted_at'  => NULL
			],
			[
			'id'          => 6,
			'nome'        => "Centro de Emprego de Aveiro",
			'morada'      => "Cais da Fonte Nova, Apartado 234",
			'cp4'         => "3811",
			'cp3'         => "901",
			'distrito_id' => 1,
			'localidade'  => "Aveiro",
			'created_at'  => Carbon::Now(),
			'updated_at'  => Carbon::Now(),
			'deleted_at'  => NULL
			],
			[
			'id'          => 7,
			'nome'        => "Centro de Emprego de Castelo Branco",
			'morada'      => "Avenida Pedro Álvares Cabral, nº 6 R/C",
			'cp4'         => "6000",
			'cp3'         => "000",
			'distrito_id' => 9,
			'localidade'  => "Castelo Branco",
			'created_at'  => Carbon::Now(),
			'updated_at'  => Carbon::Now(),
			'deleted_at'  => NULL
			],
			[
			'id'          => 8,
			'nome'        => "Centro de Emprego da Covilhã",
			'morada'      => "Avenida 25 de Abril, nº 66",
			'cp4'         => "6200",
			'cp3'         => "000",
			'distrito_id' => 5,
			'localidade'  => "Covilhã",
			'created_at'  => Carbon::Now(),
			'updated_at'  => Carbon::Now(),
			'deleted_at'  => NULL
			],
			[
			'id'          => 9,
			'nome'        => "Centro de Emprego de Figueiró",
			'morada'      => "Avenida José Malhoa",
			'cp4'         => "3260",
			'cp3'         => "000",
			'distrito_id' => 10,
			'localidade'  => "Figueiró dos Vinhos",
			'created_at'  => Carbon::Now(),
			'updated_at'  => Carbon::Now(),
			'deleted_at'  => NULL
			],
			[
			'id'          => 10,
			'nome'        => "Centro de Emprego de Guarda",
			'morada'      => "Avenida do Estádio Municipal",
			'cp4'         => "6300",
			'cp3'         => "035",
			'distrito_id' => 9,
			'localidade'  => "Guarda",
			'created_at'  => Carbon::Now(),
			'updated_at'  => Carbon::Now(),
			'deleted_at'  => NULL
			],
			[
			'id'          => 11,
			'nome'        => "Centro de Emprego de Leiria",
			'morada'      => "Rua de S. Miguel, Lote 1",
			'cp4'         => "2410",
			'cp3'         => "170",
			'distrito_id' => 10,
			'localidade'  => "Leiria",
			'created_at'  => Carbon::Now(),
			'updated_at'  => Carbon::Now(),
			'deleted_at'  => NULL
			],
			[
			'id'          => 12,
			'nome'        => "Centro de Emprego da Lousã",
			'morada'      => "Rua Dr. Pires de Carvalho, nº 47 R/C",
			'cp4'         => "3200",
			'cp3'         => "238",
			'distrito_id' => 6,
			'localidade'  => "Lousã",
			'created_at'  => Carbon::Now(),
			'updated_at'  => Carbon::Now(),
			'deleted_at'  => NULL
			],
			[
			'id'          => 13,
			'nome'        => "Centro de Emprego da Marinha Grande",
			'morada'      => "Rua Tenente Cabeleira Filipe, nº 22",
			'cp4'         => "2431",
			'cp3'         => "903",
			'distrito_id' => 10,
			'localidade'  => "Marinha Grande",
			'created_at'  => Carbon::Now(),
			'updated_at'  => Carbon::Now(),
			'deleted_at'  => NULL
			],
			[
			'id'          => 14,
			'nome'        => "Centro de Emprego de Pinhel",
			'morada'      => "Rua Silva Gouveia, nº 22",
			'cp4'         => "6400",
			'cp3'         => "455",
			'distrito_id' => 9,
			'localidade'  => "Pinhel",
			'created_at'  => Carbon::Now(),
			'updated_at'  => Carbon::Now(),
			'deleted_at'  => NULL
			],
			[
			'id'          => 15,
			'nome'        => "Centro de Emprego de São Pedro do Sul",
			'morada'      => "Rua do Querido, nº 108 R/C",
			'cp4'         => "3660",
			'cp3'         => "500",
			'distrito_id' => 18,
			'localidade'  => "São Pedro do Sul",
			'created_at'  => Carbon::Now(),
			'updated_at'  => Carbon::Now(),
			'deleted_at'  => NULL
			],
			[
			'id'          => 16,
			'nome'        => "Centro de Emprego de Seia",
			'morada'      => "Avenida 1º de Maio",
			'cp4'         => "6270",
			'cp3'         => "000",
			'distrito_id' => 9,
			'localidade'  => "Seia",
			'created_at'  => Carbon::Now(),
			'updated_at'  => Carbon::Now(),
			'deleted_at'  => NULL
			],
			[
			'id'          => 17,
			'nome'        => "Centro de Emprego da Sertã",
			'morada'      => "Travessa do Ramalhosa",
			'cp4'         => "6100",
			'cp3'         => "746",
			'distrito_id' => 5,
			'localidade'  => "Sertã",
			'created_at'  => Carbon::Now(),
			'updated_at'  => Carbon::Now(),
			'deleted_at'  => NULL
			],
			[
			'id'          => 18,
			'nome'        => "Centro de Emprego de Tondela",
			'morada'      => "Praça Dr. Teófilo da Cruz",
			'cp4'         => "3460",
			'cp3'         => "589",
			'distrito_id' => 18,
			'localidade'  => "Tondela",
			'created_at'  => Carbon::Now(),
			'updated_at'  => Carbon::Now(),
			'deleted_at'  => NULL
			],
			[
			'id'          => 19,
			'nome'        => "Centro de Emprego de Viseu",
			'morada'      => "Rua Dr. José da Cruz Moreira Pinto, Lote 6",
			'cp4'         => "3514",
			'cp3'         => "505",
			'distrito_id' => 18,
			'localidade'  => "Viseu",
			'created_at'  => Carbon::Now(),
			'updated_at'  => Carbon::Now(),
			'deleted_at'  => NULL
			],
    	]);
	}
}
