<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class user_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([ 
            [
			'nome'           => 'Samuel Rodrigues', 
			'email'          => 'suporte@conclusao.pt',
			'password'       => bcrypt('x0x.suporte.pt'),
			'remember_token' => '',
			'created_at'     => Carbon::now(),
			'updated_at'      => Carbon::now()
            ],
        ]);

        DB::table('role_user')->insert([ 
            [ 'role_id' => 1, 'user_id' => 1],
        ]);
    }
}
