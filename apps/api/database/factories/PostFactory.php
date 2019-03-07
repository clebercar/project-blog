<?php

use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->word, 
        'slug' => $faker->word, 
        'body' => $faker->text(), 
        'image' => $faker->imageUrl(), 
        'published' => $faker->boolean
    ];
});
