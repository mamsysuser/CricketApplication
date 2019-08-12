<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'logoUri' => $faker->image('public/images/team-logos',400,300, null, false),
        'club_state' => $faker->word,
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime()
    ];
});
