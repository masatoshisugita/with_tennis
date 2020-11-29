<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Event;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Event::class, function (Faker $faker) {
    return [
        'user_id' => function() {
          return factory(User::class,'user1')->create()->id;
        },
        'title' => $faker->title,
        'place' => $faker->address,
        'date' => $faker->dateTime,
        'detail' => $faker->sentence,
    ];
},'event1');
