<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bookmark;
use Faker\Generator as Faker;

$factory->define(Bookmark::class, function (Faker $faker) {
    return [
        'user_id' => rand(config('car_import.seeder_qty'), 1),
        'product_id' => rand(config('car_import.seeder_qty'), 1),
        'status' => 1,
    ];
});
