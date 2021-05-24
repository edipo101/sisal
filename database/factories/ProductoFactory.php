<?php

use Faker\Generator as Faker;

$factory->define(SIS\Producto::class, function (Faker $faker) {
    return [
        "nombre" => $faker->word(2),
        "descripcion" => $faker->sentence(),
        "categoria_id" => 1,
        "umedida_id" => 1,
    ];
});
