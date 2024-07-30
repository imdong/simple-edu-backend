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

$factory->define(App\Models\Student::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'password' => '$2y$10$DYpxa1Wl3KUruNAHYgfD0ucXsqxBUdx8n7W79y3lO/hXTDtx3eKFy', // student
        'name' => $faker->name,
    ];
});
