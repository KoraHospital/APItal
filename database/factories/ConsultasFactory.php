<?php

use Faker\Generator as Faker;

$factory->define(App\Consultas::class, function (Faker $faker) {
    return [
        'id_cita' => $faker->numberBetween($min = 0, $max = 100),
        'id_personal' => $faker->numberBetween($min = 0, $max = 100),
        'id_medicamento' => $faker->numberBetween($min = 0, $max = 100)
    ];
});
