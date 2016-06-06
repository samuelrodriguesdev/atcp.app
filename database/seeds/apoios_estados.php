<?php

use Illuminate\Database\Seeder;

class apoios_estados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('apoios_estados')->insert([
            ['apoio_tipo' => 1, 'designacao' => 'Em Processo'],
            ['apoio_tipo' => 1, 'designacao' => 'Em Análise'],
            ['apoio_tipo' => 1, 'designacao' => 'Aprovado'],
            ['apoio_tipo' => 1, 'designacao' => 'Desistente'],
            ['apoio_tipo' => 2, 'designacao' => 'Em Acompanhamento'],
            ['apoio_tipo' => 2, 'designacao' => 'Concluído'],
            ['apoio_tipo' => 2, 'designacao' => 'Encerrado'],
            ['apoio_tipo' => 2, 'designacao' => 'Desistente'],
        ]);
    }
}
