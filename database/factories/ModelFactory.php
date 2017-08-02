<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(DroneBox\Models\User::class, function (Faker\Generator $faker) {
    static $password = '987987';

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(DroneBox\Models\Profile::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name(),
        'birthday' => $faker->date(),
        'description' => $faker->realText(),
        'photo' => $faker->imageUrl(),
        'slug' => uniqid(),
        'city' => $faker->city(),
        'region' => $faker->citySuffix()
    ];
});

$factory->define(DroneBox\Models\Post::class, function (Faker\Generator $faker) {

    return [
        'description' => $faker->realText(),
        'image_path' => $faker->imageUrl(),
        'like' => random_int(0, 255),
        'profile_id' => random_int(1,101),
    ];
});