<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'clientes'], function () use ($router) {

    $router->get('/', ['uses' => 'CustomersController@index', 'as' => 'customer']);
    $router->get('/listar-por-maior-valor-total-compras', ['uses' => 'CustomersController@getByMaxTotalValue', 'as' => 'customer']);
    $router->get('/{userId}', ['uses' => 'CustomersController@findById', 'as' => 'customer']);

    $router->group(['prefix' => '{userId}/historico'], function () use ($router) {
        $router->get('/', ['uses' => 'PurchasesHistoricController@findById', 'as' => 'purchases-historic']);
    });

});

$router->group(['prefix' => 'historico'], function () use ($router) {

    $router->get('/', ['uses' => 'PurchasesHistoricController@index', 'as' => 'customer']);
    $router->get('/{userId}', ['uses' => 'CustomersController@findById', 'as' => 'customer']);

    // $router->group(['prefix' => '{userId}/historico'], function () use ($router) {
        // $router->get('/', ['uses' => 'PurchasesHistoricController@findById', 'as' => 'purchases-historic']);
    // });

});
