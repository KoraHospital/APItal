<?php

use Faker\Generator as Faker;

$factory->define(App\Consulta::class, function (Faker $faker) {
    return [
        'cita_id' => $faker->numberBetween($min = 0, $max = 100),
        'personal_id' => $faker->numberBetween($min = 0, $max = 100),
        'medicamento_id' => $faker->numberBetween($min = 0, $max = 100)
    ];
});
