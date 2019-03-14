<?php

use Faker\Generator as Faker;

$factory->define(App\Serie::class, function (Faker $faker) {
    return [
        'nome' => $faker->title,
    ];
});

$factory->afterMaking(App\Serie::class, function (App\Serie $serie) {
    $serie->temporadas->add(factory(\App\Temporada::class)->make());
});