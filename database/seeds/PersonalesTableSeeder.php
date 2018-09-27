<?php

use Illuminate\Database\Seeder;

class PersonalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Personales::class, 100)->create();
    }
}
