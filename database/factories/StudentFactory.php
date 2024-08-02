<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

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
        'password' => '$2y$10$d8kUk/vXSbnL2yBNBhI8pe1J6X9ShVA8IUnpJxgz.SFwP11z4/6PK', // student
        'name'     => $faker->name,
    ];
});
