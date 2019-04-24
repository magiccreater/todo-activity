<?php

use Faker\Generator as Faker;
use App\Task;
use App\User;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->paragraph,
        'user_id' => App\User::all()->random()->id,
        'status' => $faker->randomElement(['pending', 'finished']),
    ];
});
