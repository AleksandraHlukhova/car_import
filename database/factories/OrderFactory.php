<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $paid_status = config('car_import.paid_status');
    $readiness_status = config('car_import.readiness_status');
    return [
        'user_id' => rand(1, config('car_import.seeder_qty')),
        'paid_status' => $paid_status[array_rand($paid_status, 1)],
        'readiness_status' => $readiness_status[array_rand($readiness_status, 1)],
    ];
});
