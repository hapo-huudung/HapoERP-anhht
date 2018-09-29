<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Report::class, function (Faker $faker) {
    $fakerTime = $faker->date($format = 'Y-m-d', $max = 'now');
    return [
        'today_do' => 'somethings',
        'tomorrow_do' => 'somethings',
        'problems' => 'no',
        'user_id' => function () {
            return factory(\App\Models\User::class)->create()->id;
        }
    ];
});
