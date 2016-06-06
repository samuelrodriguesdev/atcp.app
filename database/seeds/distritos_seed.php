<?php

use Illuminate\Database\Seeder;

class distritos_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('distritos')->insert([
            ['designacao' => 'Aveiro'],
            ['designacao' => 'Beja'],
            ['designacao' => 'Braga'],
            ['designacao' => 'Bragança'],
            ['designacao' => 'Castelo Branco'],
            ['designacao' => 'Coimbra'],
            ['designacao' => 'Évora'],
            ['designacao' => 'Faro'],
            ['designacao' => 'Guarda'],
            ['designacao' => 'Leiria'],
            ['designacao' => 'Lisboa'],
            ['designacao' => 'Portalegre'],
            ['designacao' => 'Porto'],
            ['designacao' => 'Santarém'],
            ['designacao' => 'Setúbal'],
            ['designacao' => 'Viana do Castelo'],
            ['designacao' => 'Vila Real'],
            ['designacao' => 'Viseu'],
            ['designacao' => 'Ilha da Madeira'],
            ['designacao' => 'Ilha de Porto Santo'],
            ['designacao' => 'Ilha de Santa Maria'],
            ['designacao' => 'Ilha de São Miguel'],
            ['designacao' => 'Ilha Terceira'],
            ['designacao' => 'Ilha da Graciosa'],
            ['designacao' => 'Ilha de São Jorge'],
            ['designacao' => 'Ilha do Pico'],
            ['designacao' => 'Ilha do Faial'],
            ['designacao' => 'Ilha das Flores'],
            ['designacao' => 'Ilha do Corvo'],
        ]);
    }
}
