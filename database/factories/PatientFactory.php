<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'birth_date' => $faker->dateTimeThisCentury,
        'status' => 'AVAILABLE',
        'phone_number' => $faker->phoneNumber,
        'email' => $faker->freeEmail,
        'insured' => $faker->boolean,
        'city' => $faker->city,
        'relatives' => $faker->firstName.' '.$faker->lastName,
    ];
});
