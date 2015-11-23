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

    Route::resource('users', 'UsersController',  ['only' => ['index', 'update', 'edit', 'create']]);
    Route::get('/{entity}', 'EntityController@index');
    Route::get('/{entity}/{id}', 'EntityController@show');
    Route::get('/{entity}/{id}/edit', 'EntityController@edit');
    Route::put('/{entity}/{id}/update', 'EntityController@update');

    Route::get('/logout',  [
        'as'   => 'admin.logout',
        'uses' => 'AdminController@logout',
    ]);

    Route::get('/{wildcard}', [
        'as' => 'admin.wildcard',
        'uses' => 'AdminController@wildcard'
    ]);

});
