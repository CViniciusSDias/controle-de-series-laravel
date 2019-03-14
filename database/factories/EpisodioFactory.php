<?php

use Faker\Generator as Faker;

$factory->define(App\Episodio::class, function (Faker $faker) {
    return [
        'numero' => $faker->numberBetween(1, 10),
        'assistido' => $faker->boolean
    ];
});
