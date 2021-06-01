<?php

use Faker\Generator as Faker;

$factory->define(SIS\Categoria::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'descripcion' => $faker->sentence(5)
    ];
});
