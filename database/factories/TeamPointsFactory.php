<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\TeamPoints;
use Faker\Generator as Faker;

$factory->define(TeamPoints::class, function (Faker $faker) {
    
    $matchIds = Match::all()->pluck('id')->toArray();
    $teamIds = Team::all()->pluck('id')->toArray();

    return [
        'match_id' => $faker->randomElement($matchIds),
        'team_id' => $faker->randomElement($teamIds),
        'points' => $faker->randomDigit,
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime()
    ];
});
