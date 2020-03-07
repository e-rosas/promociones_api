<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'last_name' => $faker->lastName,
        'name' => $faker->firstName,
        'birth_date' => $faker->dateTimeThisCentury,
        'status' => 'AVAILABLE',
        'phone_number' => $faker->phoneNumber,
        'email' => $faker->email,
    ];
});
