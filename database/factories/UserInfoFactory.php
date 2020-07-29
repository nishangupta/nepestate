<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserInfo;
use Faker\Generator as Faker;

$factory->define(UserInfo::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class)->create(),
        'profile_img' => 'img/changeprofile.png',
        'fullname' => $faker->name(),
        'user_type' => 1,
        'location' => $faker->address(),
        'job_title' => $faker->word()
    ];
});
