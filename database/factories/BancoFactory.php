<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Banco;
use Faker\Generator as Faker;

$factory->define(Banco::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'estatus' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'update_at' => $faker->date('Y-m-d H:i:s')
    ];
});
