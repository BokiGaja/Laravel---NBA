<?php

use Illuminate\Support\Str;
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
    $verifyToken = bcrypt(str_shuffle('abcde'));
    // Remove '/' so there will be no problem when calling url
    $verifyToken = str_replace('/', '', $verifyToken);
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('secret'), // secret
        'remember_token' => Str::random(10),
        'verify_token' => $verifyToken
    ];
});

$factory->define(\App\Teams::class, function (Faker $faker) {
   return [
        'name' => $faker->name,
        'email' => $faker->email,
        'address' => $faker->address,
        'city' => $faker->city

   ];
});

$factory->define(\App\Player::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email
    ];
});
