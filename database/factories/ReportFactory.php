<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Report::class, function (Faker $faker) {
    $fakerTime = $faker->date($format = 'Y-m-d', $max = 'now');
    return [
        'starts_at' => $faker->dateTimeBetween($fakerTime . ' 6:00:00', $fakerTime . ' 10:00:00', $timezone = null),
        'ends_at' => $faker->dateTimeBetween($fakerTime . ' 15:00:00', $fakerTime . ' 18:00:00', $timezone = null),
        'today_do' => 'somethings',
        'tomorrow_do' => 'somethings',
        'problems' => 'no',
        'user_id' => function () {
            return factory(\App\Models\User::class)->create()->id;
        }
    ];
});
