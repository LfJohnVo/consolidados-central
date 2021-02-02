<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TipoTraslado;
use Faker\Generator as Faker;

$factory->define(TipoTraslado::class, function (Faker $faker) {

    return [
        'tipo' => $faker->word,
        'estatus' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'update_at' => $faker->date('Y-m-d H:i:s')
    ];
});
