<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserType;
use Faker\Generator as Faker;

$factory->define(UserType::class, function (Faker $faker) {
    return [
        'user_type' => '',
        'status' => 1
    ];
});
