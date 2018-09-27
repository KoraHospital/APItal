<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([ConsultasTableSeeder::class,
        MedicamentosTableSeeder::class,
        PacientesTableSeeder::class,
        PersonalesTableSeeder::class,
        CitasTableSeeder::class,
        ]);
    }
}
