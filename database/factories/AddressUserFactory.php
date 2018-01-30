<?php

use Faker\Generator as Faker;

$factory->define(\App\AddressUser::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class)->create()->id,
        'address_id' => factory(\App\Address::class)->create()->id
    ];
});
