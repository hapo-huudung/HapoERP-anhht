<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Holiday::class, function (Faker $faker) {
    return [
        'holiday' => $faker->date($format = 'Y-m-d', $max = '2020-12-31'),
        'content' => 'holiday',
    ];
});
