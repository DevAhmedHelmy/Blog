<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use App\User;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'user_id' => function(){
            return User::all()->random();
        },
    ];
});
