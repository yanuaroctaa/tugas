<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('helo/{name}', function ($name) {
    return 'hello, ' . $name;
});
$router->get('/product', 'ProductController@index');
//memanggil function controller melalui root (dengan method index)
$router->get('/product/{id}', 'ProductController@show');

$router->post('/product', 'ProductController@store');
$router->delete('/product/{id}', 'ProductController@destroy');
$router->put('/product/{id}', 'ProductController@update');
