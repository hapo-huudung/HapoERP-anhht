<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ReportOT::class, function (Faker $faker) {
    $fakerTime = $faker->date($format = 'Y-m-d', $max = 'now');
    return [
        'starts_at' => $faker->dateTimeBetween($fakerTime . ' 1:00 AM', $fakerTime . ' 10:00 AM', $timezone = null),
        'ends_at' => $faker->dateTimeBetween($fakerTime . ' 1:00 PM', $fakerTime . ' 9:00 PM', $timezone = null),
        'contents' => 'report-ot',
        'user_id' => function () {
            return factory(\App\Models\User::class)->create()->id;
        }
    ];
});
