<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Messages;
use Faker\Generator as Faker;
use App\Users;

$factory->define(Messages::class, function (Faker $faker) {
    return [
        'sender_id' => $faker-> numberBetween(1,50),
        'recipient_id' => $faker-> numberBetween(1,50),
        'body' => $faker->paragraph,
    ];
});
