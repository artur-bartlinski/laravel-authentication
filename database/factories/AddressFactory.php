<?php

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'address_line_1' => 'Grace Avenue',
        'address_line_2' => 'Grace Avenue',
        'town' => $faker->city,
        'county' => $faker->word,
        'country' => $faker->country,
        'postal_code' => $faker->postcode,
        'from_date' => '2011-11-12',
        'until_date' => '2011-11-13',
    ];
});
