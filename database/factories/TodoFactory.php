<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Todos::class, function (Faker $faker) {
    return [
        'title' => $faker->text(10),
        'status' => $faker->text(10)
    ];
});
