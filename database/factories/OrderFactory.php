<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $status = config('car_import.seeder_qty');
    return [
        'user_id' => rand(1, config('car_import.seeder_qty')),
        'product_id' => rand(1, config('car_import.seeder_qty')),
        'status' => $status[array_rand($status)],
    ];
});
