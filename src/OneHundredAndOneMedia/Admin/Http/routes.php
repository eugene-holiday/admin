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
    Route::get('/users', 'AdminController@display');

    Route::get('users/{user}',function($user, \Illuminate\Foundation\Http\Kernel $kernel){
        dd($user);
    });

    Route::get('/logout',  [
        'as'   => 'admin.logout',
        'uses' => 'AdminController@logout',
    ]);


    Route::get('/{wildcard}', [
        'as' => 'admin.wildcard',
        'uses' => 'AdminController@wildcard'
    ]);

});
