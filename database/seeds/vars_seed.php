<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class vars_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_vars')->insert([
            ['name' => 'IAS', 'value' => 419.22, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
