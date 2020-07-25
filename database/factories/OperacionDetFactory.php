<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OperacionDet;
use Faker\Generator as Faker;

$factory->define(OperacionDet::class, function (Faker $faker) {

    return [
        'fecha' => $faker->date('Y-m-d H:i:s'),
        'no_operaciones' => $faker->randomDigitNotNull,
        'id_proyecto' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'estatus' => $faker->word,
        'id_concepto' => $faker->word
    ];
});
