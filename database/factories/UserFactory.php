<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => md5('admin'),
        'fullname' => $faker->name,
        'phone' => $faker->phoneNumber,
        'role_id' => rand(1, 2),
        'remember_token' => str_random(10),
    ];
});
