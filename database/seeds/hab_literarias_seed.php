<?php

use Illuminate\Database\Seeder;

class hab_literarias_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('hab_literarias')->insert([
            ['designacao' => 'Bacharelato'],
            ['designacao' => 'Licenciatura'],
            ['designacao' => 'Mestrado'],
            ['designacao' => 'Doutoramento'],
            ['designacao' => 'Pós-Doutoramento'],
        ]);
    }
}
