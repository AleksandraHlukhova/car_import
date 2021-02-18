<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Request;
use App\User;
use Faker\Generator as Faker;

$factory->define(Request::class, function (Faker $faker) {
    $cars = [
        'Volkswagen' => 'Golf', 'Ford' => 'Focus', 'Nisan'=> 'Primera', 'BMW' => '525', 'Volvo' => 'xc 90'
    ];
    $price = ['2000', '3500', '4000', '10000', '5000'];
    $year_from = rand(2000, 2020);
    return [
        'user_id' => rand(config('car_import.seeder_qty'), 1),
        'brand' => array_rand($cars),
        'year_from' => $year_from,
        'year_to'=> rand($year_from, 2020),
        'phone' => $faker->e164PhoneNumber,
        'email'=> $faker->safeEmail,
        'price' => $price[array_rand($price)]
    ];
});
