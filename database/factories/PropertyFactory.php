<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Property;
use Faker\Generator as Faker;

$factory->define(Property::class, function (Faker $faker) {
    return [
        'name' => $faker->company(),
        'price' => $faker->biasedNumberBetween(50000, 2000000),
        'address' => $faker->address,
        'description' => $faker->paragraph(),
        'bed' => $faker->biasedNumberBetween(0, 4),
        'bath' => $faker->biasedNumberBetween(0, 4),
        'area' => $faker->biasedNumberBetween(200, 2300),
        'agent' => $faker->name('male'),
        'owner' => $faker->name(),
        'onSale' => $faker->boolean()
    ];
});
