<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Promesa;
use Faker\Generator as Faker;

$factory->define(Promesa::class, function (Faker $faker) {

    return [
        'promesa' => $faker->word,
        'pagado' => $faker->word,
        'id_cliente' => $faker->randomDigitNotNull,
        'compromete_central' => $faker->word,
        'Compromete_cliente' => $faker->word,
        'Fecha_promesa' => $faker->word,
        'Fecha_pago' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
