<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Deposito;
use Faker\Generator as Faker;

$factory->define(Deposito::class, function (Faker $faker) {

    return [
        'fecha_deposito' => $faker->date('Y-m-d H:i:s'),
        'tipo_traslado' => $faker->word,
        'ingreso_dep_central' => $faker->word,
        'ingreso_dep_cliente' => $faker->word,
        'fecha_venta' => $faker->date('Y-m-d H:i:s'),
        'folios_traslado' => $faker->word,
        'id_proyecto' => $faker->word,
        'id_gerente' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'id_bancos' => $faker->randomDigitNotNull,
        'archivo_pago' => $faker->text
    ];
});
