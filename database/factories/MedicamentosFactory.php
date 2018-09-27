<?php

use Faker\Generator as Faker;

$factory->define(App\Medicamentos::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique()->name,
        'cantidad' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 5),
        'aplicacion' => $faker->sentence(10),
        'edad_aplicacion' => $faker->numberBetween($min = 0, $max = 100),
        'fabricante' => $faker->company
    ];
});
