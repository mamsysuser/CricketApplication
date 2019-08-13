<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Player;
use App\Team;
use App\Country;
use Faker\Generator as Faker;

$factory->define(Player::class, function (Faker $faker) {
	
	$teamIds = Team::all()->pluck('id')->toArray();
	$countryIds = Country::all()->pluck('id')->toArray();

    return [
        'firstName' => $faker->firstNameMale,
        'lastName' =>  $faker->name,
        'imageUri' =>  $faker->image('public/images/player-logos',400,300, null, false),
        'jerseyNo' =>  $faker->randomDigit,
        'player_history' => 'a:6:{s:7:"matches";s:3:"222";s:4:"runs";s:4:"2222";s:13:"highest_score";s:3:"222";s:8:"hundreds";s:2:"23";s:7:"fifties";s:2:"32";s:7:"wickets";s:2:"23";}',
        'country_id' => $faker->randomElement($countryIds),
        'team_id' =>    $faker->randomElement($teamIds),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
        'deleted_at' => $faker->dateTime()
    ];
});