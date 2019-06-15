<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'title' => $faker->name,
        "content" => $faker->paragraph(10, true)
    ];
});
