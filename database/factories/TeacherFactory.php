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

$factory->define(\App\Models\Teacher::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'password' => '$2y$10$B821R4EoLUhT.FxwXFlXyOF6yD0xUNCuv3kbyt9xcZJki/OKypFgW', // teacher
        'name'     => $faker->name,
        'type'     => 'teacher',
    ];
});
