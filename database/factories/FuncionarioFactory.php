<?php

use Faker\Generator as Faker;

$factory->define(SIS\Funcionario::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'nombre' => $faker->name,
        'apellido' => $faker->lastName,
        'carnet' => $faker->randomNumber(6),
        'cargo' => $faker->sentence(3, false)
    ];
});
