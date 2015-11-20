<?php

Route::get('/login',  [
    'as'   => 'admin.login',
    'uses' => 'AdminController@getLogin',
]);

Route::post('/login',  [
    'as'   => 'admin.login.post',
    'uses' => 'AdminController@postLogin',
]);

Route::group([
    'middleware' => config('admin.middleware'),
], function (){

    Route::get('/', 'AdminController@index');

    Route::get('/users', 'UsersController@index');

    Route::get('users/create', ['as'   => 'user.create', 'uses' => 'UsersController@create']);
    Route::get('users/{id}/edit', ['as'   => 'user.edit', 'uses' => 'UsersController@edit']);

    Route::get('/logout',  [
        'as'   => 'admin.logout',
        'uses' => 'AdminController@logout',
    ]);


    Route::get('/{wildcard}', [
        'as' => 'admin.wildcard',
        'uses' => 'AdminController@wildcard'
    ]);

});
