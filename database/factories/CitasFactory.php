<?php

use Faker\Generator as Faker;

$factory->define(App\Cita::class, function (Faker $faker) {
    return [
        'paciente_id' => $faker->numberBetween($min = 0, $max = 100),
        'fecha_hora' => $faker->dateTimeThisDecade($max = 'now'),
        'consultorio' => $faker->numberBetween($min = 1, $max = 10),
        'tipo' => $faker->randomElement($array = array ('BAJO','URGENTE','NORMAL')),
        'afiliacion' => $faker->randomElement($array = array ('IMMSS','ISSTE','AXA', 'BANORTE', 'Seguro Popular'))
    ];
});
