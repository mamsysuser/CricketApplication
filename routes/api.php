<?php

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
	
    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');
});
