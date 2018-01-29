<?php

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'address_line_1' => $faker->streetAddress,
        'address_line_2' => $faker->streetName,
        'town' => $faker->unique()->city,
        'county' => $faker->unique()->word,
        'country' => $faker->unique()->country,
        'postal_code' => $faker->unique()->postcode,
        'from_date' => $faker->unique()->date(),
        'until_date' => $faker->unique()->date(),
    ];
});
