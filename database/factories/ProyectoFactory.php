<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Proyecto;
use Faker\Generator as Faker;

$factory->define(Proyecto::class, function (Faker $faker) {

    return [
        'no_proyecto' => $faker->randomDigitNotNull,
        'Nombre' => $faker->word,
        'id_gerentes' => $faker->randomDigitNotNull,
        'id_grupo' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'estatus' => $faker->word
    ];
});
