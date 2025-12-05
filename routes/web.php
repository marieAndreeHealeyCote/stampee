<?php

use App\Routes\Route;
use App\Controllers\HomeController;
use App\Controllers\TimbreController;
use App\Controllers\UserController;
use App\Controllers\AuthController;

Route::get('/', 'TimbreController@index');
Route::get('/home', 'HomeController@index');


Route::get('/timbres', 'TimbreController@index');

Route::get('/register', 'UserController@create');
Route::post('/register', 'UserController@store');

Route::get('/login', 'AuthController@create');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');


Route::dispatch();
