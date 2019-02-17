<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
		'type' => array_rand(array_flip(['porn','roman','computer']))
    ];
});
