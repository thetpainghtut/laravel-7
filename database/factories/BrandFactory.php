<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    return [
      'name' => $faker->sentence,
      'photo' => $faker->image('public/backendtemplate/brandimg',200,100, null, false),
    ];
});
