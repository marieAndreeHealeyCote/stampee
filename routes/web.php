<?php

use App\Routes\Route;
use App\Controllers\HomeController;
use App\Controllers\TimbreController;
use App\Controllers\UserController;
use App\Controllers\AuthController;

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/timbres', 'TimbreController@index');
Route::get('/timbre/show', 'LivreController@show');
Route::get('/timbre/create', 'LivreController@create');
Route::post('/timbre/create', 'LivreController@store');
Route::get('/timbre/edit', 'LivreController@edit');
Route::post('/timbre/edit', 'LivreController@update');
Route::get('/timbre/delete', 'LivreController@delete');

Route::get('/register', 'UserController@create');
Route::post('/register', 'UserController@store');

Route::get('/user/edit', 'UserController@show');
Route::post('/user/edit', 'UserController@store');

Route::get('/upload', 'UploadController@create');
Route::post('/upload', 'UploadController@index');

Route::get('/login', 'AuthController@create');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');


Route::dispatch();
