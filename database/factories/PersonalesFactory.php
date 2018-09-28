<?php

use Faker\Generator as Faker;

$factory->define(App\Personal::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'apellido_materno' => $faker->lastName,
        'apellido_paterno' => $faker->lastName,
        'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'rol' => $faker->randomElement($array = array ('Doctor','Enfermero','Enfermera', 'Pediatra', 'Doctora', 'Ostrecta', 'Ginecologia', 'Urologia')),
        'turno' => $faker->randomElement($array = array ('Matutino','Vespertino','Noturno')),
        'telefono' => $faker->unique()->tollFreePhoneNumber,
        'direccion' => $faker->streetAddress,
    ];
});
