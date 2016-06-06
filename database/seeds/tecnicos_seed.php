<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class tecnicos_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('tecnicos')->insert([       
			[
			'id'                    => 1,
			'nome'                  => "Márcio Dinis",
			'organismo_entidade_id' => 1,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now(),
			'deleted_at'            => NULL
			],
			[
			'id'                    => 2,
			'nome'                  => "Nuno Malta",
			'organismo_entidade_id' => 1,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now(),
			'deleted_at'            => NULL
			],
			[
			'id'                    => 3,
			'nome'                  => "Fernando Apóstolo",
			'organismo_entidade_id' => 1,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now(),
			'deleted_at'            => NULL
			],
			[
			'id'                    => 4,
			'nome'                  => "Sónia Peres",
			'organismo_entidade_id' => 1,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now(),
			'deleted_at'            => NULL
			],
			[
			'id'                    => 5,
			'nome'                  => "Horácio Prata",
			'organismo_entidade_id' => 1,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now(),
			'deleted_at'            => NULL
			],
			[
			'id'                    => 6,
			'nome'                  => "Pedro Baltar",
			'organismo_entidade_id' => 1,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now(),
			'deleted_at'            => NULL
			],
			[
			'id'                    => 7,
			'nome'                  => "Sandro Teixeira",
			'organismo_entidade_id' => 1,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now(),
			'deleted_at'            => NULL
			],
			[
			'id'                    => 8,
			'nome'                  => "Noé Lopes",
			'organismo_entidade_id' => 1,
			'created_at'            => Carbon::now(),
			'updated_at'            => Carbon::now(),
			'deleted_at'            => NULL
			],
			]);
    }
}
