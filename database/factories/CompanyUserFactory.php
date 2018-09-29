<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CompanyUser::class, function (Faker $faker) {
    return [
        //
        'rule' => $faker->numberBetween(1, 2),
        'user_id'=> function () {
            return factory(\App\Models\User::class)->create()->id;
        }
    ];
});
