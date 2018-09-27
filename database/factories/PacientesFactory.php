<?php

use Faker\Generator as Faker;

$factory->define(App\Pacientes::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'apellido_materno' => $faker->lastName,
        'apellido_paterno' => $faker->lastName,
        'telefono' => $faker->unique()->tollFreePhoneNumber,
        'direccion' => $faker->streetAddress,
        'tipo_sangre' => $faker->randomElement($array = array ('O-','O+','A-', 'A+', 'B-', 'B+', 'AB-', 'AB+')),
        'peso' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 5),
        'estatura' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 3),
        'edad' => $faker->numberBetween($min = 0, $max = 100),
        'afiliacion' => $faker->randomElement($array = array ('IMMSS','ISSTE','AXA', 'BANORTE', 'Seguro Popular'))
    ];
});
