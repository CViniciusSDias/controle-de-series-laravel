<?php

use Faker\Generator as Faker;

$factory->define(App\Temporada::class, function (Faker $faker) {
    return [
        'numero' => $faker->numberBetween(1, 5)
    ];
});

$factory->afterMaking(App\Temporada::class, function (App\Temporada $temporada) {
    $temporada->episodios->add(factory(\App\Episodio::class)->make());
});
