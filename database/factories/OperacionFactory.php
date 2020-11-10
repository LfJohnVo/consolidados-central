<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Operacion;
use Faker\Generator as Faker;

$factory->define(Operacion::class, function (Faker $faker) {

    return [
        'id_proyecto' => rand(1,10),
        'dia' => rand(1,31),
        'no_operaciones' => $faker->randomDigitNotNull,
        'ano' => rand(2018,2020),
    ];
});
