<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Concepto;
use Faker\Generator as Faker;

$factory->define(Concepto::class, function (Faker $faker) {

    return [
        'descripcion' => $faker->word,
        'tipo' => $faker->word,
        'id_mat_articulo' => $faker->randomDigitNotNull,
        'estatus' => $faker->word
    ];
});
