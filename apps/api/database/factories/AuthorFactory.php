<?php

use App\Author;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName()
    ];
});
