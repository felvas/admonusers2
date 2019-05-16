<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\ProcessModel;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(ProcessModel::class, function (Faker $faker) {
    return [
        'process_id' => $faker->process_id,
        'process_name' => $faker->process_name,
        'description' => $faker->description,
        'municipio' => $faker->municipio,
        'departamento' => $faker->departamento,
        'fecha_inicio'=> $faker->fecha_inicio,
        'feche_fin'=> $faker->feche_fin,
        'url_docs'=> $faker->url_docs,
        'status'=> $faker->status,
        'confirmed'=> $faker->confirmed,
    ];
});
