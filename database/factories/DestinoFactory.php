<?php

use Faker\Generator as Faker;

$factory->define(SIS\Destino::class, function (Faker $faker) {
    return [
        'area_id' => rand(1, 10),
        'nombre' => $faker->sentence(3),
        'sigla' => $faker->word(),
    ];
});
