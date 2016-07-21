<?php


    Route::get("/franqueado/{franqueado}", [
        'middleware' => ['auth', 'roles'],
        'uses' => 'FranqueadoController@SetFranqueado',
        'as' => 'franqueado.setfranqueado',
        'roles' => ['administrator', 'manager']
    ]);

// VOUCHER

    Route::get("/voucher_audit/{voucher}", [
        'middleware' => ['auth', 'roles'],
        'uses' => 'VoucherController@listaudit',
        'as' => 'voucher_audit.listaudit',
        'roles' => ['administrator', 'manager']
    ]);

    Route::post("/voucher", [
        'middleware' => ['auth', 'roles'],
        'uses' => 'VoucherController@store',
        'as' => 'voucher.store',
        'roles' => ['administrator', 'manager']
    ]);

    Route::post("/voucher/{voucher}", [
        'middleware' => ['auth', 'roles'],
        'uses' => 'VoucherController@update',
        'as' => 'voucher.update',
        'roles' => ['administrator', 'manager']
    ]);

    Route::post("/voucher/{voucher}/delete", [
        'middleware' => ['auth', 'roles'],
        'uses' => 'VoucherController@delete',
        'as' => 'voucher.delete',
        'roles' => ['administrator', 'manager']
    ]);

// FUNCIONARIOS

    Route::get('funcionarios/json', [
        'middleware' => ['auth', 'roles'],
        'as' => 'funcionarios.ajax',
        'uses' => 'FuncionariosController@ajax',
        'roles' => ['administrator', 'manager']
    ]);

    Route::get("/funcionarios", [
        'middleware' => ['auth', 'roles'],
        'uses' => 'FuncionariosController@index',
        'as' => 'funcionarios.index',
        'roles' => ['administrator', 'manager']
    ]);

    Route::get("/funcionarios/create", [
        'middleware' => ['auth', 'roles'],
        'uses' => 'FuncionariosController@create',
        'as' => 'funcionarios.create',
        'roles' => ['administrator', 'manager']
    ]);

    Route::post("/funcionarios", [
        'middleware' => ['auth', 'roles'],
        'uses' => 'FuncionariosController@store',
        'as' => 'funcionarios.store',
        'roles' => ['administrator', 'manager']
    ]);

    Route::get("/funcionarios/{funcionarios}", [
        'middleware' => ['auth', 'roles'],
        'uses' => 'FuncionariosController@show',
        'as' => 'funcionarios.show',
        'roles' => ['administrator', 'manager']
    ]);

    Route::get("/funcionarios/{funcionarios}/edit", [
        'middleware' => ['auth', 'roles'],
        'uses' => 'FuncionariosController@edit',
        'as' => 'funcionarios.edit',
        'roles' => ['administrator']
    ]);

    Route::get("/funcionarios/{funcionarios}/edit", [
        'middleware' => ['auth', 'roles'],
        'uses' => 'FuncionariosController@edit',
        'as' => 'funcionarios.edit',
        'roles' => ['administrator']
    ]);

    Route::patch("/funcionarios/{funcionarios}", [
        'middleware' => ['auth', 'roles'],
        'uses' => 'FuncionariosController@update',
        'as' => 'funcionarios.update',
        'roles' => ['administrator']
    ]);

    Route::delete("/funcionarios/{funcionarios}", [
        'middleware' => ['auth', 'roles'],
        'uses' => 'FuncionariosController@destroy',
        'as' => 'funcionarios.destroy',
        'roles' => ['administrator']
    ]);

    Route::get('/voucher', [
        'middleware' => ['auth', 'roles'],
        'uses' => 'VoucherController@index',
        'roles' => ['administrator', 'manager', 'employee']
    ]);

    Route::get('/espera', [
        'middleware' => ['auth', 'roles'],
        'uses' => 'PagesController@espera',
        'roles' => ['administrator', 'manager', 'employee']
    ]);

    Route::get('/fechamento', [
        'middleware' => ['auth', 'roles'],
        'uses' => 'FechamentoController@index',
        'roles' => ['administrator', 'manager']
    ]);

// COBRANCA

    Route::get('/cobranca', [
        'middleware' => ['auth', 'roles'],
        'uses' => 'CobrancaController@index',
        'roles' => ['administrator', 'manager']
    ]);

    Route::get("/cobranca/create", [
        'middleware' => ['auth', 'roles'],
        'uses' => 'CobrancaController@create',
        'as' => 'cobranca.create',
        'roles' => ['administrator', 'manager']
    ]);

    Route::get('/codigobarra', 'BarraController@index');

    Route::get('/login', 'PagesController@login');

    Route::get('/error', 'PagesController@error');

    Route::get('/', 'PagesController@home');

    Route::get('/logoff', 'Auth\AuthController@logoff');

    Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');

    Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

