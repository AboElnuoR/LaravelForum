<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Thread::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function () {
            return factory('App\Models\User')->create()->id;
        },
        'channel_id' => function () {
            return factory('App\Models\Channel')->create()->id;
        },
        'title' => $faker->sentence,
        'body' => $faker->paragraph
    ];
});

$factory->define(App\Models\Channel::class, function (Faker\Generator $faker) {
    $name = $faker->word;
    return [
        'name' => $name,
        'slug' => $name,
    ];
});

$factory->define(App\Models\Reply::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function () {
            return factory('App\Models\User')->create()->id;
        },
        'thread_id' => function () {
            return factory('App\Models\Thread')->create()->id;
        },
        'body' => $faker->paragraph
    ];
});
