<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Gerente;
use Faker\Generator as Faker;

$factory->define(Gerente::class, function (Faker $faker) {

    return [
        'id_proyecto' => rand(1,10),
        'nombre' => $faker->word,
        'email' => $faker->word,
        'password' => $faker->word,
    ];
});
