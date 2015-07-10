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

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->userName,
        'email' => $faker->email,
        'full_name' => $faker->name,
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Meeting::class, function ($faker) {
    return [
        'meetingId' => $faker->uuid,
        'moderatorPassword' => $faker->password,
        'attendeePassword' => $faker->password,
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'welcomeText' => $faker->paragraph,
    ];
});
