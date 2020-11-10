<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Gerente;
use Faker\Generator as Faker;

$factory->define(Gerente::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'email' => $faker->word,
        'password' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'id_distrital' => $faker->randomDigitNotNull,
        'estatus' => $faker->word
    ];
});
