<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Match;
use App\Team;

use Faker\Generator as Faker;

$factory->define(Match::class, function (Faker $faker) {
    
    $teamIds = Team::all()->pluck('id')->toArray();

    return [
        'match_title' =>  $faker->word,
        'firstteam_id' => $faker->randomElement($teamIds),
        'secondteam_id' =>$faker->randomElement($teamIds)
    ];
});
