<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Proposition;
use Faker\Generator as Faker;

$factory->define(Proposition::class, function (Faker $faker) {
    $status = config('car_import.proposition_status');
    return [
        'user_id' => rand(config('car_import.seeder_qty'), 1),
        'product_id' => rand(config('car_import.seeder_qty'), 1),
        'request_id' => 1,
        'status' => $status[array_rand($status)],
    ];
});
