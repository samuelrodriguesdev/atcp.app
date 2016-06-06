<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class role_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('roles')->insert([
            [
			'name'         => 'super_admin', 
			'display_name' => 'Super Administrador',
			'created_at'   => Carbon::now(),
			'updated_at'   => Carbon::now()
            ],
            [
			'name'         => 'admin', 
			'display_name' => 'Administrador',
			'created_at'   => Carbon::now(),
			'updated_at'   => Carbon::now()
            ],
            [
			'name'         => 'user', 
			'display_name' => 'Secretariado',
			'created_at'   => Carbon::now(),
			'updated_at'   => Carbon::now()
            ],
        ]);
    }
}
