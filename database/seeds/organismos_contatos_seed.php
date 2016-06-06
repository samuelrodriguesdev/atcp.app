<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class organismos_contatos_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('organismo_entidades_contatos')->insert([
			[
			'id'                    => 1,
			'type'                  => "Telefone",
			'value'                 => "239777888",
			'organismo_entidade_id' => 1,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 2,
			'type'                  => "Email",
			'value'                 => "jadrc@jadrc.pt",
			'organismo_entidade_id' => 1,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 3,
			'type'                  => "Email",
			'value'                 => "coimbra@jadrc.pt",
			'organismo_entidade_id' => 1,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 7,
			'type'                  => "Telefone",
			'value'                 => "233407700",
			'organismo_entidade_id' => 3,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 8,
			'type'                  => "Fax",
			'value'                 => "233407701",
			'organismo_entidade_id' => 3,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 9,
			'type'                  => "Email",
			'value'                 => "cte.figueirafoz@iefp.pt",
			'organismo_entidade_id' => 3,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 10,
			'type'                  => "Telefone",
			'value'                 => "234610770",
			'organismo_entidade_id' => 4,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 11,
			'type'                  => "Fax",
			'value'                 => "234610771",
			'organismo_entidade_id' => 4,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 12,
			'type'                  => "Email",
			'value'                 => "cte.agueda@iefp.pt",
			'organismo_entidade_id' => 4,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 13,
			'type'                  => "Telefone",
			'value'                 => "235205984",
			'organismo_entidade_id' => 5,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 14,
			'type'                  => "Fax",
			'value'                 => " 235205114",
			'organismo_entidade_id' => 5,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 15,
			'type'                  => "Email",
			'value'                 => "cefp.arganil@iefp.pt",
			'organismo_entidade_id' => 5,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 16,
			'type'                  => "Fax",
			'value'                 => "234370401",
			'organismo_entidade_id' => 6,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 17,
			'type'                  => "Telefone",
			'value'                 => "234370400",
			'organismo_entidade_id' => 6,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 18,
			'type'                  => "Email",
			'value'                 => "cte.aveiro.drc@iefp.pt",
			'organismo_entidade_id' => 6,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 19,
			'type'                  => "Telefone",
			'value'                 => "272330010",
			'organismo_entidade_id' => 7,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 20,
			'type'                  => "Fax",
			'value'                 => " 272330018",
			'organismo_entidade_id' => 7,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 21,
			'type'                  => "Email",
			'value'                 => "castelobranco@iefp.pt",
			'organismo_entidade_id' => 7,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 22,
			'type'                  => "Telefone",
			'value'                 => "239860800",
			'organismo_entidade_id' => 2,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 23,
			'type'                  => "Fax",
			'value'                 => "239860901",
			'organismo_entidade_id' => 2,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 24,
			'type'                  => "Email",
			'value'                 => "cte.coimbra@iefp.pt",
			'organismo_entidade_id' => 2,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 25,
			'type'                  => "Telefone",
			'value'                 => "275330460",
			'organismo_entidade_id' => 8,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 26,
			'type'                  => "Fax",
			'value'                 => "275330469",
			'organismo_entidade_id' => 8,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 27,
			'type'                  => "Email",
			'value'                 => "cte.covilha@iefp.pt",
			'organismo_entidade_id' => 8,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 28,
			'type'                  => "Telefone",
			'value'                 => "236552167",
			'organismo_entidade_id' => 9,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 29,
			'type'                  => "Fax",
			'value'                 => "236552572",
			'organismo_entidade_id' => 9,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 30,
			'type'                  => "Email",
			'value'                 => "cte.figueirovinhos@iefp.pt",
			'organismo_entidade_id' => 9,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 31,
			'type'                  => "Telefone",
			'value'                 => "271212684",
			'organismo_entidade_id' => 10,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 32,
			'type'                  => "Fax",
			'value'                 => "271213563",
			'organismo_entidade_id' => 10,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 33,
			'type'                  => "Email",
			'value'                 => "cefp.guarda.drc@iefp.pt",
			'organismo_entidade_id' => 10,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 34,
			'type'                  => "Telefone",
			'value'                 => "244849500",
			'organismo_entidade_id' => 11,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 35,
			'type'                  => "Fax",
			'value'                 => "244849580",
			'organismo_entidade_id' => 11,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 36,
			'type'                  => "Email",
			'value'                 => "cte.leiria@iefp.pt",
			'organismo_entidade_id' => 11,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 37,
			'type'                  => "Telefone",
			'value'                 => "239990230",
			'organismo_entidade_id' => 12,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 38,
			'type'                  => "Fax",
			'value'                 => "239990239",
			'organismo_entidade_id' => 12,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 39,
			'type'                  => "Email",
			'value'                 => "cte.lousa@iefp.pt",
			'organismo_entidade_id' => 12,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 40,
			'type'                  => "Telefone",
			'value'                 => "244567019",
			'organismo_entidade_id' => 13,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 41,
			'type'                  => "Fax",
			'value'                 => "244567027",
			'organismo_entidade_id' => 13,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 42,
			'type'                  => "Email",
			'value'                 => "cte.marinhagrande@iefp.pt",
			'organismo_entidade_id' => 13,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 43,
			'type'                  => "Telefone",
			'value'                 => "271410080",
			'organismo_entidade_id' => 14,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 44,
			'type'                  => "Fax",
			'value'                 => "271410090",
			'organismo_entidade_id' => 14,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 45,
			'type'                  => "Email",
			'value'                 => "cte.pinhel@iefp.pt",
			'organismo_entidade_id' => 14,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 46,
			'type'                  => "Telefone",
			'value'                 => "232720170",
			'organismo_entidade_id' => 15,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 47,
			'type'                  => "Fax",
			'value'                 => "232723630",
			'organismo_entidade_id' => 15,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 48,
			'type'                  => "Email",
			'value'                 => "cte.spedrosul.drc@iefp.pt",
			'organismo_entidade_id' => 15,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 49,
			'type'                  => "Telefone",
			'value'                 => "238310330",
			'organismo_entidade_id' => 16,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 50,
			'type'                  => "Fax",
			'value'                 => "238310331",
			'organismo_entidade_id' => 16,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 51,
			'type'                  => "Email",
			'value'                 => "cefp.seia@iefp.pt",
			'organismo_entidade_id' => 16,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 52,
			'type'                  => "Telefone",
			'value'                 => "274603546",
			'organismo_entidade_id' => 17,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 53,
			'type'                  => "Fax",
			'value'                 => "274602316",
			'organismo_entidade_id' => 17,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 54,
			'type'                  => "Email",
			'value'                 => "cte.serta.drc@iefp.pt",
			'organismo_entidade_id' => 17,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 55,
			'type'                  => "Telefone",
			'value'                 => "232819320",
			'organismo_entidade_id' => 18,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 56,
			'type'                  => "Fax",
			'value'                 => "232822072",
			'organismo_entidade_id' => 18,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 57,
			'type'                  => "Email",
			'value'                 => "cte.tondela.drc@iefp.pt",
			'organismo_entidade_id' => 18,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 58,
			'type'                  => "Telefone",
			'value'                 => "232483460",
			'organismo_entidade_id' => 19,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 59,
			'type'                  => "Fax",
			'value'                 => "232421722",
			'organismo_entidade_id' => 19,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			],
			[
			'id'                    => 60,
			'type'                  => "Email",
			'value'                 => "cte.viseu.drc@iefp.pt",
			'organismo_entidade_id' => 19,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now()
			]
		]);
	}
}
