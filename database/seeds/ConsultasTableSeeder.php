<?php

use Illuminate\Database\Seeder;

class ConsultasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Consulta::class, 100)->create();
    }
}
