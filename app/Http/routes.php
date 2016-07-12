<?php

Route::get('/login', 'PagesController@login');

Route::get('funcionarios/json', [
    'middleware' => ['auth', 'roles'],
    'as' => 'funcionarios.ajax',
    'uses' => 'FuncionariosController@ajax',
    'roles' => ['administrator', 'manager']
]);

Route::resource("funcionarios", [
    'middleware' => ['auth', 'roles'],
    'uses' => 'FuncionariosController',
    'roles' => ['administrator', 'manager']
]);

Route::get('/', [
    'middleware' => ['auth', 'roles'],
    'uses' => 'PagesController@home',
    'roles' => ['administrator', 'manager', 'employee']
]);

Route::get('/voucher', [
    'middleware' => ['auth', 'roles'],
    'uses' => 'PagesController@voucher',
    'roles' => ['administrator', 'manager', 'employee']
]);

Route::get('/espera', [
    'middleware' => ['auth', 'roles'],
    'uses' => 'PagesController@espera',
    'roles' => ['administrator', 'manager', 'employee']
]);

Route::get('/fechamento', [
    'middleware' => ['auth', 'roles'],
    'uses' => 'PagesController@espera',
    'roles' => ['administrator', 'manager']
]);

Route::get('/logoff', 'AuthController@logoff');

Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');

Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
