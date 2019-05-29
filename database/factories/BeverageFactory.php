<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Beverage;
use Faker\Generator as Faker;

$factory->define(Beverage::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'type' => 'Softdrink'
    ];
});
