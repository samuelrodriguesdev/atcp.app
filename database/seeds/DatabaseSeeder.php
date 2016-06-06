<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(distritos_seed::class);
        $this->call(vars_seed::class);
        $this->call(hab_literarias_seed::class);
        $this->call(organismos_seed::class);
        $this->call(organismos_contatos_seed::class);
        $this->call(tecnicos_seed::class);
        $this->call(apoios_estados::class);
        $this->call(role_seed::class);
        $this->call(user_seed::class);
    }
}
