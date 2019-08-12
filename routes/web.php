<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');


Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    //Team routes
    Route::delete('teams/destroy', 'TeamsController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamsController');

    //Players Routes
    Route::delete('players/destroy', 'PlayersController@massDestroy')->name('players.massDestroy');
    Route::resource('players', 'PlayersController');

    //Matches Routes
    Route::delete('matches/destroy', 'MatchesController@massDestroy')->name('matches.massDestroy');
    Route::resource('matches', 'MatchesController');

    //Points Routes
    Route::resource('points', 'PointsController');

    //Fixtures Routes
    Route::resource('fixtures', 'FixturesController');
});
