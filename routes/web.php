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
// $router->get('/key', function() {
//     return \Illuminate\Support\Str::random(32);
// });

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->group(['middleware' => 'client.credentials'],function() use ($router) {
    $router->get('/users1', 'User1Controller@show');
    $router->post('/users1', 'User1Controller@addUser');  //ADDS USER
    $router->get('/users1/{id}', 'User1Controller@index');   //FIND THE INPUT ID
    $router->put('/users1/{id}', 'User1Controller@updateUser');   //UPDATE
    $router->patch('/users1/{id}', 'User1Controller@updateUser');   //update user
    $router->delete('/users1/{id}', 'User1Controller@removeUser');  //DELETES USER

    $router->get('/users2', 'User2Controller@show');
    $router->post('/users2', 'User2Controller@addUser');  //ADDS USER
    $router->get('/users2/{id}', 'User2Controller@index');   //FIND THE INPUT ID
    $router->put('/users2/{id}', 'User2Controller@updateUser');   //UPDATE
    $router->patch('/users2/{id}', 'User2Controller@updateUser');   //update user
    $router->delete('/users2/{id}', 'User2Controller@removeUser');  //DELETES USER

});

// $router->group(['middleware' => 'auth:api'], function () use ($router) {
//     $router->get('/users/me', 'UserController@me');
// });