<?php

use App\Routes\Route;
use App\Controllers\HomeController;
use App\Controllers\StampController;
use App\Controllers\UserController;
use App\Controllers\AuthController;
use App\Controllers\AuctionController;

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/my-stamps', 'StampController@index');
Route::get('/stamps', 'StampController@index');
Route::get('/stamp/show', 'StampController@show');
Route::get('/stamp/create', 'StampController@create');
Route::post('/stamp/create', 'StampController@store');
Route::get('/stamp/edit', 'StampController@edit');
Route::post('/stamp/edit', 'StampController@update');
Route::get('/stamp/delete', 'StampController@delete');
Route::get('/stamp/image-delete', 'StampController@deleteImage');

Route::get('/profile', 'UserController@index');
Route::get('/register', 'UserController@create');
Route::post('/register', 'UserController@store');

Route::get('/user/edit', 'UserController@show');
Route::post('/user/edit', 'UserController@store');

Route::get('/auctions', 'AuctionController@index');
Route::get('/auction/show', 'AuctionController@show');
Route::get('/my-favorites', 'AuctionController@addFavorites');

Route::get('/upload', 'UploadController@create');
Route::post('/upload', 'UploadController@index');

Route::get('/login', 'AuthController@create');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');


Route::dispatch();
