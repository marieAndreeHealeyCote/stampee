<?php

use App\Routes\Route;
use App\Controllers\HomeController;
use App\Controllers\TimbreController;
use App\Controllers\UserController;
use App\Controllers\AuthController;


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');


Route::get('/timbres', 'TimbreController@index');

Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');

Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@login');

Route::get('/register', 'AuthController@create');
Route::post('/register', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');


Route::dispatch();
