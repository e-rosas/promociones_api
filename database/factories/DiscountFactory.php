<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Discount;
use Faker\Generator as Faker;

$factory->define(Discount::class, function (Faker $faker) {
    return [
        'name' => 'DISCOUNT NAME',
        'type' => $faker->randomElement([
            'DENTAL',
            'MEDICAL',
            'OTHER',
        ]),
    ];
});
