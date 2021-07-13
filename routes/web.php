<?php

use App\Http\Middleware\ApiAuthMiddleware;


//RUTAS DE DIRECCIONAMIENTO URL
Route::get('/', function () {return view('welcome');});

Route::get('/login', function () {return view('login');});

Route::get('/register', function () {return view('register');});

//Route::get('/home', function () {return view('home');});

//TestORM   ->middleware(ApiAuthMiddleware::class)
Route::get('/test-orm',       'TestController@testOrm');

//RUTAS DEL CONTROLADOR DE USUARIO
Route::post('/api/register',  'UserController@register');
Route::post('/api/login',     'UserController@login');
Route::post('/api/update',    'UserController@update');
Route::get('/api/user/{email}',  'UserController@detail');

//RUTAS DEL TWEET
Route::post('/home',    'TweetController@tweet')->middleware(ApiAuthMiddleware::class);
Route::get('/home',    'TweetController@allTweets');

