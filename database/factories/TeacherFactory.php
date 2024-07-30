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

$factory->define(\App\Models\Teacher::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'password' => '$2y$10$9qk6J0.O.oVFAvSLzNOCnePRtvsYXLlrNe5fPCiQ2JdXiI2k9HIea', // teacher
        'name' => $faker->name,
        'type' => 'teacher',
    ];
});
