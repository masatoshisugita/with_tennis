<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Event;
use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
            'user_id' => function() {
              return factory(User::class)->create()->id;
            },
            'event_id' => function() {
                return factory(Event::class)->create()->id;
            },
            'content' => $faker->sentence,
        ];
});
