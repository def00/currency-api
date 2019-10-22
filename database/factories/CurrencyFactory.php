<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Currency;
$factory->define(Currency::class, function (Faker $faker) {
    return [
        'rate' => $faker->randomFloat(4, 0, 100),
        'symbol' => $faker->currencyCode,
        'name' => $faker->currencyCode
    ];
});
