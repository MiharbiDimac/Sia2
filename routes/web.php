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

$router->get('/users',['uses' => 'UserController@getUsers']);
$router->get('/getusers', 'UserController@index'); // get all users records
$router->post('/creausers', 'UserController@add'); // create new user record
$router->get('/idusers/{AuthorID}', 'UserController@show'); // get user by id
$router->put('/updusers/{AuthorID}', 'UserController@update'); // update user record
$router->patch('/patcusers/{AuthorID}', 'UserController@update'); // update user record
$router->delete('/delusers/{AuthorID}', 'UserController@delete'); // delete record