<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $cars = [
        'Volkswagen' => 'Golf', 'Ford' => 'Focus', 'Nisan'=> 'Primera', 'BMW' => '525', 'Volvo' => 'xc 90'
    ];
    $engine_type = config('car_import.engine_type');
    $transmission = config('car_import.transmission');
    $price = ['2000', '3500', '4000', '10000', '5000'];

    $brand = array_rand($cars);
    return [
        'brand' => $brand,
        'model' => $cars[$brand],
        'year' => rand(2000, 2020),
        'engine_type'=> $engine_type[array_rand($engine_type)],
        'transmission' => $transmission[array_rand($transmission)],
        'mileage' => rand(2000, 200000),
        'price' => $price[array_rand($price)],
        'photo' => 'images/no-photo.png'
    ];
});
