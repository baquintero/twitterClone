<?php

//RUTAS DE DIRECCIONAMIENTO URL
Route::get('/', function () {return view('welcome');});

Route::get('/login', function () {return view('login');});

Route::get('/register', function () {return view('register');});

//TestORM

Route::get('/test-orm',       'TestController@testOrm');
Route::post('/api/register',  'UserController@register');
Route::post('/api/login',     'UserController@login');
Route::post('/api/update',    'UserController@update');


//RUTAS DEL CONTROLADOR DE USUARIO