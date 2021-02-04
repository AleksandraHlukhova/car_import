<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bookmark;
use Faker\Generator as Faker;

$factory->define(Bookmark::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, config('car_import.seeder_qty')),
        'product_id' => rand(1, config('car_import.seeder_qty')),
        'status' => 1,
    ];
});
