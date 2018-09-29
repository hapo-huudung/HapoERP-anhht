<?php

use Faker\Generator as Faker;

$factory->define(App\Models\RollCall::class, function (Faker $faker) {
    $fakerTime = $faker->date($format = 'Y-m-d', $max = 'now');
    return [
        'status' => 1,
        'user_id' => function () {
            return factory(\App\Models\User::class)->create()->id;
        }
    ];
});
