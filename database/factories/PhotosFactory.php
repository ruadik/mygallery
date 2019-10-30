<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Photo;
use Faker\Generator as Faker;

$factory->define(Photo::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
        'image' => $faker->unique()->numberBetween(101, 123).'.jpg',
        'category_id' => $faker->numberBetween(1, 5),
        'user_id' => $faker->numberBetween(1, 5),
        'description' => $faker->unique()->sentence($nbWords = 26, $variableNbWords = true),
        'size' => '1080 x 1920',
        'imgSmall' => $faker->unique()->numberBetween(1001, 1023).'.jpg',
        'slug' => $faker->unique()->word,
    ];
});
