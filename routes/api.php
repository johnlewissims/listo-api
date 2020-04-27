<?php

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::get('/user', 'AuthController@user');
Route::post('/logout', 'AuthController@logout');

Route::post('/listing', 'ItemController@createItem')->middleware('auth:api');
Route::post('/delete/{item}', 'ItemController@deleteItem')->middleware('auth:api');
Route::get('/listing', 'ItemController@getItems')->middleware('auth:api');

Route::group([
    'prefix' => 'password'
], function () {
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});
