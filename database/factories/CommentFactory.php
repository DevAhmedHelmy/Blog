<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
         
        'comment' => $faker->text,
        'approved' => 1,
        'post_id' => function(){
            return Post::all()->random();
        },
        'user_id' => function(){
            return User::all()->random();
        },

    ];
});
