<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Deal;
use Faker\Generator as Faker;

$factory->define(Deal::class, function (Faker $faker) {
    $start_date = $faker->dateTimeThisYear('+1 month');
    $end_date = strtotime('+4 months', $start_date->getTimestamp());

    return [
        'start_date' => $start_date->format('Y-m-d'),
        'expires_on_date' => $end_date->format('Y-m-d'),
        'value' => $faker->numberBetween(10, 50),
    ];
});
