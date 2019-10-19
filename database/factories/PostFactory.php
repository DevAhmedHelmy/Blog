<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'title'   => $title,
        'body'    => $faker->text,
        'slug'    => Str::slug($title),
        'image'   => $faker->imageUrl('http://lorempixel.com/640/480/'),
        'user_id' => function(){
            return User::all()->random();
        },
        'category_id' => function(){
            return Category::all()->random();
        },
    ];
});
