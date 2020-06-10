<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->name,
        'dni' => $faker->word,
        'cellphone' => $faker->e164PhoneNumber,
        'address' => $faker->address,
        'role_id' => 3,
        'admin_id' => 1,
    ];
});
