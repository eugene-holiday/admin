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

    Route::get('/', ['as'   => 'admin.home',  'uses' => 'AdminController@index']);

    Route::resource('users', 'UsersController',  ['only' => ['index', 'update', 'edit', 'create']]);

    Route::get('/{entity}',                      ['as'   => 'admin.entity.index',  'uses' => 'EntityController@index']);
    Route::get('/{entity}/create',               ['as'   => 'admin.entity.create', 'uses' => 'EntityController@create']);
    Route::post('/{entity}/store',               ['as'   => 'admin.entity.store',  'uses' => 'EntityController@store']);
    Route::get('/{entity}/{modelId}',            ['as'   => 'admin.entity.show',   'uses' =>  'EntityController@show']);
    Route::get('/{entity}/{modelId}/edit',       ['as'   => 'admin.entity.edit',   'uses' =>  'EntityController@edit']);
    Route::put('/{entity}/{modelId}/update',     ['as'   => 'admin.entity.update', 'uses' => 'EntityController@update']);
    Route::delete('/{entity}/{modelId}/destroy', ['as'   => 'admin.entity.destroy', 'uses' => 'EntityController@destroy']);

    Route::get('/logout',  [
        'as'   => 'admin.logout',
        'uses' => 'AdminController@logout',
    ]);

    Route::get('/{wildcard}', [
        'as' => 'admin.wildcard',
        'uses' => 'AdminController@wildcard'
    ]);

});
