<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OperacionHistorico;
use Faker\Generator as Faker;

$factory->define(OperacionHistorico::class, function (Faker $faker) {

    return [
        'fecha' => $faker->date('Y-m-d H:i:s'),
        'id_proyecto' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'id_catalogo' => $faker->word,
        'estatus' => $faker->word,
        'no_operaciones' => $faker->randomDigitNotNull,
        'id_concepto' => $faker->word
    ];
});
