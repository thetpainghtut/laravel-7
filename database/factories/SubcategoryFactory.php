<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subcategory;
use Faker\Generator as Faker;

$factory->define(Subcategory::class, function (Faker $faker) {
    return [
      'name' => $faker->sentence,
      'category_id' => factory(App\Category::class)->create()->id,
    ];
});
