<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Department::class, function (Faker $faker) {
    return [
        'name' => 'Web',
        'create' => $faker->boolean,
        'read' => $faker->boolean,
        'update' => $faker->boolean,
        'delete' => $faker->boolean,
    ];
});
