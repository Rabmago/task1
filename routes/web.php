<?php

use App\Http\Controllers;
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
$router->get('/news', 'NewsController@index');
$router->post('/news', 'NewsController@create');
$router->post('/news/{id}', 'NewsController@update');
$router->delete('/news/{id}', 'NewsController@delete');
$router->get('/news/{id}', 'NewsController@findById');
