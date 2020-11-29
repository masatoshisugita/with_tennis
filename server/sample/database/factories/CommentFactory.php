<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Event;
use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
            'user_id' => function() {
              return factory(User::class,'user1')->create()->id;
            },
            'event_id' => function() {
                return factory(Event::class,'event1')->create()->id;
            },
            'content' => $faker->sentence,
        ];
},'comment1');
