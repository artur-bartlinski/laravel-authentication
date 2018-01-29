<?php

use App\Gender;
use App\Title;
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
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'title_id' => factory(Title::class)->create()->id,
        'forename' => $faker->firstName,
        'surname' => $faker->lastName,
        'dob' => $faker->date(),
        'gender_id' => factory(Gender::class)->create()->id,
        'remember_token' => str_random(10),
    ];
});
