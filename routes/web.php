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

$router->post('login', 'LoginController@login');

$router->get('/key', function() {
    return str_random(32);
});

$router->get('senha', 'LoginController@senha');

$router->group(['middleware' => 'auth'], function() use ($router){
    $router->get('/logado', function() {
        return 'logado';
    });

    $router->post('deslogar', "LoginController@logout");
});