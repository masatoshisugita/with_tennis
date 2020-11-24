<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Ivent;

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

$factory->define(Ivent::class, function (Faker $faker) {
    return [
        'user_id' => function() {
          return factory(User::class)->create()->id;
        },
        'title' => $faker->title,
        'place' => $faker->address,
        'date' => $faker->dateTime,
        'detail' => $faker->sentence,
    ];
},'ivent1');
