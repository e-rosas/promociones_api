<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Relative;
use Faker\Generator as Faker;

$factory->define(Relative::class, function (Faker $faker) {
    return [
        'last_name' => $faker->lastName,
        'name' => $faker->firstName,
        'birth_date' => $faker->dateTimeThisCentury,
        'relationship' => $faker->randomElement([
            'SISTER',
            'SON',
            'DAUGHTER',
            'WIFE',
            'OTHER',
        ]),
        'patient_id' => factory(App\Patient::class),
    ];
});
