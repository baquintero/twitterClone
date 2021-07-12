<?php

//RUTAS DE DIRECCIONAMIENTO URL
Route::get('/', function () {return view('welcome');});

Route::get('/login', function () {return view('login');});

//TestORM

Route::get('/test-orm', 'TestController@testOrm');
Route::post('/api/login', 'UserController@login');
Route::post('/api/update', 'UserController@update');


//RUTAS DEL CONTROLADOR DE USUARIO